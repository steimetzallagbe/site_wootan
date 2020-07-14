<?php
if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<a href="<?php echo esc_attr( $atts['link'] ) ?>" target="<?php echo esc_attr( $atts['target'] ) ?>"
   class="wide_button <?php echo esc_attr( $atts['type'] .' '. $atts['color'].' '. $atts['size']); ?>">
	<?php echo wp_kses( $atts['label'], dotdigital_kses_list() ); ?>
</a>
