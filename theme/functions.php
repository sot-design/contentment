<?php

/**
 * Contentment functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Contentment
 */

if (!defined('CONTENTMENT_VERSION')) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define('CONTENTMENT_VERSION', '0.1.0');
}

if (!defined('CONTENTMENT_TYPOGRAPHY_CLASSES')) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `contentment_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'CONTENTMENT_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if (!function_exists('contentment_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function contentment_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Contentment, use a find and replace
		 * to change 'contentment' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('contentment', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-main-left' => __('Primary Left', 'contentment'),
				'menu-main-right' => __('Primary Right', 'contentment'),
				'menu-footer' => __('Footer Menu', 'contentment'),
				'menu-footer-privacy' => __('Footer Menu Privacy', 'contentment'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Enqueue editor styles.
		add_editor_style('style-editor.css');
		add_editor_style('style-editor-extra.css');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Remove support for block templates.
		remove_theme_support('block-templates');
	}
endif;
add_action('after_setup_theme', 'contentment_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function contentment_widgets_init()
{
	register_sidebar(
		array(
			'name'          => __('Footer', 'contentment'),
			'id'            => 'sidebar-1',
			'description'   => __('Add widgets here to appear in your footer.', 'contentment'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'contentment_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function contentment_scripts()
{
	wp_enqueue_style('contentment-style', get_stylesheet_uri(), array(), CONTENTMENT_VERSION);
	wp_enqueue_script('contentment-script', get_template_directory_uri() . '/js/script.min.js', array(), CONTENTMENT_VERSION, true);

	// Localize the script with new data
	$ajax_url = admin_url('admin-ajax.php');
	wp_localize_script('contentment-script', 'ajax_object', array('ajax_url' => $ajax_url));

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'contentment_scripts');

/**
 * Enqueue the block editor script.
 */
function contentment_enqueue_block_editor_script()
{
	wp_enqueue_script(
		'contentment-editor',
		get_template_directory_uri() . '/js/block-editor.min.js',
		array(
			'wp-blocks',
			'wp-edit-post',
		),
		CONTENTMENT_VERSION,
		true
	);
}
add_action('enqueue_block_editor_assets', 'contentment_enqueue_block_editor_script');

/**
 * Enqueue the script necessary to support Tailwind Typography in the block
 * editor, using an inline script to create a JavaScript array containing the
 * Tailwind Typography classes from CONTENTMENT_TYPOGRAPHY_CLASSES.
 */
function contentment_enqueue_typography_script()
{
	if (is_admin()) {
		wp_enqueue_script(
			'contentment-typography',
			get_template_directory_uri() . '/js/tailwind-typography-classes.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			CONTENTMENT_VERSION,
			true
		);
		wp_add_inline_script('contentment-typography', "tailwindTypographyClasses = '" . esc_attr(CONTENTMENT_TYPOGRAPHY_CLASSES) . "'.split(' ');", 'before');
	}
}
add_action('enqueue_block_assets', 'contentment_enqueue_typography_script');

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function contentment_tinymce_add_class($settings)
{
	$settings['body_class'] = CONTENTMENT_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter('tiny_mce_before_init', 'contentment_tinymce_add_class');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

// Disable support for comments
function disable_comments_post_types_support()
{
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if (post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'disable_comments_post_types_support');

// Remove jQuery from Wordpress
function remove_jquery_from_wordpress()
{
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', false);
	}
}
add_action('wp_enqueue_scripts', 'remove_jquery_from_wordpress');

// Add custom image size
if (function_exists('add_image_size')) {
	add_image_size('post_image', 450, 550);
}


// Close comments on the front-end
function disable_comments_status()
{
	return false;
}
add_filter('comments_open', 'disable_comments_status', 20, 2);
add_filter('pings_open', 'disable_comments_status', 20, 2);

// Hide existing comments
function disable_comments_hide_existing_comments($comments)
{
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in admin menu
function disable_comments_admin_menu()
{
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'disable_comments_admin_menu');

// Redirect any user trying to access comments page
function disable_comments_admin_menu_redirect()
{
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url());
		exit;
	}
}
add_action('admin_init', 'disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function disable_comments_dashboard()
{
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'disable_comments_dashboard');

// Remove comments links from admin bar
function disable_comments_admin_bar()
{
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'disable_comments_admin_bar');

function load_more_posts_callback()
{
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;

	// Query posts
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 5,
		'paged' => $page,
	);
	$query = new WP_Query($args);

	// Start output buffer
	ob_start();

	// Loop over posts
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			get_template_part('template-parts/content/content', 'excerpt');
		}
	}

	// Get HTML from buffer
	$html = ob_get_clean();

	// Return JSON response
	wp_send_json_success($html);
}
add_action('wp_ajax_load_more_posts', 'load_more_posts_callback');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts_callback');
