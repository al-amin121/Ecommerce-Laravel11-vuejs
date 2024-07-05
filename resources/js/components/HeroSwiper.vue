<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue';

import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/navigation';

// import required modules
import { Autoplay, Pagination, Navigation } from 'swiper/modules';

const modules = [Autoplay, Pagination, Navigation];
</script>
<template>
     <!-- this image size width 900px height 350px -->
 <swiper
        :spaceBetween="30"
        :centeredSlides="true"
        :autoplay="{
        delay: 2500,
        disableOnInteraction: false,
        }"
        :pagination="{
        clickable: true,
        }"
        :navigation="true"
        :modules="modules"
        class="mySwiper"
    >
        <swiper-slide><img src="@/assets/Banner/1.jpg" alt=""></swiper-slide>
        <swiper-slide><img src="@/assets/Banner/2.jpg" alt=""></swiper-slide>
        <swiper-slide><img src="@/assets/Banner/3.jpg" alt=""></swiper-slide>
        <swiper-slide><img src="@/assets/Banner/4.jpg" alt=""></swiper-slide>
    </swiper>

</template>