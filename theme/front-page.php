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
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<style>
    .post-slide {
        transition: transform 0.3s;
    }

    @media screen and (min-width: 769px) {
        .post-slide.swiper-slide-active {
            transform: scale(1.25);
        }
    }
</style>

<section id="primary">
    <main id="main">

        <?php if (have_posts()) : ?>

            <header class="page-header">
                <h1 class="sr-only">Contentment Magazine</h1>
                <div class="relative">
                    <div class="swiper-container max-w-wide-p mx-auto select-none overflow-hidden border-b pb-40 md:pt-16">
                        <div class="swiper-wrapper">
                            <!-- Slide 1 -->
                            <div class="swiper-slide post-slide flex size-32 items-center justify-center bg-slate-100 md:size-48">
                                <img src="https://contentmentmag.nl/wp-content/uploads/2023/12/pexels-jud-6686579-1200x1600.webp" alt="Image 1" class="aspect-square object-cover">
                            </div>
                            <!-- Slide 2 -->
                            <div class="swiper-slide post-slide flex size-32 items-center justify-center bg-slate-100 md:size-48">
                                <img src="https://contentmentmag.nl/wp-content/uploads/2024/01/pexels-%D0%B0%D0%BB%D0%B5%D1%81%D1%8F-%D0%B3%D0%BE%D1%80%D0%B1%D1%83%D0%BD%D0%BE%D0%B2%D0%B0-8872312-1200x1600.webp" alt="Image 2" class="aspect-square object-cover">
                            </div>
                            <!-- Slide 3 -->
                            <div class="swiper-slide post-slide flex size-32 items-center justify-center bg-slate-100 md:size-48">
                                <img src="https://contentmentmag.nl/wp-content/uploads/2023/12/pexels-jud-6686579-1200x1600.webp" alt="Image 3" class="aspect-square object-cover">
                            </div>
                            <!-- Slide 4 -->
                            <div class="swiper-slide post-slide flex size-32 items-center justify-center bg-slate-100 md:size-48">
                                <img src="https://contentmentmag.nl/wp-content/uploads/2024/01/pexels-%D0%B0%D0%BB%D0%B5%D1%81%D1%8F-%D0%B3%D0%BE%D1%80%D0%B1%D1%83%D0%BD%D0%BE%D0%B2%D0%B0-8872312-1200x1600.webp" alt="Image 3" class="aspect-square object-cover">
                            </div>
                            <!-- Add more slides if needed -->
                        </div>
                    </div>
                    <div class="button-prev absolute bottom-0 left-1/3 z-50 flex max-w-md -translate-x-1/2 transform justify-center text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-left">
                            <path d="M6 8L2 12L6 16" />
                            <path d="M2 12H22" />
                        </svg>
                    </div>
                    <div class="button-next absolute bottom-0 left-2/3 z-50 flex max-w-md -translate-x-1/2 transform justify-center text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right">
                            <path d="M18 8L22 12L18 16" />
                            <path d="M2 12H22" />
                        </svg>
                    </div>
                    <div class="absolute bottom-0 left-1/2 z-40 max-w-sm -translate-x-1/2 transform overflow-hidden text-center">
                        <div class="title-slider m-6 mx-auto bg-white">
                            <div class="swiper-wrapper items-stretch">
                                <!-- Slide 1 -->
                                <div class="swiper-slide h-full p-6 ">
                                    <div class="text-center">
                                        <h1 class="mb-3 text-2xl font-semibold sm:text-3xl">DE VOORDELEN VAN VITAMINE D - ALLES WAT JE MOET WETEN</h1>
                                        <p class="font-montserrat uppercase">take your vitamins!</p>
                                    </div>
                                </div>
                                <!-- Slide 2 -->
                                <div class="swiper-slide h-full p-6">
                                    <div class="text-center">
                                        <h1 class="mb-3 text-2xl font-semibold sm:text-3xl">WAT IS SEA MOSS? DIT MOET JE WETEN OVER HET WONDERMIDDEL</h1>
                                        <p class="font-montserrat uppercase">Alle ins en outs over zeemos.</p>
                                    </div>
                                </div>
                                <!-- Slide 3 -->
                                <div class="swiper-slide h-full p-6">
                                    <div class="text-center">
                                        <h1 class="mb-3 text-2xl font-semibold sm:text-3xl">DE VOORDELEN VAN VITAMINE D - ALLES WAT JE MOET WETEN</h1>
                                        <p class="font-montserrat uppercase">take your vitamins!</p>
                                    </div>
                                </div>
                                <!-- Slide 4 -->
                                <div class="swiper-slide h-full  p-6">
                                    <div class="text-center">
                                        <h1 class="mb-3 text-2xl font-semibold sm:text-3xl">WAT IS SEA MOSS? DIT MOET JE WETEN OVER HET WONDERMIDDEL</h1>
                                        <p class="font-montserrat uppercase">Alle ins en outs over zeemos.</p>
                                    </div>
                                </div>
                                <!-- Add more slides if needed -->
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    var swiper = new Swiper('.swiper-container', {
                        slidesPerView: 1,
                        initialSlide: 1,
                        centeredSlides: true,
                        slideToClickedSlide: true,
                        resizeObserver: true,
                        allowTouchMove: true,
                        loop: false,
                        spaceBetween: 80,
                        navigation: {
                            nextEl: ".button-next",
                            prevEl: ".button-prev",
                        },
                        breakpoints: {
                            // when window width is >= 768px
                            768: {
                                slidesPerView: 3,
                            },
                        },
                    });

                    // Second Swiper
                    var titleSlider = new Swiper('.title-slider', {
                        slidesPerView: 1,
                        initialSlide: 1,
                        centeredSlides: true,
                        resizeObserver: true,
                        allowTouchMove: true,
                        loop: false,
                        effect: 'fade',
                        fadeEffect: {
                            crossFade: true
                        }
                    });

                    swiper.controller.control = titleSlider;
                    titleSlider.controller.control = swiper;
                    swiper.update();
                    titleSlider.update();
                </script>
            </header><!-- .page-header -->
            <section class="mt-8">
                <h2 class="mb-3 max-w-content font-montserrat text-xl uppercase">Recents</h2>
                <?php

                // Retrieve the latest 3 posts
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 2,
                    'orderby' => 'date',
                    'order' => 'DESC',
                );

                $query = new WP_Query($args);

                // Check if there are posts
                if ($query->have_posts()) {
                    // Start the loop
                    while ($query->have_posts()) {
                        $query->the_post();

                        // Display each post using the template part
                        get_template_part('template-parts/content/content', 'excerpt');
                    }

                    // Restore original post data
                    wp_reset_postdata();
                } else {
                    // If no posts found
                    echo 'No posts found';
                }
                ?>

                <div class="max-w-content">
                    <button class="button-outline w-full">
                        <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>">
                            <p class="font-montserrat uppercase md:text-xl">Alle recents</p>
                        </a>
                    </button>
                </div>
            </section>
            <div class="mb-3 mt-8 max-w-content">
                <h2 class="font-montserrat text-xl uppercase">Self care & Health</h2>
            </div>
            <div class="max-w-content-p">
                <?php
                // Retrieve the latest 3 posts from the category "self-care-health"
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 2,
                    'category_name' => 'self-care-health',
                    'orderby' => 'date',
                    'order' => 'DESC',
                );

                $query = new WP_Query($args);

                // Check if there are posts
                if ($query->have_posts()) {
                    // Start the loop
                    while ($query->have_posts()) {
                        $query->the_post();

                        // Display each post using the template part
                        get_template_part('template-parts/content/content', 'excerpt');
                    }

                    // Restore original post data
                    wp_reset_postdata();
                } else {
                    // If no posts found
                    echo 'No posts found';
                }
                ?>

                <div class="max-w-content">
                    <button class="button-outline w-full">
                        <a href="<?php echo esc_url(get_category_link(get_cat_ID('Self care & Health'))); ?>">
                            <p class="font-montserrat uppercase md:text-xl">Alle Self care & Health</p>
                        </a>
                    </button>
                </div>
            </div>
            <div class="max-w-content-p">
                <div class="mb-3 mt-8 max-w-content">
                    <h2 class="font-montserrat text-xl uppercase">Life & work</h2>
                </div>
                <?php
                // Retrieve the latest 3 posts from the category "self-care-health"
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 2,
                    'category_name' => 'life-work',
                    'orderby' => 'date',
                    'order' => 'DESC',
                );

                $query = new WP_Query($args);

                // Check if there are posts
                if ($query->have_posts()) {
                    // Start the loop
                    while ($query->have_posts()) {
                        $query->the_post();

                        // Display each post using the template part
                        get_template_part('template-parts/content/content', 'excerpt');
                    }

                    // Restore original post data
                    wp_reset_postdata();
                } else {
                    // If no posts found
                    echo 'No posts found';
                }
                ?>
                <div class="max-w-content">
                    <button class="button-outline w-full">
                        <a href="<?php echo esc_url(get_category_link(get_cat_ID('Life & work'))); ?>">
                            <p class="font-montserrat uppercase md:text-xl">Alle Life & work</p>
                        </a>
                    </button>
                </div>
            </div>
            <div class="mb-3 mt-6 max-w-content">
                <h3 class="font-montserrat text-xl uppercase">Beauty & style</h3>
            </div>
            <div class="max-w-content-p">
                <?php
                // Retrieve the latest 3 posts from the category "self-care-health"
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 2,
                    'category_name' => 'beauty-style',
                    'orderby' => 'date',
                    'order' => 'DESC',
                );

                $query = new WP_Query($args);

                // Check if there are posts
                if ($query->have_posts()) {
                    // Start the loop
                    while ($query->have_posts()) {
                        $query->the_post();

                        // Display each post using the template part
                        get_template_part('template-parts/content/content', 'excerpt');
                    }

                    // Restore original post data
                    wp_reset_postdata();
                } else {
                    // If no posts found
                    echo 'No posts found';
                }
                ?>
                <div class="max-w-content">
                    <button class="button-outline w-full">
                        <a href="<?php echo esc_url(get_category_link(get_cat_ID('Beauty & style'))); ?>">
                            <p class="font-montserrat uppercase md:text-xl">Alle Beauty & style</p>
                        </a>
                    </button>
                </div>

            </div>
            <div class="mb-3 mt-6 max-w-content">
                <h2 class="font-montserrat text-xl uppercase">Travel & fun</h2>
            </div>
            <div class="max-w-content-p">
                <?php
                // Retrieve the latest 3 posts from the category "self-care-health"
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 2,
                    'category_name' => 'travel-fun',
                    'orderby' => 'date',
                    'order' => 'DESC',
                );

                $query = new WP_Query($args);

                // Check if there are posts
                if ($query->have_posts()) {
                    // Start the loop
                    while ($query->have_posts()) {
                        $query->the_post();

                        // Display each post using the template part
                        get_template_part('template-parts/content/content', 'excerpt');
                    }

                    // Restore original post data
                    wp_reset_postdata();
                } else {
                    // If no posts found
                    echo 'No posts found';
                }
                ?>
                <div class="max-w-content">
                    <button class="button-outline w-full">
                        <a href="<?php echo esc_url(get_category_link(get_cat_ID('Travel & fun'))); ?>">
                            <p class="font-montserrat uppercase md:text-xl">Alle Travel & fun</p>
                        </a>
                    </button>
                </div>

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
