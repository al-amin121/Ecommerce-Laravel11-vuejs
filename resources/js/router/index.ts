import { createRouter, createWebHistory } from 'vue-router'
import {useAuthStore} from "@/stores/useAuthStore.js";


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Home',
      component: () => import('@/pages/Fontend/Index.vue'),
      meta: { title: 'Home' },
    },
    {
      path: '/products',
      name: 'Products',
      component: () => import('@/pages/Fontend/Products.vue'),
      meta: { title: 'Products' },
    },
    {
      path: '/product-details/:id',
      name: 'ProductDetails',
      component: () => import('@/pages/Fontend/ProductDetails.vue'),
      meta: { title: 'Product-Details' },
    },
    {
      path: '/about',
      name: 'About',
      component: () => import('@/pages/Fontend/About.vue'),
      meta: { title: 'About' },
    },
    {
      path: '/contact',
      name: 'Contact',
      component: () => import('@/pages/Fontend/Contact.vue'),
      meta: { title: 'Contact' },
    },
    {
      path: '/login',
      name: 'Login',
      meta:{layout:"auth"},
      component: () => import('@/pages/Auth/Login.vue'),
      meta: { title: 'Login' },
    },
    {
      path: '/register',
      name: 'Register',
      component: () => import('../pages/Auth/Registar.vue'),
      meta: { title: 'Register' },
    },
    {
      path: '/forgotpassword',
      name: 'Forgotpassword',
      component: () => import('@/pages/Auth/ForgotPassword.vue'),
      meta: { title: 'Forgotpassword' },
    },

    //for backend route------------------------------------


    {
      path: '/admin/login',
      name: 'Admin',
      component: () => import('@/pages/Auth/AdminLogin.vue'),
      meta: { title: 'Admin-login' },
    },
    {
      path: '/dashbord',
      name: 'Dashbord',
      component: () => import('@/pages/Backend/Dashbord.vue'),
      meta: { title: 'Dashbord' },
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
    {
      path: '/MainCategory',
      name: 'MainCategory',
      component: () => import('@/pages/Backend/MainCategory.vue'),
      meta: { title: 'MainCategory' },
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
    {
      path: '/SubCategory',
      name: 'SubCategory',
      component: () => import('@/pages/Backend/SubCategory.vue'),
      meta: { title: 'SubCategory' },
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
    {
      path: '/brand',
      name: 'Brand',
      component: () => import('@/pages/Backend/Brand.vue'),
      meta: { title: 'Brand' },
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
    {
      path: '/dashbord/products',
      name: 'DashbordProducts',
      component: () => import('@/pages/Backend/products/Index.vue'),
      meta: { title: 'Products' },
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
    {
      path: '/add/products',
      name: 'AddProducts',
      component: () => import('@/pages/Backend/products/Add.vue'),
      meta: { title: 'Add-Products' },
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
    {
      path: '/edit/:id',
      name: 'Edit',
      component: () => import('@/pages/Backend/products/Edit.vue'),
      meta: { title: 'Products-Edit' },
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
      meta: { title: 'Profile' },
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

router.beforeEach((to) => {
  document.title = to.meta.title ? `${to.meta.title} | ${import.meta.env.VITE_APP_NAME}` : import.meta.env.VITE_APP_NAME;
});

export default router;
