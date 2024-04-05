<template>


<Head title="Dashboard" />

<AuthenticatedLayout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Liste des services</h2>
    </template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div v-for="service in services">
                    <div>
                        <h2>{{ service.name }}</h2>
                        <p>{{ service.description }}</p>
                    </div>

                    <div>
                        <p>{{ service.price }}</p>
                    </div>
                </div>
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
