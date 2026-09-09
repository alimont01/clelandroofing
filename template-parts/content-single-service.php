<?php
/**
 * Template part for displaying posts
 *
 * @package Cleland_Theme
 */

/** Banner area on on pages */
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
?>

<main class="site-main">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'template-parts/banner' ); ?>
	<?php get_template_part( 'template-parts/flexible-page-content' ); ?>

	</article><!-- #post-<?php the_ID(); ?> -->
</main>