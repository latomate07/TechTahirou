<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});

const user = usePage().props.auth.user;

console.log(user);

const form = useForm({
    name: user.name,
    email: user.email,
    logo: null
});

const userLogo = ref(user.logo.url)

const addMedia = (event) => {
    const file = event.target.files[0];
    form.logo = file;
    
    const formData = new FormData();
    if (FileReader && file) {
        const reader = new FileReader();
        reader.onload = function () {
            userLogo.value = reader.result;
        };
        reader.readAsDataURL(file);
    }
}

</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-white">Informations personnelles</h2>

            <p class="mt-1 text-sm text-gray-600">
                Mettez à jour les informations de profil et l'adresse électronique de votre compte.
            </p>
        </header>

        <form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6" enctype="multipart/form-data">
            <div>
                <InputLabel for="name" value="Nom" class="dark:text-white"/>
                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full dark:bg-slate-600 dark:text-gray-300 dark:border-none"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>
                <InputLabel for="email" value="Email" class="dark:text-white"/>
                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full dark:bg-slate-600 dark:text-gray-300 dark:border-none"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div v-if="props.mustVerifyEmail && user.email_verified_at === null">
                <p class="text-sm mt-2 text-gray-800">
                    Your email address is unverified.
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Click here to re-send the verification email.
                    </Link>
                </p>

                <div
                    v-show="props.status === 'verification-link-sent'"
                    class="mt-2 font-medium text-sm text-green-600"
                >
                    A new verification link has been sent to your email address.
                </div>
            </div>
            <div class="w-20 h-20">
                <img :src="userLogo" class="h-full w-full rounded-full" alt="user-logo">
            </div>
            <div>
                <InputLabel for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Téleverser une image</span> ou drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or WEBP (MAX. 800x400px)</p>
                    </div>
                    <input @change="addMedia" id="dropzone-file" type="file" class="hidden" />
                </InputLabel>

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing" class="dark:bg-gray-700">Enregistrer</PrimaryButton>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Enregistré.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
