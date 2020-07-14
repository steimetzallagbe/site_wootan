<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Include static files: javascript and css
 */

//removing default font awesome css style - we using our "fonts.css" file which contain font awesome
wp_deregister_style( 'fw-font-awesome' );

//Add Theme Fonts
wp_enqueue_style(
	'dotdigital-icon-fonts',
	DOTDIGITAL_THEME_URI . '/css/fonts.css',
	array(),
	DOTDIGITAL_THEME_VERSION
);

if ( is_admin_bar_showing() ) {
	//Add Frontend admin styles
	wp_register_style(
		'dotdigital-admin_bar',
		DOTDIGITAL_THEME_URI . '/css/admin-frontend.css',
		array(),
		DOTDIGITAL_THEME_VERSION
	);
	wp_enqueue_style( 'dotdigital-admin_bar' );
}

//styles and scripts below only for frontend: if in dashboard - exit
if ( is_admin() ) {
	return;
}

/**
 * Enqueue scripts and styles for the front end.
 */
// Add theme google font, used in the main stylesheet.
wp_enqueue_style(
	'dotdigital-font',
	dotdigital_google_font_url(),
	array(),
	DOTDIGITAL_THEME_VERSION
);

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

if ( is_singular() && wp_attachment_is_image() ) {
	wp_enqueue_script(
		'dotdigital-keyboard-image-navigation',
		DOTDIGITAL_THEME_URI . '/js/keyboard-image-navigation.js',
		array( 'jquery' ),
		DOTDIGITAL_THEME_VERSION
	);
}

//plugins theme script
wp_enqueue_script(
	'dotdigital-modernizr',
	DOTDIGITAL_THEME_URI . '/js/vendor/modernizr-custom.js',
	false,
	DOTDIGITAL_THEME_VERSION,
	false
);

//plugins theme script
//replacing one compressed script with uncompressed versions - new theme requirements
wp_enqueue_script( 'anime', DOTDIGITAL_THEME_URI . '/js/vendor/anime.min.js', array( 'jquery' ), DOTDIGITAL_THEME_VERSION, true );
wp_enqueue_script( 'bootstrap', DOTDIGITAL_THEME_URI . '/js/vendor/bootstrap.min.js', array( 'jquery' ), DOTDIGITAL_THEME_VERSION, true );
wp_enqueue_script( 'appear', DOTDIGITAL_THEME_URI . '/js/vendor/jquery.appear.js', array( 'jquery' ), DOTDIGITAL_THEME_VERSION, true );
wp_enqueue_script( 'hoverIntent', DOTDIGITAL_THEME_URI . '/js/vendor/jquery.hoverIntent.js', array( 'jquery' ), DOTDIGITAL_THEME_VERSION, true );
wp_enqueue_script( 'superfish', DOTDIGITAL_THEME_URI . '/js/vendor/superfish.js', array( 'jquery' ), DOTDIGITAL_THEME_VERSION, true );
wp_enqueue_script( 'easing', DOTDIGITAL_THEME_URI . '/js/vendor/jquery.easing.1.3.js', array( 'jquery' ), '1.3', true );
wp_enqueue_script( 'totop', DOTDIGITAL_THEME_URI . '/js/vendor/jquery.ui.totop.js', array( 'jquery' ), DOTDIGITAL_THEME_VERSION, true );
wp_enqueue_script( 'imagesloaded', DOTDIGITAL_THEME_URI . '/js/vendor/imagesloaded.pkgd.min.js', array( 'jquery' ), DOTDIGITAL_THEME_VERSION, true );
wp_enqueue_script( 'localScroll', DOTDIGITAL_THEME_URI . '/js/vendor/jquery.localscroll.min.js', array( 'jquery' ), DOTDIGITAL_THEME_VERSION, true );
wp_enqueue_script( 'scrollTo', DOTDIGITAL_THEME_URI . '/js/vendor/jquery.scrollTo.min.js', array( 'jquery' ), DOTDIGITAL_THEME_VERSION, true );
wp_enqueue_script( 'scrollbar', DOTDIGITAL_THEME_URI . '/js/vendor/jquery.scrollbar.min.js', array( 'jquery' ), DOTDIGITAL_THEME_VERSION, true );
wp_enqueue_script( 'parallax', DOTDIGITAL_THEME_URI . '/js/vendor/jquery.parallax-1.1.3.js', array( 'jquery' ), '1.1.3', true );
wp_enqueue_script( 'easypiechart', DOTDIGITAL_THEME_URI . '/js/vendor/jquery.easypiechart.min.js', array( 'jquery' ), DOTDIGITAL_THEME_VERSION, true );
wp_enqueue_script( 'bootstrap-progressbar', DOTDIGITAL_THEME_URI . '/js/vendor/bootstrap-progressbar.min.js', array( 'jquery' ), DOTDIGITAL_THEME_VERSION, true );
wp_enqueue_script( 'countTo', DOTDIGITAL_THEME_URI . '/js/vendor/jquery.countTo.js', array( 'jquery' ), DOTDIGITAL_THEME_VERSION, true );
wp_enqueue_script( 'prettyPhoto-js', DOTDIGITAL_THEME_URI . '/js/vendor/jquery.prettyPhoto.js', array( 'jquery' ), DOTDIGITAL_THEME_VERSION, true );
wp_enqueue_script( 'countdown', DOTDIGITAL_THEME_URI . '/js/vendor/jquery.countdown.min.js', array( 'jquery' ), DOTDIGITAL_THEME_VERSION, true );
wp_enqueue_script( 'isotope', DOTDIGITAL_THEME_URI . '/js/vendor/isotope.pkgd.min.js', array( 'jquery' ), DOTDIGITAL_THEME_VERSION, true );
wp_enqueue_script( 'owl-carousel', DOTDIGITAL_THEME_URI . '/js/vendor/owl.carousel.min.js', array( 'jquery' ), DOTDIGITAL_THEME_VERSION, true );
wp_enqueue_script( 'flexslider', DOTDIGITAL_THEME_URI . '/js/vendor/jquery.flexslider.min.js', array( 'jquery' ), DOTDIGITAL_THEME_VERSION, true );
wp_enqueue_script( 'cookie', DOTDIGITAL_THEME_URI . '/js/vendor/jquery.cookie.js', array( 'jquery' ), DOTDIGITAL_THEME_VERSION, true );
if(is_page_template( 'page-templates/full-page.php' )) {
	wp_enqueue_script( 'fullpage', DOTDIGITAL_THEME_URI . '/js/vendor/fullpage.js', array( 'jquery' ), DOTDIGITAL_THEME_VERSION, true );
}

//custom plugins theme script
wp_enqueue_script(
	'dotdigital-plugins',
	DOTDIGITAL_THEME_URI . '/js/plugins.js',
	array( 'jquery' ),
	DOTDIGITAL_THEME_VERSION,
	true
);

//getting theme color scheme number
$color_scheme_number = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'color_scheme_number' ) : '';
//get template part from ULR - for demo
if ( isset( $_GET[ 'color' ] ) ) {
	$color_scheme_number = ( int ) $_GET[ 'color' ];
}

//if WooCommerce - remove prettyPhoto
if ( class_exists( 'WooCommerce' ) ) :
	wp_dequeue_script( 'prettyPhoto' );
	wp_dequeue_script( 'prettyPhoto-init' );
	wp_deregister_style( 'woocommerce_prettyPhoto_css' );

	// Add Theme Woo Styles and Scripts
	wp_enqueue_style(
		'dotdigital-woo',
		DOTDIGITAL_THEME_URI . '/css/woo.css',
		array(),
		DOTDIGITAL_THEME_VERSION
	);

	wp_enqueue_script(
		'dotdigital-woo',
		DOTDIGITAL_THEME_URI . '/js/woo.js',
		array( 'jquery' ),
		DOTDIGITAL_THEME_VERSION,
		true
	);
endif; //WooCommerce

//getting theme color scheme number
$color_scheme_number = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'color_scheme_number' ) : '';
//get template part from ULR - for demo
if ( isset( $_GET[ 'color' ] ) ) {
	$color_scheme_number = ( int ) $_GET[ 'color' ];
}


//Add Theme Booked Styles
if( class_exists('booked_plugin')) {
	wp_dequeue_style('booked-styles');
	wp_dequeue_style('booked-responsive');
	wp_enqueue_style(
		'dotdigital-booked',
		DOTDIGITAL_THEME_URI . '/css/booked.css',
		array(),
		DOTDIGITAL_THEME_VERSION
	);
}//Booked


//main theme script
wp_enqueue_script(
	'dotdigital-main',
	DOTDIGITAL_THEME_URI . '/js/main.js',
	array( 'jquery' ),
	DOTDIGITAL_THEME_VERSION,
	true
);

if(class_exists('booked_plugin')) {
// For Booked plugin
	wp_register_script( 'dotdigital_booked_translate', DOTDIGITAL_THEME_URI . '/js/booked.js' );
// Localize the script with new data
	$translation_array = array(
		'today_string' => esc_html__( 'Today', 'dotdigital' ),
		'a_value'      => '10'
	);
	wp_localize_script( 'dotdigital_booked_translate', 'booked_today', $translation_array );
// Enqueued script with localized data.
	wp_enqueue_script(
		'dotdigital_booked_translate',
		DOTDIGITAL_THEME_URI . '/js/booked.js',
		array( 'jquery' ),
		DOTDIGITAL_THEME_VERSION,
		true
	);
}

//if AccessPress is active
if ( class_exists( 'SC_Class' ) ) :
	wp_deregister_style( 'apsc-frontend-css' );
	wp_enqueue_style(
		'dotdigital-accesspress',
		DOTDIGITAL_THEME_URI . '/css/accesspress.css',
		array(),
		DOTDIGITAL_THEME_VERSION
	);
endif; //AccessPress

// Add Theme stylesheet.
wp_enqueue_style( 'dotdigital-css-style', get_stylesheet_uri() );

// Add Bootstrap Style
wp_enqueue_style(
	'dotdigital-bootstrap',
	DOTDIGITAL_THEME_URI . '/css/bootstrap.min.css',
	array(),
	DOTDIGITAL_THEME_VERSION
);

// Add Animations Style
wp_enqueue_style(
	'dotdigital-animations',
	DOTDIGITAL_THEME_URI . '/css/animations.css',
	array(),
	DOTDIGITAL_THEME_VERSION
);


// Add Theme Style
wp_enqueue_style(
	'dotdigital-main',
	DOTDIGITAL_THEME_URI . '/css/main.css',
	array(),
	DOTDIGITAL_THEME_VERSION
);

wp_add_inline_style( 'dotdigital-main', dotdigital_add_font_styles_in_head() );