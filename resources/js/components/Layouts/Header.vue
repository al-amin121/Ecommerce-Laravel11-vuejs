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
          
          <div  class="absolute inset-y-0 right-0 flex items-center gap-10 pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            <div @click="isOpen = true"  class="relative cursor-pointer rounded-full  p-1 text-black bg-Secondary  focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-primary">
              <span class="absolute -inset-1.5" />
              <span class="sr-only">View notifications</span>
              <div class="relative">
                <ShoppingCartIcon  class="lg:h-6 lg:w-6 md:h-5 md:w-5 h-5 w-5" aria-hidden="true" />
                <span class="lg:-top-2 md:-top-2 -top-2 lg:left-5 md:left-5  left-3 absolute  lg:w-6 lg:h-6 md:w-5 md:h-5 w-5 h-5 bg-gray-50 text-black font-medium border-2 border-white dark:border-gray-800 rounded-full items-center flex justify-center ">10</span>
               </div>
            </div>
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
    <!-------------Cart product show ------------------------>
  
        <TransitionRoot as="template" :show="isOpen">
          <Dialog class="relative z-10" @close="isOpen = false">
            <TransitionChild as="template" enter="ease-in-out duration-500" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-500" leave-from="opacity-100" leave-to="opacity-0">
              <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-hidden">
              <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                  <TransitionChild as="template" enter="transform transition ease-in-out duration-500 sm:duration-700" enter-from="translate-x-full" enter-to="translate-x-0" leave="transform transition ease-in-out duration-500 sm:duration-700" leave-from="translate-x-0" leave-to="translate-x-full">
                    <DialogPanel class="pointer-events-auto w-screen max-w-md">
                      <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                        <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                          <div class="flex items-start justify-between">
                            <DialogTitle class="text-lg font-medium text-gray-900">Shopping cart</DialogTitle>
                            <div class="ml-3 flex h-7 items-center">
                              <button   type="button" class="relative -m-2 p-2 text-gray-400 hover:text-gray-500" @click="isOpen = false">
                                <span class="absolute -inset-0.5" />
                                <span class="sr-only">Close panel</span>
                                <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                              </button>
                            </div>
                          </div>

                          <div class="mt-8">
                            <div class="flow-root">
                              <ul role="list" class="-my-6 divide-y divide-gray-200">
                                <li v-for="product in products" :key="product.id" class="flex py-6">
                                  <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                    <img :src="product.imageSrc" :alt="product.imageAlt" class="h-full w-full object-cover object-center" />
                                  </div>

                                  <div class="ml-4 flex flex-1 flex-col">
                                    <div>
                                      <div class="flex justify-between text-base font-medium text-gray-900">
                                        <h3>
                                          <a :href="product.href">{{ product.name }}</a>
                                        </h3>
                                        <p class="ml-4">{{ product.price }}</p>
                                      </div>
                                      <p class="mt-1 text-sm text-gray-500">{{ product.color }}</p>
                                    </div>
                                    <div class="flex flex-1 items-end justify-between text-sm">
                                      <p class="text-gray-500">Qty {{ product.quantity }}</p>

                                      <div class="flex">
                                        <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                      </div>
                                    </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>

                        <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                          <div class="flex justify-between text-base font-medium text-gray-900">
                            <p>Subtotal</p>
                            <p>$262.00</p>
                          </div>
                          <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                          <div class="mt-6">
                            <a href="#" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</a>
                          </div>
                          <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                            <p>
                              or{{ ' ' }}
                              <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500" @click="open = false">
                                Continue Shopping
                                <span aria-hidden="true"> &rarr;</span>
                              </button>
                            </p>
                          </div>
                        </div>
                      </div>
                    </DialogPanel>
                  </TransitionChild>
                </div>
              </div>
            </div>
          </Dialog>
        </TransitionRoot>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import SearchBar from '../SearchBar.vue';
  import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
  import { Bars3Icon, ShoppingCartIcon, XMarkIcon } from '@heroicons/vue/24/outline';
  import { useRoute } from 'vue-router';
  import {useAuthStore} from "@/stores/useAuthStore.js";
  
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'

const isOpen = ref(false);
  const auth = useAuthStore();

  const route = useRoute();

  const handelLogout = () =>{
    auth.logout();
    router.push({ path: "/" });
  }
  const navigation = [
    { name: 'Home', href: '/', current: route.path === '/' },
    { name: 'Products', href: '/products', current: route.path === '/products' },
    { name: 'About', href: '/about', current: route.path === '/about' },
    { name: 'Contact US', href: '/contact', current: route.path === '/contact' },
  ]

  const products = [
  {
    id: 1,
    name: 'Throwback Hip Bag',
    href: '#',
    color: 'Salmon',
    price: '$90.00',
    quantity: 1,
    imageSrc: 'https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg',
    imageAlt: 'Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt.',
  },
  {
    id: 2,
    name: 'Medium Stuff Satchel',
    href: '#',
    color: 'Blue',
    price: '$32.00',
    quantity: 1,
    imageSrc: 'https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-02.jpg',
    imageAlt:
      'Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch.',
  },
  
]


  </script>
