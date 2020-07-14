<?php
/**
 * The template part for before-footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$footer_image   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'footer_image' ) : ' ';
$footer_colors   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'footer_colors' ) : ' ';

?>
<?php if( is_active_sidebar('sidebar-1-footer-alt') || is_active_sidebar('sidebar-2-footer-alt') || is_active_sidebar('sidebar-3-footer-alt') ) :?>
    <section id="before-footer" class="page_footer before-footer section_padding_top_50 section_padding_bottom_50 columns_padding_25 <?php echo esc_attr(!empty($footer_colors) ? $footer_colors : 'ds' ); ?>"  <?php echo !empty( $footer_image['url'] ) ? ' style="background-image: url('. esc_url( $footer_image['url']) .')"' : ' ' ?>>
        <div class="container">

            <div class="row center-footer-column">
                <div class="col-xs-12  to_animate" data-animation="fadeInUp">
			        <?php dynamic_sidebar( 'before-footer' ); ?>
                </div>
            </div>

        </div>
    </section><!-- .page_footer -->
<?php endif; ?>