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
    <template v-if="users">
      <div
        v-for="user in users"
        :key="user.id"
        class="bg-white opacity-70 my-5 pt-5 pb-3 pl-10 grid grid-cols-2 rounded-lg overflow-hidden shadow-lg"
      >
        <div>
          <h1 class="font-medium text-2xl">
            {{ user.user_name }}
          </h1>
          <p class="my-5 text-slate-500 text-medium">
            <span class="font-medium">Location</span> {{ user.location }}
          </p>
          <p class="my-5">
            <router-link
              class="text-sm text-sky-600 hover:text-sky-800 transition ease-in-out delay-100"
              :to="'/weather/' + user.id"
            >
              More Info
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"
                />
              </svg>
            </router-link>
          </p>
        </div>
        <div>
          <p class="text-slate-500 text-4xl font-medium">
            {{ user.temperature_in_kelvin }}
          </p>
        </div>
      </div>
    </template>
    <template v-else>
      <h3>No users found</h3>
    </template>
  </div>
</template>
