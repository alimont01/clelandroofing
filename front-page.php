<?php
/**
 * @package Cleland_Theme
 */
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
get_header(); 
?>


    <?php get_template_part( 'template-parts/banner' ); ?>

    <?php get_template_part( 'template-parts/flexible-page-content' ); ?>

<?php get_footer(); ?>