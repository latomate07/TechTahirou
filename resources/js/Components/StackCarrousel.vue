<template>
    <section>
        <div :ref="(el) => { sliderContainer = el }" class="container mx-auto">
            <div class="flex overflow-x-scroll pb-10 hide-scroll-bar">
                <div class="flex gap-x-2 flex-nowrap mx-auto">
                    <div class="inline-block animate-pulse flex-nowrap w-20 dark:bg-gray-800 bg-gray-200 rounded-full p-2"
                        v-for="stack in stacks" :key="stack.id">
                        <img :src="stack.image" :alt="stack.title" class="object-contain w-full h-full rounded-full">
                    </div>
                </div>
            </div>
        </div>
        <div class="flex gap-x-2 -mt-4">
            <div v-for="(item, index) in 52" :key="index"
                class="hidden md:block w-40 h-40 bg-gradient-to-b dark:from-gray-900 from-gray-300 dark:via-gray-800 via-gray-200 to-transparent animate-pulse">
            </div>
            <div v-for="(item, index) in 30" :key="index"
                class="block md:hidden w-12 h-20 bg-gradient-to-b dark:from-gray-900 from-gray-300 dark:via-gray-800 via-gray-200 to-transparent animate-pulse">
            </div>
        </div>
    </section>
</template>
<script setup>
import { onMounted, ref } from 'vue';

const sliderContainer = ref(null);
onMounted(() => {
    // console.log(sliderContainer.value);
});

const stacks = [
    {
        id: 1,
        title: 'javascript',
        image: '/storage/images/stacks/javascript-logo.png',
    },
    {
        id: 2,
        title: 'laravel',
        image: '/storage/images/stacks/laravel-logo.png',
    },
    {
        id: 3,
        title: 'vuejs',
        image: '/storage/images/stacks/vuejs-logo.png',
    },
    {
        id: 4,
        title: 'react',
        image: '/storage/images/stacks/react-logo.png',
    },
    {
        id: 5,
        title: 'expo',
        image: '/storage/images/stacks/expo-logo.png',
    },
    {
        id: 6,
        title: 'inertiajs',
        image: '/storage/images/stacks/inertiajs-logo.png',
    },
    {
        id: 7,
        title: 'tailwindcss',
        image: '/storage/images/stacks/tailwindcss-logo.png',
    },
    {
        id: 8,
        title: 'stripe',
        image: '/storage/images/stacks/stripe-logo.png',
    },
    {
        id: 9,
        title: 'php',
        image: '/storage/images/stacks/php-logo.png',
    },
    {
        id: 11,
        title: 'html',
        image: '/storage/images/stacks/html-logo.png',
    },
    {
        id: 12,
        title: 'css',
        image: '/storage/images/stacks/css-logo.png',
    },
    {
        id: 13,
        title: 'wordpress',
        image: '/storage/images/stacks/wordpress-logo.png',
    },
    {
        id: 14,
        title: 'elementor',
        image: '/storage/images/stacks/elementor-logo.png',
    },
    {
        id: 15,
        title: 'git',
        image: '/storage/images/stacks/git-logo.png',
    },
]
</script>
<style scoped>
.hide-scroll-bar::-webkit-scrollbar {
  display: none;
}
.hide-scroll-bar {
  -ms-overflow-style: none;
  scrollbar-width: none;
}
</style>