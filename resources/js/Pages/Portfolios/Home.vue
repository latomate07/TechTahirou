<template>
    <Head title="Mes réalisations" />
    <MainLayout>        
        <section class="bg-white dark:bg-darkmode">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                    <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Portfolios</h2>
                    <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">
                        Découvrez mes réalisations sélectionnées et récentes
                    </p>
                </div> 
                <div class="flex flex-nowrap items-center justify-center pb-2 sm:pb-4 md:pb-8">
                    <button @click="showAllTags" type="button" class="text-yellow-700 hover:text-white border border-yellow-600 bg-white hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 rounded-full text-base sm:px-5 sm:py-2.5 px-2.5 text-center mr-3 mb-3 dark:border-yellow-500 dark:text-yellow-500 dark:hover:text-white dark:hover:bg-yellow-500 dark:bg-gray-900 dark:focus:ring-yellow-800 tagAllBtn tagButtons">
                        Tous
                    </button>
                    <div class="flex overflow-x-scroll whitespace-nowrap md:p-5 p-1">
                        <button v-for="tag in tags" :key="tag.id" type="button" 
                                @click="tagFilter(tag.name, $event)"
                                class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none rounded-full text-base sm:px-5 sm:py-2.5 px-2.5 text-center mr-3 mb-3 dark:text-white dark:focus:ring-gray-800 tagButtons">
                            {{ tag.name }}
                        </button>
                    </div>
                </div>
                <div v-if="realisations.data.length > 0" class="flex flex-wrap -m-4">
                    <div v-for="portfolio in realisations.data" :key="portfolio.id" class="lg:w-1/3 sm:w-1/2 sm:block w-full p-4 cursor-pointer">
                        <div @click="router.get(route('portfolios.show', [portfolio.slug]))" class="flex relative rounded aspect-video">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-full object-center" :src="'/storage/uploads/' + portfolio.images[0]?.url">
                            <div class="px-8 py-2 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ portfolio.title }}</h1>
                                <p class="leading-relaxed truncate">
                                    {{ portfolio.description }}
                                </p>
                                <h1 class="text-md mt-5">Languages utilisés :</h1>
                                <div class="flex justify-between gap-2 flex-nowrap overflow-x-scroll whitespace-nowrap mt-2">
                                    <h2 v-for="tag in portfolio.tags" :key="tag.id" class="tracking-widest text-sm title-font font-medium text-yellow-500 mb-1 p-2 rounded-full border border-gray-300">
                                        {{ tag.name }}
                                    </h2>
                                    <p v-if="portfolio.tags.length == 0">Non défini</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p v-else class="text-center mt-5 mx-auto">Oups ! Aucune réalisation n'a été trouvée.</p>
            </div>
        </section>
    </MainLayout>
</template>
<script setup>
import MainLayout from '../Layouts/Main.vue';
import { router } from '@inertiajs/core';
import { Head } from '@inertiajs/vue3';
const props = defineProps({
    realisations: Object,
    tags: Object
});
const tagFilter = (tag, event) => {    
    router.get(route('portfolios.home'), {searchByTag: tag}, {
        preserveScroll: true,
        preserveState: true,
    });

    handleActiveTab(event.target);
};
const showAllTags = (event) => {
    removeRequestParameters();

    router.reload({
        preserveScroll: true,
        preserveState: true,
        replace: true
    });
    handleActiveTab(event.target, true);
}
const removeRequestParameters = () => {
    const urlWithoutSearchParams = window.location.href.split('?')[0];
    history.pushState({}, null, urlWithoutSearchParams);
};
const handleActiveTab = (currentTag, isTagAllBtn = false) => {
    // Disable active tab on all tag buttons
    document.querySelectorAll('.tagButtons').forEach((tagButton) => {
        tagButton.classList.remove('bg-yellow-700', 'text-white');
        tagButton.classList.contains('tagAllBtn') ? tagButton.classList.add('bg-white', 'text-yellow-700') : tagButton.classList.add('bg-white', 'text-black');
    });

    // Active tab
    isTagAllBtn ? currentTag.classList.remove('bg-white', 'text-yellow-700') : currentTag.classList.remove('bg-white');
    currentTag.classList.add('bg-yellow-700', 'text-white');
};
</script>