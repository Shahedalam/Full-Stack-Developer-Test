<script setup>
import Leftnav from './components/Nav/LeftNav.vue';
import ProductList from "./components/Product/ProductList.vue";
</script>

<template>
  <div class="w-full bg-[#fff] poppins">
    <div class="max-w-[107rem] mx-auto flex gap-5 mt-[13.5rem] px=4">
      <leftnav />
      <ProductList />
    </div>
  </div>


</template>