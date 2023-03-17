<template>
    <div class="container mx-auto">
        <Header :is-admin="isAdmin"/>
        <slot />
        <Footer />
    </div>
    <BottomNavigation />
</template>
<script setup>
import Header from './Partials/Header.vue';
import BottomNavigation from '@/Components/BottomNavigation.vue';
import Footer from './Partials/Footer.vue';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

const props = defineProps({
    auth: Object
});

const isAdmin = computed(() => usePage().props.auth?.user?.roles !== undefined || usePage().props.auth?.user?.roles[0].name === 'administrator');
</script>