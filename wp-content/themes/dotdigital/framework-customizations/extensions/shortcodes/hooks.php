<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/** @internal */
if ( ! function_exists( 'dotdigital_filter_disable_shortcodes' ) ) :
	function dotdigital_filter_disable_shortcodes( $to_disable ) {
		$to_disable[] = '';

		return $to_disable;
	}
endif;
add_filter( 'fw_ext_shortcodes_disable_shortcodes', 'dotdigital_filter_disable_shortcodes' );