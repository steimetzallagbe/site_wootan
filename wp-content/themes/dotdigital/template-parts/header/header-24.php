<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<header class="page_header_side header_side_right ds">
	<span class="toggle_menu_side"><span></span></span>
	<div class="scrollbar-macosx">
		<div class="side_header_inner">
			<div class="text-center bottommargin_40">
				<?php get_template_part( 'template-parts/header/header-logo' ); ?>
			</div>
			<div class="widget widget_nav_menu">
				<nav class="mainmenu_side_wrapper">
					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'nav sf-menu-side',
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
						<strong><?php echo wp_kses_post( $header_phone ); ?></strong>
					<?php endif; //header_phone
					?>
					<?php if ( $header_email ) :
						if ( $header_phone && $header_email ):
							?>
							<br>
							<?php
						endif; //header_phone && header_email
						echo wp_kses_post( $header_email );
					endif; //header_phone
					?>
				</div><!-- eof logo-meta -->
			<?php endif; //header_phone || header_email ?>

			<?php
			$social_icons = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'social_icons' ) : '';
			if ( ! empty( $social_icons ) ) : ?>
				<div class="topmargin_10 text-center">
					<?php
					//get icons-social shortcode to render icons in team member item
					$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
					if ( ! empty( $shortcodes_extension ) ) {
						echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $social_icons ) );
					}
					?>
				</div><!-- eof social icons -->
			<?php endif; //social icons ?>

		</div><!-- eof .side_header_inner -->
	</div><!-- eof .scrollbar-macosx-->
</header><!-- eof .page_header_side-->