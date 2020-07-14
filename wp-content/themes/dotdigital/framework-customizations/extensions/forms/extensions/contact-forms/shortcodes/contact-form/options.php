<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'type'    => 'box',
		'title'   => '',
		'options' => array(
			'id'       => array(
				'type' => 'unique',
			),
			'builder'  => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Form Fields', 'dotdigital' ),
				'options' => array(
					'form' => array(
						'label'        => false,
						'type'         => 'form-builder',
						'value'        => array(
							'json' => apply_filters( 'fw:ext:forms:builder:load-item:form-header-title', true )
								? json_encode( array(
									array(
										'type'      => 'form-header-title',
										'shortcode' => 'form_header_title',
										'width'     => '',
										'options'   => array(
											'title'    => '',
											'subtitle' => '',
										)
									)
								) )
								: '[]'
						),
						'fixed_header' => true,
					),
				),
			),
			'settings' => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Settings', 'dotdigital' ),
				'options' => array(
					'settings-options' => array(
						'title'   => esc_html__( 'Contact Form Options', 'dotdigital' ),
						'type'    => 'tab',
						'options' => array(
							'background_color'    => array(
								'type'    => 'select',
								'value'   => '',
								'label'   => esc_html__( 'Form Background color', 'dotdigital' ),
								'desc'    => esc_html__( 'Select background color', 'dotdigital' ),
								'help'    => esc_html__( 'Select one of predefined background colors', 'dotdigital' ),
								'choices' => array(
									''                              => esc_html__( 'No background', 'dotdigital' ),
									'with_padding overflow-hidden light_form'               => esc_html__( 'Light', 'dotdigital' ),
									'with_padding overflow-hidden transp_black_bg'            => esc_html__( 'Dark', 'dotdigital' ),
									'with_padding overflow-hidden color_form'               => esc_html__( 'Main color', 'dotdigital' ),
								),
							),
							'fields_style'    => array(
								'type'    => 'select',
								'value'   => 'fields_with_background',
								'label'   => esc_html__( 'Fields Style', 'dotdigital' ),
								'desc'    => esc_html__( 'Select fields style', 'dotdigital' ),
								'choices' => array(
									'fields_with_background'        => esc_html__( 'With Background', 'dotdigital' ),
									'fields_with_shadow'            => esc_html__( 'With Shadow', 'dotdigital' ),
								),
							),
							'field_text_align' => array(
								'type'    => 'select',
								'value'   => 'text-left',
								'label'   => esc_html__( 'Field text alignment', 'dotdigital' ),
								'desc'    => esc_html__( 'Select field text alignment', 'dotdigital' ),
								'choices' => array(
									'text-left'   => esc_html__( 'Left', 'dotdigital' ),
									'text-center' => esc_html__( 'Center', 'dotdigital' ),
									'text-right'  => esc_html__( 'Right', 'dotdigital' ),
								),
							),
							'columns_padding'     => array(
								'type'    => 'select',
								'value'   => 'columns_padding_15',
								'label'   => esc_html__( 'Column paddings in form', 'dotdigital' ),
								'desc'    => esc_html__( 'Choose columns horizontal paddings value', 'dotdigital' ),
								'choices' => array(
									'columns_padding_15' => esc_html__( '15 px - default', 'dotdigital' ),
									'columns_padding_0'  => esc_html__( '0', 'dotdigital' ),
									'columns_padding_1'  => esc_html__( '1 px', 'dotdigital' ),
									'columns_padding_2'  => esc_html__( '2 px', 'dotdigital' ),
									'columns_padding_5'  => esc_html__( '5 px', 'dotdigital' ),
									'columns_padding_10'  => esc_html__( '10 px', 'dotdigital' ),
								),
							),
							'form_email_settings' => array(
								'type'    => 'group',
								'options' => array(
									'email_to' => array(
										'type'  => 'text',
										'label' => esc_html__( 'Email To', 'dotdigital' ),
										'help'  => esc_html__( 'We recommend you to use an email that you verify often', 'dotdigital' ),
										'desc'  => esc_html__( 'The form will be sent to this email address.', 'dotdigital' ),
									),
								),
							),
							'form_text_settings'  => array(
								'type'    => 'group',
								'options' => array(
									'subject-group'       => array(
										'type'    => 'group',
										'options' => array(
											'subject_message' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Subject Message', 'dotdigital' ),
												'desc'  => esc_html__( 'This text will be used as subject message for the email', 'dotdigital' ),
												'value' => esc_html__( 'Contact Form', 'dotdigital' ),
											),
										)
									),
									'submit-button-group' => array(
										'type'    => 'group',
										'options' => array(
											'submit_button_text' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Submit Button', 'dotdigital' ),
												'desc'  => esc_html__( 'This text will appear in submit button', 'dotdigital' ),
												'value' => esc_html__( 'Send', 'dotdigital' ),
											),
											'reset_button_text'  => array(
												'type'  => 'text',
												'label' => esc_html__( 'Reset Button', 'dotdigital' ),
												'desc'  => esc_html__( 'This text will appear in reset button. Leave blank if reset button not needed', 'dotdigital' ),
												'value' => esc_html__( 'Clear', 'dotdigital' ),
											),
											'button_size'      => array(
												'type'         => 'select',
												'label'        => esc_html__( 'Button size', 'dotdigital' ),
												'value' => 'medium_height',
												'choices' => array(
													'small_height'  => esc_html__( 'Small', 'dotdigital' ),
													'medium_height'  => esc_html__( 'Medium', 'dotdigital' ),
													'large_height' => esc_html__( 'Large', 'dotdigital' ),
												),
											),
											'button_color'  => array(
												'label'   => esc_html__( 'Button Color', 'dotdigital' ),
												'desc'    => esc_html__( 'Choose a color for your button', 'dotdigital' ),
												'type'    => 'select',
												'choices' => array(
													'color1'  => esc_html__( 'Main color 1', 'dotdigital' ),
													'color2'  => esc_html__( 'Main color 2', 'dotdigital' ),
													'color3'  => esc_html__( 'Main color 3', 'dotdigital' ),
													'color4'  => esc_html__( 'Main color 4', 'dotdigital' ),
													'inverse color1'  => esc_html__( 'Inverse main color 1', 'dotdigital' ),
													'inverse color2'  => esc_html__( 'Inverse main color 2', 'dotdigital' ),
													'inverse color3'  => esc_html__( 'Inverse main color 3', 'dotdigital' ),
													'inverse color4'  => esc_html__( 'Inverse main color 4', 'dotdigital' ),
												),
											),
											'button_align' => array(
												'type'    => 'select',
												'value'   => 'text-left',
												'label'   => esc_html__( 'Button alignment', 'dotdigital' ),
												'desc'    => esc_html__( 'Select button alignment', 'dotdigital' ),
												'choices' => array(
													'text-left'   => esc_html__( 'Left', 'dotdigital' ),
													'text-center' => esc_html__( 'Center', 'dotdigital' ),
													'text-right'  => esc_html__( 'Right', 'dotdigital' ),
												),
											),
										)
									),
									'success-group'       => array(
										'type'    => 'group',
										'options' => array(
											'success_message' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Success Message', 'dotdigital' ),
												'desc'  => esc_html__( 'This text will be displayed when the form will successfully send', 'dotdigital' ),
												'value' => esc_html__( 'Message sent!', 'dotdigital' ),
											),
										)
									),
									'failure_message'     => array(
										'type'  => 'text',
										'label' => esc_html__( 'Failure Message', 'dotdigital' ),
										'desc'  => esc_html__( 'This text will be displayed when the form will fail to be sent', 'dotdigital' ),
										'value' => esc_html__( 'Oops something went wrong.', 'dotdigital' ),
									),
								),
							),
						)
					),
					'mailer-options'   => array(
						'title'   => esc_html__( 'Mailer Options', 'dotdigital' ),
						'type'    => 'tab',
						'options' => array(
							'mailer' => array(
								'label' => false,
								'type'  => 'mailer'
							)
						)
					)
				),
			),
		),
	)
);