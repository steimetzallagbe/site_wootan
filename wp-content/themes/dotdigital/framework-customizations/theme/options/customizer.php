<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in WordPress customizer
 */


/* color defaults */
$defaults = dotdigital_get_theme_colors_defaults();
/* color palette */
$color_palette = dotdigital_set_color_palette();

if ( ( ! class_exists( 'Wp_Scss' ) ) ) {
	$color_section = array();
} else {
	$color_section = array(
		'accent_colors_section' => array(
			'title'   => esc_html__( 'Theme Colors', 'dotdigital' ),
			'options' => array(
				'accent_color_1' => array(
					'label' => esc_html__( 'Accent Color 1', 'dotdigital' ),
					'desc'  => esc_html__( 'Set accent color 1', 'dotdigital' ),
					'type'  => 'color-picker',
					'value' => $defaults['color_1'],
					'wp-customizer-setting-args' => array(
							'transport' => 'postMessage',
					),
					'wp-customizer-args' => array(
						'active_callback' => 'dotdigital_wp_scss_is_installed',
					),
				),
				'accent_color_2' => array(
					'label' => esc_html__( 'Accent Color 2', 'dotdigital' ),
					'desc'  => esc_html__( 'Set accent color 2', 'dotdigital' ),
					'type'  => 'color-picker',
					'value' => $defaults['color_2'],
					'wp-customizer-setting-args' => array(
							'transport' => 'postMessage',
					),
					'wp-customizer-args' => array(
						'active_callback' => 'dotdigital_wp_scss_is_installed',
					),
				),
				'accent_color_3' => array(
					'label' => esc_html__( 'Accent Color 3', 'dotdigital' ),
					'desc'  => esc_html__( 'Set accent color 3', 'dotdigital' ),
					'type'  => 'color-picker',
					'value' => $defaults['color_3'],
					'wp-customizer-setting-args' => array(
							'transport' => 'postMessage',
					),
					'wp-customizer-args' => array(
						'active_callback' => 'dotdigital_wp_scss_is_installed',
					),
				),
				'accent_color_4' => array(
					'label' => esc_html__( 'Accent Color 4', 'dotdigital' ),
					'desc'  => esc_html__( 'Set accent color 4', 'dotdigital' ),
					'type'  => 'color-picker',
					'value' => $defaults['color_4'],
					'wp-customizer-setting-args' => array(
							'transport' => 'postMessage',
					),
					'wp-customizer-args' => array(
						'active_callback' => 'dotdigital_wp_scss_is_installed',
					),
				),
			),
		),
	);
}

//find fw_ext
$shortcodes_extension = fw()->extensions->get( 'shortcodes' );

$slider_extension = fw()->extensions->get( 'slider' );
$choices = '';
if ( ! empty ( $slider_extension ) ) {
	$choices = $slider_extension->get_populated_sliders_choices();
}

//header button
$header_button  = array();
if ( ! empty( $shortcodes_extension ) ) {
	$header_button = $shortcodes_extension->get_shortcode( 'button' )->get_options();
}

//header social icons
$header_social_icons  = array();
if ( ! empty( $shortcodes_extension ) ) {
	$header_social_icons = $shortcodes_extension->get_shortcode( 'icons_social' )->get_options();
}

//adding empty value to disable slider
$choices['0'] = esc_html__( 'No Slider', 'dotdigital' );

$options = array(
	'logo_section'    => array(
		'title'   => esc_html__( 'Site Logo', 'dotdigital' ),
		'options' => array(
			'logo_image'             => array(
				'type'        => 'upload',
				'value'       => array(),
				'attr'        => array( 'class' => 'logo_image-class', 'data-logo_image' => 'logo_image' ),
				'label'       => esc_html__( 'Main logo image that appears in header', 'dotdigital' ),
				'desc'        => esc_html__( 'Select your logo', 'dotdigital' ),
				'help'        => esc_html__( 'Choose image to display as a site logo', 'dotdigital' ),
				'images_only' => true,
				'files_ext'   => array( 'png', 'jpg', 'jpeg', 'gif', 'svg' ),
			),
			'logo_text'              => array(
				'type'  => 'text',
				'value' => 'Dotdigital',
				'attr'  => array( 'class' => 'logo_text-class', 'data-logo_text' => 'logo_text' ),
				'label' => esc_html__( 'Logo Text', 'dotdigital' ),
				'desc'  => esc_html__( 'Text that appears near logo image', 'dotdigital' ),
				'help'  => esc_html__( 'Type your text to show it in logo', 'dotdigital' ),
			),
			'logo_subtext'              => array(
				'type'  => 'text',
				'value' => 'WordPress Theme',
				'attr'  => array( 'class' => 'logo_subtext-class', 'data-logo_subtext' => 'logo_subtext' ),
				'label' => esc_html__( 'Logo Tagline', 'dotdigital' ),
				'desc'  => esc_html__( 'Text that appears near logo text', 'dotdigital' ),
			),
		),
	),
	'blog_posts' => array(
		'title'   => esc_html__( 'Theme Blog', 'dotdigital' ),
		'options' => array(
			'post_categories'         => array(
				'label'        => esc_html__( 'Post Categories', 'dotdigital' ),
				'desc'         => esc_html__( 'Show post categories?', 'dotdigital' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'dotdigital' )
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'No', 'dotdigital' )
				),
				'value'        => 'yes',
			),
			'post_author'         => array(
				'label'        => esc_html__( 'Post Author', 'dotdigital' ),
				'desc'         => esc_html__( 'Show post author?', 'dotdigital' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'dotdigital' )
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'No', 'dotdigital' )
				),
				'value'        => 'yes',
			),
			'post_date'         => array(
				'label'        => esc_html__( 'Post Date', 'dotdigital' ),
				'desc'         => esc_html__( 'Show post date?', 'dotdigital' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'dotdigital' )
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'No', 'dotdigital' )
				),
				'value'        => 'yes',
			),
			'post_tags'         => array(
				'label'        => esc_html__( 'Post Tags', 'dotdigital' ),
				'desc'         => esc_html__( 'Show post tags?', 'dotdigital' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'dotdigital' )
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'No', 'dotdigital' )
				),
				'value'        => 'yes',
			),
			'blog_layout' => array(
				'type'        => 'select',
				'value'       => 'regular',
				'label'       => esc_html__( 'Blog Layout', 'dotdigital' ),
				'desc'        => esc_html__( 'Select blog feed layout', 'dotdigital' ),
				'choices'     => array(
					'regular'        => esc_html__( 'Regular', 'dotdigital' ),
					'grid'           => esc_html__( 'Grid', 'dotdigital' ),
				),
			),
			'blog_slider_switch' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'blog_slider_enabled' => array(
						'type'         => 'switch',
						'value'        => '',
						'label'        => esc_html__( 'Post slider', 'dotdigital' ),
						'desc'         => esc_html__( 'Enable slider on blog page', 'dotdigital' ),
						'left-choice'  => array(
							'value' => '',
							'label' => esc_html__( 'No', 'dotdigital' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'dotdigital' ),
						),
					),
				),
				'choices' => array(
					'yes' => array(
						'slider_id' => array(
							'type'    => 'select',
							'value'   => '',
							'label'   => esc_html__( 'Select Slider', 'dotdigital' ),
							'choices' => $choices
						),
					),
				),
			),
		)
	),
	'headers'     => array(
		'title'   => esc_html__( 'Theme Header', 'dotdigital' ),
		'options' => array(

			'header'       => array(
				'type'    => 'image-picker',
				'value'   => '1',
				'attr'    => array(
					'class'    => 'header-thumbnail',
					'data-foo' => 'header',
				),
				'label'   => esc_html__( 'Template Header', 'dotdigital' ),
				'desc'    => esc_html__( 'Select one of predefined theme headers', 'dotdigital' ),
				'help'    => esc_html__( 'You can select one of predefined theme headers', 'dotdigital' ),
				'choices' => array(
					'1' => DOTDIGITAL_THEME_URI . '/img/theme-options/header1.png',
					'2' => DOTDIGITAL_THEME_URI . '/img/theme-options/header2.png',
					'3' => DOTDIGITAL_THEME_URI . '/img/theme-options/header3.png',
					'4' => DOTDIGITAL_THEME_URI . '/img/theme-options/header4.png',
					'5' => DOTDIGITAL_THEME_URI . '/img/theme-options/header5.png',
					'6' => DOTDIGITAL_THEME_URI . '/img/theme-options/header6.png',
					'7' => DOTDIGITAL_THEME_URI . '/img/theme-options/header7.png',
					'8' => DOTDIGITAL_THEME_URI . '/img/theme-options/header8.png',
					'9' => DOTDIGITAL_THEME_URI . '/img/theme-options/header9.png',
					'10' => DOTDIGITAL_THEME_URI . '/img/theme-options/header10.png',
					'11' => DOTDIGITAL_THEME_URI . '/img/theme-options/header11.png',
					'12' => DOTDIGITAL_THEME_URI . '/img/theme-options/header12.png',
					'13' => DOTDIGITAL_THEME_URI . '/img/theme-options/header13.png',
					'21' => DOTDIGITAL_THEME_URI . '/img/theme-options/header21.png',
					'22' => DOTDIGITAL_THEME_URI . '/img/theme-options/header22.png',
					'23' => DOTDIGITAL_THEME_URI . '/img/theme-options/header23.png',
					'24' => DOTDIGITAL_THEME_URI . '/img/theme-options/header24.png',
				),
				'blank'   => false, // (optional) if true, image can be deselected
			),
			'header_phone' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Header phone', 'dotdigital' ),
				'desc'  => esc_html__( 'Phone number to appear in header', 'dotdigital' ),
				'help'  => esc_html__( 'Not all headers display this info', 'dotdigital' ),
			),
			'header_email' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Header email', 'dotdigital' ),
				'desc'  => esc_html__( 'Email address to appear in header', 'dotdigital' ),
				'help'  => esc_html__( 'Not all headers display this info', 'dotdigital' ),
			),
			'header_open_hours' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Open hours', 'dotdigital' ),
				'desc'  => esc_html__( 'Open hours to appear in header', 'dotdigital' ),
				'help'  => esc_html__( 'Not all headers display this info', 'dotdigital' ),
			),
			'header_button' => array(
				'type'          => 'popup',
				'label'         => esc_html__( 'Header Button', 'dotdigital' ),
				'popup-title'   => esc_html__( 'Edit Button', 'dotdigital' ),
				'button'   => esc_html__( 'Edit Button', 'dotdigital' ),
				'popup-options' => $header_button,
			),
			//Search Button (Header 2)
			'search_button_block' => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'search_button'           => array(
						'label' => esc_html__('Search Button', 'dotdigital'),
						'desc'  => esc_html__('For header 2', 'dotdigital'),
						'type'    => 'select',
						'value'   => 'default',
						'choices' => array(
							'none' => esc_html__( 'None', 'dotdigital' ),
							'default' => esc_html__( 'Default', 'dotdigital' ),
							'custom' => esc_html__( 'Custom icon', 'dotdigital' ),
						),
					),
				),
				'choices'      => array(
					'custom'   => array(
						'custom_header_icon'       => array(
							'type'  => 'icon',
							'label' => esc_html__( 'Custom Header Icon', 'dotdigital' ),
							'set'   => 'rt-icons-2',
						),
						'custom_header_icon_link' => array(
							'type'  => 'text',
							'value' => '#',
							'label' => esc_html__( 'Header Icon Link', 'dotdigital' ),
							'desc'  => esc_html__( 'Enter custom header icon link', 'dotdigital' ),
						),
					)
				),
			),
			//'social_icons'
			$header_social_icons,
		),
	),
	'footer'          => array(
		'title'   => esc_html__( 'Theme Footer', 'dotdigital' ),
		'options' => array(
			'footer'           => array(
				'label'   => esc_html__( 'Footer Type', 'dotdigital' ),
				'desc'    => esc_html__( 'Select footer type', 'dotdigital' ),
				'type'    => 'short-select',
				'value'   => '1',
				'choices' => array(
					'1' => esc_html__( 'Type 1', 'dotdigital' ),
					'2' => esc_html__( 'Type 2', 'dotdigital' ),
					'3' => esc_html__( 'Type 3', 'dotdigital' ),
					'4' => esc_html__( 'Type 4', 'dotdigital' ),
                    '5' => esc_html__( 'Type 5', 'dotdigital' ),
				),
			),
            'before_footer' => array(
                'type'         => 'switch',
                'value'        => '',
                'label'        => esc_html__( 'Before Footer widgets', 'dotdigital' ),
                'left-choice'  => array(
                    'value' => 'false',
                    'label' => esc_html__( 'Disabled', 'dotdigital' ),
                ),
                'right-choice' => array(
                    'value' => 'true',
                    'label' => esc_html__( 'Enabled', 'dotdigital' ),
                ),
            ),
            'footer_colors'           => array(
                'label'   => esc_html__( 'Footer colors', 'dotdigital' ),
                'desc'    => esc_html__( 'Select footer color', 'dotdigital' ),
                'type'    => 'short-select',
                'value'   => '',
                'choices' => array(
                    '' => esc_html__( 'Default', 'dotdigital' ),
                    'ls'             => esc_html__( 'Light', 'dotdigital' ),
                    'ls ms'          => esc_html__( 'Grey', 'dotdigital' ),
                    'ds light'       => esc_html__( 'Dark', 'dotdigital' ),
                    'ds'             => esc_html__( 'Dark Grey', 'dotdigital' ),
                    'cs'             => esc_html__( 'Main color', 'dotdigital' ),
                ),
            ),
			'footer_image'            => array(
				'label' => esc_html__( 'Footer Image', 'dotdigital' ),
				'desc'  => esc_html__( 'Upload a footer image', 'dotdigital' ),
				'help'  => esc_html__( "This default footer image will be used for all theme pages.", "dotdigital" ),
				'type'  => 'upload'
			),
			'copyrights'           => array(
				'label'   => esc_html__( 'Copyright Type', 'dotdigital' ),
				'desc'    => esc_html__( 'Select copyright type', 'dotdigital' ),
				'type'    => 'short-select',
				'value'   => '1',
				'choices' => array(
					'1' => esc_html__( 'Type 1', 'dotdigital' ),
					'2' => esc_html__( 'Type 2', 'dotdigital' ),
					'3' => esc_html__( 'Type 3', 'dotdigital' ),
					'4' => esc_html__( 'Type 4', 'dotdigital' ),
				),
			),
            'copyrights_colors'           => array(
                'label'   => esc_html__( 'Copyright colors', 'dotdigital' ),
                'desc'    => esc_html__( 'Select copyright color', 'dotdigital' ),
                'type'    => 'short-select',
                'value'   => '',
                'choices' => array(
                    '' => esc_html__( 'Default', 'dotdigital' ),
                    'ls'             => esc_html__( 'Light', 'dotdigital' ),
                    'ls ms'          => esc_html__( 'Grey', 'dotdigital' ),
                    'ds'             => esc_html__( 'Dark', 'dotdigital' ),
                    'ds ms'          => esc_html__( 'Dark Grey', 'dotdigital' ),
                    'cs'             => esc_html__( 'Main color', 'dotdigital' ),
                ),
            ),
			'copyrights_text' => array(
				'type'  => 'textarea',
				'value' => '&copy; Copyright 2018 All Rights Reserved',
				'label' => esc_html__( 'Copyrights text', 'dotdigital' ),
				'desc'  => esc_html__( 'Please type your copyrights text', 'dotdigital' ),
			),
			'footer_social_icons' => array(
				'type'            => 'addable-box',
				'value'           => '',
				'label'           => esc_html__( 'Social Buttons', 'dotdigital' ),
				'desc'            => esc_html__( 'Optional social buttons', 'dotdigital' ),
				'template'        => '{{=icon}}',
				'box-options'     => array(
					'icon'       => array(
						'type'  => 'icon',
						'label' => esc_html__( 'Social Icon', 'dotdigital' ),
						'set'   => 'social-icons',
					),
					'icon_class' => array(
						'type'        => 'select',
						'value'       => '',
						'label'       => esc_html__( 'Icon type', 'dotdigital' ),
						'desc'        => esc_html__( 'Select one of predefined social button types', 'dotdigital' ),
						'choices'     => array(
							''                                    => 'Default',
							'border-icon'                         => esc_html__( 'Simple Bordered Icon', 'dotdigital' ),
							'border-icon rounded-icon'            => esc_html__( 'Rounded Bordered Icon', 'dotdigital' ),
							'bg-icon'                             => esc_html__( 'Simple Background Icon', 'dotdigital' ),
							'bg-icon rounded-icon'                => esc_html__( 'Rounded Background Icon', 'dotdigital' ),
							'color-icon bg-icon'                  => esc_html__( 'Color Light Background Icon', 'dotdigital' ),
							'color-icon bg-icon rounded-icon'     => esc_html__( 'Color Light Background Rounded Icon', 'dotdigital' ),
							'color-icon'                          => esc_html__( 'Color Icon', 'dotdigital' ),
							'color-icon border-icon'              => esc_html__( 'Color Bordered Icon', 'dotdigital' ),
							'color-icon border-icon rounded-icon' => esc_html__( 'Rounded Color Bordered Icon', 'dotdigital' ),
							'color-bg-icon'                       => esc_html__( 'Color Background Icon', 'dotdigital' ),
							'color-bg-icon rounded-icon'          => esc_html__( 'Rounded Color Background Icon', 'dotdigital' ),

						),
						/**
						 * Allow save not existing choices
						 * Useful when you use the select to populate it dynamically from js
						 */
						'no-validate' => false,
					),
					'icon_url'   => array(
						'type'  => 'text',
						'value' => '',
						'label' => esc_html__( 'Icon Link', 'dotdigital' ),
						'desc'  => esc_html__( 'Provide a URL to your icon', 'dotdigital' ),
					)
				),
				'limit'           => 0, // limit the number of boxes that can be added
				'add-button-text' => esc_html__( 'Add', 'dotdigital' ),
				'sortable'        => true,
			),
		),
	),
	'tracking_scripts_panel' => array(
		'title'   => esc_html__( 'Theme Tracking Scripts', 'dotdigital' ),
		'options' => array(
			'tracking_scripts_top_section' => array(
				'title'   => esc_html__( 'Head Scripts', 'dotdigital' ),
				'type'    => 'box',
				'options' => array(
					'tracking_scripts_top' => array(
						'type'          => 'addable-popup',
						'label'         => esc_html__( 'Head Scripts', 'dotdigital' ),
						'desc'          => esc_html__( 'Add your tracking scripts (Hotjar, Google Analytics, etc)', 'dotdigital' ),
						'template'      => '{{=name}}',
						'popup-options' => array(
							'name'   => array(
								'label' => esc_html__( 'Name', 'dotdigital' ),
								'desc'  => esc_html__( 'Enter a name (it is for internal use and will not appear on the front end)', 'dotdigital' ),
								'type'  => 'text',
							),
							'script' => array(
								'label' => esc_html__( 'Script', 'dotdigital' ),
								'desc'  => esc_html__( 'Copy/Paste the tracking script here', 'dotdigital' ),
								'type'  => 'textarea',
							)
						),
					),
				),
			),
			'tracking_scripts_bottom_section' => array(
				'title'   => esc_html__( 'Footer Scripts', 'dotdigital' ),
				'type'    => 'box',
				'options' => array(
					'tracking_scripts_bottom' => array(
						'type'          => 'addable-popup',
						'label'         => esc_html__( 'Footer Scripts', 'dotdigital' ),
						'desc'          => esc_html__( 'Add your tracking scripts (Hotjar, Google Analytics, etc)', 'dotdigital' ),
						'template'      => '{{=name}}',
						'popup-options' => array(
							'name'   => array(
								'label' => esc_html__( 'Name', 'dotdigital' ),
								'desc'  => esc_html__( 'Enter a name (it is for internal use and will not appear on the front end)', 'dotdigital' ),
								'type'  => 'text',
							),
							'script' => array(
								'label' => esc_html__( 'Script', 'dotdigital' ),
								'desc'  => esc_html__( 'Copy/Paste the tracking script here', 'dotdigital' ),
								'type'  => 'textarea',
							),
						),
					),
				),
			),
		),
	),
	'fonts_panel'     => array(
		'title'   => esc_html__( 'Theme Fonts', 'dotdigital' ),
		'options' => array(
			'body_fonts_section' => array(
				'title'   => esc_html__( 'Font for body', 'dotdigital' ),
				'options' => array(
					'body_font_picker_switch' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'main_font_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__( 'Enable', 'dotdigital' ),
								'desc'         => esc_html__( 'Enable custom body font', 'dotdigital' ),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__( 'Disabled', 'dotdigital' ),
								),
								'right-choice' => array(
									'value' => 'main_font_options',
									'label' => esc_html__( 'Enabled', 'dotdigital' ),
								),
							),
						),
						'choices' => array(
							'main_font_options' => array(
								'main_font' => array(
									'type'       => 'typography-v2',
									'value'      => array(
										'family'         => 'Poppins',
										// For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
										'subset'         => 'latin-ext',
										'variation'      => 'regular',
										'size'           => 16,
										'line-height'    => 30,
										'letter-spacing' => 0,
										'color'          => '#323232'
									),
									'components' => array(
										'family'         => true,
										// 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
										'size'           => true,
										'line-height'    => true,
										'letter-spacing' => true,
										'color'          => false
									),
									'attr'       => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
									'label'      => esc_html__( 'Custom font', 'dotdigital' ),
									'desc'       => esc_html__( 'Select custom font for headings', 'dotdigital' ),
									'help'       => esc_html__( 'You should enable using custom heading fonts above at first', 'dotdigital' ),
								),
							),
						),
					),
				),
			),

			'headings_fonts_section' => array(
				'title'   => esc_html__( 'Font for headings', 'dotdigital' ),
				'options' => array(
					'h_font_picker_switch' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'h_font_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__( 'Enable', 'dotdigital' ),
								'desc'         => esc_html__( 'Enable custom heading font', 'dotdigital' ),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__( 'Disabled', 'dotdigital' ),
								),
								'right-choice' => array(
									'value' => 'h_font_options',
									'label' => esc_html__( 'Enabled', 'dotdigital' ),
								),
							),
						),
						'choices' => array(
							'h_font_options' => array(
								'h_font' => array(
									'type'       => 'typography-v2',
									'value'      => array(
										'family'         => 'Roboto',
										// For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
										'subset'         => 'latin-ext',
										'variation'      => 'regular',
										'size'           => 16,
										'line-height'    => 24,
										'letter-spacing' => 0,
										'color'          => '#323232'
									),
									'components' => array(
										'family'         => true,
										// 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
										'size'           => false,
										'line-height'    => false,
										'letter-spacing' => true,
										'color'          => false
									),
									'attr'       => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
									'label'      => esc_html__( 'Custom font', 'dotdigital' ),
									'desc'       => esc_html__( 'Select custom font for headings', 'dotdigital' ),
									'help'       => esc_html__( 'You should enable using custom heading fonts above at first', 'dotdigital' ),
								),
							),
						),
					),
				),
			),

		),
	),

	// Display theme colors section
	$color_section,
    'version'      => array(
        'title'   => esc_html__( 'Theme Variant', 'dotdigital' ),
        'options' => array(
            'version' => array(
                'type'    => 'radio',
                'value'   => 'ls',
                'attr'    => array( 'class' => 'theme-layout-class', 'data-theme-layout' => 'layout' ),
                'label'   => esc_html__( 'Theme Version', 'dotdigital' ),
                'desc'    => esc_html__( 'Light or dark version', 'dotdigital' ),
                'help'    => esc_html__( 'Select one of predefined versions', 'dotdigital' ),
                'choices' => array( // Note: Avoid bool or int keys http://bit.ly/1cQgVzk
                    'ls' => esc_html__( 'Light', 'dotdigital' ),
                    'ds'  => esc_html__( 'Dark', 'dotdigital' ),
                ),
                // Display choices inline instead of list
                'inline'  => true,
            ),
        ),
        'wp-customizer-args' => array(
            'active_callback' => '__return_true',
        ),
    ),
	'preloader_panel' => array(
		'title' => esc_html__( 'Theme Preloader', 'dotdigital' ),

		'options' => array(
			'preloader_enabled' => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Preloader', 'dotdigital' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'dotdigital' ),
				),
			),

			'preloader_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Custom preloader image', 'dotdigital' ),
				'help'        => esc_html__( 'GIF image recommended. Recommended maximum preloader width 150px, maximum preloader height 150px.', 'dotdigital' ),
				'images_only' => true,
			),


		),
	),
	'share_buttons'   => array(
		'title' => esc_html__( 'Theme Share Buttons', 'dotdigital' ),

		'options' => array(
			'share_facebook'    => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Facebook Share Button', 'dotdigital' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'dotdigital' ),
				),
			),
			'share_twitter'     => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Twitter Share Button', 'dotdigital' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'dotdigital' ),
				),
			),
			'share_google_plus' => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Google+ Share Button', 'dotdigital' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'dotdigital' ),
				),
			),
			'share_pinterest'   => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Pinterest Share Button', 'dotdigital' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'dotdigital' ),
				),
			),
			'share_linkedin'    => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable LinkedIn Share Button', 'dotdigital' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'dotdigital' ),
				),
			),
			'share_tumblr'      => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Tumblr Share Button', 'dotdigital' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'dotdigital' ),
				),
			),
			'share_reddit'      => array(
				'type'         => 'switch',
				'value'        => '1',
				'label'        => esc_html__( 'Enable Reddit Share Button', 'dotdigital' ),
				'left-choice'  => array(
					'value' => '1',
					'label' => esc_html__( 'Enabled', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => esc_html__( 'Disabled', 'dotdigital' ),
				),
			),

		),
	),

);