<template>
    <div class="w-full h-full">
        <Header>
            <Header/>
        </header>
        <main class="container w-full">
            <slot/>
        </main>
        <footer>
            <Footer/>
        </footer>
    </div>
</template>
<script setup>
import Header from './Header.vue';
import Footer from './Footer.vue';
</script>