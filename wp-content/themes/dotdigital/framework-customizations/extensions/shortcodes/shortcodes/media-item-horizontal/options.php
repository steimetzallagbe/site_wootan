<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get social icons to add in item:
$icon = fw_ext( 'shortcodes' )->get_shortcode( 'icon' );
//get social icons to add in item:
$icons_social = fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' );

$options = array(
	'title'         => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title of the Box', 'dotdigital' ),
	),
	'title_tag'     => array(
		'type'    => 'select',
		'value'   => 'h3',
		'label'   => esc_html__( 'Title Tag', 'dotdigital' ),
		'choices' => array(
			'h2' => esc_html__( 'H2', 'dotdigital' ),
			'h3' => esc_html__( 'H3', 'dotdigital' ),
			'h4' => esc_html__( 'H4', 'dotdigital' ),
		)
	),
	'content'       => array(
		'type'          => 'wp-editor',
		'label'         => esc_html__( 'Item text', 'dotdigital' ),
		'desc'          => esc_html__( 'Enter desired item content', 'dotdigital' ),
		'size'          => 'small', // small, large
		'editor_height' => 400,
	),
	'item_style'    => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Item Box Style', 'dotdigital' ),
		'choices' => array(
			'no-content-padding'              => esc_html__( 'Default (no border or background)', 'dotdigital' ),
			'content-padding with_border'     => esc_html__( 'Bordered', 'dotdigital' ),
			'content-padding with_background' => esc_html__( 'Muted Background', 'dotdigital' ),
			'content-padding ls ms'           => esc_html__( 'Grey background', 'dotdigital' ),
			'content-padding ds'              => esc_html__( 'Darkgrey background', 'dotdigital' ),
			'content-padding ds ms'           => esc_html__( 'Dark background', 'dotdigital' ),
			'content-padding cs'              => esc_html__( 'Main color background', 'dotdigital' ),
			'full-padding with_border'        => esc_html__( 'Bordered with Padding', 'dotdigital' ),
			'full-padding with_background'    => esc_html__( 'Muted Background with Padding', 'dotdigital' ),
			'full-padding ls ms'              => esc_html__( 'Grey background with Padding', 'dotdigital' ),
			'full-padding ds'                 => esc_html__( 'Darkgrey background with Padding', 'dotdigital' ),
			'full-padding ds ms'              => esc_html__( 'Dark background with Padding', 'dotdigital' ),
			'full-padding cs'                 => esc_html__( 'Main color background with Padding', 'dotdigital' ),
		)
	),
	'link'          => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Item link', 'dotdigital' ),
		'desc'  => esc_html__( 'Link on title and optional button', 'dotdigital' ),
	),
	'item_image'    => array(
		'type'        => 'upload',
		'value'       => '',
		'label'       => esc_html__( 'Item Image', 'dotdigital' ),
		'image'       => esc_html__( 'Image for your item. Not all item layouts show image', 'dotdigital' ),
		'help'        => 'Image for your item. Image can appear as an element, or background or even can be hidden depends from chosen item type',
		'images_only' => true,
	),
	'image_right'   => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Image to the right', 'dotdigital' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'dotdigital' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'dotdigital' ),
		),
	),
	'responsive_lg' => array(
		'label'   => esc_html__( 'Image width on wide screens', 'dotdigital' ),
		'desc'    => esc_html__( 'Select image column width on wide screens (>1200px)', 'dotdigital' ),
		'value'   => '6',
		'type'    => 'select',
		'choices' => array(
			'12' => esc_html__( 'Full Width', 'dotdigital' ),
			'6'  => esc_html__( '1/2', 'dotdigital' ),
			'4'  => esc_html__( '1/3', 'dotdigital' ),
			'3'  => esc_html__( '1/4', 'dotdigital' ),
		)
	),
	'responsive_md' => array(
		'label'   => esc_html__( 'Image width on middle screens', 'dotdigital' ),
		'desc'    => esc_html__( 'Select image column width on middle screens (>992px)', 'dotdigital' ),
		'value'   => '4',
		'type'    => 'select',
		'choices' => array(
			'12' => esc_html__( 'Full Width', 'dotdigital' ),
			'6'  => esc_html__( '1/2', 'dotdigital' ),
			'4'  => esc_html__( '1/3', 'dotdigital' ),
			'3'  => esc_html__( '1/4', 'dotdigital' ),
		)
	),
	'responsive_sm' => array(
		'label'   => esc_html__( 'Image width on small screens', 'dotdigital' ),
		'desc'    => esc_html__( 'Select image column width on small screens (>768px)', 'dotdigital' ),
		'value'   => '2',
		'type'    => 'select',
		'choices' => array(
			'12' => esc_html__( 'Full Width', 'dotdigital' ),
			'6'  => esc_html__( '1/2', 'dotdigital' ),
			'4'  => esc_html__( '1/3', 'dotdigital' ),
			'3'  => esc_html__( '1/4', 'dotdigital' ),
		)
	),
	'responsive_xs' => array(
		'label'   => esc_html__( 'Image width on extra small screens', 'dotdigital' ),
		'desc'    => esc_html__( 'Select image column width on extra small screens (<767px)', 'dotdigital' ),
		'value'   => '1',
		'type'    => 'select',
		'choices' => array(
			'12' => esc_html__( 'Full Width', 'dotdigital' ),
			'6'  => esc_html__( '1/2', 'dotdigital' ),
			'4'  => esc_html__( '1/3', 'dotdigital' ),
			'3'  => esc_html__( '1/4', 'dotdigital' ),
		)
	),
	'icons'         => array(
		'type'            => 'addable-box',
		'value'           => '',
		'label'           => esc_html__( 'Additional info', 'dotdigital' ),
		'desc'            => esc_html__( 'Add icons with title and text', 'dotdigital' ),
		'box-options'     => $icon->get_options(),
		'add-button-text' => esc_html__( 'Add New', 'dotdigital' ),
		'template'        => '{{=title}}',
		'sortable'        => true,
	),
	$icons_social->get_options(),

);