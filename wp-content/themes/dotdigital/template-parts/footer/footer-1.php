<?php
/**
 * The template part for selected footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$footer_image   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'footer_image' ) : ' ';
$footer_colors   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'footer_colors' ) : 'ds';
?>
<?php if( is_active_sidebar('sidebar-footer-1') ) :?>
    <footer id="footer" class="page_footer section_padding_top_50 section_padding_bottom_65 columns_padding_25 <?php echo esc_attr(!empty($footer_colors) ? $footer_colors : 'ds' ); ?>" <?php echo !empty( $footer_image['url'] ) ? ' style="background-image: url('. esc_url( $footer_image['url']) .')"' : ' ' ?>>
        <div class="left_part" <?php echo !empty( $footer_image['url'] ) ? ' style="background-image: url('. esc_url( $footer_image['url']) .')"' : ' ' ?>></div>
        <div class="right_part" <?php echo !empty( $footer_image['url'] ) ? ' style="background-image: url('. esc_url( $footer_image['url']) .')"' : ' ' ?>></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-md-8 col-md-offset-2 text-center to_animate" data-animation="fadeInUp">
				    <?php dynamic_sidebar( 'sidebar-footer-1' ); ?>
                </div>
            </div>
        </div>
    </footer><!-- .page_footer -->
<?php endif; ?>