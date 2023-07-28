<script setup lang="ts">
defineProps({
  weatherInfo: {
    type: Object,
    default: null,
  },
});
</script>
<template>
  <div
    class="bg-white opacity-70 my-5 pt-5 pb-3 pl-10 grid grid-cols-2 rounded-lg overflow-hidden shadow-lg"
  >
    <div>
      <h1 class="font-medium text-2xl">
        {{ weatherInfo.user_name }}
      </h1>
      <p class="my-5 text-slate-500 text-medium">
        <span class="font-medium">Location</span> {{ weatherInfo.location }}
      </p>
      <p class="my-5">
        <router-link
          class="text-sm text-sky-600 hover:text-sky-800 transition ease-in-out delay-100"
          :to="'/user-weather-info/' + weatherInfo.id"
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
        {{ weatherInfo.temperature_in_kelvin }}
      </p>
    </div>
  </div>
</template>
