<template>
    <section class="text-gray-600 dark:text-white body-font relative">
        <div class="container px-5 md:pt-24 pt-10 mx-auto">
            <form @submit.prevent="$emit('sendMessage', $event)" class="lg:w-1/2 md:w-2/3 mx-auto">
                <div class="flex flex-wrap -m-2">
                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600 dark:text-white">Nom</label>
                            <input v-model="reactiveForm.name" type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <InputError class="mt-2" :message="errors?.name" />
                        </div>
                    </div>
                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="email" class="leading-7 text-sm text-gray-600 dark:text-white">Email</label>
                            <input v-model="reactiveForm.email" type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <InputError class="mt-2" :message="errors?.email" />
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="message" class="leading-7 text-sm text-gray-600 dark:text-white">Message</label>
                            <textarea v-model="reactiveForm.message" id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                            <InputError class="mt-2" :message="errors?.message" />
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <button id="contactFromMobile" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">Envoyer</button>
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
    </section>
</template>

<script setup>
import InputError from './InputError.vue';
import { ref, onUpdated } from 'vue';
const props = defineProps({
    errors: Object,
    success: String,
    reactiveForm: {
        type: Object,
        required: true
    }
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