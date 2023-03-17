<template>
    <header class="text-gray-600 dark:text-white body-font sticky top-0 backdrop-blur-md z-50">
        <div class="container mx-auto flex md:flex-wrap justify-between items-center flex-nowrap md:p-5 p-2 md:flex-row">
            <nav class="hidden md:flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">
                <a v-if="route().current('portfolios.show')" href="#recrutez-moi" class="flex items-center mr-5 hover:text-gray-900 cursor-pointer dark:hover:text-white">
                    <span class="mr-1">Recrutez-moi</span>
                    <svg class="fill-none w-5 h-5" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5"></path>
                    </svg>
                </a>
                <Link :href="route('blog.home')" class="mr-5 hover:text-gray-900 cursor-pointer dark:hover:text-white">Articles</Link>
                <Link :href="route('portfolios.home')" class="mr-5 hover:text-gray-900 cursor-pointer dark:hover:text-white">Portfolio</Link>
                <a v-if="! route().current('portfolios.show')" href="/#contact" class="flex items-center mr-5 hover:text-gray-900 cursor-pointer dark:hover:text-white">
                    Contact
                </a>
            </nav>
            <Logo />
            <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
                <Link :href="route('dashboard')" v-if="isAdmin" class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base">
                    Dashboard
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </Link>
                <a v-else class="inline-flex items-center bg-gray-100 dark:bg-gray-900 dark:hover:bg-gray-800 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base cursor-pointer" download>
                    <span class="min-[360px]:block hidden">Télécharger mon CV</span>
                    <span class="max-[360px]:block hidden">Mon CV</span>
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div> 
        </div>
    </header>
</template>
<script setup>
import Logo from '@/Components/Logo.vue';
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    isAdmin: {
        type: Boolean,
        default: false
    }
});

</script>