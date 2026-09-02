<?php
$posts_page_id = get_option( 'page_for_posts' );

$all_posts_url = $posts_page_id
	? get_permalink( $posts_page_id )
	: home_url( '/' );
?>

<div class="container-fluid bg-light-grey mb-4 mb-lg-5">
	<div class="container py-3">
		<div class="row">
			<div class="col-12">

				<div class="post-categories d-flex flex-wrap align-items-center gap-2">

					<span class="me-2">
						Filter by category:
					</span>

					<a
						href="<?php echo esc_url( $all_posts_url ); ?>"
						class="btn btn-sm <?php echo is_home() ? 'btn-dark' : 'btn-outline-dark'; ?>"
					>
						All
					</a>

					<?php
					$categories = get_terms( array(
						'taxonomy'   => 'category',
						'hide_empty' => true,
					) );

					if ( ! is_wp_error( $categories ) ) :

						foreach ( $categories as $category ) :

							$is_active = is_category( $category->term_id );
							?>

							<a
								href="<?php echo esc_url( get_term_link( $category ) ); ?>"
								class="btn btn-sm <?php echo $is_active ? 'btn-dark' : 'btn-outline-dark'; ?>"
							>
								<?php echo esc_html( $category->name ); ?>
							</a>

						<?php endforeach; ?>

					<?php endif; ?>

				</div>

			</div>
		</div>
	</div>
</div>