<template>
    <aside aria-label="Related articles" class="py-8 lg:py-24 bg-gray-50 dark:bg-gray-800">
        <div class="px-4 mx-auto max-w-screen-xl">
            <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">Articles similaires</h2>
            <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
                <article v-for="post in posts" :key="post.id" class="max-w-xs">
                    <Link :href="route('blog.show', [post.slug])">
                        <img :src="'/storage/uploads/' + post.thumbnails[0]?.url" class="mb-5 rounded-lg" alt="Image article">
                    </Link>
                    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                        <Link href="#">{{ post.title }}</Link>
                    </h2>
                    <p class="mb-4 font-light text-gray-500 dark:text-gray-400 truncate">{{ post.content }}</p>
                </article>
                <p v-if="posts == null" class="dark:text-white">Aucun article trouvé.</p>
            </div>
        </div>
    </aside>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    posts: {
        type: Object,
        default: null
    }
});
</script>