<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Portfolio - extended item layout
 */

//wrapping in div for carousel layout
$index_item = isset($index) ? $index : '';

?>
<div class="gallery-item with_background item-layout-item-extended-2">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="item-media">
			<?php
			$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
			the_post_thumbnail('dotdigital-single-event');
			?>
		</div>
	<?php endif; //has_post_thumbnail ?>
	<div class="item-content">
        <?php if ( !empty($index_item) ) :  ?>
        <span class="item-number"><?php echo esc_html($index_item) ?></span>
        <?php endif; ?>
		<h3 class="item-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
        <div class="categories-links small-text highlight">
			<?php
			echo get_the_term_list( get_the_ID(), 'fw-portfolio-category', '', ' ', '' );
			?>
        </div>
		<?php the_excerpt(); ?>
		<div class="item-button-hover"></div>
	</div>
</div><!-- eof vertical-item -->
