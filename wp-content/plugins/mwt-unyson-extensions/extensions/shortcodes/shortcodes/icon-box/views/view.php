<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */
$unique_id = 'box-'. $atts['unique_id'];

$box_type = !empty( $atts['box_type'] ) ? $atts['box_type'] : '';
$box_icon = !empty( $atts['box_icon'] ) ? $atts['box_icon'] : '';
$block_item = !empty( $atts['block_item'] ) ? $atts['block_item'] : '';

//common box properties for all box types
$title   = !empty( $atts['title'] ) ? $atts['title'] : '';
$link    = !empty( $atts['link'] ) ? $atts['link'] : '';
$icon_type    = !empty( $atts['icon_type'] ) ? $atts['icon_type'] : '';
$content = !empty( $atts['content'] ) ? $atts['content'] : '';
$custom_class = !empty( $atts['custom_class'] ) ? $atts['custom_class'] : '';

?>
<div id="<?php echo esc_attr( $unique_id ); ?>" class="icon-box <?php echo esc_attr( $box_type.' '.$icon_type.' '.$block_item ); ?> <?php echo esc_attr( $custom_class ); ?>">
	<?php	if ( $box_icon['type'] != 'none'  ): ?>
        <div class="box_icon color-main">
            <?php echo dotdigital_get_icon_type_v2_html( $box_icon ); ?>
        </div>
	<?php endif; ?>
    <div class="box-wrap">
        <?php if ( $title ): ?>
            <h5 class="box-heading">
                <?php if ( $link ): ?>
                <a href="<?php echo esc_url( $link ); ?>">
                    <?php endif; //$link ?>
                    <?php echo wp_kses_post( $title ); ?>
                    <?php if ( $link ): ?>
                </a>
            <?php endif; //$link ?>
            </h5>
        <?php endif; //$title
        ?>
        <?php if ( $content ) : ?>
            <div class="box-content">
                <?php echo wp_kses_post( $content ); ?>
            </div>
        <?php endif; //$content
        ?>
    </div>

</div>
