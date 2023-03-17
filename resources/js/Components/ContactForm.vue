<template>
    <section class="text-gray-600 dark:text-white body-font relative">
        <div class="container px-5 md:pt-24 pt-10 mx-auto">
            <form class="lg:w-1/2 md:w-2/3 mx-auto">
                <div class="flex flex-wrap -m-2">
                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600 dark:text-white">Nom</label>
                            <input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="email" class="leading-7 text-sm text-gray-600 dark:text-white">Email</label>
                            <input type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="message" class="leading-7 text-sm text-gray-600 dark:text-white">Message</label>
                            <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <button id="contactFromMobile" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Envoyer</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</template>