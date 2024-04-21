<template>


    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Création de services</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                   <form @submit.prevent="submit">
                    <InputLabel value="name" />

                    <TextInput
                        type="text"
                        class="mt-1 block w-1/2"
                        v-model="form.name"
                        required
                    />

                    <InputLabel value="price" />

                    <TextInput
                        type="number"
                        class="mt-1 block w-1/2"
                        v-model="form.price"
                        required
                    />

                    <InputLabel value="duration" />

                    <TextInput
                        type="number"
                        class="mt-1 block w-1/2"
                        v-model="form.duration"
                        required
                    />

                    <InputLabel value="description" />

                    <textarea
                        class="mt-1 block w-full"
                        v-model="form.description">
                    </textarea>
                    <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                    </PrimaryButton>
                   </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>


    </template>

    <script setup>

    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import TextInput from '@/Components/TextInput.vue';
    import { Head, useForm } from '@inertiajs/vue3';
    import PrimaryButton from '@/Components/PrimaryButton.vue';

    const form = useForm({
        name: '',
        price: '',
        description: '',
        duration: '',
    });

    // Lancement d'une requête POST avec les données de l'objet form
    const submit = () => {
        form.post('/admin/services');
    };

    </script>
