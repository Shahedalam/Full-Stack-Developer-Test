<script setup>
import { ref, computed, provide, onMounted } from "vue";
import Leftnav from "./components/Nav/LeftNav.vue";
import ProductList from "./components/Product/ProductList.vue";
import App from "./App.vue";

const routes = {
  "/": App,
  "/category/:id": App,
};

const currentPath = ref(window.location.hash);
const currentCategory = ref(null);

window.addEventListener("hashchange", () => {
  currentPath.value = window.location.hash;
  currentCategory.value = currentPath.value.split("/").slice(-1)[0];
});
// provide('routes',currentPath);
provide("domain", "http://" + window.location.host);
// provide("currentCategory", currentCategory.value);
</script>

<template>
  <div class="w-full bg-[#fff] poppins">
    <div class="max-w-[107rem] mx-auto block md:flex gap-5 mt-[13.5rem] px=4">
      <leftnav />
      <ProductList :currentCategory="currentCategory" :key="currentCategory" />
    </div>
  </div>
</template>
