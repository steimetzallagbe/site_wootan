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
	<div class="filters gallery-filters isotope_filters-<?php echo esc_attr( $unique_id ); ?> text-center">
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

<div
        class="owl-carousel owl_custom_nav"
        data-nav="false"
        data-dots="true"
        data-loop="true"
        data-margin="<?php echo esc_attr( $atts['margin'] ); ?>"
        data-responsive-xs="<?php echo esc_attr( $atts['responsive_xs'] ); ?>"
        data-responsive-sm="<?php echo esc_attr( $atts['responsive_sm'] ); ?>"
        data-responsive-md="<?php echo esc_attr( $atts['responsive_md'] ); ?>"
        data-responsive-lg="<?php echo esc_attr( $atts['responsive_lg'] ); ?>"
    <?php if ( $atts['show_filters'] ) : ?>
        data-filters=".carousel_filters-<?php echo esc_attr( $unique_id ); ?>"
    <?php endif; // filters ?>
>

    <?php
        foreach ( $posts as $key => $post ) :
        //get categories slugs for isotope filters
        $post_terms       = get_the_terms( $post->ID, 'fw-event-taxonomy-name' );
        $post_terms_class = '';
        if ( ! empty ( $post_terms ) ) :
            foreach ( $post_terms as $post_term ) :
                $post_terms_class .= $post_term->slug . ' ';
            endforeach;
        endif;

        $event_place = $shortcode->fw_get_event_place_by_id( $post->ID );
        $event_dates = $shortcode->fw_get_event_dates_by_id( $post->ID ); ?>

            <div
                    class="<?php echo esc_attr( 'vertical-item  ' . ' ' . $post_terms_class . ' id-' . $unique_id . '-' . $post->ID); ?>">
                <?php
                    include $shortcode->locate_path( '/views/item-regular.php' );
                ?>
            </div>

    <?php endforeach; ?>
    <?php //removed reset the query ?>
</div>
