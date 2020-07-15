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
<article <?php post_class( "vertical-item content-padding big-padding text-center with_background with_shadow overflow-hidden" . $filter_classes ); ?>>
	<?php if ( get_the_post_thumbnail() ) : ?>
        <div class="item-media">
			<?php
			echo get_the_post_thumbnail('', 'dotdigital-square');
			?>
            <div class="media-links">
                <a class="abs-link" href="<?php the_permalink(); ?>"></a>
            </div>
        </div>
	<?php endif; //eof thumbnail check ?>
    <div class="item-content">
        <div class="entry-meta greylinks">
            <div class="highlight">
				<?php function_exists('dotdigital_posted_on') && dotdigital_posted_on(); ?>
            </div>
        </div>
        <h5 class="item-title">
            <a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
            </a>
        </h5>
		<?php the_excerpt(); ?>
        <div class="small-text post-author">
		    <?php function_exists('dotdigital_posted_by') && dotdigital_posted_by(); ?>
        </div>
        <!-- eof .blog-adds -->
    </div>
</article><!-- eof vertical-item -->