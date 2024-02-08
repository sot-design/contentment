<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some functionality here could be replaced by core features.
 *
 * @package Contentment
 */

if (!function_exists('contentment_posted_on')) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function contentment_posted_on()
	{
		$time_string = '<time datetime="%1$s">%2$s</time>';
		if (get_the_time('U') !== get_the_modified_time('U')) {
			$time_string = '<time datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr(get_the_date(DATE_W3C)),
			esc_html(get_the_date()),
			esc_attr(get_the_modified_date(DATE_W3C)),
			esc_html(get_the_modified_date())
		);

		printf(
			'<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url(get_permalink()),
			$time_string // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		);
	}
endif;

if (!function_exists('contentment_posted_by')) :
	/**
	 * Prints HTML with meta information about theme author.
	 */
	function contentment_posted_by()
	{
		printf(
			/* translators: 1: posted by label, only visible to screen readers. 2: author link. 3: post author. */
			'<span class="sr-only">%1$s</span><h3 class="author vcard text-2xl"><a class="uppercase url fn n" href="%2$s">Geschreven door %3$s</a></h3>',
			esc_html__('Posted by', 'contentment'),
			esc_url(get_author_posts_url(get_the_author_meta('ID'))),
			esc_html(get_the_author())
		);
	}
endif;

if (!function_exists('contentment_comment_count')) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function contentment_comment_count()
	{
		if (!post_password_required() && (comments_open() || get_comments_number())) {
			/* translators: %s: Name of current post. Only visible to screen readers. */
			comments_popup_link(sprintf(__('Leave a comment<span class="sr-only"> on %s</span>', 'contentment'), get_the_title()));
		}
	}
endif;

if (!function_exists('contentment_entry_meta')) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 * This template tag is used in the entry header.
	 */
	function contentment_entry_meta()
	{

		// Hide author, post date, category and tag text for pages.
		if ('post' === get_post_type()) {

			// Posted by.
			contentment_posted_by();

			// Posted on.
			contentment_posted_on();

			/* translators: used between list items, there is a space after the comma. */
			$categories_list = get_the_category_list(__(', ', 'contentment'));
			if ($categories_list) {
				printf(
					/* translators: 1: posted in label, only visible to screen readers. 2: list of categories. */
					'<span class="sr-only">%1$s</span>%2$s',
					esc_html__('Posted in', 'contentment'),
					$categories_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				);
			}

			/* translators: used between list items, there is a space after the comma. */
			$tags_list = get_the_tag_list('', __(', ', 'contentment'));
			if ($tags_list) {
				printf(
					/* translators: 1: tags label, only visible to screen readers. 2: list of tags. */
					'<span class="sr-only">%1$s</span>%2$s',
					esc_html__('Tags:', 'contentment'),
					$tags_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				);
			}
		}

		// Comment count.
		if (!is_singular()) {
			contentment_comment_count();
		}

		// Edit post link.
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__('Edit <span class="sr-only">%s</span>', 'contentment'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
	}
endif;

if (!function_exists('contentment_entry_footer')) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function contentment_entry_footer()
	{

		// Hide author, post date, category and tag text for pages.
		if ('post' === get_post_type()) {
			echo '<div class="flex justify-center flex-wrap gap-6 items-stretch">';
			$author_id = get_the_author_meta('ID');
			$author_name = get_the_author();
			$author_avatar = get_avatar_url($author_id);
			// Display the author's profile picture
			if ($author_avatar) {
				echo '<div>';
				echo '<img class="mx-auto rounded-full" src="' . esc_url($author_avatar) . '" alt="' . esc_attr($author_name) . '" />';
				echo '</div>';
			}
?>
			<div class="flex flex-col justify-evenly text-center sm:text-left gap-x-3">

				<!-- Posted by -->
				<?php contentment_posted_by(); ?>

				<div class="flex flex-wrap justify-center font-montserrat uppercase text-sm gap-3">
					<!-- Posted on. -->
					<?php
					contentment_posted_on();

					echo "<p>-</p>";

					/* translators: used between list items, there is a space after the comma. */
					$categories_list = get_the_category_list(__(', ', 'contentment'));
					if ($categories_list) {
						printf(
							/* translators: 1: posted in label, only visible to screen readers. 2: list of categories. */
							'<span class="sr-only">%1$s</span><span>%2$s</span>',
							esc_html__('Posted in', 'contentment'),
							$categories_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						);
					}
					?>
				</div>

			</div>
		<?php
		}

		// Edit post link.
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__('Edit <span class="sr-only">%s</span>', 'contentment'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
	}
endif;

if (!function_exists('contentment_post_thumbnail')) :
	/**
	 * Displays an optional post thumbnail, wrapping the post thumbnail in an
	 * anchor element except when viewing a single post.
	 */
	function contentment_post_thumbnail()
	{
		if (!contentment_can_show_post_thumbnail()) {
			return;
		}

		if (is_singular()) :
		?>

			<figure>
				<?php the_post_thumbnail(); ?>
			</figure><!-- .post-thumbnail -->

		<?php
		else :
		?>

			<figure>
				<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php the_post_thumbnail(); ?>
				</a>
			</figure>

<?php
		endif; // End is_singular().
	}
endif;

if (!function_exists('contentment_comment_avatar')) :
	/**
	 * Returns the HTML markup to generate a user avatar.
	 *
	 * @param mixed $id_or_email The Gravatar to retrieve. Accepts a user_id, gravatar md5 hash,
	 *                           user email, WP_User object, WP_Post object, or WP_Comment object.
	 */
	function contentment_get_user_avatar_markup($id_or_email = null)
	{

		if (!isset($id_or_email)) {
			$id_or_email = get_current_user_id();
		}

		return sprintf('<div class="vcard">%s</div>', get_avatar($id_or_email, contentment_get_avatar_size()));
	}
endif;

if (!function_exists('contentment_discussion_avatars_list')) :
	/**
	 * Displays a list of avatars involved in a discussion for a given post.
	 *
	 * @param array $comment_authors Comment authors to list as avatars.
	 */
	function contentment_discussion_avatars_list($comment_authors)
	{
		if (empty($comment_authors)) {
			return;
		}
		echo '<ol>', "\n";
		foreach ($comment_authors as $id_or_email) {
			printf(
				"<li>%s</li>\n",
				contentment_get_user_avatar_markup($id_or_email) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			);
		}
		echo '</ol>', "\n";
	}
endif;

if (!function_exists('contentment_the_posts_navigation')) :
	/**
	 * Wraps `the_posts_pagination` for use throughout the theme.
	 */
	function contentment_the_posts_navigation()
	{
		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => __('Newer posts', 'contentment'),
				'next_text' => __('Older posts', 'contentment'),
			)
		);
	}
endif;

if (!function_exists('contentment_content_class')) :
	/**
	 * Displays the class names for the post content wrapper.
	 *
	 * This allows us to add Tailwind Typography’s modifier classes throughout
	 * the theme without repeating them in multiple files. (They can be edited
	 * at the top of the `../functions.php` file via the
	 * CONTENTMENT_TYPOGRAPHY_CLASSES constant.)
	 *
	 * Based on WordPress core’s `body_class` and `get_body_class` functions.
	 *
	 * @param array $classes Space-separated string or array of class names to
	 *                     add to the class list.
	 */
	function contentment_content_class($classes = '')
	{
		$all_classes = array($classes, CONTENTMENT_TYPOGRAPHY_CLASSES);

		foreach ($all_classes as &$class_groups) {
			if (!empty($class_groups)) {
				if (!is_array($class_groups)) {
					$class_groups = preg_split('#\s+#', $class_groups);
				}
			} else {
				// Ensure that we always coerce class to being an array.
				$class_groups = array();
			}
		}

		$combined_classes = array_merge($all_classes[0], $all_classes[1]);
		$combined_classes = array_map('esc_attr', $combined_classes);

		// Separates class names with a single space, preparing them for the
		// post content wrapper.
		echo 'class="' . esc_attr(implode(' ', $combined_classes)) . '"';
	}
endif;
