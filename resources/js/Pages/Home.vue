<template>
  <Head title="Accueil" />
  <MainLayout>
    <Hero />
    <div id="parcours">
       <h1 class="text-gray-500 dark:text-white text-3xl text-center">Mon parcours</h1>
       <Step />
    </div>
    <div id="portfolio">
       <h1 class="text-gray-500 dark:text-white text-3xl text-center">Portfolio</h1>
       <Gallery :portfolios="portfolios" />
    </div>
    <div id="blog">
       <h1 class="text-gray-500 dark:text-white text-3xl text-center">Blog</h1>
       <BlogList :articles="posts" />
    </div>
    <div id="contact" class="md:mt-0 mt-20">
       <h1 class="text-gray-500 dark:text-white text-3xl text-center">Me contacter</h1>
       <ContactForm />
    </div>
  </MainLayout>
</template>
<script setup>
import MainLayout from './Layouts/Main.vue';
import Hero from '@/Components/Hero.vue';
import Step from '@/Components/Step.vue';
import Gallery from '@/Components/Gallery.vue';
import BlogList from '@/Components/BlogList.vue';
import ContactForm from '@/Components/ContactForm.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
   portfolios: {
      type: Object
   },
    posts: {
      type: Object
    },
    errors: {
        type: Object
    }
});

</script>