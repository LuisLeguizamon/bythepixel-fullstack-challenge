<script setup lang="ts">
import { ref } from "vue";
import { useRoute } from "vue-router";

let weather: any = ref({});
let user: any = ref("");

onCreate();

function onCreate() {
  getWeather();
}

async function getWeather() {
  const route = useRoute();
  const userId = route.params.user;
  const url = "http://localhost:8001/weather/" + userId;

  try {
    const response = await fetch(url);
    if (!response.ok) {
      throw new Error("Network error");
    }
    const data = await response.json();
    weather.value = data.weather;
    user.value = data.user;
  } catch (error) {
    alert("Error getting weather: " + error);
  }
}
</script>

<template>
  <main>
    <h1>Weather</h1>
    <p>User: {{ user.name }}</p>
    <p>Location: {{ weather.name }}, {{ weather.sys.country }}</p>
    <p>Temperature: {{ weather.main.temp }} K</p>
  </main>
</template>
