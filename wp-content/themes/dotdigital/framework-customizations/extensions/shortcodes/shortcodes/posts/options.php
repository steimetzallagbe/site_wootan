<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
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
		'desc'       => esc_html__( 'Number of posts to display', 'dotdigital' ),
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
			'4'  => esc_html__( '4px', 'dotdigital' ),
			'10' => esc_html__( '10px', 'dotdigital' ),
			'30' => esc_html__( '30px', 'dotdigital' ),
			'60' => esc_html__( '60px (Extra large)', 'dotdigital' ),
		)
	),
	'layout'        => array(
		'label'   => esc_html__( 'Post Layout', 'dotdigital' ),
		'desc'    => esc_html__( 'Choose post layout', 'dotdigital' ),
		'value'   => 'carousel',
		'type'    => 'select',
		'choices' => array(
			'carousel' => esc_html__( 'Carousel', 'dotdigital' ),
			'isotope'  => esc_html__( 'Masonry Grid', 'dotdigital' ),
			'tiled'  => esc_html__( 'Tiled (special layout)', 'dotdigital' ),
		)
	),
	'carousel_autoplay' => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Carousel Autoplay', 'dotdigital' ),
		'desc'         => esc_html__( 'Only for carousel layout', 'dotdigital' ),
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
    'overflow_visible' => array(
        'type'         => 'switch',
        'label'        => esc_html__( 'Overflow visible on carousel', 'dotdigital' ),
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
		'desc'  => esc_html__( 'Only for carousel layout (value in milliseconds)', 'dotdigital' ),
	),
	'show_nav' => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Show navigation', 'dotdigital' ),
		'desc'         => esc_html__( 'Only for carousel layout', 'dotdigital' ),
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
	'item_layout'   => array(
		'label'   => esc_html__( 'Item layout', 'dotdigital' ),
		'desc'    => esc_html__( 'Choose Item layout', 'dotdigital' ),
		'value'   => 'item-regular',
		'type'    => 'select',
		'choices' => array(
			'item-text'  => esc_html__( 'Just text', 'dotdigital' ),
            'item-text2'  => esc_html__( 'Title with text and button', 'dotdigital' ),
			'item-regular'  => esc_html__( 'Regular (just image)', 'dotdigital' ),
			'item-title'    => esc_html__( 'Image with title', 'dotdigital' ),
			'item-title2'    => esc_html__( 'Image with title 2', 'dotdigital' ),
			'item-extended' => esc_html__( 'Image with title and excerpt', 'dotdigital' ),
			'item-extended2' => esc_html__( 'Image with title and excerpt 2', 'dotdigital' ),
			'item-extended3' => esc_html__( 'Image with title and excerpt 3', 'dotdigital' ),
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
	),
);