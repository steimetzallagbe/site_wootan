<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

//get button to add in a teaser:
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();
unset( $button_options['link'] );
unset( $button_options['target'] );

$teaser_center_array = array(
	'teaser_center' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Center teaser contents', 'dotdigital' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'dotdigital' ),
		),
		'right-choice' => array(
			'value' => 'text-center',
			'label' => esc_html__( 'Yes', 'dotdigital' ),
		),
	),
);

$icon_options = array(
	'type'    => 'group',
	'options' => array(
		'icon'       => array(
			'type'  => 'icon',
			'label' => esc_html__( 'Choose an Icon', 'dotdigital' ),
			'set'   => 'rt-icons-2',
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
			'value'   => '',
			'label'   => esc_html__( 'Icon Style', 'dotdigital' ),
			'desc'    => esc_html__( 'Select one of predefined icon styles. If not set - no icon will appear.', 'dotdigital' ),
			'help'    => esc_html__( 'If not set - no icon will appear.', 'dotdigital' ),
			'choices' => array(
				''                    => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_00.png',
				'default_icon'        => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_01.png',
				'border_icon round'   => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_02.png',
				'bg_color round' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_teaser_03.png',
			),

			'blank' => false, // (optional) if true, images can be deselected
		),
		'icon_color'     => array(
			'type'    => 'select',
			'value'   => '',
			'label'   => esc_html__( 'Icon color', 'dotdigital' ),
			'desc'    => esc_html__( 'Select a color for your icon', 'dotdigital' ),
			'choices' => array(
				''           => esc_html__( 'Inherited', 'dotdigital' ),
				'color_1'  => esc_html__( 'Main color 1', 'dotdigital' ),
				'color_2'  => esc_html__( 'Main color 2', 'dotdigital' ),
				'color_3'  => esc_html__( 'Main color 3', 'dotdigital' ),
				'color_4'  => esc_html__( 'Main color 4', 'dotdigital' ),
			),
		),
	),
);

$image_options = array(
	'type'        => 'upload',
	'value'       => '',
	'label'       => esc_html__( 'Teaser Image', 'dotdigital' ),
	'image'       => esc_html__( 'Image for your teaser.', 'dotdigital' ),
	'help'        => 'Image for your teaser. Image can appear as an element, or background or even can be hidden depends from chosen teaser type',
	'images_only' => true,
);

$option_teaser_icon = array(
	'icon_options' => $icon_options,
);

$option_teaser_image = array(
	'teaser_image' => $image_options,
);

$option_teaser_square = array(
	'teaser_image' => $image_options,
	'icon'         => array(
		'type'  => 'icon',
		'label' => esc_html__( 'Choose an Icon', 'dotdigital' ),
		'set'   => 'rt-icons-2',
	),
);

$options = array(
	'title'        => array(
		'type'  => 'text',
		'label' => esc_html__( 'Teaser Title', 'dotdigital' ),
	),
	'title_tag' => array(
		'type'    => 'select',
		'value'   => 'h3',
		'label'   => esc_html__( 'Title Tag', 'dotdigital' ),
		'choices' => array(
			'h2' => esc_html__( 'H2', 'dotdigital' ),
			'h3' => esc_html__( 'H3', 'dotdigital' ),
			'h4' => esc_html__( 'H4', 'dotdigital' ),
			'h5' => esc_html__( 'H5', 'dotdigital' ),
			'h6' => esc_html__( 'H6', 'dotdigital' ),
		)
	),
	'teaser_types' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'teaser_type' => array(
				'type'    => 'image-picker',
				'value'   => 'icon_top',
				'label'   => esc_html__( 'Teaser Type', 'dotdigital' ),
				'desc'    => esc_html__( 'Select one of predefined teaser types', 'dotdigital' ),
				'choices' => array(
					'icon_top'      => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_top.png',
					'icon_left'     => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_left.png',
					'icon_right'    => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/icon_right.png',
					'image_top'     => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/image_top.png',
					'image_left'    => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/image_left.png',
					'image_right'   => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/image_right.png',
				),
				'blank'   => false, // (optional) if true, images can be deselected
			),

		),
		'choices'      => array(
			'icon_top'      => array_merge( $option_teaser_icon, $teaser_center_array ),
			'icon_left'     => $option_teaser_icon,
			'icon_right'    => $option_teaser_icon,
			'image_top'     => array_merge( $option_teaser_image, $teaser_center_array ),
			'image_left'    => $option_teaser_image,
			'image_right'   => $option_teaser_image,
		),
		'show_borders' => true,
	),
	'teaser_style' => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Teaser Box Style', 'dotdigital' ),
		'choices' => array(
			''                             => esc_html__( 'Default (no border or background)', 'dotdigital' ),
			'with_padding big_padding with_border'     => esc_html__( 'Bordered', 'dotdigital' ),
			'with_padding big_padding with_background' => esc_html__( 'Muted Background', 'dotdigital' ),
			'with_padding big_padding with_background ls'              => esc_html__( 'Light background', 'dotdigital' ),
			'with_padding big_padding with_background ls ms'           => esc_html__( 'Grey background', 'dotdigital' ),
			'with_padding big_padding with_background ds'              => esc_html__( 'Dark background', 'dotdigital' ),
			'with_padding big_padding with_background ds ms'           => esc_html__( 'Darkgrey background', 'dotdigital' ),
			'with_padding big_padding with_background cs'              => esc_html__( 'Main color background', 'dotdigital' ),
		)
	),
	'content'      => array(
		'type'  => 'textarea',
		'label' => esc_html__( 'Teaser text', 'dotdigital' ),
		'desc'  => esc_html__( 'Enter desired teaser content', 'dotdigital' ),
	),
);