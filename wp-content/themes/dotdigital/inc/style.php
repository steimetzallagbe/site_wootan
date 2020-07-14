<?php
/**
 * Requires the WP-SCSS plugin to be installed and activated.
 */


if ( ! function_exists( 'dotdigital_get_theme_colors_defaults' ) ) :
	/**
	 * Return default values for uninitialized theme mods.
	 * https://make.wordpress.org/themes/tag/theme-mods-api/
	 */

	function dotdigital_get_theme_colors_defaults() {
		$defaults = array(
            'color_1' => '#ff497c',
            'color_2' => '#a0ce4e',
            'color_3' => '#00bea3',
            'color_4' => '#f1894c',
		);
		return apply_filters( 'dotdigital_theme_colors_defaults', $defaults );
	}
endif;

//check for wp_scss plugin activated for options in customizer.php
if ( ! function_exists( 'dotdigital_wp_scss_is_installed' ) ) :
    function dotdigital_wp_scss_is_installed() {
        return class_exists('Wp_Scss');
    }
endif;

/* dotdigital_set_color_palette */
if ( !function_exists( 'dotdigital_set_color_palette' ) ) {
	function dotdigital_set_color_palette() {
		$color_palette = dotdigital_get_theme_colors_defaults();
		$array = array();
		foreach($color_palette as $val) {
			$array[] = $val;
		}
		return $array;
	}
} //dotdigital_set_color_palette

if ( class_exists('Wp_Scss') ) {

    //load recompile script
    add_action('customize_register', 'dotdigital_action_customizer_enqueue_scss_compile_script');
    add_action('customize_preview_init', 'dotdigital_action_customizer_enqueue_scss_compile_script');

    //live preview color scripts - will be loaded only if Wp_Scss class exists below
    if ( ! function_exists( 'dotdigital_action_customizer_enqueue_scss_compile_script' ) ) :
        function dotdigital_action_customizer_enqueue_scss_compile_script() {

            wp_register_script(
                'dotdigital-customizer-scss',
                DOTDIGITAL_THEME_URI . '/js/theme-customizer-scss.js',
                array( 'jquery','customize-preview' ),
                DOTDIGITAL_THEME_VERSION,
                true
            );

            wp_localize_script('dotdigital-customizer-scss', 'dotdigital_customizer_text', array(
                'button_text' => esc_html__( 'Override first color scheme!', 'dotdigital' ),
                'button_reset_text' => esc_html__( 'Reset first color scheme', 'dotdigital' ),
                'error_text' => esc_html__( 'Error. Did you set up your WP SCSS plugin directories correctly?', 'dotdigital' ),
            ));

            wp_enqueue_script(
                'dotdigital-customizer-scss'
            );
        }
    endif;

	/* dotdigital_scss_set_variables */
	if ( !function_exists( 'dotdigital_scss_set_variables' ) ) :
		function dotdigital_scss_set_variables() {
			/* Colors */
			$accent_color_1  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'accent_color_1' ) : '';
			$accent_color_2  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'accent_color_2' ) : '';
			$accent_color_3  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'accent_color_3' ) : '';
			$accent_color_4  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'accent_color_4' ) : '';


            //if isset $_POST with this variables - overriding
            if ( !empty($_POST['action'])) {
                if ($_POST['action'] == 'dotdigital_compile_scss' ) {
                    $accent_color_1 = esc_attr( $_POST['accent_color_1'] );
                    $accent_color_2 = esc_attr( $_POST['accent_color_2'] );
                    $accent_color_3 = esc_attr( $_POST['accent_color_3'] );
                    $accent_color_4 = esc_attr( $_POST['accent_color_4'] );
                }
            }

			/* Variables */
			$variables = array(
				/* Theme color scheme */
				'mainColor'             =>  $accent_color_1,
				'mainColor2'            =>  $accent_color_2,
				'mainColor3'            =>  $accent_color_3,
				'mainColor4'            =>  $accent_color_4,
			);

			return $variables;
		}
	endif; //dotdigital_scss_set_variables
	add_filter( 'wp_scss_variables', 'dotdigital_scss_set_variables' );

    //ajax customizer compiling SCSS files
    add_action( 'wp_ajax_dotdigital_compile_scss', 'dotdigital_compile_scss' );
    // if ( !empty($_POST['action'])) {
    //     if ($_POST['action'] == 'dotdigital_compile_scss' ) {
    //         add_action('wp_head', 'dotdigital_compile_scss');
    //     }
    // }

    //compile scss via ajax
    if ( !function_exists( 'dotdigital_compile_scss' ) ) :
        function dotdigital_compile_scss() {

            check_ajax_referer( 'preview-customize_' . get_stylesheet(), 'customize_preview_nonce', true );

            //compiling
            wp_scss_compile();

            //processing errors
            global $wpscss_compiler;
            $error_string = '';
            foreach ( $wpscss_compiler->compile_errors as $error ) {
                $error_string .= $error['file'] . ' - ' . $error['message'];
            }
            if ( ! empty( $error_string ) ) {
                wp_send_json_error( $error_string, 500);
            }
            wp_die();
        }
    endif;
}