<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'post-event-info-section' => array(
		'title'   => esc_html__( 'Event info', 'dotdigital' ),
		'type'    => 'box',
		'context' => 'side',

		'options' => array(
			'show-event-info' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Show event info?', 'dotdigital' ),
				'value'        => 'hidden',
				'left-choice'  => array(
					'value' => 'hidden',
					'label' => esc_html__( 'Hide', 'dotdigital' ),
				),
				'right-choice' => array(
					'value' => '',
					'label' => esc_html__( 'Show', 'dotdigital' ),
				),
			),
		),
	)
);

/** Add Unyson Events Excerpt */
if ( ! function_exists( 'dotdigital_filter_fw_ext_events_excerpt' ) ) :
	function dotdigital_filter_fw_ext_events_excerpt( $options ) {
		return array_merge( $options, array(
			'events_excerpt_tab' => array(
				'title'   => esc_html__( 'Event excerpt', 'dotdigital' ),
				'type'    => 'tab',
				'options' => array(
					'excerpt_text_id' => array(
						'type'  => 'textarea',
						'label' => esc_html__( 'Excerpt Text', 'dotdigital' ),
						'desc'  => false,
					)
				)
			)
		) );
	}
endif;
add_filter( 'fw_ext_events_post_options', 'dotdigital_filter_fw_ext_events_excerpt' );