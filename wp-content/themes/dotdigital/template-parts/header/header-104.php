<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div class="page_header_side page_header_side_special page_header_side_special-2 header_slide header_side_right ds">
    <div class="scrollbar-macosx">
        <div class="side_header_inner">
            <div class="toggle-wrap">
                <span class="toggle_menu_side toggle_menu_side_special">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </div><!-- eof .header_button -->
            <div class="widget widget_nav_menu">
                <nav class="mainmenu_side_wrapper">
                    <?php wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'nav menu-side-click',
                        'container'      => 'ul'
                    ) ); ?>
                </nav>
            </div>
            <?php
            $header_phone = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_phone' ) : '';
            $header_email = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_email' ) : '';
            if ( $header_phone || $header_email ): ?>
                <div class="logo-meta text-center">
                    <?php if ( $header_phone ) : ?>
                        <span class="fontsize_24 white-text"><?php echo wp_kses_post( $header_phone ); ?></span>
                    <?php endif; //header_phone
                    ?>
                </div><!-- eof logo-meta -->
            <?php endif; //header_phone || header_email ?>

        </div><!-- eof .side_header_inner -->
    </div>
</div><!-- .page_header_side -->