<template>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div v-if="isOnBlog" class="mx-auto max-w-screen-md sm:text-center">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl dark:text-white">S'inscrire à la newsletter</h2>
                <p class="mx-auto mb-8 max-w-2xl font-light text-gray-500 md:mb-12 sm:text-xl dark:text-gray-400">Restez au courant des nouveautés, n'hésitez pas à la newsletter.</p>
                <form action="#">
                    <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                        <div class="relative w-full">
                            <label for="email" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Adresse Mail</label>
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                            </div>
                            <input v-model="reactiveForm.email" class="block p-3 pl-10 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Entrer votre email" type="email" id="email" required="">
                        </div>
                        <div>
                            <button disabled type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-indigo-500 border-indigo-600 sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">S'abonner</button>
                        </div>
                    </div>
                    <div class="mx-auto max-w-screen-sm text-sm text-left text-gray-500 newsletter-form-footer dark:text-gray-300">Je me soucis de la protection de vos données. <a href="#" class="font-medium text-primary-600 dark:text-primary-500 underline decoration-sky-500">Lisez la politique de confidentialité</a>.</div>
                </form>
            </div>
            <div v-else class="mx-auto max-w-screen-md sm:text-center">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl dark:text-white">Recrutez-moi</h2>
                <p class="mx-auto mb-8 max-w-2xl font-light text-gray-500 md:mb-12 sm:text-xl dark:text-gray-400">Je suis prêt pour de nouveaux défis, êtes-vous prêts ?</p>
                <div id="recrutez-moi" class="container px-5 mx-auto">
                    <form @submit.prevent="$emit('sendMessage', $event)" class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="flex flex-wrap -m-2">
                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600 dark:text-white">Nom</label>
                                    <input v-model="reactiveForm.name" type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <InputError class="mt-2" :message="errors?.name" />
                                </div>
                            </div>
                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="email" class="leading-7 text-sm text-gray-600 dark:text-white">Email</label>
                                    <input v-model="reactiveForm.email" type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <InputError class="mt-2" :message="errors?.email" />
                                </div>
                            </div>
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="message" class="leading-7 text-sm text-gray-600 dark:text-white">Message</label>
                                    <textarea v-model="reactiveForm.message" id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                    <InputError class="mt-2" :message="errors?.message" />
                                </div>
                            </div>
                            <div class="p-2 w-full">
                                <button class="flex mx-auto text-white bg-indigo-500 border-indigo-600 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Soumettre</button>
                            </div>
                            <Transition>
                                <div ref="successBlock" v-if="success" class="mx-auto p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                    <span class="font-medium">
                                        {{ success }}
                                    </span>
                                </div>
                            </Transition>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>
<script setup>
import InputError from './InputError.vue';
import { ref, onUpdated } from 'vue';

const props = defineProps({
    isOnBlog: {
        type: Boolean,
        default: true
    },
    errors: Object,
    success: String,
    reactiveForm: Object
});
const emits = defineEmits([
    'sendMessage'
]);

const successBlock = ref();
onUpdated(() => {
    setTimeout(() => {
        if(successBlock.value !== undefined) {
            successBlock.value.style.display = "none";
        }
    }, 3000);
});
</script>