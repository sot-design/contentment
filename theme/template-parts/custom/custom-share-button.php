<?php

/**
 * Code for the share modal popup
 *
 * @package Contentment
 */
$post_thumbnail_id = get_post_thumbnail_id(get_the_ID()); // Get the post thumbnail ID for the current post

if ($post_thumbnail_id) {
    $thumbnail = wp_get_attachment_image_src($post_thumbnail_id, 'medium');
    $thumbnail_full = wp_get_attachment_image_src($post_thumbnail_id, 'full');
    $thumbnail_url = $thumbnail[0];
    $thumbnail_url_full = $thumbnail_full[0];
}
?>

<div x-data @click="$dispatch('openmodal', { title: '<?php echo esc_html(get_the_title()) ?>', url: '<?php echo esc_url(get_permalink()) ?>', img: '<?php echo esc_url($thumbnail_url) ?>', imgfull: '<?php echo esc_url($thumbnail_url_full) ?>'})" class="border p-2 cursor-pointer">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="size-4 md:size-5">
        <path d="m22 2-7 20-4-9-9-4Z" />
        <path d="M22 2 11 13" />
    </svg>
</div>