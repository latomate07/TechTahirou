<template>
    <section class="text-gray-600 body-font md:mb-0 mb-16">
        <div class="container mx-auto flex px-5 md:py-24 py-0 pt-10  md:flex-row flex-col items-center">
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                <img class="object-cover object-center rounded" alt="hero" src="/storage/images/hero-image.jpg">
            </div>
            <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                <h1 class="font-raleway sm:text-4xl text-3xl mb-4 font-semibold text-gray-900 dark:text-white">Développeur Web & Mobile FullStack</h1>
                <p class="mb-8 font-raleway leading-relaxed dark:text-gray-200">
                    Développeur web & mobile passionné par la création de tout type d'applications. Du design au développement, je m'efforce d'apporter des solutions innovantes et efficaces à chaque projet.
                </p>
                <div class="flex justify-center">
                    <a href="/storage/system/cv_tahirou.pdf" class="inline-flex text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg max-[380px]:text-sm" download>Mon CV</a>
                    <Link href="#contact" as="button" class="ml-4 inline-flex text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-white dark:hover:bg-gray-800 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg max-[380px]:text-sm">Me contacter</Link>
                </div>
            </div>
        </div>
    </section>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
</script>