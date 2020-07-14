<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var $atts The shortcode attributes
 */

?>
<div class="info-box vertical-item text-center with_shadow with_padding big-padding overflow-hidden">
	<?php if ( ! empty( $atts['box_icon'] ) ) : ?>
        <div class="box-icon">
			<?php echo dotdigital_get_icon_type_v2_html( $atts['box_icon'] ); ?>
        </div>
	<?php endif; ?>
	<?php if ( ! empty( $atts['title'] ) ) : ?>
        <h6 class="box-title">
			<?php if ( ! empty( $atts['title_link'] ) ) : ?>
                <a href="<?php echo esc_url( $atts['title_link'] ); ?>">
            <?php endif; ?>
				<?php echo wp_kses_post( $atts['title'] ); ?>
            <?php if ( ! empty( $atts['title_link'] ) ) : ?>
                </a>
		    <?php endif; ?>
        </h6>
	<?php endif; ?>
	<?php if ( ! empty( $atts['features'] ) ) : ?>
        <ul class="box-features">
            <?php foreach ( ( $atts['features'] ) as $feature ) : ?>
                <li class="feature">
                    <?php echo wp_kses_post( $feature['feature_name'] ); ?>
                </li>
            <?php endforeach; ?>
        </ul>
	<?php endif; ?>
</div>
