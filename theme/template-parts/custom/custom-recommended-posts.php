<?php

/**
 * Template part for recommended posts block
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Contentment
 */

?>
<div class="mb-3">
	<h3 class="font-montserrat uppercase">Wat je misschien ook leuk vindt</h3>
</div>
<div class="grid grid-cols-1 place-content-stretch place-items-stretch gap-6 sm:grid-cols-2">
	<?php
	// Get the current post ID
	$current_post_id = get_the_ID();

	// Get the categories of the current post
	$categories = get_the_category($current_post_id);
	$category_ids = array(); // Array to store category IDs

	foreach ($categories as $category) {
		$category_ids[] = $category->term_id;
	}

	// Define arguments for the custom query to retrieve similar posts in the same category
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 4, // Get 2 similar posts
		'post__not_in' => array($current_post_id), // Exclude the current post
		'orderby' => 'rand', // Order by random to get a variety of similar posts
		'category__in' => $category_ids, // Retrieve posts in the same category
	);

	// Custom query to retrieve similar posts
	$similar_posts_query = new WP_Query($args);

	// Check if there are similar posts
	if ($similar_posts_query->have_posts()) :
		while ($similar_posts_query->have_posts()) : $similar_posts_query->the_post();
	?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(""); ?>>
				<div class="flex h-full border">
					<div class="aspect-h-3 aspect-w-6 w-1/3">
						<?php
						$post_thumbnail_id = get_post_thumbnail_id(get_the_ID()); // Get the post thumbnail ID for the current post

						if ($post_thumbnail_id) {
							$thumbnail = wp_get_attachment_image_src($post_thumbnail_id, 'medium');
							$thumbnail_url = $thumbnail[0];
						}
						?>
						<img class="size-full object-cover object-center" src="<?php echo $thumbnail_url ?>" alt="Thumbnail">
					</div>
					<div class="flex w-2/3 flex-col justify-between p-3">
						<header class="entry-header text-left">
							<?php
							the_title(sprintf('<h2 class="text-xl md:text-lg font-bodonimoda font-semibold uppercase mb-0"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
							?>
						</header><!-- .entry-header -->
						<?php
						$sub_header = get_field('sub_header');
						if ($sub_header) {
							echo '<h2 class="font-cormorantgaramond mb-6 text-lg">' . $sub_header . '</h2>';
						}
						?>
						<div class="flex justify-end gap-3">
							<?php get_template_part('template-parts/custom/custom', 'share-button'); ?>
							<div class="cursor-pointer border">
								<?php the_favorites_button(get_the_ID()); ?>
							</div>
						</div>
					</div>
				</div>
			</article><!-- #post-${ID} -->
	<?php
		endwhile;
		wp_reset_postdata(); // Reset post data
	endif;
	?>
</div>