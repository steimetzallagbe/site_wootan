<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */

$show_post_thumbnail = ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) ? false : true;

$post_categories   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_categories' ) : false;
$post_author   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_author' ) : 'yes';
$post_date   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_date' ) : 'yes';
$post_tags   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_tags' ) : 'yes';

//single item layout
if ( is_singular() ) :
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item content-padding with_background big-padding ' ); ?>>
		<?php dotdigital_post_thumbnail(); ?>

        <div class="item-content">
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
            <div class="entry-avatar">
				<?php
				global $post;
				echo get_avatar( $post->post_author ); ?>
            </div>
			<?php if ( $post_author == 'yes' ) : ?>
            <div class="entry-author">
				<?php if ( 'post' == get_post_type() ) {
					dotdigital_posted_by();
				} ?>
            </div>
			<?php endif; ?><!-- .entry-author -->
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
	$post_categories   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_categories' ) : 'yes';
	$post_author   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_author' ) : 'yes';
	$post_date   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_date' ) : 'yes';
	$post_tags   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_tags' ) : 'yes';

	$post_layout = 'post-layout-standard';
	if ( function_exists( 'fw_get_db_post_option' ) ) {
		$post_layout = fw_get_db_post_option( $post->ID, 'post-layout', 'post-layout-standard' );
	}
	$show_readmore = function_exists( 'fw_get_db_post_option' ) ? fw_get_db_post_option( $post->ID, 'show-readmore', 'readmore-hidden' ) : '';
	//standard feed layout (image at the top or not image at all if option is standard or has no post thumbnail)
    $small_layout = ( $post_layout == 'post-layout-standard' || ! $show_post_thumbnail ) ? false : true;
	if ( $small_layout ) : //additional markup for small layout post
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'format-small-image '. $show_readmore .'' ); ?>>
		<div class="side-item content-padding big-padding with_background ">
		<div class="row">
		<?php dotdigital_post_thumbnail( $small_layout ); ?>
		<div class="col-md-6">

	<?php else : //standard layout markup ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item content-padding big-padding with_background '. $show_readmore .'' ); ?>>
		<?php
		dotdigital_post_thumbnail();
	endif; //small_format check
	?>

	<div class="item-content text-center">

        <header class="entry-header">
            <div class="entry-date">
				<?php
				if ( 'post' == get_post_type() ) {
					dotdigital_posted_on();
				}
				?>
            </div><!-- .entry-date -->
			<?php
			the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
			?>
        </header><!-- .entry-header -->

		<?php if ( is_search() ) : ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content">
				<?php the_excerpt(); ?>
				<?php
				wp_link_pages( array(
					'before'      => '<div class="page-links topmargin_30"><span class="page-links-title">' . esc_html__( 'Pages:', 'dotdigital' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
				?>
			</div><!-- .entry-content -->
		<?php endif; ?>
	</div><!-- eof .item-content -->
	<?php if ( $small_layout ) : //additional markup for small format post  ?>
	</div><!-- eof .col-md-6 -->
	</div><!-- eof .row -->
	</div><!-- eof .side-item -->
<?php endif; //small_format 
	?>
	</article><!-- #post-## -->

<?php endif;  //is singular ?>