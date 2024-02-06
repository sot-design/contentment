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

<section id="primary">
    <main id="main">

        <?php if (have_posts()) : ?>

            <header class="page-header">
                <h1 class="entry-title">Contentment Magazine</h1>
            </header><!-- .page-header -->
            <div class="mb-10 flex h-[30em] max-w-wide items-center justify-center bg-slate-100 text-center">
                <p class="font-montserrat">/ SLIDER GOES HERE /</p>
            </div>
            <div class="mb-3 max-w-content">
                <h3 class="font-montserrat text-xl uppercase">Recents</h3>
            </div>

        <?php
            // Start the Loop.
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content/content', 'excerpt');

            // End the loop.
            endwhile;

            // Previous/next page navigation.
            contentment_the_posts_navigation();

        else :

            // If no content, include the "No posts found" template.
            get_template_part('template-parts/content/content', 'none');

        endif;
        ?>
    </main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
