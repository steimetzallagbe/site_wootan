<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 * @var array $posts
 */

//column paddings class
//margin values:
//0
//1
//2
//10
//30
$margin_class = '';
switch ( $atts['margin'] ) :
	case ( 0 ) :
		$margin_class = 'c-gutter-0 c-mb-0';
		break;

	case ( 1 ) :
		$margin_class = 'c-gutter-1 c-mb-1';
		break;

	case ( 2 ) :
		$margin_class = 'c-gutter-2 c-mb-2';
		break;

	case ( 10 ) :
		$margin_class = 'c-gutter-10 c-mb-10';
		break;

	case ( 30 ) :
		$margin_class = 'c-gutter-30 c-mb-30';
		break;

	case ( 60 ) :
		$margin_class = 'c-gutter-60 c-mb-60';
		break;
	//6
	default:
		$margin_class = 'c-gutter-15 c-mb-15';
endswitch;

$unique_id = uniqid();
?>
<div class="shortcode-posts tiled-layout <?php echo esc_attr( $margin_class ); ?>">
	<?php
	$i = 0;
	while ( $posts->have_posts() ) : $posts->the_post();
		$post_terms       = get_the_terms( get_the_ID(), 'category' );
		$post_terms_class = '';
		if ( ! empty ( $post_terms ) ) :
			foreach ( $post_terms as $post_term ) :
				$post_terms_class .= $post_term->slug . ' ';
			endforeach;
		endif;

		$count = $posts->post_count;

		$terms = get_the_terms( get_the_ID(), 'category' );

		$i ++;
		if ( $i == 1 ) {
		    echo '<div class="bigitem col-lg-6 col-md-12 col-sm-12 col-xs-12">';
			    include DOTDIGITAL_THEME_PATH . '/framework-customizations/extensions/shortcodes/shortcodes/posts/views/item-tiled.php';
			echo '</div>';
		} elseif ( $count >= 3 ) {
			if ( $i == 2 ) {
				echo '<div class="smallitem col-lg-6 col-md-12 col-sm-12 col-xs-12">';
			}
			include DOTDIGITAL_THEME_PATH . '/framework-customizations/extensions/shortcodes/shortcodes/posts/views/item-tiled2.php';
			if ( $i == 3 ) {
				echo '</div>';
			}
		} elseif ( $count < 3 ) {
			echo '<div class="bigitem col-lg-6 col-md-12 col-sm-12 col-xs-12">';
			    include DOTDIGITAL_THEME_PATH . '/framework-customizations/extensions/shortcodes/shortcodes/posts/views/item-tiled.php';
			echo '</div>';
        } else {
			echo '<div class="smallitem col-lg-6 col-md-12 col-sm-12 col-xs-12">';
			include DOTDIGITAL_THEME_PATH . '/framework-customizations/extensions/shortcodes/shortcodes/posts/views/item-tiled2.php';
			echo '</div>';
        }
	endwhile;
	?>
	<?php wp_reset_postdata(); // reset the query ?>
</div><!-- eof .istotpe-wrapper -->
