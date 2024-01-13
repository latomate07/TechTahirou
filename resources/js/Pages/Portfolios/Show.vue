<template>
    <Head :title="realisation.title" />
    <MainLayout>
        <div class="dark:text-white mx-auto w-full md:max-w-2xl max-w-[90vw] md:mt-20 sm:mt-16 mt-10 format format-sm sm:format-base lg:format-lg format-yellow dark:format-invert">
            <article>    
                <div id="controls-carousel" class="relative" data-carousel="slide">
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <div v-for="(image, index) in realisation.images" :key="index" class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img :src="'/storage/uploads/' + image.url" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                    </div>
                    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                            <span class="sr-only">Précédent</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            <span class="sr-only">Suivant</span>
                        </span>
                    </button>
                </div>
                <span class="flex items-center mt-5">
                    <svg class="w-4 h-4 mr-1" data-darkreader-inline-stroke="" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    {{ realisation.statistic?.visits ?? 0 }}
                    vues
                </span>
            </article>
            <div class="md:mt-16 mt-5">
                <h1 class="font-sans font-black text-3xl text-center">{{ realisation.title }}</h1>
                <p class="mt-5" v-html="realisation.description.replace(/\n/g, '<br>')"></p>
            </div>
            <div class="flex items-center md:mt-16 mt-10 max-[445px]:whitespace-nowrap">
                <h1>Tags :</h1>
                <div class="flex flex-nowrap overflow-x-scroll max-[445px]:whitespace-nowrap">
                    <Link v-for="tag in realisation.tags" :key="tag.id" :href="route('portfolios.home') + '/?searchByTag=' + tag.name" class="relative z-6 rounded-full bg-yellow-50 py-1.5 px-3 font-medium text-yellow-600 hover:bg-yellow-100 ml-2">
                        {{ tag.name }}
                    </Link>
                    <p v-if="realisation.tags.length == 0" class="ml-2">Non défini</p>
                </div>
            </div>
        </div>
        <RelatedPortfolios v-if="relatedRealisations.length > 0" :portfolios="relatedRealisations" class="mt-16"/>
    </MainLayout>
</template>
<script setup>
import { onMounted } from 'vue';
import RelatedPortfolios from '@/Components/RelatedPortfolios.vue';
import MainLayout from '@/Pages/Blog/Layout/Main.vue';
import { initFlowbite } from 'flowbite';
import { Link, Head } from '@inertiajs/vue3';
const props = defineProps({
    realisation: Object,
    relatedRealisations: Object
});

onMounted(() => {
    initFlowbite();
})
</script>