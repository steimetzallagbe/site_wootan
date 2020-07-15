<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'years' => array(
		'type'  => 'addable-box',
		'value' => array(),
		'label' => esc_html__('Item', 'dotdigital'),
		'desc'  => esc_html__('Add new Bio breakpoint', 'dotdigital'),
		'box-options' => array(
			'year' => array( 'type' => 'text' ),
			'text' => array( 'type' => 'textarea' ),
		),
		'template' => '{{- year }}', // box title
		'limit' => 0, // limit the number of boxes that can be added
		'add-button-text' => esc_html__('Add', 'dotdigital'),
		'sortable' => true,
	),
	'word' => array(
		'label' => esc_html__( 'Progress Bar Background Word', 'dotdigital' ),
		'desc'  => esc_html__( 'This word will be visible as a background for years progress bar', 'dotdigital' ),
		'type'  => 'text',
		'value' => esc_html__('', 'dotdigital' ),
	)
);