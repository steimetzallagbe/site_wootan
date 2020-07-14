<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'size' => array(
		'type'       => 'slider',
		'value'      => 240,
		'properties' => array(
			'min'  => 150,
			'max'  => 350,
			'step' => 10,
		),
		'label'      => esc_html__( 'Chart Size (px)', 'dotdigital' ),
	),

	'line' => array(
		'type'       => 'slider',
		'value'      => 5,
		'properties' => array(
			'min'  => 1,
			'max'  => 40,
			'step' => 1,
		),
		'label'      => esc_html__( 'Chart Size (px)', 'dotdigital' ),
	),

	'trackcolor' => array(
		'type'  => 'color-picker',
		'value' => '#54be73',
		'label' => esc_html__( 'Bar Color', 'dotdigital' ),
	),

	'bgcolor' => array(
		'type'  => 'color-picker',
		'value' => '#e5e5e5',
		'label' => esc_html__( 'Track Color', 'dotdigital' ),
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
	'speed'   => array(
		'type'       => 'slider',
		'value'      => 1000,
		'properties' => array(
			'min'  => 500,
			'max'  => 5000,
			'step' => 100,
		),
		'label'      => esc_html__( 'Percents Counter Speed', 'dotdigital' ),
		'desc'       => esc_html__( 'Choose counter speed (in milliseconds)', 'dotdigital' ),
	),
	'name'    => array(
		'type'  => 'text',
		'label' => esc_html__( 'Chart Name', 'dotdigital' ),
		'desc'  => esc_html__( 'Appears below percents number', 'dotdigital' ),
	),
);