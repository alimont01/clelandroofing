<div class="container-fluid news-feed">
        <div class="container">
          <div class="row g-4">

            <?php if ( have_posts() ) : ?>
              <?php while ( have_posts() ) : the_post();
              $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'news-post' ); ?>

				<div class="col-md-3">
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
				</div>
				<div class="col-md-9 d-flex flex-column">
					<h2 class="mt-0 mb-4 fs-3 text-blue">
						<?php the_title(); ?>
					</h2>
					<p class="flex-grow-1">
						<?php
						$excerpt = get_the_excerpt();
						$limit   = 54;

						echo wp_trim_words( $excerpt, $limit );

						if ( str_word_count( wp_strip_all_tags( $excerpt ) ) > $limit ) : ?>
							
							<a href="<?php the_permalink(); ?>">Read more</a>

						<?php endif; ?>
					</p>

					<hr class="d-none d-md-block border-light mb-1">

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