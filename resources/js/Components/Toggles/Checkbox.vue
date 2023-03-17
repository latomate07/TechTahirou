<template>
    <div class="bg-white">
        <div class="flex flex-row justify-between toggle">
            <label for="dark-toggle" class="flex items-center cursor-pointer">
                <div class="relative">
                    <input type="checkbox" name="dark-mode" id="dark-toggle" class="checkbox hidden">
                    <div class="block border-[1px] border-gray-900 w-14 h-8 rounded-full"></div>
                    <div class="dot absolute left-1 top-1 bg-gray-800 w-6 h-6 rounded-full transition"></div>
                </div>
            </label>
        </div>
    </div>
</template>