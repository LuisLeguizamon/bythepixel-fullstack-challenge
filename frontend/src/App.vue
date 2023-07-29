<script setup lang="ts">
import { RouterLink, RouterView } from "vue-router";
</script>

<template>
  <header>
    <div class="wrapper p-2 bg-white text-slate-600 font-sm">
      <nav>
        <span class="pr-5 uppercase text-slate-400">Weather Info</span>
        <RouterLink to="/" class="hover:text-slate-500"> Home </RouterLink>
      </nav>
    </div>
  </header>
  <RouterView />
</template>

<style scoped></style>
