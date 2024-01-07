<template>
    <section class="text-gray-600 body-font md:mb-0 mb-16">
        <div v-if="portfolios.length > 0" class="container px-5 md:pt-24 pt-10 mx-auto flex flex-wrap">
            <div class="lg:w-2/3 mx-auto md:grid md:grid-cols-2 flex overflow-x-scroll whitespace-nowrap flex-nowrap md:gap-5 gap-x-2">
                <div class="w-full bg-gray-100 py-32 px-10 relative col-span-full rounded">
                    <img alt="gallery" class="w-full object-full h-full opacity-25 absolute inset-0" :src="'storage/uploads/' + portfolios[0].images[0]?.url">
                    <div class="text-center relative z-10 w-full md:h-auto sm:h-64 h-20">
                       <h3 class="text-2xl text-gray-900 font-medium title-font mb-2 truncate">{{ portfolios[0].title }}</h3>
                       <p class="leading-relaxed truncate">{{ portfolios[0].description }}</p>
                       <Link :href="route('portfolios.show', [portfolios[0].slug])" class="mt-3 text-yellow-500 dark:text-yellow-700 inline-flex items-center">Voir plus
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </Link>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 grid-flow-row gap-y-4 gap-0 col-span-full">
                    <div v-for="portfolio in portfolios.slice(1)" :key="portfolio.id" class="px-2 w-full">
                        <div class="flex rounded flex-wrap md:w-full w-[280px] bg-gray-100 sm:py-24 py-16 sm:px-10 px-6 relative md:h-auto sm:h-64 h-44">
                            <img alt="gallery" class="w-full object-full h-full object-center block opacity-25 absolute inset-0" :src="'storage/uploads/' + portfolio.images[0]?.url">
                            <div class="text-center relative z-10 w-full bottom-5">
                                <h3 class="text-xl text-gray-900 font-medium title-font mb-2 truncate">{{ portfolio.title }}</h3>
                                <p class="leading-relaxed truncate">{{ portfolio.description }}</p>
                                <Link :href="route('portfolios.show', [portfolio.slug])" class="mt-3 text-yellow-500 dark:text-yellow-700 inline-flex items-center">Voir plus
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p v-if="portfolios.length < 1" class="text-center dark:text-white font-bold md:my-20">Aucune réalisation n'a été publiée pour l'instant ;)</p>
        <div class="md:mb-20 mt-10">
            <Link :href="route('portfolios.home')" as="button" class="block p-2 dark:text-white rounded-full mx-auto backdrop-blur drop-shadow-xl border">Voir plus</Link>
        </div>
    </section>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    portfolios: {
        type: Object
    }
});

const mobileMaxWidth = 767;
const mobileScreen = (window.innerWidth < mobileMaxWidth);
</script>