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

		<div class="container-fluid position-relative mb-4 mb-lg-5 bg-grad text-white">
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

		<div class="container-fluid py-4">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 text-content">	
						<?php the_content();?>
					</div>
					<div class="col-lg-4 pb-3">
						<div class="sticky-top">
							<div class="bg-light-grey p-4 tags">
								<div class="mb-3">
									<span class="d-block">Category:</span>
									<?php $categories = get_the_category();
									if (!empty($categories)) :
									foreach ($categories as $cat) : ?>
										<a class="d-block" href="<?php echo esc_url(get_category_link($cat->term_id)); ?>">
											<?php echo esc_html($cat->name); ?>
										</a>
									<?php endforeach;
									endif;
									?>
								</div>	
								<?php if (has_tag()) : ?>
									<div class="mb-3">
										<span class="d-block">Tags:</span>
										<?php the_tags( ' ', ', ', '' ); ?>
									</div>
								<?php endif; ?> 
								<p class="small-text mt-4 mb-2">Share this post:</p>
								<?php echo do_shortcode("[addtoany]"); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


</article><!-- #post-<?php the_ID(); ?> -->
