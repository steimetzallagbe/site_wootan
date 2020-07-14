<?php
/**
 * Template Name: FullPage
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

<?php if ( ! defined( 'FW' ) ) : ?>
<div class="page_content">
	<?php
	endif; //FW check
	// Start the Loop.
	while ( have_posts() ) : the_post();
		// Include the page content template.
		if ( is_search() ) : ?>
            <div class="entry-summary">
				<?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
		<?php
		else : ?>
            <div id="fullpage" class="fullpage-wrapper">
				<?php
				//hidding "more link" in content
				the_content(); ?>
            </div>
			<?php	wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'dotdigital' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		endif; //is_search
	endwhile;
	if ( ! defined( 'FW' ) ) : ?>
</div>
<?php
endif; //FW check
get_footer();