<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );

$options = array(
	'title'     => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Title', 'dotdigital' ),
		'desc'  => esc_html__( 'Enter a title for your video', 'dotdigital' ),
	),
	'description' => array(
		'type'   => 'textarea',
		'label'  => esc_html__( 'Description', 'dotdigital' ),
		'desc'   => esc_html__( 'Enter some description for your video', 'dotdigital' ),
	),
	'button' => array(
		'type'          => 'popup',
		'label'         => esc_html__( 'Button', 'dotdigital' ),
		'popup-title'   => esc_html__( 'Edit Button', 'dotdigital' ),
		'popup-options' => $button->get_options(),
	),
	'media_video'    => array(
		'type'    => 'oembed',
		'value'   => '',
		'label'   => esc_html__( 'Video', 'dotdigital' ),
		'desc'    => esc_html__( 'Adds video player', 'dotdigital' ),
		'preview' => array(
			'width'      => 350, // optional, if you want to set the fixed width to iframe
			'height'     => 250, // optional, if you want to set the fixed height to iframe
			/**
			 * if is set to false it will force to fit the dimensions,
			 * because some widgets return iframe with aspect ratio and ignore applied dimensions
			 */
			'keep_ratio' => true
		),
	),
	'media_image'    => array(
		'type'        => 'upload',
		'value'       => array(),
		'label'       => esc_html__( 'Side media image', 'dotdigital' ),
		'desc'        => esc_html__( 'Select image that you want to appear as one half side image', 'dotdigital' ),
		'images_only' => true,
	),
	'media_position' => array(
		'type'         => 'switch',
		'value'        => 'left_position',
		'label'        => esc_html__( 'Media position', 'dotdigital' ),
		'desc'         => esc_html__( 'Left or right media position', 'dotdigital' ),
		'left-choice'  => array(
			'value' => 'left_position',
			'label' => esc_html__( 'Left', 'dotdigital' ),
		),
		'right-choice' => array(
			'value' => 'right_position',
			'label' => esc_html__( 'Right', 'dotdigital' ),
		),
	),
);
