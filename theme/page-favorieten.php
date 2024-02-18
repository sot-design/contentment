<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Contentment
 */

get_header();
?>
<?php
$current_category = get_queried_object();
$category_slug;

if (is_category() && $current_category) {
	$category_slug = $current_category->slug;
}
?>
<section id="primary">
	<main id="main">
		<header class="mb-6 max-w-content">
			<div class="mb-6 flex min-h-40 items-stretch justify-center border">
				<div class="flex w-2/3 flex-col items-center justify-center p-4 md:p-8">
					<?php the_title('<h1 class="page-title m-0 p-0 text-start text-3xl md:text-4xl">', '</h1>'); ?>
				</div>
			</div>
		</header>
		<?php
		$favorites = get_user_favorites();

		if (!empty($favorites)) {
			foreach ($favorites as $post_id) {
				$post = get_post($post_id);
				if ($post) {
					setup_postdata($post);
					get_template_part('template-parts/content/content', 'excerpt');
					wp_reset_postdata(); // Reset post data after using setup_postdata()
				}
			}
		} else {
			// Handle case where there are no favorites
			echo 'No favorites found.';
		}

		?>
	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
