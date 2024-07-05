<script setup>
    import { ref, onMounted } from 'vue';

    const countDownDate = new Date('7 11 2024 12:30:00').getTime();
    const days = ref(0);
    const hours = ref(0);
    const minutes = ref(0);
    const seconds = ref(0);
    const distance = ref(0);

    const updateCountdown = () => {
    const now = new Date().getTime();
    distance.value = countDownDate - now;
    days.value = Math.floor(distance.value / (1000 * 60 * 60 * 24));
    hours.value = Math.floor((distance.value % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    minutes.value = Math.floor((distance.value % (1000 * 60 * 60)) / (1000 * 60));
    seconds.value = Math.floor((distance.value % (1000 * 60)) / 1000);

    if (distance.value < 0) {
        if (distance.value < -1000 * 60 * 60 * 24) { // if it's past the "game day"
        // reset timer to next year
        countDownDate += (1000 * 60 * 60 * 24 * 365);
        }
    }
    };

    onMounted(() => {
    const interval = setInterval(updateCountdown, 1000);
    // Cleanup interval on component unmount
    return () => clearInterval(interval);
    });
</script>
<template>
    <div class="mt-5 mb-10 relative flex h-[500px]   overflow-hidden">
        <div class="w-full flex justify-start items-start opacity-100 relative z-30 bg-opacity-50">
            <div class="w-1/2 ps-20 py-20 flex-col justify-between " >
                <p class="font-medium text-base text-primary mb-5">Categories</p>
                <p class="font-semibold text-5xl uppercase text-white tracking-wider">Enhance Your Music Experience </p>
                <div class="text-black flex gap-5 my-10 ">
                    <div class=" flex flex-col justify-center items-center bg-white rounded-full  h-16 w-16" >
                        <h2 class="font-semibold text-base">{{ days }}</h2>
                        <p class="font-normal text-base">Days</p>
                    </div>
                    <div class=" flex flex-col justify-center items-center bg-white rounded-full h-16 w-16">
                        <h2 class="font-semibold text-base">{{ hours }}</h2>
                        <p class="font-normal text-base">Hours</p>
                    </div>
                    <div class=" flex flex-col justify-center items-center bg-white rounded-full h-16 w-16">
                        <h2 class="font-semibold text-base">{{ minutes }}</h2>
                        <p class="font-normal text-base">Minutes</p>
                    </div>
                    <div class=" flex flex-col justify-center items-center bg-white rounded-full h-16 w-16">
                        <h2 class="font-semibold text-base">{{ seconds }}</h2>
                        <p class="font-normal text-base">Seconds</p>
                    </div>
                </div>
                <button class="font-medium text-base py-1 px-3 mt-5 text-white bg-primary ">
                    Buy Now!
                </button>
            </div>
            <div class="w-1/2">
            </div>
        </div>
        <!-- img size w-1100 px and h-500 px -->
        <div class="absolute z-10 w-full h-[500px]">
            <img src="@/assets/Banner/add3.jpg" class="object-cover w-full" >
        </div>
    </div>
</template>