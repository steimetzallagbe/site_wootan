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
	if ( ! empty ( $params['social_icons'] ) ) : ?>
		<div class="widget-socials no-bullets no-top-border no-bottom-border topmargin_0">
			<?php foreach ( $params['social_icons'] as $icon ): ?>
				<?php if ( ! empty ( $icon['icon_class'] ) && ! empty ( $icon['icon_link'] )  ): ?>
					<a href="<?php echo esc_url( $icon['icon_link'] ); ?>" target="_blank" class="social-icon <?php echo esc_attr( $params['icon_style'] ); ?>  <?php echo esc_attr( $icon['icon_class'] ); ?>"></a>
				<?php endif; //icon	?>
			<?php endforeach; ?>
		</div>
	<?php endif; //icons ?>
	<?php echo wp_kses_post( $after_widget );
}