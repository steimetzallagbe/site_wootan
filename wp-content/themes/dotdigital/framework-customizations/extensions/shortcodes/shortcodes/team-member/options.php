<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get social icons to add in member item:
$icons_social = fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' );

$options = array(
	'image' => array(
		'label' => esc_html__( 'Team Member Image', 'dotdigital' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'dotdigital' ),
		'type'  => 'upload'
	),
	'name'  => array(
		'label' => esc_html__( 'Team Member Name', 'dotdigital' ),
		'desc'  => esc_html__( 'Name of the person', 'dotdigital' ),
		'type'  => 'text',
		'value' => ''
	),
	'job'   => array(
		'label' => esc_html__( 'Team Member Job Title', 'dotdigital' ),
		'desc'  => esc_html__( 'Job title of the person.', 'dotdigital' ),
		'type'  => 'text',
		'value' => ''
	),
	'desc'  => array(
		'label' => esc_html__( 'Team Member Description', 'dotdigital' ),
		'desc'  => esc_html__( 'Enter a few words that describe the person', 'dotdigital' ),
		'type'  => 'textarea',
		'value' => ''
	),
	$icons_social->get_options(),
);