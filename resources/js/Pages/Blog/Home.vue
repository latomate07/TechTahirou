<template>
    <MainLayout>
        <section class="bg-white dark:bg-darkmode">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                    <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Blog</h2>
                    <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">
                        Je partage tout ce que j'apprends dans mon blog ! Découvrez mes astuces, tutoriels et mes expériences en développement web, marketing digital et montage vidéo.
                    </p>
                </div> 
                <div class="grid gap-8 lg:grid-cols-2">
                    <article v-for="post in posts.data" :key="post.id" class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-between items-center mb-5 text-gray-500">
                            <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path><path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path></svg>
                                Article
                            </span>
                            <span class="text-sm first-letter:uppercase">{{ post.created_date }}</span>
                        </div>
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#">{{ post.title }}</a></h2>
                        <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ post.content }}</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-4">
                                <DefaultUserLogo />
                                <span class="font-medium dark:text-white">
                                    {{ post.user.name }}
                                </span>
                            </div>
                            <Link :href="route('blog.show', [post.slug])" class="inline-flex items-center font-medium text-primary-600 dark:text-white hover:underline">
                                Voir plus
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </Link>
                        </div>
                    </article>                       
                </div>  
                <p v-if="posts.data.length <= 0" class="text-center font-bold dark:text-white text-black">Aucun article n'a été publié pour le moment ;)</p>
                <nav class="flex items-center justify-between pt-4" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Affichage de <span class="font-semibold text-gray-900 dark:text-white">1 à {{ posts.per_page }}</span> sur <span class="font-semibold text-gray-900 dark:text-white">{{ posts.total }} article(s)</span></span>
                    <ul class="inline-flex items-center -space-x-px py-2">
                        <Link v-for="(link, index) in posts.links" :key="index" :href="link.url ?? '#'" 
                              class="px-3 py-2 leading-tight text-gray-500 dark:text-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" 
                              :class="{'bg-white': link.active}"
                              preserve-state
                        >
                            {{ link.label }}
                        </Link>
                    </ul>
                </nav>
            </div>
        </section>
    </MainLayout>
</template>
<script setup>
import MainLayout from './Layout/Main.vue';
import DefaultUserLogo from '@/Components/DefaultUserLogo.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    posts: {
        type: Object
    }
});
</script>