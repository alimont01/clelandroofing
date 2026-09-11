<?php
/**
 * @package Cleland_Theme
 */
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
get_header(); 
?>


	<div class="container-fluid position-relative d-flex align-items-center mb-4 mb-lg-2 bg-grad text-white hp-hero">
			<div class="container pt-5 pt-lg-2 pb-4 py-lg-5 z-top-top">
				<div class="row justify-content-center">
					<div class="col-lg-8 text-center">
						<h1 class="mt-0 mb-4">
							<?php the_title(); ?>
						</h1>
						<?php if( get_field('hero_intro_text') ): ?>
							<p class="mb-4"><?php the_field('hero_intro_text'); ?></p>
						<?php endif; ?>

						<div class="w-100 d-flex justify-content-center flex-wrap flex-column flex-sm-row">
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
            <?php if( have_rows('carousel_images') ): ?>
                <div class="swiper hpSwiper position-absolute start-0 top-0">
                    <div class="swiper-wrapper">
                        <?php while( have_rows('carousel_images') ): the_row(); 
                        $image = get_sub_field('add_image_carousel');
                        ?>
                            <div class="swiper-slide">
                                <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>
			<div class="position-absolute start-0 left-0 w-100 h-100 z-top bg-grad opacity-75"></div>

			<img class="w-100 position-absolute start-0 bottom-0 z-top" src="<?php echo get_template_directory_uri(); ?>/assets/img/banner-mask.svg" alt="hero graphic">

		</div>

    <?php get_template_part( 'template-parts/flexible-page-content' ); ?>

<?php get_footer(); ?>


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