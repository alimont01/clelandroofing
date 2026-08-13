<?php
/**
 * Template part for displaying posts
 *
 * @package Cleland_Theme
 */

/** Banner area on on pages */
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php get_template_part( 'template-parts/banner' ); ?>

		<div class="d-none container-fluid position-relative mb-4 mb-lg-5 bg-grad text-white">
			<div class="container position-relative pt-lg-5 z-top-2">
				<div class="row hero align-items-center">
					<div class="col-lg-6 my-4">
						<h1 class="">
							<?php the_title(); ?>
						</h1>
					</div>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="col-lg-6 d-lg-none">
							<img class="cover-img mt-5" src="<?php echo $thumb['0'];?>" alt="<?php the_title(); ?>">
						</div>
					<?php endif; ?> 
				</div>
			</div>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="d-none d-lg-block w-50 h-100 position-absolute end-0 top-0">
					<img class="cover-img" src="<?php echo $thumb['0'];?>" alt="<?php the_title(); ?>">
				</div>
			<?php endif; ?> 
			<img class="cover-img position-absolute start-0 top-0 z-top" src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-bg.svg" alt="overlay graphic">
		</div>

		<?php get_template_part( 'template-parts/flexible-page-content' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->
