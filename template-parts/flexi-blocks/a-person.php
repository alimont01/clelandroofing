

<div class="container-fluid pb-4 mb-4 mb-lg-5 bg-light-grey">

	<?php if( get_sub_field('block_title_team') ): ?>
		<div class="container py-4 py-lg-5">
			<div class="row">
				<div class="col-12 text-center">
					<h2 class="mt-0 text-blue">
						<?php the_sub_field('block_title_team'); ?>
					</h2>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php if( have_rows('add_a_person') ): ?>
	<div class="container mb-4 remove-p-margin">
		<div class="row g-4">
			<?php while( have_rows('add_a_person') ): the_row(); 
			$image = get_sub_field('person_picture');
			?>
				<div class="col-12">
					<div class="bg-white d-flex flex-wrap">
						<div class="col-sm-2">
							<?php echo wp_get_attachment_image( $image, 'full', "", ["class" => "w-100"] ); ?>
						</div>
						<div class="col p-4">
							<?php if( get_sub_field('persons_name') ): ?>
								<h4 class="mt-0 mb-1 text-blue"><?php echo acf_esc_html( get_sub_field('persons_name') ); ?></h4>
							<?php endif; ?>
							<?php if( get_sub_field('persons_position') ): ?>
								<p class="fw-bold mb-3"><?php echo acf_esc_html( get_sub_field('persons_position') ); ?></p>
							<?php endif; ?>
							<?php if( get_sub_field('bio') ): ?>
								<p><?php echo acf_esc_html( get_sub_field('bio') ); ?></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
	<?php endif; ?>
	
</div>
