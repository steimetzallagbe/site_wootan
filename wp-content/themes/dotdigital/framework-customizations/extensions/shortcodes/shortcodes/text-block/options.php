<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'text' => array(
		'type'   => 'wp-editor',
		'label'  => esc_html__( 'Content', 'dotdigital' ),
		'desc'   => esc_html__( 'Enter some content for this texblock', 'dotdigital' ),
		'reinit' => true,
		'teeny' => false,
	),
	'text_custom_class' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Text custom class', 'dotdigital' ),
		'desc'  => esc_html__( 'Add custom css class', 'dotdigital' ),
	),
);
