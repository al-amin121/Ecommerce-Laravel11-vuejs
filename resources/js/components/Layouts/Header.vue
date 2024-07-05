<template>
    <div class="max-sm:hidden w-full text-white bg-black py-2 flex justify-center items-center">
        <h1 class="font-sans text-base">Summer Sale For All Swim Suits And Free Express Delivery - OFF 50% ! <span class="underline font-semibold tracking-wide  ms-3"><router-link to="/shop">ShopNow</router-link></span></h1>
    </div>
    <Disclosure as="nav" class="bg-white border-b border-gray-200" v-slot="{ open }">
      <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
          <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            <!-- Mobile menu button-->
            <DisclosureButton class="relative inline-flex items-center justify-center rounded-md p-2 text-black hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
              <span class="absolute -inset-0.5" />
              <span class="sr-only">Open main menu</span>
              <Bars3Icon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
              <XMarkIcon v-else class="block h-6 w-6" aria-hidden="true" />
            </DisclosureButton>
          </div>
          <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex flex-shrink items-center ">
                <router-link to="/">
                    <img class="h-10 w-auto" src="@/assets/logo/OnlineShop.png" alt="Your Company" />
                </router-link>
            </div>
            <div class="hidden sm:ml-6 sm:block">
                <div class="flex space-x-4">
                    <DisclosureButton v-for="item in navigation" :key="item.name" as="a" :href="item.href" :class="['block rounded px-5 py-2 text-lg font-semibold',item.current ? 'bg-gray-100 text-black' : 'text-black hover:bg-gray-100 hover:text-black']":aria-current="item.current ? 'page' : undefined">{{ item.name }}</DisclosureButton>
                </div>
            </div>
          </div>
          <div class="lg:me-5 max-sm:hidden">
            <SearchBar/>
          </div>
          <div class="absolute inset-y-0 right-0 flex items-center gap-10 pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            <button type="button" class="relative rounded-full  p-1 text-black bg-Secondary  focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-primary">
              <span class="absolute -inset-1.5" />
              <span class="sr-only">View notifications</span>
              <div class="relative">
                <ShoppingCartIcon class="lg:h-6 lg:w-6 md:h-5 md:w-5 h-5 w-5" aria-hidden="true" />
                <span class="lg:-top-2 md:-top-2 -top-2 lg:left-5 md:left-5  left-3 absolute  lg:w-6 lg:h-6 md:w-5 md:h-5 w-5 h-5 bg-gray-50 text-black font-medium border-2 border-white dark:border-gray-800 rounded-full items-center flex justify-center ">10</span>
               </div>
            </button>
            <!-- Profile dropdown -->
            <Menu  as="div" class="relative ">
                <div v-if="auth?.user?.type === 0">
                    <MenuButton class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-primary">
                    <span class="absolute -inset-1.5"/>
                    <span class="sr-only">Open user menu</span>
                    <img class="h-8 w-8 rounded-full" src="@/assets/Icon/user.png" alt="" />
                    </MenuButton>
                </div>
                <div v-else class="font-semibold lg:text-xl md:text-base text-sm flex justify-center items-center shadow-2xl px-2 bg-slate-200  rounded-md py-1 text-black" >
                    <RouterLink to="/login" >
                        Login
                    </RouterLink>
                </div>
              <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                <MenuItems class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-primary ring-opacity-5 focus:outline-none">
                  <MenuItem v-slot="{ active }">
                    <a href="/profile" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-base font-medium text-black']">Your Profile</a>
                  </MenuItem>
                  <MenuItem v-slot="{ active }">
                    <a href="#" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-base  font-medium text-black']">Settings</a>
                  </MenuItem>
                  <MenuItem v-slot="{ active }" @click="handelLogout">
                    <a href="#" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-base font-medium text-black']">Sign out</a>
                  </MenuItem>
                </MenuItems>
              </transition>
              
            </Menu>
          </div>
        </div>
      </div>
      <DisclosurePanel class="sm:hidden">
        <div class="space-y-1 px-2 pb-3 pt-2">
          <DisclosureButton v-for="item in navigation" :key="item.name" as="a" :href="item.href" :class="['block  px-3 py-2 text-base font-medium',item.current ? 'bg-gray-200 text-black' : 'text-black hover:bg-gray-100 hover:text-white']":aria-current="item.current ? 'page' : undefined">{{ item.name }}</DisclosureButton>
        </div>
      </DisclosurePanel>
    </Disclosure>
  </template>
  
  <script setup>
  import SearchBar from '../SearchBar.vue';
  import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
  import { Bars3Icon, ShoppingCartIcon, XMarkIcon } from '@heroicons/vue/24/outline';
  import { useRoute } from 'vue-router';

  import {useAuthStore} from "@/stores/useAuthStore.js";

  const auth = useAuthStore();

  const route = useRoute();

  const handelLogout =  ()=>{
        auth.logout();
        router.push({ path: "/" });
    }

  const navigation = [
    { name: 'Home', href: '/', current: route.path === '/' },
    { name: 'Shop', href: '/shop', current: route.path === '/shop' },
    { name: 'About', href: '/about', current: route.path === '/about' },
    { name: 'Contact US', href: '/contact', current: route.path === '/contact' },
  ]
  </script>