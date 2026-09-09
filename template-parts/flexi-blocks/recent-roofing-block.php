<div class="container-fluid my-3 my-lg-5 pb-5 bg-blue position-relative remove-p-margin">
	<div class="container text-white z-top">
		<div class="row justify-content-center py-5">
			<div class="col-12 col-lg-7 text-center">
				<?php if( get_sub_field('block_title_recent') ): ?>
					<h2 class="mt-0 mb-3"><?php the_sub_field('block_title_recent'); ?></h2>
				<?php endif; ?>
				<?php if( get_sub_field('intro_text_recent') ): ?>
					<p class=""><?php the_sub_field('intro_text_recent'); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="container pb-5 z-top">
		<div class="before-after" style="--position: 50%;">

			<!-- Before image -->
			<?php 
			$image_before = get_sub_field('left_image_before');
			if( !empty( $image_before ) ): ?>
				<img src="<?php echo esc_url($image_before['url']); ?>"  
				class="before-after__image before-after"
				alt="<?php echo esc_attr($image_before['alt']); ?>" 
			/>
			<?php endif; ?>

			<!-- After image -->
			<div class="before-after__after">
				<?php 
				$image_after = get_sub_field('right_image_after');
				if( !empty( $image_after ) ): ?>
					<img src="<?php echo esc_url($image_after['url']); ?>" a 
					class="before-after__image before-after"
					lt="<?php echo esc_attr($image_after['alt']); ?>" 
				/>
				<?php endif; ?>
			</div>

			<!-- Labels -->
			<span class="before-after__label before-after__label--before">
				Before
			</span>

			<span class="before-after__label before-after__label--after">
				After
			</span>

			<!-- Divider -->
			<div class="before-after__divider"></div>

			<!-- Handle -->
			<div class="before-after__handle">
				<span class="before-after__arrow before-after__arrow--left"></span>
				<span class="before-after__arrow before-after__arrow--right"></span>
			</div>

			<!-- Slider control -->
			<input
				type="range"
				min="0"
				max="100"
				value="50"
				class="before-after__range"
				aria-label="Compare before and after images"
			>

		</div>
	</div>

	<div class="container z-top">
		<div class="row">
			<div class="col-12 text-center">
				<?php 
				$link = get_sub_field('button_link_recent');
				if( $link ): 
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<a class="btn-white mt-2 d-inline-block" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<img class="w-100 position-absolute start-0 bottom-0" src="<?php echo get_template_directory_uri(); ?>/assets/img/projects-bg.svg" alt="Cleland Roofing Solutions">

</div>


<script>
	document.querySelectorAll('.before-after').forEach(function (comparison) {

	const range = comparison.querySelector('.before-after__range');

	range.addEventListener('input', function () {
		comparison.style.setProperty('--position', range.value + '%');
	});

});
</script>