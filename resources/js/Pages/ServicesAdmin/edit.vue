<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mise à jour de service
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-sm p-6 sm:rounded-lg"
                >
                    <form @submit.prevent="submit" class="flex flex-col">
                        <div class="flex flex-col sm:flex-row sm:gap-6">
                            <div class="w-1/4">
                                <InputLabel
                                    class="mb-1 block text-sm font-medium leading-6 text-gray-900"
                                    value="name"
                                />

                                <TextInput
                                    type="text"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    v-model="form.name"
                                    required
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.name"
                                />
                            </div>

                            <div class="w-1/8">
                                <InputLabel
                                    class="mb-1 block text-sm font-medium leading-6 text-gray-900"
                                    value="price"
                                />

                                <TextInput
                                    type="number"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    v-model="form.price"
                                    required
                                />
                            </div>

                            <InputError
                                class="mt-2"
                                :message="form.errors.price"
                            />
                        </div>

                        <div>
                            <InputLabel
                                class="mt-4 mb-1 block text-sm font-medium leading-6 text-gray-900"
                                value="duration"
                            />

                            <TextInput
                                type="number"
                                class="block w-1/4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                v-model="form.duration"
                                required
                            />
                        </div>

                        <InputError
                            class="mt-2"
                            :message="form.errors.duration"
                        />

                        <div>
                            <InputLabel
                                    class="mt-4 mb-1 block text-sm font-medium leading-6 text-gray-900"
                                    value="type"
                                />

                                <select name="" class="" v-model="form.type">
                                    <option value="Coiffure">Coiffure</option>
                                    <option value="Tatouage">Tatouage</option>
                                </select>

                                <InputError class="mt-2" :message="form.errors.type" />
                        </div>

                        <InputLabel
                            class="mt-4 mb-1 block text-sm font-medium leading-6 text-gray-900"
                            value="description"
                        />

                        <textarea
                            class="block w-1/2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            v-model="form.description"
                        >
                        </textarea>

                        <InputError class="mt-2" :message="form.errors.email" />

                        <div class="border-b border-black/10 pb-12"></div>

                        <PrimaryButton
                            class="flex justify-center items-center ms-4 mt-4 w-28"
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
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { ref, onMounted } from "vue";

onMounted( () => {
    form.name = props.service.name;
    form.price = props.service.price;
    form.description = props.service.description;
    form.duration = props.service.duration;
    form.type = props.service.type;
})

const form = useForm({
    name: "",
    price: "",
    description: "",
    duration: "",
    type: "",
});

const props = defineProps({
    service: Object,
});

// Lancement d'une requête POST avec les données de l'objet form
const submit = () => {
    form.put("/admin/services/" + props.service.id);
};
</script>
