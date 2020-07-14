<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header();
?>
    <div id="content" class="content-404 col-xs-12 text-center">
        <div class="content-wrap">
            <h4 class="error-title"><?php esc_html_e( 'Oops, page not found!', 'dotdigital' ); ?></h4>
            <div class="widget widget_search">
				<?php get_search_form(); ?>
            </div>
            <p>
                <a href="<?php echo get_home_url(); ?>" class="theme_button wide_button large_height color1">
					<?php esc_html_e( 'Go to home', 'dotdigital' ); ?>
                </a>
            </p>
        </div><!--eof #content-wrap -->
    </div><!--eof #content -->
<?php
get_footer();