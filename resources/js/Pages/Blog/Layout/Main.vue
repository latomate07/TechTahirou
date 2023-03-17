<template>
    <div>
        <Header :is-admin="isAdmin"/>
            <slot />
        <Footer />
    </div>
    <BottomNavigation />
</template>

<script setup>
import Header from '@/Pages/Blog/Partials/Header.vue';
import Footer from '@/Pages/Blog/Partials/Footer.vue';
import BottomNavigation from '@/Components/BottomNavigation.vue';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

const isAdmin = computed(() => usePage().props.auth?.user?.roles !== undefined || usePage().props.auth?.user?.roles[0].name === 'administrator');
</script>