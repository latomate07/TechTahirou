<template>
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
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white uppercase">{{ post.title }}</h1>
                    <p class=" text-gray-900 dark:text-slate-400">
                        {{ post.content }}
                    </p>
                </header>
            </article>
        </div>
        <article class="mt-20 mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <CommentForm />
        </article>
        <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <Comment />
        </article>
        <RelatedPosts />
    </MainLayout>
</template>
<script setup>
import MainLayout from './Layout/Main.vue';
import CommentForm from '@/Components/Forms/CommentForm.vue';
import Comment from '@/Components/Comment.vue';
import RelatedPosts from '@/Components/RelatedPosts.vue';
import DefaultUserLogo from '@/Components/DefaultUserLogo.vue';

const props = defineProps({
    post: Object
});
</script>