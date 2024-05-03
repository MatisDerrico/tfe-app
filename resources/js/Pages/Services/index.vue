<template>


<Head title="Dashboard" />

<div
        class="bg-black relative flex-col sm:flex sm:justify-center sm:items-center min-h-screen"
    >

<NavBar/>

<div
            class="h-[500px] relative isolate overflow-hidden bg-gray-900 w-full py-24 sm:py-32"
        >
            <img
                src="/manon-service.jpg"
                alt=""
                class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center"
            />
            <div
                class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl"
            >
                <div
                    class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                    style="
                        clip-path: polygon(
                            74.1% 44.1%,
                            100% 61.6%,
                            97.5% 26.9%,
                            85.5% 0.1%,
                            80.7% 2%,
                            72.5% 32.5%,
                            60.2% 62.4%,
                            52.4% 68.1%,
                            47.5% 58.3%,
                            45.2% 34.5%,
                            27.5% 76.7%,
                            0.1% 64.9%,
                            17.9% 100%,
                            27.6% 76.8%,
                            76.1% 97.7%,
                            74.1% 44.1%
                        );
                    "
                />
            </div>
            <div
                class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu"
            >
                <div
                    class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                    style="
                        clip-path: polygon(
                            74.1% 44.1%,
                            100% 61.6%,
                            97.5% 26.9%,
                            85.5% 0.1%,
                            80.7% 2%,
                            72.5% 32.5%,
                            60.2% 62.4%,
                            52.4% 68.1%,
                            47.5% 58.3%,
                            45.2% 34.5%,
                            27.5% 76.7%,
                            0.1% 64.9%,
                            17.9% 100%,
                            27.6% 76.8%,
                            76.1% 97.7%,
                            74.1% 44.1%
                        );
                    "
                />
            </div>
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <!-- <div class="mx-auto max-w-2xl lg:mx-0">
        <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Support center</h2>
        <p class="mt-6 text-lg leading-8 text-gray-300">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
      </div> -->
                <div
                    class="absolute bottom-4 mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-6 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3 lg:gap-8"
                >
                    <div
                        v-for="card in cards"
                        :key="card.name"
                        class="flex items-center justify-center gap-x-4 rounded-xl bg-white/5 p-6 ring-1 ring-inset ring-white/10"
                    >
                        <component
                            :is="card.icon"
                            class="h-7 w-5 flex-none text-white"
                            aria-hidden="true"
                        />
                        <div class="text-base leading-7">
                            <p class="text-white">
                                {{ card.description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    <div class="bg-black py-12">
        <h2 class="mb-10 text-center font-semibold text-xl text-white leading-tight">Carte des services</h2>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-black">
                        <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">Services</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Description</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Prix</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Réservation</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-black">
                        <tr v-for="service in services">
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-white">{{ service.name }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-white">
                            {{ service.description }}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-white">
                            {{ service.price }} €
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            <button type="button" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:bg-white">
                                Réservez
                            </button>
                        </td>

                        <!-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                           <p v-for="employee in booking.employees"> {{ employee.name }} </p>
                        </td> -->
                        </tr>
                    </tbody>
                    </table>
                <!-- <div v-for="service in services">
                    <div>
                        <h2>{{ service.name }}</h2>
                        <p>{{ service.description }}</p>
                    </div>

                    <div>
                        <p>{{ service.price }}</p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <PageFooter />
</div>
</template>

<script setup>

import { Head } from '@inertiajs/vue3';
import NavBar from "@/Components/NavBar.vue";
import PageFooter from "@/Components/PageFooter.vue";

const props = defineProps({
    services: Array,
});

import {
    ClockIcon,
    LifebuoyIcon,
    MapPinIcon,
    NewspaperIcon,
    PhoneIcon,
} from "@heroicons/vue/20/solid";

const cards = [
    {
        description: "Ouvert aujourd'hui de : 10h00 - 18h30",
        icon: ClockIcon,
    },
    {
        description: "28 avenue Guillaume Gilbert 1050 Ixelles",
        icon: PhoneIcon,
    },
    {
        description: "02 726 46 66",
        icon: MapPinIcon,
    },
];

</script>
