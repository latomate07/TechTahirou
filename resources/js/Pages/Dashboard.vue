<template>
    <Head title="Tableau de bord" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="md:max-w-7xl max-w-[90vw] mx-auto sm:px-6 lg:px-8">
                <h1 class="text-gray-900 dark:text-white font-black text-2xl mb-2">Statistiques</h1>
                <div class="grid md:grid-cols-3 grid-cols-2 gap-2">
                    <div class="bg-white dark:bg-gray-600 dark:text-white rounded p-4">
                        <h1 class="text-md font-black">Portfolio</h1>
                        <div class="flex items-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="ml-2">{{ portfolioStatistic.max_views }} vues</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
                            </svg>
                            <span class="ml-2">{{ portfolioStatistic.max_liked }} likes</span>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-600 dark:text-white rounded p-4">
                        <h1 class="text-md font-black">Articles</h1>
                        <div class="flex items-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="ml-2">{{ postStatistic?.max_views ?? 0 }} vues</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
                            </svg>
                            <span class="ml-2">{{ postStatistic?.max_liked ?? 0 }} likes</span>
                        </div>
                    </div>
                </div>
                <h1 class="text-gray-900 dark:text-white font-black text-2xl mb-2 mt-10">Paramètre Général</h1>
                <h4 class="text-gray-900 dark:text-white text-sm font-black mb-2">Blog</h4>
                <form @submit.prevent="saveCategories">
                    <div class="grid md:grid-cols-2 grid-flow-row gap-5">
                        <div>
                            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Ajout Catégories (séparé par des virgules)
                            </label>
                            <input v-model="categoryForm.category" type="text" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <InputError :message="errors?.category" />
                        </div>
                        <div>
                            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Ajout Sous-catégories (séparé par des virgules)
                            </label>
                            <input v-model="categoryForm.sub_category" type="text" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <InputError :message="errors?.sub_category" />
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Assigner à un article</label>
                            <select v-model="categoryForm.post_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 cursor-pointer">
                                <option selected>Choisir un article</option>
                                <option v-for="post in posts" :key="post.id" :value="post.id">
                                    {{ post.id + ' - ' + post.title }}
                                </option>
                            </select>
                            <InputError :message="errors?.post_id" />
                        </div>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 mt-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Enregistrer</button>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import { computed } from 'vue';
const props = defineProps({
    errors: Object,
    posts: Array,
    statistics: Array
});
const categoryForm = useForm({
    category: "",
    sub_category: "",
    post_id: null
});
const saveCategories = () => {
    router.post(route('dashboard.store-category'), categoryForm, {
        preserveScroll: true,
        preserveState: true
    });
}
const portfolioStatistic = computed(() => props.statistics.Portfolio);
const postStatistic = computed(() => props.statistics.Post);
</script>
