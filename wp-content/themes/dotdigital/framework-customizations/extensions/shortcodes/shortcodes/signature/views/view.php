<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$image  = isset( $atts['image'] ) ? $atts['image'] : false;

?>
<div class="fw-theme-signature <?php echo esc_attr($atts['item_type']); ?>">
    <div class="fw-signature-left-part">
        <?php if (!empty($atts['title'])): ?>
            <h4 class="section_header"><?php echo wp_kses_post($atts['title']); ?></h4>
        <?php endif; ?>
        <div class="small-text highlight subtitle"><?php echo wp_kses_post($atts['sub_title']); ?></div>
    </div>
    <div class="fw-signature-right-part">
        <img src="<?php echo esc_url( !empty($image['url']) ? $image['url'] : '' ); ?>" alt="<?php echo esc_attr( $atts['title'] ); ?>">
    </div>
</div>