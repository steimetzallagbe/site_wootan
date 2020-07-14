<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

if ( empty( $atts['image'] ) ) {
	return;
}

/** Responsive Visibility **/
$extra_class = '';
// large
if( isset($atts['responsive']['hidden_lg']['selected']) && $atts['responsive']['hidden_lg']['selected'] == 'no' ) {
	$extra_class .= 'hidden-lg ';
}
// desktop
if( isset($atts['responsive']['hidden_md']['selected']) && $atts['responsive']['hidden_md']['selected'] == 'no' ) {
	$extra_class .= 'hidden-md ';
}
// tablet devices
if( isset($atts['responsive']['hidden_sm']['selected']) && $atts['responsive']['hidden_sm']['selected'] == 'no' ) {
	$extra_class .= 'hidden-sm ';
}
// small devices
if( isset($atts['responsive']['hidden_xs']['selected']) && $atts['responsive']['hidden_xs']['selected'] == 'no' ) {
	$extra_class .= 'hidden-xs ';
}

/* Add custom class */
if( $atts['custom_class'] ) {
	$extra_class .=  $atts['custom_class'].' ';
}

$width  = ( is_numeric( $atts['width'] ) && ( $atts['width'] > 0 ) ) ? $atts['width'] : '';
$height = ( is_numeric( $atts['height'] ) && ( $atts['height'] > 0 ) ) ? $atts['height'] : '';

if ( ! empty( $width ) && ! empty( $height ) ) {
	$image = fw_resize( $atts['image']['attachment_id'], $width, $height, true );
} else {
	$image = $atts['image']['url'];
}

$alt = get_post_meta($atts['image']['attachment_id'], '_wp_attachment_image_alt', true);

$img_attributes = array(
	'src' => $image,
	'alt' => $alt ? $alt : $image
);

if(!empty($width)){
	$img_attributes['width'] = $width;
}

if(!empty($height)){
	$img_attributes['height'] = $height;
}

if(!empty($extra_class)){
	$img_attributes['class'] = $extra_class;
}

if ( empty( $atts['link'] ) ) {
	echo '<div class="img-wrap">';
	echo fw_html_tag('img', $img_attributes);
	echo '</div>';
} else {
	echo '<div class="img-wrap">';
	echo fw_html_tag('a', array(
		'href' => $atts['link'],
		'target' => $atts['target'],
	), fw_html_tag('img',$img_attributes));
	echo '</div>';
}
