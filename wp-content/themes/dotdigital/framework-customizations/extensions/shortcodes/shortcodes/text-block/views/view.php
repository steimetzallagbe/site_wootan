<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */
?>
<div class="text-block shortcode <?php echo esc_attr( $atts['text_custom_class'] ); ?>">
	<?php echo do_shortcode( $atts['text'] ); ?>
</div>
