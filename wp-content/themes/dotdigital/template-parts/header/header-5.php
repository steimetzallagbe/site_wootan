<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$unique_id = uniqid();

//light or dark version
$version = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'version' ) : 'light';
$header_email = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_email' ) : '';
?>
<div class="main-header-wrap header-5 transparent_wrapper">
    <div class="page_header header_darkgrey ds page_header_side vertical_menu_header with_bottom_border section_padding_top_20 section_padding_bottom_20">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                <div class="header-content">
					<?php get_template_part( 'template-parts/header/header-logo' ); ?>

	                <?php if ( $header_email ) : ?>
                        <span class="header_email">
                        <?php echo wp_kses_post( $header_email ); ?>
                    </span>
	                <?php endif; //header_email ?>

                    <span class="toggle_menu_side header-slide"><span></span></span>

                    <div class="scrollbar-macosx">
                        <div class="side_header_inner section_padding_top_20 section_padding_bottom_20">
                            <div class="container">
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