<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


wp_enqueue_script('jquery-ui-slider');

/**
 * @var array $atts
 */

$unique_id = uniqid();
$items_count = count( $atts['years'] ) - 1;

?>

<div class="author-bio-shortcode">
    <div class="author_bio_shortcode_wrap">
        <div id="author_bio_shortcode_<?php echo esc_attr( $unique_id ); ?>"
             class="owl-carousel-bio"
             data-owl-carousel-slider="#author_bio_shortcode_slider_<?php echo esc_attr( $unique_id ); ?>"
             data-items="1"
             data-responsive-xs="1"
             data-responsive-sm="1"
             data-responsive-md="1"
             data-responsive-lg="1"
        >

			<?php foreach ( $atts['years'] as $i => $year ) : ?>
                <div class="bio-text">
					<?php echo wp_kses_post( $year['text'] ); ?>
                </div>
			<?php endforeach; ?>
        </div>
        <div class="custom-nav"></div>
    </div>


    <div class="owl-carousel-slider" id="author_bio_shortcode_slider_<?php echo esc_attr( $unique_id ); ?>"
         data-items-count="<?php echo esc_attr( $items_count ); ?>"
         data-carousel="#author_bio_shortcode_<?php echo esc_attr( $unique_id ); ?>"
    >

        <div class="author-bio-flex">
			<?php foreach ( $atts['years'] as $i => $year ) :
				$dot_class = ( $i === 0 ) ? 'active' : '';
				?>
                <span class="year-dot <?php echo esc_attr( $dot_class ); ?>"></span>
			<?php endforeach; ?>
        </div>

        <div class="author-bio-flex">
			<?php foreach ( $atts['years'] as $i => $year ) :
				$dot_class = ( $i === 0 ) ? 'active' : '';
				?>
                <span class="year-label <?php echo esc_attr( $dot_class ); ?>">
					<?php echo wp_kses_post( $year['year'] ); ?>
				</span>
			<?php endforeach; ?>
        </div>

		<?php if( !empty( $atts['word'] ) ) : ?>
            <div class="author-bio-word">
				<?php echo wp_kses_post( $atts['word'] ); ?>
            </div>
		<?php endif; ?>
    </div>
</div>