<script setup>
import { ref } from 'vue';

const Dropdown = ref(false)

</script>
<template>
    <div class="ps-5 pe-1 py-5 ">
        <img class="h-10 w-auto" src="@/assets/logo/Footer.png" alt="Your Company logo/name" />
        <hr class="my-10">
         
        <div>
            <ul>

                <li class="font-semibold text-xl ps-1 rounded hover:rounded-none  py-1 mb-2 w-full bg-Secondary hover:bg-gray-200 hover:text-green-500 hover:border-r-4 border-primary ">
                    <router-link to="/dashbord">Dashboard</router-link>
                </li>
                <li @click="Dropdown = !Dropdown" class="font-semibold rounded hover:rounded-none text-xl ps-1 py-1 mb-2 w-full bg-Secondary hover:bg-gray-200 hover:text-green-500 hover:border-r-4 border-primary cursor-pointer">
                    Category
                    
                </li>
                <ul v-if="Dropdown" class="-mt-1 ms-2 mb-2">
                    <li class="font-semibold rounded hover:rounded-none text-lg ps-1 py-1 mb-1 w-full bg-Secondary hover:bg-gray-200 hover:text-green-500 hover:border-r-4 border-primary ">
                        <router-link to="/MainCategory">Main Category</router-link>
                    </li>
                    <li class="font-semibold text-lg rounded hover:rounded-none ps-1 py-1 mb-px w-full bg-Secondary hover:bg-gray-200 hover:text-green-500 hover:border-r-4 border-primary ">
                        <router-link to="/SubCategory">Sub Category</router-link>
                    </li>
                </ul>
                <li class="font-semibold text-xl ps-1 py-1 rounded hover:rounded-none mb-2 w-full bg-Secondary hover:bg-gray-200 hover:text-green-500 hover:border-r-4 border-primary ">
                    <router-link to="/brand">Brand</router-link>
                </li>
                <li class="font-semibold text-xl ps-1 py-1 rounded hover:rounded-none mb-2 w-full bg-Secondary hover:bg-gray-200 hover:text-green-500 hover:border-r-4 border-primary ">
                    <router-link to="/dashbord/products">Products</router-link>
                </li>
                <li class="font-semibold text-xl ps-1 py-1 rounded hover:rounded-none mb-2 w-full bg-Secondary hover:bg-gray-200 hover:text-green-500 hover:border-r-4 border-primary ">
                    <router-link to="">Dashboard</router-link>
                </li>
            </ul>
        </div>
    </div>
</template>


    