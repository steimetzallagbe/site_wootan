<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$events = fw()->extensions->get( 'events' );
if ( empty( $events ) ) {
	return;
}


$cfg = array(
	'page_builder' => array(
		'title'       => esc_html__( 'Events', 'dotdigital' ),
		'description' => esc_html__( 'Events in Tile view', 'dotdigital' ),
		'tab'         => esc_html__( 'Widgets', 'dotdigital' )
	)
);