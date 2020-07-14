<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$autoplay = isset($atts['carousel_autoplay']) ? $atts['carousel_autoplay'] : true;
$autoplay_timeout = isset($atts['autoplay_timeout']) ? $atts['autoplay_timeout'] : 3000;
?>
<div
	class="teaser-carousel owl-carousel"
	data-loop="true"
    data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
    data-autoplaytimeout="<?php echo esc_attr( $autoplay_timeout ); ?>"
	data-nav="<?php echo esc_attr( $atts['show_nav'] ); ?>"
	data-margin="<?php echo esc_attr( $atts['margin'] ); ?>"
	data-responsive-xs="<?php echo esc_attr( $atts['responsive_xs'] ); ?>"
	data-responsive-sm="<?php echo esc_attr( $atts['responsive_sm'] ); ?>"
	data-responsive-md="<?php echo esc_attr( $atts['responsive_md'] ); ?>"
	data-responsive-lg="<?php echo esc_attr( $atts['responsive_lg'] ); ?>"
>
	<?php foreach ( $atts['teasers'] as $teaser ): ?>
		<div class="owl-carousel-item">
			<?php
			//get teaser shortcode to render teasers inside a carousel
			echo fw_ext( 'shortcodes' )->get_shortcode( 'teaser' )->render( $teaser );
			?>
		</div><!-- eof teaser -->
	<?php endforeach; //progress_teaser ?>
</div> <!-- eof teasers carousel -->