<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/***
 * @var $map_data_attr
 * @var $atts
 * @var $content
 * @var $tag
 */
if ( ! isset( $atts['map_pin'] ) || empty( $atts['map_pin'] ) ) {
	$map_data_attr['data-map-pin'] = json_encode( array( 'url' => dotdigital_include_file_from_child( '/img/map-pin.png' ) ) );
}
?>

<div class="wrap-map fw-map" <?php echo fw_attr_to_html( $map_data_attr ); ?>>
    <div class="fw-map-canvas map"></div>
</div>