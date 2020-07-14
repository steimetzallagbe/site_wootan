<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'unique_id'              => array(
		'type'   => 'unique',
		'length' => 7
	),
	'tab_main_options'          => array(
		'type'    => 'tab',
		'title'   => esc_html__( 'Main Options', 'dotdigital' ),
		'options' => array(
			'section_name' => array(
				'label' => esc_html__( 'Section Name', 'dotdigital' ),
				'desc'  => esc_html__( 'Enter a name (it is for internal use and will not appear on the front end)', 'dotdigital' ),
				'help'  => esc_html__( 'Use this option to name your sections. It will help you go through the structure a lot easier.', 'dotdigital' ),
				'type'  => 'text',
			),
			'section_style'       => array(
				'type'    => 'image-picker',
				'value'   => ' ',
				'attr'    => array(
					'class'    => 'section-thumbnail',
					'data-foo' => 'section',
				),
				'label'   => esc_html__( 'Section Style', 'dotdigital' ),
				'desc'    => esc_html__( 'Select one of predefined section style', 'dotdigital' ),
				'choices' => array(
					' ' => DOTDIGITAL_THEME_URI . '/img/section-options/section-default.png',
					'skew_right' => DOTDIGITAL_THEME_URI . '/img/section-options/section-skew-right.png',
					'skew_left' => DOTDIGITAL_THEME_URI . '/img/section-options/section-skew-left.png',
					'top_corner_inverse' => DOTDIGITAL_THEME_URI . '/img/section-options/section-top-corner-inverse.png',
					'top_corner_inverse bottom_corner' => DOTDIGITAL_THEME_URI . '/img/section-options/section-corner-both.png',
					'top_corner_inverse bottom_corner_inverse' => DOTDIGITAL_THEME_URI . '/img/section-options/section-corner-both-2.png',
					'oval-bottom' => DOTDIGITAL_THEME_URI . '/img/section-options/section-oval-bottom.png'
				),
				'blank'   => false, // (optional) if true, image can be deselected
			),
			'is_fullwidth' => array(
				'label' => esc_html__( 'Full Width', 'dotdigital' ),
				'type'  => 'switch',
			),
			'horizontal_paddings' => array(
				'type'         => 'select',
				'value'        => '',
				'label'        => esc_html__( 'Horizontal paddings', 'dotdigital' ),
				'desc'         => esc_html__( 'Section horizontal paddings', 'dotdigital' ),
				'choices' => array(
					''  => esc_html__( 'Default', 'dotdigital' ),
					'horizontal-paddings-0' => esc_html__( 'None', 'dotdigital' ),
					'horizontal-paddings-150' => esc_html__( 'Extra large (150px)', 'dotdigital' ),
				),
			),
			'background_color' => array(
				'type'    => 'select',
				'value'   => 'ls',
				'label'   => esc_html__( 'Background color', 'dotdigital' ),
				'desc'    => esc_html__( 'Select background color', 'dotdigital' ),
				'help'    => esc_html__( 'Select one of predefined background colors', 'dotdigital' ),
				'choices' => array(
					'ls'             => esc_html__( 'Light', 'dotdigital' ),
					'ls ms'          => esc_html__( 'Grey', 'dotdigital' ),
					'ds'             => esc_html__( 'Dark', 'dotdigital' ),
					'ds dark'        => esc_html__( 'Dark Grey', 'dotdigital' ),
					'cs'             => esc_html__( 'Main color', 'dotdigital' ),
					'transparent'    => esc_html__( 'Transparent', 'dotdigital' ),
				),
			),
			'top_padding'      => array(
				'type'    => 'select',
				'value'   => 'section_padding_top_50',
				'label'   => esc_html__( 'Top padding', 'dotdigital' ),
				'desc'    => esc_html__( 'Choose top padding value', 'dotdigital' ),
				'choices' => array(
					'section_padding_top_0'   => esc_html__( '0', 'dotdigital' ),
					'section_padding_top_5'   => esc_html__( '5 px', 'dotdigital' ),
					'section_padding_top_15'  => esc_html__( '15 px', 'dotdigital' ),
					'section_padding_top_25'  => esc_html__( '25 px', 'dotdigital' ),
					'section_padding_top_30'  => esc_html__( '30 px', 'dotdigital' ),
					'section_padding_top_40'  => esc_html__( '40 px', 'dotdigital' ),
					'section_padding_top_50'  => esc_html__( '50 px', 'dotdigital' ),
					'section_padding_top_65'  => esc_html__( '65 px', 'dotdigital' ),
					'section_padding_top_75'  => esc_html__( '75 px', 'dotdigital' ),
					'section_padding_top_85'  => esc_html__( '85 px', 'dotdigital' ),
					'section_padding_top_100' => esc_html__( '100 px', 'dotdigital' ),
					'section_padding_top_130' => esc_html__( '130 px', 'dotdigital' ),
					'section_padding_top_150' => esc_html__( '150 px', 'dotdigital' ),
					'section_padding_top_170' => esc_html__( '170 px', 'dotdigital' ),
					'section_padding_top_200' => esc_html__( '200 px', 'dotdigital' ),
				),
			),
			'bottom_padding'   => array(
				'type'    => 'select',
				'value'   => 'section_padding_bottom_50',
				'label'   => esc_html__( 'Bottom padding', 'dotdigital' ),
				'desc'    => esc_html__( 'Choose bottom padding value', 'dotdigital' ),
				'choices' => array(
					'section_padding_bottom_0'   => esc_html__( '0', 'dotdigital' ),
					'section_padding_bottom_5'   => esc_html__( '5 px', 'dotdigital' ),
					'section_padding_bottom_15'  => esc_html__( '15 px', 'dotdigital' ),
					'section_padding_bottom_25'  => esc_html__( '25 px', 'dotdigital' ),
					'section_padding_bottom_30'  => esc_html__( '30 px', 'dotdigital' ),
					'section_padding_bottom_40'  => esc_html__( '40 px', 'dotdigital' ),
					'section_padding_bottom_50'  => esc_html__( '50 px', 'dotdigital' ),
					'section_padding_bottom_65'  => esc_html__( '65 px', 'dotdigital' ),
					'section_padding_bottom_75'  => esc_html__( '75 px', 'dotdigital' ),
					'section_padding_bottom_85'  => esc_html__( '85 px', 'dotdigital' ),
					'section_padding_bottom_100' => esc_html__( '100 px', 'dotdigital' ),
					'section_padding_bottom_130' => esc_html__( '130 px', 'dotdigital' ),
					'section_padding_bottom_150' => esc_html__( '150 px', 'dotdigital' ),
					'section_padding_bottom_170' => esc_html__( '170 px', 'dotdigital' ),
					'section_padding_bottom_200' => esc_html__( '200 px', 'dotdigital' ),
				),
			),
			'columns_padding'  => array(
				'type'    => 'select',
				'value'   => 'columns_padding_15',
				'label'   => esc_html__( 'Column paddings', 'dotdigital' ),
				'desc'    => esc_html__( 'Choose columns horizontal paddings value', 'dotdigital' ),
				'choices' => array(
					'columns_padding_0'  => esc_html__( '0', 'dotdigital' ),
					'columns_padding_1'  => esc_html__( '1 px', 'dotdigital' ),
					'columns_padding_2'  => esc_html__( '2 px', 'dotdigital' ),
					'columns_padding_5'  => esc_html__( '5 px', 'dotdigital' ),
					'columns_padding_15' => esc_html__( '15 px - default', 'dotdigital' ),
					'columns_padding_25' => esc_html__( '25 px', 'dotdigital' ),
					'columns_padding_30' => esc_html__( '30 px', 'dotdigital' ),
					'columns_padding_60' => esc_html__( '60 px - large', 'dotdigital' ),
					'columns_padding_80' => esc_html__( '80 px - extra large', 'dotdigital' ),
				),
			),
			'background_image' => array(
				'label'   => esc_html__( 'Background Image', 'dotdigital' ),
				'desc'    => esc_html__( 'Please select the background image', 'dotdigital' ),
				'type'    => 'background-image',
				'choices' => array(//	in future may will set predefined images
				)
			),
			'background_cover' => array(
				'label' => esc_html__( 'Background Cover', 'dotdigital' ),
				'type'  => 'switch',
			),
			'parallax'         => array(
				'label' => esc_html__( 'Parallax', 'dotdigital' ),
				'type'  => 'switch',
			),
			'section_overlay'  => array(
				'label' => esc_html__( 'Section overlay', 'dotdigital' ),
				'type'  => 'switch',
			),
            'mobile_section_overlay'  => array(
                'label' => esc_html__( 'Mobile section overlay', 'dotdigital' ),
                'type'  => 'switch',
            ),
			'is_table'         => array(
				'label' => esc_html__( 'Vertical align content', 'dotdigital' ),
				'desc'  => esc_html__( 'Align columns content vertically on wide screens', 'dotdigital' ),
				'type'  => 'switch',
			),
			'section_id'       => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'ID attribute', 'dotdigital' ),
				'desc'  => esc_html__( 'Add ID attribute to section. Useful for single page menu', 'dotdigital' ),
			),
			'custom_class'     => array(
				'label' => esc_html__( 'Custom Class', 'dotdigital' ),
				'desc'  => esc_html__( 'Add custom class for section', 'dotdigital' ),
				'type'  => 'text',
			),
		),
	),
	'tab_onehalf_media_options' => array(
		'type'    => 'tab',
		'title'   => esc_html__( 'One half width Media', 'dotdigital' ),
		'options' => array(
			'enable_onehalf_media' => array(
				'type'         => 'switch',
				'value'        => '',
				'label'        => esc_html__( 'Enable onehalf media', 'dotdigital' ),
				'left-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'No', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => 'half_section',
					'label' => esc_html__( 'Yes', 'dotdigital' ),
				)
			),
			'side_media_image'    => array(
				'type'        => 'upload',
				'value'       => array(),
				'label'       => esc_html__( 'Side media image', 'dotdigital' ),
				'desc'        => esc_html__( 'Select image that you want to appear as one half side image', 'dotdigital' ),
				'images_only' => true,
			),
			'side_media_link'     => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Link to your side media', 'dotdigital' ),
				'desc'  => esc_html__( 'You can add a link to your side media. If YouTube link will be provided, video will play in LightBox', 'dotdigital' ),
			),
			'side_media_video'    => array(
				'type'    => 'oembed',
				'value'   => '',
				'label'   => esc_html__( 'Video', 'dotdigital' ),
				'desc'    => esc_html__( 'Adds video player', 'dotdigital' ),
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
			'side_media_position' => array(
				'type'         => 'switch',
				'value'        => 'image_cover_left',
				'label'        => esc_html__( 'Media position', 'dotdigital' ),
				'desc'         => esc_html__( 'Left or right media position', 'dotdigital' ),
				'left-choice'  => array(
					'value' => 'image_cover_left',
					'label' => esc_html__( 'Left', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => 'image_cover_right',
					'label' => esc_html__( 'Right', 'dotdigital' ),
				),
			),
		),
	),
);
