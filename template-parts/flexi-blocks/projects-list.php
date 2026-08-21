<div class="container-fluid bg-light-grey">
  <div class="container py-3">
    <div class="row">
      <div class="col-12">

        <div class="project-services d-flex flex-wrap align-items-center gap-2">

          <span class="me-2">
            Filter by service:
          </span>

          <a
            href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ); ?>"
            class="btn btn-sm <?php echo is_post_type_archive( 'project' ) ? 'btn-dark' : 'btn-outline-dark'; ?>"
          >
            All
          </a>

          <?php
          $services = get_terms( array(
            'taxonomy'   => 'project_service',
            'hide_empty' => true,
          ) );

          if ( ! is_wp_error( $services ) ) :

            foreach ( $services as $service ) :

              $is_active = is_tax( 'project_service', $service->term_id );
              ?>

              <a
                href="<?php echo esc_url( get_term_link( $service ) ); ?>"
                class="btn btn-sm <?php echo $is_active ? 'btn-dark' : 'btn-outline-dark'; ?>"
              >
                <?php echo esc_html( $service->name ); ?>
              </a>

            <?php endforeach; ?>

          <?php endif; ?>

        </div>

      </div>
    </div>
  </div>
</div>

<?php
$projects_posts = get_sub_field('choose_and_order_projects');
if( $projects_posts ): ?>

	<div class="container-fluid mb-4 mb-lg-5">
		<div class="container">
			<div class="row text-blue">
				<?php foreach( $projects_posts as $post ): 
					setup_postdata($post); 
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'news-post' );
					?>
					<div class="col-sm-6 col-lg-4 mb-4 services">
						<a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
									<img class="w-100" src="<?php echo $thumb['0'];?>" alt="<?php the_title(); ?>">
							<?php else: ?> 
								<a href="<?php the_permalink(); ?>">
									<?php 
									$image = get_field('placeholder_image', 'option');
									$size = 'news-post';
									if( $image ) {
										echo wp_get_attachment_image( $image, $size, "",array('class' => 'w-100') );
									} ?>
								</a>
							<?php endif; ?> 

							<h2 class="fs-5 mt-2 mb-4">
								<span class="d-flex justify-content-between pe-3" href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
									<i class="bi bi-arrow-right"></i>
								</span>
							</h2>
							<?php if( get_field('location') ): ?>
								<p class="mb-2"><strong>Location:</strong> <?php the_field('location'); ?></p>
							<?php endif; ?>
							<?php if( get_field('service_type') ): ?>
								<p class="mb-2"><strong>Service Type:</strong> <?php the_field('service_type'); ?></p>
							<?php endif; ?>
						</a>

					</div>
				<?php endforeach; ?>
			</div>
		</div>
    </div>


    <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php endif; ?>