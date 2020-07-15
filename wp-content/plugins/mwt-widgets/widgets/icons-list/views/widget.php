<?php if ( ! defined( 'ABSPATH' ) ) {
	die();
}
if ( defined( 'FW' ) ) {
	/**
	 * @var string $before_widget
	 * @var string $after_widget
	 * @var array $params
	 */
	$unique_id = uniqid();
	echo wp_kses_post( $before_widget );
	if ( !empty ( $params['title'] ) ) {
		echo wp_kses_post( $before_title . $params['title'] . $after_title );
	}
	if ( ! empty ( $params['icons'] ) ) : ?>
		<div class="widget-icons-list no-bullets no-top-border no-bottom-border">
			<?php foreach ( $params['icons'] as $icon ): ?>
				<div class="media small-teaser inline-block margin_0">
					<?php if ( $icon['icon_class'] ): ?>
						<div class="media-left">
							<i class="<?php echo esc_attr( $icon['icon_class'] ); ?> highlight"></i>
						</div>
					<?php endif; //icon	?>
					<?php if ( $icon['icon_title'] ): ?>
						<div class="media-body darklinks">
							<?php echo wp_kses_post( $icon['icon_title'] ); ?>
						</div>
					<?php endif; //icon title ?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; //icons ?>
	<?php echo wp_kses_post( $after_widget );
}