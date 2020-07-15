<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'title' => array(
		'type'       => 'text',
		'value'      => '',
		'label'      => esc_html__( 'Progress Bar title', 'dotdigital' ),
	),
	'percent' => array(
		'type'       => 'slider',
		'value'      => 80,
		'properties' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'label'      => esc_html__( 'Count To', 'dotdigital' ),
		'desc'       => esc_html__( 'Choose percent to count to', 'dotdigital' ),
	),
	'background_class' => array(
		'type'    => 'select',
		'value'   => 'progress-bar-success',
		'label'   => esc_html__( 'Context background color', 'dotdigital' ),
		'desc'    => esc_html__( 'Select one of predefined background colors', 'dotdigital' ),
		'choices' => array(
			'progress-bar-success' => esc_html__( 'Success', 'dotdigital' ),
			'progress-bar-info'    => esc_html__( 'Info', 'dotdigital' ),
			'progress-bar-warning' => esc_html__( 'Warning', 'dotdigital' ),
			'progress-bar-danger'  => esc_html__( 'Danger', 'dotdigital' ),

		),
	),
);