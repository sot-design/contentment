<?php

/**
 * Code for the share modal popup
 *
 * @package Contentment
 */
?>
<style>
    [x-cloak] {
        display: none;
    }
</style>
<!-- Add this code in your WordPress theme template -->
<div x-data="{ isOpen: false, title: '', url: '', img: '' }" x-on:openmodal.window="isOpen = true, title = $event.detail['title'], url = $event.detail['url'], img = $event.detail['img']" cloak>
    <!-- Modal -->
    <div x-show="isOpen" transition class="fixed inset-0 overflow-y-auto z-50 ">
        <div class="flex items-center justify-center min-h-screen p-6">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 backdrop-blur-md bg-gray-100 opacity-75"></div>
            </div>
            <div @click.outside="isOpen = false" class="bg-white shadow-xl p-8 mx-auto border z-50 flex flex-col gap-3">
                <div class="flex items-center justify-between">
                    <p class="font-montserrat uppercase">Share This Post</p>
                    <div @click="isOpen = false" class="button-outline inline-flex items-center cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </div>
                </div>
                <div class="w-auto">
                    <div class="aspect-w-4 aspect-h-4">
                        <img class="w-full h-full object-center object-cover" x-bind:src="img" alt="">
                    </div>
                </div>
                <h2 class="uppercase text-sm max-w-xs" x-text="title"></h2>
                <ul>
                    <li class="mb-2">
                        <button @click="shareTo('facebook', url, title, img)" class="button-outline w-full">Facebook</button>
                    </li>
                    <li class="mb-2">
                        <button @click="shareTo('whatsapp', url, title, img)" class="button-outline w-full">whatsapp</button>
                    </li>
                    <li class="mb-2">
                        <button @click="shareTo('pinterest', url, title, img)" class="button-outline w-full">pinterest</button>
                    </li>
                    <li class="mb-2">
                        <button @click="copyLink(url)" class="button-outline w-full">Copy</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>