<script setup>
import { onMounted, ref, inject } from "vue";
import { Modal } from "flowbite-vue";
import StarIcon from "../icons/star-icon.vue";
const props = defineProps(["singleProduct"]);
const productCounter = ref(1);
const productImage = ref(props.singleProduct.thumbnail_img);
// productImage.value = ;

function changeImage(image) {
  productImage.value = image;

  console.log(productImage.value);
}
function increase() {
  productCounter.value++;
}
function decrease() {
  if (productCounter.value > 0) {
    productCounter.value--;
  }
}
const isShowModal = ref(false);
function closeModal() {
  isShowModal.value = false;
}
function showModal() {
  isShowModal.value = true;
}
function smallWindowShowModal(){
  if(document.body.clientWidth < 768){
    showModal();
  }
}
const domain = inject("domain");

var data = {};

if (localStorage.getItem("cart")) {
  data = JSON.parse(localStorage.getItem("cart"));
}
if (data[props.singleProduct.id]) {
  productCounter.value = data[props.singleProduct.id];
}
function updateCart() {
  if (localStorage.getItem("cart")) {
    data = JSON.parse(localStorage.getItem("cart"));
  }
  data[props.singleProduct.id] = productCounter.value;

  localStorage.setItem("cart", JSON.stringify(data));
  console.log("Cart" + data);
  alert("cart updated");
}
</script>
<template>
  <div class="relative block singleProductGridView" @click="smallWindowShowModal">
    <div class="flex w-full bg-[#F5F5F5] max-h-[28.125rem] rounded-md">
      <img class="flex w-full" :src="props.singleProduct.thumbnail_img" />
    </div>
    <div
      class="absolute w-24 pt-1 pb-3 pl-10 pr-2 text-white bg-gray-900 rounded-md top-8 left-8"
    >
      New
    </div>
    <div class="absolute bottom-0 w-full h-full singleProductAdd">
      <div class="h-[90%] relative" style="transform: translate(19%, 50%)">
        <div class="absolute block w-full" style="z-index: 5; width: 60%">
          <div class="grid grid-cols-3 gap-3 mx-auto">
            <div class="flex col-span-1">
              <svg
                @click="decrease"
                class="flex object-scale-down"
                width="100%"
                height="100%"
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
            </div>
            <div class="col-span-1">
              <div
                class="rounded-[50%] bg-white text-center text-3xl text-[#27AE60] h-full grid"
              >
                <span class="my-auto">{{ productCounter }}</span>
              </div>
            </div>
            <div class="flex col-span-1">
              <svg
                @click="increase"
                class="flex object-scale-down"
                width="100%"
                height="100%"
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
          </div>
          <div class="block mx-auto">
            <button
              type="button"
              @click="showModal"
              class="mt-4 py-4 text-lg bg-[#27AE60] text-white text-center w-full"
              style="border-radius: 2rem"
            >
              Add to Cart
            </button>
          </div>
        </div>
        <div
          class="w-full h-full opacity-50"
          style="background: #333; transform: translate(-19%, -50%)"
        ></div>
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

  <Modal size="7xl" v-if="isShowModal" @close="closeModal" class="rounded-3xl">
    <template #body class="">
      <div class="block gap-10 md:flex">
        <div class="block w-full md:w-1/2">
          <div class="flex w-full max-h-[9rem] md:max-h-[30rem]">
            <img class="flex object-cover w-full" :src="productImage" />
          </div>
          <div class="grid grid-cols-5 gap-4 mt-5">
            <div
              class="flex col-span-1 cursor-pointer"
              @click="changeImage(domain + '/img/unsplash_AvvdZlhDowA.png')"
            >
              <img
                class="flex object-cover w-full"
                :src="domain + '/img/unsplash_AvvdZlhDowA.png'"
              />
            </div>
            <div
              class="flex col-span-1 cursor-pointer"
              @click="changeImage(domain + '/img/unsplash_cRNUvWM9l_I.png')"
            >
              <img
                class="flex object-cover w-full"
                :src="domain + '/img/unsplash_cRNUvWM9l_I.png'"
              />
            </div>
            <div
              class="flex col-span-1 cursor-pointer"
              @click="changeImage(domain + '/img/unsplash_CvuSzblwCrU.png')"
            >
              <img
                class="flex object-cover w-full"
                :src="domain + '/img/unsplash_CvuSzblwCrU.png'"
              />
            </div>
            <div
              class="flex col-span-1 cursor-pointer"
              @click="changeImage(domain + '/img/unsplash_d2aZ2MJBSeU.png')"
            >
              <img
                class="flex object-cover w-full"
                :src="domain + '/img/unsplash_d2aZ2MJBSeU.png'"
              />
            </div>
            <div
              class="flex col-span-1 cursor-pointer"
              @click="changeImage(domain + '/img/unsplash_Gq_DmpdCzHE.png')"
            >
              <img
                class="flex object-cover w-full"
                :src="domain + '/img/unsplash_Gq_DmpdCzHE.png'"
              />
            </div>
          </div>
          <div class="w-full mt-5 mb-5">
            <a href="#" class="flex justify-center w-40 mx-auto">
              <svg
                width="24"
                height="18"
                viewBox="0 0 24 18"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M16.0001 9C16.0001 11.2091 14.2093 13 12.0001 13C9.79098 13 8.00012 11.2091 8.00012 9C8.00012 6.79086 9.79098 5 12.0001 5C14.2093 5 16.0001 6.79086 16.0001 9ZM14.0001 9C14.0001 10.1046 13.1047 11 12.0001 11C10.8956 11 10.0001 10.1046 10.0001 9C10.0001 7.89543 10.8956 7 12.0001 7C13.1047 7 14.0001 7.89543 14.0001 9Z"
                  fill="#666666"
                />
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M12.0001 0C17.5916 0 22.2899 3.82432 23.6221 9C22.2899 14.1757 17.5916 18 12.0001 18C6.4086 18 1.7103 14.1757 0.378174 9C1.7103 3.82432 6.4086 0 12.0001 0ZM12.0001 16C7.52456 16 3.73144 13.0581 2.45735 9C3.73144 4.94186 7.52456 2 12.0001 2C16.4757 2 20.2688 4.94186 21.5429 9C20.2688 13.0581 16.4757 16 12.0001 16Z"
                  fill="#666666"
                />
              </svg>
              <span class="my-auto ml-2">View more details</span>
            </a>
          </div>
        </div>
        <div class="block w-full md:w-1/2">
          <div class="flex">
            <span class="mr-2 text-[#BDBDBD]">STATUS</span>
            <span class="text-[#219653]">In stock</span>
          </div>
          <div
            class="flex justify-start mt-2 text-3xl font-medium text-[#333333] leading-[2.5rem]"
          >
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
            class="flex justify-start mt-2 text-4xl font-bold"
          >
            <span class="text-[#333333] mr-3 text-4xl leading-[2.875rem]"
              >${{
                parseInt(props.singleProduct.price) -
                parseInt(props.singleProduct.discount)
              }}</span
            >
            <span
              class="text-[#828282] text-[1.75rem] leading-[2.875rem] text-base"
              style="text-decoration-line: line-through"
              >${{ props.singleProduct.price }}</span
            >
            <span class="my-auto ml-4 text-base text-[#828282]">(+15% Vat Included)</span>
          </div>
          <div v-else class="flex justify-start mt-2 text-4xl font-bold">
            <span class="text-[#333333] mr-3 text-4xl leading-[2.875rem]"
              >${{ parseInt(props.singleProduct.price) }}</span
            >
            <span class="my-auto ml-4 text-base text-[#828282]">(+15% Vat Included)</span>
          </div>
          <p class="text-base font-semibold text-[#4F4F4F] mt-4">
            20 Products sold in last 12 hours
          </p>
          <div class="block mt-10 md:flex">
            <div class="flex">
              <span class="text-base font-semibold text-[#4F4F4F] mr-10 my-auto"
              >QUANTITY</span
            >
            <div class="grid grid-cols-3 gap-3">
              <div class="flex col-span-1">
                <svg
                  @click="decrease"
                  class="w-full h-full cursor-pointer"
                  width="60"
                  height="60"
                  viewBox="0 0 60 60"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <rect
                    x="0.5"
                    y="0.5"
                    width="59"
                    height="59"
                    rx="29.5"
                    stroke="#BDBDBD"
                  />
                  <path
                    d="M23 29H37C37.2652 29 37.5196 29.1054 37.7071 29.2929C37.8946 29.4804 38 29.7348 38 30C38 30.2652 37.8946 30.5196 37.7071 30.7071C37.5196 30.8946 37.2652 31 37 31H23C22.7348 31 22.4804 30.8946 22.2929 30.7071C22.1054 30.5196 22 30.2652 22 30C22 29.7348 22.1054 29.4804 22.2929 29.2929C22.4804 29.1054 22.7348 29 23 29Z"
                    fill="black"
                  />
                </svg>
              </div>
              <div class="col-span-1">
                <div
                  class="rounded-[50%] bg-[#F2F2F2] text-center text-xl text-black h-full grid font-bold"
                >
                  <span class="my-auto">{{ productCounter }}</span>
                </div>
              </div>
              <div class="flex col-span-1">
                <svg
                  @click="increase"
                  class="w-full h-full cursor-pointer"
                  width="60"
                  height="60"
                  viewBox="0 0 60 60"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <rect
                    x="0.5"
                    y="0.5"
                    width="59"
                    height="59"
                    rx="29.5"
                    stroke="#BDBDBD"
                  />
                  <path
                    d="M30 22C29.4477 22 29 22.4477 29 23V29H23C22.4477 29 22 29.4477 22 30C22 30.5523 22.4477 31 23 31H29V37C29 37.5523 29.4477 38 30 38C30.5523 38 31 37.5523 31 37V31H37C37.5523 31 38 30.5523 38 30C38 29.4477 37.5523 29 37 29H31V23C31 22.4477 30.5523 22 30 22Z"
                    fill="#0D0D0D"
                  />
                </svg>
              </div>
            </div>
            </div>
            
            <span class="text-sm text-[#828282]  mt-5 md:my-auto md:ml-10">Only !0 Item Left!</span>
          </div>
          <div class="block mx-auto">
            <button
              @click="updateCart()"
              type="button"
              class="mt-4 py-4 text-lg bg-[#27AE60] text-white text-center w-full"
              style="border-radius: 2rem"
            >
              Add to Cart
            </button>
          </div>
          <div class="block mx-auto">
            <button
              type="button"
              class="mt-4 py-4 text-lg bg-[#F2F2F2] text-[#4F4F4F] text-center w-full"
              style="border-radius: 2rem"
            >
              Buy Now
            </button>
          </div>
          <div class="grid grid-cols-3 mt-5">
            <div class="flex col-span-1 cursor-pointer">
              <svg
                width="20"
                height="18"
                viewBox="0 0 20 18"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M10 1.52765C7.64418 -0.583106 4.02125 -0.506535 1.75736 1.75736C-0.585786 4.1005 -0.585786 7.8995 1.75736 10.2426L8.58579 17.0711C9.36684 17.8521 10.6332 17.8521 11.4142 17.0711L18.2426 10.2426C20.5858 7.8995 20.5858 4.1005 18.2426 1.75736C15.9787 -0.506535 12.3558 -0.583106 10 1.52765ZM8.82843 3.17157L9.29289 3.63604C9.68342 4.02656 10.3166 4.02656 10.7071 3.63604L11.1716 3.17157C12.7337 1.60948 15.2663 1.60948 16.8284 3.17157C18.3905 4.73367 18.3905 7.26633 16.8284 8.82843L10 15.6569L3.17157 8.82843C1.60948 7.26633 1.60948 4.73367 3.17157 3.17157C4.73367 1.60948 7.26633 1.60948 8.82843 3.17157Z"
                  fill="#4F4F4F"
                />
              </svg>
              <span class="my-auto ml-2">Add to Wishlist</span>
            </div>
            <div class="flex col-span-1 text-center cursor-pointer">
              <svg
                width="18"
                height="20"
                viewBox="0 0 18 20"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M14 5H4V9H2V4C2 3.44772 2.44772 3 3 3H14V0L18 4L14 8V5ZM4 15H14V11H16V16C16 16.5523 15.5523 17 15 17H4V20L0 16L4 12V15Z"
                  fill="#4F4F4F"
                />
              </svg>

              <span class="my-auto ml-2">Add to Wishlist</span>
            </div>
            <div class="flex float-right col-span-1 cursor-pointer">
              <svg
                width="20"
                height="18"
                viewBox="0 0 20 18"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M10 1.52765C7.64418 -0.583106 4.02125 -0.506535 1.75736 1.75736C-0.585786 4.1005 -0.585786 7.8995 1.75736 10.2426L8.58579 17.0711C9.36684 17.8521 10.6332 17.8521 11.4142 17.0711L18.2426 10.2426C20.5858 7.8995 20.5858 4.1005 18.2426 1.75736C15.9787 -0.506535 12.3558 -0.583106 10 1.52765ZM8.82843 3.17157L9.29289 3.63604C9.68342 4.02656 10.3166 4.02656 10.7071 3.63604L11.1716 3.17157C12.7337 1.60948 15.2663 1.60948 16.8284 3.17157C18.3905 4.73367 18.3905 7.26633 16.8284 8.82843L10 15.6569L3.17157 8.82843C1.60948 7.26633 1.60948 4.73367 3.17157 3.17157C4.73367 1.60948 7.26633 1.60948 8.82843 3.17157Z"
                  fill="#4F4F4F"
                />
              </svg>
              <span class="my-auto ml-2">Add to Wishlist</span>
            </div>
          </div>
          <hr class="mt-7" />
          <div class="flex mt-5">
            {{ props.tags }}
            <div class="block">
              <div class="grid grid-cols-2 mt-5">
                <div class="font-medium text-[#BDBDBD] uppercase text-base">Sku</div>
                <div class="font-medium">{{ props.singleProduct.sku }}</div>
              </div>
              <div class="grid grid-cols-2 mt-5">
                <div class="font-medium text-[#BDBDBD] uppercase text-base">category</div>
                <div class="font-medium">{{ props.singleProduct.category.name }}</div>
              </div>
              <div class="grid grid-cols-2 mt-5">
                <div class="font-medium text-[#BDBDBD] uppercase text-base">tags</div>
                <div class="font-medium">Food, Fruits, Vegetables</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </template>
    <!-- <template #footer>
      <div class="flex justify-between">
        <button
          @click="closeModal"
          type="button"
          class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
        >
          Close
        </button>
        <-- <button @click="closeModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            I accept
          </button> --
      </div>
    </template> -->
  </Modal>
</template>
