<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'post-portfolio-layout-section' => array(
		'title'   => esc_html__( 'Portfolio Layout', 'dotdigital' ),
		'type'    => 'box',
		'context' => 'side',

		'options' => array(
			'single_portfolio_layout'        => array(
				'label'   => false,
				'desc'    => esc_html__( 'Choose single portfolio layout', 'dotdigital' ),
				'value'   => 'layout-1',
				'type'    => 'select',
				'choices' => array(
					'layout-1' => esc_html__( 'Layout 1', 'dotdigital' ),
					'layout-2'  => esc_html__( 'Layout 2', 'dotdigital' ),
				)
			),
		),
	)
);