<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'slider_options' => array(
		'type'    => 'group',
		'context' => 'normal',
		'title'   => esc_html__( 'Slider options', 'dotdigital' ),
		'desc'    => false,
		'value'   => false,
		'options'  => array(
			'slider_autoplay' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Autoplay', 'dotdigital' ),
				'value' => 'true',
				'left-choice'  => array(
					'value' => 'false',
					'label' => esc_html__( 'No', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => 'true',
					'label' => esc_html__( 'Yes', 'dotdigital' ),
				),
			),
			'slider_speed' => array(
				'type'  => 'text',
				'value' => esc_html__( '3000', 'dotdigital' ),
				'label' => esc_html__( 'Speed', 'dotdigital' ),
				'desc'  => esc_html__( 'Please input here value in milliseconds.', 'dotdigital' ),
			),
		),
	),
	'mouse_button_link'      => array(
		'type'  => 'text',
		'value'   => '',
		'label' => esc_html__( 'Mouse button link', 'dotdigital' ),
	),
);