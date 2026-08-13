<div class="container-fluid mb-4 mb-lg-5 <?php the_sub_field('background_colour_text_block'); ?>

<?php if ( get_sub_field('background_colour_text_block') == 'bg-light-grey' ) : ?>
    py-4 py-lg-5
<?php endif; ?>

">
	<div class="container text-content">
		<div class="row justify-content-center">
			<div class="col-lg-8 
			<?php if( get_sub_field('center_text_text_block') ): ?>
				text-lg-center
			<?php endif; ?>
			">
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