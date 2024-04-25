<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Liste des employées</h2>
        </template>

        <PrimaryButton class="ms-4">
                   <a href="/admin/employees/create">Créer un nouvel employé</a>
        </PrimaryButton>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Nom de l'employé</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Services</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr v-for="employee in employees">
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ employee.name }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            <p v-for="service in employee.services"> {{ service.name }}  </p>
                        </td>
                        <td>
                            <button>
                                <a href="/admin/employees/"></a>
                            </button>
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

const props = defineProps({
    employees: Array,
});

</script>
