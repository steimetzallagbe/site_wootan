<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'image'            => array(
		'type'  => 'upload',
		'label' => esc_html__( 'Choose Image', 'dotdigital' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'dotdigital' )
	),
	'size'             => array(
		'type'    => 'group',
		'options' => array(
			'width'  => array(
				'type'  => 'text',
				'label' => esc_html__( 'Width', 'dotdigital' ),
				'desc'  => esc_html__( 'Set image width', 'dotdigital' ),
				'value' => 300
			),
			'height' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Height', 'dotdigital' ),
				'desc'  => esc_html__( 'Set image height', 'dotdigital' ),
				'value' => 200
			)
		)
	),
	'image-link-group' => array(
		'type'    => 'group',
		'options' => array(
			'link'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Image Link', 'dotdigital' ),
				'desc'  => esc_html__( 'Where should your image link to?', 'dotdigital' )
			),
			'target' => array(
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
	'custom_class' => array(
		'label' => esc_html__('Custom Class', 'dotdigital'),
		'desc'  => esc_html__('Add custom class', 'dotdigital'),
		'type'  => 'text',
	)
);

