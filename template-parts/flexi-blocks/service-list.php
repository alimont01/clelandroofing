<?php
$service_posts = get_sub_field('choose_and_order_services');
if( $service_posts ): ?>
    <div class="container-fluid py-4 py-lg-5">
		<div class="container">
			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 text-blue">
				<?php foreach( $service_posts as $post ): 
					setup_postdata($post); 
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'news-post' );
					?>
					<div class="col mb-4 services">
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

							<h2 class="mt-0 fs-6 mt-2">
								<span class="d-flex justify-content-between pe-3" href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
									<i class="bi bi-arrow-right"></i>
								</span>
							</h2>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<a class="btn-blue mt-2 d-inline-block" href="/services/" >
						View all services
					</a>
				</div>
			</div>
		</div>
    </div>
    <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php endif; ?>