<style>
    .dropdown:hover ul{
            display: initial;
    }
</style>
<script setup>
import { ref } from 'vue';

const Dropdown = ref(false)

</script>
<template>
    <nav>
        <!-- maximum Main category 8 set and child 6--> 
        <ul class="text-lg font-medium">
            <li class="dropdown relative hover:bg-gray-100 ps-5 p-1 "><a href="#">Women's & Girls' Fashion</a>
                <ul class="bg-white absolute w-60 left-60 ps-2 py-5 hidden ">
                    <li class="hover:bg-gray-100 p-1"><a href="">Skin Care</a></li>
                    <li class="hover:bg-gray-100 p-1"><a href="">Hair Care</a></li>
                    <li class="hover:bg-gray-100 p-1"><a href="">Fragrances</a></li>
                    <li class="hover:bg-gray-100 p-1"><a href="">Fragrances</a></li>
                </ul>
            </li>
            <li @click="Dropdown = !Dropdown" class="dropdown relative hover:bg-gray-100 ps-5 p-1"><a href="#">Beauty Tools</a>
                <ul v-if="Dropdown"  class="bg-white absolute w-60 left-60 ps-2 py-5 hidden ">
                    <li class="hover:bg-gray-100 p-1"><a href="">Skin Care</a></li>
                    <li class="hover:bg-gray-100 p-1"><a href="">Hair Care</a></li>
                    <li class="hover:bg-gray-100 p-1"><a href="">Fragrances</a></li>
                    <li class="hover:bg-gray-100 p-1"><a href="">Fragrances</a></li>
                </ul>
            </li>
            <li  class="hover:bg-gray-100 ps-5 p-1"><a href="#">Bath & Body</a></li>
            <li  class="hover:bg-gray-100 ps-5 p-1"><a href="#">Personal Care</a></li>
            <li  class="hover:bg-gray-100 ps-5 p-1"><a href="#">Men's Care</a></li>
            <li  class="hover:bg-gray-100 ps-5 p-1"><a href="#">TV & Home Appliances</a></li> 
        </ul>
    </nav>
</template>