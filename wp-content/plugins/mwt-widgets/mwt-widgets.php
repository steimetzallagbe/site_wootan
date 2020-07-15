<?php
/*
Plugin Name: Modern Web Templates theme widgets
Description: Additional widgets for theme
Version:     1.0.0
Author:      mwtemplates
Author URI:  https://themeforest.net/user/mwtemplates/
License:     GPLv2 or later
*/
define('MWT_WIDGETS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );


if (!function_exists( 'mwt_widgets_dirname_to_classname' ) ) {
	function mwt_widgets_dirname_to_classname( $dirname ) {
		$class_name = explode( '-', $dirname );
		$class_name = array_map( 'ucfirst', $class_name );
		$class_name = implode( '_', $class_name );

		return $class_name;
	}
}

add_action( 'widgets_init', 'mwt_action_widgets_init' );
if (!function_exists( 'mwt_action_widgets_init' ) ) {
	function mwt_action_widgets_init() {
		$dirs = array(
            'banner',
            'icon-box',
            'icons-list',
            'portfolio',
            'post-tabs',
            'posts',
            'socials',
            'socials-2',
            'theme-posts',
            'twitter',
		);

		foreach ( $dirs as $dir ) {

			$dirname = $dir;

			if ( isset( $included_widgets[ $dirname ] ) ) {
				// this happens when a widget in child theme wants to overwrite the widget from parent theme
				continue;
			} else {
				$included_widgets[ $dirname ] = true;
			}

			//checking that file exists in provided dirs
			$full_path_to_widget_class = MWT_WIDGETS_PLUGIN_PATH . '/widgets/'. $dirname . '/class-widget-' . $dirname . '.php';
			if ( file_exists( $full_path_to_widget_class ) ) {
				require_once $full_path_to_widget_class;

				$widget_class = 'Dotdigital_Widget_' . mwt_widgets_dirname_to_classname( $dirname );
				if ( class_exists( $widget_class ) ) {
					register_widget( $widget_class );
				}
			}
		}
	}
}

