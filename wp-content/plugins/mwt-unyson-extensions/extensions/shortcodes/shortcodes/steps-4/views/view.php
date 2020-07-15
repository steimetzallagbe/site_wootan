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
<div class="fw-theme-steps-4 steps-4">
    <div class="fw-theme-step-wrap">
		<?php foreach ( $atts['steps'] as $step ) : ?>
            <div class="vertical-item text-center">
			<?php
			if ( ! empty( $step['number'] ) ): ?>
                <div class="year <?php echo esc_attr( $step['number_color'] ); ?>"><?php echo wp_kses_post( $step['number'] ); ?></div>
			<?php endif; ?>
            <div class="item-img">
				<?php
				$attachment_id = ! empty( $step['step_image']['attachment_id'] ) ? $step['step_image']['attachment_id'] : '';
				echo wp_get_attachment_image( $attachment_id, $size = 'dotdigital-square', $icon = false, $attr = '' ); ?>
            </div>
            <div class="item-content">
				<?php
				if ( ! empty( $step['step_title'] ) ): ?>
                    <h2 class="step-title"><?php echo wp_kses_post( $step['step_title'] ); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $step['step_text'] ) ): ?>
                    <p class="step-text"><?php echo wp_kses_post( $step['step_text'] ); ?></p>
				<?php endif; ?>
            </div>
            </div>
		<?php endforeach; ?>
    </div>
</div>