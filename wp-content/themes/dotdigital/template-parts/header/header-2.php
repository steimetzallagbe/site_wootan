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

//header search button
$header_search_button = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'search_button_block' ) : 'default';
?>
<header id="header" class="main-header-wrap">
	<div class="page_header ds toggler_xs_right affix-top">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 display_table">
					<div class="header_left_logo display_table_cell">
						<?php get_template_part( 'template-parts/header/header-logo' ); ?>
					</div>
					<?php if ( ( ! empty( $header_phone ) ) ) { ?>
						<div class="header_mainmenu display_table_cell text-center">
							<nav class="mainmenu_wrapper primary-navigation">
								<?php wp_nav_menu( array (
									'theme_location' => 'primary',
									'menu_class'     => 'sf-menu nav-menu nav',
									'container'      => 'ul'
								) ); ?>
							</nav>
							<span class="toggle_menu"><span></span></span>
						</div><!--	eof .col-sm-* -->
						<div class="header_right_buttons display_table_cell text-right hidden-xs">
							<?php if ( $header_phone ) : ?>
                                <span class="header_phone">
									<?php echo wp_kses_post( $header_phone ); ?>
						        </span>
							<?php endif; //header_text ?>
						</div><!-- eof .header_button -->
					<?php } else { ?>
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
					<?php } ?>
                    <!-- Header button (search/custom) -->
					<?php if ($header_search_button['search_button'] == 'default') : ?>
                        <div class="search_modal">
                            <a href="#" class="search_modal_button header-button">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
					<?php elseif ( $header_search_button['search_button'] == 'custom' ) : ?>
                        <div class="search_modal">
                            <a href="<?php echo esc_url( $header_search_button['custom']['custom_header_icon_link'] ) ?>" class="header_custom_button header-button">
                                <i class="<?php echo esc_attr( $header_search_button['custom']['custom_header_icon'] ); ?>"></i>
                            </a>
                        </div>
                    <?php  endif; ?>
				</div><!--	eof .col-sm-* -->
			</div><!--	eof .row-->
		</div> <!--	eof .container-->
	</div><!-- eof .page_header -->
</header>