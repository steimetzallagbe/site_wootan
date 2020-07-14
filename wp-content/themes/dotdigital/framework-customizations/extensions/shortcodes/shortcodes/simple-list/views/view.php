<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<div class="simple-list <?php echo esc_attr( $atts['custom_class'] ); ?>">
	<?php if ( $atts['title'] ): ?>
        <h6 class="list-title">
			<?php echo wp_kses_post( $atts['title'] ); ?>
        </h6>
	<?php endif; ?>
    <ul class="no-bullets">
		<?php foreach ( $atts['simple_list'] as $item ): ?>
            <li class="list-item">
				<?php if ( $item['list_item'] ): ?>
	                <?php if ( ! empty( $item['item_link'] ) ) : ?>
                        <a href="<?php echo esc_url( $item['item_link'] ); ?>">
		            <?php endif; ?>
                        <?php echo wp_kses_post( $item['list_item'] ); ?>
					<?php if ( ! empty( $item['item_link'] ) ) : ?>
                        </a>
					<?php endif; ?>
				<?php endif; ?>
            </li>
		<?php endforeach; ?>
    </ul>
</div>