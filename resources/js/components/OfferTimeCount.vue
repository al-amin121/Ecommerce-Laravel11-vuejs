<script setup>
    import { ref, onMounted } from 'vue';

    const countDownDate = new Date('7 10 2024 12:30:00').getTime();
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
    <div>
        <p class="font-medium text-lg">Days</p>
        <h2 class="font-Inter font-bold text-4xl">{{ days }}</h2>
    </div>
    <p class="font-Inter font-bold text-3xl"> :</p>
    <div>
        <p class="font-medium text-lg">Hours</p>
        <h2 class="font-Inter font-bold text-4xl">{{ hours }}</h2>
    </div>
    <p class="font-Inter font-bold text-3xl">:</p>
    <div>
        <p class="font-medium text-lg">Minutes</p>
        <h2 class="font-Inter font-bold text-4xl">{{ minutes }}</h2>
    </div>
    <p class="font-Inter font-bold text-3xl">:</p>
    <div>
        <p class="font-medium text-lg">Seconds</p>
        <h2 class="font-Inter font-bold text-4xl">{{ seconds }}</h2>
    </div>
</template>