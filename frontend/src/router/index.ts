import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import UserWeatherInfoView from "../views/UserWeatherInfoView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeView,
    },
    {
      path: "/user-weather-info/:user",
      name: "user-weather",
      component: UserWeatherInfoView,
    },
  ],
});

export default router;
