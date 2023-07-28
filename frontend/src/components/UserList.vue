<script lang="ts">
export default {
  data: () => ({
    users: null as any,
  }),

  created() {
    this.getUsers();
  },

  methods: {
    async getUsers() {
      const base_url = "http://localhost:8001";
      const url = base_url + "/users/weather-info";
      try {
        const response = await fetch(url);
        if (!response.ok) {
          throw new Error("Network error");
        }
        const responseData = await response.json();
        this.users = responseData.data;
      } catch (error) {
        alert("Error getting users: " + error);
      }
    },
  },
};
</script>
<template>
  <div>
    <h1>Users</h1>
    <template v-if="users">
      <ul v-if="users">
        <li v-for="user in users" :key="user.id">
          {{ user.user_name }} - Location Temperature: {{ user.temperature_in_kelvin }}
          <router-link :to="'/weather/' + user.id">Show More</router-link>
        </li>
      </ul>
    </template>
    <template v-else>
      <h3>No users found</h3>
    </template>
  </div>
</template>
