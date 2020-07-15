<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var $atts
 */

if ( ! $atts['steps'] ) {
	return;
}
?>
<div class="fw-theme-steps steps-6">
	<?php foreach ( $atts['steps'] as $step ) : ?>
        <div class="fw-theme-steps-wrap">
            <div class="fw-step-left-part">
                <div class="item-img">
					<?php
					$attachment_id = ! empty( $step['step_image']['attachment_id'] ) ? $step['step_image']['attachment_id'] : '';
					echo wp_get_attachment_image( $attachment_id, $size = 'dotdigital-square', $icon = false, $attr = '' ); ?>
                </div>
            </div>
            <div class="fw-step-center-part <?php echo esc_attr( $step['dot_color'] ); ?>">
                <div class="item-dot"><span></span></div>
            </div>
            <div class="fw-step-right-part">
				<?php
				if ( ! empty( $step['step_title'] ) ): ?>
                    <h6 class="item-title"><?php echo wp_kses_post( $step['step_title'] ); ?></h6>
				<?php endif; ?>
				<?php if ( ! empty( $step['step_text'] ) ): ?>
                    <p class="item-text"><?php echo wp_kses_post( $step['step_text'] ); ?></p>
				<?php endif; ?>
            </div>
        </div>
	<?php endforeach; ?>
</div>