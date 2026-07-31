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
            <div class="col-12 text-center">
                <p class="fw-bold">0131 364 4212  &nbsp;&nbsp;&nbsp;   <a href="mailto:enquiries@clelandroofingsolutions.co.uk">enquiries@clelandroofingsolutions.co.uk</a></p>
            </div>
        </div>
    </div>
    <img class="cover-img position-absolute start-0 top-0" src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-bg.svg" alt="Footer graphic">
</footer>


<div class="container-fluid py-3 py-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pb-4">
                {get logos}
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <hr class="border-top border-dark py-2">
            </div>
        </div>
        <div class="row">
            <div class="col-9 mb-3 mb-lg-0">
                <p class="small mb-2">&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?> - Companies House Registration No. SC670470 - VAT Registered 359 8055 58</p>
            </div>
            <div class="col-3 text-end">
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
