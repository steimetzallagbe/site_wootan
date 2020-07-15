<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Simple counter', 'dotdigital' ),
	'description' => esc_html__( 'Add a simple counter block', 'dotdigital' ),
	'tab'         => esc_html__( 'Content Elements', 'dotdigital' )
);