<script setup>
import { FwbRating } from 'flowbite-vue';
import TimeCount from "@/components/OfferTimeCount.vue"; 
import { ref, onMounted } from 'vue';
  
  const carousel = ref(null);
  import img1 from '@/assets/images/img-1.png';
  import img2 from '@/assets/images/img-2.png';
  import img3 from '@/assets/images/img-3.png';
  import img4 from '@/assets/images/img-4.png';
  import img5 from '@/assets/images/img-5.png';
  import img6 from '@/assets/images/img-6.png';
  import img7 from '@/assets/images/img-7.png';
  import img8 from '@/assets/images/img-8.png';
  
  const cards = [
    { imgSrc: img1, name: 'Blanche Pearson1', price:'2999', duscuntPrice:'2999', rating: '55' },
    { imgSrc: img2, name: 'Joenas Brauers2', price:'2999', duscuntPrice:'2999',  rating: '55' },
    { imgSrc: img3, name: 'Lariach French3', price:'2999', duscuntPrice:'2999',  rating: '55' },
    { imgSrc: img4, name: 'James Khosravi4', price:'2999', duscuntPrice:'2999',  rating: '55' },
    { imgSrc: img5, name: 'Kristina Zasiadko5', price:'2999', duscuntPrice:'2999',  rating: '55' },
    { imgSrc: img6, name: 'Donald Horton6', price:'2999', duscuntPrice:'2999', rating: '55' },
    { imgSrc: img7, name: 'Joenas Brauers7', price:'2999', duscuntPrice:'2999',  rating: '55' },
    { imgSrc: img8, name: 'Lariach French8', price:'2999', duscuntPrice:'2999',  rating: '55' },
  ];
  
 
  let cardWidth = 0;
  let cardPerView = 1; // Number of visible cards at a time

  const setupCarousel = () => {
    if (!carousel.value) return;
  
    // Calculate card width based on visible cards
    cardWidth = carousel.value.offsetWidth / cardPerView;
    // Duplicate items for infinite loop effect
    carousel.value.innerHTML += carousel.value.innerHTML;
  };
  
  
  const snapToCard = () => {
    const scrollLeft = carousel.value.scrollLeft;
    const cardIndex = Math.round(scrollLeft / cardWidth);
    carousel.value.scrollLeft = cardIndex * cardWidth;
  };
  
  const scrollCarousel = (direction) => {
    carousel.value.scrollLeft += direction * cardWidth;
    snapToCard();
  };
  
  onMounted(() => {
    setupCarousel();
  });
</script>
<template>
    <div class="flex justify-between">
        <div class="flex gap-5  items-end">
            <h2 class="font-Inter font-semibold text-4xl">Flash Sales</h2>
            <div class="flex gap-2 items-end ms-20">
                <TimeCount/>
            </div>
        </div>
        <div class="flex justify-center items-center gap-3 right-0" >
            <svg id="left-arrow"  @click="scrollCarousel(-1)"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 bg-Secondary hover:bg-gray-300 rounded-full w-8 h-8 p-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
            </svg>

            <svg id="right-arrow" @click="scrollCarousel(1)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 bg-Secondary hover:bg-gray-300 rounded-full w-8 h-8 p-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
            </svg>
        </div>
    </div>
    <div class="flex items-center justify-center py-10">
        <div class="relative w-full max-w-1100px">
            <ul
                ref="carousel"
                class="carousel flex flex-nowrap gap-4 overflow-x-auto  smooth-scroll scrollbar-hidden"
            >
            <!----Use v-for to render cards--->
            <li
                v-for="(card, index) in cards"
                :key="index"
                class="card scroll-snap-align-start h-342 p-1 cursor-pointer flex flex-col items-start justify-start pb-4"
            >
                <div class="group relative cursor-pointer items-center justify-center overflow-hidden">
                <div class="h-40 w-60  bg-gray-100 ">
                    <img :src="card.imgSrc" alt="img" class="h-40 w-full object-cover"/>
                </div>
                <div class="absolute inset-0 flex translate-y-[80%] flex-col  justify-end  text-center transition-all duration-500 group-hover:translate-y-0">
                    <button type="button" class="bg-primary py-2 px-3.5 font-semibold text-lg capitalize text-white shadow shadow-black/60">Add To Cart</button>
                </div>
                </div>
                <h2 class="font-semibold text-xl line-clamp-1">{{ card.name }}</h2>
                <div class="flex justify-start items-center gap-2 py-4 font-medium text-lg">
                    <p class=" text-primary">${{card.price}}</p>
                    <p class="line-through text-gray-700">${{card.duscuntPrice}}</p>
                </div>
                <fwb-rating :rating="4.75">
                    <template #besideText>
                        <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                            ({{card.rating}})
                        </p>
                    </template>
                </fwb-rating>
            </li>
            </ul>
        </div>
    </div>
</template>
  
<style scoped>
  .carousel {
  scroll-snap-type: x mandatory;
}
.card {
  scroll-snap-align: start;
}
.scrollbar-hidden::-webkit-scrollbar {
  display: none;
  }
  .scrollbar-hidden {
  -ms-overflow-style: none; /* IE and Edge */
  scrollbar-width: none; /* Firefox */
  }
  </style>
  