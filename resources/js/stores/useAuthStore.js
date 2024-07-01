import { defineStore } from "pinia";
import{ref, computed} from "vue";
import useApi from "@/composables/useAxios.js";


const {loading,error, sendRequest} = useApi();

export const useAuthStore = defineStore('auth', () =>{

    
   
    const user = ref(JSON.parse(localStorage.getItem("user")) ?? null)
    const isLoggedIn = computed(() => !!user.value)

    async function fetchUser() {
        const user = JSON.parse(await getLocalstoreage());
        if (user) {
            const{data} = await sendRequest({
                method: 'get',
                url: "/api/user",
                headers: {
                    "Authorization" : `Bearer ${user?.token}`
                }
            })
            if (data?.data) {
                await setLocalStoreage(data?.data)
                user.value = data?.data
            }
            
        }else{
            await clearLocalStoreage();
        }
    }

    async function login(credential){
      
        await sendRequest({
            method: 'get',
            url:"/sanctum/csrf-cookie",
        })
        const login = await sendRequest({
            method: "POST",
            url: "/api/auth/login",
            data: credential
        })
        if (login?.data) {
            await setLocalStoreage(login.data?.data)
            user.value = login.data?.data
            
        }
        return login;
        
    }
    async function signup(signupData){
        const signup = await sendRequest({
            method:"POST",
            url: "/api/auth/register",
            data: signupData,
            headers:{
                'Content-Type': "multipart/form-data",
                'processData': true,
            }
        })
        return signup;
    }
     
    async function handelForgotPassword(email){
        const response = await sendRequest({
            method:"POST",
            url: "/api/auth/password/email",
            email: email,
        })
        return response;
    }

    async function logout(){
      
       await clearLocalStoreage();
     
       window.location.reload(true);

    }
    async function setLocalStoreage(user){
        localStorage.setItem('user', JSON.stringify(user));
    }
    async function clearLocalStoreage(){
        localStorage.removeItem('user');
    }
    async function getLocalstoreage(){
        return localStorage.getItem('user');
    }
   
    function getToken(){
        return JSON.parse(localStorage.getItem("user"))?.token;
    }
    return { user, login, signup, handelForgotPassword, isLoggedIn, fetchUser, logout, loading, error, getLocalstoreage, getToken, clearLocalStoreage }
})