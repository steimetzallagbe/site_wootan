<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$tab_color   = !empty( $atts['tab_color'] ) ? $atts['tab_color'] : '';
?>
<div class="bootstrap-tabs tabs-icons <?php echo esc_attr( $tab_color ); ?>">
	<ul class="nav nav-tabs" role="tablist">
		<?php foreach ( $atts['tabs'] as $index => $tab ) : ?>
			<li class="<?php echo esc_attr( $index === 0  ? 'active' : '' ); ?>">
				<a href="#tab-<?php echo esc_attr( $atts['id']  . '-' . $index ); ?>" role="tab" data-toggle="tab">
					<?php echo esc_html( $tab['tab_title'] ); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
	<div class="tab-content">
		<?php foreach ( $atts['tabs'] as $index => $tab ) : ?>
			<div class="tab-pane fade <?php echo esc_attr( $index === 0  ? 'in active' : '' ); ?>"
			     id="tab-<?php echo esc_attr( $atts['id'] ) . '-' . $index ?>">
                <div class="icons-list">
                    <ul class="no-bullets">
						<?php foreach ( $tab['icons'] as $icon ): ?>
                            <li>
                                <div class="media small-teaser inline-block">
									<?php if ( $icon['icon'] ): ?>
                                        <div class="media-left">
                                            <div
                                                    class="icon-wrap">
                                                <i class="<?php echo esc_attr( $icon['icon'] ); ?>"></i>
                                            </div>
                                        </div>
									<?php endif; //icon	?>
									<?php if ( $icon['text'] ): ?>
                                        <div class="media-body">
                                            <span class="text">
                                                <?php echo wp_kses_post( $icon['text'] ); ?>
                                            </span>
                                        </div>
									<?php endif; //text	?>
                                </div>
                            </li>
						<?php endforeach; ?>
                    </ul>
                </div>
			</div><!-- .eof tab-pane -->
		<?php endforeach; ?>
	</div>
</div>