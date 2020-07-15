<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */
$unique_id = 'box-'. $atts['unique_id'];

$box_icon = !empty( $atts['box_icon'] ) ? $atts['box_icon'] : '';

//common box properties for all box types
$title   = !empty( $atts['title'] ) ? $atts['title'] : '';
$link    = !empty( $atts['link'] ) ? $atts['link'] : '';

$content = !empty( $atts['content'] ) ? $atts['content'] : '';
$custom_class = !empty( $atts['custom_class'] ) ? $atts['custom_class'] : '';

?>
<div id="<?php echo esc_attr( $unique_id ); ?>" class="icon-box-2 text-center with_background with_padding <?php echo esc_attr( $custom_class ); ?>">
	<?php	if ( $box_icon['type'] != 'none'  ): ?>
        <div class="box_icon color-main">
            <?php echo dotdigital_get_icon_type_v2_html( $box_icon ); ?>
        </div>
	<?php endif; ?>
    <div class="box-wrap">
        <?php if ( $title ): ?>
            <h5 class="box-heading">
                <?php echo wp_kses_post( $title ); ?>
            </h5>
        <?php endif; //$title ?>
        <?php if ( $content ) : ?>
            <div class="box-content">
                <?php echo wp_kses_post( $content ); ?>
            </div>
            <div class="box-btn">
		        <?php
		        echo fw_ext( 'shortcodes' )->get_shortcode( 'button' )->render( $atts['button'] );
		        ?>
            </div>
        <?php endif; //$content
        ?>
    </div>

</div>
