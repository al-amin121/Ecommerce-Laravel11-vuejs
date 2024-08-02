<script setup>
  import { Menu, MenuButton, MenuItems } from '@headlessui/vue'
  import {useAuthStore} from "@/stores/useAuthStore.js";

const auth = useAuthStore();
  </script> 
<template>
    <div class="w-full h-16 border-b border-black flex justify-end items-center gap-10   ">
        
        <div>
            <Menu as="div" class="relative inline-block text-left">
                <div>
                    <MenuButton class="inline-flex w-full justify-center gap-x-1.5  px-3 py-2 text-sm font-semibold text-gray-900 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                        </svg>
                    
                    </MenuButton>
                </div>
            
                <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                    <MenuItems class="absolute right-0 z-10 mt-px w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div class="py-1 px-2">
                       <ul>
                         <li>new topic</li>
                         <li>new topic</li>
                         <li>new topic</li>
                         <li>new topic</li>
                        </ul>
                    </div>
                    </MenuItems>
                </transition>
                </Menu>
        </div>
        <div class="me-10">
            
            <Menu as="div" class="relative inline-block text-left">
                <div class="flex items-center">
                    <p class="text-black text-3xl">{{ auth?.user?.name}}</p>
                    <MenuButton class="inline-flex items-center w-full gap-x-1.5  px-3 py-2 text-sm font-semibold text-gray-900 ">
                        <img class="h-8 w-8 rounded-full" src="@/assets/Icon/user.png" alt="" />
                    </MenuButton>
                   
                </div>
            
                <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                    <MenuItems class="absolute right-0 z-10 mt-px w-24 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"> 
                    <h1 class="py-1 px-2">LogOut </h1>
                    </MenuItems>
                </transition>
                </Menu>
        </div>
        
    </div>
</template>

  