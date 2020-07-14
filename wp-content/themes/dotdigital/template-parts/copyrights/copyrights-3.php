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
<section class="<?php echo esc_attr(!empty($copyrights_colors) ? $copyrights_colors : 'cs' ); ?> page_copyright copyright_3 section_padding_10" <?php echo !empty( $footer_image['url'] ) ? ' style="background-image: url('. esc_url( $footer_image['url']) .')"' : ' ' ?>>
    <h3 class="hidden"><?php echo esc_html__('Page Copyright', 'dotdigital'); ?></h3>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8 text-center text-md-left darkgrey">
                <p><?php echo wp_kses_post( function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'copyrights_text' ) : esc_html__( 'Powered by WordPress', 'dotdigital' ) ); ?></p>
            </div>

	        <?php
	        $footer_social_icons = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'footer_social_icons' ) : '';
	        if ( ! empty( $footer_social_icons ) ) : ?>
                <div class="col-xs-12 col-md-4 text-center text-md-right">
                    <span class="social-icons">
                        <?php
                        if ( is_array( $footer_social_icons ) ) {
                            foreach ( $footer_social_icons as $icon ) :
                                ?>
                                <a href="<?php echo esc_url( $icon['icon_url'] ) ?>"
                                   class="<?php echo esc_attr( $icon['icon'] ); ?> <?php echo esc_attr( $icon['icon_class'] ); ?>" target="_blank"></a>
                            <?php
                            endforeach;
                        }
                        ?>
                    </span>
                </div><!-- eof social icons -->
	        <?php endif; //social icons ?>
        </div>
    </div>
</section><!-- .copyrights -->