<script setup>
import {onMounted, ref} from "vue";
import showCategory from '../../composables/categoryApi'
import DropdownIcon from '../icons/dropdown-icon.vue';
import SingleCategory from "../Nav/SingleCategory.vue";
const categoryDropdown = ref(true);
function showHide() {
  categoryDropdown.value = !categoryDropdown.value;
}
const {categoryData,  error,  showAllCategory} = showCategory();
onMounted(showAllCategory);
</script>
<template>
  <div class="w-[20rem] left hidden md:block">
      <div class="category text-center border-[#EBFAEB] border-2 rounded-md">
        <div @click="showHide" class="px-[1.5625rem] py-6 text-left bg-[#EBFAEB] rounded-t-md justify-between flex cursor-pointer">
          <h3 class="text-xl font-semibold poppins">Categories</h3>
          <div class="my-auto"><DropdownIcon></DropdownIcon></div>
        </div>
        <div v-if="categoryDropdown">
          <div v-if="error" class="bg-red-500">{{error.message}}</div>
          <div v-else-if="categoryData" class="text-base poppins">
            <ul class="block gap-6 text-left">
              <li class="block px-3 py-4 border-b border-gray-100" v-for="category in categoryData">
                <a v-if="category.child.length == 0" href="#" class="flex justify-between">
                  <div class="flex">
                    <div class="flex w-8 mr-2"><img v-bind:src="category.icon" class="flex w-full"/></div>
                    <div class="my-auto">{{category.name}}</div>
                  </div>
                  <div class="my-auto rotate-90"><DropdownIcon></DropdownIcon></div>
                </a>
                <div class="block" v-else>
                  <SingleCategory :singleCategory="category" :child="0"></SingleCategory>
                </div>
              </li>
            </ul>
          </div>
        </div>
        

      </div>
  </div>
</template>

<style scoped>

</style>
