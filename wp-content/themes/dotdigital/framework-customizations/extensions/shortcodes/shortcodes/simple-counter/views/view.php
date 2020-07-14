<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var $atts
 */
if ( ! $atts['counters'] ) {
	return;
}

?>
<div class="shortcode-simple-counter <?php echo esc_attr( $atts['custom_class'] ); ?>">
	<?php foreach ( $atts['counters'] as $counter ) :
		$unique_id = 'counter-' . uniqid();
		$box_icon  = ! empty( $counter['box_icon'] ) ? $counter['box_icon'] : '';

		$number                  = isset( $counter['number'] ) ? ( int ) $counter['number'] : false;
		$counter_additional_text = isset( $counter['counter_additional_text'] ) ? $counter['counter_additional_text'] : false;
		$after_text              = isset( $counter['after_text'] ) ? $counter['after_text'] : false;
		$speed                   = isset( $counter['speed'] ) ? $counter['speed'] : false;
        ?>
        <div id="<?php echo esc_attr( $unique_id ); ?>" class="counter_wrap">
			<?php if ( $box_icon != 'none' ): ?>
                <div class="counter_icon color-main">
					<?php echo dotdigital_get_icon_type_v2_html( $box_icon ); ?>
                </div>
			<?php endif; ?>
			<?php if ( $counter_additional_text ) : ?>
                <h2 class="counter counter-size" data-from="0" data-to="<?php echo esc_attr( $number ); ?>"
                    data-speed="<?php echo esc_attr( $speed ); ?>">0</h2>
                <h6 class="counter-text">
                    <span class="counter-add"><?php echo wp_kses_post( $counter_additional_text ); ?></span>
                </h6>
			<?php else : //no counter adds ?>
                <h6 class="counter" data-from="0" data-to="<?php echo esc_attr( $number ); ?>"
                    data-speed="<?php echo esc_attr( $speed ); ?>">0</h6>
				<?php if ( $after_text ) : ?>
                    <span class="counter-size">
                    <?php echo esc_html( $after_text ); ?>
                </span>
				<?php endif; ?>
			<?php endif; //$counter_additional_text ?>
        </div>
	<?php endforeach; ?>
</div>
