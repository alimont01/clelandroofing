<?php
// Decide which post/page to read flexible content from.
$post_id = get_the_ID();

// If we're on the blog posts index and a Posts page is set, use that page ID.
if ( is_home() && ! is_front_page() ) {
	$posts_page_id = (int) get_option( 'page_for_posts' );
	if ( $posts_page_id ) {
		$post_id = $posts_page_id;
	}
}
?>

<?php if ( have_rows( 'flexible_page_content', $post_id ) ) : ?>
	<?php while ( have_rows( 'flexible_page_content', $post_id ) ) : the_row(); ?>
		<?php if ( get_row_layout() == 'centered_text' ) : ?>
			<?php get_template_part( 'template-parts/flexi-blocks/text-block' ); ?>
		<?php elseif ( get_row_layout() == 'three_column_layout' ) : ?>
			<?php get_template_part( 'template-parts/flexi-blocks/three-column' ); ?>
		<?php elseif ( get_row_layout() == 'call_to_action_block' ) : ?>
			<?php get_template_part( 'template-parts/flexi-blocks/call-to-action' ); ?>
		<?php elseif ( get_row_layout() == 'services_block' ) : ?>
			<?php get_template_part( 'template-parts/flexi-blocks/service-list' ); ?>
		<?php elseif ( get_row_layout() == 'trust_banner' ) : ?>
			<?php get_template_part( 'template-parts/flexi-blocks/trust-banner' ); ?>
		<?php elseif ( get_row_layout() == 'recent_roofing_projects' ) : ?>
			<?php get_template_part( 'template-parts/flexi-blocks/recent-roofing-block' ); ?>
		<?php elseif ( get_row_layout() == 'full_width_image' ) : ?>
			<?php get_template_part( 'template-parts/flexi-blocks/image-full-width' ); ?>
		<?php elseif ( get_row_layout() == 'image_gallery' ) : ?>
			<?php get_template_part( 'template-parts/flexi-blocks/image-gallery' ); ?>
		<?php elseif ( get_row_layout() == 'show_contact_details' ) : ?>
			<?php get_template_part( 'template-parts/flexi-blocks/contact-content' ); ?>
		<?php elseif ( get_row_layout() == 'show_careers_content' ) : ?>
			<?php get_template_part( 'template-parts/flexi-blocks/careers-content' ); ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>
