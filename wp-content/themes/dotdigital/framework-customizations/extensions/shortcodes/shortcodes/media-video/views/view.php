<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

global $wp_embed;
$unique_id = uniqid();

$link  = '';
$video = $atts['media_video'];
if ( $video ) {
	$link = $video;
}
?>
<div class="video-shortcode columns_padding_30">
    <div class="container">
        <div class="video-shortcode-wrapper row <?php echo esc_attr( $atts['media_position'] ); ?>">
            <div class="video-block col-xs-12 col-sm-6 col-lg-9">
                <div class="add-border">
                    <div class="video_image_cover embed-responsive embed-responsive-3by2"
						<?php echo ! empty( $atts['media_image']['url'] ) ? ' style="background-image:url(' . esc_attr( $atts['media_image']['url'] ) . ')"' : ''; ?>>
						<?php if ( $link ): ?>
                            <a href="<?php echo esc_url( $link ); ?>" <?php echo esc_attr( $video ) ? ' data-gal="prettyPhoto[gal-video-' . $unique_id . ']"' : ''; ?>></a>
						<?php endif; //$link ?>
                    </div>
                </div>
            </div>
            <div class="info-block col-xs-12 col-sm-6 col-lg-3">
                <h4 class="title"><?php echo wp_kses_post( $atts['title'] ); ?></h4>
                <p class="desc"><?php echo wp_kses_post( $atts['description'] ); ?></p>
                <div class="readmore-btn">
					<?php
					echo fw_ext( 'shortcodes' )->get_shortcode( 'button' )->render( $atts['button'] );
					?>
                </div>
            </div>
        </div>
    </div>
</div>
