
    <div class="container-fluid px-0 pb-4 pb-lg-5">
		<?php if( get_sub_field('constrain_image_to_body_content_width') ): ?>
    		<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="w-100">
							<?php 
							$image = get_sub_field('add_a_full_width_image');
							if( !empty( $image ) ): ?>
								<img class="fw-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		<?php else: ?>

			<?php 
			$image = get_sub_field('add_a_full_width_image');
			if( !empty( $image ) ): ?>
				<img class="fw-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
			<?php endif; ?>


		<?php endif; ?>
    </div>