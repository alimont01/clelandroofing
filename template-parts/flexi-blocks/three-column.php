
    <div class="container py-4 py-lg-5">
        <div class="row">
            <div class="col-12 text-center">
				<?php if( get_sub_field('sub_title_3_col') ): ?>
					<p class="fw-bold text-gold text-uppercase">
						<?php the_sub_field('sub_title_3_col'); ?>
					</p>
				<?php endif; ?>
				<?php if( get_sub_field('title_3_col') ): ?>
					<h2 class="fs-1">
						<?php the_sub_field('title_3_col'); ?>
					</h2>
				<?php endif; ?>
            </div>
        </div>
    </div>

<?php if( have_rows('add_block_3_col') ): ?>
    <div class="container pb-4 pb-lg-5">
        <div class="row">
			<?php while( have_rows('add_block_3_col') ): the_row(); ?>
				<div class="col-lg-4">
                	<div class="p-4 p-xl-5 shadow rounded-3 d-flex flex-column h-100">
						<div class="col-3 mb-3 mb-xl-4">
							<div class="rounded-circle bg-buzz d-flex justify-content-center align-items-center">
								<?php 
								$image_3_col = get_sub_field('icon');
								if( !empty( $image_3_col ) ): ?>
									<img class="h-100 p-3" src="<?php echo esc_url($image_3_col['url']); ?>" alt="<?php echo esc_attr($image_3_col['alt']); ?>" />
								<?php endif; ?>
							</div>
						</div>

						<h3 class="fs-2 add-line pb-3 mb-3">
							<?php echo acf_esc_html( get_sub_field('title_3_col') ); ?>
						</h3>
						<p><?php echo acf_esc_html( get_sub_field('body_text_3_col') ); ?></p>
						<?php 
						$link = get_sub_field('link_3_col');
						if( $link ): 
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
							?>
							<a class="text-gold arrow mt-auto" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile; ?>
       </div>
    </div>
<?php endif; ?>