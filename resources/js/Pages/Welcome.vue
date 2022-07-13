<template>
  <app-layout title="Weekndrive">
    <main class="bg-gray-800 relative overflow-hidden h-screen">
      <home />
    </main>
  </app-layout>
</template>
<script>
import { defineComponent } from "vue";
import AppLayout from "../Layouts/AppLayout.vue";
import Home from "@/Pages/Home/Hero.vue";

export default defineComponent({
  components: {
    AppLayout,
    Home,
  },
  setup() {},
});
</script>
