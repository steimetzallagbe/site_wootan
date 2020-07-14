<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'       => array(
		'type'  => 'text',
		'value'   => '',
		'label' => esc_html__( 'Title', 'dotdigital' ),
	),
	'simple_list' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'List items', 'dotdigital' ),
		'popup-title'   => esc_html__( 'Add/Edit item', 'dotdigital' ),
		'template'      => '{{=list_item}}',
		'popup-options' => array(
			'list_item'       => array(
				'type'  => 'text',
				'value'   => '',
				'label' => esc_html__( 'List item', 'dotdigital' ),
			),
			'item_link' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Item link', 'dotdigital' ),
			),
		),
	),
	'custom_class' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Custom class', 'dotdigital' ),
		'desc'  => esc_html__( 'Add custom css class', 'dotdigital' ),
	),
);