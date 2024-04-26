<template>
    <Head title="Gestion employés" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Liste des employées</h2>
        </template>

        <div class="my-4 flex justify-center">
            <PrimaryButton class="ms-4">
                <a href="/admin/employees/create">
                    Créer un nouvel employé
                </a>
            </PrimaryButton>
        </div>

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Nom</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Services</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="employee in employees" :key="employee.id">
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ employee.name }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <p v-for="service in employee.services" :key="service.id"> {{ service.name }}  </p>
                                </td>
                                <td class="flex justify-center items-center">
                                    <button
                                        class="flex px-2 py-4 text-sm bg-blue-200 rounded-lg border border-blue-400"
                                    >
                                        <img src="/img/editer.png" alt="edit" class="h-4 w-4 mr-2">
                                        <a :href="`/admin/employees/${employee.id}/edit`">
                                            Editer
                                        </a>
                                    </button>
                                    <button
                                        class="flex ml-4 px-2 py-4 text-sm bg-red-200 rounded-lg border border-red-400"
                                        @click="deleteEmployee(employee)"
                                    >
                                        <img src="/img/supprimer.png" alt="edit" class="h-4 w-4 mr-2">
                                        Supprimer
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
import { router } from '@inertiajs/vue3';

const props = defineProps({
    employees: Array,
});

const deleteEmployee = (employee) => {
    router.delete("/admin/employees/" + employee.id + "/delete", {
        onBefore: () => {
            return confirm('Etes vous sur de vouloir supprimer cet employé ?')
        },
        onFinish: () => router.get('/admin/employees'),
    });
}
</script>
