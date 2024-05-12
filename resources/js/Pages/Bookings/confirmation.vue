<template>
<GuestLayout>
    <h1 class="text-xl font-bold text-center">Confirmation</h1>

    <p class="my-4 text-lg text-justify">Votre réservation a bien été prise en compte, vous allez recevoir un mail de confirmation très prochainement.</p>

    <div class="mt-4 flex justify-center">
        <button class="mx-2 bg-slate-300 px-4 py-2 rounded-lg">
            <a href="/">Retour à l'accueil</a>
        </button>

        <button class="mx-2 bg-slate-300 px-4 py-2 rounded-lg">
            <a href="/services">Retour aux services</a>
        </button>

        <button class="mx-2 bg-slate-300 px-4 py-2 rounded-lg">
            <a href="/booking/create">Faire une autre réservation</a>
        </button>
    </div>
</GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
</script>
