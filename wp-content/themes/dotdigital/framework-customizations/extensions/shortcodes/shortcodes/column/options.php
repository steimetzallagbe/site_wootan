<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'unique_id'              => array(
		'type'   => 'unique',
		'length' => 7
	),
	'column_align'     => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Text alignment in column', 'dotdigital' ),
		'desc'    => esc_html__( 'Select text alignment inside your column', 'dotdigital' ),
		'choices' => array(
			''            => esc_html__( 'Inherit', 'dotdigital' ),
			'text-left'   => esc_html__( 'Left', 'dotdigital' ),
			'text-center' => esc_html__( 'Center', 'dotdigital' ),
			'text-right'  => esc_html__( 'Right', 'dotdigital' ),
		),
	),
	'column_padding'   => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Column padding', 'dotdigital' ),
		'desc'    => esc_html__( 'Select optional internal column paddings', 'dotdigital' ),
		'choices' => array(
			''           => esc_html__( 'No padding', 'dotdigital' ),
			'padding_10' => esc_html__( '10px', 'dotdigital' ),
			'padding_20' => esc_html__( '20px', 'dotdigital' ),
			'padding_30' => esc_html__( '30px', 'dotdigital' ),
			'padding_40' => esc_html__( '40px', 'dotdigital' ),
			'padding_60' => esc_html__( '60px', 'dotdigital' ),
			'padding_80' => esc_html__( '80px', 'dotdigital' ),
		),
	),
	'background_color' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Background color', 'dotdigital' ),
		'desc'    => esc_html__( 'Select background color', 'dotdigital' ),
		'help'    => esc_html__( 'Select one of predefined background colors', 'dotdigital' ),
		'choices' => array(
			''               => esc_html__( 'Transparent (No Background)', 'dotdigital' ),
			'ls'          => esc_html__( 'Light', 'dotdigital' ),
			'ls ms'          => esc_html__( 'Light Grey', 'dotdigital' ),
			'with_background'=> esc_html__( 'Grey', 'dotdigital' ),
			'muted_background'=> esc_html__( 'Muted', 'dotdigital' ),
			'ds ms'          => esc_html__( 'Dark Grey', 'dotdigital' ),
			'ds'             => esc_html__( 'Dark', 'dotdigital' ),
			'cs'             => esc_html__( 'Main color', 'dotdigital' ),
		),
	),
	'background_image' => array(
		'label'   => esc_html__( 'Background Image', 'dotdigital' ),
		'desc'    => esc_html__( 'Please select the background image', 'dotdigital' ),
		'type'    => 'background-image',
		'choices' => array(//	in future may will set predefined images
		)
	),
	'background_cover' => array(
		'label' => esc_html__( 'Background Cover', 'dotdigital' ),
		'type'  => 'switch',
	),
	'use_as_slide'     => array(
		'label' => esc_html__( 'Use as slide', 'dotdigital' ),
		'desc'  => esc_html__( 'Use column as slide', 'dotdigital' ),
		'help'  => esc_html__( 'Use only for FullPage slider. This option make column 100% width', 'dotdigital' ),
		'type'  => 'switch',
	),
	'column_animation' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Animation type', 'dotdigital' ),
		'desc'    => esc_html__( 'Select one of predefined animations', 'dotdigital' ),
		'choices' => array(
			''               => 'None',
			'slideDown'      => esc_html__( 'slideDown', 'dotdigital' ),
			'scaleAppear'    => esc_html__( 'scaleAppear', 'dotdigital' ),
			'fadeInLeft'     => esc_html__( 'fadeInLeft', 'dotdigital' ),
			'fadeInUp'       => esc_html__( 'fadeInUp', 'dotdigital' ),
			'fadeInRight'    => esc_html__( 'fadeInRight', 'dotdigital' ),
			'fadeInDown'     => esc_html__( 'fadeInDown', 'dotdigital' ),
			'fadeIn'         => esc_html__( 'fadeIn', 'dotdigital' ),
			'slideRight'     => esc_html__( 'slideRight', 'dotdigital' ),
			'slideUp'        => esc_html__( 'slideUp', 'dotdigital' ),
			'slideLeft'      => esc_html__( 'slideLeft', 'dotdigital' ),
			'expandUp'       => esc_html__( 'expandUp', 'dotdigital' ),
			'slideExpandUp'  => esc_html__( 'slideExpandUp', 'dotdigital' ),
			'expandOpen'     => esc_html__( 'expandOpen', 'dotdigital' ),
			'bigEntrance'    => esc_html__( 'bigEntrance', 'dotdigital' ),
			'hatch'          => esc_html__( 'hatch', 'dotdigital' ),
			'tossing'        => esc_html__( 'tossing', 'dotdigital' ),
			'pulse'          => esc_html__( 'pulse', 'dotdigital' ),
			'floating'       => esc_html__( 'floating', 'dotdigital' ),
			'bounce'         => esc_html__( 'bounce', 'dotdigital' ),
			'pullUp'         => esc_html__( 'pullUp', 'dotdigital' ),
			'pullDown'       => esc_html__( 'pullDown', 'dotdigital' ),
			'stretchLeft'    => esc_html__( 'stretchLeft', 'dotdigital' ),
			'stretchRight'   => esc_html__( 'stretchRight', 'dotdigital' ),
			'fadeInUpBig'    => esc_html__( 'fadeInUpBig', 'dotdigital' ),
			'fadeInDownBig'  => esc_html__( 'fadeInDownBig', 'dotdigital' ),
			'fadeInLeftBig'  => esc_html__( 'fadeInLeftBig', 'dotdigital' ),
			'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'dotdigital' ),
			'slideInDown'    => esc_html__( 'slideInDown', 'dotdigital' ),
			'slideInLeft'    => esc_html__( 'slideInLeft', 'dotdigital' ),
			'slideInRight'   => esc_html__( 'slideInRight', 'dotdigital' ),
			'moveFromLeft'   => esc_html__( 'moveFromLeft', 'dotdigital' ),
			'moveFromRight'  => esc_html__( 'moveFromRight', 'dotdigital' ),
			'moveFromBottom' => esc_html__( 'moveFromBottom', 'dotdigital' ),
		),
	),
    'column_overlay'  => array(
        'label' => esc_html__( 'Column overlay', 'dotdigital' ),
        'type'  => 'switch',
    ),
    'special_column' => array(
        'type'    => 'select',
        'value'   => '',
        'label'   => esc_html__( 'Special column', 'dotdigital' ),
        'choices' => array(
            ''      => esc_html__( 'Default', 'dotdigital' ),
            'section-special'      => esc_html__( 'Default size', 'dotdigital' ),
            'section-special section-special-big'      => esc_html__( 'Big size', 'dotdigital' ),
            'section-special section-special-small'      => esc_html__( 'Small size', 'dotdigital' ),
        ),
    ),
    'position_special_column' => array(
        'type'         => 'switch',
        'value'        => '',
        'label'        => esc_html__( 'Position of Special column', 'dotdigital' ),
        'left-choice'  => array(
            'value' => 'left',
            'label' => esc_html__( 'Left', 'dotdigital' ),
        ),
        'right-choice' => array(
            'value' => 'right',
            'label' => esc_html__( 'Right', 'dotdigital' ),
        ),
    ),
	'column_id'          => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'ID attribute', 'dotdigital' ),
		'desc'  => esc_html__( 'Add ID attribute to column. Useful for FullPage slider', 'dotdigital' ),
	),
	'custom_class' => array(
		'label' => esc_html__('Custom Class', 'dotdigital'),
		'desc'  => esc_html__('Add custom class', 'dotdigital'),
		'type'  => 'text',
	)
);
