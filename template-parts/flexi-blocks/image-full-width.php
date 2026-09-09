<?php
$image             = get_sub_field('add_a_full_width_image');
$constrain_width   = get_sub_field('constrain_image_to_body_content_width');
$constrain_height  = get_sub_field('constrain_image_height');

$image_class = $constrain_height ? 'w-100' : 'fw-image';
?>

<?php if ( ! empty( $image ) ) : ?>

	<div class="container-fluid px-0 pb-4 pb-lg-5">

		<?php if ( $constrain_width ) : ?>
			<div class="container">
				<div class="row">
					<div class="col-12">
		<?php endif; ?>

						<img 
							class="<?php echo esc_attr( $image_class ); ?>"
							src="<?php echo esc_url( $image['url'] ); ?>" 
							alt="<?php echo esc_attr( $image['alt'] ); ?>"
						/>

		<?php if ( $constrain_width ) : ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

	</div>

<?php endif; ?>