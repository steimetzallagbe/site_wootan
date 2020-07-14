<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$map_shortcode = fw_ext( 'shortcodes' )->get_shortcode( 'map' );
$options       = array(
	'data_provider'     => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'population_method' => array(
				'label'   => esc_html__( 'Population Method', 'dotdigital' ),
				'desc'    => esc_html__( 'Select map population method (Ex: events, custom)', 'dotdigital' ),
				'type'    => 'select',
				'choices' => $map_shortcode->_get_picker_dropdown_choices(),
			)
		),
		'choices'      => $map_shortcode->_get_picker_choices(),
		'show_borders' => false,
	),
	'gmap-key'          => array_merge(
		array(
			'label' => esc_html__( 'Google Maps API Key', 'dotdigital' ),
			'desc'  => sprintf(
				esc_html__( 'Create an application in %sGoogle Console%s and add the Key here.', 'dotdigital' ),
				'<a href="https://console.developers.google.com/flows/enableapi?apiid=places_backend,maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend&keyType=CLIENT_SIDE&reusekey=true">',
				'</a>'
			),
		),
		version_compare( fw()->manifest->get_version(), '2.5.7', '>=' )
			? array(
			'type' => 'gmap-key',
		)
			: array(
			'type'       => 'text',
			'fw-storage' => array(
				'type'      => 'wp-option',
				'wp_option' => 'fw-option-types:gmap-key',
			),
		)
	),
	'map_type'          => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Map Type', 'dotdigital' ),
		'desc'    => esc_html__( 'Select map type', 'dotdigital' ),
		'choices' => array(
			'roadmap'   => esc_html__( 'Roadmap', 'dotdigital' ),
			'terrain'   => esc_html__( 'Terrain', 'dotdigital' ),
			'satellite' => esc_html__( 'Satellite', 'dotdigital' ),
			'hybrid'    => esc_html__( 'Hybrid', 'dotdigital' )
		)
	),
	'map_height'        => array(
		'label' => esc_html__( 'Map Height', 'dotdigital' ),
		'desc'  => esc_html__( 'Set map height (Ex: 300)', 'dotdigital' ),
		'type'  => 'text'
	),
	'disable_scrolling' => array(
		'type'         => 'switch',
		'value'        => false,
		'label'        => esc_html__( 'Disable zoom on scroll', 'dotdigital' ),
		'desc'         => esc_html__( 'Prevent the map from zooming when scrolling until clicking on the map', 'dotdigital' ),
		'left-choice'  => array(
			'value' => false,
			'label' => esc_html__( 'Yes', 'dotdigital' ),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__( 'No', 'dotdigital' ),
		),
	),
	'initial_zoom'      => array(
		'label' => esc_html__( 'Initial Zoom', 'dotdigital' ),
		'desc'  => esc_html__( 'From 1 to 16', 'dotdigital' ),
		'type'  => 'text',
		'value' => '14',
	),
	'map_pin'           => array(
		'type'        => 'upload',
		'value'       => '',
		'label'       => esc_html__( 'Map marker', 'dotdigital' ),
		'help'        => esc_html__( 'It appears to the left from your content', 'dotdigital' ),
		'images_only' => true,
	),

);