<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$shortcodes_extension = fw()->extensions->get( 'shortcodes' );

//light or dark version
$version            = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'version' ) : 'light';

//header phone number
$header_phone = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_phone' ) : '';

get_template_part( 'template-parts/header/header-104' );

//header search button
$header_search_button = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'search_button_block' ) : 'default';
?>
<header id="header" class="main-header-wrap transparent_wrapper header-12 ">
	<div class="page_header toppadding_30 bottompadding_30 ds toggler_xs_right ">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 display_table">
					<div class="header_left_logo display_table_cell">
						<?php get_template_part( 'template-parts/header/header-logo' ); ?>
					</div>
                    <div class="header_right_buttons display_table_cell text-right ">
                        <span class="toggle_menu_side toggle_menu_side_special"><span></span></span>
                    </div><!-- eof .header_button -->
				</div><!--	eof .col-sm-* -->
			</div><!--	eof .row-->
		</div> <!--	eof .container-->
	</div><!-- eof .page_header -->
</header>