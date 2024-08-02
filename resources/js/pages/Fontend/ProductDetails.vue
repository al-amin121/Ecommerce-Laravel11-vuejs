<script setup>
import { FwbRating } from 'flowbite-vue'
import Products from "@/components/ProductCard.vue"
import useAxios from "@/composables/useAxios.js";
import { useRoute } from 'vue-router'
import { ref, onMounted } from 'vue';

const route = useRoute();

const sendRequest = useAxios();

const product = ref();

const getProduct = ( async () => {
    try {
            const respons = await sendRequest({
                method:'get',
                url:`api/Products/${route.params.id}`,
            });
            console.log(respons?.data)
            product.value = respons.data;
        } catch (error) {
        console.error('Error fetching product:', error);
    }   
});
 onMounted ( () => {
    getProduct()
 })
</script>
<template>
    <GuestLayout>
        <nav class="flex py-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <router-link to="/"  class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Home
                    </router-link>
                </li>
                <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <router-link to="/products"  class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Products</router-link>
                </div>
                </li>
                <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Product-Details</span>
                </div>
                </li>
            </ol>
        </nav>

        <div class="flex w-full gap-5 ">
            <div class="w-2/12 flex flex-col justify-center items-center gap-3 ">
                <div v-if="product" v-for="image in product.images" :key="image.id">
                    <img :src="image.url" class="w-28 h-28 flex justify-center items-center bg-Secondary ">
                </div>
            </div>
            <div class="w-6/12 bg-Secondary">
                <img src="@/assets/images/d1.png" class="bg-cover p-5 flex justify-center items-center  ">
            </div>
            <div class="w-4/12 ms-5">
                <h1 class="font-semibold text-2xl ">{{ product?.title }}</h1>
                <div class="flex justify-start items-center h-2 my-5 text-sm font-normal">
                    <fwb-rating
                        :rating="4.75"
                        :scale="5"
                        review-link="/"
                        review-text="(73 reviews)"
                    >
                    </fwb-rating>
                    <span class="ms-2">|<span class="ms-2 text-primary text-sm font-normal" >In Stock</span></span>
                </div>
                <h1 class="font-Inter font-normal text-2xl">${{ product?.offer_price }}</h1>
                <p class="font-normal text-sm my-5">PlayStation 5 Controller Skin High quality vinyl with air channel adhesive for easy bubble free install & mess free removal Pressure sensitive.</p>
                <div class="flex justify-start items-center gap-5 my-5">
                    <div class="flex border-2 border-black w-40 h-11 ">
                        <div class="border-r-2 w-10 border-black flex justify-center items-center"><span class="w-4 h-[2px] bg-black"></span></div>
                        <p class="w-20 flex justify-center items-center font-medium text-xl">1</p>
                        <div class="border-l-2 w-10 border-black flex justify-center items-center"><span class="w-4 h-[2px] bg-black"></span><span class="w-[1px] h-4 bg-black -ms-2"></span></div>
                    </div>
                    <button class="bg-primary px-10 py-2 font-medium text-lg text-white">Buy Now</button>
                </div>

                <div class="border border-black">
                   <div class="flex justify-start items-center gap-10 border-b border-black p-5">
                        <img src="@/assets/Icon/fast-delivery.png" class="w-10 h-10 ">
                        <div>
                            <h1 class="font-semibold text-xl mb-2">Free Delivery</h1>
                            <p class="font-medium text-xs underline" >Enter your postal code for Delivery Availability</p>
                        </div>
                   </div>
                   <div class="flex justify-start items-center gap-10 border-b border-black p-5">
                        <img src="@/assets/Icon/Return.png" class="w-10 h-10 ">
                        <div>
                            <h1 class="font-semibold text-xl mb-2">Return Delivery</h1>
                            <p class="font-medium text-xs underline" >Free 30 Days Delivery Returns. Details</p>
                        </div>
                   </div>
                </div>
                
            </div>
        </div>
        <hr class="py-10">
        <div class="flex gap-2 items-center">
            <div class="w-3 h-6 bg-primary "></div>
            <p class="text-xl font-bold text-primary ">Description :</p>
        </div>
        <div class="my-5 px-10">
            <p>{{ product?.description }}</p>
        </div>
        <div class="flex gap-2 items-center py-5">
            <div class="w-3 h-6 bg-primary "></div>
            <p class="text-xl font-bold text-primary ">Related Item</p>
        </div>
        <div class="grid grid-cols-5 gap-5">
            <Products/>
            <Products/>
            <Products/>
            <Products/>
            <Products/>
        </div>

    </GuestLayout>
</template>