
    <div class="container py-4 py-lg-5 text-blue">
        <div class="row">
            <div class="col-12 text-center">
				<h2 class="">
					Latest Staff News
				</h2>
            </div>
        </div>
    </div>

	<div class="container-fluid pb-4 pb-lg-5">
        <div class="container">
                <div class="row g-4">
                    <?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                        $query_args = array(
                            'post_type' => 'post',
                            'category_name'  => 'staff-news',
                            'posts_per_page' => 3,
                            'order' => 'DESC',
                            'orderby' => 'date',
                            );
                            
                    $the_query = new WP_Query( $query_args );
                    ?>

                    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();// run the loop 
                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'news-post' );
                    ?>

						<div class="col-sm-3">
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
						<div class="col-sm-9">
							<h2 class="mt-0 mb-4 fs-3 text-blue">
								<?php the_title(); ?>
							</h2>
								<?php
								$excerpt = get_the_excerpt();
								$limit   = 45;

								echo wp_trim_words( $excerpt, $limit );

								if ( str_word_count( wp_strip_all_tags( $excerpt ) ) > $limit ) : ?>
									
									<a href="<?php the_permalink(); ?>">Read more</a>

								<?php endif; ?>
						</div>

                    <?php endwhile; ?> 
                </div>

                <?php else: ?>
                <article>
                    <h3>Sorry...</h3>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                </article>
                <?php endif; ?>
            </div>
        </div>
    </div>

	<div class="container pb-4 pb-lg-5">
        <div class="row">
			<div class="col-12 text-center">
				<a class="btn-blue mt-2 d-inline-block" href="/category/staff-news/">
					View all Staff News
				</a>
			</div>
        </div>
    </div>