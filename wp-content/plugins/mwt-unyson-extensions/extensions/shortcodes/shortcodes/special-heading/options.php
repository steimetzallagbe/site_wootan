<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'heading_align' => array(
		'type'    => 'select',
		'value'   => 'text-left',
		'label'   => esc_html__( 'Text alignment', 'dotdigital' ),
		'desc'    => esc_html__( 'Select heading text alignment', 'dotdigital' ),
		'choices' => array(
			'text-left'   => esc_html__( 'Left', 'dotdigital' ),
			'text-center' => esc_html__( 'Center', 'dotdigital' ),
			'text-right'  => esc_html__( 'Right', 'dotdigital' ),
		),
	),
	'headings'      => array(
		'type'        => 'addable-box',
		'value'       => '',
		'label'       => esc_html__( 'Headings', 'dotdigital' ),
		'desc'        => esc_html__( 'Choose a tag and text inside it', 'dotdigital' ),
		'box-options' => array(
			'heading_tag'            => array(
				'type'    => 'select',
				'value'   => 'h3',
				'label'   => esc_html__( 'Heading tag', 'dotdigital' ),
				'desc'    => esc_html__( 'Select a tag for your ', 'dotdigital' ),
				'choices' => array(
					'h1' => esc_html__( 'H1 tag', 'dotdigital' ),
					'h2' => esc_html__( 'H2 tag', 'dotdigital' ),
					'h3' => esc_html__( 'H3 tag', 'dotdigital' ),
					'h4' => esc_html__( 'H4 tag', 'dotdigital' ),
					'h5' => esc_html__( 'H5 tag', 'dotdigital' ),
					'h6' => esc_html__( 'H6 tag', 'dotdigital' ),
					'p'  => esc_html__( 'P tag', 'dotdigital' ),
				),
			),
			'heading_text'           => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Heading text', 'dotdigital' ),
				'desc'  => esc_html__( 'Text to appear in slide layer', 'dotdigital' ),
			),
			'heading_text_color'     => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading text color', 'dotdigital' ),
				'desc'    => esc_html__( 'Select a color for your text in layer', 'dotdigital' ),
				'choices' => array(
					''           => 'Inherited',
					'highlight'  => esc_html__( 'Main color', 'dotdigital' ),
					'highlight2'  => esc_html__( 'Main color 2', 'dotdigital' ),
					'darkgrey'       => esc_html__( 'Dark color', 'dotdigital' ),
					'greyfont'      => esc_html__( 'Grey color', 'dotdigital' ),
					'lightfont'      => esc_html__( 'Light color', 'dotdigital' ),
				),
			),
			'heading_text_weight'    => array(
				'type'    => 'select',
				'value'   => 'medium',
				'label'   => esc_html__( 'Heading text weight', 'dotdigital' ),
				'desc'    => esc_html__( 'Select a weight for your text in layer', 'dotdigital' ),
				'choices' => array(
					'extra-light'     => esc_html__( 'Extra Light', 'dotdigital' ),
					'light-weight'     => esc_html__( 'Light', 'dotdigital' ),
					'regular'     => esc_html__( 'Normal', 'dotdigital' ),
					'medium' => esc_html__( 'Medium', 'dotdigital' ),
					'bold' => esc_html__( 'Bold', 'dotdigital' ),
					'black-weight' => esc_html__( 'Black Weight', 'dotdigital' ),
				),
			),
			'heading_text_transform' => array(
				'type'    => 'select',
				'value'   => 'text-transform-none',
				'label'   => esc_html__( 'Heading text transform', 'dotdigital' ),
				'desc'    => esc_html__( 'Select a weight for your text in layer', 'dotdigital' ),
				'choices' => array(
					'text-transform-none'                => 'None',
					'text-lowercase'  => esc_html__( 'Lowercase', 'dotdigital' ),
					'text-uppercase'  => esc_html__( 'Uppercase', 'dotdigital' ),
					'text-capitalize' => esc_html__( 'Capitalize', 'dotdigital' ),
				),
			),
			'heading_custom_class' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Heading custom class', 'dotdigital' ),
				'desc'  => esc_html__( 'Add heading custom css class', 'dotdigital' ),
			),
		),
		'template'    => '{{- heading_text }}',
	)
);
