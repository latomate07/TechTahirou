<template>
    <Link :href="route('home')" class="cursor-pointer flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center md:mb-0">
        <svg class="w-8 h-8 fill-none dark:stroke-white" data-darkreader-inline-stroke="" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z"></path>
        </svg>
        <span class="ml-3 min-[420px]:text-xl text-sm text-black dark:text-white">TechTahirou</span>
    </Link>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';

</script>