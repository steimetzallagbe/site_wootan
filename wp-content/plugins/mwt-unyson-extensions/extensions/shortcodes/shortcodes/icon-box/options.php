<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'unique_id'   => array(
		'type'   => 'unique',
		'length' => 7
	),
	'title'        => array(
		'type'  => 'text',
		'label' => esc_html__( 'Box Title', 'dotdigital' ),
	),
	'link'         => array(
		'type'  => 'text',
		'value' => '#',
		'label' => esc_html__( 'Box link', 'dotdigital' ),
		'desc'  => esc_html__( 'Link on title and optional button', 'dotdigital' ),
	),
	'box_type' => array(
		'type'    => 'image-picker',
		'value'   => 'icon_top',
		'label'   => esc_html__( 'Box Type', 'dotdigital' ),
		'desc'    => esc_html__( 'Select one of predefined box types', 'dotdigital' ),
		'choices' => array(
			'icon_top'      => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/icon_top.png',
			'icon_left'     => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/icon_left.png',
			'icon_right'    => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/icon_right.png',
		),
		'blank'   => false, // (optional) if true, images can be deselected
	),
	'box_icon'       => array(
		'type'         => 'icon-v2',
		'label' => esc_html__( 'Box icon', 'dotdigital' ),
		'desc'  => esc_html__( 'Choose box icon', 'dotdigital' ),
	),
	'icon_type'       => array(
		'label'   => esc_html__('Icon type', 'dotdigital'),
		'type'    => 'short-select',
		'value'   => '',
		'choices' => array(
			''  => esc_html__('Type 1', 'dotdigital'),
			'type_2' => esc_html__('Type 2', 'dotdigital'),
		),
	),
	'content'      => array(
		'type'  => 'textarea',
		'label' => esc_html__( 'Box text', 'dotdigital' ),
		'desc'  => esc_html__( 'Enter desired box content', 'dotdigital' ),
	),
	'block_item'       => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Block item', 'dotdigital' ),
		'desc'         => esc_html__( 'Make icon box as block item with background?', 'dotdigital' ),
		'value'        => '',
		'right-choice' => array(
			'value' => 'block-item',
			'label' => esc_html__( 'Yes', 'dotdigital' ),
		),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'dotdigital' ),
		),
	),
	'custom_class' => array(
		'label' => esc_html__('Custom Class', 'dotdigital'),
		'desc'  => esc_html__('Add custom class', 'dotdigital'),
		'type'  => 'text',
	)
);