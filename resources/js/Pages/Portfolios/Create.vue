<template>
    <AuthenticatedLayout>
        <div class="pt-5 pb-12">
            <div class="max-w-[85vw] md:max-w-7xl mx-auto sm:px-6 lg:px-8">
                <section class="bg-white dark:bg-gray-900">
                        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                            <div class="inline-flex mt-2 xs:mt-0 mb-10">
                                <button @click="previousPage" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-400 dark:bg-gray-800 rounded hover:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                                    Portfolios
                                </button>
                            </div>
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Ajouter une nouvelle réalisation</h2>
                            <form @submit.prevent="createNewRealisation" enctype="multipart/form-data">
                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                    <div class="sm:col-span-2">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom du
                                            projet</label>
                                        <input type="text" name="title" v-model="form.title"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <InputError class="mt-2" :message="errors?.title" />       
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="description"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                        <textarea name="description" rows="8" v-model="form.description"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border-gray-300 rounded-lg border focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Décrire le projet">
                                        </textarea>
                                        <InputError class="mt-2" :message="errors?.description" />      
                                    </div>
                                    <div class="w-full col-span-full">
                                        <label for="brand"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                                        <input type="text" name="tags" v-model="form.tags"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <InputError class="mt-2" :message="errors?.tags" />      
                                    </div>
                                    <div class="w-full col-span-full">
                                        <label for="githublink"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lien GitHub</label>
                                        <input type="url" name="githublink" v-model="form.github_link"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <InputError class="mt-2" :message="errors?.github_link" />      
                                    </div>
                                    <div class="sm:col-span-2 flex items-center justify-center w-full">
                                        <label for="dropzone-file"
                                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                                            :class="{'border-gray-300': errors?.images?.length <= 0, 'border-red-500': errors?.images?.length >= 0}">
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
                                            <input type="file" id="dropzone-file" multiple name="images" class="hidden" @change="addMedias" />
                                        </label>
                                    </div>
                                    <InputError class="mt-2" :message="errors?.images" />      
                                    <div class="col-span-full flex w-full overflow-x-scroll whitespace-nowrap" v-if="uploadedImages.length > 0">
                                        <img id="img-preview" v-for="(previewImage, index) in uploadedImages" :key="index" :src="previewImage" alt="preview-image" class="h-40 w-auto mr-2 rounded">
                                    </div>
                            </div>
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
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
import { onMounted, ref, watchEffect } from 'vue';
import { router, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';

const props = defineProps({
    errors: Object,
    portfolio: Object,
});

const form = useForm({
    title: props.portfolio?.title ?? null,
    slug: props.portfolio?.slug ?? null,
    description: props.portfolio?.description ?? null,
    tags: props.portfolio?.tags?.map(tag => tag.name).join(', ') ?? null,
    github_link: props.portfolio?.github_link ?? null,
    images: props.portfolio?.images ?? [],
});

const uploadedImages = ref([]);
const previousPage = () => window.history.back();
const createNewRealisation = (event) => {
    router.post(route('dashboard.portfolios.store'), form, {
        preserveState: true,
        onError: (error) => {
            console.log(error);
        }
    })
};
const addMedias = (event) => {
    const files = event.target.files;
    form.images.push(...files);

    for(let i = 0; i < files.length; i++) {
        if (FileReader && files && files.length) {
            const reader = new FileReader();
            reader.onload = function () {
                uploadedImages.value.push(reader.result);
            };

            reader.readAsDataURL(files[i]);
        }
    }
}

// Auto add image from current portfolo if exists into uploadImages array
onMounted(() => {
    if(form.images) {
        form.images.forEach((image) => {
            uploadedImages.value = [...uploadedImages.value].concat(`/storage/uploads/${image.url}`);
        });
    }
});
</script>