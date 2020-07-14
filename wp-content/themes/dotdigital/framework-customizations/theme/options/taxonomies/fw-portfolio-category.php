<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'box_id' => array(
		'type'    => 'box',
		'title'   => esc_html__( 'Options for child categories', 'dotdigital' ),
		'options' => array(
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
			'item_layout'   => array(
				'label'   => esc_html__( 'Item layout', 'dotdigital' ),
				'desc'    => esc_html__( 'Choose Item layout', 'dotdigital' ),
				'value'   => 'item-regular',
				'type'    => 'select',
				'choices' => array(
					'item-regular'  => esc_html__( 'Regular (just image)', 'dotdigital' ),
					'item-title'    => esc_html__( 'Image with title', 'dotdigital' ),
					'item-extended' => esc_html__( 'Image with title and excerpt', 'dotdigital' ),
				)
			),
			'full_width'    => array(
				'type'         => 'switch',
				'value'        => false,
				'label'        => esc_html__( 'Full width gallery', 'dotdigital' ),
				'desc'         => esc_html__( 'Enable full width container for gallery', 'dotdigital' ),
				'left-choice'  => array(
					'value' => false,
					'label' => esc_html__( 'No', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__( 'Yes', 'dotdigital' ),
				),
			),
			'items_per_page' => array(
				'type'  => 'select',
				'value' => '12',
				'label' => esc_html__( 'Items Per Page', 'dotdigital' ),
				'choices' => array(
					'2' =>  esc_html__('2 Items', 'dotdigital'),
					'3' =>  esc_html__('3 Items', 'dotdigital'),
					'4' =>  esc_html__('4 Items', 'dotdigital'),
					'6' =>  esc_html__('6 Items', 'dotdigital'),
					'8' =>  esc_html__('8 Items', 'dotdigital'),
					'9' =>  esc_html__('9 Items', 'dotdigital'),
					'12' =>  esc_html__('12 Items', 'dotdigital'),
					'16' =>  esc_html__('16 Items', 'dotdigital'),
				),
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
			),
		)
	)
);