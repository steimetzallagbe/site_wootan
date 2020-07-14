<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

if ( $atts['title'] || $atts['text'] ) :
	?>
	<div class="media small-teaser inline-block shortcode-icon <?php echo esc_attr( $atts['text_align'] ); ?>">
		<?php if ( $atts['icon_position'] == 'left' ): ?>
			<?php if ( $atts['icon'] ): ?>
				<div class="media-left">
					<div
						class="icon-wrap <?php echo esc_attr( $atts['icon_size'] . ' ' . $atts['icon_style'] . ' ' . $atts['icon_color'] ); ?>">
						<i class="<?php echo esc_attr( $atts['icon'] ); ?>"></i>
					</div>
				</div>
			<?php endif; //icon	?>
		<?php endif; //icon_position ?>
		<div class="media-body">
			<?php if ( $atts['title'] ): ?>
				<h4 class="title">
					<?php echo wp_kses_post( $atts['title'] ); ?>
				</h4>
			<?php endif; //title
			?>
			<?php if ( $atts['text'] ): ?>
				<span class="text">
				<?php echo wp_kses_post( $atts['text'] ); ?>
			</span>
			<?php endif; //text
			?>
		</div>
		<?php if ( $atts['icon_position'] == 'right' ): ?>
			<?php if ( $atts['icon'] ): ?>
				<div class="media-right">
					<div
						class="icon-wrap <?php echo esc_attr( $atts['icon_size'] . ' ' . $atts['icon_style'] . ' ' . $atts['icon_color'] ); ?>">
						<i class="<?php echo esc_attr( $atts['icon'] ); ?>"></i>
					</div>
				</div>
			<?php endif; //icon	?>
		<?php endif; //icon_position ?>
	</div>
	<?php
//only icon
else :
	?>
	<div class="shortcode-icon">
		<div
			class="icon-wrap <?php echo esc_attr( $atts['icon_size'] . ' ' . $atts['icon_style'] . ' ' . $atts['icon_color'] ); ?>">
			<i class="<?php echo esc_attr( $atts['icon'] ); ?>"></i>
		</div>
	</div>
	<?php
endif;