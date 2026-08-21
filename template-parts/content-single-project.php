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

	<div class="container-fluid position-relative d-flex align-items-center bg-grad">
			<div class="container pt-lg-5 hero 
			<?php if ( has_post_thumbnail() ) : ?>
				hero-min-hight
			<?php endif; ?> 
			">
				<div class="row mt-5">
					<div class="col-lg-6 mt-5 text-white">
						<h1 class="my-4">
							<?php the_title(); ?>
						</h1>
					</div>
				</div>
			</div>

			<div class="position-absolute start-0 left-0 w-100 h-100 z-top bg-grad-hero"></div>
			<?php if ( has_post_thumbnail() ) : ?>
				<img class="position-absolute top-0 start-0 cover-img" src="<?php echo $thumb['0'];?>" alt="<?php the_title(); ?> - cleland roofing solutions">
			<?php else: ?> 
				<img class="cover-img position-absolute start-0 top-0 z-top" src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-bg.svg" alt="overlay graphic">
			<?php endif; ?> 

		</div>

		<div class="container-fluid position-relative mb-4 mb-lg-5 bg-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-l2 py-4">
						<?php if( get_field('location') ): ?>
							<p class="mb-2"><strong>Location:</strong> <?php the_field('location'); ?></p>
						<?php endif; ?>
						<?php if( get_field('service_type') ): ?>
							<p class="mb-2"><strong>Service Type:</strong> <?php the_field('service_type'); ?></p>
						<?php endif; ?>
						<?php if( get_field('short_description') ): ?>
							<p class="mb-2"><?php the_field('short_description'); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		<?php get_template_part( 'template-parts/flexible-page-content' ); ?>

	</article><!-- #post-<?php the_ID(); ?> -->
</main>