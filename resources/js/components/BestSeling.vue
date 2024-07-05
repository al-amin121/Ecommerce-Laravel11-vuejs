<script setup> 
import ProductCard from '@/components/ProductCard.vue';
</script>
<template>
    <div class="flex justify-between">
        <div class="flex gap-5  items-end">
            <h2 class="font-Inter font-semibold text-4xl">Best Selling Products</h2>
            <div class="flex gap-2 items-end ms-20">
                <TimeCount/>
            </div>
        </div>
        <button type="button" class="text-white bg-primary  hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-semibold  text-xl px-5 py-2 text-center ">View All</button>
    </div>
    <div class="grid grid-cols-4 gap-5 py-10">
        <ProductCard/>
        <ProductCard/>
        <ProductCard/>
        <ProductCard/>
    </div>
</template>
  

  