<?php if ( defined( 'FW' ) ) {

	class Dotdigital_Widget_Icons_List extends WP_Widget {

		/**
		 * Widget constructor.
		 */
		private $options;
		private $prefix;

		function __construct() {

			$widget_ops = array(
				'classname'   => 'widget_icons_list',
				'description' => esc_html__( 'Add icons with title', 'dotdigital' ),
			);

			parent::__construct( false, esc_html__( 'Theme - Icons list', 'dotdigital' ), $widget_ops );

			//Create our options by using Unyson option types
			$this->options = array(
				'title' => array(
					'type'  => 'text',
					'label' => esc_html__( 'Widget Title', 'dotdigital' ),
				),
				'icons' => array(
					'type'          => 'addable-popup',
					'label'         => esc_html__( 'Icons in list', 'dotdigital' ),
					'popup-title'   => esc_html__( 'Add/Edit Icons in list', 'dotdigital' ),
					'desc'          => esc_html__( 'Create your tabs', 'dotdigital' ),
					'template'      => '{{=icon_title}}',
					'popup-options' => array(
						'icon_class' => array(
							'type'  => 'icon',
							'value' => '',
							'label' => esc_html__( 'Icon', 'dotdigital' )
						),
						'icon_title'      => array(
							'label' => esc_html__( 'Title', 'dotdigital' ),
							'desc'  => esc_html__( 'Enter the icon title', 'dotdigital' ),
							'type'  => 'text',
							'value' => esc_html__( '', 'dotdigital' ),
						),
					)
				),
			);
			$this->prefix  = 'widget_icons_list';
		}

		function widget( $args, $instance ) {
			extract( wp_parse_args( $args ) );

			$params = array();

			foreach ( $instance as $key => $value ) {
				$params[ $key ] = $value;
			}

			$instance = $params;

			$filepath = get_template_directory() . '/inc/widgets/icons-list/views/widget.php';

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

		function update( $new_instance, $old_instance ) {
			return fw_get_options_values_from_input(
				$this->options,
				FW_Request::POST( fw_html_attr_name_to_array_multi_key( $this->get_field_name( $this->prefix ) ), array() )
			);
		}

		function form( $values ) {

			$prefix = $this->get_field_id( $this->prefix ); // Get unique prefix, preventing duplicated key
			$id     = 'fw-widget-options-' . $prefix;

			// Print our options
			echo '<div class="fw-force-xs fw-theme-admin-widget-wrap fw-framework-widget-options-widget" data-fw-widget-id="' . esc_attr( $id ) . '" id="' . esc_attr( $id ) . '">';

			echo fw()->backend->render_options( $this->options, $values, array(
				'id_prefix'   => $prefix . '-',
				'name_prefix' => $this->get_field_name( $this->prefix ),
			) );
			echo '</div>';

			return $values;
		}
	}
}