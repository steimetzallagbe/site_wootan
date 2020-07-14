<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
//header phone number
$header_phone = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_phone' ) : '';
$unique_id = uniqid();

//light or dark version
$version = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'version' ) : 'light';

//header button
$header_button    = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_button' ) : '';
?>
<div class="main-header-wrap header-10">
    <div class="page-topline ds section_padding_top_15 section_padding_bottom_15 with_bottom_border">
        <h3 class="hidden"><?php echo esc_html__( 'Page Topline', 'dotdigital' ); ?></h3>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-4 text-center text-sm-left">
                    <div class="header_left_logo text-xs-center">
		                <?php get_template_part( 'template-parts/header/header-logo' ); ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 text-center">
	                <?php if ( $header_phone ) : ?>
                        <span class="header_phone">
									<?php echo wp_kses_post( $header_phone ); ?>
						        </span>
	                <?php endif; //header_text ?>
                </div>
                <div class="col-xs-12 col-sm-4 text-center text-sm-right">
                    <div class="header_right_buttons dropdown-wrap">
	                    <?php
	                    if ( ! empty( $shortcodes_extension ) ) {
		                    echo fw_ext( 'shortcodes' )->get_shortcode( 'button' )->render( $header_button );
	                    }
	                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .page_topline -->
    <div id="header">
        <div class="page_header ds toggler_xs_center affix-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 display_table">
                        <div class="header_mainmenu display_table_cell text-center">
                            <nav class="mainmenu_wrapper primary-navigation">
								<?php wp_nav_menu( array(
									'theme_location' => 'primary',
									'menu_class'     => 'sf-menu nav-menu nav',
									'container'      => 'ul'
								) ); ?>
                            </nav>
                            <span class="toggle_menu"><span></span></span>
                        </div><!--	eof .col-sm-* -->
                    </div><!--	eof .col-sm-* -->
                </div><!--	eof .row-->
            </div> <!--	eof .container-->
        </div><!-- eof .page_header -->
    </div>
</div>