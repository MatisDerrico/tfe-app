<template>


    <Head title="Réservation" />


    <GuestLayout>


        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm p-6 sm:rounded-lg">

                   <form @submit.prevent="submit" class="flex flex-col">


                            <div class="">
                                <InputLabel class="mb-1 block text-sm font-medium leading-6 text-gray-900"value="name" />

                                <TextInput
                                    type="text"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    v-model="form.name"
                                    required
                                />

                            </div>

                            <div class="">
                                <InputLabel class="mb-1 block text-sm font-medium leading-6 text-gray-900"value="name" />

                                <TextInput
                                    type="text"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    v-model="form.firstName"
                                    required
                                />

                            </div>


                            <div class="my-4">

                                <InputLabel class="mb-1 block text-sm font-medium leading-6 text-gray-900"value="email" />

                                <TextInput
                                    type="email"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    v-model="form.email"
                                    required
                                />
                            </div>

                            <h2 class="my-4 text-center">Choisissez le type de prestation</h2>

                            <div class="flex justify-between">
                                <div @click="filterServices('Coiffure')" class="border border-gray-300 rounded-lg p-4">
                                    <h2>Coiffure</h2>
                                    <img class="h-16 w-16" src="/img/coiffure.png" alt="">
                                </div>
                                <div @click="filterServices('Tatouage')" class="border border-gray-300 rounded-lg p-4">
                                    <h2>Tatouage</h2>
                                    <img class="h-16 w-16" src="/img/tatoo.png" alt="">
                                </div>
                            </div>

                            <div v-for="service in filteredServices">
                                <input type="checkbox"
                                v-model="form.servicesChoosen"
                                :value="service"
                                @change="calculateTotalPrice(service.price)" >

                                <h2>{{ service.name }}</h2>
                                <p>{{ service.price }}</p>
                            </div>

                            <div>
                                prixtotal: {{ form.price }};
                            </div>




                            <div class="border-b border-black/10 pb-12"></div>

                                <PrimaryButton class="flex justify-center items-center ms-4 mt-4 w-28" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Confirmez
                                </PrimaryButton>

                    </form>
                </div>
            </div>
        </div>
    </GuestLayout>


    </template>

    <script setup>

    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import TextInput from '@/Components/TextInput.vue';
    import { Head, useForm } from '@inertiajs/vue3';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import { ref } from 'vue';

    const form = useForm({
        name: '',
        firstName: '',
        email: '',
        servicesChoosen: [],
        price: 0,
    });

    const filteredServices = ref([]);

    const chooseYourType = ref();

    const props = defineProps({
        services: Array,
    });

    const filterServices = (type) => {
        chooseYourType.value = type;

        const filter = props.services.filter((item) => {
            return item.type === type;
        });

        filteredServices.value = filter;
    };

    // Elle calcul le prix total des services sélectionnés

    const calculateTotalPrice = () => {
        form.price = 0; // Réinitialise la variable prix à 0

        form.servicesChoosen.forEach((service)=>{
            form.price += service.price;
        });
    }

    // Lancement d'une requête POST avec les données de l'objet form
    const submit = () => {
        form.post('/admin/services');
    };

    </script>
