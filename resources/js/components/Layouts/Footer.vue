<template>
    <div class="w-full bg-black text-white  py-10 px-20  flex max-sm:flex-col gap-10 justify-between ">
            <div class="lg:w-1/2 md:w-1/2 w-full">
                <h1 class="font-semibold text-xl mb-5 hover:underline hover:decoration-primary">Exclusive</h1>
                <h4 class="my-5 font-normal text-base">Subscribe</h4>
                <p class="text-sm font-light">Get 10% off your first order</p>
                <div class="flex items-center my-5">
                    <input type="email"  aria-describedby="helper-text-explanation" class="bg-gray-50 border  border-gray-300 h-9 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email@email.com">
                    <button class="bg-primary -ms-5 h-9 w-10 cursor-pointer flex justify-center items-center text-white rounded-r">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 ">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="lg:w-1/2 md:w-1/2 w-full font-light text-base">
                <h1 class="font-semibold text-xl mb-5 hover:underline hover:decoration-primary">Support</h1>
                <p class="my-3">111 Bijoy sarani, Dhaka,  DH 1515, Bangladesh.</p>
                <p class="my-3">email@gmail.com</p>
                <p >+88015-88888-9999</p>

            </div>
            <div class="lg:w-1/2 md:w-1/2 w-full flex flex-col font-light text-base">
                <h1 class="font-semibold text-xl mb-5 hover:underline hover:decoration-primary ">Account</h1>
                <router-link to="/profile" class="my-1">My Account</router-link>
                <router-link to="/login" class="my-1">Login / Register</router-link>
                <router-link to="/profile" class="my-1">Cart</router-link>
                <router-link to="/shop" class="my-1">Shop</router-link>
            </div>
            <div class="lg:w-1/2 md:w-1/2 w-full flex flex-col font-light text-base">
                <h1 class="font-semibold text-xl mb-5 hover:underline hover:decoration-primary">Quick Link</h1>
                <router-link to="/profile" class="my-1">Privacy Policy</router-link>
                <router-link to="/login" class="my-1">Terms Of Use</router-link>
                <router-link to="/profile" class="my-1">FAQ</router-link>
                <router-link to="/contact" class="my-1">Contact</router-link>
            </div>
            <div class="lg:w-1/2 md:w-1/2 w-full">
                <h1 class="font-semibold text-xl mb-5 hover:underline hover:decoration-primary">Download App</h1>
                <p class="text-sm font-light">Save $3 with App New User Only</p>
                <div class="flex gap-1 mt-1">
                  <img src="@/assets/Icon/qurcode.jpeg" class="text-white h-[85px]">
                  <div class="flex flex-col gap-3">
                    <img src="@/assets/Icon/googleplay.png" class="text-white bg-white ">
                    <img src="@/assets/Icon/apelllog0.png" class="text-white bg-white ">
                  </div>
                </div>
                <div class="flex gap-5 text-white mt-5">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z" fill="currentColor"/></svg>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2 18.5C3.765 19.521 5.814 20 8 20c6.48 0 11.762-5.137 11.992-11.562L22 4.5l-3.354.5A4 4 0 0 0 16 4c-2.572 0-4.5 2.517-3.88 4.98c-3.552.23-6.771-1.959-8.633-4.875c-1.236 4.197-.09 9.251 3.013 12.366c0 1.176-3 1.878-4.5 2.029" color="currentColor"/></svg>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M7.465 1.066C8.638 1.012 9.012 1 12 1c2.988 0 3.362.013 4.534.066c1.172.053 1.972.24 2.672.511c.733.277 1.398.71 1.948 1.27c.56.549.992 1.213 1.268 1.947c.272.7.458 1.5.512 2.67C22.988 8.639 23 9.013 23 12c0 2.988-.013 3.362-.066 4.535c-.053 1.17-.24 1.97-.512 2.67a5.396 5.396 0 0 1-1.268 1.949c-.55.56-1.215.992-1.948 1.268c-.7.272-1.5.458-2.67.512c-1.174.054-1.548.066-4.536.066c-2.988 0-3.362-.013-4.535-.066c-1.17-.053-1.97-.24-2.67-.512a5.397 5.397 0 0 1-1.949-1.268a5.392 5.392 0 0 1-1.269-1.948c-.271-.7-.457-1.5-.511-2.67C1.012 15.361 1 14.987 1 12c0-2.988.013-3.362.066-4.534c.053-1.172.24-1.972.511-2.672a5.396 5.396 0 0 1 1.27-1.948a5.392 5.392 0 0 1 1.947-1.269c.7-.271 1.5-.457 2.67-.511m8.98 1.98c-1.16-.053-1.508-.064-4.445-.064c-2.937 0-3.285.011-4.445.064c-1.073.049-1.655.228-2.043.379c-.513.2-.88.437-1.265.822a3.412 3.412 0 0 0-.822 1.265c-.151.388-.33.97-.379 2.043c-.053 1.16-.064 1.508-.064 4.445c0 2.937.011 3.285.064 4.445c.049 1.073.228 1.655.379 2.043c.176.477.457.91.822 1.265c.355.365.788.646 1.265.822c.388.151.97.33 2.043.379c1.16.053 1.507.064 4.445.064c2.938 0 3.285-.011 4.445-.064c1.073-.049 1.655-.228 2.043-.379c.513-.2.88-.437 1.265-.822c.365-.355.646-.788.822-1.265c.151-.388.33-.97.379-2.043c.053-1.16.064-1.508.064-4.445c0-2.937-.011-3.285-.064-4.445c-.049-1.073-.228-1.655-.379-2.043c-.2-.513-.437-.88-.822-1.265a3.413 3.413 0 0 0-1.265-.822c-.388-.151-.97-.33-2.043-.379m-5.85 12.345a3.669 3.669 0 0 0 4-5.986a3.67 3.67 0 1 0-4 5.986M8.002 8.002a5.654 5.654 0 1 1 7.996 7.996a5.654 5.654 0 0 1-7.996-7.996m10.906-.814a1.337 1.337 0 1 0-1.89-1.89a1.337 1.337 0 0 0 1.89 1.89" clip-rule="evenodd"/></svg>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13 21H9V9h4v2a4.618 4.618 0 0 1 3.525-1.763A4.5 4.5 0 0 1 21 13.75V21h-4v-6.75a2.265 2.265 0 0 0-2.247-1.944A1.815 1.815 0 0 0 13 14.25V21Zm-6 0H3V9h4v12ZM5 7a2 2 0 1 1 0-4a2 2 0 0 1 0 4Z"/></svg>
                    </a>
                </div>
            </div>
    </div>
    <div class="bg-black text-white border-t border-gray-700 py-5">
        <p class="flex gap-1 justify-center items-center font-light"><span class=" border-white"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M10 0c5.523 0 10 4.477 10 10s-4.477 10-10 10S0 15.523 0 10S4.477 0 10 0m0 1.395a8.605 8.605 0 1 0 0 17.21a8.605 8.605 0 0 0 0-17.21m.16 3.256c1.08 0 2.117.303 3.003.864a.698.698 0 0 1-.745 1.179a4.211 4.211 0 0 0-2.257-.647c-2.278 0-4.114 1.775-4.114 3.953s1.836 3.953 4.114 3.953c.801 0 1.567-.22 2.224-.627a.698.698 0 0 1 .735 1.187a5.608 5.608 0 0 1-2.96.836c-3.037 0-5.509-2.39-5.509-5.349c0-2.96 2.472-5.349 5.51-5.349"/></svg></span>Copyright <span class="text-primary font-semibold"> Al-Amin</span>  2024. All right reserved</p>
    </div>
</template>