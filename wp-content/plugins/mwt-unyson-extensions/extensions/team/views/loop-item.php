<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Single service loop item layout
 * also using as a default service view in a shortcode
 */

$ext_team_settings = fw()->extensions->get( 'team' )->get_settings();
$taxonomy_name = $ext_team_settings['taxonomy_name'];

$pID = get_the_ID();
$atts = fw_get_db_post_option($pID);

?>
<div class="vertical-item content-padding with_background text-center">

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="item-media">
			<?php
			$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( $pID ) );
			the_post_thumbnail();
			?>
			<div class="media-links">
				<a class="abs-link" href="<?php the_permalink(); ?>"></a>
			</div>
		</div>
	<?php endif; //has_post_thumbnail ?>
	<div class="item-content">

		<h3>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
		<?php if ( ! empty( $atts['position'] ) ) : ?>
			<p class="small-text highlight"><strong><?php echo wp_kses_post( $atts['position'] ); ?></strong></p>
		<?php endif; //position ?>

		<?php if ( ! empty( $atts['social_icons'] ) ) : ?>
			<div class="team-social-icons">
				<?php
				//get icons-social shortcode to render icons in team member item
				$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
				if ( ! empty( $shortcodes_extension ) ) {
					echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $atts['social_icons'] ) );
				}
				?>
			</div><!-- eof social icons -->
		<?php endif; //social icons ?>

		<div class="theme_buttons small_buttons color1">
		<?php
			echo get_the_term_list( $pID, $taxonomy_name, '', ' ', '' );
		?>
		</div>
		<p>
			<?php the_excerpt(); ?>
		</p>
		<div class="item-button">
			<a href="<?php the_permalink(); ?>" class="theme_button wide_button inverse">
				<?php esc_html_e( 'Learn More', 'fw' ); ?>
			</a>
		</div>
	</div>
</div><!-- eof .vertical-item -->
