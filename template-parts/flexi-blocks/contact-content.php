
<div class="container-fluid pb-4 pb-lg-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<h2 class="mt-0 mb-4 text-blue">
					How Can We Help?
				</h2>
				<p>Whether you’re looking for a quotation, have a question about one of our roofing services or need advice about an existing roof, simply complete the contact form below and a member of the Cleland Roofing Solutions team will get back to you as soon as possible.</p>
                <?php if( get_field('address', 'option') ): ?>
                    <p class="fw-bold mb-3">
                        <?php the_field('address', 'option'); ?>
                    </p>
                <?php endif; ?>

				<?php
				$email   = get_field('email', 'option');
				$subject = get_field('contact_email_subject', 'option');
				$body    = get_field('contact_email_body', 'option');

				if ( $email ) :

					$mailto = 'mailto:' . $email;

					$params = array();

					if ( $subject ) {
						$params[] = 'subject=' . rawurlencode( $subject );
					}

					if ( $body ) {
						$params[] = 'body=' . rawurlencode( $body );
					}

					if ( $params ) {
						$mailto .= '?' . implode( '&', $params );
					}
				?>

					<p class="fw-bold">
						<a href="<?php echo esc_attr( $mailto ); ?>">
							<?php echo esc_html( $email ); ?>
						</a>
					</p>

				<?php endif; ?>

			</div>
			<div class="col-lg-8 ps-lg-5">
				<div class="bg-grad p-4 p-lg-5 text-white position-relative">
					<div class="z-top">
						<?php echo do_shortcode('[forminator_form id="146"]'); ?>
						<?php echo do_shortcode('[forminator_form id="132"]'); ?>
					</div>
					<img class="cover-img position-absolute start-0 top-0" src="<?php echo get_template_directory_uri(); ?>/assets/img/call-to-action-bg.svg" alt="Call to action graphic">
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0 py-4 pb-lg-5">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2240.293201020413!2d-3.0433228999999993!3d55.8402264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4887c542d4d2f781%3A0xbf72785a23e8a483!2sCleland%20Roofing%20Solutions!5e0!3m2!1sen!2suk!4v1786716084345!5m2!1sen!2suk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
</div>