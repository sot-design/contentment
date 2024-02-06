<?php

/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Contentment
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<div class="mb-5">
			<?php
			// Get the categories for the current post
			$categories = get_the_category();

			if (!empty($categories)) {
				$category_links = array();
				foreach ($categories as $category) {
					$category_links[] = '<a class="uppercase font-montserrat" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
				}

				echo implode(' / ', $category_links);
			}
			?>
		</div>

		<?php the_title('<h1 class="entry-title uppercase mb-8">', '</h1>'); ?>
	</header><!-- .entry-header -->

	<div class="mb-8 max-w-content">
		<?php
		$post_thumbnail_id = get_post_thumbnail_id(get_the_ID()); // Get the post thumbnail ID for the current post

		if ($post_thumbnail_id) {
			$thumbnail = wp_get_attachment_image_src($post_thumbnail_id, 'large');
			$thumbnail_url = $thumbnail[0];
		}
		?>
		<img class="mx-auto max-h-[40em] object-contain" src="<?php echo $thumbnail_url ?>" alt="Thumbnail">

	</div>

	<div <?php contentment_content_class('entry-content'); ?>>
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__('Continue reading<span class="sr-only"> "%s"</span>', 'contentment'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div>' . __('Pages:', 'contentment'),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php contentment_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-${ID} -->