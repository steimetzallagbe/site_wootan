<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tabs'       => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'dotdigital' ),
		'popup-title'   => esc_html__( 'Add/Edit Tabs', 'dotdigital' ),
		'desc'          => esc_html__( 'Create your tabs', 'dotdigital' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Tab Title', 'dotdigital' )
			),
			'tab_content'        => array(
				'type'  => 'wp-editor',
				'label' => esc_html__( 'Tab Content', 'dotdigital' ),
			),
			'tab_featured_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Tab Featured Image', 'dotdigital' ),
				'image'       => esc_html__( 'Featured image for your tab', 'dotdigital' ),
				'help'        => esc_html__( 'Image for your tab. It appears on the top of your tab content', 'dotdigital' ),
				'images_only' => true,
			),
			'tab_icon'           => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Icon in tab title', 'dotdigital' ),
				'set'   => 'rt-icons-2',
			),
		),
	),
	'active_tab_color'  => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Active tab color', 'dotdigital' ),
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