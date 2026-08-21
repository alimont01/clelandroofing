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

<?php if ( is_front_page()  ) : ?>
	<div class="container-fluid position-relative d-flex align-items-center mb-4 mb-lg-2 bg-grad text-white hp-hero">
			<div class="container pt-2 pb-4 py-lg-5 z-top-top">
				<div class="row justify-content-center">
					<div class="col-lg-8 text-center">
						<h1 class="mt-0 mb-4">
							<?php the_title(); ?>
						</h1>
						<?php if( get_field('hero_intro_text') ): ?>
							<p class=""><?php the_field('hero_intro_text'); ?></p>
						<?php endif; ?>

						<div class="w-100 d-flex justify-content-center flex-wrap">
							<?php 
							$link = get_field('hero_button_link');
							if( $link ): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<a class="btn-white mx-2 mb-3" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif; ?>
							<?php 
							$link_secondary = get_field('hero_button_link_secondary');
							if( $link_secondary ): 
								$link_url = $link_secondary['url'];
								$link_title = $link_secondary['title'];
								$link_target = $link_secondary['target'] ? $link['target'] : '_self';
								?>
								<a class="btn-outline mx-2 mb-3" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>

			<!-- Swiper -->
			<div class="swiper hpSwiper position-absolute start-0 top-0">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<img src="https://clelandroofingsolutions.co.uk/wp-content/uploads/2024/05/Cleland-Roofing-1-Keydrone-Web.jpg" />
					</div>
					<div class="swiper-slide">
						<img src="https://clelandroofingsolutions.co.uk/wp-content/uploads/2024/06/company_121783_2ae46e00-0ece-11ef-9f9a-f1477d54dbd8.jpg" />
					</div>
					<div class="swiper-slide">
						<img src="https://clelandroofingsolutions.co.uk/wp-content/uploads/2024/06/company_121783_82f88c70-f8da-11ee-83fc-4b3478b91aa4.jpg" />
					</div>
				</div>
			</div>
			<div class="position-absolute start-0 left-0 w-100 h-100 z-top bg-grad opacity-75"></div>

			<img class="w-100 position-absolute start-0 bottom-0 z-top" src="<?php echo get_template_directory_uri(); ?>/assets/img/banner-mask.svg" alt="hero graphic">

		</div>

<?php else: ?> 

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

<?php endif; ?> 


<!-- Initialize Swiper -->
<script>
	var swiper = new Swiper('.hpSwiper', {
	spaceBetween: 0,
	effect: 'fade',
	loop: true,
	autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
	});
</script>