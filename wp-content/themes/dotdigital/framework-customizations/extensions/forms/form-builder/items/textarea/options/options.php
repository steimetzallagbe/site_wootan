<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'rows_num' => array(
		'type' => 'short-text',
		'value' => '7',
		'label' => esc_html__( 'Number of rows', 'dotdigital' ),
		'desc' => esc_html__( 'Select number of rows for textarea', 'dotdigital' ),
	),
	'icon' => array(
		'type' => 'icon',
		'label' => esc_html__( 'Icon', 'dotdigital' ),
		'set'   => 'rt-icons-2',
	),
);