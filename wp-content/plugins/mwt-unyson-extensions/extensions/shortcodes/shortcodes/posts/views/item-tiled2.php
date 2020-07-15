<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Shortcode Posts - extended item layout
 */

?>
<div <?php post_class( "side-item text-center" ) ?>>
	<?php if ( get_the_post_thumbnail() ) : ?>
        <div class="item-media-wrap">
            <div class="item-media">
				<?php
				the_post_thumbnail( 'dotdigital-square' );
				?>
                <div class="media-links">
                    <a class="abs-link" href="<?php the_permalink(); ?>"></a>
                </div>
            </div>
        </div>
	<?php endif; //eof thumbnail check ?>
    <div class="item-content">
        <h6 class="item-title">
            <a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
            </a>
        </h6>
		<?php
		the_excerpt();
		?>
        <div class="small-text post-date">
            <?php function_exists('dotdigital_posted_on') && dotdigital_posted_on(); ?>
        </div>
    </div>
</div><!-- eof side-item -->
