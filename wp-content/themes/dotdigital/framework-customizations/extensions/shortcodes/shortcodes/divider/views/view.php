<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/** Responsive Visibility **/
$extra_class = '';
// large
if( isset($atts['responsive']['hidden_lg']['selected']) && $atts['responsive']['hidden_lg']['selected'] == 'no' ) {
	$extra_class .= ' hidden-lg';
}
// desktop
if( isset($atts['responsive']['hidden_md']['selected']) && $atts['responsive']['hidden_md']['selected'] == 'no' ) {
	$extra_class .= ' hidden-md';
}
// tablet devices
if( isset($atts['responsive']['hidden_sm']['selected']) && $atts['responsive']['hidden_sm']['selected'] == 'no' ) {
	$extra_class .= ' hidden-sm';
}
// small devices
if( isset($atts['responsive']['hidden_xs']['selected']) && $atts['responsive']['hidden_xs']['selected'] == 'no' ) {
	$extra_class .= ' hidden-xs';
}

if ( 'line' === $atts['style']['ruler_type'] ): ?>
	<div class="fw-divider-line"><hr/></div>
<?php endif; ?>

<?php if ( 'space' === $atts['style']['ruler_type'] ): ?>
	<div class="fw-divider-space <?php echo esc_attr( $extra_class ); ?>" style="margin-top: <?php echo (int) $atts['style']['space']['height']; ?>px;"></div>
<?php endif; ?>