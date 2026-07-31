<?php
/**
 * Main template file.
 *
 * @package Cleland_Theme
 */

get_header();
?>

  <main class="site-main flex-grow-1 align-content-center">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="container-fluid bg-grad text-white">
      <div class="container pb-5">
        <div class="row pt-5 justify-content-center">
          <div class="col-lg-7 text-center mt-5">
            <h1 class="mt-5">
              Oops... Something has gone wrong!
            </h1>
          </div>
        </div>
      </div>
    </header>

    <div class="container py-3 py-md-5">
      <div class="row justify-content-center">
        <div class="col-lg-7 text-center">
          <h2>404 Error</h2>
          <p>The page you're looking for can't be found. It may have been moved, updated, or removed.</p>
          <p>Please return <a href="<?php echo esc_url( home_url( '/' ) ); ?>">home</a>
        </div>
      </div>
    </div>

    </article>
  </main>


<?php
get_footer();
