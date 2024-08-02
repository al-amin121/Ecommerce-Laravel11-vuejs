<script setup>
import {useAuthStore} from "@/stores/useAuthStore.js";

const auth = useAuthStore();
</script>
<template>
    <AppLayout>
        <div class="mb-40">
            <div class="w-full h-40 flex justify-center items-center bg-gray-200 text-black shadow ">
                 <h1 class="text-5xl font-semibold">Well Come <span class="text-primary">{{ auth?.user?.name}}</span>....</h1>
            </div>
            <div class="mt-5 grid grid-cols-3 gap-5">
                 <div class=" flex justify-center items-center ">
                    <div class="bg-gray-200  drop-shadow-2xl px-5 py-3 w-60 h-28">
                        <h1 class="text-2xl font-semibold uppercase">seals</h1>
                        <h5 class="text-xl font-semibold flex justify-end items-end mt-5">$ 50000</h5>
                    </div>
                 </div>
                 <div class=" flex justify-center items-center ">
                    <div class="bg-gray-200  drop-shadow-2xl px-5 py-3 w-60 h-28">
                        <h1 class="text-2xl font-semibold uppercase">Products</h1>
                        <h5 class="text-xl font-semibold flex justify-end items-end mt-5">50000</h5>
                    </div>
                 </div>
                 <div class=" flex justify-center items-center ">
                    <div class="bg-gray-200  drop-shadow-2xl px-5 py-3 w-60 h-28">
                        <h1 class="text-2xl font-semibold uppercase">Orders</h1>
                        <h5 class="text-xl font-semibold flex justify-end items-end mt-5">50000</h5>
                    </div>
                 </div>
            </div>
        </div>
    </AppLayout>
</template>