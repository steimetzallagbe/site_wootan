<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * Breadcrumbs default view
 */
if ( ! empty( $items ) ) : ?>
	<ol class="breadcrumb">
		<?php for ( $i = 0; $i < count( $items ); $i ++ ) : ?>
			<?php if ( $i == ( count( $items ) - 1 ) ) : ?>
				<li class="last-item"><?php echo wp_kses_post( $items[ $i ]['name'] ); ?></li>
			<?php elseif ( $i == 0 ) : ?>
				<li class="first-item">
				<?php if ( isset( $items[ $i ]['url'] ) ) : ?>
					<a href="<?php echo wp_kses_post( $items[ $i ]['url'] ); ?>"><?php echo wp_kses_post( $items[ $i ]['name'] ); ?></a></li>
				<?php else : echo wp_kses_post( $items[ $i ]['name'] ); endif; ?>
				<?php
			else : ?>
			<li class="<?php echo esc_attr( $i - 1 ) ?>-item">
				<?php if ( isset( $items[ $i ]['url'] ) ) : ?>
					<a href="<?php echo wp_kses_post( $items[ $i ]['url'] ); ?>"><?php echo wp_kses_post( $items[ $i ]['name'] ); ?></a></li>
				<?php else : echo wp_kses_post( $items[ $i ]['name'] ); endif; ?>
			<?php endif ?>
		<?php endfor ?>
	</ol>
<?php endif ?>