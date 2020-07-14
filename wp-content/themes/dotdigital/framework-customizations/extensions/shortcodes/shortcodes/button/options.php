<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'label'       => array(
		'label' => esc_html__( 'Button Label', 'dotdigital' ),
		'desc'  => esc_html__( 'This is the text that appears on your button', 'dotdigital' ),
		'type'  => 'text',
		'value' => 'Submit'
	),
	'link'        => array(
		'label' => esc_html__( 'Button Link', 'dotdigital' ),
		'desc'  => esc_html__( 'Where should your button link to', 'dotdigital' ),
		'type'  => 'text',
		'value' => '#'
	),
	'target'      => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Open Link in New Window', 'dotdigital' ),
		'desc'         => esc_html__( 'Select here if you want to open the linked page in a new window', 'dotdigital' ),
		'right-choice' => array(
			'value' => '_blank',
			'label' => esc_html__( 'Yes', 'dotdigital' ),
		),
		'left-choice'  => array(
			'value' => '_self',
			'label' => esc_html__( 'No', 'dotdigital' ),
		),
	),
	'size'      => array(
		'type'         => 'select',
		'label'        => esc_html__( 'Button size', 'dotdigital' ),
		'desc'         => esc_html__( 'Select button size', 'dotdigital' ),
		'value' => 'medium_height',
		'choices' => array(
			'small_height'  => esc_html__( 'Small', 'dotdigital' ),
			'medium_height'  => esc_html__( 'Medium', 'dotdigital' ),
			'large_height' => esc_html__( 'Large', 'dotdigital' ),
		),
	),
	'type'       => array(
		'label'   => esc_html__( 'Button Type', 'dotdigital' ),
		'desc'    => esc_html__( 'Choose a type for your button', 'dotdigital' ),
		'type'    => 'select',
		'choices' => array(
			'theme_button color'  => esc_html__( 'Color', 'dotdigital' ),
			'theme_button inverse' => esc_html__( 'Inverse', 'dotdigital' ),
			'simple_link'          => esc_html__( 'Just link', 'dotdigital' ),
		)
	),
	'color'       => array(
		'label'   => esc_html__( 'Button Color', 'dotdigital' ),
		'desc'    => esc_html__( 'Choose a color for your button', 'dotdigital' ),
		'type'    => 'select',
		'choices' => array(
			'color1'  => esc_html__( 'Main color 1', 'dotdigital' ),
			'color2'  => esc_html__( 'Main color 2', 'dotdigital' ),
			'color3'  => esc_html__( 'Main color 3', 'dotdigital' ),
			'color4'  => esc_html__( 'Main color 4', 'dotdigital' ),
			'color_white'  => esc_html__( 'White color', 'dotdigital' ),
			'color_grey'  => esc_html__( 'Grey color', 'dotdigital' ),
		)
	),
);