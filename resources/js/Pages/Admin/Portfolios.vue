<template>
    <Head title="Portfolios" />
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-[85vw] md:max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex md:flex-row flex-col justify-between items-center overflow-hidden sm:rounded-lg">
                    <div class="md:w-1/2 w-full">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">
                            Rechercher
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <input v-model="searchTerm" type="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-yellow-500 focus:border-yellow-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500" 
                                    placeholder="Rechercher un portfolio..." required>
                            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                Trouver
                            </button>
                        </div>
                    </div>
                    <div class="md:mt-0 md:mr-2 mt-5 mr-auto">
                        <Link :href="route('dashboard.portfolios.create')" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                            Ajouter
                            <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </Link>
                    </div>
                </div>
                <div class="relative overflow-x-auto sm:rounded-lg mt-10">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input @click="toggleAllCheckboxes" id="checkbox-all-search" type="checkbox" class="cursor-pointer w-4 h-4 text-yellow-600 bg-gray-100 border-gray-300 rounded focus:ring-yellow-500 dark:focus:ring-yellow-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Titre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Auteur
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tag
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Statut
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="portfolio in portfolios.data" :key="portfolio.data.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-table-search-1" type="checkbox" class="cursor-pointer w-4 h-4 text-yellow-600 bg-gray-100 border-gray-300 rounded focus:ring-yellow-500 dark:focus:ring-yellow-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ portfolio.title }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ portfolio.user.name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ portfolio.tag }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ portfolio.status }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium p-2 rounded bg-yellow-600 text-white dark:text-white mr-2">Modifier</a>
                                    <a @click="deletePortfolio(portfolio)" href="#" class="font-medium p-2 rounded bg-red-600 text-white dark:text-white mr-2">Supprimer</a>
                                    <Link :href="route('portfolios.show', [portfolio.slug])" class="font-medium p-2 rounded bg-gray-900 text-white dark:text-white">Visualiser</Link>
                                </td>
                            </tr>
                        </tbody>                        
                    </table>
                    <p v-if="portfolios.data.length == 0" class="text-center mt-5 text-black dark:text-white">Oups ! Aucun portfolio n'a été trouvé.</p>
                    <nav class="flex items-center justify-between pt-4" aria-label="Table navigation">
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Affichage de <span class="font-semibold text-gray-900 dark:text-white">1 à {{ portfolios.per_page }}</span> sur <span class="font-semibold text-gray-900 dark:text-white">{{ portfolios.total }} portfolio(s)</span></span>
                        <ul class="inline-flex items-center -space-x-px py-2 rounded-full">
                            <Link v-for="(link, index) in portfolios.links" :key="index" :href="link.url ?? '#'" 
                                  class="px-3 py-2 leading-tight text-gray-500 border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" 
                                  :class="{'bg-white': !link.active}"
                                  >
                                {{ link.label }}
                            </Link>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref, watch } from 'vue';
import { Link, Head } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    portfolios: Object
});
const searchTerm = ref();
const toggleAllCheckboxes = (event) => {
    event.target.checked = !event.target.checked;
    
    if(event.target.checked == true) {
        document.querySelectorAll('table input[type="checkbox"]').forEach(function(checkbox) {
            checkbox.checked = true;
        });
    }
};
watch(searchTerm, (term) => {
    router.get(route('dashboard.portfolios'), {'search': term}, {
        only: ['portfolios'],
        preserveScroll: true,
        preserveState: true,
    });
});
const deletePortfolio = (portfolio) => {
    if(confirm('Êtes-vous sûr de vouloir supprimer cet article ?')) {
        router.delete(route('dashboard.portfolios.delete', [portfolio.id]), {'portfolio_id': portfolio.id}, {
            preserveScroll: true,
            preserveState: true,
        });
    }
};
</script>