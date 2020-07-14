<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */

get_header();
$column_classes = dotdigital_get_columns_classes(); ?>
    <!-- tc: archive -->
    <div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
		<?php if ( have_posts() ) :
		$blog_layout = 'regular';
			if ( function_exists( 'fw_get_db_customizer_option' ) ) {
				$blog_layout = fw_get_db_customizer_option( 'blog_layout' );
				if ( isset( $_GET['blog_layout'] ) ) {
					$blog_layout = esc_attr ( $_GET['blog_layout'] );
				}
			}
			if ( $blog_layout === 'grid' ) : ?>
                <div class="isotope_container isotope row masonry-layout columns_margin_bottom_20">
			<?php endif;

			// Start the Loop.
			while ( have_posts() ) : the_post();

				$post_type = get_post_type();
				$name_specialised_template = get_post_format();

				/*
				 * Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				if ( $post_type === 'post' ) {
					if ( $blog_layout === 'grid' ) : ?>
                        <div class="isotope-item col-xs-12 col-sm-6 col-lg-4">
							<?php get_template_part( 'template-parts/blog-grid/content', $name_specialised_template ); ?>
                        </div>
					<?php else:
						get_template_part( 'template-parts/content', $name_specialised_template );
					endif;
				} elseif ( $post_type === 'fw-event' ) {
					get_template_part( 'template-parts/content', 'event' );
				}

			endwhile;

			if ( $blog_layout === 'grid') : ?>
                </div>
			<?php endif;

			// Previous/next page navigation.
			dotdigital_paging_nav();
		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
    </div><!--eof #content -->
    <!-- /tc: archive -->
<?php if ( $column_classes['sidebar_class'] ): ?>
    <!-- main aside sidebar -->
    <aside class="<?php echo esc_attr( $column_classes['sidebar_class'] ); ?>">
		<?php get_sidebar(); ?>
    </aside>
    <!-- eof main aside sidebar -->
<?php
endif;
get_footer();