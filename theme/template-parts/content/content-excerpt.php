<?php

/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Contentment
 */

?>
<?php
$post_thumbnail_id = get_post_thumbnail_id(get_the_ID()); // Get the post thumbnail ID for the current post

if ($post_thumbnail_id) {
	$thumbnail = wp_get_attachment_image_src($post_thumbnail_id, 'medium');
	$thumbnail_url = $thumbnail[0];
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class("max-w-content mb-6"); ?>>

	<div class="flex border">
		<div class="aspect-h-3 aspect-w-7 w-1/3 z-0">
			<img class="size-full object-cover z-0" src="<?php echo $thumbnail_url ?>" alt="Thumbnail">
		</div>
		<div class="flex w-2/3 flex-col justify-between p-3 md:p-5">
			<div class="order-last flex items-end justify-between align-text-bottom md:order-none">
				<div>
					<?php
					// Get the categories for the current post
					$categories = get_the_category();

					if (!empty($categories)) {
						$category_links = array();
						foreach ($categories as $category) {
							// Check if the category has a parent
							if ($category->parent == 0) {
								$category_links[] = '<a class="uppercase font-montserrat text-xs md:text-sm" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
							}
						}

						echo implode(', ', $category_links);
					}
					?>

				</div>
				<div class="font-montserrat text-xs uppercase md:text-sm">
					<?php
					$date = get_the_date('d/m/y');
					echo $date;
					?>
				</div>
			</div>
			<header class="entry-header text-left">
				<?php
				the_title(sprintf('<h2 class="text-xl md:text-3xl font-bodonimoda font-semibold uppercase mb-0"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
				?>
			</header><!-- .entry-header -->
			<?php
			?>
			<div <?php contentment_content_class('entry-content block text-xl'); ?>>
				<?php
				$sub_header = get_field('sub_header');
				if ($sub_header) {
					echo $sub_header;
				}
				?>
			</div><!-- .entry-content -->
			<div x-data class="hidden justify-end gap-3 md:flex">
				<div @click="$dispatch('openmodal', { title: '<?php echo esc_html(get_the_title()) ?>', url: '<?php echo esc_url(get_permalink()) ?>', img: '<?php echo $thumbnail_url ?>' })" class="border p-2 cursor-pointer">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
						<path d="m22 2-7 20-4-9-9-4Z" />
						<path d="M22 2 11 13" />
					</svg>
				</div>
				<div class="border p-2 cursor-pointer">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
						<path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
					</svg>
				</div>
			</div>
		</div>
	</div>
</article><!-- #post-${ID} -->