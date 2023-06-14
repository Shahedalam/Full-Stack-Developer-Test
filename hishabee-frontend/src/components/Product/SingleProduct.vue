<script setup>
import { onMounted, ref } from "vue";
import { Modal } from 'flowbite-vue'
import StarIcon from "../icons/star-icon.vue";
const props = defineProps(["singleProduct"]);
const productCounter = ref(1);
function increase(){
    productCounter.value = productCounter.value +2;
}
function decrease(){
    productCounter.value--;
}
const isShowModal = ref(false)
function closeModal() {
  isShowModal.value = false
}
function showModal() {
  isShowModal.value = true
}
</script>
<template>
  <div class="relative block singleProductGridView">
    <div class="flex w-full bg-[#F5F5F5] max-h-[28.125rem] rounded-md">
      <img class="flex w-full" :src="props.singleProduct.thumbnail_img" />
    </div>
    <div
      class="absolute w-24 pt-1 pb-3 pl-10 pr-2 text-white bg-gray-900 rounded-md top-8 left-8"
    >
      New
    </div>
    <div class="absolute bottom-0 w-full h-full singleProductAdd ">
      <div class="h-[90%] relative">
        <div class="absolute block pt-[30vh] md:pt-[18vh] lg:pt-[34vh] xl:pt-[21vh] 2xl:pt-[21vh] w-full" style="z-index: 5">
          <div @click="decrease" class="flex mx-auto ml-[13vw] md:ml-[6vh] lg:ml-[22vh] xl:ml-[15vh] 2xl:ml-[10vh]">
            <svg
              width="60"
              height="60"
              viewBox="0 0 60 60"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <rect x="0.5" y="0.5" width="59" height="59" rx="29.5" stroke="white" />
              <path
                d="M23 29H37C37.2652 29 37.5196 29.1054 37.7071 29.2929C37.8946 29.4804 38 29.7348 38 30C38 30.2652 37.8946 30.5196 37.7071 30.7071C37.5196 30.8946 37.2652 31 37 31H23C22.7348 31 22.4804 30.8946 22.2929 30.7071C22.1054 30.5196 22 30.2652 22 30C22 29.7348 22.1054 29.4804 22.2929 29.2929C22.4804 29.1054 22.7348 29 23 29Z"
                fill="white"
              />
            </svg>
            <div class="rounded-[50%] mx-5 bg-white w-16 text-center text-3xl block pt-2.5 text-[#27AE60]"><span>{{ productCounter }}</span></div>
            <svg @click="increase"
              width="60"
              height="60"
              viewBox="0 0 60 60"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <rect x="0.5" y="0.5" width="59" height="59" rx="29.5" stroke="white" />
              <path
                d="M30 22C29.4477 22 29 22.4477 29 23V29H23C22.4477 29 22 29.4477 22 30C22 30.5523 22.4477 31 23 31H29V37C29 37.5523 29.4477 38 30 38C30.5523 38 31 37.5523 31 37V31H37C37.5523 31 38 30.5523 38 30C38 29.4477 37.5523 29 37 29H31V23C31 22.4477 30.5523 22 30 22Z"
                fill="white"
              />
            </svg>
          </div>
          <div class="block mx-auto ml-[13vw] md:ml-[6vh] lg:ml-[22vh] xl:ml-[15vh] 2xl:ml-[10vh]">
            <button type="button"  @click="showModal" class="mt-4 px-16 py-4 text-lg bg-[#27AE60] text-white" style="border-radius: 2rem;">Add to Cart</button>
          </div>
        </div>
        <div class="w-full h-full opacity-50" style="background: #333"></div>
      </div>
      <div class="bg-[#F2F2F2] flex justify-center w-full py-2.5">
        Details
        <svg
          class="my-auto ml-1"
          width="12"
          height="10"
          viewBox="0 0 12 10"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M6.19518 0.528636C5.93483 0.788986 5.93483 1.2111 6.19518 1.47145L9.05711 4.33337H1.33325C0.965062 4.33337 0.666586 4.63185 0.666586 5.00004C0.666586 5.36823 0.965062 5.66671 1.33325 5.66671H9.05711L6.19518 8.52864C5.93483 8.78898 5.93483 9.21109 6.19518 9.47144C6.45553 9.73179 6.87764 9.73179 7.13799 9.47144L11.138 5.47144C11.263 5.34642 11.3333 5.17685 11.3333 5.00004C11.3333 4.82323 11.263 4.65366 11.138 4.52864L7.13799 0.528636C6.87764 0.268287 6.45553 0.268287 6.19518 0.528636Z"
            fill="#999999"
          />
        </svg>
      </div>
    </div>
  </div>
  <div class="relative mt-5 block text-[14px] text-center text-[#BDBDBD]">
    {{ props.singleProduct.category.name }}
  </div>
  <div class="flex justify-center mt-2">
    <div class="flex my-auto">
      <StarIcon class="mr-1"></StarIcon>
      <StarIcon class="mr-1"></StarIcon>
      <StarIcon class="mr-1"></StarIcon>
      <StarIcon class="mr-1"></StarIcon>
      <StarIcon class="mr-1"></StarIcon>
    </div>
    <span class="ml-1 text-[#4F4F4F] my-auto text-[14px]">(121)</span>
  </div>
  <div class="flex justify-center mt-2 text-lg font-medium text-[#333333]">
    {{ props.singleProduct.name }}
  </div>
  <div
    v-if="props.singleProduct.discount > 0"
    class="flex justify-center mt-2 text-lg font-medium"
  >
    <span class="text-[#FF5C00] mr-3"
      >${{
        parseInt(props.singleProduct.price) - parseInt(props.singleProduct.discount)
      }}</span
    >
    <span class="text-[#BDBDBD]" style="text-decoration-line: line-through"
      >${{ props.singleProduct.price }}</span
    >
  </div>
  <div v-else class="flex justify-center mt-2 text-lg font-medium">
    <span class="text-[#FF5C00] mr-3">${{ props.singleProduct.price }}</span>
  </div>


  
  <Modal size="5xl" v-if="isShowModal" @close="closeModal" class="rounded-lg">
      <template #body class="">
        <div class="flex gap-4">
            <div class="block w-1/2">
                <div class="flex w-full max-h-[30rem]">
                    <img class="flex w-full" :src="props.singleProduct.thumbnail_img" />
                </div>
            </div>
            <div class="block w-1/2">
                <div class="flex">
                    <span class="mr-2">Status</span>
                    <span>In stock</span>
                </div>
                <div class="flex justify-start mt-2 text-3xl font-medium text-[#333333]">
                    {{ props.singleProduct.name }}
                </div>
                <div class="flex justify-start mt-2">
                    <div class="flex my-auto">
                    <StarIcon class="mr-1"></StarIcon>
                    <StarIcon class="mr-1"></StarIcon>
                    <StarIcon class="mr-1"></StarIcon>
                    <StarIcon class="mr-1"></StarIcon>
                    <StarIcon class="mr-1"></StarIcon>
                    </div>
                    <span class="ml-1 text-[#4F4F4F] my-auto text-[14px]">(121)</span>
                </div>
                <div
                    v-if="props.singleProduct.discount > 0"
                    class="flex justify-start gap-4 mt-2 text-4xl font-bold"
                >
                    <span class="text-[#333333] mr-3 text-4xl"
                    >${{
                        parseInt(props.singleProduct.price) - parseInt(props.singleProduct.discount)
                    }}</span
                    >
                    <span class="text-[#BDBDBD]" style="text-decoration-line: line-through"
                    >${{ props.singleProduct.price }}</span>
                    <span class="text-base">15% vat included</span>
                </div>
            </div>
        </div>
      </template>
      <template #footer>
        <div class="flex justify-between">
          <button @click="closeModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
            Close
          </button>
          <!-- <button @click="closeModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            I accept
          </button> -->
        </div>
      </template>
    </Modal>
  
</template>
