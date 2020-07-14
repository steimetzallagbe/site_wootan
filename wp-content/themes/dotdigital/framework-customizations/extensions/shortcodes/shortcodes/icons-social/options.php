<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'social_icons' => array(
		'type'            => 'addable-box',
		'value'           => '',
		'label'           => esc_html__( 'Social Buttons', 'dotdigital' ),
		'desc'            => esc_html__( 'Optional social buttons', 'dotdigital' ),
		'template'        => '{{=icon}}',
		'box-options'     => array(
			'icon'       => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Social Icon', 'dotdigital' ),
				'set'   => 'social-icons',
			),
			'icon_class' => array(
				'type'        => 'select',
				'value'       => '',
				'label'       => esc_html__( 'Icon type', 'dotdigital' ),
				'desc'        => esc_html__( 'Select one of predefined social button types', 'dotdigital' ),
				'choices'     => array(
					''                                    => 'Default',
					'border-icon'                         => esc_html__( 'Simple Bordered Icon', 'dotdigital' ),
					'border-icon rounded-icon'            => esc_html__( 'Rounded Bordered Icon', 'dotdigital' ),
					'bg-icon'                             => esc_html__( 'Simple Background Icon', 'dotdigital' ),
					'bg-icon rounded-icon'                => esc_html__( 'Rounded Background Icon', 'dotdigital' ),
					'color-icon bg-icon'                  => esc_html__( 'Color Light Background Icon', 'dotdigital' ),
					'color-icon bg-icon rounded-icon'     => esc_html__( 'Color Light Background Rounded Icon', 'dotdigital' ),
					'color-icon'                          => esc_html__( 'Color Icon', 'dotdigital' ),
					'color-icon border-icon'              => esc_html__( 'Color Bordered Icon', 'dotdigital' ),
					'color-icon border-icon rounded-icon' => esc_html__( 'Rounded Color Bordered Icon', 'dotdigital' ),
					'color-bg-icon'                       => esc_html__( 'Color Background Icon', 'dotdigital' ),
					'color-bg-icon rounded-icon'          => esc_html__( 'Rounded Color Background Icon', 'dotdigital' ),

				),
				/**
				 * Allow save not existing choices
				 * Useful when you use the select to populate it dynamically from js
				 */
				'no-validate' => false,
			),
			'icon_url'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Icon Link', 'dotdigital' ),
				'desc'  => esc_html__( 'Provide a URL to your icon', 'dotdigital' ),
			)
		),
		'limit'           => 0, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'dotdigital' ),
		'sortable'        => true,
	)
);