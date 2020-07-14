<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

global $wp_embed;
$unique_id = uniqid();


$items = $atts['items'];

?>
<div class="owl-carousel"
     data-items="1"
     data-loop=1"
     data-nav="0"
     data-dots="0"
     data-center="0"
     data-autoplay="1"
     data-responsive-lg="1"
     data-responsive-md="1"
     data-responsive-sm="1"
     data-responsive-xs="1"
     data-margin="0"
>
    <?php
    if ( is_array($items)) :
	foreach ( $items as $item ) :
        $link  = '';
        $video = $item['media_video'];
        if ( $video ) {
            $link = $video;
        }
    ?>
    <div class="video-shortcode video-layout-2">
        <div class="container">
            <div class="video-shortcode-wrapper row">
                <div class="video-block col-xs-12 padding_0">
                    <div class="video_image_cover embed-responsive embed-responsive-16by9"
                        <?php echo ! empty( $item['media_image']['url'] ) ? ' style="background-image:url(' . esc_attr( $item['media_image']['url'] ) . ')"' : ''; ?>>
                        <?php if ( $link ): ?>
                            <a href="<?php echo esc_url( $link ); ?>" <?php echo esc_attr( $video ) ? ' data-gal="prettyPhoto[gal-video-' . $unique_id . ']"' : ''; ?>></a>
                        <?php endif; //$link ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    endforeach;
    endif;?>
</div>
