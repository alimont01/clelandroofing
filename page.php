<?php
/**
 * Page template.
 *
 * @package Cleland_Theme
 */

get_header();
?>

<main class="site-main">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/banner' ); ?>

				<?php get_template_part( 'template-parts/flexible-page-content' ); ?>

			<?php endwhile; ?>
		<?php else : ?>
			<div class="container text-white mt-5 fadein-content">
				<div class="row">
					<div class="col-12 text-center">
						<p><?php esc_html_e( 'No content found.', 'buzzqube_theme' ); ?></p>
					</div>
				</div>
			</div>
		<?php endif; ?>

	</article>
</main>

<?php
get_footer();