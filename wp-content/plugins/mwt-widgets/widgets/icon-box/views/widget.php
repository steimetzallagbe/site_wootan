<?php if ( ! defined( 'ABSPATH' ) ) {
	die();
}
if ( defined( 'FW' ) ) {
	/**
	 * @var string $before_widget
	 * @var string $after_widget
	 * @var array $params
	 */
    $box_type = !empty( $params['box_type'] ) ? $params['box_type'] : '';
    $box_icon = !empty( $params['box_icon'] ) ? $params['box_icon'] : '';
    $block_item = !empty( $params['block_item'] ) ? $params['block_item'] : '';

//common box properties for all box types
    $title   = !empty( $params['title_box'] ) ? $params['title_box'] : '';
    $link    = !empty( $params['link'] ) ? $params['link'] : '';
    $icon_type    = !empty( $params['icon_type'] ) ? $params['icon_type'] : '';
    $content = !empty( $params['content'] ) ? $params['content'] : '';
    $custom_class = !empty( $params['custom_class'] ) ? $params['custom_class'] : '';
	$unique_id = uniqid();
	echo wp_kses_post( $before_widget );
	if ( !empty ( $params['title'] ) ) {
		echo wp_kses_post( $before_title . $params['title'] . $after_title );
	}
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
	<?php echo wp_kses_post( $after_widget );
}