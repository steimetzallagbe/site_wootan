<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'icons' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Icons in list', 'dotdigital' ),
		'popup-title'   => esc_html__( 'Add/Edit Icons in list', 'dotdigital' ),
		'desc'          => esc_html__( 'Create your tabs', 'dotdigital' ),
		'template'      => '{{=text}}',
		'popup-options' => array(
			'icon'       => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Icon', 'dotdigital' ),
				'set'   => 'rt-icons-2',
			),
			'text'       => array(
				'type'  => 'text',
				'value'   => '',
				'label' => esc_html__( 'Text', 'dotdigital' ),
				'desc'  => esc_html__( 'Text near title', 'dotdigital' ),
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