<script setup>
  import { FwbRating } from 'flowbite-vue'
</script>
<template>
     
        <div class="card scroll-snap-align-start p-1 cursor-pointer flex flex-col items-start justify-start pb-4">
            <div class="group relative cursor-pointer  items-center justify-center overflow-hidden">
            <div class="h-40 w-60 bg-gray-100">
                <img src="@/assets/images/img-3.png" alt="img" class="h-40 w-full object-cover"/>
            </div>
            <div class="absolute inset-0 flex translate-y-[80%] flex-col  justify-end  text-center transition-all duration-500 group-hover:translate-y-0">
                <button type="button" class="bg-primary py-2 px-3.5 font-semibold text-lg capitalize text-white shadow shadow-black/60">Add To Cart</button>
            </div>
            </div>
            <router-link to="/product-details">
                <h2 class="font-semibold text-xl line-clamp-1 hover:underline hover:decoration-primary ">Blanche Pearson1</h2>
            </router-link>
            <div class="flex justify-start items-center gap-2 py-4 font-medium text-lg">
                <p class=" text-primary">$2999</p>
                <p class="line-through text-gray-700">$2999</p>
            </div>
            <fwb-rating :rating="4.75">
                <template #besideText>
                <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                    (55)
                </p>
                </template>
            </fwb-rating>
        </div>
  </template>
  
 
  
  
  <style scoped>
  
  </style>
  