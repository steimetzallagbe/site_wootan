<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tabs' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Panels', 'dotdigital' ),
		'popup-title'   => esc_html__( 'Add/Edit Accordion Panels', 'dotdigital' ),
		'desc'          => esc_html__( 'Create your accordion panels', 'dotdigital' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'dotdigital' )
			),
			'tab_content'        => array(
				'type'  => 'textarea',
				'label' => esc_html__( 'Content', 'dotdigital' )
			),
			'tab_featured_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Panel Featured Image', 'dotdigital' ),
				'image'       => esc_html__( 'Image for your panel.', 'dotdigital' ),
				'help'        => esc_html__( 'It appears to the left from your content', 'dotdigital' ),
				'images_only' => true,
			),
			'tab_icon'           => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Icon in panel title', 'dotdigital' ),
				'set'   => 'rt-icons-2',
			),
		)
	),
	'item_template'        => array(
		'label'   => esc_html__( 'Accordion template', 'dotdigital' ),
		'desc'    => esc_html__( 'Choose item template', 'dotdigital' ),
		'value'   => '',
		'type'    => 'select',
		'choices' => array(
			'accordion1' => esc_html__( 'Template 1', 'dotdigital' ),
			'accordion2'  => esc_html__( 'Template 2', 'dotdigital' ),
		)
	),
	'id'   => array( 'type' => 'unique' ),
);