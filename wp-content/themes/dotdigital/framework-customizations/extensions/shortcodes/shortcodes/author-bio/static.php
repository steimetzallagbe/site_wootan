<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

wp_enqueue_script(
	'fw-shortcode-theme-author-bio-nousewheel',
	DOTDIGITAL_THEME_URI . '/framework-customizations/extensions/shortcodes/shortcodes/author-bio/static/jquery.mousewheel.min.js',
	array( 'jquery', 'underscore' ),
	fw()->manifest->get_version(),
	true
);

wp_enqueue_script(
	'fw-shortcode-theme-author-bio',
	DOTDIGITAL_THEME_URI . '/framework-customizations/extensions/shortcodes/shortcodes/author-bio/static/scripts.js',
	array( 'jquery', 'underscore' ),
	fw()->manifest->get_version(),
	true
);