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
<div x-data="{ isOpen: false, title: '', url: '', img: '', imgfull: ''}" x-on:openmodal.window="isOpen = true, title = $event.detail['title'], url = $event.detail['url'], img = $event.detail['img'], imgfull = $event.detail['imgfull']">
    <!-- Modal -->
    <div x-cloak x-transition x-show="isOpen" transition class="fixed inset-0 overflow-y-auto z-50 ">
        <div class="flex items-center justify-center min-h-dvh p-6">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-white opacity-60"></div>
            </div>
            <div @click.outside="isOpen = false" class="bg-white border shadow-xl p-8 mx-auto z-50 flex flex-col gap-3">
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
                <h2 class="uppercase text-2xl max-w-xs text-center font-semibold" x-text="title"></h2>
                <ul class="text-sm">
                    <li class="mb-2">
                        <button @click="shareTo('facebook', url, title, img, imgfull)" class="button-outline w-full flex gap-2 items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                            </svg>
                            Facebook</button>
                    </li>
                    <li class="mb-2">
                        <button @click="shareTo('whatsapp', url, title, img, imgfull)" class="button-outline w-full flex gap-2 items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z" />
                            </svg>
                            whatsapp
                        </button>
                    </li>
                    <li class="mb-2">
                        <button @click="shareTo('pinterest', url, title, img, imgfull)" class="button-outline w-full flex gap-2 items-center justify-center">
                            <svg xmlns=" http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" x2="12" y1="17" y2="22" />
                                <path d="M5 17h14v-1.76a2 2 0 0 0-1.11-1.79l-1.78-.9A2 2 0 0 1 15 10.76V6h1a2 2 0 0 0 0-4H8a2 2 0 0 0 0 4h1v4.76a2 2 0 0 1-1.11 1.79l-1.78.9A2 2 0 0 0 5 15.24Z" />
                            </svg>
                            pinterest
                        </button>
                    </li>
                    <li class="mb-2">
                        <button @click="shareTo('twitter', url, title, img, imgfull)" class="button-outline w-full flex gap-2 items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z" />
                            </svg>
                            x/twitter
                        </button>
                    </li>
                    <p class="font-montserrat uppercase text-sm text-center mb-2">or</p>
                    <button @click="copyLink(url), isOpen = false" class="button-outline w-full flex gap-2 items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-copy">
                            <rect width="14" height="14" x="8" y="8" rx="2" ry="2" />
                            <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2" />
                        </svg>
                        Copy
                    </button>
                </ul>
            </div>
        </div>
    </div>
</div>