<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Portfolio - extended item layout
 */

//wrapping in div for carousel layout

?>
<div class="gallery-item with_background item-layout-item-extended-3 ds">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="item-media">
			<?php
			$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
			the_post_thumbnail('dotdigital-single-event');
			?>
            <div class="media-links"></div>
		</div>
	<?php endif; //has_post_thumbnail ?>
	<div class="item-content">
		<h3 class="item-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
		<?php
		    dotdigital_the_excerpt(array(
                'length' => 10,
                'before' => '<p>',
                'after'  => '</p>',
                'more'  => '.',
            ) );
		?>
	</div>
</div><!-- eof vertical-item -->
