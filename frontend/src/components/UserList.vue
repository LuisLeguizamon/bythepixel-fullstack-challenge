<script>
export default {
  data: () => ({
    users: null,
  }),

  created() {
    this.getUsers();
  },

  methods: {
    async getUsers() {
      const url = "http://localhost:8001";
      try {
        const response = await fetch(url);
        if (!response.ok) {
          throw new Error("Network error");
        }
        const data = await response.json();
        this.users = data.users;
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
          {{ user.name }}
          <router-link :to="'/weather/' + user.id">Show Weather</router-link>
        </li>
      </ul>
    </template>
    <template v-else>
      <h3>No users found</h3>
    </template>
  </div>
</template>
