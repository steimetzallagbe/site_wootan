<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'counters' => array(
		'type'        => 'addable-box',
		'value'       => '',
		'label'       => esc_html__( 'Counters block', 'dotdigital' ),
		'box-options' => array(
			'unique_id'               => array(
				'type'   => 'unique',
				'length' => 7
			),
			'box_icon'                => array(
				'type'  => 'icon-v2',
				'label' => esc_html__( 'Box icon', 'dotdigital' ),
				'desc'  => esc_html__( 'Choose box icon', 'dotdigital' ),
			),
			'number'                  => array(
				'type'  => 'text',
				'value' => 10,
				'label' => esc_html__( 'Count To Number', 'dotdigital' ),
				'desc'  => esc_html__( 'Choose value to count to', 'dotdigital' ),
			),
			'counter_additional_text' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Add some text after counter', 'dotdigital' ),
				'desc'  => esc_html__( 'You can add "+", "%", decimal values etc.', 'dotdigital' ),
			),
			'speed'                   => array(
				'type'       => 'slider',
				'value'      => 1000,
				'properties' => array(
					'min'  => 500,
					'max'  => 5000,
					'step' => 100,
				),
				'label'      => esc_html__( 'Counter Speed (counter teaser only)', 'dotdigital' ),
				'desc'       => esc_html__( 'Choose counter speed (in milliseconds)', 'dotdigital' ),
			),
		),
		'template'    => '{{- counter_additional_text }}',
	),
	'custom_class' => array(
		'label' => esc_html__('Custom Class', 'dotdigital'),
		'desc'  => esc_html__('Add custom class', 'dotdigital'),
		'type'  => 'text',
	)
);
