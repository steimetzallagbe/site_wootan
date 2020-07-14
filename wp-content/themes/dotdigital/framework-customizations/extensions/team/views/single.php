<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * The template for displaying single service
 *
 */

get_header();
$pID = get_the_ID();

//getting taxonomy name
$ext_team_settings = fw()->extensions->get( 'team' )->get_settings();
$taxonomy_name     = $ext_team_settings['taxonomy_name'];

$atts = fw_get_db_post_option( get_the_ID() );

$shortcodes_extension = fw()->extensions->get( 'shortcodes' );

$unique_id = uniqid();
?>
<?php if ( $atts['single_member_layout'] == 'layout-1' || empty( $atts['single_member_layout'] ) ) : ?>
	<?php
// Start the Loop layout 1.
	while ( have_posts() ) : the_post(); ?>
        <div class="col-md-5">
            <div class="single-member-1 vertical-item topmargin_10 with_background content-padding big-padding overflow-hidden text-center">
				<?php the_post_thumbnail( 'dotdigital-square' ); ?>
                <div class="item-content">
					<?php the_title( '<h6 class="item-title text-transform-none">', '</h6>' ); ?>
					<?php if ( ! empty( $atts['position'] ) ) : ?>
                        <p class="position margin_0"><?php echo wp_kses_post( $atts['position'] ); ?></p>
					<?php endif; //position ?>

					<?php if ( ! empty( $atts['social_icons'] ) ) : ?>
                        <div class="team-social-icons">
							<?php
							if ( ! empty( $shortcodes_extension ) ) {
								echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $atts['social_icons'] ) );
							}
							?>
                        </div><!-- eof social icons -->
					<?php endif; //social icons ?>

                </div>
            </div><!-- .vertical-item -->
        </div><!-- .col-md-5 -->
        <div class="col-md-7">
            <div class="single-member-1 item-content topmargin_5 entry-content">
                <!-- .entry-header -->
				<?php the_content(); ?>

				<?php
				//member meta tabs start
				if (
					! empty( $atts['bio'] )
					||
					! empty( $atts['skills'] )
					||
					! empty( json_decode( $atts['form']['json'] )[1] )
				) :
					$tab_num = 0;
					?>
                    <div class="bootstrap-tabs">
                        <ul class="nav nav-tabs" role="tablist">
							<?php
							if ( ! empty( $atts['bio'] ) ) :
								?>
                                <li class="<?php echo esc_attr( $tab_num === 0 ? 'active' : '' ); ?>">
                                    <a href="#tab-<?php echo esc_attr( $unique_id . '-' . $tab_num ); ?>" role="tab"
                                       data-toggle="tab">
										<?php esc_html_e( 'Biography', 'dotdigital' ); ?>
                                    </a>
                                </li>
								<?php
								$tab_num ++;
							endif; //bio check

							if ( ! empty( $atts['skills'] ) ) :
								?>
                                <li class="<?php echo esc_attr( $tab_num === 0 ? 'active' : '' ); ?>">
                                    <a href="#tab-<?php echo esc_attr( $unique_id . '-' . $tab_num ); ?>" role="tab"
                                       data-toggle="tab">
										<?php esc_html_e( 'Skills', 'dotdigital' ); ?>
                                    </a>
                                </li>
								<?php
								$tab_num ++;
							endif; //bio check

							if ( ! empty( json_decode( $atts['form']['json'] )[1] ) ) :
								?>
                                <li class="<?php echo esc_attr( $tab_num === 0 ? 'active' : '' ); ?>">
                                    <a href="#tab-<?php echo esc_attr( $unique_id . '-' . $tab_num ); ?>" role="tab"
                                       data-toggle="tab">
										<?php esc_html_e( 'Message', 'dotdigital' ); ?>
                                    </a>
                                </li>
								<?php
								$tab_num ++;
							endif; //form check
							?>
                        </ul>
                        <div class="tab-content">
							<?php
							$tab_num = 0;
							if ( ! empty( $atts['bio'] ) ) :
								?>
                                <div
                                        class="tab-pane tab-member-bio fade <?php echo esc_attr( $tab_num === 0 ? 'in active' : '' ); ?>"
                                        id="tab-<?php echo esc_attr( $unique_id . '-' . $tab_num ); ?>">
									<?php echo wp_kses_post( $atts['bio'] ); ?>
                                </div><!-- .eof tab-pane -->
								<?php
								$tab_num ++;
							endif; //bio check

							if ( ! empty( $atts['skills'] ) ) :
								?>
                                <div
                                        class="tab-pane tab-member-skills fade <?php echo esc_attr( $tab_num === 0 ? 'in active' : '' ); ?>"
                                        id="tab-<?php echo esc_attr( $unique_id . '-' . $tab_num ); ?>">
									<?php
									foreach ( $atts['skills'] as $skill ) :
										echo fw_ext( 'shortcodes' )->get_shortcode( 'progress_bar' )->render( $skill );
									endforeach;
									?>
                                </div><!-- .eof tab-pane -->
								<?php
								$tab_num ++;
							endif; //skills check

							if ( ! empty( json_decode( $atts['form']['json'] )[1] ) ) :
								?>
                                <div
                                        class="tab-pane tab-member-form fade <?php echo esc_attr( $tab_num === 0 ? 'in active' : '' ); ?>"
                                        id="tab-<?php echo esc_attr( $unique_id . '-' . $tab_num ); ?>">
									<?php echo fw_ext( 'shortcodes' )->get_shortcode( 'contact_form' )->render( $atts ); ?>
                                </div><!-- .eof tab-pane -->
								<?php
								$tab_num ++;
							endif; //form check
							?>
                        </div>
                    </div>
				<?php endif; //tab content check ?>

				<?php if ( ! empty( $atts['additional_content'] ) ) : ?>
                    <div class="member-additional-content topmargin_30">
						<?php echo wp_kses_post( $atts['additional_content'] ); ?>
                    </div>
				<?php endif; //additional content ?>
            </div>
            <!-- .entry-content -->
        </div>
	<?php endwhile; ?>

    <!-- Single member layout 2 -->
<?php elseif ( $atts['single_member_layout'] == 'layout-2' ) : ?>
	<?php
	// Start the Loop layout 2.
	while ( have_posts() ) : the_post(); ?>
        <div class="col-md-5">
            <div class="single-member-2 vertical-item topmargin_10 overflow-hidden text-left">
				<?php the_post_thumbnail( 'dotdigital-square' ); ?>
                <div class="item-content">
					<?php if ( ! empty( $atts['skills'] ) ) : ?>
						<?php
						foreach ( $atts['skills'] as $skill ) :
							echo fw_ext( 'shortcodes' )->get_shortcode( 'progress_bar' )->render( $skill );
						endforeach;
						?>
					<?php endif; //skills ?>
                </div>
            </div><!-- .vertical-item -->
        </div><!-- .col-md-5 -->
        <div class="col-md-7">
            <div class="single-member-2 item-content topmargin_10 bottommargin_0 entry-content">
                <div class="content-header">
                    <div class="header-left-part">
						<?php the_title( '<h6 class="item-title text-transform-none">', '</h6>' ); ?>
						<?php if ( ! empty( $atts['position'] ) ) : ?>
                            <p class="position margin_0"><?php echo wp_kses_post( $atts['position'] ); ?></p>
						<?php endif; //position ?>
                    </div>
                    <div class="header-right-part">
						<?php if ( ! empty( $atts['social_icons'] ) ) : ?>
                            <div class="team-social-icons">
								<?php
								if ( ! empty( $shortcodes_extension ) ) {
									echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $atts['social_icons'] ) );
								}
								?>
                            </div><!-- eof social icons -->
						<?php endif; //social icons ?>
                    </div>
                </div>
                <!-- .entry-header -->
				<?php if ( ! empty( $atts['icons'] ) ) : ?>
                    <div class="member-contacts">
						<?php
						if ( ! empty( $shortcodes_extension ) ) {
							echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_list' )->render( array( 'icons' => $atts['icons'] ) );
						}
						?>
                    </div>
				<?php endif; //icons_list ?>
				<?php the_content(); ?>
				<?php if ( ! empty( json_decode( $atts['form']['json'] )[1] ) ) :
					?>
                    <div class="member-form">
						<?php echo fw_ext( 'shortcodes' )->get_shortcode( 'contact_form' )->render( $atts ); ?>
                    </div><!-- .eof tab-pane -->
				<?php
				endif; //form check
				?>
            </div>
            <!-- .entry-content -->
        </div>
	<?php endwhile; ?>
    </div>
    </div>
    </section>
    <section class="ls ms section_padding_top_120 section_padding_bottom_150">
    <div class="container">
    <div class="row">
    <div class="col-xs-12">
        <div class="single-member-carousel">
            <h4 class="carousel-title"><?php esc_html_e( 'Our Experts', 'dotdigital' ); ?></h4>
			<?php
			//get team shortcode to render icons in team member item
			$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
			if ( ! empty( $shortcodes_extension ) ) {
				echo fw_ext( 'shortcodes' )->get_shortcode( 'team' )->render( array(
					'layout'        => 'carousel',
					'cat'           => '',
					'number'        => 12,
					'layout_item'   => 1,
					'show_excerpt'  => 'hide-excerpt',
					'show_socials'  => 'hide-socials',
					'show_filters'  => false,
					'margin'        => 30,
					'responsive_xs' => 1,
					'responsive_sm' => 2,
					'responsive_md' => 2,
					'responsive_lg' => 3,
					'post__not_in'  => array( get_the_ID() ),
				) );
			}
			?>
        </div>
    </div>

<!-- Single member layout 3 -->
<?php elseif ( $atts['single_member_layout'] == 'layout-3' ) : ?>
	<?php
	// Start the Loop layout 3.
	while ( have_posts() ) : the_post(); ?>
        <div class="col-xs-12 single-member-3">
            <div class="single-team-header">
                <div class="team-image text-center bottommargin_40">
					<?php the_post_thumbnail(); ?>
                </div>
                <div class="item-content">
					<?php the_title( '<h4 class="item-title text-transform-none">', '</h4>' ); ?>
					<?php if ( ! empty( $atts['social_icons'] ) ) : ?>
                        <div class="team-social-icons">
							<?php
							if ( ! empty( $shortcodes_extension ) ) {
								echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $atts['social_icons'] ) );
							}
							?>
                        </div><!-- eof social icons -->
					<?php endif; //social icons ?>

					<?php if ( ! empty( $atts['icons'] ) ) : ?>
                        <div class="member-contacts">
							<?php
							if ( ! empty( $shortcodes_extension ) ) {
								echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_list' )->render( array( 'icons' => $atts['icons'] ) );
							}
							?>
                        </div>
					<?php endif; //icons_list ?>
                </div>
            </div>
        </div>

        <!-- Memeber bio content -->
        <div class="col-xs-12 single-member-3">
            <?php if ( ! empty( $atts['bio'] ) ) : ?>
                <div  class="member-bio">
                    <?php echo wp_kses_post( $atts['bio'] ); ?>
                </div>
            <?php endif; //bio check ?>
        </div>

        <!-- Memeber skills -->
        <div class="col-xs-12 col-md-6 single-member-3">
			<?php if ( ! empty( $atts['skills'] ) ) : ?>
				<?php
				foreach ( $atts['skills'] as $skill ) :
					echo fw_ext( 'shortcodes' )->get_shortcode( 'progress_bar' )->render( $skill );
				endforeach;
				?>
			<?php endif; //skills check ?>
        </div>

        <!-- Memeber content -->
        <div class="col-xs-12 col-md-6 single-member-3">
            <div  class="member-content">
                <?php the_content(); ?>
            </div>
        </div>

        <!-- Contact form -->
        <div class="col-xs-12 single-member-3 form-wrapper">
			<?php if ( ! empty( json_decode( $atts['form']['json'] )[1] ) ) : ?>
                <h6 class="form-title"><?php echo esc_html__( 'Contact Me', 'dotdigital' ); ?></h6>
                <div class="member-form">
					<?php echo fw_ext( 'shortcodes' )->get_shortcode( 'contact_form' )->render( $atts ); ?>
                </div>
			<?php endif; //form check ?>
        </div>
	<?php endwhile; ?>
<?php endif; ?>
<?php
get_footer();