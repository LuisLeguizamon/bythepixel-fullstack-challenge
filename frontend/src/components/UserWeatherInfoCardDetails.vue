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
    class="text-slate-500 bg-white opacity-70 mx-5 my-5 pt-5 pb-3 pl-10 grid grid-cols-2 rounded-lg overflow-hidden shadow-lg"
  >
    <div>
      <p class="font-medium text-xl">
        {{ weatherInfo.description }}
      </p>
    </div>
    <div>
      <template v-if="weatherInfo.is_cloudy">
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
            d="M2.25 15a4.5 4.5 0 004.5 4.5H18a3.75 3.75 0 001.332-7.257 3 3 0 00-3.758-3.848 5.25 5.25 0 00-10.233 2.33A4.502 4.502 0 002.25 15z"
          />
        </svg>
      </template>
    </div>
    <div>
      <p class="text-medium">
        <span class="font-medium">Humidity </span>{{ weatherInfo.humidity }}
      </p>
    </div>
    <div>
      <p class="text-medium">
        <span class="font-medium">Feels like </span>{{ weatherInfo.feels_like_in_celsius }}
      </p>
    </div>
  </div>
</template>
