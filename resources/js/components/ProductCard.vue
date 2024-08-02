<script setup>
  import { FwbRating } from 'flowbite-vue'
  import useAxios from '@/composables/useAxios.js';
  import { ref, onMounted } from 'vue';

  const {sendRequest} = useAxios();

  const products = ref(null);
  
  const getproducts = (async () =>{
    const respons = await sendRequest({
        method:'get',
        url: '/api/Products',
    });
    products.value = respons.data;
  });

  onMounted( () => {
    getproducts()
  });

</script>
<template>
        <div v-for="product in products" :key="product.id" class="card scroll-snap-align-start p-1 cursor-pointer flex flex-col items-start justify-start pb-4">
            <div class="group relative cursor-pointer  items-center justify-center overflow-hidden">
                <div class="h-40 w-60 bg-gray-100">
                    <img :src="product.images[0].url" alt="img" class="h-40 w-full object-cover"/>
                </div>
                <div class="absolute inset-0 flex translate-y-[80%] flex-col  justify-end  text-center transition-all duration-500 group-hover:translate-y-0">
                    <button type="button" class="bg-primary py-2 px-3.5 font-semibold text-lg capitalize text-white shadow shadow-black/60">Add To Cart</button>
                </div>
            </div>
            <router-link :to="`/product-details/${product.id}`">
                <h2 class="font-semibold text-xl line-clamp-1 hover:underline hover:decoration-primary ">{{ product.title }}</h2>
            </router-link>
            <div class="flex justify-start items-center gap-2 py-4 font-medium text-lg">
                <p class=" text-primary">${{product.offer_price}}</p>
                <p class="line-through text-gray-700">${{ product.price}}</p>
            </div>
            <fwb-rating :rating="4.75">
                <template #besideText>
                <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                    4.6/5
                </p>
                </template>
            </fwb-rating>
        </div>
  </template>
  
 
  
  
  <style scoped>
  
  </style>
  