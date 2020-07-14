<?php
/**
 * Template for displaying search forms
 *
 */
?>

<form role="search" method="get" class="search-form form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
		<label>
			<input type="search" class="search-field form-control"
			       placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'dotdigital' ); ?>"
			       value="<?php echo get_search_query(); ?>" name="s"
			       title="<?php echo esc_attr_x( 'Search for:', 'label', 'dotdigital' ); ?>"/>
		</label>
	</div>
	<button type="submit" class="search-submit theme_button">
		<span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'dotdigital' ); ?></span>
	</button>
</form>
