<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tabs'       => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs with icons', 'dotdigital' ),
		'popup-title'   => esc_html__( 'Add/Edit Tabs', 'dotdigital' ),
		'desc'          => esc_html__( 'Create your tabs with icons list', 'dotdigital' ),
		'template'      => '{{=tab_title}}',
		'size'  => 'large',
		'popup-options' => array(
			'tab_title'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Tab Title', 'dotdigital' )
			),
			'icons' => array(
				'type'          => 'addable-popup',
				'label'         => esc_html__( 'Icons in list', 'dotdigital' ),
				'popup-title'   => esc_html__( 'Add/Edit Icons in list', 'dotdigital' ),
				'desc'          => esc_html__( 'Create your tabs', 'dotdigital' ),
				'template'      => '{{=text}}',
				'size'  => 'large',
				'popup-options' => array(
					'icon'       => array(
						'type'  => 'icon',
						'label' => esc_html__( 'Icon', 'dotdigital' ),
						'set'   => 'rt-icons-2',
					),
					'text'       => array(
						'type'  => 'text',
						'value'   => '',
						'label' => esc_html__( 'Text', 'dotdigital' ),
						'desc'  => esc_html__( 'Text near title', 'dotdigital' ),
					),
				),
			),
		),
	),
	'tab_color'  => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Tab color', 'dotdigital' ),
		'choices' => array(
			''  => esc_html__( 'Inherit', 'dotdigital' ),
			'color_1' => esc_html__( 'Color 1', 'dotdigital' ),
			'color_2' => esc_html__( 'Color 2', 'dotdigital' ),
			'color_3' => esc_html__( 'Color 3', 'dotdigital' ),
			'color_4' => esc_html__( 'Color 4', 'dotdigital' ),
		)
	),
	'id'         => array( 'type' => 'unique' ),
);