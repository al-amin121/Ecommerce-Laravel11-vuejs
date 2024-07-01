<script setup>
import { ref } from 'vue';
import { FwbAlert } from 'flowbite-vue';
import useAxios from '@/composables/useAxios.js';
import { useRouter } from "vue-router";


const{loading, error,sendRequest } = useAxios();

const isLoading = ref(false);

const router = useRouter();

const form = ref({
    name: null,
    email: null,
    password: null,
    password_confirmation:null
})

const message = ref(null);
const onRegister = async () => {
    isLoading.value = true;
    message.value = '';
    try{
        const response = await sendRequest({
            method: 'POST',
            url: '/api/auth/register',
            data: form.value
        }); 
        if (response.data) {
            isLoading.value = false;
            message.value = response?.data?.message; 
            router.push('/login')
        } 
        
    } catch (error) {
      console.error("An error occurred:", error); 
    }
  } 
</script>

<template>
    <GuestLayout>
        <div class="flex mt-10 min-h-full flex-1 flex-col justify-center lg:shadow-lg md:shadow   lg:mx-auto md:mx-auto w-full lg:w-1/2 md:w-1/2 px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-5 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Register Account </h2>
            </div>
            <fwb-alert closable icon type="success" class="font-semibold mt-2 text-center text-black" v-if="message !== null">
                {{ message }}
            </fwb-alert>
            <div class="mt-5 sm:mx-auto space-y-6 sm:w-full sm:max-w-sm">
                <form @submit.prevent = "onRegister">
                    <div>
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">User Name</label>
                        <div class="mt-2">
                            <input id="name" v-model="form.name"  name="name" type="text" autocomplete="current-name" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                        <div class="mt-2">
                            <input id="email" v-model="form.email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="mt-2">
                            <input id="password" v-model="form.password" name="password" type="password" required autocomplete="current-password"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>
                    <div>
                        <label for="confirm_password" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
                        <div class="mt-2">
                            <input id="confirm_password" v-model="form.password_confirmation" name="password_confirmation" type="password" required autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>
                    <div class="mt-5  ">
                        <button  type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        :disabled="isLoading"
                        >
                        <span v-if="isLoading" class="spinner-grow spinner-grow-sm text-white" aria-hidden="true"></span>
                            <span v-if="isLoading" class=" flex items-center gap-1">
                                <svg aria-hidden="true" class="inline w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                                Continue...
                        </span>
                        <span v-else>Continue</span>
                    </button>
                    </div>
                    
                </form>

                <p class="mt-10 text-center text-sm text-gray-500">
                    Already have an account?
                    {{ ' ' }}
                    <routerLink to="/login" href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Login</routerLink>
                </p>
            </div>
        </div>
    </GuestLayout>
</template>