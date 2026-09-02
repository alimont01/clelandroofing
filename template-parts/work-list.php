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