
// import '@/assets/css/app.css'
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import GuestLayout from '@/components/Layouts/GuestLayout.vue';
import AppLayout from '@/components/Layouts/AppLayout.vue';
import'@/composables/useAxios.js'
import "vue-select/dist/vue-select.css"
import VueSelect  from "vue-select"
import '../../node_modules/flowbite-vue/dist/index.css'
import App from './App.vue'
import router from '@/router/index.ts'
import Vue3Toasity from 'vue3-toastify';

const pinia = createPinia()
const app = createApp(App)
    .component('GuestLayout', GuestLayout)
    .component('AppLayout', AppLayout)
    .component("v-select", VueSelect)
    .use(router)
    .use(pinia)
    .use( Vue3Toasity)
 app.mount('#app');
 
// Set initial title
document.title = import.meta.env.VITE_APP_NAME;