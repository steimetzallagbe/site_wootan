<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'icon'       => array(
		'type'  => 'icon',
		'label' => esc_html__( 'Icon', 'dotdigital' ),
		'set'   => 'rt-icons-2',
	),
	'icon_position'          => array(
		'type'         => 'switch',
		'value'        => 'left',
		'label'        => esc_html__( 'Icon position', 'dotdigital' ),
		'left-choice'  => array(
			'value' => 'left',
			'label' => esc_html__( 'Left', 'dotdigital' ),
		),
		'right-choice' => array(
			'value' => 'right',
			'label' => esc_html__( 'Right', 'dotdigital' ),
		),
	),
	'icon_size'  => array(
		'type'    => 'select',
		'value'   => 'size_normal',
		'label'   => esc_html__( 'Icon Size', 'dotdigital' ),
		'choices' => array(
			'size_small'  => esc_html__( 'Small', 'dotdigital' ),
			'size_normal' => esc_html__( 'Normal', 'dotdigital' ),
			'size_big'    => esc_html__( 'Big', 'dotdigital' ),
		)
	),
	'icon_style' => array(
		'type'    => 'image-picker',
		'value'   => 'default_icon',
		'label'   => esc_html__( 'Icon Style', 'dotdigital' ),
		'desc'    => esc_html__( 'Select one of predefined icon styles.', 'dotdigital' ),
		'help'    => esc_html__( 'If not set - no icon will appear.', 'dotdigital' ),
		'choices' => array(
			'default_icon' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_01.png',
			'border_icon round'        => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_02.png',
			'bg_color round'    => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_03.png',
			'bg_color' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_04.png',
		),

		'blank' => false, // (optional) if true, images can be deselected
	),
	'icon_color'     => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Icon color', 'dotdigital' ),
		'desc'    => esc_html__( 'Select a color for your icon', 'dotdigital' ),
		'choices' => array(
			''           => 'Inherited',
			'color_1'  => esc_html__( 'Main color 1', 'dotdigital' ),
			'color_2'  => esc_html__( 'Main color 2', 'dotdigital' ),
			'color_3'  => esc_html__( 'Main color 3', 'dotdigital' ),
			'color_4'  => esc_html__( 'Main color 4', 'dotdigital' ),
		),
	),
	'text_align'     => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Text alignment', 'dotdigital' ),
		'desc'    => esc_html__( 'Select text alignment', 'dotdigital' ),
		'choices' => array(
			''            => esc_html__( 'Inherit', 'dotdigital' ),
			'text-left'   => esc_html__( 'Left', 'dotdigital' ),
			'text-center' => esc_html__( 'Center', 'dotdigital' ),
			'text-right'  => esc_html__( 'Right', 'dotdigital' ),
		),
	),
	'title'      => array(
		'type'  => 'text',
		'value'   => '',
		'label' => esc_html__( 'Title', 'dotdigital' ),
		'desc'  => esc_html__( 'Title near icon', 'dotdigital' ),
	),
	'text'       => array(
		'type'  => 'text',
		'value'   => '',
		'label' => esc_html__( 'Text', 'dotdigital' ),
		'desc'  => esc_html__( 'Text near title', 'dotdigital' ),
	),
);