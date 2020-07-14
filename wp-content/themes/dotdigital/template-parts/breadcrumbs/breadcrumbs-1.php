<?php
/**
 * The template part for selected title (breadcrubms) section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$section_class = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'version' ) : 'ls';

?>
<section class="page_breadcrumbs section_padding_40 overflow-visible <?php echo esc_attr($section_class) ?>">
	<div class="container">
		<div class="row">
            <div class="col-sm-12 text-center breadcrumbs_inner">
                <h2 class="breadcrumbs-title">
					<?php
					get_template_part( 'template-parts/breadcrumbs/page-title-text' );
					?>
                </h2>
				<?php
				if ( function_exists( 'woocommerce_breadcrumb123' ) ) {
					woocommerce_breadcrumb( array(
						'delimiter'   => '',
						'wrap_before' => '<nav class="woocommerce-breadcrumb" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '><ol class="breadcrumb">',
						'wrap_after'  => '</ol></nav>',
						'before'      => '<li>',
						'after'       => '</li>',
						'home'        => _x( 'Homepage', 'breadcrumb', 'dotdigital' )
					) );
				} elseif ( function_exists( 'fw_ext_breadcrumbs' ) ) {
					fw_ext_breadcrumbs();
				}
				?>
            </div>
		</div>
	</div>
</section>