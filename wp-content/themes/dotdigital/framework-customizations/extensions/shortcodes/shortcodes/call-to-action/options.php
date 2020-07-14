<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );

$options = array(
	'title'         => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title', 'dotdigital' ),
		'desc'  => esc_html__( 'This can be left blank', 'dotdigital' )
	),
	'message'       => array(
		'type'  => 'textarea',
		'label' => esc_html__( 'Content', 'dotdigital' ),
		'desc'  => esc_html__( 'Enter some content for this Info Box', 'dotdigital' )
	),
	'button' => array(
		'type'          => 'popup',
		'label'         => esc_html__( 'Button', 'dotdigital' ),
		'popup-title'   => esc_html__( 'Edit Button', 'dotdigital' ),
		'popup-options' => $button->get_options(),
	),
);