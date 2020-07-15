<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 * @var array $posts
 */
?>
<div class="shortcode-posts">
	<?php
	$unique_id = uniqid();

	if ( $atts['show_filters'] ) :

		//get unique terms only for posts that are showing
		$showing_terms = array();
		foreach ( $posts->posts as $post ) {
			foreach ( get_the_terms( $post->ID, 'category' ) as $post_term ) {
				$showing_terms[ $post_term->term_id ] = $post_term;
			}
		}
		?>
		<div class="filters carousel_filters-<?php echo esc_attr( $unique_id ); ?> text-center">
			<a href="#" data-filter="*" class="selected"><?php esc_html_e( 'All', 'dotdigital' ); ?></a>
			<?php
			foreach ( $showing_terms as $term_key => $term_id ) {
				$current_term = get_term( $term_id, 'category' );
				?>
				<a href="#"
				   data-filter=".<?php echo esc_attr( $current_term->slug ); ?>"><?php echo esc_html( $current_term->name ); ?></a>
				<?php
			} //foreach
			?>
		</div>
		<?php
	endif; //showfilters check

	$autoplay = isset($atts['carousel_autoplay']) ? $atts['carousel_autoplay'] : true;
	$autoplay_timeout = isset($atts['autoplay_timeout']) ? $atts['autoplay_timeout'] : 3000;
    // navigation
	$show_nav = isset($atts['show_nav']) ? $atts['show_nav'] : false;
	?>
	<div
		class="owl-carousel"
        data-loop="true"
        data-prev="<?php echo esc_attr__( 'Prev post', 'dotdigital'); ?>"
        data-next="<?php echo esc_attr__( 'Next post', 'dotdigital'); ?>"
        data-nav="<?php echo esc_attr( $show_nav ); ?>"
        data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
        data-autoplaytimeout="<?php echo esc_attr( $autoplay_timeout ); ?>"
		data-margin="<?php echo esc_attr( $atts['margin'] ); ?>"
		data-responsive-xs="<?php echo esc_attr( $atts['responsive_xs'] ); ?>"
		data-responsive-sm="<?php echo esc_attr( $atts['responsive_sm'] ); ?>"
		data-responsive-md="<?php echo esc_attr( $atts['responsive_md'] ); ?>"
		data-responsive-lg="<?php echo esc_attr( $atts['responsive_lg'] ); ?>"
		<?php if ( $atts['show_filters'] ) : ?>
			data-filters=".carousel_filters-<?php echo esc_attr( $unique_id ); ?>"
		<?php endif; // filters ?>
	>
		<?php while ( $posts->have_posts() ) : $posts->the_post();
			$post_terms       = get_the_terms( get_the_ID(), 'category' );
			$post_terms_class = '';
			foreach ( $post_terms as $post_term ) {
				$post_terms_class .= $post_term->slug . ' ';
			}
			?>
			<div
				class="owl-carousel-item <?php echo esc_attr( 'item-layout-' . $atts['item_layout'] . ' ' . $post_terms_class ); ?>">
				<?php
				//include item layout view file. If no thumbnail - layout is always extended
				$filepath = get_template_directory() . '/framework-customizations/extensions/shortcodes/shortcodes/posts/views/' . $atts['item_layout'] . '.php';
				if ( ! ( has_post_thumbnail() ) ) {
					$filepath = get_template_directory() . '/framework-customizations/extensions/shortcodes/shortcodes/posts/views/item-text.php';
				}
                if ( file_exists( $filepath ) ) {
                    include( $filepath );
                } else {
                    $filepath = plugin_dir_path( __FILE__ ) . $atts['item_layout'] . '.php';
                    if ( ! ( has_post_thumbnail() ) ) {
                        $filepath = plugin_dir_path( __FILE__ ) . 'item-extended.php';
                    }
                    if ( file_exists( $filepath ) ) {
                        include( $filepath );
                    } else {
                        _e( 'View not found', 'mwt' );
                    }
                }
				?>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); // reset the query ?>
	</div>
</div>