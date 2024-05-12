<template>
    <Head title="Réservation" />

    <GuestLayout>
        <div class="py-4">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-2">
                <div
                    class="bg-white overflow-hidden shadow-sm p-6 sm:rounded-lg"
                >
                    <form @submit.prevent="submit" class="flex flex-col">
                        <div class="">
                            <InputLabel
                                class="mb-1 block text-sm font-medium leading-6 text-gray-900"
                                value="nom complet"
                            />

                            <TextInput
                                type="text"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                v-model="form.name"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.name"
                            />
                        </div>

                        <div class="my-4">
                            <InputLabel
                                class="mb-1 block text-sm font-medium leading-6 text-gray-900"
                                value="email"
                            />

                            <TextInput
                                type="email"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                v-model="form.email"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.email"
                            />
                        </div>

                        <h2 class="my-4 text-center">
                            Choisissez le type de prestation
                        </h2>

                        <div class="flex justify-between">
                            <div
                                @click="filterServices('Coiffure')"
                                class="border border-gray-300 rounded-lg p-4"
                            >
                                <h2>Coiffure</h2>
                                <img
                                    class="h-16 w-16"
                                    src="/img/coiffure.png"
                                    alt=""
                                />
                            </div>
                            <div
                                @click="filterServices('Tatouage')"
                                class="border border-gray-300 rounded-lg p-4"
                            >
                                <h2>Tatouage</h2>
                                <img
                                    class="h-16 w-16"
                                    src="/img/tatoo.png"
                                    alt=""
                                />
                            </div>
                        </div>

                        <div
                            v-for="service in filteredServices"
                            :key="service.id"
                            class="flex my-4 items-center gap-2"
                        >
                            <input
                                type="checkbox"
                                class="rounded-full"
                                v-model="form.servicesChoosen"
                                :value="service"
                                @change="calculateTotalPrice"
                            />

                            <h2>
                                {{ service.name }}
                            </h2>
                            <p class="font-bold">{{ service.price }} €</p>
                        </div>

                        <div class="my-4 flex justify-between">
                            <div>
                                <InputLabel
                                    class="mb-1 block text-sm font-medium leading-6 text-gray-900"
                                    value="Jour"
                                />
                                <input type="date" v-model="form.date" />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.date"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    class="mb-1 block text-sm font-medium leading-6 text-gray-900"
                                    value="Heure"
                                />
                                <input type="time" v-model="form.time" />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.time"
                                />
                            </div>
                        </div>

                        <div
                            class="mt-4 bg-gray-300 px-2 py-4 text-center rounded-lg"
                        >
                            <div
                                v-for="service in form.servicesChoosen"
                                :key="service.id"
                                class="flex justify-between mx-4 my-4"
                            >
                                <div class="flex flex-col w-full">
                                    <div class="flex justify-between">
                                        <div class="flex">
                                            <h2>{{ service.name }}</h2>
                                            <p class="ml-4 font-bold">
                                                {{ service.price }} €
                                            </p>
                                        </div>
                                        <img
                                            src="/img/supprimer.png"
                                            class="h-6 w-6"
                                            alt=""
                                            @click="removeService(service.id)"
                                        />
                                    </div>
                                    <InputLabel
                                        class="mt-4 mb-1 block text-sm font-medium leading-6 text-gray-900"
                                        value="Interlocuteur"
                                    />
                                    <select v-model="service.employee_id">
                                        <option value="0">
                                            Sans préférence
                                        </option>
                                        <option
                                            v-for="employee in props.employees"
                                            :key="employee.id"
                                            :value="employee.id"
                                        >
                                            {{ employee.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <p class="mt-2">
                                Total :
                                <span class="font-bold"
                                    >{{ form.price }} €</span
                                >
                            </p>
                        </div>
                        
                        <InputError
                            class="mt-2"
                            :message="form.errors.servicesChoosen"
                        />

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
    </GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, router, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { ref } from "vue";
import InputError from "@/Components/InputError.vue";

const form = useForm({
    name: "",
    email: "",
    servicesChoosen: [],
    price: 0,
    date: "",
    time: "",
});

const filteredServices = ref([]);

const chooseYourType = ref();

const props = defineProps({
    services: Array,
    employees: Array,
});

const filterServices = (type) => {
    chooseYourType.value = type;

    const filter = props.services.filter((item) => {
        return item.type === type;
    });

    filteredServices.value = filter;
};

// Calcul du prix total des services sélectionnés
const calculateTotalPrice = () => {
    form.price = 0; // Réinitialise la variable prix à 0

    form.servicesChoosen.forEach((service) => {
        form.price += service.price;
    });
};

// Suppression d'un service et mise à jour du prix
const removeService = (serviceId) => {
    const excludeService = form.servicesChoosen.filter((item) => {
        return item.id != serviceId;
    });

    form.servicesChoosen = excludeService;

    calculateTotalPrice();
};

// Lancement d'une requête POST avec les données de l'objet form
const submit = () => {
    form.post("/bookings", {
        onFinish: () => router.get("/booking/confirmation"),
    });
};
</script>
