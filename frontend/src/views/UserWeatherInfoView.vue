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
  <main class="bg-gradient-to-r from-blue-100 to-cyan-100 flex justify-center">
    <UserWeatherInfoCard :weather-info="weatherInfo"></UserWeatherInfoCard>
  </main>
</template>
