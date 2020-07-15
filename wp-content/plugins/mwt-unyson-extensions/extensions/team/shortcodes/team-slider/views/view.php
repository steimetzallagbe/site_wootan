<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 * @var array $posts
 */



$categories   = fw_ext_extension_get_listing_categories( $atts['cat'], 'team' );
$sort_classes = fw_ext_extension_get_sort_classes( $posts->posts, $categories, '', 'team' );
$autoplay = isset( $data['settings']['extra']['slider_autoplay'] ) ? $data['settings']['extra']['slider_autoplay'] : true;
$slider_speed = isset( $data['settings']['extra']['slider_speed'] ) ? $data['settings']['extra']['slider_speed'] : '3000';
?>
<div class="shortcode-team-slider slider">
    <h3 class="slider-title"><?php echo wp_kses_post( $atts['title'] ); ?></h3>
    <div class="overlay"></div>
    <div class="content">
        <div class="flexslider team-slider"  data-slideshow="<?php echo esc_attr( $autoplay ); ?>" data-slideshowspeed="<?php echo esc_attr( $slider_speed ); ?>">
        <ul class="slides">
			<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
				<?php
				$pID = get_the_ID();
				$atts = fw_get_db_post_option( $pID );
				$full_image_src = ($atts['slider_image']) ? $atts['slider_image']['url'] : '' ;
				$unique_id = uniqid();
				?>
                <li id="slide-<?php echo esc_attr( $unique_id ); ?>">
                    <span class="overlay"></span>
                    <img src="<?php echo esc_url( $full_image_src ); ?>" alt="tir">
                </li>
				<?php endwhile; ?>
			<?php wp_reset_postdata(); // reset the query ?>
        </ul>
        </div>
        <div class="flexslider-controls">
            <ul class="flex-control-nav-1">
			<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
				<?php
				$pID = get_the_ID();
				$atts = fw_get_db_post_option( $pID );
				$full_image_src = ($atts['slider_image']) ? $atts['slider_image']['url'] : '' ;
				?>
                <li class="menu__item">
                    <div class="team-slides-navigation">
						<?php the_title(); ?>
                        <span class="position"><?php echo wp_kses_post( $atts['position'] ); ?></span>
                    </div>
                </li>
				<?php if ( ! empty( $atts['social_icons'] ) ) : ?>
                    <li class="team-social-icons">
						<?php
						//get icons-social shortcode to render icons in team member item
						$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
						if ( ! empty( $shortcodes_extension ) ) {
							echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $atts['social_icons'] ) );
						}
						?>
                    </li><!-- eof social icons -->
				<?php endif; //social icons ?>

				<?php  endwhile; ?>

            </ul>
        </div>
    </div><!-- eof .content -->
</div><!-- eof .shortcode-team-slider -->