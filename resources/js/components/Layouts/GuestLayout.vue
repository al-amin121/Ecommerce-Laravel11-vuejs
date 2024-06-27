<template>
    <div>
        <Header>
            <Header/>
        </header>
        <main>
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