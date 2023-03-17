<template>
    <AuthenticatedLayout>
        <div class="pt-5 pb-12">
            <div class="max-w-[85vw] md:max-w-7xl mx-auto sm:px-6 lg:px-8">
                <section class="bg-white dark:bg-gray-900">
                    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                        <div class="inline-flex mt-2 xs:mt-0 mb-10">
                            <button @click="previousPage"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-400 dark:bg-gray-800 rounded hover:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Articles
                            </button>
                        </div>
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Ajouter un nouveau article
                        </h2>
                        <form @submit.prevent="createNewPost" enctype="multipart/form-data">
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre</label>
                                    <input type="text" name="title" v-model="form.title"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required="">
                                </div>
                                <div class="sm:col-span-2">
                                    <WYSIWYGEditor />
                                </div>
                                <div>
                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catégorie</label>
                                    <select v-model="form.categories" id="category" class="cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select category</option>
                                        <option value="TV">TV/Monitors</option>
                                        <option value="PC">PC</option>
                                        <option value="GA">Gaming/Console</option>
                                        <option value="PH">Phones</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="sub-category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sous-catégorie</label>
                                    <select v-model="form.categories" id="sub-category" class="cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select category</option>
                                        <option value="TV">TV/Monitors</option>
                                        <option value="PC">PC</option>
                                        <option value="GA">Gaming/Console</option>
                                        <option value="PH">Phones</option>
                                    </select>
                                </div>
                                <div class="w-full col-span-full">
                                    <label for="brand"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                                    <input type="text" name="tags" v-model="form.tags"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required="">
                                </div>
                                <div class="sm:col-span-2 flex items-center justify-center w-full">
                                    <label for="dropzone-file"
                                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                </path>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                    class="font-semibold">Cliquer pour téléverser</span> ou drag and drop
                                            </p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG ou WEBP (MAX.
                                                800x400px)</p>
                                        </div>
                                        <input type="file" id="dropzone-file" multiple name="images" class="hidden"
                                            @change="addMedias" />
                                    </label>
                                </div>
                            </div>
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                Enregistrer
                            </button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { router, useForm } from '@inertiajs/vue3';
import WYSIWYGEditor from '@/Components/WYSIWYG-Editor.vue';

const form = useForm({
    title: null,
    content: null,
    tags: null,
    categories: [],
    images: []
});

const previousPage = () => window.history.back();
const createNewPost = (event) => {
    router.post(route('dashboard.portfolios.store'), form, {
        preserveState: true,
        preservceScroll: true,
        onError: errors => {
            console.log(errors);
        },
        onFinish: () => form.reset(),
    })
};
const addMedias = (event) => {
    const files = event.target.files;
    form.images.push(...files);
}
</script>