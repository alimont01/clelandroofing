<?php
/**
 * Footer template.
 *
 * @package Cleland_Theme
 */
?>


<footer class="container-fluid bg-grad text-white py-3 py-lg-5 position-relative">
    <div class="container z-top">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="col-8 col-sm-5 col-lg-4">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/cleland-roofing-solutions-logo-white.svg" alt="Cleland Roofing Solutions Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 d-flex flex-wrap">
                <div class="col-5">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer_1',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => '',
                        'container'      => 'nav',
                        'container_class'=> 'main-navigation',
                    ) );
                    ?>
                </div>
                <div class="col-5">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer_2',
                        'menu_id'        => 'footer-menu',
                        'menu_class'     => '',
                        'container'      => 'nav',
                        'container_class'=> 'main-navigation',
                    ) );
                    ?>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <hr class="border-top py-2">
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex flex-wrap justify-content-center">
                <?php if( get_field('phone_no', 'option') ): ?>
                    <p class="fw-bold mx-4 mb-2">
                        <?php the_field('phone_no', 'option'); ?>
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
        </div>
    </div>
    <img class="cover-img position-absolute start-0 top-0" src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-bg.svg" alt="Footer graphic">
</footer>


<div class="container-fluid py-3 py-lg-5">
    <div class="container">
        <?php if( have_rows('footer_logos', 'option') ): ?>
            <div class="row">
                <div class="col-12 pb-lg-4 d-flex flex-wrap align-items-center justify-content-center gap-3 gap-lg-5">
                    <?php while( have_rows('footer_logos', 'option') ): the_row(); 
                        $logos = get_sub_field('add_logo');
                        ?>
                        <?php if( get_sub_field('add_logo_url', 'option') ): ?>
                            <a href="<?php echo acf_esc_html( get_sub_field('add_logo_url', 'option') ); ?>" target="_blank">
                        <?php endif; ?>
                            <?php echo wp_get_attachment_image( $logos, 'full', "", ["class" => "footer-logos"] ); ?>
                        <?php if( get_sub_field('add_logo_url', 'option') ): ?>
                            </a>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-12">
                <hr class="border-top border-dark py-2">
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 mb-3 mb-lg-0">
                <p class="small mb-2">&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?> - Companies House Registration No. SC670470 - VAT Registered 359 8055 58</p>
            </div>
            <div class="col-md-3 text-md-end">
                <a href="https://alizan.uk/" target="_blank">
                    <img class="alizan-logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/alizan-logo-black.svg" alt="Alizan Logo">
                </a>
            </div>
        </div>
    </div>
</div>


<?php wp_footer(); ?>
</body>
</html>
