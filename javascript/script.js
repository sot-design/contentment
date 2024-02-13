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

window.shareTo = function shareTo(platform, url, title, imageUrl) {
	// Voeg aangepaste tekst toe aan de titel
	var customText = title + '\n\nLees het hier:\n' + url;

	// Log alle parameters
	console.log('Platform:', platform);
	console.log('URL:', url);
	console.log('Title:', title);
	console.log('Image URL:', imageUrl);

	switch (platform.toLowerCase()) {
		case 'facebook':
			var facebookShareUrl =
				'https://www.facebook.com/sharer/sharer.php?u=' +
				encodeURIComponent(url);
			if (imageUrl) {
				facebookShareUrl +=
					'&quote=' +
					encodeURIComponent(customText) +
					'&picture=' +
					encodeURIComponent(imageUrl);
			} else {
				facebookShareUrl += '&quote=' + encodeURIComponent(customText);
			}
			window.open(facebookShareUrl);
			break;
		case 'twitter':
			var twitterShareUrl =
				'https://twitter.com/intent/tweet?url=' +
				encodeURIComponent(url) +
				'&text=' +
				encodeURIComponent(customText);
			if (imageUrl) {
				twitterShareUrl += '&media=' + encodeURIComponent(imageUrl);
			}
			window.open(twitterShareUrl);
			break;
		case 'pinterest':
			var pinterestShareUrl =
				'https://pinterest.com/pin/create/button/?url=' +
				encodeURIComponent(url) +
				'&media=' +
				encodeURIComponent(imageUrl) +
				'&description=' +
				encodeURIComponent(customText);
			window.open(pinterestShareUrl);
			break;
		case 'whatsapp':
			var whatsappShareUrl =
				'https://api.whatsapp.com/send?text=' +
				encodeURIComponent(customText);
			window.open(whatsappShareUrl);
			break;
		default:
			console.error('Platform ' + platform + ' not supported.');
	}
};

window.copyLink = function copyLink(url) {
	// Logic to copy the link to the clipboard
	console.log('Link copied to clipboard: ' + url);
};

window.Alpine = Alpine;

Alpine.start();
