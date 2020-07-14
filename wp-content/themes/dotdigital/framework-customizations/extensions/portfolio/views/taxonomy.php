<?php
/**
 * The template for displaying portfolio taxonomy
 */
get_header();
//no columns on single gallery page - giving true as a parameter to get column classes function
$column_classes = dotdigital_get_columns_classes(true);

//getting query object
$queried_object = get_queried_object();

$atts = fw_get_db_term_option( $queried_object->term_taxonomy_id, $queried_object->taxonomy );

//processing GET for changing layout options via GET parameter
//layout: carousel isotope
//item_layout: item-regular item-title item-extended
    if ( isset( $_GET['layout'] ) )        { $atts['layout'] = esc_url ( $_GET['layout'] ); }
    if ( isset( $_GET['item_layout'] ) )   { $atts['item_layout'] = esc_url ( $_GET['item_layout'] ); }
    if ( isset( $_GET['full_width'] ) )    { $atts['full_width'] = (boolean) $_GET['full_width']; }
    if ( isset( $_GET['margin'] ) )        { $atts['margin'] = (int) $_GET['margin']; }
    if ( isset( $_GET['responsive_lg'] ) ) { $atts['responsive_lg'] = (int) $_GET['responsive_lg']; }
    if ( isset( $_GET['responsive_md'] ) ) { $atts['responsive_md'] = (int) $_GET['responsive_md']; }
    if ( isset( $_GET['responsive_sm'] ) ) { $atts['responsive_sm'] = (int) $_GET['responsive_sm']; }
    if ( isset( $_GET['responsive_xs'] ) ) { $atts['responsive_xs'] = (int) $_GET['responsive_xs']; }
    if ( isset( $_GET['show_filters'] ) )  { $atts['show_filters'] = (boolean) $_GET['show_filters']; }

//closing main section if full width gallery option enabled
if ( $atts['full_width'] ) :

	//light or dark version
	$version = function_exists('fw_get_db_customizer_option') ? fw_get_db_customizer_option('version') : 'light';
	$main_section_class = ( $version !== 'light' ) ? 'ds ms' : 'ls';

?>
		</div><!-- eof .row -->
	</div><!-- eof .container -->
</section><!-- eof main section -->
<!-- reopen main section with fluid container -->
<section class="<?php echo esc_attr( $main_section_class ); ?> page_portfolio section_padding_top_150 section_padding_bottom_150 gallery_fluid_section">
	<div class="container-fluid">
		<div class="row">
<?php endif; ?>
	<div id="content" class="content-wrap <?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
		<?php if ( have_posts() ) :

			include( fw()->extensions->get( 'portfolio' )->locate_view_path( esc_attr( $atts['layout'] ) ) );

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