<template>
    <section class="not-format">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Commentaires ({{ totalOfComments }})</h2>
        </div>
        <form class="mb-6">
            <div
                class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <label for="comment" class="sr-only">Votre commentaire</label>
                <textarea id="comment" rows="6" disabled
                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800 resize-none"
                    placeholder="La fonctionnalité arrive bientôt ;)" required></textarea>
            </div>
            <!-- <button type="submit"
                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 dark:bg-primary-800 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Publier
            </button> -->
        </form>      
    </section>
</template>

<script setup>
const props = defineProps({
    totalOfComments: {
        type: Number,
        default: 0
    }
});
</script>