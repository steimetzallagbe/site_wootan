<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
} ?>
<div class="fw-theme-call-to-action">
	<?php if (!empty($atts['title'])): ?>
		<h6 class="section_header"><?php echo esc_html($atts['title']); ?></h6>
	<?php endif; ?>
	<div class="fw-action-wrap">
		<div class="fw-action-desc"><?php echo wp_kses_post($atts['message']); ?></div>
		<div class="fw-action-btn">
			<?php
			echo fw_ext( 'shortcodes' )->get_shortcode( 'button' )->render( $atts['button'] );
			?>
		</div>
	</div>
</div>