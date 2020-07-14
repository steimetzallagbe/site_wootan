<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'message' => array(
		'label' => esc_html__( 'Message', 'dotdigital' ),
		'desc'  => esc_html__( 'Notification message', 'dotdigital' ),
		'type'  => 'text',
		'value' => esc_html__( 'Message!', 'dotdigital' ),
	),
	'type'    => array(
		'label'   => esc_html__( 'Type', 'dotdigital' ),
		'desc'    => esc_html__( 'Notification type', 'dotdigital' ),
		'type'    => 'select',
		'choices' => array(
			'success' => esc_html__( 'Congratulations', 'dotdigital' ),
			'info'    => esc_html__( 'Information', 'dotdigital' ),
			'warning' => esc_html__( 'Alert', 'dotdigital' ),
			'danger'  => esc_html__( 'Error', 'dotdigital' ),
		)
	),
);