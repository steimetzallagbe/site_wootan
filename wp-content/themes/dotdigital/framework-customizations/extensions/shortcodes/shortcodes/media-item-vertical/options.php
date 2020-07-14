<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get social icons to add in item:
$icon = fw_ext( 'shortcodes' )->get_shortcode( 'icon' );
//get social icons to add in item:
$icons_social = fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' );

$options = array(
	'title'      => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title of the Box', 'dotdigital' ),
	),
	'title_tag'  => array(
		'type'    => 'select',
		'value'   => 'h3',
		'label'   => esc_html__( 'Title Tag', 'dotdigital' ),
		'choices' => array(
			'h2' => esc_html__( 'H2', 'dotdigital' ),
			'h3' => esc_html__( 'H3', 'dotdigital' ),
			'h4' => esc_html__( 'H4', 'dotdigital' ),
		)
	),
	'content'    => array(
		'type'          => 'wp-editor',
		'label'         => esc_html__( 'Item text', 'dotdigital' ),
		'desc'          => esc_html__( 'Enter desired item content', 'dotdigital' ),
		'size'          => 'small', // small, large
		'editor_height' => 400,
	),
	'item_style' => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Item Box Style', 'dotdigital' ),
		'choices' => array(
			''                                => esc_html__( 'Default (no border or background)', 'dotdigital' ),
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
	'link'       => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Item link', 'dotdigital' ),
		'desc'  => esc_html__( 'Link on title and optional button', 'dotdigital' ),
	),
	'item_image' => array(
		'type'        => 'upload',
		'value'       => '',
		'label'       => esc_html__( 'Item Image', 'dotdigital' ),
		'image'       => esc_html__( 'Image for your item. Not all item layouts show image', 'dotdigital' ),
		'help'        => 'Image for your item. Image can appear as an element, or background or even can be hidden depends from chosen item type',
		'images_only' => true,
	),
	'text_align' => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Text Alignment', 'dotdigital' ),
		'choices' => array(
			'text-left'   => esc_html__( 'Left', 'dotdigital' ),
			'text-center' => esc_html__( 'Center', 'dotdigital' ),
			'text-right'  => esc_html__( 'Right', 'dotdigital' ),
		)
	),
	'icons'      => array(
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