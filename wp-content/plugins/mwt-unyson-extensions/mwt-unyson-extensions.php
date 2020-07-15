<?php
/*
Plugin Name: Modern Web Templates Unyson Extensions
Description: Additional extensions for Unyson plugin
Version:     1.1.0
Author:      mwtemplates
Author URI:  https://themeforest.net/user/mwtemplates/
License:     GPLv2 or later
*/

/**
 * @internal
 */
function _filter_mwt_unyson_additional_extensions($locations) {
    $locations[ dirname(__FILE__) . '/extensions' ]
    =
    plugin_dir_url( __FILE__ ) . 'extensions';

    return $locations;
}
add_filter('fw_extensions_locations', '_filter_mwt_unyson_additional_extensions');



/*
 * Helpers for all mwt Unyson extensions that ships with this plugin
 *
*/


/**
 * @param int|array $term_ids
 *
 * @return array|WP_Error
 */
function fw_ext_extension_get_listing_categories( $term_ids, $extension_name ) {

	$args = array(
		'hide_empty'    => false
	);

	if ( ! empty( $term_ids ) ) {
		if ( is_numeric( $term_ids ) ) {
			$args['parent'] = $term_ids;
		} elseif ( is_array( $term_ids ) ) {
			$args['include'] = $term_ids;
		}
	}

	$ext_extension_settings = fw()->extensions->get( $extension_name )->get_settings();
	$taxonomy               = $ext_extension_settings['taxonomy_name'];

	$categories = get_terms( $taxonomy, $args );

	if ( ! is_wp_error( $categories ) && ! empty( $categories ) ) {

		foreach ( $categories as $key => $category ) {
			$children                     = get_term_children( $category->term_id, $taxonomy );
			$categories[ $key ]->children = $children;

			//remove empty categories
			if ( ( $category->count == 0 ) && ( is_wp_error( $children ) || empty( $children ) ) ) {
				unset( $categories[ $key ] );
			}
		}

		return $categories;
	}

	return array();
}

/**
 * @param WP_Post[] $items
 * @param array $categories
 * @param string $prefix
 *
 * @return array
 */
function fw_ext_extension_get_sort_classes( array $items, array $categories, $prefix = '', $extension_name ) {

	$ext_extension_settings = fw()->extensions->get( $extension_name )->get_settings();
	$taxonomy = $ext_extension_settings['taxonomy_name'];
	$classes            = array();
	$categories_classes = array();
	foreach ( $items as $key => $item ) {
		$class_name = '';
		$terms      = wp_get_post_terms( $item->ID, $taxonomy );

		if ( ( ! empty( $terms ) ) && ! empty ( $categories ) ) {
			foreach ( $terms as $term ) {
				foreach ( $categories as $category ) {
					if ( $term->term_id == $category->term_id ) {
						$class_name .= $prefix . $category->slug . ' ';
						$categories_classes[ $term->term_id ] = true;
					} else {
						if ( in_array( $term->term_id, $category->children, true ) ) {
							$class_name .= $prefix . $category->slug . ' ';
							$categories_classes[ $term->term_id ] = true;
						}
					}
					$classes[ $item->ID ] = $class_name;
				}
			}
		//if no terms
		} else {
			$classes[ $item->ID ] = '';
		}
	}
	return $classes;
}


function fw_ext_extension_get_columns_classes( $full_width = false ) {
	//default values
	$column_classes = array(
		'main_column_class' => 'col-sm-7 col-md-8 col-lg-8',
		'sidebar_class'     => 'col-sm-5 col-md-4 col-lg-4'
	);
	if ( is_page() ) {
		$column_classes['main_column_class'] = "col-sm-12";
		$column_classes['sidebar_class']     = false;
	}

	if ( function_exists( 'fw_ext_sidebars_get_current_position' ) ) {

		//full width
		if ( in_array( fw_ext_sidebars_get_current_position(), array( 'full' ) ) ) {

			$column_classes['main_column_class'] = "col-sm-12";
			$column_classes['sidebar_class']     = false;

			//left sidebar
		} elseif ( in_array( fw_ext_sidebars_get_current_position(), array( 'left' ) ) ) {

			$column_classes['main_column_class'] = "col-sm-7 col-md-8 col-lg-8 col-sm-push-5 col-md-push-4 col-lg-push-4";
			$column_classes['sidebar_class']     = "col-sm-5 col-md-4 col-lg-4 col-sm-pull-7 col-md-pull-8 col-lg-pull-8";
		} elseif ( in_array( fw_ext_sidebars_get_current_position(), array( 'right' ) ) ) {

			$column_classes['main_column_class'] = "col-sm-7 col-md-8 col-lg-8";
			$column_classes['sidebar_class']     = "col-sm-5 col-md-4 col-lg-4";

		} //no catching right sidebar. Right sidebar is default
		else {

			//default - right sidebar
			$column_classes['main_column_class'] = "col-sm-7 col-md-8 col-lg-8";
			$column_classes['sidebar_class']     = "col-sm-5 col-md-4 col-lg-4";

			//default for page is fullwidth
			if ( is_page() ) {
				$column_classes['main_column_class'] = "col-sm-12";
				$column_classes['sidebar_class']     = false;
			}
		}
	}

	if ( $full_width ) {
		$column_classes['main_column_class'] = "col-sm-12";
		$column_classes['sidebar_class']     = false;
	}

	return $column_classes;
}

