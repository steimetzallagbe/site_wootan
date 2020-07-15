<?php
/**
 * Plugin Name: Accordion and Accordion Slider
 * Plugin URI: https://www.wponlinesupport.com/plugins/
 * Description: Accordion and Accordion Slider (Horizontal and Vertical) - Responsive and Touch enabled accordion for WordPress Website. Also work with Gutenberg shortcode block. 
 * Author: WP OnlineSupport 
 * Text Domain: accordion-and-accordion-slider
 * Domain Path: /languages/
 * Version: 1.0.5
 * Author URI: https://www.wponlinesupport.com
 *
 * @package WordPress
 * @author WP OnlineSupport
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if( !defined( 'WP_AAS_VERSION' ) ) {
	define( 'WP_AAS_VERSION', '1.0.5' ); // Version of plugin
}
if( !defined( 'WP_AAS_DIR' ) ) {
    define( 'WP_AAS_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( !defined( 'WP_AAS_URL' ) ) {
    define( 'WP_AAS_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}
if( !defined( 'WP_AAS_POST_TYPE' ) ) {
    define( 'WP_AAS_POST_TYPE', 'wpos_aac_slider' ); // Plugin post type
}
if( !defined( 'WP_AAS_META_PREFIX' ) ) {
    define( 'WP_AAS_META_PREFIX', '_wp_aas_' ); // Plugin metabox prefix
}

/**
 * Load Text Domain
 * This gets the plugin ready for translation
 * 
 * @package Accordion and Accordion Slider
 * @since 1.0
 */
function wp_aas_load_textdomain() {
	load_plugin_textdomain( 'accordion-and-accordion-slider', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}
add_action('plugins_loaded', 'wp_aas_load_textdomain');

/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @package stack-slider-a-3d-imageslider
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'wp_aas_install' );

/**
 * Deactivation Hook
 * 
 * Register plugin deactivation hook.
 * 
 * @package stack-slider-a-3d-imageslider
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'wp_aas_uninstall');

/**
 * Plugin Setup (On Activation)
 * 
 * Does the initial setup,
 * set default values for the plugin options.
 * 
 * @package stack-slider-a-3d-imageslider
 * @since 1.0.0
 */
function wp_aas_install() {
    
    // Register post type function
    wp_aas_register_post_type();  
   
    // IMP need to flush rules for custom registered post type
    flush_rewrite_rules();
}

/**
 * Plugin Setup (On Deactivation)
 * 
 * Delete  plugin options.
 * 
 * @package stack-slider-a-3d-imageslider
 * @since 1.0.0
 */
function wp_aas_uninstall() {
    
    // IMP need to flush rules for custom registered post type
    flush_rewrite_rules();
}

// Functions File
require_once( WP_AAS_DIR . '/includes/wp-aas-functions.php' );

// Plugin Post Type File
require_once( WP_AAS_DIR . '/includes/wp-aas-post-types.php' );

// Script File
require_once( WP_AAS_DIR . '/includes/class-wp-aas-script.php' );

// Admin Class File
require_once( WP_AAS_DIR . '/includes/admin/class-wp-aas-admin.php' );

// Shortcode File
require_once( WP_AAS_DIR . '/includes/shortcode/wpos-aas-shortcode.php' );

// Load admin files
if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
    require_once( WP_AAS_DIR . '/includes/admin/wp-aas-how-it-work.php' );  
}

/* Plugin Wpos Analytics Data Starts */
function wpos_analytics_anl68_load() {

    require_once dirname( __FILE__ ) . '/wpos-analytics/wpos-analytics.php';

    $wpos_analytics =  wpos_anylc_init_module( array(
                            'id'            => 68,
                            'file'          => plugin_basename( __FILE__ ),
                            'name'          => 'Accordion and Accordion Slider',
                            'slug'          => 'accordion-and-accordion-slider',
                            'type'          => 'plugin',
                            'menu'          => 'edit.php?post_type=wpos_aac_slider',
                            'text_domain'   => 'accordion-and-accordion-slider',
                        ));

    return $wpos_analytics;
}

// Init Analytics
wpos_analytics_anl68_load();
/* Plugin Wpos Analytics Data Ends */