<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Contentment
 */

?>

<footer id="colophon" class="max-w-wide">
	<div class="flex justify-between border-t">
		<div class="flex flex-grow justify-around border-r p-6 md:justify-start md:gap-6">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook">
				<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
			</svg>
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram">
				<rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
				<path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
				<line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
			</svg>
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter">
				<path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z" />
			</svg>
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail">
				<rect width="20" height="16" x="2" y="4" rx="2" />
				<path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
			</svg>
		</div>
		<div class="p-6">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search">
				<circle cx="11" cy="11" r="8" />
				<path d="m21 21-4.3-4.3" />
			</svg>
		</div>

	</div>
	<div class="flex justify-between border-t">
		<div class="border-r p-6">
			<nav class="block" id="site-navigation" aria-label="<?php esc_attr_e('Main Navigation', 'contentment'); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-footer',
						'menu_id'        => 'menu-footer',
						'container'      => false,
						'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
						'menu_class'     => '',
						'link_before'    => '<span class="uppercase font-montserrat text-xs">', // Add opening <span> tag with Tailwind CSS classes
						'link_after'     => '</span>', // Add closing </span> tag
						'depth'          => 1,
					)
				);
				?>
			</nav><!-- #site-navigation -->
		</div>
		<div class="flex flex-grow items-center justify-center">
			<a href="<?php echo esc_url(home_url()); ?>" role="link" alt="Homepage Link" aria-label="Go to the homepage">
				<svg width="72" height="40.8" viewBox="0 0 90 51" fill="none" xmlns="http://www.w3.org/2000/svg" alt="Contentment Magazine Logo">
					<path d="M22.5497 51C18.0619 51 14.1267 49.9071 10.7443 47.7214C7.36183 45.5136 4.71997 42.489 2.81872 38.6474C0.939573 34.8058 0 30.4234 0 25.5C0 20.5766 0.939573 16.1942 2.81872 12.3526C4.71997 8.51104 7.36183 5.4974 10.7443 3.31169C14.1267 1.1039 18.0619 0 22.5497 0C24.7826 0 26.8828 0.397403 28.8504 1.19221C30.8401 1.98701 32.5534 3.09091 33.9904 4.5039L38.0029 0.662337H38.1356V14.2403H38.0029C38.0029 11.5468 37.2955 9.1513 35.8806 7.0539C34.4657 4.95649 32.6308 3.31169 30.3758 2.11948C28.1209 0.927273 25.7332 0.331168 23.213 0.331168C20.339 0.331168 17.8961 1.07078 15.8843 2.55C13.8946 4.00714 12.2918 5.96104 11.0759 8.41169C9.88209 10.8403 9.00884 13.5448 8.45615 16.5253C7.90346 19.4838 7.62712 22.4753 7.62712 25.5C7.62712 28.5026 7.90346 31.4942 8.45615 34.4747C9.00884 37.4552 9.88209 40.1708 11.0759 42.6214C12.2918 45.05 13.8946 47.0039 15.8843 48.4831C17.8961 49.9403 20.339 50.6688 23.213 50.6688C25.5122 50.6688 27.6013 50.3045 29.4805 49.576C31.3817 48.8253 33.0177 47.7987 34.3884 46.4961C35.759 45.1935 36.8091 43.7143 37.5387 42.0584C38.2903 40.3805 38.6662 38.6143 38.6662 36.7597H38.7988V50.3377H38.6662L34.9853 46.1981C33.5483 47.6773 31.7576 48.8474 29.6131 49.7084C27.4908 50.5695 25.1363 51 22.5497 51Z" fill="black" />
					<path d="M61.2159 51L42.7782 0.662337H49.112L64.3662 41.7935L78.9904 0.662337H79.1231L61.3154 51H61.2159ZM42.8445 0.662337V50.2052H47.9845V50.3377H37.9035V50.2052H42.7119V0.794807H37.605V0.662337H42.8445ZM90 0.662337V0.794807H85.3574V50.2052H90V50.3377H73.7178V50.2052H79.0567V0.662337H90Z" fill="black" />
				</svg>
			</a>
		</div>
	</div>
	<div class="border-t py-6">
		<nav class="block" id="site-navigation" aria-label="<?php esc_attr_e('Main Navigation', 'contentment'); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-footer-privacy',
					'menu_id'        => 'menu-footer-privacy',
					'container'      => false,
					'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
					'menu_class'     => 'flex justify-center gap-3',
					'link_before'    => '<span class="uppercase font-montserrat text-xs">', // Add opening <span> tag with Tailwind CSS classes
					'link_after'     => '</span>', // Add closing </span> tag
					'depth'          => 1,
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</div>



</footer><!-- #colophon -->