<script setup>
const people = [
  {
    name: 'Leslie Alexander',
    role: 'Co-Founder / CEO',
    imageUrl:
      'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
  },
  // More people...
]
</script>
<template>
    <GuestLayout>
        <section class="relative isolate overflow-hidden bg-white px-6 py-24 sm:py-32 lg:px-8">
            <div class="absolute inset-0 -z-10 bg-[radial-gradient(45rem_50rem_at_top,theme(colors.indigo.100),white)] opacity-20" />
            <div class="absolute inset-y-0 right-1/2 -z-10 mr-16 w-[200%] origin-bottom-left skew-x-[-30deg] bg-white shadow-xl shadow-indigo-600/10 ring-1 ring-indigo-50 sm:mr-28 lg:mr-0 xl:mr-16 xl:origin-center" />
            <div class="mx-auto max-w-2xl lg:max-w-4xl">
            <img class="mx-auto h-12" src="https://tailwindui.com/img/logos/workcation-logo-indigo-600.svg" alt="" />
            <figure class="mt-10">
                <blockquote class="text-center text-xl font-semibold leading-8 text-gray-900 sm:text-2xl sm:leading-9">
                <p>“Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.”</p>
                </blockquote>
                <figcaption class="mt-10">
                <img class="mx-auto h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                <div class="mt-4 flex items-center justify-center space-x-3 text-base">
                    <div class="font-semibold text-gray-900">Judith Black</div>
                    <svg viewBox="0 0 2 2" width="3" height="3" aria-hidden="true" class="fill-gray-900">
                    <circle cx="1" cy="1" r="1" />
                    </svg>
                    <div class="text-gray-600">CEO of Workcation</div>
                </div>
                </figcaption>
            </figure>
            </div>
        </section>
            <div class="bg-white py-24 sm:py-32">
                <div class="mx-auto grid max-w-7xl gap-x-8 gap-y-20 px-6 lg:px-8 xl:grid-cols-3">
                <div class="max-w-2xl">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Meet our leadership</h2>
                    <p class="mt-6 text-lg leading-8 text-gray-600">Libero fames augue nisl porttitor nisi, quis. Id ac elit odio vitae elementum enim vitae ullamcorper suspendisse.</p>
                </div>
                <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2">
                    <li v-for="person in people" :key="person.name">
                    <div class="flex items-center gap-x-6">
                        <img class="h-16 w-16 rounded-full" :src="person.imageUrl" alt="" />
                        <div>
                        <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">{{ person.name }}</h3>
                        <p class="text-sm font-semibold leading-6 text-indigo-600">{{ person.role }}</p>
                        </div>
                    </div>
                    </li>
                </ul>
                </div>
            </div>
    </GuestLayout>
</template>