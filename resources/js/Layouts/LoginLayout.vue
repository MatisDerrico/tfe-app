<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center bg-gray-100">
        <Link href="/">
            <img src="/logoblack.png" alt="Logo" class="w-40"> <!-- Make logo clickable -->
        </Link>
        <div
            class="w-full max-w-2xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
