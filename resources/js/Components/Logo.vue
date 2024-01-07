<template>
    <Link :href="route('home')" class="cursor-pointer flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center md:mb-0">
        <span class="ml-3 min-[420px]:text-xl text-md text-gray-700 dark:text-white font-rubikglitch">TechTahirou</span>
    </Link>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
</script>