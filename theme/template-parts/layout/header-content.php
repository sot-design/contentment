<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Contentment
 */

?>

<header x-data="{ mobileMenuOpen: false }" id="masthead" class="relative">
	<div class="flex max-w-wide justify-between border-b p-5 xl:px-0">
		<div class="flex w-2/5 items-center gap-3">
			<div @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden">
				<svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu stroke-foreground">
					<line x1="4" x2="20" y1="12" y2="12" />
					<line x1="4" x2="20" y1="6" y2="6" />
					<line x1="4" x2="20" y1="18" y2="18" />
				</svg>
				<svg x-show="mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
					<path d="M18 6 6 18" />
					<path d="m6 6 12 12" />
				</svg>
			</div>
			<nav class="hidden md:block" id="site-navigation" aria-label="<?php esc_attr_e('Main Navigation', 'contentment'); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-main-left',
						'menu_id'        => 'menu-main-left',
						'container'      => false,
						'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
						'menu_class'     => 'flex gap-5',
						'link_before'    => '<span class="uppercase font-montserrat text-xs">', // Add opening <span> tag with Tailwind CSS classes
						'link_after'     => '</span>', // Add closing </span> tag
						'depth'          => 1, // Display only top-level items
					)
				);
				?>

			</nav><!-- #site-navigation -->
		</div>
		<div class="flex w-1/5 justify-center">
			<a href="<?php echo esc_url(home_url()); ?>">
				<svg width="72" height="40.8" viewBox="0 0 90 51" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M22.5497 51C18.0619 51 14.1267 49.9071 10.7443 47.7214C7.36183 45.5136 4.71997 42.489 2.81872 38.6474C0.939573 34.8058 0 30.4234 0 25.5C0 20.5766 0.939573 16.1942 2.81872 12.3526C4.71997 8.51104 7.36183 5.4974 10.7443 3.31169C14.1267 1.1039 18.0619 0 22.5497 0C24.7826 0 26.8828 0.397403 28.8504 1.19221C30.8401 1.98701 32.5534 3.09091 33.9904 4.5039L38.0029 0.662337H38.1356V14.2403H38.0029C38.0029 11.5468 37.2955 9.1513 35.8806 7.0539C34.4657 4.95649 32.6308 3.31169 30.3758 2.11948C28.1209 0.927273 25.7332 0.331168 23.213 0.331168C20.339 0.331168 17.8961 1.07078 15.8843 2.55C13.8946 4.00714 12.2918 5.96104 11.0759 8.41169C9.88209 10.8403 9.00884 13.5448 8.45615 16.5253C7.90346 19.4838 7.62712 22.4753 7.62712 25.5C7.62712 28.5026 7.90346 31.4942 8.45615 34.4747C9.00884 37.4552 9.88209 40.1708 11.0759 42.6214C12.2918 45.05 13.8946 47.0039 15.8843 48.4831C17.8961 49.9403 20.339 50.6688 23.213 50.6688C25.5122 50.6688 27.6013 50.3045 29.4805 49.576C31.3817 48.8253 33.0177 47.7987 34.3884 46.4961C35.759 45.1935 36.8091 43.7143 37.5387 42.0584C38.2903 40.3805 38.6662 38.6143 38.6662 36.7597H38.7988V50.3377H38.6662L34.9853 46.1981C33.5483 47.6773 31.7576 48.8474 29.6131 49.7084C27.4908 50.5695 25.1363 51 22.5497 51Z" fill="black" />
					<path d="M61.2159 51L42.7782 0.662337H49.112L64.3662 41.7935L78.9904 0.662337H79.1231L61.3154 51H61.2159ZM42.8445 0.662337V50.2052H47.9845V50.3377H37.9035V50.2052H42.7119V0.794807H37.605V0.662337H42.8445ZM90 0.662337V0.794807H85.3574V50.2052H90V50.3377H73.7178V50.2052H79.0567V0.662337H90Z" fill="black" />
				</svg>
			</a>
		</div>
		<div class="flex w-2/5 items-center justify-end gap-5">
			<nav class="hidden md:block" id="site-navigation" aria-label="<?php esc_attr_e('Main Navigation', 'contentment'); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-main-right',
						'menu_id'        => 'menu-main-right',
						'container'      => false,
						'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
						'menu_class'     => 'flex gap-5',
						'link_before'    => '<span class="uppercase font-montserrat text-xs">', // Add opening <span> tag with Tailwind CSS classes
						'link_after'     => '</span>', // Add closing </span> tag
					)
				);
				?>
			</nav><!-- #site-navigation -->
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="square" stroke-linejoin="round" class="lucide lucide-search flex-none">
				<circle cx="11" cy="11" r="8" />
				<path d="m21 21-4.3-4.3" />
			</svg>
		</div>
	</div>
	<div x-transition x-cloak x-show="mobileMenuOpen" class="absolute top-full z-50 w-screen bg-white">
		<?php
		// Get all registered menu locations
		$locations = get_nav_menu_locations();

		// Check if the left menu location exists and retrieve its menu items
		if (isset($locations['menu-main-left'])) {
			$left_menu_items = wp_get_nav_menu_items($locations['menu-main-left']);
		} else {
			$left_menu_items = array();
		}

		// Check if the right menu location exists and retrieve its menu items
		if (isset($locations['menu-main-right'])) {
			$right_menu_items = wp_get_nav_menu_items($locations['menu-main-right']);
		} else {
			$right_menu_items = array();
		}

		// Merge menu items into a single array
		$menu_items = array_merge($left_menu_items, $right_menu_items);

		// Loop over the merged array to display menu items
		if (!empty($menu_items)) {
			foreach ($menu_items as $menu_item) {
				echo '<ul x-data="{ mobileSubMenuOpen: false }" class="parent-menu font-montserrat">';
				// Check if the menu item is a top-level item (no parent)
				if ($menu_item->menu_item_parent == 0) {
					// Check if the menu item has children
					$has_children = false;
					foreach ($menu_items as $child_menu_item) {
						if ($child_menu_item->menu_item_parent == $menu_item->ID) {
							$has_children = true;
							break;
						}
					}
		?>

					<li class="flex justify-between border-b px-6 py-5 font-montserrat text-sm uppercase">
						<a href="<?php echo esc_url($menu_item->url); ?>"><?php echo esc_html($menu_item->title) ?></a>
						<?php
						if ($has_children) { ?>
							<div @click="mobileSubMenuOpen = !mobileSubMenuOpen" class="h-full">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="square" stroke-linejoin="square" class="lucide lucide-chevron-down">
									<path d="m6 9 6 6 6-6" />
								</svg>
							</div>
						<?php
						}
						?>
					</li>
		<?php

					// If menu item has children, display them
					if ($has_children) {
						$firstitem = true;
						echo '<div x-cloak x-show="mobileSubMenuOpen" x-transition class="px-6 border-b child-menu child-menu-' . $menu_item->ID . '">';
						echo '<ul>';
						foreach ($menu_items as $child_menu_item) {
							if ($child_menu_item->menu_item_parent == $menu_item->ID) {
								echo '<li class="py-5 p-4 ' . ($firstitem ? '' : 'border-t ') . 'uppercase font-montserrat text-sm"><a href="' . $child_menu_item->url . '">' . $child_menu_item->title . '</a></li>';
								$firstitem = false;
							}
						}
						echo '</ul>';
						echo '</div>';
					}

					echo '</li>';
				}
				echo '</ul>';
			}
		} else {
			echo 'No menu items found.';
		}
		?>


	</div>

</header><!-- #masthead -->