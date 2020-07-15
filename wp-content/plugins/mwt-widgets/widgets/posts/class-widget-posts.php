<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

if ( class_exists( 'Dotdigital_Widget_Posts' ) ) {
	return;
}

class Dotdigital_Widget_Posts extends WP_Widget {

	/**
	 * @internal
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_popular_entries',
			'description' => esc_html__( 'Blog posts in carousel or masonry grid', 'dotdigital' ),
		);
		parent::__construct( false, esc_html__( 'Theme - Advanced Blog Posts', 'dotdigital' ), $widget_ops );
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		extract( $args );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title         = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$number        = ( (int) ( $instance['number'] ) > 0 ) ? esc_attr( $instance['number'] ) : 5;
		$margin        = ( (int) ( $instance['margin'] ) >= 0 ) ? esc_attr( $instance['margin'] ) : 30;
		$layout        = esc_html( $instance['layout'] );
		$show_filters  = ! empty( $instance['show_filters'] ) ? true : false;
		$item_layout   = esc_html( $instance['item_layout'] );
		$responsive_lg = ( (int) ( $instance['responsive_lg'] ) > 0 ) ? esc_attr( $instance['responsive_lg'] ) : 4;
		$responsive_md = ( (int) ( $instance['responsive_md'] ) > 0 ) ? esc_attr( $instance['responsive_md'] ) : 3;
		$responsive_sm = ( (int) ( $instance['responsive_sm'] ) > 0 ) ? esc_attr( $instance['responsive_sm'] ) : 2;
		$responsive_xs = ( (int) ( $instance['responsive_xs'] ) > 0 ) ? esc_attr( $instance['responsive_xs'] ) : 1;

		$posts = $this->fw_get_posts_with_info( array(
			'sort'  => 'post_date',
			'items' => $number,
		) );

		//including widget view
		$filepath = get_template_directory() . '/inc/widgets/posts/views/widget-' . $layout . '.php';

		if ( file_exists( $filepath ) ) {
			include( $filepath );
		} else {
            $filepath = plugin_dir_path( __FILE__ ) . 'views/widget-' . $layout . '.php';
            if ( file_exists( $filepath ) ) {
                include( $filepath );
            } else {
                _e( 'View not found', 'dotdigital' );
            }
		}
	}

	/**
	 * @param array $args
	 *
	 * @return array
	 */
	public function fw_get_posts_with_info( $args = array() ) {
		$defaults = array(
			'sort'       => 'recent',
			'items'      => 5,
			'image_post' => true,
			'date_post'  => true,
			'post_type'  => 'post',

		);

		extract( wp_parse_args( $args, $defaults ) );

		$query = new WP_Query( array(
			'post_type'           => $post_type,
			'orderby'             => $sort,
			'order '              => 'DESC',
			'ignore_sticky_posts' => true,
			'posts_per_page'      => $items,
			'tax_query' => array(
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => array( 'post-format-quote', 'post-format-status', 'post-format-link', 'post-format-aside', 'post-format-chat', 'post-format-gallery' ),
					'operator' => 'NOT IN'
				)
			)
		) );

		//wp reset query removed

		return $query;
	}


	/**
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	/**
	 * @param array $instance
	 *
	 * @return string|void
	 */
	public function form( $instance ) {
		$instance      = wp_parse_args( (array) $instance, array(
			'number'        => '4',
			'margin'        => '30',
			'layout'        => 'carousel',
			'show_filters'  => false,
			'item_layout'   => '',
			'responsive_lg' => '4',
			'responsive_md' => '3',
			'responsive_sm' => '2',
			'responsive_xs' => '1',
			'title'         => ''
		) );
		$title         = sanitize_text_field( $instance['title'] );
		$number        = (int) esc_attr( $instance['number'] );
		$margin        = (int) esc_attr( $instance['margin'] );
		$layout        = esc_html( $instance['layout'] );
		$show_filters  = (bool) ( $instance['show_filters'] );
		$item_layout   = esc_html( $instance['item_layout'] );
		$responsive_lg = (int) esc_attr( $instance['responsive_lg'] );
		$responsive_md = (int) esc_attr( $instance['responsive_md'] );
		$responsive_sm = (int) esc_attr( $instance['responsive_sm'] );
		$responsive_xs = (int) esc_attr( $instance['responsive_xs'] );
		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'dotdigital' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of Blog posts', 'dotdigital' ); ?>
				:</label>
			<input type="number" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>"
			       value="<?php echo esc_attr( $number ); ?>"
			       class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>"><?php esc_html_e( 'Gallery layout:', 'dotdigital' ) ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>"
			        name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>">
				<option <?php selected( $layout, 'carousel' ); ?>
					value="carousel"><?php esc_html_e( 'Carousel', 'dotdigital' ) ?></option>
				<option
					<?php selected( $layout, 'isotope' ); ?>value="isotope"><?php esc_html_e( 'Masonry Grid', 'dotdigital' ) ?></option>
			</select>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_filters' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'show_filters' ) ); ?>"<?php checked( $show_filters ); ?> />
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'show_filters' ) ); ?>"><?php esc_html_e( 'Show filters', 'dotdigital' ); ?></label>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'item_layout' ) ); ?>"><?php esc_html_e( 'Gallery Item layout:', 'dotdigital' ) ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'item_layout' ) ); ?>"
			        name="<?php echo esc_attr( $this->get_field_name( 'item_layout' ) ); ?>">
				<option <?php selected( $item_layout, 'regular' ); ?>
					value="regular"><?php esc_html_e( 'Regular (just image)', 'dotdigital' ) ?></option>
				<option
					<?php selected( $item_layout, 'title' ); ?>value="title"><?php esc_html_e( 'Image with title', 'dotdigital' ) ?></option>
				<option <?php selected( $item_layout, 'extended' ); ?>
					value="extended"><?php esc_html_e( 'Image with title and excerpt', 'dotdigital' ) ?></option>
			</select>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'margin' ) ); ?>"><?php esc_html_e( 'Horizontal item margin (px)', 'dotdigital' ); ?>
				:</label>

			<select id="<?php echo esc_attr( $this->get_field_id( 'margin' ) ); ?>"
			        name="<?php echo esc_attr( $this->get_field_name( 'margin' ) ); ?>">
				<option <?php selected( $margin, '0' ); ?> value="0">0</option>
				<option <?php selected( $margin, '1' ); ?> value="1">1px</option>
				<option <?php selected( $margin, '2' ); ?> value="2">2px</option>
				<option <?php selected( $margin, '10' ); ?> value="10">10px</option>
				<option <?php selected( $margin, '30' ); ?> value="30">30px</option>
			</select>

		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'responsive_lg' ) ); ?>"><?php esc_html_e( 'Columns on >1200px screens', 'dotdigital' ); ?>
				:</label>

			<select id="<?php echo esc_attr( $this->get_field_id( 'responsive_lg' ) ); ?>"
			        name="<?php echo esc_attr( $this->get_field_name( 'responsive_lg' ) ); ?>">
				<option <?php selected( $responsive_lg, '1' ); ?> value="1">1</option>
				<option <?php selected( $responsive_lg, '2' ); ?> value="2">2</option>
				<option <?php selected( $responsive_lg, '3' ); ?> value="3">3</option>
				<option <?php selected( $responsive_lg, '4' ); ?> value="4">4</option>
				<option <?php selected( $responsive_lg, '6' ); ?> value="6">6</option>
			</select>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'responsive_md' ) ); ?>"><?php esc_html_e( 'Columns on >992px screens ', 'dotdigital' ); ?>
				:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'responsive_md' ) ); ?>"
			        name="<?php echo esc_attr( $this->get_field_name( 'responsive_md' ) ); ?>">
				<option <?php selected( $responsive_md, '1' ); ?> value="1">1</option>
				<option <?php selected( $responsive_md, '2' ); ?> value="2">2</option>
				<option <?php selected( $responsive_md, '3' ); ?> value="3">3</option>
				<option <?php selected( $responsive_md, '4' ); ?> value="4">4</option>
				<option <?php selected( $responsive_md, '6' ); ?> value="6">6</option>
			</select>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'responsive_sm' ) ); ?>"><?php esc_html_e( 'Columns on >767px screens', 'dotdigital' ); ?>
				:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'responsive_sm' ) ); ?>"
			        name="<?php echo esc_attr( $this->get_field_name( 'responsive_sm' ) ); ?>">
				<option <?php selected( $responsive_sm, '1' ); ?> value="1">1</option>
				<option <?php selected( $responsive_sm, '2' ); ?> value="2">2</option>
				<option <?php selected( $responsive_sm, '3' ); ?> value="3">3</option>
				<option <?php selected( $responsive_sm, '4' ); ?> value="4">4</option>
				<option <?php selected( $responsive_sm, '6' ); ?> value="6">6</option>
			</select>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'responsive_xs' ) ); ?>"><?php esc_html_e( 'Columns on <767px screens', 'dotdigital' ); ?>
				:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'responsive_xs' ) ); ?>"
			        name="<?php echo esc_attr( $this->get_field_name( 'responsive_xs' ) ); ?>">
				<option <?php selected( $responsive_xs, '1' ); ?> value="1">1</option>
				<option <?php selected( $responsive_xs, '2' ); ?> value="2">2</option>
				<option <?php selected( $responsive_xs, '3' ); ?> value="3">3</option>
				<option <?php selected( $responsive_xs, '4' ); ?> value="4">4</option>
				<option <?php selected( $responsive_xs, '6' ); ?> value="6">6</option>
			</select>
		</p>
		<?php
	}
}
