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
<div class="fw-theme-steps steps-2">
	<?php foreach ( $atts['steps'] as $step ) : ?>
        <div class="fw-theme-step-wrap">
            <div class="fw-step-left-part">
	            <?php
	            if ( ! empty( $step['number'] ) ): ?>
                    <div class="year <?php echo esc_attr( $step['number_color'] ); ?>"><?php echo wp_kses_post( $step['number'] ); ?></div>
	            <?php endif; ?>
                <?php
                if ( ! empty( $step['step_title'] ) ): ?>
                    <h2 class="step-title"><?php echo wp_kses_post( $step['step_title'] ); ?></h2>
                <?php endif; ?>
            </div>
            <div class="fw-step-center-part">
	            <?php
	            $attachment_id = ! empty($step['step_image']['attachment_id']) ? $step['step_image']['attachment_id'] : '';
                echo wp_get_attachment_image( $attachment_id, $size = 'dotdigital-square', $icon = false, $attr = '' ); ?>
            </div>
            <div class="fw-step-right-part">
                <?php if ( ! empty( $step['step_text'] ) ): ?>
                    <p class="step-text"><?php echo wp_kses_post( $step['step_text'] ); ?></p>
                <?php endif; ?>
            </div>
        </div>
	<?php endforeach; ?>
</div>