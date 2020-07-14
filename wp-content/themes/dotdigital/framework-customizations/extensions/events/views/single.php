<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
get_header();
global $post;
$options       = fw_get_db_post_option( $post->ID, fw()->extensions->get( 'events' )->get_event_option_id() );
$option_events = fw_get_db_post_option( $post->ID );

$post_categories = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_categories' ) : 'yes';
$post_author     = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_author' ) : 'yes';
$post_date       = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_date' ) : 'yes';
$post_tags       = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_tags' ) : 'yes';
$version = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'version' ) : 'ls';
?>
    <div id="content" class="event-single-page  section_padding_top_100 section_padding_bottom_130 <?php echo esc_attr( $version ) ?>">
        <div class="container">
            <div class="row">
				<?php
				// Start the Loop.
				while ( have_posts() ) :
				the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class( 'event-single' ); ?>>
                    <div class="item-content left-part col-xs-12 col-sm-6 col-md-8">
                        <div class="entry-content">
                            <!-- additional information about event -->
							<?php if ( $option_events['show-event-info'] != 'hidden' ) : ?>
                                <div class="single-event-info bottommargin_30">
                                    <ul class="list-unstyled">
                                        <li>
                                    <span class="event-place">
										<?php
										if ( $options['event_location']['location'] ) : ?>
                                            <strong class="dark info-label"><?php esc_html_e( 'Place', 'dotdigital' ) ?>:</strong>
											<?php
											echo esc_html( $options['event_location']['location'] );
										endif;

										if ( $options['event_location']['venue'] ) :
											echo esc_html( ', ' . $options['event_location']['venue'] );
										endif;
										?>
                                    </span><!-- .event-place-->
                                        </li>

									<?php foreach ( $options['event_children'] as $key => $row ) : ?>
										<?php if ( empty( $row['event_date_range']['from'] ) or empty( $row['event_date_range']['to'] ) ) : ?>
											<?php continue; ?>
										<?php endif; ?>
                                            <li><span class="event-start-date">
                                                    <strong class="dark info-label"><?php esc_html_e( 'Start', 'dotdigital' ) ?>:</strong>
		                                            <?php echo date("d.m.Y", strtotime($row['event_date_range']['from']));?>
                                                </span>
	                                            <?php if ( $options['all_day'] != 'yes' ) : ?>
                                                    <span class="event-start-time">
                                                        <?php esc_html_e( 'On', 'dotdigital' ) ?>
			                                            <?php echo date("H:i", strtotime($row['event_date_range']['from']));?>
                                                    </span>
	                                            <?php endif; ?>
                                            </li>
                                            <li><span class="event-end-date">
                                                    <strong class="dark info-label"><?php esc_html_e( 'End', 'dotdigital' ) ?>:</strong>
		                                            <?php echo date("d.m.Y", strtotime($row['event_date_range']['to']));?>
                                                </span>
	                                            <?php if ( $options['all_day'] != 'yes' ) : ?>
                                                    <span class="event-end-time">
                                                        <?php esc_html_e( 'On', 'dotdigital' ) ?>
			                                            <?php echo date("H:i", strtotime($row['event_date_range']['to']));?>
                                                    </span>
	                                            <?php endif; ?>
                                            </li>
									<?php endforeach; ?>
                                        </ul>
                                </div>
							<?php endif; ?>
                            <!-- .additional information about event -->

							<?php the_content(); ?>

							<?php do_action( 'dotdigital_ext_events_after_content' ); ?>
                        </div><!-- .entry-content -->
                    </div><!-- .item-content -->
                    <div class="right-part col-xs-12 col-sm-6 col-md-4 topmargin_15">
	                    <?php the_post_thumbnail('dotdigital-single-event'); ?>
                    </div>
                </div>
            </div><!--eof row -->
        </div><!--eof container -->
		<?php
		$map = fw_ext_events_render_map();
		if ( $map ):
			?>
            <div class="events-map">
				<?php echo fw_ext_events_render_map(); ?>
            </div>
		<?php
		endif; //map
		?>
		<?php endwhile; ?>
    </div><!--eof #content -->
<?php
get_footer();