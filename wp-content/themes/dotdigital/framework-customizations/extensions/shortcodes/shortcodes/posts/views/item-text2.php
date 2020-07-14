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
<article <?php post_class( "vertical-item item-layout-item-text-2 overflow-hidden" . $filter_classes ); ?>>

    <div class="item-content">
        <h5 class="item-title">
            <a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
            </a>
        </h5>
        <?php
        dotdigital_the_excerpt(array(
            'length' => 10,
            'before' => '<p>',
            'after'  => '</p>',
            'more'  => '.',
        ) );
        ?>
        <a class="btn-arrow" href="<?php the_permalink(); ?>"><?php echo esc_html__('Read More','dotdigital') ?></a>
        <!-- eof .blog-adds -->
    </div>
</article><!-- eof vertical-item -->