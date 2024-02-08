<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Contentment
 */

get_header();
?>

<section id="primary">
	<main id="main">

		<?php
		/* Start the Loop */
		while (have_posts()) :
			the_post();
			get_template_part('template-parts/content/content', 'single');
		// End the loop.
		endwhile;
		?>

		<div class="max-w-content">
			<?php get_template_part('template-parts/custom/custom', 'recommended-posts'); ?>
		</div>

	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
