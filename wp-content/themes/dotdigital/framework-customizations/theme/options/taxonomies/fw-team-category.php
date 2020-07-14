<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'box_id' => array(
		'type'    => 'box',
		'title'   => esc_html__( 'Options for categories', 'dotdigital' ),
		'options' => array(
			'team_layout'        => array(
				'label'   => esc_html__( 'Team Layout', 'dotdigital' ),
				'desc'    => esc_html__( 'Choose team category layout', 'dotdigital' ),
				'value'   => 'layout-1',
				'type'    => 'select',
				'choices' => array(
					'layout-1' => esc_html__( 'Layout 1', 'dotdigital' ),
					'layout-2'  => esc_html__( 'Layout 2', 'dotdigital' ),
				)
			),
		)
	)
);