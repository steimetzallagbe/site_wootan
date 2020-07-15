<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Widget Portfolio - extended item layout
 */

//wrapping in div for carousel layout
?>
<div class="vertical-item content-padding with_background text-center">
	<div class="item-media">
		<?php
		$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
        function_exists('dotdigital_post_thumbnail') ? dotdigital_post_thumbnail() : the_post_thumbnail();
		?>
		<div class="media-links">
			<a class="abs-link" href="<?php the_permalink(); ?>"></a>
		</div>
	</div>
	<div class="item-content">
		<h3 class="item-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
		<div class="theme_buttons small_buttons color1">
			<?php
			echo get_the_term_list( get_the_ID(), 'fw-portfolio-category', '', ' ', '' );
			?>
		</div>
		<p>
			<?php echo the_excerpt(); ?>
		</p>
		<div class="item-button">
			<a href="<?php the_permalink(); ?>" class="theme_button wide_button inverse">
				<?php esc_html_e( 'Learn More', 'dotdigital' ); ?>
			</a>
		</div>
	</div>
</div><!-- eof vertical-item -->
