import { createRouter, createWebHistory } from 'vue-router'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Home',
      component: () => import('@/pages/Fontend/Index.vue')
    },
    {
      path: '/dashbord',
      name: 'Dashbord',
      component: () => import('../pages/Fontend/Dashbord.vue')
    },
    {
      path: '/login',
      name: 'Login',
      component: () => import('@/pages/Auth/Login.vue')
    },
    {
      path: '/register',
      name: 'Register',
      component: () => import('../pages/Auth/Registar.vue')
    },
   
    
  ]
})

export default router
