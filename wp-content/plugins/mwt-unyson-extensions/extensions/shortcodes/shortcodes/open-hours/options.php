<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'open_hours' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Open Hours', 'dotdigital' ),
		'popup-title'   => esc_html__( 'Add/Edit Open Hours', 'dotdigital' ),
		'template'      => '{{=day}}',
		'popup-options' => array(
			'day'       => array(
				'type'  => 'text',
				'value'   => '',
				'label' => esc_html__( 'Day', 'dotdigital' ),
			),
			'hours'       => array(
				'type'  => 'text',
				'value'   => '',
				'label' => esc_html__( 'Hours', 'dotdigital' ),
			),
		),
	),
);