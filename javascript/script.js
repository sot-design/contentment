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

window.shareTo = function shareTo(platform, url, title, img, imgfull) {
	// Voeg aangepaste tekst toe aan de titel
	var customText = title + '\n\nLees het hier:\n' + url;

	switch (platform.toLowerCase()) {
		case 'facebook':
			var facebookShareUrl =
				'https://www.facebook.com/sharer/sharer.php?u=' +
				encodeURIComponent(url);
			if (imgfull) {
				facebookShareUrl +=
					'&quote=' +
					encodeURIComponent(customText) +
					'&picture=' +
					encodeURIComponent(imgfull);
			} else {
				facebookShareUrl += '&quote=' + encodeURIComponent(customText);
			}
			window.open(facebookShareUrl);
			break;
		case 'twitter':
			var twitterShareUrl =
				'https://twitter.com/intent/tweet?' +
				'&text=' +
				encodeURIComponent(customText);
			if (imgfull) {
				twitterShareUrl += '&media=' + encodeURIComponent(imgfull);
			}
			window.open(twitterShareUrl);
			break;
		case 'pinterest':
			var pinterestShareUrl =
				'https://pinterest.com/pin/create/button/?url=' +
				encodeURIComponent(url) +
				'&media=' +
				encodeURIComponent(imgfull) +
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
	const input = document.createElement('textarea');
	input.value = url;
	document.body.appendChild(input);
	input.select();
	document.execCommand('copy');
	input.remove();
};
