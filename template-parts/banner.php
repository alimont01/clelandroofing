<?php
/** Banner area on pages */
$thumbnail_id = get_post_thumbnail_id( get_the_ID() );

$thumb  = wp_get_attachment_image_src( $thumbnail_id, 'full' );
$mobile = wp_get_attachment_image_src( $thumbnail_id, 'news-post' );

$thumb_alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );

// Optional fallback if no alt text is set in Media Library
if ( empty( $thumb_alt ) ) {
	$thumb_alt = get_the_title();
}
?>


	<div class="container-fluid position-relative d-flex align-items-center bg-grad 
			<?php if (  is_page( 'our-work' )) : ?>
				mb-0 
			<?php else: ?> 
				mb-4 mb-lg-5 
			<?php endif; ?> 
			">
			<div class="container pt-lg-5 hero pb-5
			<?php if ( has_post_thumbnail() ) : ?>
				hero-min-hight
			<?php endif; ?> 
			">
				<div class="row mt-5">

					<div class="col-lg-6 mt-5 text-white">
						<h1 class="my-4">
							<?php the_title(); ?>
						</h1>
						<?php if( get_field('hero_intro_text') ): ?>
							<p class="mb-5"><?php the_field('hero_intro_text'); ?></p>
						<?php endif; ?>

						<div class="w-100 d-flex flex-wrap">
							<?php 
							$link = get_field('hero_button_link');
							if( $link ): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<a class="btn-white me-md-2" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif; ?>
							<?php 
							$link_secondary = get_field('hero_button_link_secondary');
							if( $link_secondary ): 
								$link_url = $link_secondary['url'];
								$link_title = $link_secondary['title'];
								$link_target = $link_secondary['target'] ? $link['target'] : '_self';
								?>
								<a class="btn-outline ms-md-2" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif; ?>
						</div>
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