<script setup lang="ts">
import { ref } from "vue";
import { useRoute } from "vue-router";
import UserWeatherInfoCard from "@/components/UserWeatherInfoCard.vue";

let weatherInfo: any = ref({});

onCreate();

function onCreate() {
  getWeather();
}

async function getWeather() {
  const route = useRoute();
  const userId = route.params.user;
  const base_url = "http://localhost:8001";
  const url = base_url + "/users/" + userId + "/weather-info";
  try {
    const response = await fetch(url);
    if (!response.ok) {
      throw new Error("Network error");
    }
    const responseData = await response.json();
    weatherInfo.value = responseData.data;
  } catch (error) {
    alert("Error getting weather: " + error);
  }
}
</script>

<template>
  <main
    class="bg-gradient-to-r from-blue-100 to-cyan-100 flex justify-center grid grid-cols-2 p-5"
  >
    <UserWeatherInfoCard
      :weather-info="weatherInfo"
      :showDetailBtn="false"
    ></UserWeatherInfoCard>
    <div
      class="text-slate-500 bg-white opacity-70 mx-5 my-5 pt-5 pb-3 pl-10 grid grid-cols-2 rounded-lg overflow-hidden shadow-lg"
    >
      <div>
        <p class="font-medium text-xl">
          {{ weatherInfo.description }}
        </p>
      </div>
      <div></div>
      <div>
        <p class="text-medium">
          <span class="font-medium">Humidity </span>{{ weatherInfo.humidity }}
        </p>
      </div>
      <div>
        <p class="text-medium">
          <span class="font-medium">Feels like </span>{{ weatherInfo.feels_like_in_kelvin }}
        </p>
      </div>
    </div>
  </main>
</template>
