<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var $atts
 */

if ( ! $atts['headings'] ) {
	return;
}?>
<div class="special-heading <?php echo esc_attr( $atts['heading_align'] ); ?>">
<?php foreach ( $atts['headings'] as $heading ) : ?>
	<<?php echo esc_attr( $heading['heading_tag'] ); ?> class="<?php echo esc_attr( $heading['heading_tag'] !== 'p' ? 'section_header margin_0 ' : '' );  echo !empty( $heading['heading_custom_class']) ? $heading['heading_custom_class'] : ''; ?> <?php echo esc_attr( $heading['heading_tag'] == 'p' ? 'paragraph' : '' ); ?>">
	<span class="<?php echo esc_attr( $heading['heading_text_color'] ); ?> <?php echo esc_attr( $heading['heading_text_weight'] ); ?> <?php echo esc_attr( $heading['heading_text_transform'] ); ?>">
		<?php echo wp_kses_post( $heading['heading_text'] ) ?>
	</span>
	</<?php echo esc_attr( $heading['heading_tag'] ); ?>>
<?php endforeach; ?>
</div>
