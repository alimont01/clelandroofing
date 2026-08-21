<?php
/**
 * Main template file.
 *
 * @package Cleland_Theme
 */


get_header();
?>

<main class="site-main">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  	<div class="container-fluid position-relative d-flex align-items-center bg-grad">
			<div class="container pt-lg-5 hero pb-5">
				<div class="row mt-5">

					<div class="col-lg-6 mt-5 text-white">
            <h1 class="my-4">
              <?php
              if ( is_tax( 'project_type' ) ) {

                single_term_title();
                echo ' Work';

              } elseif ( is_tax( 'project_service' ) ) {

                single_term_title();

              } elseif ( is_category() ) {

                single_cat_title();

              } elseif ( is_home() && ! is_front_page() ) {

                $posts_page_id = get_option( 'page_for_posts' );
                echo esc_html( get_the_title( $posts_page_id ) );

              } else {

                esc_html_e( 'Blog', 'Cleland_Theme' );

              }
              ?>
            </h1>
					</div>

				</div>
			</div>

			<div class="position-absolute start-0 left-0 w-100 h-100 z-top bg-grad-hero"></div>
			<img class="cover-img position-absolute start-0 top-0 z-top" src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-bg.svg" alt="overlay graphic">

		</div>

    <?php get_template_part( 'template-parts/project-filters' ); ?>

      
    <div class="container-fluid text-blue">
        <div class="container">
          <div class="row g-4">

            <?php if ( have_posts() ) : ?>
              <?php while ( have_posts() ) : the_post();
              $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'news-post' ); ?>

                <div class="col-sm-6 col-lg-4 mb-4 services">
                    <a href="<?php the_permalink(); ?>">
                      <?php if ( has_post_thumbnail() ) : ?>
                          <img class="w-100" src="<?php echo $thumb['0'];?>" alt="<?php the_title(); ?>">
                      <?php else: ?> 
                          <?php 
                          $image = get_field('placeholder_image', 'option');
                          $size = 'news-post';
                          if( $image ) {
                            echo wp_get_attachment_image( $image, $size, "",array('class' => 'w-100') );
                          } ?>
                      <?php endif; ?> 

                      <h2 class="fs-5 mt-2 mb-4">
                        <span class="d-flex justify-content-between pe-3" href="<?php the_permalink(); ?>">
                          <?php the_title(); ?>
                          <i class="bi bi-arrow-right"></i>
                        </span>
                      </h2>
                      <?php
                      $service_posts = get_field( 'service_type' );

                      if ( $service_posts ) : ?>
                        
                        <?php foreach ( $service_posts as $service_post ) : ?>
                          <p class="mb-2">
                            <strong>Service:</strong>
                            <?php echo esc_html( get_the_title( $service_post ) ); ?>
                          </p>
                        <?php endforeach; ?>

                      <?php endif; ?>

                      <?php if ( get_field( 'location' ) ) : ?>
                        <p class="mb-0">
                          <strong>Location:</strong>
                          <?php the_field( 'location' ); ?>
                        </p>
                      <?php endif; ?>
                    </a>

                  </div>

              <?php endwhile; ?>
            <?php else : ?>

              <div class="col-12 text-center">
                <p><?php esc_html_e( 'No posts found.', 'Cleland_Theme' ); ?></p>
              </div>

            <?php endif; ?>

          </div>

          <div class="mt-5">
            <?php
            the_posts_pagination( array(
              'mid_size'  => 2,
              'prev_text' => __( '« Previous', 'Cleland_Theme' ),
              'next_text' => __( 'Next »', 'Cleland_Theme' ),
            ) );
            ?>
          </div>
        </div>
      </div>

  </article>
</main>

<?php
get_footer();
