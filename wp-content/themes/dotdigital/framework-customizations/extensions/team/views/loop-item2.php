<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Single service loop item layout
 * also using as a default service view in a shortcode
 */

$ext_team_settings = fw()->extensions->get( 'team' )->get_settings();
$taxonomy_name     = $ext_team_settings['taxonomy_name'];

$pID  = get_the_ID();
$atts = fw_get_db_post_option( $pID );

?>

<div class="side-item text-xs-center content-padding with_background overflow-hidden loop-item-2">
        <div class="row">
			<?php if ( has_post_thumbnail() ) : ?>
                <div class="col-xs-12 col-sm-5 col-md-4">
                <div class="item-media cover-image">
					<?php
					$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( $pID ) );
					the_post_thumbnail( 'dotdigital-square' );
					?>
                    <div class="media-links">
                        <a class="abs-link" href="<?php the_permalink(); ?>"></a>
                    </div>
                </div>
                </div>
			<?php endif; //has_post_thumbnail ?>
            <div class="col-xs-12 col-sm-7 col-md-8">
            <div class="item-content">

                <h5 class="item-title">
                    <a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
                    </a>
                </h5>

				<?php if ( ! empty( $atts['position'] ) ) : ?>
                    <p class="position text-uppercase highlight"><?php echo wp_kses_post( $atts['position'] ); ?></p>
				<?php endif; //position ?>

                <div class="desc">
					<?php the_excerpt(); ?>
                </div>

				<?php if ( ! empty( $atts['social_icons'] ) ) : ?>
                    <div class="team-social-icons">
						<?php
						//get icons-social shortcode to render icons in team member item
						$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
						if ( ! empty( $shortcodes_extension ) ) {
							echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $atts['social_icons'] ) );
						}
						?>
                    </div><!-- eof social icons -->
				<?php endif; //social icons ?>
            </div>
        </div>
        </div>
</div>
