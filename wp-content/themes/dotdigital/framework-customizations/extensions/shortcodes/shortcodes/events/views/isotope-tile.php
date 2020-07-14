<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( ! fw()->extensions->get( 'events' ) ) {
	return;
}
/**
 * @var object $srortcode
 * @var array $atts
 * @var array $posts
 */

$unique_id = uniqid();

//get all terms for filter
$terms = get_terms( array( 'post_type ' => 'fw-event-taxonomy-name' ) );

if ( count( $terms ) > 1 && $atts['show_filters'] ) { ?>
	<div class="filters isotope_filters-<?php echo esc_attr( $unique_id ); ?> text-center">
		<a href="#" data-filter="*" class="selected"><?php esc_html_e( 'All', 'dotdigital' ); ?></a>
		<?php
		foreach ( $terms as $term_key => $term_id ) {
			$current_term = get_term( $term_id, 'fw-event-taxonomy-name' );
			?>
			<a href="#"
			   data-filter=".<?php echo esc_attr( $current_term->slug ); ?>"><?php echo esc_html( $current_term->name ); ?></a>
			<?php
		} //foreach
		?>
	</div>
	<?php
} //count subcategories check
?>
<div class="columns_padding_1">
	<div class="isotope_container isotope row masonry-layout"
	     data-filters=".isotope_filters-<?php echo esc_attr( $unique_id ); ?>">
		<?php 
			foreach ( $posts as $key => $post ) :
				//get categories slugs for isotope filters
				$post_terms       = get_the_terms( $post->ID, 'fw-event-taxonomy-name' );
				$post_terms_class = '';
				foreach ( $post_terms as $post_term ) {
					$post_terms_class .= $post_term->slug . ' ';
				}
				$column_class = 'col-md-3';

				$event_place = $shortcode->fw_get_event_place_by_id( $post->ID );
				$event_dates = $shortcode->fw_get_event_dates_by_id( $post->ID );

				//next event post if exists
				if( !empty( $post->next_event_post ) ) {
					$column_class = 'col-md-6';

				?>
					<div
						class="isotope-item <?php echo esc_attr( 'item-layout-tile col-sm-6' . ' ' . $column_class . ' ' . $post_terms_class . ' shortcode-next-event id-next-event-' . $unique_id . '-' . $post->ID ); ?>">
						<?php
							include $shortcode->locate_path( '/views/item-featured.php' );
						?>
					</div>
				<?php
					//regular post (not next event)
					} else {
				?>

			<?php 
			}// else - featured post check
		endforeach; ?>
		<?php //removed reset the query ?>
	</div><!-- eof .isotope_container -->
</div><!-- eof .columns_padding_* -->