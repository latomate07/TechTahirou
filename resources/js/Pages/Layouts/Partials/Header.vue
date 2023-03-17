<template>
    <header class="text-gray-600 dark:text-white body-font sticky top-0 backdrop-blur-md z-50">
        <div class="container mx-auto flex md:flex-wrap justify-between items-center flex-nowrap md:p-5 p-2 md:flex-row">
            <nav class="hidden md:flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">
                <Link href="/#parcours" class="mr-5 hover:text-gray-900 dark:hover:text-white cursor-pointer">Parcours</Link>
                <Link v-if="! route().current('portfolios.home')" href="/#portfolio" class="mr-5 hover:text-gray-900 dark:hover:text-white cursor-pointer">Portfolio</Link>
                <Link v-if="! route().current('blog.*')" href="/#blog" class="mr-5 hover:text-gray-900 dark:hover:text-white cursor-pointer">Blog</Link>
                <Link href="/#contact" class="hover:text-gray-900 dark:hover:text-white cursor-pointer">Contact</Link>
            </nav>
            <Logo />
            <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
                <Link :href="route('dashboard')" v-if="isAdmin" class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base md:mt-0">
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