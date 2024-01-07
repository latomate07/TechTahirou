<template>
    <div ref="bottomNavigation" class="md:hidden fixed z-50 w-full max-[412px]:w-[90vw] h-16 max-w-sm -translate-x-1/2 bg-white border border-gray-200 rounded-full bottom-4 left-1/2 dark:bg-gray-700 dark:border-gray-600 transition ease-in-out delay-850">
        <div class="grid h-full max-w-lg grid-cols-4 mx-auto">
            <button @click="router.get(route('home'))" data-tooltip-target="tooltip-home" type="button" 
                    class="inline-flex flex-col items-center justify-center px-5 rounded-l-full hover:bg-gray-50 dark:hover:bg-gray-800 group"
                    :class="{'bg-gray-50': route().current('home') }">
                <svg class="w-6 h-6 mb-1 group-hover:text-yellow-600 dark:group-hover:text-yellow-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                    :class="{'text-yellow-500': route().current('home'), 'text-gray-500 dark:text-gray-400': !route().current('home') }">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                </svg>
                <span class="sr-only">Home</span>
            </button>
            <div id="tooltip-home" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Home
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <button @click="router.get(route('blog.home'))" data-tooltip-target="tooltip-wallet" type="button" 
                    class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group"
                    :class="{'bg-gray-50': route().current('blog.home') }">
                <svg class="w-6 h-6 mb-1 group-hover:text-yellow-600 dark:group-hover:text-yellow-500" 
                     fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                     :class="{'text-yellow-500': route().current('blog.*'), 'text-gray-500 dark:text-gray-400': !route().current('blog.*') }">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"></path>
                </svg>
                <span class="sr-only">Blog</span>
            </button>
            <div id="tooltip-wallet" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Blog
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <button @click="router.get(route('portfolios.home'))" data-tooltip-target="tooltip-settings" type="button" 
                    class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group"
                    :class="{'bg-gray-50': route().current('portfolios.*')}">
                <svg class="w-6 h-6 mb-1 group-hover:text-yellow-600 dark:group-hover:text-yellow-500" 
                     fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                     :class="{'text-yellow-500': route().current('portfolios.*'), 'text-gray-500 dark:text-gray-400': !route().current('portfolios.*') }">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"></path>
                </svg>
                <span class="sr-only">Portfolio</span>
            </button>
            <div id="tooltip-settings" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Porfolio
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <button @click="router.get('/#contactFromMobile')" data-tooltip-target="tooltip-profile" type="button" class="inline-flex flex-col items-center justify-center px-5 rounded-r-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <svg class="w-6 h-6 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-yellow-600 dark:group-hover:text-yellow-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"></path>
                </svg>
                <span class="sr-only">Me contacter</span>
            </button>
            <div id="tooltip-profile" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Me contacter
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
    </div>
</template>
<script setup>
  import { router } from '@inertiajs/core';
  import { ref, onMounted, onUnmounted } from 'vue';

  const bottomNavigation = ref();
  let lastScrollTop = 0;

  onMounted(() => {
    window.addEventListener('scroll', scrollAnimation);
  });
  onUnmounted(() => {
      window.removeEventListener('scroll', scrollAnimation);
  });
  
  const scrollAnimation = () => {
    if (window.pageYOffset > lastScrollTop) {
        setTimeout(function () {
          bottomNavigation.value.style.opacity = "0";
          bottomNavigation.value.style.bottom = "-10rem";
        }, 100);
    } else {
        bottomNavigation.value.style.opacity = "1";
        bottomNavigation.value.style.bottom = "1rem";
        bottomNavigation.value.classList.add('blur-in');
        bottomNavigation.value.classList.remove('blur-out');
    }
    lastScrollTop = window.pageYOffset;
  };
</script>
<style scoped>
.slide {
  transition: all .2s ease-in-out;
}

.blur-in {
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
}

.blur-out {
  backdrop-filter: blur(0);
  -webkit-backdrop-filter: blur(0);
}
</style>
