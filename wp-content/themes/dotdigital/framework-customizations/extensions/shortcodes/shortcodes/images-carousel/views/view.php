<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var $atts The shortcode attributes
 */

$items         = $atts['items'];
$loop          = $atts['loop'];
$nav_custom    = $atts['nav_custom'] == 'true' ? 'owl-custom-nav-2' : '';
$nav           = $atts['nav'];
$dots          = $atts['dots'] || !empty($nav_custom);
$center        = $atts['center'];
$autoplay      = $atts['autoplay'];
$autoplay_timeout = isset($atts['autoplay_timeout']) ? $atts['autoplay_timeout'] : 3000;
$layout = $atts['layout']  == 'true' ? 'opacity-none' : '';
$responsive_lg = $atts['responsive_lg'];
$responsive_md = $atts['responsive_md'];
$responsive_sm = $atts['responsive_sm'];
$responsive_xs = $atts['responsive_xs'];
$margin        = $atts['margin'];
$width  = ( is_numeric( $atts['width'] ) && ( $atts['width'] > 0 ) ) ? $atts['width'] : '';
$height = ( is_numeric( $atts['height'] ) && ( $atts['height'] > 0 ) ) ? $atts['height'] : '';

?>
<div class="shortcode-image-carousel owl-carousel <?php echo esc_attr($layout . ' ' . $nav_custom) ?>"
     data-items="<?php echo esc_attr( $responsive_lg ); ?>"
     data-loop="<?php echo esc_attr( $loop ); ?>"
     data-nav="<?php echo esc_attr( $nav ); ?>"
     data-dots="<?php echo esc_attr( $dots ); ?>"
     data-center="<?php echo esc_attr( $center ); ?>"
     data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
     data-autoplaytimeout="<?php echo esc_attr( $autoplay_timeout ); ?>"
     data-responsive-lg="<?php echo esc_attr( $responsive_lg ); ?>"
     data-responsive-md="<?php echo esc_attr( $responsive_md ); ?>"
     data-responsive-sm="<?php echo esc_attr( $responsive_sm ); ?>"
     data-responsive-xs="<?php echo esc_attr( $responsive_xs ); ?>"
     data-margin="<?php echo esc_attr( $margin ); ?>"
>
	<?php
    if ( is_array($items)) :
	foreach ( $items as $item ) :
        $image = fw_resize( $item['image']['attachment_id'], $width, $height, true );
        $item_title = isset($atts['title']) ? $atts['title'] : 'img';
		?>
		<div>
			<?php if ( $item['url'] ): ?>
			<a href="<?php echo esc_url( $item['url'] ); ?>">
				<?php endif; ?>
                <?php if ( ! empty( $width ) && ! empty( $height ) ) : ?>
                <img src="<?php echo esc_url( $image ); ?>"
                     alt="<?php echo esc_attr( $item_title ); ?>">
                <?php else :?>
				<img src="<?php echo esc_url( $item['image']['url'] ); ?>"
				     alt="<?php echo esc_attr( $item_title ); ?>">
                <?php endif;?>
				<?php if ( $item['url'] ): ?>
			</a>
		<?php endif; ?>
		</div>
		<?php
	endforeach;
	endif;
	?>
</div>
