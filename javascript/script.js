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
import Alpine from 'alpinejs';

Swiper.use(Controller);
Swiper.use(Navigation);
Swiper.use(Autoplay);

window.Swiper = Swiper;
window.Alpine = Alpine;

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

window.loadMorePosts = function () {
	const app = this;
	app.loading = true;
	fetch('/wp-admin/admin-ajax.php', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded',
		},
		body: new URLSearchParams({
			action: 'load_more_posts',
			page: app.page + 1,
		}),
	})
		.then((response) => response.json())
		.then((data) => {
			const container = document.getElementById('post-container');
			container.insertAdjacentHTML('beforeend', data.data);
			app.page++;
			app.loading = false;
		})
		.catch((error) => {
			console.error('Error fetching posts:', error);
			app.loading = false;
		});
};

Alpine.data('loadMorePosts', window.loadMorePosts);

Alpine.start();
