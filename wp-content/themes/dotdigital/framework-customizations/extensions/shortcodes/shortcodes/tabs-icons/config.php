<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Tabs Icons', 'dotdigital' ),
	'description' => esc_html__( 'Add some Tabs with icons list', 'dotdigital' ),
	'tab'         => esc_html__( 'Content Elements', 'dotdigital' ),
	'popup_size'  => 'large'
);