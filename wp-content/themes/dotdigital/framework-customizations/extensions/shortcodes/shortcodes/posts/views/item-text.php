<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Shortcode Posts - text item layout
 */

$terms          = get_the_terms( get_the_ID(), 'category' );
$filter_classes = '';
foreach ( $terms as $term ) {
	$filter_classes .= ' filter-' . $term->slug;
}
?>
<article <?php post_class( "vertical-item item-text content-padding big-padding with_background ls text-center overflow-hidden" . $filter_classes ); ?>>

    <div class="item-content">
        <div class="entry-meta text-center">
            <div class="small-text post-date">
				<?php dotdigital_posted_on(); ?>
            </div>
        </div>
        <h5 class="item-title">
            <a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
            </a>
        </h5>
        <div class="small-text post-author">
			<?php dotdigital_posted_by(); ?>
        </div>
        <!-- eof .blog-adds -->
    </div>
</article><!-- eof vertical-item -->