<script setup>
import { ref } from 'vue'
import {useAuthStore} from "@/stores/useAuthStore.js";


const email = ref('')
const auth = useAuthStore();

const handleSubmit = async () => {
    try {
        await auth.handelForgotPassword(email.value);
    } catch (error) {
        console.error(error.message);
    }
}

// const errorMessage = ref('');
// console.log(auth.error)
// if (auth.error?.response?.status === 200 || auth.error?.response?.status === 404 ||   ) {
//     errorMessage.value = auth.error.response.data.message;
    
// }

</script>
<template>
    <GuestLayout>
        <div class="flex mt-10 min-h-full flex-1 flex-col justify-center lg:shadow-lg md:shadow  lg:mx-auto md:mx-auto w-full lg:w-1/2 md:w-1/2 px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-5 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Forgot Password</h2>
            </div>
            
            <!-- <fwb-alert closable icon type="danger" class="font-semibold text-red-700" v-if="errorMessage">
                {{ errorMessage }}
            </fwb-alert> -->
            
            <div class="mt-10 sm:mx-auto space-y-6  sm:w-full sm:max-w-sm">
                <form @submit.prevent = "handleSubmit" >
                   
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                        <div class="mt-2">
                            <input v-model="email" id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                        <!--  <p class="text-red-500 text-sm" v-if="auth?.error?.response?.data?.errors?.email">{{ auth?.error?.response?.data?.errors?.email[0]}}</p> -->
                    </div>
                    <div class=" mt-5">
                        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </GuestLayout>
</template>