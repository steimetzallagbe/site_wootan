<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * @var string $before_widget
 * @var string $after_widget
 * @var array $popular_posts
 */
$unique_id = uniqid();

if ( $r->have_posts() ) :
	?>
	<?php echo wp_kses_post($args['before_widget']); ?>
	<?php if ( $title ) {
	echo wp_kses_post($args['before_title'] . $title . $args['after_title']);
} ?>
	<ul id="theme_posts_<?php echo esc_attr( $unique_id ); ?>" class="media-list">
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<li <?php post_class( 'media' ); ?>>
				<?php if ( has_post_thumbnail() && $show_media ) : ?>
					<a href="<?php the_permalink(); ?>" class="media-left">
						<?php echo get_the_post_thumbnail( get_the_ID(), 'thumbnail' ); ?>
					</a>
				<?php endif; //has_post_thumbnail ?>
				<div class="media-body">
					<h6 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
					<?php
						if ( $show_excerpt ) :
							the_excerpt();
						endif;
					?>
					<div class="item-meta">
						<?php if ( function_exists('dotdigital_posted_on') && $show_date ) : ?>
							<div class="entry-date">
								<?php dotdigital_posted_on(); ?>
							</div>
						<?php endif; ?>
						<?php if ( function_exists('dotdigital_posted_by') && $show_author ) : ?>
							<div class="post-author">
								<?php dotdigital_posted_by(); ?>
							</div>
						<?php endif; ?>
						<?php if ( $show_tags ) : ?>
							<div class="post-tags">
								<?php the_tags( '<span class="tag-links">', ' ', '</span>' ); ?>
							</div>
						<?php endif; ?>

						<?php
						// Set up and print post meta information.
						if ($show_comments && ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
							?>
							<div class="post-comments">
								<span class="comments-link">
									<?php comments_popup_link( esc_html__( '0 Comments', 'dotdigital' ), esc_html__( '1 Comment', 'dotdigital' ), esc_html__( '% Comments', 'dotdigital' ) ); ?>
								</span>
							</div>
						<?php endif; //password	?>
					</div>
				</div>
			</li>
		<?php endwhile; ?>
	</ul>
	<?php echo wp_kses_post($args['after_widget']); ?>
	<?php
	// Reset the global $the_post as this query will have stomped on it
	wp_reset_postdata();

endif;
?>
