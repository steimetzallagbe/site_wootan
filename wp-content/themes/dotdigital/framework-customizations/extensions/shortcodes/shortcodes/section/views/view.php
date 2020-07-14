<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$unique_id = uniqid();

$bg_image = '';
$section_id = '';
$section_name = ( isset( $atts['section_name'] ) && $atts['section_name'] ) ? ' ' . $atts['section_name'] : $unique_id;

if ( ! empty( $atts['background_image'] ) && ! empty( $atts['background_image']['data']['icon'] ) ) {
	$bg_image = 'background-image:url(' . $atts['background_image']['data']['icon'] . ');';
}
if ( ! empty( $atts['section_id'] ) ) {
	$section_id = $atts['section_id'];
} else {
	$section_id = 'section-'. $atts['unique_id'];
}

$link = $atts['side_media_link'];
$video = $atts['side_media_video'];
if ( $video ) {
	$link = $video;
}

$section_extra_classes = '';
$section_extra_classes .= ( isset( $atts['background_color'] ) && $atts['background_color'] ) ? ' ' . $atts['background_color'] : '';
$section_extra_classes .= ( isset( $atts['top_padding'] ) && $atts['top_padding'] ) ? ' ' . $atts['top_padding'] : '';
$section_extra_classes .= ( isset( $atts['bottom_padding'] ) && $atts['bottom_padding'] ) ? ' ' . $atts['bottom_padding'] : '';
$section_extra_classes .= ( isset( $atts['columns_padding'] ) && $atts['columns_padding'] ) ? ' ' . $atts['columns_padding'] : '';
$section_extra_classes .= ( isset( $atts['parallax'] ) && $atts['parallax'] ) ? ' parallax' : '';
$section_extra_classes .= ( isset( $atts['section_overlay'] ) && $atts['section_overlay'] ) ? ' section_overlay' : '';
$section_extra_classes .= ( isset( $atts['mobile_section_overlay'] ) && $atts['mobile_section_overlay'] ) ? ' section_overlay mobile-overlay' : '';
$section_extra_classes .= ( isset( $atts['is_fullwidth'] ) && $atts['is_fullwidth'] ) ? ' fullwidth-section' : '';
$section_extra_classes .= ( isset( $atts['horizontal_paddings'] ) && $atts['horizontal_paddings'] ) ? ' ' . $atts['horizontal_paddings'] : '';
$section_extra_classes .= ( isset( $atts['background_cover'] ) && $atts['background_cover'] ) ? ' background_cover' : '';
$section_extra_classes .= ( isset( $atts['is_table'] ) && $atts['is_table'] ) ? ' table_section table_section_md' : '';
$section_extra_classes .= ( isset( $atts['section_style'] ) && $atts['section_style'] ) ? ' ' . $atts['section_style'] : ' ';
$section_extra_classes .= ( isset( $atts['enable_onehalf_media'] ) && $atts['enable_onehalf_media'] ) ? ' half_section' : '';

/* Add section custom class */
if( $atts['custom_class'] ) {
	$section_extra_classes .= ' '. $atts['custom_class'];
}

$container_class = ( isset( $atts['is_fullwidth'] ) && $atts['is_fullwidth'] ) ? 'container-fluid' : 'container';
?>
<section <?php echo ( !empty( $section_id )  ) ? ' id="' . esc_attr( $section_id ) . '"' : '' ;?> class="fw-main-row section <?php echo esc_attr( $section_extra_classes ) ?>" <?php echo esc_attr( $bg_image ) ? 'style="' . esc_attr( $bg_image ) . '"' : ''; ?>>
    <h3 class="hidden"><?php echo esc_attr($section_name); ?></h3>
    <div class="top_corner_body"></div>
	<?php
	if ( ! empty( $atts['side_media_image'] ) ) :
		?>
        <!--<div class="cover_image" style="background-image:url('<?php echo esc_attr($atts['side_media_image']['url'] )?>')">-->
        <div class="image_cover <?php echo ( ! empty( $atts['side_media_position'] ) ) ? esc_attr( $atts['side_media_position'] ) : '' ; ?>" style="background-image:url('<?php echo esc_attr($atts['side_media_image']['url'] )?>')">
			<?php if ( $link ): ?>
                <a href="<?php echo esc_url( $link ); ?>" <?php echo esc_attr( $video ) ? ' data-gal="prettyPhoto[gal-video-'. $unique_id .']"' : ''; ?>></a>
			<?php endif; //$link ?>
        </div>
	<?php
	endif;
	?>
    <div class="<?php echo esc_attr( $container_class ); ?>">
        <div class="row">
			<?php echo do_shortcode( $content ); ?>
        </div>
    </div>
    <div class="bottom_corner_body"></div>
</section>