<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$custom_class = ( !empty($atts['custom_class'])) ? $atts['custom_class'] : '';
?>
<div class="icons-list <?php echo esc_attr( $custom_class ); ?>">
	<ul class="no-bullets">
		<?php
        if ( is_array($atts['icons']) ) :
        foreach ( $atts['icons'] as $icon ): ?>
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
		<?php
            endforeach;
            endif;
		?>
	</ul>
</div>