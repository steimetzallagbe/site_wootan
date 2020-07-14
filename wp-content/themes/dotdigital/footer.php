<?php
/**
 * The template for displaying the footer and copyrights
 *
 * Contains footer content and the closing of the main container, row and section. Also closing #canvas and #box_wrapper
 */
if ( ! is_page_template( 'page-templates/full-width.php' ) && ! is_page_template( 'page-templates/full-page.php' ) && ! is_singular( 'fw-event' ) && ! is_singular( 'fw-services' ) ) : ?>
				</div><!-- eof .row-->
			</div><!-- eof .container -->
		</section><!-- eof .page_content -->
	<?php
endif;

$before_footer   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'before_footer' ) : ' ';
if ( $before_footer == 'true' ) {
    get_template_part( 'template-parts/footer/before-footer' );
}

if(! is_page_template( 'page-templates/full-width-no-footer.php' ) ) {
	$footer = dotdigital_get_predefined_template_part( 'footer' );
	get_template_part( 'template-parts/footer/' . esc_attr( $footer ) );
}
$copyrights = dotdigital_get_predefined_template_part( 'copyrights' );
get_template_part( 'template-parts/copyrights/' . esc_attr( $copyrights ) );

?>
	</div><!-- eof #box_wrapper -->
</div><!-- eof #canvas -->
<?php wp_footer(); ?>
</body>
</html>