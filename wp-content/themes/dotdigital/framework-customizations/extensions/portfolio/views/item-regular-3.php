<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 *  Portfolio - regular item layout
 */
?>
<div class="vertical-item gallery-item content-absolute text-left bottommargin_10 ds">
	<?php if ( has_post_thumbnail() ) : ?>
        <div class="item-media">
            <a href="<?php the_permalink(); ?>">
			<?php
			$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
			the_post_thumbnail('dotdigital-small-width');
			?>
            </a>
            <div class="media-links">
                <div class="media-wrap">
                    <div class="content-wrap">
                        <h6 class="item-title">

								<?php the_title(); ?>

                        </h6>
                        <div class="small-text post-date">
							<?php dotdigital_posted_on(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<?php endif; //has_post_thumbnail ?>
</div>