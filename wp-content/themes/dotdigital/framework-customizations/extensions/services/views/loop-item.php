<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Single service loop item layout
 * also using as a default service view in a shortcode
 */

$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$taxonomy_name = $ext_services_settings['taxonomy_name'];
$service_info = fw_get_db_post_option(get_the_ID(), 'service_info');

?>
<div class="service_item vertical-item content-padding big-padding with_background text-center overflow-hidden">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="item-media">
			<?php
			$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
			the_post_thumbnail('dotdigital-square');
			?>
            <div class="media-links">
                <a class="abs-link" href="<?php the_permalink(); ?>"></a>
            </div>
		</div>
	<?php endif; //has_post_thumbnail ?>
	<div class="item-content">
		<h5 class="entry-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h5>
		<div class="excerpt">
			<?php the_excerpt(); ?>
		</div>
        <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html__('Read more', 'dotdigital'); ?></a>
	</div><!-- eof .item-content -->
</div><!-- eof .teaser -->
