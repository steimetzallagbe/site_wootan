<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Single service loop item layout
 * also using as a default service view in a shortcode
 */

$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$taxonomy_name = $ext_services_settings['taxonomy_name'];

$icon_array = fw_ext_services_get_icon_array();

?>
<div class="teaser with_background text-center">
	<?php if ( $icon_array['icon_type'] ) : ?>
		<?php if ( $icon_array['icon_type'] === 'image' ) : ?>
			<?php echo wp_kses_post( $icon_array['icon_html']); ?>
		<?php else: //icon ?>
			<div class="teaser_icon black size_big border_icon">
				<?php echo wp_kses_post( $icon_array['icon_html']); ?>
			</div>
		<?php endif; ?>
	<?php else: //post featured image ?>
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="item-media">
				<?php
				$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
				the_post_thumbnail();
				?>
				<div class="media-links">
					<a class="abs-link" href="<?php the_permalink(); ?>"></a>
				</div>
			</div>
		<?php endif; //has_post_thumbnail ?>
	<?php endif; //end of icon_type check ?>
	<h3>
		<a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
		</a>
	</h3>
	<div class="theme_buttons small_buttons color1">
	<?php
		echo get_the_term_list( get_the_ID(), $taxonomy_name, '', ' ', '' );
	?>
	</div>
	<div>
		<?php the_excerpt(); ?>
	</div>
	<div class="item-button">
		<a href="<?php the_permalink(); ?>" class="theme_button wide_button inverse">
			<?php esc_html_e( 'Learn More', 'fw' ); ?>
		</a>
	</div>
</div><!-- eof .teaser -->
