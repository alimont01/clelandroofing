<div class="container py-4 py-lg-5">
	<div class="row">
		<div class="col-12">
			<div class="d-flex flex-wrap align-items-center text-white p-4 bg-grad position-relative">
				<div class="col-12 col-lg-6 col-xl-9 d-flex flex-wrap align-items-center z-top">
					<div class="">
						<?php if( get_sub_field('title_call_to') ): ?>
							<h2 class="mt-0 mb-3">
								<?php the_sub_field('title_call_to'); ?>
							</h2>
						<?php endif; ?>
						<?php if( get_sub_field('body_text_call_to') ): ?>
							<span class="mb-3">
								<?php the_sub_field('body_text_call_to'); ?>
							</span>
						<?php endif; ?>
						<?php 
						$link = get_sub_field('button_link_call_to');
						if( $link ): 
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
							?>
							<a class="btn-white mt-2 d-inline-block" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-12 col-lg-6 col-xl-3 text-start text-lg-end">
					{get cards}
				</div>
				<img class="cover-img position-absolute start-0 top-0" src="<?php echo get_template_directory_uri(); ?>/assets/img/call-to-action-bg.svg" alt="Call to action graphic">
			</div>
		</div>
	</div>
</div>