<script setup lang="ts">
import { ref } from 'vue';

let tempInKelvin = ref(false);

defineProps({
  weatherInfo: {
    type: Object,
    default: null,
  },
  showDetailBtn: {
    type: Boolean,
    default: true,
  },
});

function showTempInKelvin(){
  tempInKelvin.value = true;
}
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
      <p class="my-5" v-if="showDetailBtn">
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
    <div class="font-medium text-4xl text-slate-500">
      <p>
        <span class="text-slate-700 text-3xl" v-show="!tempInKelvin">
          {{ weatherInfo.temperature_in_celsius }}
        </span>
        <Transition>
          <span v-if="tempInKelvin" class="text-slate-500 text-3xl">
            {{ weatherInfo.temperature_in_kelvin }}
          </span>
        </Transition>
        <Transition>
          <span v-if="!tempInKelvin">
            <span  class="text-slate-400"> | </span>
            <span
              class="text-xl cursor-pointer hover:text-slate-900 transition-colors"
              @click="showTempInKelvin()"
            >
              K
            </span>
          </span>
        </Transition>
      </p>
    </div>
  </div>
</template>
<style scoped>
.v-enter-active,
.v-leave-active {
  transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}
</style>
