<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'testimonials_group' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'testimonials_layout' => array(
				'type'    => 'select',
				'value'   => 'testimonials_carousel',
				'label'   => esc_html__( 'Testimonials Layout', 'dotdigital' ),
				'desc'    => esc_html__( 'Select one of predefined testimonials layout', 'dotdigital' ),
				'choices' => array(
					'testimonials_carousel'         => esc_html__( 'Testimonials Carousel', 'dotdigital' ),
					'testimonials_carousel_2'         => esc_html__( 'Testimonials Carousel 2', 'dotdigital' ),
					'testimonials_single_carousel'         => esc_html__( 'Testimonials Single Carousel', 'dotdigital' ),
					'testimonials_grid' => esc_html__( 'Testimonials Grid', 'dotdigital' ),
					'testimonials_grid_2' => esc_html__( 'Testimonials Grid 2', 'dotdigital' ),
				),
			),
		),
		'choices' => array(
			'testimonials_carousel'         => array(
				'carousel_autoplay' => array(
					'type'         => 'switch',
					'label'        => esc_html__( 'Carousel Autoplay', 'dotdigital' ),
					'value' => 'true',
					'left-choice'  => array(
						'value' => 'false',
						'label' => esc_html__( 'No', 'dotdigital' ),
					),
					'right-choice' => array(
						'value' => 'true',
						'label' => esc_html__( 'Yes', 'dotdigital' ),
					),
				),
				'autoplay_timeout' => array(
					'type'  => 'text',
					'value' => esc_html__( '3000', 'dotdigital' ),
					'label' => esc_html__( 'Autoplay Timeout', 'dotdigital' ),
					'desc'  => esc_html__( 'Set value in milliseconds', 'dotdigital' ),
				),
			),
			'testimonials_carousel_2'         => array(
				'carousel_autoplay' => array(
					'type'         => 'switch',
					'label'        => esc_html__( 'Carousel Autoplay', 'dotdigital' ),
					'value' => 'true',
					'left-choice'  => array(
						'value' => 'false',
						'label' => esc_html__( 'No', 'dotdigital' ),
					),
					'right-choice' => array(
						'value' => 'true',
						'label' => esc_html__( 'Yes', 'dotdigital' ),
					),
				),
				'autoplay_timeout' => array(
					'type'  => 'text',
					'value' => esc_html__( '3000', 'dotdigital' ),
					'label' => esc_html__( 'Autoplay Timeout', 'dotdigital' ),
					'desc'  => esc_html__( 'Set value in milliseconds', 'dotdigital' ),
				),
			),
			'testimonials_single_carousel'         => array(
				'carousel_autoplay' => array(
					'type'         => 'switch',
					'label'        => esc_html__( 'Carousel Autoplay', 'dotdigital' ),
					'value' => 'true',
					'left-choice'  => array(
						'value' => 'false',
						'label' => esc_html__( 'No', 'dotdigital' ),
					),
					'right-choice' => array(
						'value' => 'true',
						'label' => esc_html__( 'Yes', 'dotdigital' ),
					),
				),
				'autoplay_timeout' => array(
					'type'  => 'text',
					'value' => esc_html__( '3000', 'dotdigital' ),
					'label' => esc_html__( 'Autoplay Timeout', 'dotdigital' ),
					'desc'  => esc_html__( 'Set value in milliseconds', 'dotdigital' ),
				),
			),
		),
	),
	'testimonial_details' => array(
		'label'         => esc_html__( 'Testimonials', 'dotdigital' ),
		'popup-title'   => esc_html__( 'Add/Edit Testimonial', 'dotdigital' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Testimonials.', 'dotdigital' ),
		'type'          => 'addable-popup',
		'template'      => '{{=author_name}}',
		'popup-options' => array(
			'author_avatar' => array(
				'label' => esc_html__( 'Image', 'dotdigital' ),
				'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'dotdigital' ),
				'type'  => 'upload',
			),
			'author_name'   => array(
				'label' => esc_html__( 'Name', 'dotdigital' ),
				'desc'  => esc_html__( 'Enter the Name of the Person to quote', 'dotdigital' ),
				'type'  => 'text'
			),
			'author_job'    => array(
				'label' => esc_html__( 'Position', 'dotdigital' ),
				'desc'  => esc_html__( 'Can be used for a job description', 'dotdigital' ),
				'type'  => 'text'
			),
			'site_name'     => array(
				'label' => esc_html__( 'Website Name', 'dotdigital' ),
				'desc'  => esc_html__( 'Linktext for the above Link', 'dotdigital' ),
				'type'  => 'text'
			),
			'site_url'      => array(
				'label' => esc_html__( 'Website Link', 'dotdigital' ),
				'desc'  => esc_html__( 'Link to the Persons website', 'dotdigital' ),
				'type'  => 'text'
			),
			'content'       => array(
				'label' => esc_html__( 'Quote', 'dotdigital' ),
				'desc'  => esc_html__( 'Enter the testimonial here', 'dotdigital' ),
				'type'  => 'textarea',
			),
		),
	),
);