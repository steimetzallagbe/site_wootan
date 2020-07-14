<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<div class="open-hours">
	<ul class="no-bullets">
		<?php foreach ( $atts['open_hours'] as $item ): ?>
			<li>
				<div class="media small-teaser inline-block">
					<?php if ( $item['day'] ): ?>
						<div class="media-left">
							<div class="icon-wrap highlight">
								<i class="fa fa-clock-o"></i>
							</div>
						</div>
						<div class="media-body">
							<span class="day">
								<?php echo wp_kses_post( $item['day'] ); ?>
							</span>
                            <span class="hours">
								<?php echo wp_kses_post( $item['hours'] ); ?>
							</span>
						</div>
					<?php endif; //text	?>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
</div>