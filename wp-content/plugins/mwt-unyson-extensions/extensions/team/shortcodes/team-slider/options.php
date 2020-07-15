<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$ext_team_settings = fw()->extensions->get( 'team' )->get_settings();
$taxonomy = $ext_team_settings['taxonomy_name'];

$options = array(
	'title'         => array(
		'label' => esc_html__( 'Title', 'fw' ),
		'desc'  => esc_html__( 'Option Team Slider Title', 'fw' ),
		'type'  => 'text',
	),
	'number'        => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'  => 1,
			'max'  => 12,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.

		),
		'label'      => esc_html__( 'Items number', 'fw' ),
		'desc'       => esc_html__( 'Number of posts to display', 'fw' ),
	),
	'cat' => array(
		'type'  => 'multi-select',
		'label' => esc_html__('Select categories', 'fw'),
		'desc'  => esc_html__('You can select one or more categories', 'fw'),
		'population' => 'taxonomy',
		'source' => $taxonomy,
		'prepopulate' => 100,
		'limit' => 100,
	),
	'slider_autoplay' => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Autoplay', 'fw' ),
		'value' => 'true',
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'fw' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'fw' ),
		),
	),
	'slider_speed' => array(
		'type'  => 'text',
		'value' => esc_html__( '3000', 'fw' ),
		'label' => esc_html__( 'Speed', 'fw' ),
		'desc'  => esc_html__( 'Please input here value in milliseconds.', 'fw' ),
	),
);