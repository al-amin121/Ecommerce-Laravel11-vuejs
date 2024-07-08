<template>
    <h2 class="font-Inter font-semibold text-4xl my-5">New Arrival</h2>
    <div class="w-full flex gap-5">
        <div class="w-1/2 bg-green-500">
            <div class="relative w-full flex h-[550px] overflow-hidden">
                <div class="w-full flex justify-start items-end opacity-100 relative z-30 bg-opacity-50">
                    <div class=" ps-10 py-5 flex-col justify-between " >
                        <p class="font-Inter font-semibold text-2xl text-white align-text-bottom ">Categories</p>
                        <p class="font-medium text-base py-3 text-white ">Black and White version of the PS5 coming out on sale. </p>
                        <button class="font-medium text-base underline decoration-primary mt-5 text-white ">
                            Shop Now
                        </button>
                    </div>
                </div>
                <div class="absolute z-10 ">
                    <img src="@/assets/images/img-19.jpg" class="bg-cover w-[650px] h-[550px] ">
                </div>
            </div>
        </div>
        <div class="w-1/2 flex-col gap-5">
                
            <div class="relative flex h-[250px] overflow-hidden">
                <div class="w-full flex justify-start items-end opacity-100 relative z-30 bg-opacity-50">
                    <div class="ps-10 py-5 flex-col justify-between " >
                        <p class="font-Inter font-semibold text-2xl text-white align-text-bottom ">Women’s Collections</p>
                        <p class="font-medium text-base py-3 text-white ">Featured woman collections that give you another vibe. </p>
                        <button class="font-medium text-base underline decoration-primary  mt-5 text-white ">
                            Shop Now
                        </button>
                    </div>
                </div>
                <div class="absolute z-10 w-full ">
                    <img src="@/assets/images/img-17.jpg" class="object-cover w-full h-[250px] ">
                </div>
            </div>
                
            <div class="w-full flex gap-5 mt-5">
                <div class="relative flex h-[280px] w-[300px] overflow-hidden">
                    <div class="w-full flex justify-start items-end opacity-100 relative z-30 bg-opacity-50">
                        <div class="p-5 flex-col justify-between " >
                            <p class="font-Inter font-semibold text-2xl text-white align-text-bottom ">Speakers</p>
                            <p class="font-medium text-base  text-white py-2 ">Amazon wireless speakers</p>
                            <button class="font-medium text-base underline decoration-primary text-white ">
                                Shop Now
                            </button>
                        </div>
                    </div>
                    <div class="absolute z-10 w-full ">
                        <img src="@/assets/images/img-10.jpg" class="object-cover w-[300px] h-[280px]">
                    </div>
                </div>
                <div class="relative flex h-[280px] w-[300px] overflow-hidden">
                    <div class="w-full flex justify-start items-end opacity-100 relative z-30 bg-opacity-50">
                        <div class="p-5 flex-col justify-between " >
                            <p class="font-Inter font-semibold text-2xl text-white align-text-bottom ">Perfume</p>
                            <p class="font-medium text-base  text-white py-2 ">GUCCI INTENSE OUD EDP</p>
                            <button class="font-medium text-base underline decoration-primary text-white ">
                                Shop Now
                            </button>
                        </div>
                    </div>
                    <div class="absolute z-10 w-full ">
                        <img src="@/assets/images/img-10.jpg" class="object-cover w-[300px] h-[280px]">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>