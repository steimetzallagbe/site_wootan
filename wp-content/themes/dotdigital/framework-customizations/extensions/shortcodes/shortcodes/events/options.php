<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$events = fw()->extensions->get( 'events' );
if ( empty( $events ) ) {
	return;
}

$options = array(
	'number'        => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'  => 1,
			'max'  => 12,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.

		),
		'label'      => esc_html__( 'Items number', 'dotdigital' ),
		'desc'       => esc_html__( 'Number of events to display', 'dotdigital' ),
	),
    'layout'        => array(
        'label'   => esc_html__( 'Post Layout', 'dotdigital' ),
        'desc'    => esc_html__( 'Choose post layout', 'dotdigital' ),
        'value'   => 'carousel',
        'type'    => 'select',
        'choices' => array(
            'carousel' => esc_html__( 'Carousel', 'dotdigital' ),
            'tile'  => esc_html__( 'Masonry Grid', 'dotdigital' ),
        )
    ),
    'margin'        => array(
        'label'   => esc_html__( 'Horizontal item margin (px)', 'dotdigital' ),
        'desc'    => esc_html__( 'Select horizontal item margin', 'dotdigital' ),
        'value'   => '30',
        'type'    => 'select',
        'choices' => array(
            '0'  => esc_html__( '0', 'dotdigital' ),
            '1'  => esc_html__( '1px', 'dotdigital' ),
            '2'  => esc_html__( '2px', 'dotdigital' ),
            '10' => esc_html__( '10px', 'dotdigital' ),
            '30' => esc_html__( '30px', 'dotdigital' ),
        )
    ),
    'responsive_lg' => array(
        'label'   => esc_html__( 'Columns on large screens', 'dotdigital' ),
        'desc'    => esc_html__( 'Select items number on wide screens (>1200px)', 'dotdigital' ),
        'value'   => '4',
        'type'    => 'select',
        'choices' => array(
            '1' => esc_html__( '1', 'dotdigital' ),
            '2' => esc_html__( '2', 'dotdigital' ),
            '3' => esc_html__( '3', 'dotdigital' ),
            '4' => esc_html__( '4', 'dotdigital' ),
            '6' => esc_html__( '6', 'dotdigital' ),
        )
    ),
    'responsive_md' => array(
        'label'   => esc_html__( 'Columns on middle screens', 'dotdigital' ),
        'desc'    => esc_html__( 'Select items number on middle screens (>992px)', 'dotdigital' ),
        'value'   => '3',
        'type'    => 'select',
        'choices' => array(
            '1' => esc_html__( '1', 'dotdigital' ),
            '2' => esc_html__( '2', 'dotdigital' ),
            '3' => esc_html__( '3', 'dotdigital' ),
            '4' => esc_html__( '4', 'dotdigital' ),
            '6' => esc_html__( '6', 'dotdigital' ),
        )
    ),
    'responsive_sm' => array(
        'label'   => esc_html__( 'Columns on small screens', 'dotdigital' ),
        'desc'    => esc_html__( 'Select items number on small screens (>768px)', 'dotdigital' ),
        'value'   => '2',
        'type'    => 'select',
        'choices' => array(
            '1' => esc_html__( '1', 'dotdigital' ),
            '2' => esc_html__( '2', 'dotdigital' ),
            '3' => esc_html__( '3', 'dotdigital' ),
            '4' => esc_html__( '4', 'dotdigital' ),
            '6' => esc_html__( '6', 'dotdigital' ),
        )
    ),
    'responsive_xs' => array(
        'label'   => esc_html__( 'Columns on extra small screens', 'dotdigital' ),
        'desc'    => esc_html__( 'Select items number on extra small screens (<767px)', 'dotdigital' ),
        'value'   => '1',
        'type'    => 'select',
        'choices' => array(
            '1' => esc_html__( '1', 'dotdigital' ),
            '2' => esc_html__( '2', 'dotdigital' ),
            '3' => esc_html__( '3', 'dotdigital' ),
            '4' => esc_html__( '4', 'dotdigital' ),
            '6' => esc_html__( '6', 'dotdigital' ),
        )
    ),
	'show_filters'  => array(
		'type'         => 'switch',
		'value'        => false,
		'label'        => esc_html__( 'Show filters', 'dotdigital' ),
		'desc'         => esc_html__( 'Hide or show categories filters', 'dotdigital' ),
		'left-choice'  => array(
			'value' => false,
			'label' => esc_html__( 'No', 'dotdigital' ),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__( 'Yes', 'dotdigital' ),
		),
	)
);