<?php
/**
 * The template part for selected copyrights section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$footer_image   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'footer_image' ) : ' ';
$copyrights_colors   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'copyrights_colors' ) : '';

?>
<section class="<?php echo esc_attr(!empty($copyrights_colors) ? $copyrights_colors : 'cs' ); ?> page_copyright section_padding_15" <?php echo !empty( $footer_image['url'] ) ? ' style="background-image: url('. esc_url( $footer_image['url']) .')"' : ' ' ?>>
    <h3 class="hidden"><?php echo esc_html__('Page Copyright', 'dotdigital'); ?></h3>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 text-center">
                <p><?php echo wp_kses_post( function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'copyrights_text' ) : esc_html__( 'Powered by WordPress', 'dotdigital' ) ); ?></p>
            </div>
        </div>
    </div>
</section><!-- .copyrights -->