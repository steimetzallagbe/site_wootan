<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'steps'      => array(
		'type'        => 'addable-box',
		'value'       => '',
		'label'       => esc_html__( 'Steps', 'dotdigital' ),
		'box-options' => array(
			'step_title'=> array(
				'type'  => 'text',
				'label' => esc_html__( 'Step Title', 'dotdigital' ),
				'desc'  => esc_html__( 'This can be left blank', 'dotdigital' )
			),
			'step_text' => array(
				'type'  => 'textarea',
				'value' => '',
				'label' => esc_html__( 'Step Text', 'dotdigital' ),
			),
			'step_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Step Image', 'dotdigital' ),
				'images_only' => true,
			),
			'number_color'       => array(
				'label'   => esc_html__( 'Number Color', 'dotdigital' ),
				'type'    => 'select',
				'choices' => array(
					'color1'  => esc_html__( 'Main color 1', 'dotdigital' ),
					'color2'  => esc_html__( 'Main color 2', 'dotdigital' ),
					'color3'  => esc_html__( 'Main color 3', 'dotdigital' ),
					'color4'  => esc_html__( 'Main color 4', 'dotdigital' ),
				)
			),
			'step_custom_class' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Custom class', 'dotdigital' ),
				'desc'  => esc_html__( 'Add step custom css class', 'dotdigital' ),
			),
		),
		'template'    => '{{- step_title }}',
	)
);