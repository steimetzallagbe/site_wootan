<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'post-layout-section'         => array(
		'title'   => esc_html__( 'Featured Image Position', 'dotdigital' ),
		'type'    => 'box',
		'context' => 'side',
		'options' => array(
			'post-layout' => array(
				'type'    => 'image-picker',
				'value'   => 'post-layout-standard',
				'label'   => esc_html__( 'Post layout in blog feed', 'dotdigital' ),
				'desc'    => esc_html__( 'Position of image in blog feed', 'dotdigital' ),
				'help'    => esc_html__( 'Standard position of image at the top of the post. Or small image at the left of the post. Works only if featured image chosen.', 'dotdigital' ),
				'choices' => array(
					'post-layout-standard' => DOTDIGITAL_THEME_URI . '/img/theme-options/post-layout-standard.png',
					'post-layout-small'    => DOTDIGITAL_THEME_URI . '/img/theme-options/post-layout-small.png',
				),
			),
			'show-readmore' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Post read more link', 'dotdigital' ),
				'value'        => 'readmore-hidden',
				'left-choice'  => array(
					'value' => 'readmore-hidden',
					'label' => esc_html__( 'Hide', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => '',
					'label' => esc_html__( 'Show', 'dotdigital' ),
				),
			),
		),
	),
	'post-featured-video-section' => array(
		'title'   => esc_html__( 'Post Featured Video', 'dotdigital' ),
		'type'    => 'box',
		'context' => 'side',

		'options' => array(
			'post-featured-video' => array(
				'type'    => 'oembed',
				'value'   => '',
				'label'   => esc_html__( 'Featured Video', 'dotdigital' ),
				'desc'    => esc_html__( 'Adds featured video', 'dotdigital' ),
				'help'    => esc_html__( 'Leave blank if no needed', 'dotdigital' ),
				'preview' => array(
					'width'      => 278, // optional, if you want to set the fixed width to iframe
					'height'     => 185, // optional, if you want to set the fixed height to iframe
					/**
					 * if is set to false it will force to fit the dimensions,
					 * because some widgets return iframe with aspect ratio and ignore applied dimensions
					 */
					'keep_ratio' => true
				),
			),
		),
	),
);
