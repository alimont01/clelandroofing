<?php
/**
 * Main template file.
 *
 * @package Cleland_Theme
 */

get_header();
?>

<main class="site-main">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
          <div class="container text-white mt-5 fadein-content">
            <div class="row">
              <div class="col-lg-5">
                <h1 class="fs-1 mb-4 sticky-top">
                  <?php the_title(); ?>
                </h1>
              </div>
              <div class="col-lg-7">
                <?php the_content(); ?>
              </div>
            </div>
          </div>
      <?php endwhile; ?>
      <?php else : ?>
            <div class="container text-white mt-5 fadein-content">
              <div class="row">
                <div class="col-12 text-center">
                  <p><?php esc_html_e( 'No content found.', 'area52-theme' ); ?></p>
                </div>
              </div>
            </div>
      <?php endif; ?>
  </article>
</main>

<?php
get_footer();
