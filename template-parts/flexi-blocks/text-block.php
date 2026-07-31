<div class="container-fluid mb-4 mb-lg-5 <?php the_sub_field('background_colour_text_block'); ?>">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 text-center">
				<?php if( get_sub_field('text_title_text_block') ): ?>
					<h2 class="mt-0 mb-3 text-blue"><?php echo acf_esc_html( get_sub_field('text_title_text_block') ); ?></h2>
				<?php endif; ?>
				<?php if( get_sub_field('body_text_text_block') ): ?>
					<?php echo do_shortcode( get_sub_field('body_text_text_block') ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>