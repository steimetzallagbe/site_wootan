<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * The template for displaying services taxonomy
 */
get_header();

//get taxonomy settings
$queried_object = get_queried_object();
$atts           = fw_get_db_term_option( $queried_object->term_taxonomy_id, $queried_object->taxonomy );
$layout         = !empty($atts['services_layout']) ? $atts['services_layout'] : '';
$column_classes = dotdigital_get_columns_classes(true);
$unique_id = uniqid();
?>
	<div id="content" class="services-grid <?php echo esc_attr( $column_classes['main_column_class'].' '.$layout ); ?>">
		<?php if ( have_posts() ) : ?>
			<div class="isotope_container isotope row masonry-layout columns_margin_bottom_20">
				<?php
				while ( have_posts() ) : the_post();
					?>
					<?php if ( $atts['services_layout'] == 'layout-1' || empty($atts['services_layout']) ) : ?>
						<div class="isotope-item topmargin_10 col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<?php  include( fw()->extensions->get( 'services' )->locate_view_path( 'loop-item' ) ); ?>
						</div>
					<?php  elseif ( $atts['services_layout'] == 'layout-2') : ?>
						<div class="isotope-item topmargin_10 col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<?php  include( fw()->extensions->get( 'services' )->locate_view_path( 'loop-item2' ) ); ?>
						</div>
					<?php elseif ( $atts['services_layout'] == 'layout-3') : ?>
						<div class="isotope-item topmargin_10 col-sm-6 col-xs-12">
							<?php include( fw()->extensions->get( 'services' )->locate_view_path( 'loop-item3' ) ); ?>
						</div>
					<?php elseif ( $atts['services_layout'] == 'layout-4') : ?>
                        <div class="isotope-item topmargin_10 col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<?php  include( fw()->extensions->get( 'services' )->locate_view_path( 'loop-item' ) ); ?>
                        </div>
					<?php endif;?>
				<?php endwhile; ?>
			</div><!-- eof services -->
		<?php
		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
		<?php // Previous/next page navigation.
		dotdigital_paging_nav();
		?>
	</div><!--eof #content -->

<?php if( $column_classes['sidebar_class'] ):	?>
	<!-- main aside sidebar -->
	<aside class="<?php echo esc_attr( $column_classes['sidebar_class'] ); ?>">
		<?php get_sidebar(); ?>
	</aside>
	<!-- eof main aside sidebar -->
<?php
endif;
get_footer();