<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get button to add:
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();

$options = array(
	'tab_main' => array(
		'type' => 'tab',
		'title' => esc_html__('Info', 'dotdigital'),
		'options' => array(
            'price_layout'       => array(
                'label'   => esc_html__( 'Choose a layout', 'dotdigital' ),
                'value'   => '1',
                'type'    => 'select',
                'choices' => array(
                    '1'  => esc_html__( 'Layout 1', 'dotdigital' ),
                )
            ),
			'title'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Pricing plan title', 'dotdigital' ),
			),
            'font_color'       => array(
                'label'   => esc_html__( 'Color of title', 'dotdigital' ),
                'desc'    => esc_html__( 'Choose a color of your title', 'dotdigital' ),
                'value'   => '',
                'type'    => 'select',
                'choices' => array(
                    'highlight'  => esc_html__( 'Color main 1', 'dotdigital' ),
                    'highlight2'  => esc_html__( 'Color main 2', 'dotdigital' ),
                    'lightfont'  => esc_html__( 'White', 'dotdigital' ),
                    'black'  => esc_html__( 'Black', 'dotdigital' ),
                )
            ),
			'description'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Plan description', 'dotdigital' ),
			),
			'currency'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Currency Sign', 'dotdigital' ),
			),
			'price'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Whole price', 'dotdigital' ),
				'desc' => esc_html__( 'Price before decimal divider', 'dotdigital' ),
			),
			'price_after'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Text after price', 'dotdigital' ),
				'desc' => esc_html__( 'Price after decimal divider, including divider (dot, coma etc.), for example ".99", or text "per month"', 'dotdigital' ),
			),
			'features'         => array(
				'type'            => 'addable-box',
				'value'           => '',
				'label'           => esc_html__( 'Pricing plan features', 'dotdigital' ),
				'box-options'     => array(
					'feature_name'   => array(
						'type'  => 'text',
						'value' => '',
						'label' => esc_html__( 'Feature name', 'dotdigital' ),
					),
					'feature_checked' => array(
						'type'        => 'select',
						'value'       => '',
						'label'       => esc_html__( 'Default, checked or unchecked', 'dotdigital' ),
						'choices'     => array(
							'default' => esc_html__( 'Default', 'dotdigital' ),
							'enabled' => esc_html__( 'Enabled', 'dotdigital' ),
							'disabled' => esc_html__( 'Disabled', 'dotdigital'),
						),
						'no-validate' => false,
					),
				),
				'template'        => '{{=feature_name}}',
				'limit'           => 0, // limit the number of boxes that can be added
				'add-button-text' => esc_html__( 'Add', 'dotdigital' ),
				'sortable'        => true,
			),
			'featured' => array(
				'type'  => 'switch',
				'value' => '',
				'label' => esc_html__('Default or featured plan', 'dotdigital'),
				'left-choice' => array(
					'value' => '',
					'label' => esc_html__(' Default', 'dotdigital'),
				),
				'right-choice' => array(
					'value' => 'plan-featured',
					'label' => esc_html__(' Featured', 'dotdigital'),
				),
			),
            'background_color' => array(
                'type'    => 'select',
                'value'   => '',
                'label'   => esc_html__( 'Background color', 'dotdigital' ),
                'desc'    => esc_html__( 'Select background color', 'dotdigital' ),
                'help'    => esc_html__( 'Select one of predefined background types', 'dotdigital' ),
                'choices' => array(
                    'ls'             => esc_html__( 'Light', 'dotdigital' ),
                    'ls ms'          => esc_html__( 'Grey', 'dotdigital' ),
                    'ds'             => esc_html__( 'Dark', 'dotdigital' ),
                    'cs'             => esc_html__( 'Main color', 'dotdigital' ),
                    'cs cs2'             => esc_html__( 'Main color 2', 'dotdigital' ),
                    'cs cs3'             => esc_html__( 'Main color 3', 'dotdigital' ),
                    'cs cs4'             => esc_html__( 'Main color 4', 'dotdigital' ),
                    'transparent'    => esc_html__( 'Transparent', 'dotdigital' ),
                ),
            ),
            'pattern'       => array(
                'label'   => esc_html__( 'Choose a layout', 'dotdigital' ),
                'value'   => '',
                'type'    => 'select',
                'choices' => array(
                    ''  => esc_html__( 'Without pattern', 'dotdigital' ),
                    'pattern_1'  => esc_html__( 'Pattern 1', 'dotdigital' ),
                )
            ),
            'show_btn' => array(
                'type'  => 'switch',
                'value' => '',
                'label' => esc_html__('Show button', 'dotdigital'),
                'left-choice' => array(
                    'value' => '',
                    'label' => esc_html__(' Yes', 'dotdigital'),
                ),
                'right-choice' => array(
                    'value' => 'd-none',
                    'label' => esc_html__(' No', 'dotdigital'),
                ),
            ),
		),
	),
	'tab_button' => array(
		'type' => 'tab',
		'title' => esc_html__('Button', 'dotdigital'),
		'options' => array(
			$button_options,
		),
	),


);