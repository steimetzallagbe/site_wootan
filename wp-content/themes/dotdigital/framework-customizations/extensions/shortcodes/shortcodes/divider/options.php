<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'style' => array(
		'type'     => 'multi-picker',
		'label'    => false,
		'desc'     => false,
		'picker' => array(
			'ruler_type' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Ruler Type', 'dotdigital' ),
				'desc'    => esc_html__( 'Here you can set the styling and size of the HR element', 'dotdigital' ),
				'choices' => array(
					'line'  => esc_html__( 'Line', 'dotdigital' ),
					'space' => esc_html__( 'Whitespace', 'dotdigital' ),
				)
			)
		),
		'choices'     => array(
			'space' => array(
				'height' => array(
					'label' => esc_html__( 'Height', 'dotdigital' ),
					'desc'  => esc_html__( 'How much whitespace do you need?', 'dotdigital' ),
					'type'  => 'text',
					'value' => '50'
				)
			),
		)
	),
	'responsive'         => array(
		'attr'          => array( 'class' => 'fw-advanced-button' ),
		'type'          => 'popup',
		'label'         => esc_html__( 'Responsive visibility', 'dotdigital' ),
		'button'        => esc_html__( 'Settings', 'dotdigital' ),
		'size'          => 'medium',
		'popup-options' => array(
			'hidden_lg'     => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Large', 'dotdigital' ),
						'desc'         => esc_html__( 'Display on large screen?', 'dotdigital' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'dotdigital' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'dotdigital' ),
						)
					),
				),
			),
			'hidden_md'     => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Desktop', 'dotdigital' ),
						'desc'         => esc_html__( 'Display on desktop?', 'dotdigital' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'dotdigital' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'dotdigital' ),
						)
					),
				),
			),
			'hidden_sm'     => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Tablet', 'dotdigital' ),
						'desc'         => esc_html__( 'Display on tablet?', 'dotdigital' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'dotdigital' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'dotdigital' ),
						)
					),
				),
			),
			'hidden_xs' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Small devices', 'dotdigital' ),
						'desc'         => esc_html__( 'Display on small devices?', 'dotdigital' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'dotdigital' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'dotdigital' ),
						)
					),
				),
				'choices' => array(),
			),
		),
	),
);
