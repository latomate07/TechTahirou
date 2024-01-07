<template>
  <Head title="Accueil" />
  <MainLayout>
    <Hero />
    <div class="mb-12">
       <StackCarrousel />
    </div>
    <div id="parcours">
       <h2 class="text-gray-800 font-extrabold uppercase dark:text-white text-3xl text-center">Mon parcours</h2>
       <Step />
    </div>
    <div id="portfolio">
       <h2 class="text-gray-800 font-extrabold uppercase dark:text-white text-3xl text-center">Portfolio</h2>
       <Gallery :portfolios="portfolios" />
    </div>
    <div id="blog">
       <h2 class="text-gray-800 font-extrabold uppercase dark:text-white text-3xl text-center">Blog</h2>
       <BlogList :articles="posts" />
    </div>
    <div id="contact" class="md:mt-0 mt-20">
       <h2 class="text-gray-800 font-extrabold uppercase dark:text-white text-3xl text-center">Me contacter</h2>
       <ContactForm @send-message="sendMessageForm" :errors="errors" :success="flash.success" :reactive-form="contactForm" />
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
import StackCarrousel from '@/Components/StackCarrousel.vue';
import { Head, router, useForm } from '@inertiajs/vue3';

const props = defineProps({
   portfolios: Object,
   posts: Object,
   errors: Object,
   flash: Object
});
const contactForm = useForm({
    name: "",
    email: "",
    message: "",
});

const sendMessageForm = (event) => {
   router.post(route('contact'), contactForm, {
      preserveScroll: true,
      preserveState: true,
      onFinish: () => contactForm.reset()
   });
};

</script>