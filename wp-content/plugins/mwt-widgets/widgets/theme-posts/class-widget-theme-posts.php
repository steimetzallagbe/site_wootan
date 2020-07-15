<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

if ( class_exists( 'Dotdigital_Widget_Theme_Posts' ) ) {
	return;
}

class Dotdigital_Widget_Theme_Posts extends WP_Widget {
	/**
	 * Sets up a new Theme Posts widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_popular_entries theme_posts',
			'description' => esc_html__( 'Most Recent or Popular Posts with Images, Date and Excerpt', 'dotdigital' ),
		);
		parent::__construct( false, esc_html__( 'Theme - Posts', 'dotdigital' ), $widget_ops );
	}

	/**
	 * Outputs the content for the current Theme Posts widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $args Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Theme Posts widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Theme Posts', 'dotdigital');

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3;
		if ( ! $number ) {
			$number = 3;
		}

		$sort = isset( $instance['sort'] ) ? $instance['sort'] : 'recent';

		$show_media = isset( $instance['show_media'] ) ? $instance['show_media'] : true;
		$show_excerpt = isset( $instance['show_excerpt'] ) ? $instance['show_excerpt'] : false;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		$show_author = isset( $instance['show_author'] ) ? $instance['show_author'] : false;
		$show_tags = isset( $instance['show_tags'] ) ? $instance['show_tags'] : false;
		$show_comments = isset( $instance['show_comments'] ) ? $instance['show_comments'] : false;

		/**
		 * Filters the arguments for the Theme Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the Theme Posts.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'orderby'             => $sort,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
			'tax_query' => array(
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => array( 'post-format-quote', 'post-format-status', 'post-format-link', 'post-format-aside', 'post-format-chat' ),
					'operator' => 'NOT IN'
				)
			)
		) ) );

		$filepath = get_template_directory() . '/inc/widgets/theme-posts/views/widget.php';

		if ( file_exists( $filepath ) ) {
			include( $filepath );
		} else {
            $filepath = plugin_dir_path( __FILE__ ) . 'views/widget.php';
            if ( file_exists( $filepath ) ) {
                include( $filepath );
            } else {
                _e( 'View not found', 'dotdigital' );
            }
		}
	}

	/**
	 * Handles updating the settings for the current Theme Posts widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 *
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = sanitize_text_field( $new_instance['title'] );
		$instance['sort']     = sanitize_text_field( $new_instance['sort'] );
		$instance['number']    = (int) $new_instance['number'];
		$instance['show_media'] = isset( $new_instance['show_media'] ) ? (bool) $new_instance['show_media'] : false;
		$instance['show_excerpt'] = isset( $new_instance['show_excerpt'] ) ? (bool) $new_instance['show_excerpt'] : false;
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['show_author'] = isset( $new_instance['show_author'] ) ? (bool) $new_instance['show_author'] : false;
		$instance['show_tags'] = isset( $new_instance['show_tags'] ) ? (bool) $new_instance['show_tags'] : false;
		$instance['show_comments'] = isset( $new_instance['show_comments'] ) ? (bool) $new_instance['show_comments'] : false;

		return $instance;
	}

	/**
	 * Outputs the settings form for the Theme Posts widget.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : esc_html__( 'Theme Posts', 'dotdigital');
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
		$sort = isset( $instance['sort'] ) ? $instance['sort'] : 'recent';
		$show_media = isset( $instance['show_media'] ) ? (bool) $instance['show_media'] : true;
		$show_excerpt = isset( $instance['show_excerpt'] ) ? (bool) $instance['show_excerpt'] : false;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : true;
		$show_author = isset( $instance['show_author'] ) ? (bool) $instance['show_author'] : true;
		$show_tags = isset( $instance['show_tags'] ) ? (bool) $instance['show_tags'] : true;
		$show_comments = isset( $instance['show_comments'] ) ? (bool) $instance['show_comments'] : true;
		?>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'dotdigital' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"
			       name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>"/>
		</p>

		<p><label
				for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number of posts to show:', 'dotdigital' ); ?></label>
			<input class="tiny-text" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"
			       name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1"
			       value="<?php echo esc_attr($number); ?>" size="3"/></p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'sort' ) ); ?>"><?php esc_html_e( 'Order by:', 'dotdigital' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'sort' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'sort' ) ); ?>" class="widefat">
				<option value="carousel" <?php selected( $sort, 'carousel' ); ?> ><?php esc_html_e( 'Random', 'dotdigital' ) ?></option>
				<option value="recent" <?php selected( $sort, 'recent'); ?>><?php esc_html_e( 'Recent', 'dotdigital' ); ?></option>
				<option value="comment_count" <?php selected( $sort, 'comment_count'); ?>><?php esc_html_e( 'Popular', 'dotdigital' ); ?></option>
			</select>
		</p>

		<p><input class="checkbox" type="checkbox"<?php checked( $show_media ); ?>
		          id="<?php echo esc_attr($this->get_field_id( 'show_media' )); ?>"
		          name="<?php echo esc_attr($this->get_field_name( 'show_media' )); ?>"/>
			<label for="<?php echo esc_attr($this->get_field_id( 'show_media' )); ?>"><?php esc_html_e( 'Display post media?', 'dotdigital' ); ?></label>
		</p>
		<p><input class="checkbox" type="checkbox"<?php checked( $show_excerpt ); ?>
		          id="<?php echo esc_attr($this->get_field_id( 'show_excerpt' )); ?>"
		          name="<?php echo esc_attr($this->get_field_name( 'show_excerpt' )); ?>"/>
			<label for="<?php echo esc_attr($this->get_field_id( 'show_excerpt' )); ?>"><?php esc_html_e( 'Display post excerpt?', 'dotdigital' ); ?></label>
		</p>
		<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?>
		          id="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>"
		          name="<?php echo esc_attr($this->get_field_name( 'show_date' )); ?>"/>
			<label for="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>"><?php esc_html_e( 'Display post date?', 'dotdigital' ); ?></label>
		</p>
		<p><input class="checkbox" type="checkbox"<?php checked( $show_author ); ?>
		          id="<?php echo esc_attr($this->get_field_id( 'show_author' )); ?>"
		          name="<?php echo esc_attr($this->get_field_name( 'show_author' )); ?>"/>
			<label for="<?php echo esc_attr($this->get_field_id( 'show_author' )); ?>"><?php esc_html_e( 'Display post author?', 'dotdigital' ); ?></label>
		</p>
		<p><input class="checkbox" type="checkbox"<?php checked( $show_tags ); ?>
		          id="<?php echo esc_attr($this->get_field_id( 'show_tags' )); ?>"
		          name="<?php echo esc_attr($this->get_field_name( 'show_tags' )); ?>"/>
			<label for="<?php echo esc_attr($this->get_field_id( 'show_tags' )); ?>"><?php esc_html_e( 'Display post tags?', 'dotdigital' ); ?></label>
		</p>
		<p><input class="checkbox" type="checkbox"<?php checked( $show_comments ); ?>
		          id="<?php echo esc_attr($this->get_field_id( 'show_comments' )); ?>"
		          name="<?php echo esc_attr($this->get_field_name( 'show_comments' )); ?>"/>
			<label for="<?php echo esc_attr($this->get_field_id( 'show_comments' )); ?>"><?php esc_html_e( 'Display comments count?', 'dotdigital' ); ?></label>
		</p>
		<?php
	}
}