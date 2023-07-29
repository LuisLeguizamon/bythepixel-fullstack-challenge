<script setup lang="ts">
import { ref } from "vue";
import UserWeatherInfoCard from "./UserWeatherInfoCard.vue";

const usersWeatherInfo: any = ref(null);

getUsers();

async function getUsers() {
  const base_url = "http://localhost:8001";
  const url = base_url + "/users/weather-info";
  try {
    const response = await fetch(url);
    if (!response.ok) {
      throw new Error("Network error");
    }
    const responseData = await response.json();
    usersWeatherInfo.value = responseData.data;
  } catch (error) {
    alert("Error getting users: " + error);
  }
}
</script>
<template>
  <div>
    <template v-if="usersWeatherInfo">
      <template v-for="weatherInfo in usersWeatherInfo" :key="weatherInfo.id">
        <UserWeatherInfoCard :weather-info="weatherInfo"></UserWeatherInfoCard>
      </template>
    </template>
    <template v-else>
      <h3>No users found</h3>
    </template>
  </div>
</template>
