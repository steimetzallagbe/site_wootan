<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'title'         => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title', 'dotdigital' ),
		'desc'  => esc_html__( 'This can be left blank', 'dotdigital' )
	),
	'sub_title'       => array(
		'type'  => 'text',
		'label' => esc_html__( 'Subtitle', 'dotdigital' ),
	),
	'image' => array(
		'type'        => 'upload',
		'value'       => '',
		'label'       => esc_html__( 'Image', 'dotdigital' ),
		'image'       => esc_html__( 'Signature Image', 'dotdigital' ),
		'images_only' => true,
	),
	'item_type'       => array(
		'label'   => esc_html__( 'Signature Style', 'dotdigital' ),
		'type'    => 'select',
		'value'       => '',
		'choices' => array(
			''  => esc_html__( 'Style 1', 'dotdigital' ),
			'style2'  => esc_html__( 'Style 2', 'dotdigital' ),
		)
	),
);