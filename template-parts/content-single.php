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

	<div class="container-fluid position-relative d-flex align-items-center bg-grad mb-4 mb-lg-5">
		<div class="container pt-lg-5 hero pb-5">
			<div class="row mt-5">
				<div class="col-lg-6 mt-5 text-white">
					<h1 class="my-4">
						<?php the_title(); ?>
					</h1>
				</div>
			</div>
		</div>

		<div class="position-absolute start-0 left-0 w-100 h-100 z-top bg-grad-hero"></div>
		<img class="cover-img position-absolute start-0 top-0 z-top" src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-bg.svg" alt="overlay graphic">

	</div>

	<?php if ( '' !== get_post()->post_content ) : ?>
		<div class="container-fluid mb-4 mb-lg-5">
			<div class="container content">
				<div class="row justify-content-center">
					<div class="col-8">
						<?php if ( has_post_thumbnail() ) : ?>
							<img class="fw-image mb-4" src="<?php echo $thumb['0'];?>" alt="<?php the_title(); ?> - cleland roofing solutions">
						<?php endif; ?> 
						<?php the_content();?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	</article><!-- #post-<?php the_ID(); ?> -->
</main>