<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Shortcode Posts - extended item layout
 */

?>

<div <?php post_class( "vertical-item content-padding big-padding with_shadow overflow-hidden" ); ?>>
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
        <h4 class="item-title">
            <a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
            </a>
        </h4>
		<?php
		the_excerpt();
		?>
        <div class="small-text post-date">
		    <?php dotdigital_posted_on(); ?>
        </div>
    </div>
</div><!-- eof vertical-item -->
