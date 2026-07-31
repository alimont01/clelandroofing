<?php
/**
 * Header template.
 *
 * @package Cleland_Theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header container-fluid position-absolute start-0 top-0 w-100 z-top-top">
  <h1 class="site-title d-none">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
  </h1>
      <div class="container py-3 z-top">
        <div class="row align-items-center">
            <div class="col-7 col-sm-5 col-lg-2">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/cleland-roofing-solutions-logo-white.svg" alt="Cleland Roofing Solutions Logo">
              </a>
            </div>
            <div class="col-5 col-sm-7 col-lg-10 d-flex flex-column align-items-end">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'd-flex mb-0 ps-0',
                    'container'      => 'nav',
                    'container_class'=> 'main-navigation bg-white text-blue p-3 rounded-pill d-none d-lg-block',
                ) );
                ?>
                <button class="d-inline-block d-lg-none ms-4 text-center rounded-circle mobile-menu" type="button" aria-controls="mobile-menu" aria-expanded="false">
                    <i class="bi bi-list fs-5"></i>
                </button>
            </div>
        </div>
    </div>
</header>

<div id="mobile-menu" class="w-100 p-4 bg-white">
    <div class="w-100 d-flex justify-content-end pt-2 z-top">
        <button class="mobile-menu-close text-center rounded-circle mobile-menu" type="button">
            <i class="bi bi-x fs-5"></i>
        </button>
    </div>
    <?php
    wp_nav_menu( array(
        'theme_location' => 'footer_1',
        'menu_id'        => 'mobile-menu-items',
        'menu_class'     => 'mt-5 ps-0 d-flex flex-column align-items-center',
        'container'      => 'nav',
        'container_class'=> 'mobile-navigation z-top',
    ) );
    ?>
</div>