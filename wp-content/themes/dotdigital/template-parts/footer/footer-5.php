<?php
/**
 * The template part for selected footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$footer_image   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'footer_image' ) : ' ';
$footer_colors   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'footer_colors' ) : ' ';
?>
<?php if( is_active_sidebar('sidebar-1-footer-alt') || is_active_sidebar('sidebar-2-footer-alt') || is_active_sidebar('sidebar-3-footer-alt') ) :?>
    <footer id="footer" class="page_footer section_padding_top_100 section_padding_bottom_150 columns_padding_25 <?php echo esc_attr(!empty($footer_colors) ? $footer_colors : 'ds' ); ?>"  <?php echo !empty( $footer_image['url'] ) ? ' style="background-image: url('. esc_url( $footer_image['url']) .')"' : ' ' ?>>
        <div class="container">

            <div class="row center-footer-column">
                <div class="col-xs-12 col-md-3 text-center to_animate" data-animation="fadeInUp">
			        <?php dynamic_sidebar( 'sidebar-1-footer-alt' ); ?>
                </div>
                <div class="col-xs-12 col-md-3 text-center to_animate" data-animation="fadeInUp">
			        <?php dynamic_sidebar( 'sidebar-2-footer-alt' ); ?>
                </div>
                <div class="col-xs-12 col-md-3 text-center to_animate" data-animation="fadeInUp">
			        <?php dynamic_sidebar( 'sidebar-3-footer-alt' ); ?>
                </div>
            </div>

        </div>
    </footer><!-- .page_footer -->
<?php endif; ?>