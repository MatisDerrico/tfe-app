<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Planification des congés
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-sm p-6 sm:rounded-lg"
                >
                    <form @submit.prevent="submit">

                        <InputLabel
                            class="mb-1 block text-sm font-medium leading-6 text-gray-900"
                            value="Nom de l'employé"
                        />

                        <select v-model="form.user_id" name="name" id="">
                            <option v-for="employee in employees" :value="employee.id">{{ employee.name }}</option>
                        </select>


                        <InputLabel
                            class="mb-1 block text-sm font-medium leading-6 text-gray-900"
                            value="date_debut"
                        />

                        <TextInput
                            type="date"
                            class="block w-1/4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            placeholder="23/05/2024"
                            v-model="form.date_debut"
                            required
                        />

                        <InputLabel
                            class="mb-1 block text-sm font-medium leading-6 text-gray-900"
                            value="date_fin"
                        />

                        <TextInput
                            type="date"
                            class="block w-1/4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            placeholder="25/05/2024"
                            v-model="form.date_fin"
                            required
                        />

                        <div class="border-b border-black/10 pb-12"></div>

                        <PrimaryButton
                            class="ms-4 mt-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Confirmez
                        </PrimaryButton>
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
import { router } from "@inertiajs/vue3";

onMounted( () => {
    form.user_id = props.holiday.user_id;
    form.date_debut = props.holiday.date_debut;
    form.date_fin =  props.holiday.date_fin;
})

const form = useForm({
    date_debut: "",
    date_fin: "",
    user_id:"",
});


const props = defineProps({
    holiday: Array,
    employees: Array,
});


// Lancement d'une requête POST avec les données de l'objet form
const submit = () => {
    form.put("/admin/employeesHoliday/"+props.holiday.id, {
        onFinish: () => router.get("/admin/employeesHoliday"),
    });
};
</script>
