<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'dotdigital_child_cfg_parent_css' ) ):
	function dotdigital_child_cfg_parent_css() {
		wp_deregister_style( 'dotdigital-woo' );
		wp_enqueue_style( 'dotdigital-child-woo', get_theme_file_uri( '/css/woo.css' ), array(), DOTDIGITAL_THEME_VERSION );

		wp_deregister_style( 'dotdigital-booked' );
		wp_enqueue_style( 'dotdigital-child-booked', get_theme_file_uri( '/css/booked.css' ), array(), DOTDIGITAL_THEME_VERSION );

		wp_deregister_style( 'dotdigital-main' );
		wp_enqueue_style( 'dotdigital-child-main', get_theme_file_uri( '/css/main.css' ), array(), DOTDIGITAL_THEME_VERSION );
	}
endif;
add_action( 'wp_enqueue_scripts', 'dotdigital_child_cfg_parent_css', 999 );

// END ENQUEUE PARENT ACTION