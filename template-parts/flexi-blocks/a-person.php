<div class="container mb-4 remove-p-margin">
	<div class="row">
		<div class="col-12">
			<div class="bg-light-grey d-flex flex-wrap">
				<?php 
				$image = get_sub_field('person_picture');
				if( !empty( $image ) ): ?>
					<div class="col-3">
						<img class="w-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
				<?php endif; ?>
				<div class="col p-4">
					<?php if( get_sub_field('persons_name') ): ?>
						<h4 class="mt-0 mb-1 text-blue"><?php the_sub_field('persons_name'); ?></h4>
					<?php endif; ?>
					<?php if( get_sub_field('persons_position') ): ?>
						<p class="fw-bold mb-3"><?php the_sub_field('persons_position'); ?></p>
					<?php endif; ?>
					<?php if( get_sub_field('bio') ): ?>
						<p><?php the_sub_field('bio'); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>