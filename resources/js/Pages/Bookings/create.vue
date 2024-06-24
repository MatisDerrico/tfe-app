<template>
    <Head title="Réservation" />

    <GuestLayout>
        <div class="py-4">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-2">
                <div class="w-full flex justify-center">
                    <a href="/">
                        <img
                            class="h-48 w-auto"
                            src="/logoblack.png"
                            alt="Your Company"
                        />
                    </a>
                </div>

                <div class="overflow-hidden shadow-sm p-6 sm:rounded-lg">
                    <form @submit.prevent="submit" class="flex flex-col w-full">
                        <div class="flex justify-center">
                            <div class="w-full max-w-sm">
                                <InputLabel
                                    class="mb-1 block text-sm font-medium leading-6 text-gray-900"
                                    value="nom complet"
                                />
                                <div class="relative">
                                    <UserCircleIcon
                                        class="absolute left-2 top-2 h-5 w-5 text-gray-500"
                                        aria-hidden="true"
                                    />
                                    <TextInput
                                        type="text"
                                        class="block w-full pl-10 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        v-model="form.name"
                                        placeholder="nom complet"
                                    />
                                </div>

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.name"
                                />

                                <div class="my-4">
                                    <InputLabel
                                        class="mb-1 block text-sm font-medium leading-6 text-gray-900"
                                        value="email"
                                    />
                                    <div class="relative">
                                        <EnvelopeIcon
                                            class="absolute left-2 top-2 h-5 w-5 text-gray-500"
                                            aria-hidden="true"
                                        />
                                        <TextInput
                                            type="email"
                                            class="block w-full pl-10 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            v-model="form.email"
                                            placeholder="Votre adresse email"
                                        />
                                    </div>

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.email"
                                    />
                                </div>
                            </div>
                        </div>

                        <h2 class="my-12 text-center">
                            Choisissez le type de prestation
                        </h2>

                        <div class="flex justify-center space-x-4">
                            <div
                                @click="filterServicesAndEmployees('Coiffure')"
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
                                @click="filterServicesAndEmployees('Tatouage')"
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

                        <div class="mx-auto">
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
                        </div>
                        <div
                            class="mt-4 bg-gray-300 px-2 py-4 text-center rounded-lg"
                        >
                            <InputLabel
                                class="mt-4 mb-1 block text-sm font-medium leading-6 text-gray-900"
                                value="Interlocuteur"
                            />

                            <select
                                v-model="form.employee_id"
                                @change="onChangeEmployee"
                            >
                                <option value="0">Sans préférence</option>
                                <option
                                    v-for="employee in filteredEmployees"
                                    :key="employee.id"
                                    :value="employee.id"
                                >
                                    {{ employee.name }}
                                </option>
                            </select>

                            <div
                                v-for="service in form.servicesChoosen"
                                :key="service.id"
                                class="flex mx-4 my-4"
                            >
                                <div class="flex flex-col w-full">
                                    <div class="flex">
                                        <div class="w-auto">
                                            <InputLabel
                                                class="mb-1 block text-sm font-medium leading-6 text-gray-900"
                                                value="Jour"
                                            />

                                            <VDatePicker
                                                v-model.string="form.date"
                                                mode="date"
                                                :min-date="new Date()"
                                                :disabled-dates="
                                                    employeeHolidays
                                                "
                                                @dayclick="checkDate"
                                                :masks="masks"
                                            />

                                            <InputError
                                                class="mt-2"
                                                :message="form.errors.date"
                                            />
                                        </div>

                                        <div class="w-1/2">
                                            <InputLabel
                                                class="mb-1 block text-sm font-medium leading-6 text-gray-900"
                                                value="Heure"
                                            />

                                            <div
                                                v-for="time in Object.keys(
                                                    slotsWithoutPreferences
                                                )"
                                                class="flex justify-center"
                                            >
                                                <span
                                                    @click="
                                                        selectSlot(
                                                            slotsWithoutPreferences,
                                                            service,
                                                            presentFullTime(
                                                                time
                                                            ),
                                                            slotsWithoutPreferences[
                                                                time
                                                            ][0]
                                                        )
                                                    "
                                                    :class="`w-1/2 px-1 mb-1 ${
                                                        service.isActive ===
                                                        presentFullTime(time)
                                                            ? 'bg-gray-200'
                                                            : 'bg-white'
                                                    }`"
                                                    >{{
                                                        presentTime(time)
                                                    }}</span
                                                >
                                            </div>

                                            <template
                                                v-if="
                                                    form.employee_id !== 0 &&
                                                    form.employee_id !== '0' &&
                                                    currentEmployeeSlots
                                                "
                                            >
                                                <div
                                                    v-for="time in currentEmployeeSlots"
                                                    class="flex justify-center"
                                                >
                                                    <span
                                                        @click="
                                                            selectSlot(
                                                                {},
                                                                service,
                                                                presentFullTime(
                                                                    time
                                                                ),
                                                                form.employee_id
                                                            )
                                                        "
                                                        :class="`w-1/2 px-1 mb-1 ${
                                                            service.isActive ===
                                                            presentFullTime(
                                                                time
                                                            )
                                                                ? 'bg-gray-200'
                                                                : 'bg-white'
                                                        }`"
                                                        >{{
                                                            presentTime(time)
                                                        }}</span
                                                    >
                                                </div>
                                            </template>

                                            <InputError
                                                class="mt-2"
                                                :message="form.errors.hour"
                                            />
                                        </div>
                                    </div>
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

                        <div class="flex justify-center">
                            <PrimaryButton
                                class="flex justify-center items-center ms-4 mt-4 w-28"
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
    </GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, router, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { ref, onMounted, watch } from "vue";
import InputError from "@/Components/InputError.vue";
import { EnvelopeIcon, UserCircleIcon } from "@heroicons/vue/24/outline";

const form = useForm({
    name: "",
    email: "",
    servicesChoosen: [],
    price: 0,
    date: formatDate(new Date()),
    bookingDate: undefined,
    // time: "",
    hour: "00",
    minute: "00",
    employee_id: 0,
});

getFreeSlots(form.date, form.employee_id);

const filteredServices = ref([]);
const filteredEmployees = ref([]);
const slotsWithoutPreferences = ref({});
const currentEmployeeSlots = ref(undefined);
const employeeHolidays = ref([]);

const props = defineProps({
    services: Array,
    employees: Array,
});

const masks = ref({
    modelValue: "YYYY-MM-DD",
});

function selectSlot(freeSlots, service, time, employeeId) {
    service.isActive = false;
    // TODO: Use freeSlots and service.duration to check ifwe are really able to selectthe choosed slot
    form.bookingDate = `${form.date} ${time}:00`;
    form.employee_id = employeeId;
    service.isActive = time;
    console.log("form.bookingDate", form.bookingDate);
    console.log("employeeId", employeeId);
}

function zeroBourage(number) {
    const string = String(number);

    if (string.length === 1) {
        return `0${string}`;
    }
    return string;
}

function presentTime(time) {
    const hours = Number.parseFloat(time);
    const integerPart = Math.floor(hours);
    const fractionalPart = hours - integerPart;

    return `${integerPart}:${zeroBourage(60 * fractionalPart)}`; // ex: "8:30"
}

function presentFullTime(time) {
    const hours = Number.parseFloat(time);
    const integerPart = Math.floor(hours);
    const fractionalPart = hours - integerPart;

    return `${zeroBourage(integerPart)}:${zeroBourage(60 * fractionalPart)}`; // ex: "8:30"
}

function formatDate(date) {
    return date.toISOString().split("T")[0];
}

function getFreeSlots(date, employeeId) {
    console.log("date", date, form.employee_id);

    /*if (!date) {
        console.log("no date bruh");
        return;
    }*/

    // const date = formatDate(datetime);
    fetch(`/booking/availability?date=${date}&employee_id=${employeeId}`)
        .then((response) => response.json())
        .then((data) => {
            slotsWithoutPreferences.value = {};
            currentEmployeeSlots.value = [];

            console.log("data", data);
            if (form.employee_id === 0 || form.employee_id === "0") {
                slotsWithoutPreferences.value = data;
            } else {
                currentEmployeeSlots.value = data;
            }
        })
        .catch((error) => console.error(error));
}

const checkDate = () => {
    getFreeSlots(form.date, form.employee_id);

    /*    axios
        .get("/time/" + form.date + "/" + form.employee_id)
        .then((response) => {
            const hoursToRemove = response.data;

            // Récupérer l'élément select
            let hourSelect = document.getElementById("hourSelect");

            // Parcourir les options et supprimer celles qui correspondent aux heures à supprimer
            for (let i = hourSelect.options.length - 1; i >= 0; i--) {
                const option = hourSelect.options[i];

                if (hoursToRemove.includes(option.value)) {
                    hourSelect.remove(i);
                }

                // console.log(hourSelect.options);
            }
        });*/
};

const filterServicesAndEmployees = (type) => {
    const filter = props.services.filter((item) => {
        return item.type === type;
    });

    filteredServices.value = filter;

    filteredEmployees.value = props.employees.filter((item) => {
        return item.employee_type === type;
    });
};

const onChangeEmployee = () => {
    getFreeSlots(form.date, form.employee_id);

    axios.get("/holidays/" + form.employee_id).then((response) => {
        employeeHolidays.value = [];

        response.data.forEach((holiday) => {
            let holidayObject = {
                start: holiday.date_debut,
                end: holiday.date_fin,
            };

            employeeHolidays.value.push(holidayObject);
        });
    });
};

onMounted(() => {
    filteredEmployees.value = props.employees;
});

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
    form.post("/bookings");
};
</script>
