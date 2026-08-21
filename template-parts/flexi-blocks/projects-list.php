<?php get_template_part( 'template-parts/project-filters' ); ?>

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
							<?php if( get_field('service_type') ): ?>
								<p class="mb-1"><strong>Service:</strong> <?php the_field('service_type'); ?></p>
							<?php endif; ?>
							<?php
							$project_types = get_the_terms( get_the_ID(), 'project_type' );

							if ( $project_types && ! is_wp_error( $project_types ) ) : ?>
								<p class="mb-1">
									<strong>Project Type:</strong>
									<?php echo esc_html( $project_types[0]->name ); ?>
								</p>
							<?php endif; ?>
							<?php if( get_field('location') ): ?>
								<p class="mb-0"><strong>Location:</strong> <?php the_field('location'); ?></p>
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