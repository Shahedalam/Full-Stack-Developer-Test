<script setup>
import {onMounted,ref} from "vue";
import Products from '../../composables/productApi'
import SingleProduct from "./SingleProduct.vue";
const {productData,  error,  showAllProduct} = Products();
onMounted(showAllProduct);
</script>
<template>
    <div class="max-w-[79.7rem] right block px-6">
        <div class="flex w-full max-h-[18.75rem]">
            <img class="flex w-full" src="img/hero-bg.png">
        </div>
        <div class="block my-4 text-4xl font-bold">Fruits Collection</div>
        <div class="justify-between block my-4 text-base font-normal xl:flex">
            <div class="flex">
                <span class="mr-2 md:mr-4 xl:mr-8 text-[#828282]">Fruits</span>|
                <span class="mx-2 md:mx-4 xl:mx-8 text-[#828282]">Green Fruits</span>|
                <span class="ml-2 md:ml-4 xl:ml-8 text-[#333333] font-semibold">Fresh Fruits</span>
            </div>
            <div class="flex justify-end mt-5 font-medium text-center poppins xl:mt-0">
                <div class="mr-7">20 products found</div>
                <div class="mr-7">
                    <svg width="26" height="16" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.375 0.5C1.12777 0.5 0.886099 0.573311 0.680538 0.710663C0.474977 0.848015 0.314761 1.04324 0.220151 1.27165C0.125542 1.50005 0.100787 1.75139 0.149019 1.99386C0.19725 2.23634 0.316301 2.45907 0.491117 2.63388C0.665933 2.8087 0.888661 2.92775 1.13114 2.97598C1.37361 3.02421 1.62495 2.99946 1.85335 2.90485C2.08176 2.81024 2.27699 2.65002 2.41434 2.44446C2.55169 2.2389 2.625 1.99723 2.625 1.75C2.625 1.41848 2.4933 1.10054 2.25888 0.866117C2.02446 0.631696 1.70652 0.5 1.375 0.5ZM6.375 3H23.875C24.2065 3 24.5245 2.8683 24.7589 2.63388C24.9933 2.39946 25.125 2.08152 25.125 1.75C25.125 1.41848 24.9933 1.10054 24.7589 0.866117C24.5245 0.631696 24.2065 0.5 23.875 0.5H6.375C6.04348 0.5 5.72554 0.631696 5.49112 0.866117C5.2567 1.10054 5.125 1.41848 5.125 1.75C5.125 2.08152 5.2567 2.39946 5.49112 2.63388C5.72554 2.8683 6.04348 3 6.375 3ZM6.375 6.75C6.12777 6.75 5.8861 6.82331 5.68054 6.96066C5.47498 7.09801 5.31476 7.29324 5.22015 7.52164C5.12554 7.75005 5.10079 8.00139 5.14902 8.24386C5.19725 8.48634 5.3163 8.70907 5.49112 8.88388C5.66593 9.0587 5.88866 9.17775 6.13114 9.22598C6.37361 9.27421 6.62495 9.24946 6.85335 9.15485C7.08176 9.06024 7.27698 8.90002 7.41434 8.69446C7.55169 8.4889 7.625 8.24723 7.625 8C7.625 7.66848 7.4933 7.35054 7.25888 7.11612C7.02446 6.8817 6.70652 6.75 6.375 6.75ZM11.375 13C11.1278 13 10.8861 13.0733 10.6805 13.2107C10.475 13.348 10.3148 13.5432 10.2201 13.7716C10.1255 14.0001 10.1008 14.2514 10.149 14.4939C10.1972 14.7363 10.3163 14.9591 10.4911 15.1339C10.6659 15.3087 10.8887 15.4277 11.1311 15.476C11.3736 15.5242 11.6249 15.4995 11.8534 15.4048C12.0818 15.3102 12.277 15.15 12.4143 14.9445C12.5517 14.7389 12.625 14.4972 12.625 14.25C12.625 13.9185 12.4933 13.6005 12.2589 13.3661C12.0245 13.1317 11.7065 13 11.375 13ZM23.875 6.75H11.375C11.0435 6.75 10.7255 6.8817 10.4911 7.11612C10.2567 7.35054 10.125 7.66848 10.125 8C10.125 8.33152 10.2567 8.64946 10.4911 8.88388C10.7255 9.1183 11.0435 9.25 11.375 9.25H23.875C24.2065 9.25 24.5245 9.1183 24.7589 8.88388C24.9933 8.64946 25.125 8.33152 25.125 8C25.125 7.66848 24.9933 7.35054 24.7589 7.11612C24.5245 6.8817 24.2065 6.75 23.875 6.75ZM23.875 13H16.375C16.0435 13 15.7255 13.1317 15.4911 13.3661C15.2567 13.6005 15.125 13.9185 15.125 14.25C15.125 14.5815 15.2567 14.8995 15.4911 15.1339C15.7255 15.3683 16.0435 15.5 16.375 15.5H23.875C24.2065 15.5 24.5245 15.3683 24.7589 15.1339C24.9933 14.8995 25.125 14.5815 25.125 14.25C25.125 13.9185 24.9933 13.6005 24.7589 13.3661C24.5245 13.1317 24.2065 13 23.875 13Z" fill="#4F4F4F"/>
                    </svg>
                </div>
                <div class="mr-7">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0H5V5H0V0Z" fill="#BDBDBD"/>
                        <path d="M0 7.5H5V12.5H0V7.5Z" fill="#BDBDBD"/>
                        <path d="M5 15H0V20H5V15Z" fill="#BDBDBD"/>
                        <path d="M7.5 0H12.5V5H7.5V0Z" fill="#BDBDBD"/>
                        <path d="M12.5 7.5H7.5V12.5H12.5V7.5Z" fill="#BDBDBD"/>
                        <path d="M7.5 15H12.5V20H7.5V15Z" fill="#BDBDBD"/>
                        <path d="M20 0H15V5H20V0Z" fill="#BDBDBD"/>
                        <path d="M15 7.5H20V12.5H15V7.5Z" fill="#BDBDBD"/>
                        <path d="M20 15H15V20H20V15Z" fill="#BDBDBD"/>
                    </svg>

                </div>
                <div class="">
                    <select>
                        <option value="1">Default Sorting</option>
                    </select>
                </div>
            </div>
        </div>
        <div v-if="error" class="bg-red-500">{{error.message}}</div>
        <div v-else-if="productData" class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3">
            <div class="block col-span-1" v-for="product in productData">
                <SingleProduct :singleProduct="product"/>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
