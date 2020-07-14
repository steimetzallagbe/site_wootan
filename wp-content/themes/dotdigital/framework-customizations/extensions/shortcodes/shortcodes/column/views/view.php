<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$bg_image = '';
if ( ! empty( $atts['background_image'] ) && ! empty( $atts['background_image']['data']['icon'] ) ) {
	$bg_image = 'background-image:url(' . $atts['background_image']['data']['icon'] . ');';
}

/* Set column id */
if ( ! empty( $atts['column_id'] ) ) {
	$column_id = $atts['column_id'];
} else {
	$column_id = 'column-'. $atts['unique_id'];
}

$class = fw_ext_builder_get_item_width( 'page-builder', $atts['width'] . '/frontend_class' );

/* Use colum as slide (for fullpage slider) */
$class .= ( isset( $atts['use_as_slide'] ) && $atts['use_as_slide'] ) ? ' slide' : '';

$class .= ( ! empty( $atts['column_animation'] ) && $atts['column_animation'] ) ? ' to_animate' : '';
$class .= ( ! empty( $atts['column_align'] ) ) ? ' ' . $atts['column_align'] : '';
$class .= ( ! empty( $atts['background_color'] ) ) ? ' ' . $atts['background_color'] : '';
$class .= ( isset( $atts['background_cover'] ) && $atts['background_cover'] ) ? ' background_cover' : '';
$class .= ( isset( $atts['special_column'] ) && $atts['special_column'] ) ? ' ' . $atts['special_column'] : '';
$class .= ( isset( $atts['column_overlay'] ) && $atts['column_overlay'] ) ? ' column-overlay' : '';
$class .= ( isset( $atts['position_special_column'] ) && $atts['position_special_column'] ) ? ' ' . $atts['position_special_column'] : '';
$data_animation = ( ! empty( $atts['column_animation'] ) && $atts['column_animation'] ) ? 'data-animation="' . esc_attr( $atts['column_animation'] ) . '"' : '';

/* Add custom class */
if( $atts['custom_class'] ) {
	$class .= ' '. $atts['custom_class'];
}

?>
<div <?php echo ( !empty( $column_id )  ) ? ' id="' . esc_attr( $column_id ) . '"' : '' ;?> class="<?php echo esc_attr( $class ); ?> fw-column" <?php echo esc_attr( $bg_image ) ? 'style="' . esc_attr( $bg_image ) . '"' : ''; ?> <?php echo wp_kses_post( $data_animation ); ?>>
	<?php
	if ( ! empty( $atts['column_padding'] ) || ! empty( $atts['special_column'] ) ) :
	?>
    <div class="<?php echo esc_attr( $atts['column_padding'] . ' ' . $atts['position_special_column']); ?>">
		<?php endif; //column_padding
		//shoing column content
		echo do_shortcode( $content );
		if ( ! empty( $atts['column_padding'] ) || ! empty( $atts['special_column'] ) ) : //closing optional column_padding div
		?>
    </div>
<?php endif; ?>
</div>