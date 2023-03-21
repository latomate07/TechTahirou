<template>
    <Head :title="post.title" />
    <MainLayout>
        <div class="flex justify-between px-4 md:mt-20 sm:mt-16 mt-10 mx-auto max-w-screen-xl">
            <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <DefaultUserLogo class="mr-4"/>
                            <div>
                                <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ post.user.name }}</a>
                                <p class="text-base font-light text-gray-500 dark:text-gray-400">Publié <time pubdate>{{ post.created_date }}</time></p>
                            </div>
                        </div>
                    </address>
                    <div id="controls-carousel" class="relative mb-10" data-carousel="slide">
                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                            <div v-for="image in post.thumbnails" class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img :src="'/storage/uploads/' + image.url" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                            </div>
                        </div>
                        <div v-if="post.thumbnails.length > 1">
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
                    </div>
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white uppercase">{{ post.title }}</h1>
                    <p class="text-gray-900 dark:text-slate-200" v-html="post.content.replace(/\n/g, '<br>')"></p>
                </header>
                <span class="flex items-center mt-5 dark:text-white">
                    <svg class="w-4 h-4 mr-1" data-darkreader-inline-stroke="" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    {{ post.statistic?.visits ?? 0 }}
                    vues
                </span>
            </article>
        </div>
        <article class="mt-20 mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <CommentForm />
        </article>
        <!-- <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <Comment />
        </article> -->
        <RelatedPosts :posts="relatedPosts" />
    </MainLayout>
</template>
<script setup>
import MainLayout from './Layout/Main.vue';
import CommentForm from '@/Components/Forms/CommentForm.vue';
import Comment from '@/Components/Comment.vue';
import RelatedPosts from '@/Components/RelatedPosts.vue';
import DefaultUserLogo from '@/Components/DefaultUserLogo.vue';
import { initFlowbite } from 'flowbite';
import { onMounted } from 'vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    post: Object,
    relatedPosts: Object
});
onMounted(() => {
    initFlowbite();
})
</script>