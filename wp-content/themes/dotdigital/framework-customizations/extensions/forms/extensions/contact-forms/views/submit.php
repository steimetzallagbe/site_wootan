<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var int $form_id
 * @var string $submit_button_text
 * @var array $extra_data
 */
?>
<?php if ( $extra_data['reset_button_text'] && $submit_button_text ) :  ?>
<div class="wrap-forms wrap-forms-buttons topmargin_20">
	<div class="row">
		<div class="col-sm-12 wrap-buttons <?php echo esc_attr( $extra_data['button_align'] ) ?>">
			<input class="theme_button wide_button <?php echo esc_attr( $extra_data['button_color'].' '.$extra_data['button_size'] ) ?>" type="submit"
			       value="<?php echo esc_attr( $submit_button_text ) ?>"/>
			<?php if ( $extra_data['reset_button_text'] ) : ?>
				<input class="theme_button wide_button <?php echo esc_attr( $extra_data['button_color'].' '.$extra_data['button_size'] ) ?>" type="reset"
				       value="<?php echo esc_attr( $extra_data['reset_button_text'] ); ?>"/>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php endif; ?>