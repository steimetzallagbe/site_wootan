<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'post-team-layout-section' => array(
		'title'   => esc_html__( 'Team Layout', 'dotdigital' ),
		'type'    => 'box',
		'context' => 'side',

		'options' => array(
			'single_member_layout'        => array(
				'label'   => esc_html__( 'Member Layout', 'dotdigital' ),
				'desc'    => esc_html__( 'Choose single member layout', 'dotdigital' ),
				'value'   => 'layout-1',
				'type'    => 'select',
				'choices' => array(
					'layout-1' => esc_html__( 'Layout 1', 'dotdigital' ),
					'layout-2'  => esc_html__( 'Layout 2', 'dotdigital' ),
					'layout-3'  => esc_html__( 'Layout 3', 'dotdigital' ),
				)
			),
		),
	)
);