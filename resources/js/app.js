
// import '@/assets/css/app.css'
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import GuestLayout from '@/components/Layouts/GuestLayout.vue';
import AppLayout from '@/components/Layouts/AppLayout.vue';
import'@/composables/useAxios.js'
// import  VSelect  from "vue-select";
// import "vue-select/dist/vue-select.css";
// import 'flowbite';
import '../../node_modules/flowbite-vue/dist/index.css'
import App from './App.vue'
import router from './router'

const pinia = createPinia()
const app = createApp(App)
    .component('GuestLayout', GuestLayout) 
    .component('AppLayout', AppLayout)
    .use(router)
    .use(pinia)
 app.mount('#app')
 