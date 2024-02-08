/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

import Swiper from 'swiper';
import { Controller, Navigation, Autoplay } from 'swiper/modules';

Swiper.use(Controller);
Swiper.use(Navigation);
Swiper.use(Autoplay);

window.Swiper = Swiper;

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
