<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

$wpTheme = wp_get_theme();
define('DOTDIGITAL_THEME_VERSION', $wpTheme->get( 'Version' ));

//Since WP v4.7 using new functions
//https://developer.wordpress.org/themes/basics/linking-theme-files-directories/#linking-to-theme-directories
define( 'DOTDIGITAL_THEME_URI', get_parent_theme_file_uri() );
define( 'DOTDIGITAL_THEME_PATH', get_parent_theme_file_path() );

// You may request this demo id from this theme author to get a colorized demo content.
// See the Theme support service contacts information.
define( 'DOTDIGITAL_REMOTE_DEMO_VERSION', '2.4.2' );

/**
 * Theme Includes
 *
 * https://github.com/ThemeFuse/Theme-Includes
 */
require_once DOTDIGITAL_THEME_PATH . '/inc/init.php';

/**
 * TGM Plugin Activation
 */
if ( ! class_exists( 'TGM_Plugin_Activation' ) ) {
	/**
	 * Include the TGM_Plugin_Activation class.
	 */
	require_once DOTDIGITAL_THEME_PATH . '/inc/tgm-plugin-activation/class-tgm-plugin-activation.php';
	require_once DOTDIGITAL_THEME_PATH . '/inc/tgm-plugin-activation/plugins.php';
}

add_action( 'tgmpa_register', 'dotdigital_action_register_required_plugins' );