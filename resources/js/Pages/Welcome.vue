<script setup>
import { Head, Link } from "@inertiajs/vue3";
import PageFooter from "@/Components/PageFooter.vue";
import NavBar from "@/Components/NavBar.vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

import {
    ClockIcon,
    LifebuoyIcon,
    MapPinIcon,
    NewspaperIcon,
    PhoneIcon,
} from "@heroicons/vue/20/solid";

const cards = [
    {
        description: "Ouvert aujourd'hui de : 10h00 - 18h30",
        icon: ClockIcon,
    },
    {
        description: "28 avenue Guillaume Gilbert 1050 Ixelles",
        icon: PhoneIcon,
    },
    {
        description: "02 726 46 66",
        icon: MapPinIcon,
    },
];

import { ref } from "vue";

const product = {
    name: "Basic Tee 6-Pack",
    price: "$192",
    href: "#",
    breadcrumbs: [
        { id: 1, name: "Men", href: "#" },
        { id: 2, name: "Clothing", href: "#" },
    ],
    images: [
        {
            src: "https://tailwindui.com/img/ecommerce-images/product-page-02-secondary-product-shot.jpg",
            alt: "Two each of gray, white, and black shirts laying flat.",
        },
        {
            src: "https://tailwindui.com/img/ecommerce-images/product-page-02-tertiary-product-shot-01.jpg",
            alt: "Model wearing plain black basic tee.",
        },
        {
            src: "https://tailwindui.com/img/ecommerce-images/product-page-02-tertiary-product-shot-02.jpg",
            alt: "Model wearing plain gray basic tee.",
        },
        {
            src: "https://tailwindui.com/img/ecommerce-images/product-page-02-featured-product-shot.jpg",
            alt: "Model wearing plain white basic tee.",
        },
    ],
    colors: [
        { name: "White", class: "bg-white", selectedClass: "ring-gray-400" },
        { name: "Gray", class: "bg-gray-200", selectedClass: "ring-gray-400" },
        { name: "Black", class: "bg-gray-900", selectedClass: "ring-gray-900" },
    ],
    sizes: [
        { name: "XXS", inStock: false },
        { name: "XS", inStock: true },
        { name: "S", inStock: true },
        { name: "M", inStock: true },
        { name: "L", inStock: true },
        { name: "XL", inStock: true },
        { name: "2XL", inStock: true },
        { name: "3XL", inStock: true },
    ],
    description:
        'The Basic Tee 6-Pack allows you to fully express your vibrant personality with three grayscale options. Feeling adventurous? Put on a heather gray tee. Want to be a trendsetter? Try our exclusive colorway: "Black". Need to add an extra pop of color to your outfit? Our white tee has you covered.',
    highlights: [
        "Hand cut and sewn locally",
        "Dyed with our proprietary colors",
        "Pre-washed & pre-shrunk",
        "Ultra-soft 100% cotton",
    ],
    details:
        'The 6-Pack includes two black, two white, and two heather gray Basic Tees. Sign up for our subscription service and be the first to get new, exciting colors, like our upcoming "Charcoal Gray" limited release.',
};
const reviews = { href: "#", average: 4, totalCount: 117 };

const selectedColor = ref(product.colors[0]);
const selectedSize = ref(product.sizes[2]);

const features = [
    {
        name: "L'art de la coiffure",
        description:
            "Au bout du blaireau, du rasoir, des ciseaux, de la tondeuse… Mademoiselle D’Errico, une barbière passionnée ! Ses mains expertes, son implication, son écoute, son enthousiasme, sa jeunesse, son sens de l’innovation, sans oublier son joli sourire et sa bonne humeur l’ont fait immédiatement sortir du lot !",
    },
    {
        name: "Un moment de fierté après 7 ans de dévouement",
        description:
            "7 années d’expérience qui lui ont déjà valu de remporter, lors d’un Concours International en 2015 à Rotterdam, le Meilleur Prix et la Consécration dans ce petit univers composé d’Hommes exclusivement !",
    },
    {
        name: "Formations sur mesure : Découvrez les secrets du métier",
        description:
            "Pour partager sa passion et son savoir, votre barbière propose des formations « sous réservation » pour les particuliers qualifiés qui souhaitent eux aussi apprendre les techniques, l’art et la maîtrise.",
    },
    {
        description:
            "« Mlle D’Errico », Un Petit Bout de « Femme Barbier » au Poil !",
    },
];
</script>

<template>
    <Head title="Welcome" />

    <div
        class="bg-black relative flex-col sm:flex sm:justify-center sm:items-center min-h-screen"
    >

        <NavBar/>

        <div
            class="h-[500px] relative isolate overflow-hidden bg-gray-900 w-full py-24 sm:py-32"
        >
            <img
                src="/manon3.jpg"
                alt=""
                class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center"
            />
            <div
                class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl"
            >
                <div
                    class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                    style="
                        clip-path: polygon(
                            74.1% 44.1%,
                            100% 61.6%,
                            97.5% 26.9%,
                            85.5% 0.1%,
                            80.7% 2%,
                            72.5% 32.5%,
                            60.2% 62.4%,
                            52.4% 68.1%,
                            47.5% 58.3%,
                            45.2% 34.5%,
                            27.5% 76.7%,
                            0.1% 64.9%,
                            17.9% 100%,
                            27.6% 76.8%,
                            76.1% 97.7%,
                            74.1% 44.1%
                        );
                    "
                />
            </div>
            <div
                class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu"
            >
                <div
                    class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                    style="
                        clip-path: polygon(
                            74.1% 44.1%,
                            100% 61.6%,
                            97.5% 26.9%,
                            85.5% 0.1%,
                            80.7% 2%,
                            72.5% 32.5%,
                            60.2% 62.4%,
                            52.4% 68.1%,
                            47.5% 58.3%,
                            45.2% 34.5%,
                            27.5% 76.7%,
                            0.1% 64.9%,
                            17.9% 100%,
                            27.6% 76.8%,
                            76.1% 97.7%,
                            74.1% 44.1%
                        );
                    "
                />
            </div>
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <!-- <div class="mx-auto max-w-2xl lg:mx-0">
        <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Support center</h2>
        <p class="mt-6 text-lg leading-8 text-gray-300">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
      </div> -->
                <div
                    class="absolute bottom-4 mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-6 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3 lg:gap-8"
                >
                    <div
                        v-for="card in cards"
                        :key="card.name"
                        class="flex items-center justify-center gap-x-4 rounded-xl bg-white/5 p-6 ring-1 ring-inset ring-white/10"
                    >
                        <component
                            :is="card.icon"
                            class="h-7 w-5 flex-none text-white"
                            aria-hidden="true"
                        />
                        <div class="text-base leading-7">
                            <p class="text-white">
                                {{ card.description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-6 py-8 sm:py-16 lg:px-8">
            <div class="mx-auto max-w-4xl text-center">
                <img src="/logo1.png" alt="logo" class="h-[250px] mx-auto" />
                <h2
                    class="text-2xl font-bold tracking-tight text-white sm:text-4xl"
                >
                    Coiffeuse barbière dans le sud de Bruxelles
                </h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    Situé à Ixelles, le barbershop et Tatoo shop Mlle D'Errico
                    vous accueille dans un espace exclusivement masculin pour
                    prendre soin de vous et vous chouchouter chers messieurs.
                </p>
                <button type="button" class="rounded-md mt-4 bg-zinc-400 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-zinc-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-zinc-400">
                    RÉSERVER
                </button>
            </div>
        </div>

        <div>
            <div
                class="mx-auto max-w-2xl px-4 py-24 sm:px-6 sm:py-32 lg:max-w-7xl lg:px-8"
            >
                <div
                    class="grid grid-cols-1 items-center gap-x-8 gap-y-16 lg:grid-cols-2"
                >
                    <div>
                        <div class="border-b border-gray-200 pb-10">
                            <h2 class="font-bold text-xl text-white">
                                Mlle D’Errico
                            </h2>
                            <p
                                class="mt-2 text-3xl text-white font-bold tracking-tight sm:text-4xl"
                            >
                                Votre barbière à Ixelles : une professionnelle
                                passionnée
                            </p>
                        </div>

                        <dl class="mt-10 space-y-10">
                            <div
                                v-for="feature in features"
                                :key="feature.name"
                            >
                                <dt class="text-sm font-bold text-white">
                                    {{ feature.name }}
                                </dt>
                                <dd class="mt-3 text-sm text-white">
                                    {{ feature.description }}
                                </dd>
                            </div>
                        </dl>
                    </div>

                    <div>
                        <div
                            class="aspect-h-4 aspect-w-4 overflow-hidden rounded-lg bg-gray-100"
                        >
                            <img
                                src="/manon11.jpg"
                                alt="Black kettle with long pour spot and angled body on marble counter next to coffee mug and pour-over system."
                                class="h-full w-full object-cover object-center"
                            />
                        </div>
                        <div
                            class="mt-4 grid grid-cols-2 gap-4 sm:mt-6 sm:gap-6 lg:mt-8 lg:gap-8"
                        >
                            <div
                                class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-100"
                            >
                                <img
                                    src="/manon13.jpg"
                                    alt="Detail of temperature setting button on kettle bass with digital degree readout."
                                    class="h-full w-full object-cover object-center"
                                />
                            </div>
                            <div
                                class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-100"
                            >
                                <img
                                    src="/manon14.jpg"
                                    alt="Kettle spout pouring boiling water into coffee grounds in pour-over mug."
                                    class="h-full w-full object-cover object-center"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="mx-auto mt-6 w-full h-auto sm:h-[600px] sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8"
        >
            <div
                class="hidden lg:block w-full h-full"
            >
                <img
                    src="/manon6.jpg"
                    alt="Manon1"
                    class="h-full"
                />
            </div>

            <div
                class="sm:flex sm:flex-col sm:items-center lg:flex lg:flex-col lg:justify-between"
            >
                <div class="sm:overflow-hidden sm:rounded-lg mb-6">
                    <img
                        src="/manon5.jpg"
                        alt="Manon1"
                        class="h-auto w-full object-cover object-center sm:object-cover sm:object-center"
                    />
                </div>

                <div class="sm:overflow-hidden sm:rounded-lg">
                    <img
                        src="/manon7.jpg"
                        alt="Manon1"
                        class="h-auto w-full object-cover object-center sm:object-cover sm:object-center"
                    />
                </div>
            </div>

            <div class="hidden lg:block sm:overflow-hidden sm:rounded-lg">
                <img src="/manon9.jpg" alt="Manon1" class="h-full w-full" />
            </div>
        </div>

        <PageFooter />


    </div>
</template>
