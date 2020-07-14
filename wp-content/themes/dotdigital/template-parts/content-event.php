<?php
/**
 * The default template for displaying event content
 *
 * Used for both single and index/archive/search.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$show_post_thumbnail = ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) ? false : true;

$post_categories = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_categories' ) : 'yes';
$post_author     = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_author' ) : 'yes';
$post_date       = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_date' ) : 'yes';
$post_tags       = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_tags' ) : 'yes';

//single item layout
if ( is_singular() ) :
	//part of template for single event layout is overriden in framework-customizations/extensions/events/views/single.php
	?>
    <!-- tc: content-event -->
    <article
            id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item content-padding with_border big-padding ' ); ?>>
		<?php dotdigital_post_thumbnail(); ?>
        <div class="entry-content">
            <header class="entry-header content-start">
				<?php if ( $post_date == 'yes' ) : ?>
                    <div class="entry-date darklinks">
						<?php if ( 'post' == get_post_type() ) {
							dotdigital_posted_on();
						} ?>
                    </div>
				<?php endif; ?>
                <!-- .entry-date -->

				<?php if ( $post_author == 'yes' ) : ?>
                    <div class="entry-author darklinks">
						<?php if ( 'post' == get_post_type() ) {
							dotdigital_posted_by();
						} ?>
                    </div>
				<?php endif; ?>
                <!-- .entry-author -->

	            <?php if ( ! defined( 'FW' ) ) : ?>
                    <div  class="categories-links theme_buttons color color1 small_height"><?php echo get_the_category_list( _x( ' ', 'Used between list items, there is a space after the comma.', 'dotdigital' ) ); ?></div>
	            <?php elseif ( defined( 'FW' ) && $post_categories == 'yes' ) :  ?>
		            <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && dotdigital_categorized_blog() ) : ?>
                        <div class="categories-links theme_buttons color color1 small_height"><?php echo get_the_category_list( _x( ' ', 'Used between list items, there is a space after the comma.', 'dotdigital' ) ); ?></div>
		            <?php endif; ?>
	            <?php endif; ?>
                <!-- .item cats -->
				<?php dotdigital_post_adds() ?>
                <!-- eof .post-adds -->
            </header><!-- .entry-header -->

			<?php
			the_content( esc_html__( 'More...', 'dotdigital' ) );
			?>

            <div class="entry-meta">
				<?php if ( $post_tags == 'yes' ) : ?>
                    <div class="entry-tags">
						<?php the_tags( '<span class="tag-links">', ' ', '</span>' ); ?>
                    </div>
				<?php endif; ?> <!-- .item tags -->

            </div><!-- .entry-meta -->
			<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links topmargin_30"><span class="page-links-title">' . esc_html__( 'Pages:', 'dotdigital' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
			?>
        </div><!-- .entry-content -->

    </article><!-- #post-## -->
    <!-- /tc: content-event -->
<?php
//eof single page layout
//blog feed layout
else:
	$options = ( function_exists( 'fw_get_db_post_option' ) ) ? fw_get_db_post_option( $post->ID, fw()->extensions->get( 'events' )->get_event_option_id() ) : false;
	$option_events =  fw_get_db_post_option( $post->ID );

	$post_categories = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_categories' ) : 'yes';
	$post_author     = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_author' ) : 'yes';
	$post_date       = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_date' ) : 'yes';
	$post_tags       = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_tags' ) : 'yes';

	?>
    <article
            id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item content-padding with_background events-loop' ); ?>>
        <div class="side-item">
            <div class="row">
                <div class="col-md-4">
                    <div class="item-media cover-image">
                        <?php the_post_thumbnail('dotdigital-event'); ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="item-content">
                        <header class="entry-header content-justify darklinks">
	                        <?php
	                        the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
	                        ?>
                            <div class="event-info bottommargin_10">
                                <?php foreach ( $options['event_children'] as $key => $row ) : ?>
	                                <?php if ( empty( $row['event_date_range']['from'] ) ) : ?>
		                                <?php continue; ?>
	                                <?php endif; ?>
                                    <div class="event-start-date">
                                        <?php echo date("d.m.Y", strtotime($row['event_date_range']['from']));?>
                                    </div>
	                                <?php if ( $options['all_day'] != 'yes' ) : ?>
                                        <div class="event-start-time">
                                            <?php echo date("H:i", strtotime($row['event_date_range']['from']));?>
                                        </div>
	                                <?php endif; ?>
                                <?php endforeach; ?>
                                <?php if ( $options['event_location']['location'] ) : ?>
                                <div class="event-place">
                                    <?php  echo esc_html( $options['event_location']['venue'] );?>
                                </div><!-- .event-place-->
                                <?php endif; ?>
                            </div>
                        </header><!-- .entry-header -->

						<?php if ( is_search() ) : ?>
                            <div class="entry-summary blog-excerpt">
	                            <?php  echo wp_kses_post( $option_events['excerpt_text_id']);?>
                            </div><!-- .entry-summary -->
						<?php else : ?>
                            <div class="entry-content blog-excerpt">
	                            <?php  echo wp_kses_post( $option_events['excerpt_text_id']);?>
								<?php
								wp_link_pages( array(
									'before'      => '<div class="page-links topmargin_30"><span class="page-links-title">' . esc_html__( 'Pages:', 'dotdigital' ) . '</span>',
									'after'       => '</div>',
									'link_before' => '<span>',
									'link_after'  => '</span>',
								) );
								?>
                            </div><!-- .entry-content -->
						<?php endif; //is_search
						?>
                    </div><!-- eof .item-content -->
                </div>
            </div><!-- eof .row -->
        </div><!-- eof .side-item -->
    </article><!-- #post-## -->
<?php endif;  //is singular ?>