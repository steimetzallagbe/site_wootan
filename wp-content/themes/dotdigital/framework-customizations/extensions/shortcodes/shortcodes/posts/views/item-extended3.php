<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Shortcode Posts - extended item layout
 */

$terms          = get_the_terms( get_the_ID(), 'category' );
$filter_classes = '';
foreach ( $terms as $term ) {
	$filter_classes .= ' filter-' . $term->slug;
}
?>
<div <?php post_class( "vertical-item text-left content-padding big-padding with_shadow" ) ?>>
	<?php if ( get_the_post_thumbnail() ) : ?>
        <div class="item-media-wrap">
            <div class="item-media">
				<?php
				the_post_thumbnail('dotdigital-rectangular');
				?>
                <div class="media-links">
                    <a class="abs-link" href="<?php the_permalink(); ?>"></a>
                </div>
            </div>
        </div>
	<?php endif; //eof thumbnail check ?>
    <div class="item-content">
        <h5 class="item-title">
            <a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
            </a>
        </h5>
		<?php
		the_excerpt();
		?>
        <div class="small-text post-date">
			<?php dotdigital_posted_on(); ?>
        </div>
    </div>
</div><!-- eof side-item -->