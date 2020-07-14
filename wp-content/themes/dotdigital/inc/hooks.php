<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * Filters and Actions
 */

if ( ! function_exists( 'dotdigital_action_setup' ) ) :
	/**
	 * Theme setup.
	 *
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 * @internal
	 */
	function dotdigital_action_setup() {

		/*
		 * Make Theme available for translation.
		 */
		load_theme_textdomain( 'dotdigital', get_template_directory() . '/languages' );

		add_editor_style( array( 'css/main.css' ) );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );

		//Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		set_post_thumbnail_size( 1170, 780, true );
		add_image_size( 'dotdigital-full-width', 1170, 780, true );
		add_image_size( 'dotdigital-small-width', 600, 795, true );
		add_image_size( 'dotdigital-square', 600, 600, true );
		add_image_size( 'dotdigital-single-event', 500, 670, true );
		add_image_size( 'dotdigital-rectangular', 1170, 600, true );

		//content width
		$GLOBALS['content_width'] = apply_filters( 'dotdigital_filter_content_width', 891 );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'standard',
			'aside',
			'chat',
			'gallery',
			'link',
			'image',
			'quote',
			'status',
			'video',
			'audio',
		) );

		// Declare WooCommerce support
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

        // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

	} //dotdigital_action_setup()

endif;
add_action( 'after_setup_theme', 'dotdigital_action_setup' );


/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @param array $classes A list of existing body class values.
 *
 * @return array The filtered body class list.
 * @internal
 */
if ( !function_exists( 'dotdigital_filter_body_classes' ) ) :
	function dotdigital_filter_body_classes( $classes ) {
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		if ( get_header_image() ) {
			$classes[] = 'header-image';
		} else {
			$classes[] = 'masthead-fixed';
		}

		if ( is_archive() || is_search() || is_home() ) {
			$classes[] = 'archive-list-view';
		}

		if ( function_exists( 'fw_ext_sidebars_get_current_position' ) ) {
			$current_position = fw_ext_sidebars_get_current_position();
			if ( in_array( $current_position, array( 'full', 'left' ) )
			     || empty( $current_position )
			     || is_page_template( 'page-templates/full-width.php' )
			     || is_attachment()
			) {
				$classes[] = 'full-width';
			}
		} else {
			$classes[] = 'full-width';
		}

		if ( isset($_GET[ 'home_demo' ]) && $_GET[ 'home_demo' ] == '1') {
			$classes[] = 'home';
		}

		if ( is_active_sidebar( 'sidebar-footer' ) ) {
			$classes[] = 'footer-widgets';
		}

		if ( is_singular() && ! is_front_page() ) {
			$classes[] = 'singular';
		}

		if (defined( 'FW' ) && fw_get_db_post_option( get_the_ID(), 'slider_id', false )) {
			$classes[] = 'with-slider';
		}

		if (defined( 'FW' ) && fw_get_db_post_option( get_the_ID(), 'single_portfolio_layout' ) == 'layout-2') {
			$classes[] = 'single_portfolio_layout_2';
		}

		if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
			$classes[] = 'slider';
		} elseif ( is_front_page() ) {
			$classes[] = 'grid';
		}

		/* Body class color */
		$version            = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'version' ) : 'light';
		$main_section_class = ( $version !== 'light' ) ? 'light-body' : 'light-body';
		$classes[] = $main_section_class;

		return $classes;
	} //dotdigital_filter_body_classes()
endif;
add_filter( 'body_class', 'dotdigital_filter_body_classes' );

//changing default comment form
if ( ! function_exists( 'dotdigital_filter_dotdigital_contact_form_fields' ) ) :
	function dotdigital_filter_dotdigital_contact_form_fields( $fields ) {
		$commenter     = wp_get_current_commenter();
		$user          = wp_get_current_user();
		$user_identity = $user->exists() ? $user->display_name : '';
		$req           = get_option( 'require_name_email' );
		$aria_req      = ( $req ? " aria-required='true'" : '' );
		$html_req      = ( $req ? " required='required'" : '' );
		$html5         = 'html5';
		$fields        = array(
			'author'        => '<div class="col-xs-12">
<div class="form-group comment-form-author">' . '<label for="author">' . esc_html__( 'Your Name', 'dotdigital' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label>' .
			                   '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' placeholder="' . esc_attr__( '', 'dotdigital' ) . '"></div>
			                   </div>',
			'email'         => '<div class="col-xs-12">
<div class="form-group comment-form-email"><label for="email">' . esc_html__( 'Email Address', 'dotdigital' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label>' .
			                   '<input id="email" class="form-control" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" ' . $aria_req . $html_req . ' placeholder="' . esc_attr__( '', 'dotdigital' ) . '"/></div>
			                   </div>',
			'phone'        => '<div class="col-xs-12">
<div class="form-group comment-form-phone">' . '<label for="phone">' . esc_html__( 'Phone Number', 'dotdigital' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label>' .
			                  '<input id="phone" class="form-control" name="phone" type="text"  size="30"' . $aria_req . $html_req . ' placeholder="' . esc_attr__( '', 'dotdigital' ) . '"></div>
			                   </div>',
			'comment_field' => '<div class="col-xs-12"><div class="form-group comment-form-comment"><label for="comment">' . esc_html_x( 'Your Comment', 'noun', 'dotdigital' ) . '</label><textarea id="comment"  class="form-control" name="comment" cols="45" rows="5"  aria-required="true" required="required"  placeholder="' . esc_attr__( '', 'dotdigital' ) . '"></textarea></div></div>',
		);

		return $fields;
	} //dotdigital_filter_dotdigital_contact_form_fields()

endif;
add_filter( 'comment_form_default_fields', 'dotdigital_filter_dotdigital_contact_form_fields' );


//changing gallery thumbnail size for entry-thumbnail display
if ( ! function_exists( 'dotdigital_filter_fw_shortcode_atts_gallery' ) ) :
	function dotdigital_filter_fw_shortcode_atts_gallery( $out, $pairs, $atts ) {
		$out['size'] = 'post-thumbnail';
		return $out;
	} //dotdigital_filter_fw_shortcode_atts_gallery()
endif;

if ( ! function_exists( 'dotdigital_shortcode_atts_gallery_trigger' ) ) :
	function dotdigital_shortcode_atts_gallery_trigger( $add_filter = true ) {
		if ( $add_filter ) {
			add_filter( 'shortcode_atts_gallery', 'dotdigital_filter_fw_shortcode_atts_gallery', 10, 3 );
		} else {
			false;
		}
	} //dotdigital_shortcode_atts_gallery_trigger()
endif;

//custom posts per page count for portfolio category
if( ! function_exists( 'dotdigital_filter_change_posts_per_page' ) ) :
	function dotdigital_filter_change_posts_per_page( $query ) {
		if( ! function_exists('fw_get_db_term_option' ) ) {
			return;
		}
		if ( ! is_admin() && $query->is_main_query() ) {
			if ( $query->is_tax( 'fw-portfolio-category' ) ) {
				$atts = fw_get_db_term_option( $query->queried_object->term_taxonomy_id, $query->queried_object->taxonomy );
				if( ! empty(  $atts['items_per_page'] ) ) {
					$query->set( 'posts_per_page', $atts['items_per_page'] );
				}
			}
		}
	}
endif; //dotdigital_filter_change_posts_per_page
add_action( 'pre_get_posts', 'dotdigital_filter_change_posts_per_page' );


//changing events slug
if ( ! function_exists( 'dotdigital_filter_fw_ext_events_post_slug' ) ) :
	function dotdigital_filter_fw_ext_events_post_slug( $slug ) {
		return 'event';
	} //dotdigital_filter_fw_ext_events_post_slug()
endif;
add_filter( 'fw_ext_events_post_slug', 'dotdigital_filter_fw_ext_events_post_slug' );

//enable tags for events
if ( ! function_exists( 'dotdigital_add_tags_for_events_unyson_extension' ) ) :
	function dotdigital_add_tags_for_events_unyson_extension() {
		return true;
	}
endif;

add_filter('fw:ext:events:enable-tags', 'dotdigital_add_tags_for_events_unyson_extension');

if ( ! function_exists( 'dotdigital_filter_fw_ext_events_taxonomy_slug' ) ) :
	function dotdigital_filter_fw_ext_events_taxonomy_slug( $slug ) {
		return 'events';
	} //dotdigital_filter_fw_ext_events_taxonomy_slug()
endif;
add_filter( 'fw_ext_events_taxonomy_slug', 'dotdigital_filter_fw_ext_events_taxonomy_slug' );

// check if is WooCommerce Products Page. Need for Customizer setting.
if ( ! function_exists( 'dotdigital_is_woocommerce_page' ) ) :
	function dotdigital_is_woocommerce_page() {
		$res = false;
		if ( class_exists( 'WooCommerce' ) ) {
			if ( is_woocommerce() || is_product_category() || is_product_tag() ) {
				$res = true;
			}
		}
		return $res;
	}
endif;


if ( !function_exists( 'dotdigital_filter_monster_widget_text' ) ) :
	function dotdigital_filter_monster_widget_text( $text ) {
		$text = str_replace( 'name="monster-widget-just-testing"', 'name="monster-widget-just-testing" class="form-control"', $text );

		return $text;
	}
endif;
add_filter( 'monster-widget-get-text', 'dotdigital_filter_monster_widget_text' );


if ( ! function_exists( 'dotdigital_filter_add_paged_links_classes' ) ) {
	function dotdigital_filter_add_paged_links_classes( $paged_link ) {
		if ( $paged_link && ! is_admin() ) {
			$paged_link = str_replace( '<a', '<a class="theme_button small_button"', $paged_link, $replaces );
			//if page is current
			if ( ! $replaces ) {
				$paged_link = str_replace( '<span', '<span class="theme_button small_button color1 disabled"', $paged_link, $replaces );
			}
		}
		return $paged_link;
	}
	add_filter( 'wp_link_pages_link', 'dotdigital_filter_add_paged_links_classes' );
}


/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @param array $classes A list of existing post class values.
 *
 * @return array The filtered post class list.
 * @internal
 */
if ( !function_exists( 'dotdigital_filter_post_classes' ) ) :
	function dotdigital_filter_post_classes( $classes ) {
		if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
			$classes[] = 'has-post-thumbnail';
		}
		return $classes;
	} //dotdigital_filter_post_classes()
endif;
add_filter( 'post_class', 'dotdigital_filter_post_classes' );

//Remove Booked plugin front-end color theme (color-theme.php)
if( class_exists('booked_plugin')) {
	remove_action( 'wp_enqueue_scripts', array('booked_plugin', 'front_end_color_theme'));
}//Booked


/**
 * Add bootstrap CSS classes to default password protected form.
 *
 *
 * @return string HTML code of password form
 * @internal
 */
if ( !function_exists( 'dotdigital_filter_password_form' ) ) :
	function dotdigital_filter_password_form( $html ) {
		$label = esc_html__( 'Password', 'dotdigital' );
		$html  = str_replace( 'input name="post_password"', 'input class="form-control" name="post_password" placeholder="' . $label . '"', $html );
		$html  = str_replace( 'input type="submit"', 'input class="theme_button" type="submit"', $html );

		return $html;
	} //dotdigital_filter_password_form()
endif;
add_filter( 'the_password_form', 'dotdigital_filter_password_form' );


/**
 * Add bootstrap CSS class to readmore blog feed anchor.
 *
 *
 * @return string HTML code of password form
 * @internal
 */
if ( !function_exists( 'dotdigital_filter_gallery_post_style_owl') ) :
	function dotdigital_filter_gallery_post_style_owl( $gallery_html ) {
		if ( $gallery_html && ! is_admin() ) {
			$gallery_html = str_replace( 'gallery ', 'isotope_container ', $gallery_html );
			//if page is current
		}

		return $gallery_html;
	} //dotdigital_filter_gallery_post_style_owl()
endif;
add_filter( 'gallery_style', 'dotdigital_filter_gallery_post_style_owl' );

/**
 * Flush out the transients used in dotdigital_categorized_blog.
 * @internal
 */
if ( !function_exists( 'dotdigital_action_category_transient_flusher' ) ) :
	function dotdigital_action_category_transient_flusher() {
		delete_transient( 'dotdigital_category_count' );
	} //dotdigital_action_category_transient_flusher()
endif;
add_action( 'edit_category', 'dotdigital_action_category_transient_flusher' );
add_action( 'save_post', 'dotdigital_action_category_transient_flusher' );


/**
 * Register widget areas.
 * @internal
 */

if ( !function_exists( 'dotdigital_action_widgets_init' ) ) :
	function dotdigital_action_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Main Widget Area', 'dotdigital' ),
			'id'            => 'sidebar-main',
			'description'   => esc_html__( 'Appears in the content section of the site.', 'dotdigital' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		/* Register footer sidebars by footer layout */
		$footer_layout = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'footer' ) : '1';

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Fullwidth', 'dotdigital' ),
			'id'            => 'sidebar-footer-1',
			'description'   => esc_html__( 'Appears in the footer section of the site.', 'dotdigital' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

        register_sidebar( array(
            'name'          => esc_html__( 'Before footer', 'dotdigital' ),
            'id'            => 'before-footer',
            'description'   => esc_html__( 'Widgets in this area will be shown before footer. No more than three widgets', 'dotdigital' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 1', 'dotdigital' ),
			'id'            => 'sidebar-1-footer-alt',
			'description'   => esc_html__( 'Appears in the footer section of the site.', 'dotdigital' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 2', 'dotdigital' ),
			'id'            => 'sidebar-2-footer-alt',
			'description'   => esc_html__( 'Appears in the footer section of the site.', 'dotdigital' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 3', 'dotdigital' ),
			'id'            => 'sidebar-3-footer-alt',
			'description'   => esc_html__( 'Appears in the footer section of the site.', 'dotdigital' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Column 4', 'dotdigital' ),
            'id'            => 'sidebar-4-footer-alt',
            'description'   => esc_html__( 'Appears in the footer section of the site.', 'dotdigital' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

		register_sidebar( array(
			'name'          => esc_html__( 'Right Menu Sidebar', 'dotdigital' ),
			'id'            => 'sidebar-right-menu',
			'description'   => esc_html__( 'Widgets in this area will be shown in right side menu', 'dotdigital' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

	} //dotdigital_action_widgets_init()
endif;
add_action( 'widgets_init', 'dotdigital_action_widgets_init' );

// Fix YouTube Attr
if ( !function_exists( 'dotdigital_oembed_dataparse' ) ) :
function dotdigital_oembed_dataparse( $return, $data, $url )
{
	// Target only YouTube:
	if(
		is_object( $data )
		&&  property_exists( $data, 'provider_name' )
		&&  'YouTube' === $data->provider_name
	)
	{
		// Remove the unwanted attributes:
		$return = str_ireplace(
			array(
				'frameborder="0"',
				'allow="autoplay; encrypted-media"'
			),
			'',
			$return
		);
	}
	return $return;
}
endif;
add_filter( 'oembed_dataparse', 'dotdigital_oembed_dataparse', 10, 3 );

/**
 * Processing google fonts customizer options
 */

if ( ! function_exists( 'dotdigital_action_process_google_fonts' ) ) :
	function dotdigital_action_process_google_fonts() {
		$google_fonts        = fw_get_google_fonts();
		$include_from_google = array();

		$font_body     = fw_get_db_customizer_option( 'main_font' );
		$font_headings = fw_get_db_customizer_option( 'h_font' );

		// if is google font
		if ( isset( $google_fonts[ $font_body['family'] ] ) ) {
			$include_from_google[ $font_body['family'] ] = $google_fonts[ $font_body['family'] ];
		}

		if ( isset( $google_fonts[ $font_headings['family'] ] ) ) {
			$include_from_google[ $font_headings['family'] ] = $google_fonts[ $font_headings['family'] ];
		}

		$google_fonts_links = dotdigital_get_remote_fonts( $include_from_google );
		// set a option in db for save google fonts link
		update_option( 'dotdigital_google_fonts_link', $google_fonts_links );
	} //dotdigital_action_process_google_fonts()

endif;
add_action( 'customize_save_after', 'dotdigital_action_process_google_fonts', 999, 2 );

if ( ! function_exists( 'dotdigital_get_remote_fonts' ) ) :
	function dotdigital_get_remote_fonts( $include_from_google ) {
		/**
		 * Get remote fonts
		 *
		 * @param array $include_from_google
		 */
		if ( ! sizeof( $include_from_google ) ) {
			return '';
		}

		$html = "<link href='http://fonts.googleapis.com/css?family=";

		foreach ( $include_from_google as $font => $styles ) {
			$html .= str_replace( ' ', '+', $font ) . ':' . implode( ',', $styles['variants'] ) . '|';
		}

		$html = substr( $html, 0, - 1 );
		$html .= "' rel='stylesheet' type='text/css'>";

		return $html;
	} //dotdigital_get_remote_fonts()
endif;

//admin dashboard styles and scripts
if ( ! function_exists( 'dotdigital_action_load_custom_wp_admin_style' ) ) :
	function dotdigital_action_load_custom_wp_admin_style() {
		wp_register_style( 'custom_wp_admin_css', DOTDIGITAL_THEME_URI . '/css/admin-style.css', false, '1.0.0' );
		wp_enqueue_style( 'custom_wp_admin_css' );

		wp_register_style( 'custom_wp_admin_fonts', DOTDIGITAL_THEME_URI . '/css/fonts.css', false, '1.0.0' );
		wp_enqueue_style( 'custom_wp_admin_fonts' );

		if ( defined( 'FW' ) ) {
			wp_enqueue_script(
				'dotdigital-dashboard-widget-script',
				DOTDIGITAL_THEME_URI . '/js/dashboard-widget-script.js',
				array( 'jquery' ),
				'1.0',
				false
			);
		}
	} //dotdigital_action_load_custom_wp_admin_style()
endif;
add_action( 'admin_enqueue_scripts', 'dotdigital_action_load_custom_wp_admin_style' );

/**
 * Tracking Scripts (for wp_head & wp_footer)
 */
if ( ! function_exists('dotdigital_action_head_scripts')) :
	/**
	 * Add top tracking scripts
	 */
	function dotdigital_action_head_scripts()	{
		if (function_exists('fw_get_db_customizer_option')) {
			$tracking_scripts = fw_get_db_customizer_option('tracking_scripts_top', '');
			if (!empty($tracking_scripts)) {
				foreach ($tracking_scripts as $script) {
					if (isset($script['script']) && !empty($script['script'])) {
						echo '<!-- wp_head TS -->'. $script['script'] .'<!-- End wp_head TS -->';
					}
				}
			}
		};
	}
endif;
add_action('wp_head', 'dotdigital_action_head_scripts');


if ( !function_exists('dotdigital_action_footer_scripts') ) :
	/**
	 * Add bottom tracking scripts
	 */
	function dotdigital_action_footer_scripts()	{
		if (function_exists('fw_get_db_customizer_option')) {
			$tracking_scripts = fw_get_db_customizer_option('tracking_scripts_bottom', '');
			if (!empty($tracking_scripts)) {
				foreach ($tracking_scripts as $script) {
					if (isset($script['script']) && !empty($script['script'])) {
						echo '<!-- wp_footer TS -->'. $script['script'] .'<!-- End wp_footer TS -->';
					}
				}
			}
		};
	}
endif;
add_action('wp_footer', 'dotdigital_action_footer_scripts');


// removing woo styles
// Remove each style one by one
if ( !function_exists('dotdigital_filter_dotdigital_dequeue_styles')) :
	function dotdigital_filter_dotdigital_dequeue_styles( $enqueue_styles ) {
		unset( $enqueue_styles['woocommerce-general'] );    // Remove the gloss
		unset( $enqueue_styles['woocommerce-layout'] );        // Remove the layout
		unset( $enqueue_styles['woocommerce-smallscreen'] );    // Remove the smallscreen optimisation
		return $enqueue_styles;
	} //dotdigital_filter_dotdigital_dequeue_styles()
endif;
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

//if Unyson installed - managing main slider and contact form scripts, sidebars
if ( defined( 'FW' ) ):
	//display main slider
	if ( ! function_exists( 'dotdigital_action_slider' ) ):

		function dotdigital_action_slider() {
			$slider_id = fw_get_db_post_option( get_the_ID(), 'slider_id', false );
			if ( fw_ext( 'slider' ) ) {
				echo fw()->extensions->get( 'slider' )->render_slider( $slider_id, false );
			}

		}

		add_action( 'dotdigital_slider', 'dotdigital_action_slider' );

	endif;

	//display blog slider
	if ( ! function_exists( 'dotdigital_action_blog_slider' ) ):

		function dotdigital_action_blog_slider() {

			$blog_slider_options = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'blog_slider_switch' ) : '';
			$blog_slider_enabled = $blog_slider_options['blog_slider_enabled'];
			if( $blog_slider_enabled == 'yes') {
				$slider_id= $blog_slider_options['yes']['slider_id'];
				if ( fw_ext( 'slider' ) ) {
					echo fw()->extensions->get( 'slider' )->render_slider( $slider_id, false );
				}
			}

		}

		add_action( 'dotdigital_blog_slider', 'dotdigital_action_blog_slider' );

	endif;

	/**
	 * Display current submitted FW_Form errors
	 * @return array
	 */
	if ( ! function_exists( 'dotdigital_action_display_form_errors' ) ):
		function dotdigital_action_display_form_errors() {
			$form = FW_Form::get_submitted();

			if ( ! $form || $form->is_valid() ) {
				return;
			}

			wp_enqueue_script(
				'dotdigital-show-form-errors',
				DOTDIGITAL_THEME_URI . '/js/form-errors.js',
				array( 'jquery' ),
				'1.0',
				true
			);

			wp_localize_script( 'dotdigital-show-form-errors', '_localized_form_errors', array(
				'errors'  => $form->get_errors(),
				'form_id' => $form->get_id()
			) );
		}
	endif;
	add_action( 'wp_enqueue_scripts', 'dotdigital_action_display_form_errors' );


	//removing standard sliders from Unyson - we use our theme slider
	if ( !function_exists( 'dotdigital_filter_disable_sliders' ) ) :
		function dotdigital_filter_disable_sliders( $sliders ) {
			foreach ( array( 'owl-carousel', 'bx-slider', 'nivo-slider' ) as $name ) {
				$key = array_search( $name, $sliders );
				unset( $sliders[ $key ] );
			}

			return $sliders;
		}
	endif;

	add_filter( 'fw_ext_slider_activated', 'dotdigital_filter_disable_sliders' );

	//removing standard fields from Unyson slider - we use our own slider fields
	if ( !function_exists( 'dotdigital_slider_population_method_custom_options' ) ) :
		function dotdigital_slider_population_method_custom_options( $arr ) {
			/**
			 * Filter for disable standard slider fields for carousel slider
			 *
			 * @param array $arr
			 */
			unset(
				$arr['wrapper-population-method-custom']['options']['custom-slides']['slides_options']['title'],
				$arr['wrapper-population-method-custom']['options']['custom-slides']['slides_options']['desc']
			);

			return $arr;
		}
	endif;
	add_filter( 'fw_ext_theme_slider_population_method_custom_options', 'dotdigital_slider_population_method_custom_options' );

	//adding custom sidebar for shop page if WooCommerce active
	if ( class_exists( 'WooCommerce' ) ) :
		if ( !function_exists( 'dotdigital_filter_fw_ext_sidebars_add_conditional_tag' ) ) :
			function dotdigital_filter_fw_ext_sidebars_add_conditional_tag($conditional_tags) {
				$conditional_tags['is_archive_page_slug'] = array(
					'order_option' => 2, // (optional: default is 1) position in the 'Others' lists in backend
					'check_priority' => 'last', // (optional: default is last, can be changed to 'first') use it to change priority checking conditional tag
					'name' => esc_html__('Products Type - Shop', 'dotdigital'), // conditional tag title
					'conditional_tag' => array(
						'callback' => 'is_shop', // existing callback
						'params' => array('products') //parameters for callback
					)
				);

				return $conditional_tags;
			}
		endif;
		add_filter('fw_ext_sidebars_conditional_tags', 'dotdigital_filter_fw_ext_sidebars_add_conditional_tag' );

		remove_theme_support( 'wc-product-gallery-zoom' );
		remove_theme_support( 'wc-product-gallery-lightbox' );
		remove_theme_support( 'wc-product-gallery-slider' );
	endif; //WooCommerce

	//theme icon fonts
	if ( ! function_exists( 'dotdigital_filter_custom_packs_list' ) ) :
		function dotdigital_filter_custom_packs_list($current_packs) {
			/**
			 * $current_packs is an array of pack names.
			 * You should return which one you would like to show in the picker.
			 */
			return array('rt_icons', 'font-awesome');
		}
	endif;
	add_filter('fw:option_type:icon-v2:filter_packs', 'dotdigital_filter_custom_packs_list');

	if ( ! function_exists( 'dotdigital_filter_add_my_icon_pack' ) ) :
		function dotdigital_filter_add_my_icon_pack($default_packs) {
			/**
			 * No fear. Defaults packs will be merged in back. You can't remove them.
			 * Changing some flags for them is allowed.
			 */
			return array(
				'rt_icons' => array(
					'name'             => 'rt_icons', // same as key
					'title'            => esc_html__( 'RT Icons', 'dotdigital' ),
					'css_class_prefix' => 'rt-icon2',
					'css_file'         => get_template_directory() . '/css/fonts.css',
					'css_file_uri'     => DOTDIGITAL_THEME_URI . '/css/fonts.css',
				),
			);
		}
	endif;
	add_filter('fw:option_type:icon-v2:packs', 'dotdigital_filter_add_my_icon_pack');

	if ( ! function_exists( 'dotdigital_breadcrumbs_blank_search_query_fix' ) ) :
		/**
		 * Breadcrumbs modifications
		 */
		function dotdigital_breadcrumbs_blank_search_query_fix( $items ) {

			if ( is_search() ) {
			    $query = trim (get_search_query());
				if ( empty ($query )) {
					$items[ sizeof( $items ) - 1 ]['name'] = esc_html__( 'Search', 'dotdigital' );
				}
			}

			return $items;
		}
	endif;

	add_filter( 'fw_ext_breadcrumbs_build', 'dotdigital_breadcrumbs_blank_search_query_fix' );

endif; //defined('FW')

//adding custom styles to TinyMCE
// Callback function to insert 'styleselect' into the $buttons array
if ( ! function_exists( 'dotdigital_filter_mce_theme_format_insert_button' ) ) :
	function dotdigital_filter_mce_theme_format_insert_button( $buttons ) {
		array_unshift( $buttons, 'styleselect' );

		return $buttons;
	} //dotdigital_filter_mce_theme_format_insert_button()
endif;
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'dotdigital_filter_mce_theme_format_insert_button' );

// Callback function to filter the MCE settings
if ( ! function_exists( 'dotdigital_filter_mce_theme_format_add_styles' ) ) :
	function dotdigital_filter_mce_theme_format_add_styles( $init_array ) {
		// Define the style_formats array
		$style_formats = array(
			// Each array child is a format with it's own settings
			array(
				'title'   => esc_html__( 'Excerpt', 'dotdigital' ),
				'block'   => 'p',
				'classes' => 'entry-excerpt',
				'wrapper' => false,
			),
			array(
				'title'   => esc_html__( 'Paragraph with dropcap', 'dotdigital' ),
				'block'   => 'p',
				'classes' => 'big-first-letter',
				'wrapper' => false,
			),
			array(
				'title'   => esc_html__( 'Main theme color', 'dotdigital' ),
				'inline'  => 'span',
				'classes' => 'highlight',
				'wrapper' => false,
			),

		);
		// Insert the array, JSON ENCODED, into 'style_formats'
		$init_array['style_formats'] = json_encode( $style_formats );

		return $init_array;

	} //dotdigital_filter_mce_theme_format_add_styles()
endif;
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'dotdigital_filter_mce_theme_format_add_styles', 1 );

if ( ! function_exists( 'dotdigital_include_file_from_child' ) ) :
	/**
	 * Include a file first from child if exist else from parent
	 */
	function dotdigital_include_file_from_child( $file ) {
		if ( file_exists( get_stylesheet_directory() . $file ) ) {
			return get_stylesheet_directory_uri() . $file;
		} else {
			return get_template_directory_uri() . $file;
		}
	}
endif;

// Highlight widget title first word
if ( ! function_exists( 'dotdigital_widget_title_first_word' ) ) :
	function dotdigital_widget_title_first_word( $title ) {
		if ( ! empty ( $title ) ) {
			$title_parts = explode( ' ', $title, 2 );
			// Cut the title to 2 parts
			if (count($title_parts) > 1 ) {
				// Throw first word inside a span
				$title = '<span class="first-word">' . $title_parts[0] . '</span>';

				// Add the remaining words if any
				if ( isset( $title_parts[1] ) ) {
					$title .= ' ' . $title_parts[1];
				}
			}
			return $title;
		} else {
			return false;
		}
	}
	add_filter( 'widget_title', 'dotdigital_widget_title_first_word' );
endif;

// Highlight widget title last word
if ( ! function_exists( 'dotdigital_widget_title_last_word' ) ) :
	function dotdigital_widget_title_last_word( $title ) {
		if ( ! empty ( $title ) ) {
			$title_parts = explode( ' ', $title);
			if (count($title_parts) > 1 ) {
				$title_parts[count($title_parts)-1] = '<span class="last-word">'.($title_parts[count($title_parts)-1]).'</span>';
				$title = implode(' ', $title_parts);
			}
			return $title;
		} else {
			return false;
		}
	}
	add_filter( 'widget_title', 'dotdigital_widget_title_last_word' );
endif;


/**
 * Add  excerpt length 15 words
 */
if ( ! function_exists( 'dotdigital_custom_excerpt_length' ) ) :
function dotdigital_custom_excerpt_length( $length ) {
		return 15;
}
endif;
add_filter( 'excerpt_length', 'dotdigital_custom_excerpt_length', 999 );

/**
 * Remove excerpt dots [...]
 */
if ( ! function_exists( 'dotdigital_excerpt_more' ) ) :
	function dotdigital_excerpt_more( $more ) {
		return ' ...';
	}
	add_filter('excerpt_more', 'dotdigital_excerpt_more');
endif;

/* Hiding category and archives titles */
if ( ! function_exists( 'dotdigital_filter_fix_cat_title' ) ) :
	function dotdigital_filter_fix_cat_title($title) {
		return preg_replace('/^.*: /', '<span class="taxonomy-name-title">${0}</span>', $title );
	}
	add_filter('get_the_archive_title', 'dotdigital_filter_fix_cat_title');
endif;

/* Using Child Theme Admin Notice */
if ( ! function_exists( 'dotdigital_admin_notice_child_theme' ) ) :
	function dotdigital_admin_notice_child_theme() {
		global $pagenow;
		if ( $pagenow == 'themes.php' ) {
			?>
			<div class="notice notice-info">
				<p>
					<b><?php esc_html_e( 'Important! First you should install the demo content on the parent theme, then you should activate the child theme. If you do not activate the child theme - you may lose all your customizations after theme updates!', 'dotdigital' ); ?></b>
				</p>
			</div>
			<?php
		}
	}
	add_action( 'admin_notices', 'dotdigital_admin_notice_child_theme' );
endif;

//demo content on remote hosting
/**
 * @param FW_Ext_Backups_Demo[] $demos
 *
 * @return FW_Ext_Backups_Demo[]
 */
if ( ! function_exists( 'dotdigital_filter_theme_fw_ext_backups_demos' ) ) :

	function dotdigital_filter_theme_fw_ext_backups_demos( $demos ) {
		$demo_version_suffix = '-v' . DOTDIGITAL_REMOTE_DEMO_VERSION; // '-v2.1.0'
		if ( class_exists( 'FW_Ext_Backups_Demo' ) ) :
			$demos_array = array(
				'dotdigital-demo' . $demo_version_suffix => array (
					'title'        => esc_html__( 'DotDigital Demo', 'dotdigital' ),
					'screenshot'   => esc_url('http://webdesign-finder.com/dotdigital/demo/screenshot.png'),
					'preview_link' => esc_url('http://webdesign-finder.com/dotdigital/'),
				),
                'dotdigital-ai' . $demo_version_suffix => array (
                    'title'        => esc_html__( 'DotDigital AI', 'dotdigital' ),
                    'screenshot'   => esc_url('http://webdesign-finder.com/dotdigital/demo/screenshot-ai.png'),
                    'preview_link' => esc_url('http://webdesign-finder.com/dotdigital-demo/'),
                ),
                'dotdigital-devices' . $demo_version_suffix => array (
                    'title'        => esc_html__( 'DotDigital Devices', 'dotdigital' ),
                    'screenshot'   => esc_url('http://webdesign-finder.com/dotdigital/demo/screenshot-devices.png'),
                    'preview_link' => esc_url('http://webdesign-finder.com/dotdigital-demo/'),
                ),
                'dotdigital-startup' . $demo_version_suffix => array (
                    'title'        => esc_html__( 'DotDigital Startup', 'dotdigital' ),
                    'screenshot'   => esc_url('http://webdesign-finder.com/dotdigital/demo/screenshot-startup.png'),
                    'preview_link' => esc_url('http://webdesign-finder.com/dotdigital-demo/'),
                ),
                'dotdigital-design' . $demo_version_suffix => array (
                    'title'        => esc_html__( 'DotDigital Web Design', 'dotdigital' ),
                    'screenshot'   => esc_url('http://webdesign-finder.com/dotdigital/demo/screenshot-design.png'),
                    'preview_link' => esc_url('http://webdesign-finder.com/dotdigital-demo/'),
                ),
                'dotdigital-marketing' . $demo_version_suffix => array (
                    'title'        => esc_html__( 'DotDigital Marketing', 'dotdigital' ),
                    'screenshot'   => esc_url('http://webdesign-finder.com/dotdigital/demo/screenshot-marketing.png'),
                    'preview_link' => esc_url('http://webdesign-finder.com/dotdigital-demo/'),
                ),
                'dotdigital-tech-lab' . $demo_version_suffix => array (
                    'title'        => esc_html__( 'DotDigital Tech LAB', 'dotdigital' ),
                    'screenshot'   => esc_url('http://webdesign-finder.com/dotdigital/demo/screenshot-tech-lab.png'),
                    'preview_link' => esc_url('http://webdesign-finder.com/dotdigital-demo/'),
                ),
			);

			$download_url = esc_url('http://webdesign-finder.com/dotdigital/demo/');

			foreach ( $demos_array as $id => $data ) {
				$demo = new FW_Ext_Backups_Demo( $id, 'piecemeal', array(
					'url'     => $download_url,
					'file_id' => $id,
				) );
				$demo->set_title( $data['title'] );
				$demo->set_screenshot( $data['screenshot'] );
				$demo->set_preview_link( $data['preview_link'] );

				$demos[ $demo->get_id() ] = $demo;

				unset( $demo );
			}

			return $demos;

		endif; //class_exists
	} //dotdigital_filter_theme_fw_ext_backups_demos()
endif;
add_filter( 'fw:ext:backups-demo:demos', 'dotdigital_filter_theme_fw_ext_backups_demos' );

if ( !function_exists( 'dotdigital_action_flush_rewrite_rules' ) ) :
    function dotdigital_action_flush_rewrite_rules() {
        flush_rewrite_rules();
        if ( class_exists( 'Wp_Scss' ) && function_exists( 'wp_scss_compile' ) ) {
            wp_scss_compile();
        }
    }
endif;
add_action( 'fw:ext:backups:tasks:finish:id:demo-content-install', 'dotdigital_action_flush_rewrite_rules' );

//Predefined Form Builder Templates
if ( ! function_exists( 'dotdigital_filter_theme_page_builder_predefined_templates_contact_forms' ) ) :
    function dotdigital_filter_theme_page_builder_predefined_templates_contact_forms( $templates ) {
        $variables = fw_get_variables_from_file(
            DOTDIGITAL_THEME_PATH . '/inc/builder-templates/forms.php',
            array( 'templates' => array() )
        );

        return array_merge( $templates, $variables['templates'] );
    }
endif;
add_filter( 'fw_ext_builder:predefined_templates:form-builder:full', 'dotdigital_filter_theme_page_builder_predefined_templates_contact_forms' );

//Predefined Page Builder Templates
if ( ! function_exists( 'dotdigital_filter_theme_page_builder_predefined_templates_pages' ) ) :
    function dotdigital_filter_theme_page_builder_predefined_templates_pages( $templates ) {
        $variables = fw_get_variables_from_file(
            DOTDIGITAL_THEME_PATH . '/inc/builder-templates/pages.php',
            array( 'templates' => array() )
        );

        return array_merge( $templates, $variables['templates'] );
    }
endif;
add_filter( 'fw_ext_builder:predefined_templates:page-builder:full', 'dotdigital_filter_theme_page_builder_predefined_templates_pages' );


if ( ! function_exists( 'dotdigital_filter_theme_page_builder_predefined_templates_sections' ) ) :
    function dotdigital_filter_theme_page_builder_predefined_templates_sections( $templates ) {
        $variables = fw_get_variables_from_file(
            DOTDIGITAL_THEME_PATH . '/inc/builder-templates/sections.php',
            array( 'templates' => array() )
        );

        return array_merge( $templates, $variables['templates'] );
    }
endif;
add_filter( 'fw_ext_builder:predefined_templates:page-builder:section', 'dotdigital_filter_theme_page_builder_predefined_templates_sections' );

if ( ! function_exists( 'dotdigital_filter_theme_page_builder_predefined_templates_columns' ) ) :
    function dotdigital_filter_theme_page_builder_predefined_templates_columns( $templates ) {
        $variables = fw_get_variables_from_file(
            DOTDIGITAL_THEME_PATH . '/inc/builder-templates/columns.php',
            array( 'templates' => array() )
        );

        return array_merge( $templates, $variables['templates'] );

    }
endif;
add_filter( 'fw_ext_builder:predefined_templates:page-builder:column', 'dotdigital_filter_theme_page_builder_predefined_templates_columns' );