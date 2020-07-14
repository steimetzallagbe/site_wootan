<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$portfolio = fw()->extensions->get( 'portfolio' );
if ( empty( $portfolio ) ) {
	return;
}

$ext_portfolio_settings = fw()->extensions->get( 'portfolio' )->get_settings();
$taxonomy = $ext_portfolio_settings['taxonomy_name'];

$options = array(
	'layout'        => array(
		'label'   => esc_html__( 'Portfolio Layout', 'dotdigital' ),
		'desc'    => esc_html__( 'Choose projects layout', 'dotdigital' ),
		'value'   => 'isotope',
		'type'    => 'select',
		'choices' => array(
			'carousel' => esc_html__( 'Carousel', 'dotdigital' ),
			'isotope'  => esc_html__( 'Masonry Grid', 'dotdigital' ),
		)
	),
	'carousel_autoplay' => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Carousel Autoplay', 'dotdigital' ),
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
	'autoplay_timeout' => array(
		'type'  => 'text',
		'value' => esc_html__( '3000', 'dotdigital' ),
		'label' => esc_html__( 'Autoplay Timeout', 'dotdigital' ),
		'desc'  => esc_html__( 'Set value in milliseconds', 'dotdigital' ),
	),
	'centered_carousel' => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Centered Carousel?', 'dotdigital' ),
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
    'big_center_slide' => array(
        'type'         => 'switch',
        'label'        => esc_html__( 'Big center slide', 'dotdigital' ),
        'value' => 'false',
        'left-choice'  => array(
            'value' => 'false',
            'label' => esc_html__( 'No', 'dotdigital' ),
        ),
        'right-choice' => array(
            'value' => 'true',
            'label' => esc_html__( 'Yes', 'dotdigital' ),
        ),
    ),
    'show_nav' => array(
        'type'         => 'switch',
        'label'        => esc_html__( 'Show navigation', 'dotdigital' ),
        'value' => '1',
        'left-choice'  => array(
            'value' => 'false',
            'label' => esc_html__( 'No', 'dotdigital' ),
        ),
        'right-choice' => array(
            'value' => '1',
            'label' => esc_html__( 'Yes', 'dotdigital' ),
        ),
    ),
    'nav_layout' => array(
        'type'         => 'switch',
        'label'        => esc_html__( 'Navigation layout', 'dotdigital' ),
        'value' => 'false',
        'left-choice'  => array(
            'value' => 'false',
            'label' => esc_html__( 'Variant 1', 'dotdigital' ),
        ),
        'right-choice' => array(
            'value' => 'true',
            'label' => esc_html__( 'Variant 2', 'dotdigital' ),
        ),
    ),
	'item_layout'   => array(
		'label'   => esc_html__( 'Item layout', 'dotdigital' ),
		'desc'    => esc_html__( 'Choose Item layout', 'dotdigital' ),
		'value'   => 'item-regular',
		'type'    => 'select',
		'choices' => array(
			'item-regular'  => esc_html__( 'Regular', 'dotdigital' ),
			'item-regular-2'  => esc_html__( 'Regular 2', 'dotdigital' ),
			'item-regular-3'  => esc_html__( 'Regular 3', 'dotdigital' ),
			'item-title'    => esc_html__( 'Image with title', 'dotdigital' ),
			'item-extended' => esc_html__( 'Image with title and excerpt', 'dotdigital' ),
			'item-extended-2' => esc_html__( 'Image with title and excerpt 2', 'dotdigital' ),
			'item-extended-3' => esc_html__( 'Image with title and excerpt 3', 'dotdigital' ),
		)
	),
	'number'        => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'  => 1,
			'max'  => 12,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.

		),
		'label'      => esc_html__( 'Items number', 'dotdigital' ),
		'desc'       => esc_html__( 'Number of portfolio projects tu display', 'dotdigital' ),
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
		'label'   => esc_html__( 'Columns on wide screens', 'dotdigital' ),
		'desc'    => esc_html__( 'Select items number on wide screens (>1200px)', 'dotdigital' ),
		'value'   => '4',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'dotdigital' ),
			'2' => esc_html__( '2', 'dotdigital' ),
			'3' => esc_html__( '3', 'dotdigital' ),
			'4' => esc_html__( '4', 'dotdigital' ),
			'5' => esc_html__( '5', 'dotdigital' ),
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
			'5' => esc_html__( '5', 'dotdigital' ),
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
			'5' => esc_html__( '5', 'dotdigital' ),
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
			'5' => esc_html__( '5', 'dotdigital' ),
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
	),
	'cat' => array(
		'type'  => 'multi-select',
		'label' => esc_html__('Select categories', 'dotdigital'),
		'desc'  => esc_html__('You can select one or more categories', 'dotdigital'),
		'population' => 'taxonomy',
		'source' => $taxonomy,
		'prepopulate' => 100,
		'limit' => 100,
	)
);