<script setup>
import { FwbRating } from 'flowbite-vue'
import Products from "../../components/ProductCard.vue"
</script>
<template>
    <GuestLayout>
        <nav class="flex py-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <router-link to="/"  class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Home
                    </router-link>
                </li>
                <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <router-link to="/products"  class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Products</router-link>
                </div>
                </li>
                <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Product-Details</span>
                </div>
                </li>
            </ol>
        </nav>

        <div class="flex w-full gap-5 ">
            <div class="w-2/12 flex flex-col justify-center items-center gap-3 ">
                <img src="@/assets/images/d4.png" class="w-28 h-28 flex justify-center items-center bg-Secondary ">
                <img src="@/assets/images/d1.png" class="w-28 h-28 flex justify-center items-center bg-Secondary ">
                <img src="@/assets/images/d2.png" class="w-28 h-28 flex justify-center items-center bg-Secondary ">
                <img src="@/assets/images/d3.png" class="w-28 h-28 flex justify-center items-center bg-Secondary ">
            </div>
            <div class="w-6/12 bg-Secondary">
                <img src="@/assets/images/d1.png" class="bg-cover p-5 flex justify-center items-center  ">
            </div>
            <div class="w-4/12 ms-5">
                <h1 class="font-semibold text-2xl ">Havic HV G-92 Gamepad</h1>
                <div class="flex justify-start items-center h-2 my-5 text-sm font-normal">
                    <fwb-rating
                        :rating="4.75"
                        :scale="5"
                        review-link="/"
                        review-text="(73 reviews)"
                    >
                    </fwb-rating>
                    <span class="ms-2">|<span class="ms-2 text-primary text-sm font-normal" >In Stock</span></span>
                </div>
                <h1 class="font-Inter font-normal text-2xl">$192.00</h1>
                <p class="font-normal text-sm my-5">PlayStation 5 Controller Skin High quality vinyl with air channel adhesive for easy bubble free install & mess free removal Pressure sensitive.</p>
                <div class="flex justify-start items-center gap-5 my-5">
                    <div class="flex border-2 border-black w-40 h-11 ">
                        <div class="border-r-2 w-10 border-black flex justify-center items-center"><span class="w-4 h-[2px] bg-black"></span></div>
                        <p class="w-20 flex justify-center items-center font-medium text-xl">1</p>
                        <div class="border-l-2 w-10 border-black flex justify-center items-center"><span class="w-4 h-[2px] bg-black"></span><span class="w-[1px] h-4 bg-black -ms-2"></span></div>
                    </div>
                    <button class="bg-primary px-10 py-2 font-medium text-lg text-white">Buy Now</button>
                </div>

                <div class="border border-black">
                   <div class="flex justify-start items-center gap-10 border-b border-black p-5">
                        <img src="@/assets/Icon/fast-delivery.png" class="w-10 h-10 ">
                        <div>
                            <h1 class="font-semibold text-xl mb-2">Free Delivery</h1>
                            <p class="font-medium text-xs underline" >Enter your postal code for Delivery Availability</p>
                        </div>
                   </div>
                   <div class="flex justify-start items-center gap-10 border-b border-black p-5">
                        <img src="@/assets/Icon/Return.png" class="w-10 h-10 ">
                        <div>
                            <h1 class="font-semibold text-xl mb-2">Return Delivery</h1>
                            <p class="font-medium text-xs underline" >Free 30 Days Delivery Returns. Details</p>
                        </div>
                   </div>
                </div>
                
            </div>
        </div>
        <hr class="py-10">
        <div class="flex gap-2 items-center">
            <div class="w-3 h-6 bg-primary "></div>
            <p class="text-xl font-bold text-primary ">Description :</p>
        </div>
        <div class="my-5 px-10">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error hic fugiat impedit assumenda tenetur ratione cupiditate pariatur, quae odit libero. Libero accusantium eum quod rem expedita unde optio quia incidunt!
            Aliquam fuga, animi harum laboriosam temporibus, voluptates dolores possimus hic accusamus inventore maiores deleniti eveniet natus odit? Quisquam corporis consequuntur quam voluptatum, soluta assumenda atque quibusdam nam non odit aut.
            Non voluptas illo quia tempore esse fuga rerum soluta architecto libero commodi quo, similique voluptatum aliquam hic sapiente, id magni doloribus sit, dignissimos at nulla sunt aut quibusdam? In, eligendi.
            Magnam tempora excepturi consequatur, deserunt nobis corrupti illo placeat voluptas perspiciatis nisi repellat, repellendus tenetur pariatur dolorem possimus ratione ullam nihil earum, accusantium maiores illum eligendi? Vel libero inventore dolorem.
            Cumque, animi. Porro aperiam nam qui officiis eius explicabo voluptas tempore? Temporibus molestiae dignissimos nulla, aliquid consectetur fugit cum rerum. Sunt magnam ipsum earum non dignissimos qui, recusandae dolorem id.
            Porro harum qui minima sed quisquam natus doloribus dolorem quidem eaque recusandae obcaecati, nemo ab optio officiis quae sunt deserunt, nam aliquid labore ipsa similique libero aliquam maxime. Sequi, non!
            Distinctio, repellendus! Maiores aut nulla rem. Odit itaque qui, maiores mollitia delectus nisi rem accusantium sit quaerat voluptas ipsum et temporibus, rerum fuga! Asperiores officia amet dicta quo accusamus eos.
            Optio deserunt omnis commodi expedita quam laudantium, quis vero repellat veritatis dolore est maxime porro consequatur enim voluptates sunt unde iusto dolores, eveniet neque esse consectetur. Cumque totam voluptas accusantium.
            Eum nam ad alias eveniet nostrum quaerat delectus asperiores laudantium quia quam. Excepturi, aspernatur id facilis harum culpa voluptatem impedit earum mollitia provident omnis dolorem quaerat suscipit quo commodi eius!
            Repellat nostrum quaerat ut maxime expedita odio hic doloribus, at iusto, possimus error eveniet quae, beatae est iure reprehenderit? Laboriosam libero quas facere porro maiores deserunt nam magnam tempore excepturi!
            Sit ea fuga voluptatibus incidunt ipsam nisi, facere provident corrupti similique id aut laborum sed magni rem perferendis ratione, animi, harum eligendi labore quibusdam maiores accusamus? In voluptates provident dolorum.
            Odit, natus praesentium. Molestias soluta, sint temporibus cumque dolore odit facilis culpa facere natus iste a voluptates eius corrupti, atque quod cum in, laudantium autem dicta! Quam voluptatum eos ipsa.
            Numquam architecto in doloribus? Illo, praesentium possimus sapiente voluptas sunt, id deserunt temporibus hic quod ex commodi amet, aliquid deleniti ut distinctio? Illum libero, dolorem dolor dicta repellendus tenetur dolore.
            Impedit exercitationem, voluptatibus ullam consequuntur laboriosam alias totam iusto ex eius? Nobis corrupti, aspernatur vel magnam tempore autem! Dolores consectetur expedita quam aliquid modi quis architecto nam magnam, excepturi fuga?
            Nostrum, delectus iusto. Assumenda, repellendus quia. Consequatur itaque esse, hic nostrum id sed dolor dicta exercitationem! Distinctio assumenda optio quasi sapiente. Totam, exercitationem vitae. Exercitationem animi quisquam illum autem adipisci.
            Corporis porro rem eum magnam nam nisi iure quibusdam labore! Error aliquam, magni aliquid dolorem sed molestias excepturi ullam vel voluptas reprehenderit! Debitis laudantium ut delectus eligendi. Deserunt, officiis quisquam.
            Molestiae aperiam magnam perferendis deleniti aspernatur laborum assumenda, labore quas, sed enim vero voluptatem. Quas veniam repellat illo delectus, eveniet libero fugit aut doloribus, vero modi nam asperiores assumenda commodi.
            Esse velit beatae dolorem ut totam fugiat pariatur veniam libero? Numquam animi hic ut consectetur, consequuntur sunt. Sed dolorem, hic provident, ex eum amet ad optio debitis, eius vero laboriosam.
            Fugiat quod deserunt animi. Hic quia, porro dolore ea eligendi non quasi obcaecati at, totam aliquid amet similique quis. Id deserunt consequuntur dolorem quo necessitatibus voluptatem itaque praesentium quasi cumque!
            Consectetur saepe possimus beatae ratione distinctio quisquam rerum soluta, numquam magnam sint laboriosam veritatis natus dignissimos perspiciatis tenetur quidem, vero, repellat voluptates eum nam atque sapiente vitae dolor officia? Id!</p>
        </div>
        <div class="flex gap-2 items-center py-5">
            <div class="w-3 h-6 bg-primary "></div>
            <p class="text-xl font-bold text-primary ">Related Item</p>
        </div>
        <div class="grid grid-cols-5 gap-5">
            <Products/>
            <Products/>
            <Products/>
            <Products/>
            <Products/>
        </div>

    </GuestLayout>
</template>