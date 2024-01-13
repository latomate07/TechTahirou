<template>
    <aside aria-label="Portfolio similaires" class="py-8 lg:py-24 bg-gray-50 dark:bg-gray-800">
        <div class="px-4 mx-auto max-w-screen-xl">
            <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">Réalisations similaires</h2>
            <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
                <article v-for="portfolio in portfolios" :key="portfolio.id" class="max-w-xs">
                    <Link :href="route('portfolios.show', [portfolio.slug])">
                        <img :src="'/storage/uploads/' + portfolio.images[0].url" class="mb-5 rounded-lg" alt="Image 1">
                    </Link>
                    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                        <Link href="#">{{ portfolio.title }}</Link>
                    </h2>
                    <p class="mb-4 font-light text-gray-500 dark:text-gray-400 truncate">{{ portfolio.description }}</p>
                </article>
            </div>
        </div>
    </aside>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    portfolios: {
        type: Object,
    }
});
</script>