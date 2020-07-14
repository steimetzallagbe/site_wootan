<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$options = array(
	'unique_id'   => array(
		'type'   => 'unique',
		'length' => 7
	),
	'title'        => array(
		'type'  => 'text',
		'label' => esc_html__( 'Box Title', 'dotdigital' ),
	),
	'box_icon'       => array(
		'type'         => 'icon-v2',
		'label' => esc_html__( 'Box icon', 'dotdigital' ),
		'desc'  => esc_html__( 'Choose box icon', 'dotdigital' ),
	),
	'content'      => array(
		'type'  => 'textarea',
		'label' => esc_html__( 'Box text', 'dotdigital' ),
		'desc'  => esc_html__( 'Enter desired box content', 'dotdigital' ),
	),
	'button' => array(
		'type'          => 'popup',
		'label'         => esc_html__( 'Button', 'dotdigital' ),
		'popup-title'   => esc_html__( 'Edit Button', 'dotdigital' ),
		'popup-options' => $button->get_options(),
	),
	'custom_class' => array(
		'label' => esc_html__('Custom Class', 'dotdigital'),
		'desc'  => esc_html__('Add custom class', 'dotdigital'),
		'type'  => 'text',
	)
);