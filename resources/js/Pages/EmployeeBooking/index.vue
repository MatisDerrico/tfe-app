<template>
    <Head title="Gestion employés" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Réservations pour {{ $page.props.auth.user.name }} </h2>
        </template>

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Client</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Services</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="booking in bookings" :key="booking.id">
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ booking.name }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <p v-for="service in booking.services" :key="service.id"> ({{service.type}}) {{ service.name }} - {{ formatDate(service.pivot.date) }} - {{ service.pivot.time }} </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    bookings: Array,
});

const formatDate = (date) => {
    const rawDate = new Date(date);

    return rawDate.getDay() + '/' + rawDate.getMonth() + '/' + rawDate.getFullYear();
}

</script>
