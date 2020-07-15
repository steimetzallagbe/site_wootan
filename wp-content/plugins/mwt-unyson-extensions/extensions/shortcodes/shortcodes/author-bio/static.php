<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

wp_enqueue_script(
	'fw-shortcode-theme-author-bio-nousewheel',
    plugin_dir_url( __FILE__ ) .  '/static/jquery.mousewheel.min.js',
	array( 'jquery', 'underscore' ),
	fw()->manifest->get_version(),
	true
);

wp_enqueue_script(
	'fw-shortcode-theme-author-bio',
    plugin_dir_url( __FILE__ ) .  '/static/scripts.js',
	array( 'jquery', 'underscore' ),
	fw()->manifest->get_version(),
	true
);