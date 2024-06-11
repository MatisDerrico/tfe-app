<template>
    <Head title="Gestion employés" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Liste des employées en vacances</h2>
        </template>

        <div class="my-4 flex justify-center">
            <PrimaryButton class="ms-4">
                <a href="/admin/employeesHoliday/create">
                    Planifier des congés
                </a>
            </PrimaryButton>
        </div>

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Nom de l'employé</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Début des congés</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Fin des congés</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="holiday in holidays" :key="holiday.id">
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ holiday.user.name }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ holiday.date_debut }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ holiday.date_fin }}</td>

                                <td class="flex justify-center items-center">
                                    <button
                                        class="flex px-2 py-4 text-sm bg-blue-200 rounded-lg border border-blue-400"
                                    >
                                        <img src="/img/editer.png" alt="edit" class="h-4 w-4 mr-2">
                                        <a :href="`/admin/employeesHoliday/${holiday.id}/edit`">
                                            Editer
                                        </a>
                                    </button>
                                    <button
                                        class="flex ml-4 px-2 py-4 text-sm bg-red-200 rounded-lg border border-red-400"
                                        @click="deleteHoliday(holiday)"
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
    holidays: Array,
});

const deleteHoliday = (holiday) => {
    router.delete("/admin/employeesHoliday/" + holiday.id + "/delete", {
        onBefore: () => {
            return confirm('Etes vous sur de vouloir supprimer ce congé ?')
        },
        onFinish: () => router.get('/admin/employeesHoliday'),
    });
}
</script>
