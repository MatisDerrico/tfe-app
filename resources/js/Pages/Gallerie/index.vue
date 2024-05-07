<template>

<div
        class="bg-black relative flex-col sm:flex sm:justify-center sm:items-center min-h-screen"
    >
    <NavBar/>



<div class="max-w-7xl py-12 grid grid-cols-2 md:grid-cols-4 gap-4">
    <div class="grid gap-4">
        <div>
            <img class="h-auto max-w-full rounded-lg" src="/photos/gallerie2.jpg" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="/photos/test.jpg" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="/photos/gallerie12.jpg" alt="">
        </div>
    </div>
    <div class="grid gap-4">
        <div>
            <img class="h-auto max-w-full rounded-lg" src="/photos/gallerie10.jpg" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="/photos/gallerie5.jpg" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="/photos/gallerie7.jpg" alt="">
        </div>
    </div>
    <div class="grid gap-4">
        <div>
            <img class="h-auto max-w-full rounded-lg" src="/photos/gallerie8.jpg" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="/photos/gallerie10.jpg" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="/photos/gallerie3.jpg" alt="">
        </div>
    </div>
    <div class="grid gap-4">
        <div>
            <img class="h-auto max-w-full rounded-lg" src="/photos/gallerie4.jpg" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="/photos/gallerie9.jpg" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="/photos/gallerie6.jpg" alt="">
        </div>
    </div>
</div>

<div class="w-full relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32">
    <img src="galleriesection.jpg" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover" />
    <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl" aria-hidden="true">
      <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" />
    </div>
    <div class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu" aria-hidden="true">
      <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" />
    </div>
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-3xl lg:mx-0">
            <h2 class="text-4xl font-bold tracking-tight text-white mb-4 sm:text-6xl">Découvrez nos prestations</h2>
            <button type="button" class="relative inline-flex items-center gap-x-1.5 rounded-md bg-zinc-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-zinc-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                <a href="/services">
                    Cartes des services
                </a>
            </button>
      </div>
    </div>
  </div>




    <PageFooter />



</div>


</template>

<script setup>

import NavBar from "@/Components/NavBar.vue";
import PageFooter from "@/Components/PageFooter.vue";


</script>
