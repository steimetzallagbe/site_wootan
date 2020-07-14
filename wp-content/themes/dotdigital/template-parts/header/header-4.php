<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
$social_icons         = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'social_icons' ) : '';
$unique_id = uniqid();

//light or dark version
$version = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'version' ) : 'light';


?>
<div class="main-header-wrap header-4">
    <div class="page-topline ds section_padding_top_15 section_padding_bottom_15 ">
        <h3 class="hidden"><?php echo esc_html__( 'Page Topline', 'dotdigital' ); ?></h3>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 text-center text-sm-left">
                    <div class="header_left_logo text-xs-center">
		                <?php get_template_part( 'template-parts/header/header-logo' ); ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 text-center">
                    <div class="page_social_icons">
						<?php
						//get icons-social shortcode to render icons in team member item
						$shortcodes_extension = defined( 'FW' ) ? fw()->extensions->get( 'shortcodes' ) : '';
						if ( ! empty( $shortcodes_extension ) ) {
							echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $social_icons ) );
						}
						?>
                    </div><!-- eof social icons -->
                </div>
                <div class="col-xs-12 col-sm-4 text-center text-sm-right">
                    <div class="header_right_buttons dropdown-wrap">
                        <a href="#" class="search_modal_button header-button">
                            <i class="fa fa-search"></i>
                        </a>
		                <?php if ( function_exists( 'mwt_login_form' ) ) : ?>
                            <div class="dropdown login-dropdown">
                                <a href="<?php echo esc_url( wp_registration_url() ); ?>"
                                   class="header-button registration__toggle registration__toggle<?php echo esc_attr( $unique_id ); ?>"
                                   title="<?php esc_attr_e( 'Register', 'dotdigital' ); ?>"><i class="fa fa-user-plus"></i></a>

                                <a class="header-button login-button" id="login" data-target="#" href="/"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" role="button" aria-expanded="false">
                                    <i class="fa fa-user"></i>
                                </a>
                                <div class="dropdown-menu ls" aria-labelledby="login">
					                <?php
					                mwt_login_form();
					                ?>
                                </div>
                            </div><!-- eof login -->
		                <?php endif; //mwt_login_form ?>
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