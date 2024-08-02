<script setup>
import { ref } from 'vue'
import {useAuthStore} from "@/stores/useAuthStore.js";
import { useRouter } from "vue-router";


const auth = useAuthStore();
const router = useRouter();

const errorMessage = ref('');
const successMessage = ref('');


const form = ref({
  email: null,
  password: null,

});

const onLogin = async () => {
    errorMessage.value = '';
    successMessage.value = '';
    auth.error = null;

  try {
    await auth.login(form.value);
    if(auth?.user?.type ===1){
        await router.push({path: "/dashbord"});
    }
    if(auth?.user?.type ===0){
        handelLogout()
    }
    if (auth.error?.response?.status === 401) {
        errorMessage.value = auth.error.response.data.message;

    }

  } catch (error) {
    console.error("Error during login:", error);

  }
}

const handelLogout =  ()=>{
    auth.logout();
    errorMessage.value = 'Invalid User !';
}

</script>
<template>

        <div class="flex min-h-full flex-1 flex-col justify-center mt-10 mx-auto w-1/3 shadow-lg px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <!-- <p class="text-red-500 text-sm" v-if="auth.error.response.status === 401">{{ auth.error.response.data.message}}</p> -->

                <img class="mx-auto h-10 w-auto" src="@/assets/logo/OnlineShop.png" alt="Your Company" />
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to Admin</h2>
            </div>

            <fwb-alert closable icon type="danger" class="font-semibold text-red-700" v-if="errorMessage">
                {{ errorMessage }}
            </fwb-alert>

            <div class="mt-10 sm:mx-auto space-y-6 sm:w-full sm:max-w-sm">
                <form @submit.prevent = "onLogin" >

                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                        <div class="mt-2">
                            <input v-model="form.email" id="email" name="email" type="email" autocomplete="email"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                        <p class="text-red-500 text-sm" v-if="auth?.error?.response?.data?.errors?.email">{{ auth?.error?.response?.data?.errors?.email[0]}}</p>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="mt-2">
                            <input v-model="form.password" id="password" name="password" type="password" autocomplete="current-password"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                        <p class="text-red-500 text-sm" v-if="auth?.error?.response?.data?.errors?.password">{{auth?.error?.response?.data?.errors?.password[0]}}</p>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                    </div>
                </form>
            </div>
        </div>

</template>
