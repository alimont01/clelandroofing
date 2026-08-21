<?php
/**
 * Theme functions.
 *
 * @package Cleland_Theme
 */

/**
 * Set up theme supports.
 */
function Cleland_Theme_setup() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'news-post', 680, 420,  array( 'center', 'center' ) );
  register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'Cleland_Theme' ),
		'footer_1'  => __( 'Footer Menu 1', 'Cleland_Theme' ),
		'footer_2'  => __( 'Footer Menu 2', 'Cleland_Theme' ),
	) );
}
add_action( 'after_setup_theme', 'Cleland_Theme_setup' );

function Cleland_Theme_enqueue_assets() {
  $theme_uri = get_template_directory_uri();
  $theme_dir = get_template_directory();
  $main_css_version = file_exists( $theme_dir . '/assets/css/main.css' ) ? filemtime( $theme_dir . '/assets/css/main.css' ) : '1.0.0';
  $main_js_version  = file_exists( $theme_dir . '/assets/js/main.js' ) ? filemtime( $theme_dir . '/assets/js/main.js' ) : '1.0.0';

  $main_style_deps  = array( 'Cleland_Theme-fonts' );
  $main_script_deps = array();

  wp_enqueue_style(
    'Cleland_Theme-fonts',
    'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap',
    array(),
    null
  );

  if ( file_exists( $theme_dir . '/assets/css/bootstrap.min.css' ) ) {
    wp_enqueue_style(
      'Cleland_Theme-bootstrap',
      $theme_uri . '/assets/css/bootstrap.min.css',
      array(),
      '5.3.8'
    );
    $main_style_deps[] = 'Cleland_Theme-bootstrap';
  }

  wp_enqueue_style(
    'Cleland_Theme-main',
    $theme_uri . '/assets/css/main.css',
    $main_style_deps,
    $main_css_version
  );

  wp_enqueue_style(
    'Swiper-css',
    'https://cdn.jsdelivr.net/npm/swiper@14.0.1/swiper-bundle.min.css'
  );


  wp_enqueue_script(
    'Swiper-JS',
    'https://cdn.jsdelivr.net/npm/swiper@14.0.1/swiper-bundle.min.js'
  );

  if ( file_exists( $theme_dir . '/assets/js/bootstrap.bundle.min.js' ) ) {
    wp_enqueue_script(
      'Cleland_Theme-bootstrap',
      $theme_uri . '/assets/js/bootstrap.bundle.min.js',
      array(),
      '5.3.8',
      true
    );
    $main_script_deps[] = 'Cleland_Theme-bootstrap';
  }

  wp_enqueue_script(
    'Cleland_Theme-main',
    $theme_uri . '/assets/js/main.js',
    $main_script_deps,
    $main_js_version,
    true
  );

  wp_enqueue_style(
		'bootstrap-icons',
		'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css'
	);

  wp_enqueue_script(
        'gallery-modal',
        get_stylesheet_directory_uri() . '/assets/js/gallery-modal.js',
        array(),
        null,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'Cleland_Theme_enqueue_assets' );

/**
 * Add preconnect hints for Google Fonts.
 */
function Cleland_Theme_font_resource_hints( $urls, $relation_type ) {
  if ( 'preconnect' !== $relation_type ) {
    return $urls;
  }

  $urls[] = 'https://fonts.googleapis.com';
  $urls[] = array(
    'href'        => 'https://fonts.gstatic.com',
    'crossorigin' => 'anonymous',
  );

  return $urls;
}
add_filter( 'wp_resource_hints', 'Cleland_Theme_font_resource_hints', 10, 2 );

/**
 * Lock plugin/theme file modifications outside local environments.
 */
function Cleland_Theme_restrict_file_modifications( $file_mod_allowed, $context ) {
  if ( 'local' === wp_get_environment_type() ) {
    return $file_mod_allowed;
  }

  $blocked_contexts = array(
    'install-plugin',
    'upload-plugin',
    'update-plugin',
    'install-theme',
    'upload-theme',
    'update-theme',
  );

  if ( in_array( $context, $blocked_contexts, true ) ) {
    return false;
  }

  return $file_mod_allowed;
}
add_filter( 'file_mod_allowed', 'Cleland_Theme_restrict_file_modifications', 10, 2 );

if ( 'local' !== wp_get_environment_type() ) {
  if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
    define( 'DISALLOW_FILE_EDIT', true );
  }

  add_filter( 'auto_update_plugin', '__return_false' );
  add_filter( 'auto_update_theme', '__return_false' );
}


/**
 * Hide ACF admin menu outside local environments.

function Cleland_Theme_hide_acf_admin_menu() {
  if ( 'local' === wp_get_environment_type() ) {
    return;
  }

  remove_menu_page( 'edit.php?post_type=acf-field-group' );
}

add_action( 'admin_menu', 'Cleland_Theme_hide_acf_admin_menu', 999 );
 */


/**
 * Disable WordPress emoji scripts/styles and related filters.
 */
function Cleland_Theme_disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );

  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );

  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

  add_filter( 'tiny_mce_plugins', 'Cleland_Theme_disable_emojis_tinymce' );
  add_filter( 'emoji_svg_url', '__return_false' );
}
add_action( 'init', 'Cleland_Theme_disable_emojis' );

/**
 * Remove emoji plugin from TinyMCE.
 *
 * @param array|string $plugins TinyMCE plugins.
 * @return array
 */
function Cleland_Theme_disable_emojis_tinymce( $plugins ) {
  if ( ! is_array( $plugins ) ) {
    return array();
  }

  return array_diff( $plugins, array( 'wpemoji' ) );
}

/**
 * Remove emoji CDN from DNS prefetch hints.
 *
 * @param array  $urls Resource hints.
 * @param string $relation_type Hint relation type.
 * @return array
 */
function Cleland_Theme_disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
  if ( 'dns-prefetch' !== $relation_type ) {
    return $urls;
  }

  $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

  return array_diff( $urls, array( $emoji_svg_url ) );
}
add_filter( 'wp_resource_hints', 'Cleland_Theme_disable_emojis_remove_dns_prefetch', 10, 2 );

/**
 * Remove WordPress version output in head and feeds.
 */
function Cleland_Theme_remove_wp_version_output() {
  remove_action( 'wp_head', 'wp_generator' );
}
add_action( 'init', 'Cleland_Theme_remove_wp_version_output' );
add_filter( 'the_generator', '__return_empty_string' );

/**
 * Strip core WordPress version query args from asset URLs.
 *
 * Keeps custom version values (for cache busting), and only removes
 * the `ver` value when it matches the running WordPress core version.
 *
 * @param string $src Enqueued script/style URL.
 * @return string
 */
function Cleland_Theme_strip_wp_version_from_asset_url( $src ) {
  if ( empty( $src ) ) {
    return $src;
  }

  $wp_version = get_bloginfo( 'version' );
  $asset_ver  = wp_parse_url( $src, PHP_URL_QUERY );

  if ( ! $asset_ver ) {
    return $src;
  }

  parse_str( $asset_ver, $query_args );

  if ( isset( $query_args['ver'] ) && $query_args['ver'] === $wp_version ) {
    return remove_query_arg( 'ver', $src );
  }

  return $src;
}
add_filter( 'style_loader_src', 'Cleland_Theme_strip_wp_version_from_asset_url', 9999 );
add_filter( 'script_loader_src', 'Cleland_Theme_strip_wp_version_from_asset_url', 9999 );

/**
 * Remove block editor frontend CSS when blocks are not used.
 */
function Cleland_Theme_remove_block_editor_frontend_assets() {
  if ( is_admin() ) {
    return;
  }

  wp_dequeue_style( 'wp-block-library' );
  wp_deregister_style( 'wp-block-library' );

  wp_dequeue_style( 'wp-block-library-theme' );
  wp_deregister_style( 'wp-block-library-theme' );

  wp_dequeue_style( 'classic-theme-styles' );
  wp_deregister_style( 'classic-theme-styles' );

  wp_dequeue_style( 'global-styles' );
  wp_deregister_style( 'global-styles' );
}
add_action( 'wp_enqueue_scripts', 'Cleland_Theme_remove_block_editor_frontend_assets', 100 );

/**
 * Disable block editor and block-based widgets.
 */
add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );
add_filter( 'use_widgets_block_editor', '__return_false' );

/**
 * Remove block theme supports we do not use.
 */
function Cleland_Theme_disable_block_theme_supports() {
  remove_theme_support( 'core-block-patterns' );
  remove_theme_support( 'wp-block-styles' );
}
add_action( 'after_setup_theme', 'Cleland_Theme_disable_block_theme_supports', 100 );

/**
 * Prevent inline global SVG filter CSS from being printed.
 */
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

/**
 * Hard-disable global styles output if re-enqueued by core/plugins.
 */
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );



/**
 * Register Services Custom Post Type
 */
function amb_register_services_cpt() {

    $labels = array(
        'name'                  => _x( 'Services', 'Post Type General Name', 'textdomain' ),
        'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'textdomain' ),
        'menu_name'             => __( 'Services', 'textdomain' ),
        'name_admin_bar'        => __( 'Service', 'textdomain' ),
        'archives'              => __( 'Service Archives', 'textdomain' ),
        'attributes'            => __( 'Service Attributes', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Service:', 'textdomain' ),
        'all_items'             => __( 'All Services', 'textdomain' ),
        'add_new_item'          => __( 'Add New Service', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'new_item'              => __( 'New Service', 'textdomain' ),
        'edit_item'             => __( 'Edit Service', 'textdomain' ),
        'update_item'           => __( 'Update Service', 'textdomain' ),
        'view_item'             => __( 'View Service', 'textdomain' ),
        'view_items'            => __( 'View Services', 'textdomain' ),
        'search_items'          => __( 'Search Services', 'textdomain' ),
        'not_found'             => __( 'No services found', 'textdomain' ),
        'not_found_in_trash'    => __( 'No services found in Trash', 'textdomain' ),
        'featured_image'        => __( 'Service Image', 'textdomain' ),
        'set_featured_image'    => __( 'Set service image', 'textdomain' ),
        'remove_featured_image' => __( 'Remove service image', 'textdomain' ),
        'use_featured_image'    => __( 'Use as service image', 'textdomain' ),
    );

    $args = array(
        'label'                 => __( 'Service', 'textdomain' ),
        'description'           => __( 'Joinery and home improvement services.', 'textdomain' ),
        'labels'                => $labels,
        'supports'              => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions',
            'page-attributes',
        ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-hammer',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => array(
            'slug'       => 'services',
            'with_front' => false,
        ),
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );

    register_post_type( 'service', $args );
}
add_action( 'init', 'amb_register_services_cpt' );


/**
 * Register Work Projects Custom Post Type
 */
function cleland_register_projects_cpt() {

	$labels = array(
		'name'                  => 'Projects',
		'singular_name'         => 'Project',
		'menu_name'             => 'Our Work',
		'name_admin_bar'        => 'Project',
		'add_new'               => 'Add New',
		'add_new_item'          => 'Add New Project',
		'new_item'              => 'New Project',
		'edit_item'             => 'Edit Project',
		'view_item'             => 'View Project',
		'all_items'             => 'All Projects',
		'search_items'          => 'Search Projects',
		'not_found'             => 'No projects found.',
		'not_found_in_trash'    => 'No projects found in Trash.',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug'       => 'our-work',
			'with_front' => false,
		),
		'capability_type'     => 'post',
		'has_archive'         => false,
		'hierarchical'        => false,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-admin-home',
		'supports'            => array(
			'title',
			'thumbnail',
		),
	);

	register_post_type( 'project', $args );
}
add_action( 'init', 'cleland_register_projects_cpt' );

/**
 * Register Project Type taxonomy
 */
function cleland_register_project_type_taxonomy() {

	$labels = array(
		'name'              => 'Project Types',
		'singular_name'     => 'Project Type',
		'search_items'      => 'Search Project Types',
		'all_items'         => 'All Project Types',
		'parent_item'       => 'Parent Project Type',
		'parent_item_colon' => 'Parent Project Type:',
		'edit_item'         => 'Edit Project Type',
		'update_item'       => 'Update Project Type',
		'add_new_item'      => 'Add New Project Type',
		'new_item_name'     => 'New Project Type Name',
		'menu_name'         => 'Project Types',
	);

	$args = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_rest'      => true,
		'query_var'         => true,
		'rewrite'           => array(
			'slug' => 'project-type',
		),
	);

	register_taxonomy(
		'project_type',
		array( 'project' ),
		$args
	);

}
add_action( 'init', 'cleland_register_project_type_taxonomy' );