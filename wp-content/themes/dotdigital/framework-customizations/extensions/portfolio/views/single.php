<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */

get_header();
$pID = get_the_ID();

$fw_ext_projects_gallery_image = fw()->extensions->get( 'portfolio' )->get_config( 'image_sizes' );
$fw_ext_projects_gallery_image = $fw_ext_projects_gallery_image['gallery-image'];
//no columns on single gallery page
$column_classes = dotdigital_get_columns_classes( true );
$atts = fw_get_db_post_option( $pID );
?>
<?php if ( $atts['single_portfolio_layout'] == 'layout-1' || empty($atts['single_portfolio_layout']) ) : ?>
	<div id="content" class="col-xs-12">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'text-center' ); ?>>
				<!-- .entry-header -->
				<div class="gallery-item vertical-item content-padding big-padding with_background">
					<div class="item-media">
						<?php
						$thumbnails = fw_ext_portfolio_get_gallery_images();
						$captions   = array();
						if ( ! empty( $thumbnails ) ) :
							$loop = ( count( $thumbnails ) > 1 ) ? "true" : "false";
							?>
							<div id="owl-carousel-<?php echo esc_attr( $pID ); ?>" class="owl-carousel"
							     data-loop="<?php echo esc_attr( $loop ); ?>"
							     data-margin="0"
							     data-dots="0"
							     data-nav="1"
							     data-themeclass="owl-theme entry-thumbnail-carousel"
							     data-center="false"
							     data-items="1"
							     data-autoplay="true"
                                 data-autoplaytimeout="3000"
							     data-responsive-xs="1"
							     data-responsive-sm="1"
							     data-responsive-md="1"
							     data-responsive-lg="1"
							>
								<?php foreach ( $thumbnails as $thumbnail ) :
									$attachment = get_post( $thumbnail['attachment_id'] );
									$captions[ $thumbnail['attachment_id'] ] = $attachment->post_title;
									$image = fw_resize( $thumbnail['attachment_id'], $fw_ext_projects_gallery_image['width'], $fw_ext_projects_gallery_image['height'], $fw_ext_projects_gallery_image['crop'] );
									?>
									<div class="item">
										<img src="<?php echo esc_attr( $image ); ?>"
										     class="portfolio-gallery-image"
										     alt="<?php echo esc_attr( $attachment->post_title ); ?>"
										     title="portfolio-gallery-image-<?php echo esc_attr( $attachment->ID ); ?>"
										     width="<?php echo esc_attr( $fw_ext_projects_gallery_image['width'] ); ?>"
										     height="<?php echo esc_attr( $fw_ext_projects_gallery_image['height'] ); ?>"
										>
									</div>
								<?php endforeach ?>
							</div>
							<?php
						else:
							the_post_thumbnail( 'dotdigital-full-width' );
						endif; //more than one thumbnail check
						?>
					</div><!-- .item-media -->
					<div class="item-content entry-content">
						<?php
						the_content();

						//buttons_share
						dotdigital_share_this( true )
						?>
					</div>
					<!-- .entry-content -->
				</div>
				<!-- .entry-content -->
			</article><!-- #post-## -->

		<?php endwhile;

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
		// Previous/next post navigation. Uncomment following line if you need post navigation
		dotdigital_post_nav();
		?>

	</div><!--eof #content -->
    <?php if ( $column_classes['sidebar_class'] ): ?>
        <!-- main aside sidebar -->
            <aside class="<?php echo esc_attr( $column_classes['sidebar_class'] ); ?>">
                <?php get_sidebar(); ?>
            </aside>
        <!-- eof main aside sidebar -->
	<?php endif; ?>
<?php  elseif ( $atts['single_portfolio_layout'] == 'layout-2') : ?>
        </div>
    </div>
</section>
<section class="portfolio-carousel ls section_padding_top_0 section_padding_bottom_150">
    <div class="container-fluid">
        <div class="row">
            <div id="content" class="col-xs-12 layout-2">
                <?php
                // Start the Loop.
                while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'text-center' ); ?>>
                        <!-- .entry-header -->
                        <div class="gallery-item">
                            <div class="item-media">
                                <?php
                                $fw_ext_projects_gallery_image = fw()->extensions->get( 'portfolio' )->get_config( 'image_sizes' );
                                $fw_ext_projects_gallery_image = $fw_ext_projects_gallery_image['gallery-image-large'];
                                $thumbnails = fw_ext_portfolio_get_gallery_images();
                                $captions   = array();
                                if ( ! empty( $thumbnails ) ) :
                                    $loop = ( count( $thumbnails ) > 1 ) ? "true" : "false";
                                    ?>
                                    <div id="owl-carousel-<?php echo esc_attr( $pID ); ?>" class="owl-carousel"
                                         data-loop="<?php echo esc_attr( $loop ); ?>"
                                         data-margin="0"
                                         data-dots="0"
                                         data-nav="1"
                                         data-themeclass="owl-theme entry-thumbnail-carousel"
                                         data-center="false"
                                         data-items="1"
                                         data-autoplay="true"
                                         data-autoplaytimeout="3000"
                                         data-responsive-xs="1"
                                         data-responsive-sm="1"
                                         data-responsive-md="1"
                                         data-responsive-lg="1"
                                    >
                                        <?php foreach ( $thumbnails as $thumbnail ) :
                                            $attachment = get_post( $thumbnail['attachment_id'] );
                                            $captions[ $thumbnail['attachment_id'] ] = $attachment->post_title;
                                            $image = fw_resize( $thumbnail['attachment_id'], $fw_ext_projects_gallery_image['width'], $fw_ext_projects_gallery_image['height'], $fw_ext_projects_gallery_image['crop'] );
                                            ?>
                                            <div class="item">
                                                <img src="<?php echo esc_attr( $image ); ?>"
                                                     class="portfolio-gallery-image"
                                                     alt="<?php echo esc_attr( $attachment->post_title ); ?>"
                                                     title="portfolio-gallery-image-<?php echo esc_attr( $attachment->ID ); ?>"
                                                     width="<?php echo esc_attr( $fw_ext_projects_gallery_image['width'] ); ?>"
                                                     height="<?php echo esc_attr( $fw_ext_projects_gallery_image['height'] ); ?>"
                                                >
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                <?php
                                else:
                                    the_post_thumbnail( 'dotdigital-full-width' );
                                endif; //more than one thumbnail check
                                ?>
                            </div><!-- .item-media -->
                            <div class="item-content entry-content">
                                <?php
                                the_content();
                                ?>
                            </div>
                            <!-- .entry-content -->
                        </div>
                        <!-- .entry-content -->
                    </article><!-- #post-## -->
                <?php endwhile; ?>
            </div><!--eof #content -->
    <?php endif;?>
<?php get_footer();