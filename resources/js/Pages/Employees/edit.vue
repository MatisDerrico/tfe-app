<template>
    <Head title="Edition employé" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mise à jour d'employé
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-sm p-6 sm:rounded-lg"
                >
                    <form @submit.prevent="submit">
                        <div class="flex flex-col items-center">
                            <InputLabel
                                class="mb-1 block text-sm font-medium leading-6 text-gray-900"
                                value="Nom"
                            />

                            <TextInput
                                type="text"
                                class="block w-1/4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                v-model="form.name"
                                required
                            />

                            <InputLabel
                                class="mt-4 mb-1 block text-sm font-medium leading-6 text-gray-900"
                                value="Type de service"
                            />

                            <select
                                class="my-4 rounded-lg"
                                v-model="form.type"
                                name="type"
                                @change="filterServices"
                                disabled
                            >
                                <option></option>
                                <option>Coiffure</option>
                                <option>Tatouage</option>
                            </select>

                            <div
                                class="mt-4"
                                v-for="service in props.services"
                                :key="service.id"
                            >
                                <input
                                    type="checkbox"
                                    class="rounded-lg"
                                    :value="service.id"
                                    v-model="form.services"
                                />

                                <label class="ml-2">
                                    {{ service.name }}
                                </label>
                            </div>

                            <div class="border-b border-black/10 pb-12"></div>

                            <PrimaryButton
                                class="ms-4 mt-4"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Confirmez
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { ref, onMounted } from "vue";
import { router } from '@inertiajs/vue3'

onMounted( () => {
    form.name = props.employee.name;
    form.type = props.employee.type;
    form.services =  props.providedServices;
})

const form = useForm({
    name: "",
    type: "",
    services: [],
});

const filteredServices = ref([]);

// Le nom employee correspond au nom donné dans la clé du tableau associatif envoyé en deuxième argument de la méthode edit.
const props = defineProps({
    employee: Object,
    services: Array,
    providedServices: Array,
});

// Lancement d'une requête put avec les données de l'objet form
const submit = () => {
    form.put("/admin/employees/" + props.employee.id, {
        onFinish: () => router.get('/admin/employees'),
    });
};
</script>
