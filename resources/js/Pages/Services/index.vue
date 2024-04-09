<template>


<Head title="Dashboard" />

<AuthenticatedLayout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Liste des services</h2>
    </template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Services</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Description</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Prix</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Réservation</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr v-for="service in services">
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ service.name }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {{ service.description }}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
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
</AuthenticatedLayout>


</template>

<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    services: Array,
});

</script>
