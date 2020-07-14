<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$social_icons = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'social_icons' ) : '';

//light or dark version
$version  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'version' ) : 'light';

?>
<header id="header" class="page_header header_1 toggler_right affix-top ds">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 display_table">
				<div class="header_left_logo display_table_cell">
					<?php get_template_part( 'template-parts/header/header-logo' ); ?>
				</div><!-- eof .header_left_logo -->
				<div class="header_mainmenu display_table_cell text-right">
					<nav class="mainmenu_wrapper primary-navigation">
						<?php wp_nav_menu( array (
							'theme_location' => 'primary',
							'menu_class'     => 'sf-menu nav-menu nav',
							'container'      => 'ul'
						) ); ?>
					</nav>
					<span class="toggle_menu"><span></span></span>
				</div><!--	eof .col-sm-* -->
			</div>
		</div><!--	eof .row-->
	</div> <!--	eof .container-->
</header><!-- eof .page_header -->