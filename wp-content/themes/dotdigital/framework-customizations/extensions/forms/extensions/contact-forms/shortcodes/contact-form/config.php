<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Contact form', 'dotdigital' ),
	'description' => esc_html__( 'Build contact forms', 'dotdigital' ),
	'tab'         => esc_html__( 'Content Elements', 'dotdigital' ),
	'popup_size'  => 'large',
	'type'        => 'special'
);