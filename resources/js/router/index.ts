import { createRouter, createWebHistory } from 'vue-router'
import {useAuthStore} from "@/stores/useAuthStore.js";


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Index',
      component: () => import('@/pages/Fontend/Index.vue')
    },
    {
      path: '/login',
      name: 'Login',
      meta:{layout:"auth"},
      component: () => import('@/pages/Auth/Login.vue')
    },
    {
      path: '/register',
      name: 'Register',
      component: () => import('../pages/Auth/Registar.vue')
    },
    {
      path: '/forgotpassword',
      name: 'Forgotpassword',
      component: () => import('@/pages/Auth/ForgotPassword.vue'),
    },

    //for backend route------------------------------------


    {
      path: '/admin/login',
      name: 'Admin',
      component: () => import('@/pages/Auth/AdminLogin.vue'),
    },
    {
      path: '/dashbord',
      name: 'Dashbord',
      component: () => import('@/pages/Backend/Dashbord.vue'),
      beforeEnter:(to, from, next) =>
      {
        const auth = useAuthStore();
        if(auth?.user?.type === 1){
          next()
        }else{
          next({path: '/login', replace: true})
        }
        return false
      },
        
    },

    //for fontend route
    {
      path: '/profile',
      name: 'Profile',
      component: () => import('@/pages/Fontend/UserProfile/Index.vue'),
      beforeEnter:(to, from, next) =>
      {
        const auth = useAuthStore();
        if(auth?.user?.type === 0){
          next()
          
        }else{
          next({path: '/login', replace: true})
        }
      }

    },
    
    

    
  ]
})
 

export default router;
