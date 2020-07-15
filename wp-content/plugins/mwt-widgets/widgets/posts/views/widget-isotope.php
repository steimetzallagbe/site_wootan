<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * @var string $before_widget
 * @var string $after_widget
 * @var int $number
 * @var int $margin
 * @var string $layout
 * @var bool $show_filters
 * @var string $item_layout
 * @var int $responsive_lg
 * @var int $responsive_md
 * @var int $responsive_sm
 * @var int $responsive_xs
 * @var array $posts
 */

//1 - col-*-12
//2 - col-*-6
//3 - col-*-4
//4 - col-*-3
//6 - col-*-2

//bootstrap col-lg-* class
$lg_class = '';
switch ( $responsive_lg ) :
	case ( 1 ) :
		$lg_class = 'col-lg-12';
		break;

	case ( 2 ) :
		$lg_class = 'col-lg-6';
		break;

	case ( 3 ) :
		$lg_class = 'col-lg-4';
		break;

	case ( 4 ) :
		$lg_class = 'col-lg-3';
		break;
	//6
	default:
		$lg_class = 'col-lg-2';
endswitch;

//bootstrap col-md-* class
$md_class = '';
switch ( $responsive_md ) :
	case ( 1 ) :
		$md_class = 'col-md-12';
		break;

	case ( 2 ) :
		$md_class = 'col-md-6';
		break;

	case ( 3 ) :
		$md_class = 'col-md-4';
		break;

	case ( 4 ) :
		$md_class = 'col-md-3';
		break;
	//6
	default:
		$md_class = 'col-md-2';
endswitch;

//bootstrap col-sm-* class
$sm_class = '';
switch ( $responsive_sm ) :
	case ( 1 ) :
		$sm_class = 'col-sm-12';
		break;

	case ( 2 ) :
		$sm_class = 'col-sm-6';
		break;

	case ( 3 ) :
		$sm_class = 'col-sm-4';
		break;

	case ( 4 ) :
		$sm_class = 'col-sm-3';
		break;
	//6
	default:
		$sm_class = 'col-sm-2';
endswitch;

//bootstrap col-xs-* class
$xs_class = '';
switch ( $responsive_xs ) :
	case ( 1 ) :
		$xs_class = 'col-xs-12';
		break;

	case ( 2 ) :
		$xs_class = 'col-xs-6';
		break;

	case ( 3 ) :
		$xs_class = 'col-xs-4';
		break;

	case ( 4 ) :
		$xs_class = 'col-xs-3';
		break;
	//6
	default:
		$xs_class = 'col-xs-2';
endswitch;

//column paddings class
//margin values:
//0
//1
//2
//10
//30
$margin_class = '';
switch ( $margin ) :
	case ( 0 ) :
		$margin_class = 'columns_padding_0';
		break;

	case ( 1 ) :
		$margin_class = 'columns_padding_1';
		break;

	case ( 2 ) :
		$margin_class = 'columns_padding_2';
		break;

	case ( 10 ) :
		$margin_class = 'columns_padding_5';
		break;
	//6
	default:
		$margin_class = 'columns_padding_15';
endswitch;

$unique_id = uniqid();

echo wp_kses_post( $before_widget );

if ( $title ) :
	echo wp_kses_post( $before_title . $title . $after_title );
endif; //title

if ( $show_filters ) :
	//get unique terms only for posts that are showing
	$showing_terms = array();
	foreach ( $posts->posts as $post ) {
		foreach ( get_the_terms( $post->ID, 'category' ) as $post_term ) {
			$showing_terms[ $post_term->term_id ] = $post_term;
		}
	}
	?>
	<div class="filters isotope_filters-<?php echo esc_attr( $unique_id ); ?> text-center">
		<a href="#" data-filter="*" class="selected"><?php esc_html_e( 'All', 'dotdigital' ); ?></a>
		<?php
		foreach ( $showing_terms as $term_key => $term_id ) {
			$current_term = get_term( $term_id, 'category' );
			?>
			<a href="#"
			   data-filter=".<?php echo esc_attr( $current_term->slug ); ?>"><?php echo esc_html( $current_term->name ); ?></a>
			<?php
		} //foreach
		?>
	</div>
	<?php
endif; //showfilters check
?>
<div class="widget-posts">
	<div class="<?php echo esc_attr( $margin_class ); ?>">
		<div class="isotope_container isotope row masonry-layout"
		     data-filters=".isotope_filters-<?php echo esc_attr( $unique_id ); ?>">
			<?php while ( $posts->have_posts() ) : $posts->the_post();
				$post_terms       = get_the_terms( get_the_ID(), 'category' );
				$post_terms_class = '';
				foreach ( $post_terms as $post_term ) {
					$post_terms_class .= $post_term->slug . ' ';
				}
				?>
				<div
					class="isotope-item <?php echo esc_attr( 'item-layout-' . $item_layout . ' ' . $lg_class . ' ' . $md_class . ' ' . $sm_class . ' ' . $xs_class . ' ' . $post_terms_class ); ?>">
                    <?php
                    //include item layout view file. If no thumbnail - layout is always extended
                    $filepath  = MWT_WIDGETS_PLUGIN_PATH . '/widgets/posts/views/widget-item-' . $item_layout . '.php';
                    if ( ! ( has_post_thumbnail() ) ) {
                        $filepath  = MWT_WIDGETS_PLUGIN_PATH . '/widgets/posts/views/widget-item-extended.php';
                    }
                    if ( file_exists( $filepath ) ) {
                        include( $filepath );
                    } else {
                        $filepath = plugin_dir_path( __FILE__ ) . 'widget-item-' . $item_layout . '.php';
                        if ( ! ( has_post_thumbnail() ) ) {
                            $filepath = plugin_dir_path( __FILE__ ) . 'widget-item-extended.php';
                        }
                        if ( file_exists( $filepath ) ) {
                            include( $filepath );
                        } else {
                            _e( 'View not found', 'mwt' );
                        }
                    }
                    ?>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); // reset the query ?>
		</div><!-- eof .isotope_container -->
	</div><!-- eof .columns_padding_* -->
<?php echo wp_kses_post( $after_widget ); ?>
</div>
