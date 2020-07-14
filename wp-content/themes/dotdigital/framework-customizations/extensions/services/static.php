<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$ext_instance = fw()->extensions->get( 'services' );

fw_include_file_isolated( $ext_instance->get_path( '/static.php' ) );

if ( ! is_admin() ) {

	$settings = $ext_instance->get_settings();

	if ( is_tax( $settings[ 'taxonomy_name' ] ) || is_post_type_archive( $settings[ 'post_type' ] ) ) {

		//

	} elseif ( is_single() && 'fw-services' == $settings[ 'post_type' ] ) {

		//

	}
}



