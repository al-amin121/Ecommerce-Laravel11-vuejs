<script setup>
  import Navbar from "@/components/HeroNavbar.vue";
 import Swiper from "@/components/HeroSwiper.vue";
 import FlashSels from "@/components/FlashSels.vue";
 import Button from "@/components/Button.vue";
 import Categories from "@/components/Categories.vue";
 import BestSeling from "@/components/BestSeling.vue";
 import AddBanner from "@/components/AddBanner.vue";
 import OurProducts from "@/components/OurProducts.vue";
 import FeaturedAdds from "@/components/FeaturedAdds.vue";

</script>
<template>
    <GuestLayout>

        <!-----------Hero section ------------------->
        <div class="flex gap-2 w-full  mt-2">
            <div class="bg-white text-black w-60 py-5 border-r border-gray-300 shadow">
                <Navbar/>
            </div>
            <div class="max-w-[900px]">
                <Swiper/>
            </div>
            <div>
                <!-- ads size 200*200 -->
                <router-link to=""> <img src="@/assets/Banner/add1.png" class="mb-4"/></router-link>
                <router-link to=""><img src="@/assets/Banner/add2.png"/></router-link>
            </div>
        </div>
        <div class="mt-10">
            <div class="flex gap-2 items-center">
                <div class="w-3 h-6 bg-primary rounded"></div>
                <p class="text-lg font-semibold text-primary">Today’s</p>
            </div>
            <!-------flash sell card start--------->
            <FlashSels/>
            <Button/>
            <!-------flash sell card end--------->
            <hr class="mt-5 mb-10">
            <!-----------Categories start---------------->
            <div class="flex gap-2 items-center mb-5">
                <div class="w-3 h-6 bg-primary rounded"></div>
                <p class="text-lg font-semibold text-primary">Categories</p>
            </div>
            <Categories/>
            @php
            echo env('APP_NAME');
            @endphp
            <!-----------Categories end---------------->
            <hr class="mt-5 mb-10">
            <!-----------Best Selling Products start---------------->
            <div class="flex gap-2 items-center mb-5">
                <div class="w-3 h-6 bg-primary rounded"></div>
                <p class="text-lg font-semibold text-primary">This Month</p>
            </div>
            <BestSeling/>
            <!-----------Best Selling Products end---------------->
            <!-----------------Home page adds start--------------------------->
            <AddBanner/>
            <!-----------------Home page adds end--------------------------->
            <!-----------------Our Products start--------------------------->
            <div class="flex gap-2 items-center mb-5">
                <div class="w-3 h-6 bg-primary rounded"></div>
                <p class="text-lg font-semibold text-primary">Our Products</p>
            </div>
            <OurProducts/>
            <Button/>
            <!-----------------Our Products end--------------------------->
            <!-----------------Featured procuts adds start--------------------------->
            <div class="flex gap-2 items-center mt-10">
                <div class="w-3 h-6 bg-primary rounded"></div>
                <p class="text-lg font-semibold text-primary">Featured</p>
            </div>
            <FeaturedAdds/>
            <!-----------------Featured procuts adds end--------------------------->
            <!-----------------service start--------------------------->

            <div class="bg-white py-24 sm:py-32">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
                    <div class="mx-auto flex max-w-xs flex-col gap-y-2">
                        <img src="@/assets/Icon/fast-delivery.png" class="w-12 h-12 rounded-full mx-auto bg-gray-200 p-2 border-4 border-gray-600 flex justify-center ">
                        <dt class="font-semibold text-xl">FREE AND FAST DELIVERY</dt>
                        <dd class="font-normal text-sm">Free delivery for all orders over $140</dd>
                    </div>
                    <div class="mx-auto flex max-w-xs flex-col gap-y-2">
                        <img src="@/assets/Icon/headset.png" class="w-12 h-12 rounded-full mx-auto bg-gray-200 p-2 border-4 border-gray-600 flex justify-center ">
                        <dt class="font-semibold text-xl">24/7 CUSTOMER SERVICE</dt>
                        <dd class="font-normal text-sm">Friendly 24/7 customer support</dd>
                    </div>
                    <div class="mx-auto flex max-w-xs flex-col gap-y-2">
                        <img src="@/assets/Icon/security.png" class="w-12 h-12 rounded-full mx-auto bg-gray-200 p-2 border-4 border-gray-600 flex justify-center ">
                        <dt class="font-semibold text-xl">MONEY BACK GUARANTEE</dt>
                        <dd class="font-normal text-sm">We reurn money within 30 days</dd>
                    </div>
                </dl>
                </div>
            </div>
            <!-----------------service end--------------------------->

        </div>
    </GuestLayout>
</template>
<style scoped>
</style>
