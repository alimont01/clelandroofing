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

	<?php if ( '' !== get_post()->post_content ) : ?>
		<div class="ps-0 ps-lg-3 ps-xl-5 pe-0 pe-lg-3 pe-xl-5">
			<div class="container mb-lg-3 mb-xl-5 content">
				<div class="row">
					<div class="col-12">
						<?php the_content();?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	</article><!-- #post-<?php the_ID(); ?> -->
</main>