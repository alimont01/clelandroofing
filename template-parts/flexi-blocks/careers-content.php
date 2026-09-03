
<div class="container-fluid pb-4 pb-lg-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<h2 class="mt-0 mb-4 text-blue">
					Current Positions
				</h2>
			</div>
			<div class="col-lg-8 ps-lg-5">
				<?php if( have_rows('add_a_job') ): ?>

					<?php while( have_rows('add_a_job') ): the_row(); ?>
					
						<h3 class="mt-0 text-blue mb-4"><?php echo acf_esc_html( get_sub_field('job_title') ); ?></h3>

						<div class="job-details mb-4">
							<?php if( get_sub_field('location') ): ?>
								<p class="mb-1">
									<strong>Location:</strong> 
									<?php echo acf_esc_html( get_sub_field('location') ); ?>
								</p>
							<?php endif; ?>
							<?php if( get_sub_field('job_type') ): ?>
								<p class="mb-1">
									<strong>Job Type:</strong> 
									<?php echo acf_esc_html( get_sub_field('job_type') ); ?>
								</p>
							<?php endif; ?>
							<?php if( get_sub_field('person_picture') ): ?>
								<p class="mb-0">
									<strong>Salary:</strong> 
									<?php echo acf_esc_html( get_sub_field('caption') ); ?>
								</p>
							<?php endif; ?>
						</div>
						
						<?php echo acf_esc_html( get_sub_field('job_description') ); ?>

					<?php endwhile; ?>

				<?php else: ?>
					<h3 class="mt-0 fs-4 text-blue mb-4">No Current Vacancies</h3>
					<p>
						We don’t have any open positions at the moment, but we’re always happy to hear from experienced, reliable people who may be a good fit for the Cleland Roofing Solutions team. If you’d like to be considered for future opportunities, please send us your CV using the form below.
					</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid pb-4 pb-lg-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<h2 class="mt-0 mb-4 text-blue">
					Interested in Joining the Cleland Roofing Team?
				</h2>
				<p>We’re always interested in hearing from experienced, reliable people who would like to work with Cleland Roofing Solutions. If you’d like to be considered for current or future opportunities, complete the form and upload your CV.</p>
			</div>
			<div class="col-lg-8 ps-lg-5">
				<div class="bg-grad p-4 p-lg-5 text-white position-relative">
					<div class="z-top">
						<?php echo do_shortcode('[forminator_form id="136"]'); ?>
					</div>
					<img class="cover-img position-absolute start-0 top-0" src="<?php echo get_template_directory_uri(); ?>/assets/img/call-to-action-bg.svg" alt="Call to action graphic">
				</div>
			</div>
		</div>
	</div>
</div>