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

		<?php if (have_posts()) : ?>
			<?php
			if (is_category()) {
				// Get the category image array
				$category_image = get_field('category_image', 'category_' . get_queried_object_id());

				// Check if the category image exists
				if ($category_image) {
					// Get the image URL
					$image_url = $category_image['url'];

					// Get the medium size of the image
					$medium_image = wp_get_attachment_image_src($category_image['ID'], 'post_image');
				}


			?>
				<header class="mb-6 max-w-content">
					<div class="mb-6 flex min-h-40 items-stretch justify-center border">
						<div class="flex w-2/3 flex-col items-center justify-center p-4 md:p-8">
							<div>
								<h2 class="mb-1 font-montserrat text-xs uppercase md:text-sm">Categorie</h2>
								<?php the_archive_title('<h1 class="page-title m-0 p-0 text-start text-3xl md:text-4xl">', '</h1>'); ?>
							</div>
						</div>
						<?Php
						if ($category_image) { ?>

							<div class="aspect-h-3 aspect-w-7 w-1/3 flex-grow">
								<img class="size-full object-cover" src="<?php echo esc_url($medium_image[0]) ?>" alt="<?php echo esc_attr(get_the_title()) ?>">
							</div>
						<?php }
						?>
					</div>
				</header>
			<?php
			} else {
			?>
				<header class="page-header">
					<?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
				</header><!-- .page-header -->
			<?php
			}
			?>

			<?php
			// Start the Loop.
			while (have_posts()) :
				the_post();
				get_template_part('template-parts/content/content', 'excerpt');

			// End the loop.
			endwhile;
			?>
			<div id="post-container">
			</div>
			<div x-data='{ page: 1, loading: false, posts: [], query: <?php echo json_encode($wp_query->query_vars); ?>}' class="max-w-content">
				<button transition x-show="!loading && page <= <?php echo ($wp_query->max_num_pages) - 1; ?>" @click="loadMorePosts" class="button-outline w-full">Load More</button>
				<p x-cloak transition x-show="loading" class="button-outline w-full animate-pulse border p-2 text-center font-montserrat uppercase">Loading...</p>
			</div>

		<?php

		else :

			// If no content, include the "No posts found" template.
			get_template_part('template-parts/content/content', 'none');

		endif;
		?>
	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
