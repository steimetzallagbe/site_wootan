<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$unique_id = uniqid();

$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
//light or dark version
$version = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'version' ) : 'light';
$header_email = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_email' ) : '';
$social_icons         = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'social_icons' ) : '';
?>
<div class="main-header-wrap header-6 transparent_wrapper">

    <div class="page-topline ds section_padding_top_15 section_padding_bottom_15 ">
        <h3 class="hidden"><?php echo esc_html__( 'Page Topline', 'dotdigital' ); ?></h3>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-4 text-center text-sm-left">
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
                <div class="col-xs-12 col-sm-4 text-center">
                    <div class="header_center_buttons dropdown-wrap">
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
                <div class="col-xs-12 col-sm-4 text-center text-sm-right">
		            <?php if ( $header_email ) : ?>
                        <span class="header_email">
                            <?php echo wp_kses_post( $header_email ); ?>
                        </span>
		            <?php endif; //header_email ?>
                </div>
            </div>
        </div>
        <div id="page-topline-tab" class="page-topline-tab">
            <a href="#"></a>
        </div>
    </div><!-- .page_topline -->

    <div class="page_header header_darkgrey ds page_header_side vertical_menu_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                <div class="header-content">
					<?php get_template_part( 'template-parts/header/header-logo' ); ?>

                    <span class="toggle_menu_side header-slide"><span></span></span>

                    <div class="scrollbar-macosx">
                        <div class="side_header_inner section_padding_top_20 section_padding_bottom_20">
                            <div class="container-fluid">
                                <div class="row flex-wrap v-center">
                                    <div class="col-xs-12 col-sm-6">
										<?php get_template_part( 'template-parts/header/header-logo' ); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="header-side-menu darklinks">
								<?php wp_nav_menu( array(
									'theme_location' => 'primary',
									'menu_class'     => 'nav menu-side-click',
									'container'      => 'ul'
								) ); ?>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>