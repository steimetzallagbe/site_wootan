<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * The template for displaying single service
 *
 */

get_header();
$pID = get_the_ID();

//no columns on single service page
$column_classes = fw_ext_extension_get_columns_classes( true );

//getting taxonomy name
$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$taxonomy_name = $ext_services_settings['taxonomy_name'];

?>
	<div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<!-- .entry-header -->
				<div class="vertical-item content-padding with_background">
					<?php the_post_thumbnail(); ?>
					<div class="item-content entry-content">
						<header class="entry-header">
							<?php the_title( '<h3 class="entry-title"><strong>', '</strong></h3>' ); ?>
							<div class="categories-links bottommargin_30 theme_buttons small_buttons color1">
								<?php
								echo get_the_term_list( $pID, $taxonomy_name, '', ' ', '' );
								?>
							</div>
						</header>
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
<?php if ( $column_classes['sidebar_class'] ): ?>
	<!-- main aside sidebar -->
	<aside class="<?php echo esc_attr( $column_classes['sidebar_class'] ); ?>">
		<?php get_sidebar(); ?>
	</aside>
	<!-- eof main aside sidebar -->
	<?php
endif;
get_footer();