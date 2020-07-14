<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$show_post_thumbnail = ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) ? false : true;

$post_categories   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_categories' ) : 'yes';
$post_author   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_author' ) : 'yes';
$post_date   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_date' ) : 'yes';
$post_tags   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_tags' ) : 'yes';

//single item layout
if ( is_singular() ) : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('vertical-item content-padding with_background big-padding overflow-hidden'); ?>>
		<?php dotdigital_post_thumbnail(); ?>

		<div class="item-content text-center">

			<header class="entry-header">
				<div class="entry-avatar">
					<?php
					global $post;
					echo get_avatar( $post->post_author ); ?>
				</div>
			</header><!-- .entry-header -->
				<?php
				the_content();
				?>
				<?php
				wp_link_pages( array(
					'before'      => '<div class="page-links topmargin_30"><span class="page-links-title">' . esc_html__( 'Pages:', 'dotdigital' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
				?>
            </div><!-- .entry-content -->
            <div class="entry-meta ds with_padding">
				<?php if ( $post_date == 'yes' ) : ?>
                <div class="entry-date">
					<?php if ( 'post' == get_post_type() ) {
						dotdigital_posted_on();
					} ?>
                </div>
				<?php endif; ?><!-- .entry-date -->
                <div class="entry-blog-adds">
					<?php dotdigital_blog_adds() ?>
                </div><!-- eof .entry-blog-adds -->
				<?php if ( $post_tags == 'yes' ) : ?>
                    <div class="entry-tags">
						<?php  esc_html_e( 'Tags:', 'dotdigital' ); ?>
						<?php the_tags( '<span class="tag-links">', ' ', '</span>' ); ?>
                    </div>
				<?php endif; ?>	<!-- .item tags -->
                <div class="entry-blog-share">
					<?php dotdigital_post_adds() ?>
                </div><!-- eof .entry-blog-share -->
            </div><!-- .entry-meta -->
    </article><!-- #post-## -->
<?php
//eof single page layout
//blog feed layout
else:
	$post_thumbnail = get_the_post_thumbnail( get_the_ID() );
	$additional_post_class = ( $post_thumbnail ) ? 'ds bg_teaser after_cover darkgrey_bg overflow-hidden  ' : '';
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'ds vertical-item text-center content-padding big-padding ' . $additional_post_class ); ?>>
		<?php
		echo empty ( $post_thumbnail ) ? '<div class="bg_overlay"></div>' : '';
		echo wp_kses_post ( $post_thumbnail );
		?>
		<div class="item-content">

			<div class="entry-avatar">
				<?php
				global $post;
				echo get_avatar( $post->post_author, $size = 90 ); ?>
			</div>
			<div class="entry-content">
				<h4 class="entry-title"><?php the_title(); ?></h4>
				<?php
				the_excerpt();
				?>
			</div><!-- .entry-content -->

			<?php if ( is_search() ) : ?>
				<div class="entry-summary">
					<?php
					the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
					the_excerpt();
					?>
				</div><!-- .entry-summary -->
			<?php endif; //is_search  ?>
            <div class="entry-meta text-center content-justify-center">
				<?php if ( $post_date == 'yes' ) : ?>
                <div class="entry-date">
					<?php if ( 'post' == get_post_type() ) {
						dotdigital_posted_on();
					} ?>
                </div>
				<?php endif; ?><!-- .entry-date -->
                <div class="format-name small-text"><?php echo esc_html__('Status', 'dotdigital') ?></div>
            </div><!-- .entry-meta -->
		</div><!-- eof .item-content -->
	</article><!-- #post-## -->
<?php endif;  //is singular