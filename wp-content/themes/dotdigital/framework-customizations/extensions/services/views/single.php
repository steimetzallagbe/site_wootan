<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */

get_header();
$pID = get_the_ID();

?>
	<div id="content" class="single-service">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<!-- .entry-header -->
				<div class="vertical-item">
					<div class="item-content entry-content">
						<?php
						the_content();
						?>
					</div>
					<!-- .entry-content -->
				</div>
				<!-- .entry-content -->
			</article><!-- #post-## -->
		<?php endwhile; ?>
	</div><!--eof #content -->
<?php
get_footer();