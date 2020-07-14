<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}
/**
 * The template for displaying services taxonomy
 */
get_header();


$column_classes = dotdigital_get_columns_classes(true);
$unique_id = uniqid();
?>
    <div id="content" class="services-grid <?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
        <?php if ( have_posts() ) : ?>
            <div class="isotope_container isotope row masonry-layout columns_margin_bottom_20">
                <?php
                while ( have_posts() ) : the_post();
                    ?>
                        <div class="isotope-item topmargin_10 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <?php  include( fw()->extensions->get( 'services' )->locate_view_path( 'loop-item' ) ); ?>
                        </div>
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