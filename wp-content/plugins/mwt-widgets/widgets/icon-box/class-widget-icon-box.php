<?php if ( defined( 'FW' ) ) {

	class Dotdigital_Widget_Icon_Box extends WP_Widget {

		/**
		 * Widget constructor.
		 */
		private $options;
		private $prefix;

		function __construct() {

			$widget_ops = array(
				'classname'   => 'widget_icon_box',
				'description' => esc_html__( 'Add icons with title', 'dotdigital' ),
			);

			parent::__construct( false, esc_html__( 'Theme - Icon Box', 'dotdigital' ), $widget_ops );

			//Create our options by using Unyson option types
			$this->options = array(
				'title' => array(
					'type'  => 'text',
					'label' => esc_html__( 'Widget Title', 'dotdigital' ),
				),
                'title_box' => array(
                    'type'  => 'text',
                    'label' => esc_html__( 'Box Title', 'dotdigital' ),
                ),
                'link'         => array(
                    'type'  => 'text',
                    'value' => '#',
                    'label' => esc_html__( 'Box link', 'dotdigital' ),
                    'desc'  => esc_html__( 'Link on title and optional button', 'dotdigital' ),
                ),
                'box_type' => array(
                    'type'    => 'short-select',
                    'value'   => 'icon_top',
                    'label'   => esc_html__( 'Box Type', 'dotdigital' ),
                    'desc'    => esc_html__( 'Select one of predefined box types', 'dotdigital' ),
                    'choices' => array(
                        'icon_top'      => esc_html__('Icon top', 'dotdigital'),
                        'icon_left'     => esc_html__('Icon left', 'dotdigital'),
                        'icon_right'    => esc_html__('Icon right', 'dotdigital'),
                    ),
                    'blank'   => false, // (optional) if true, images can be deselected
                ),
                'box_icon'       => array(
                    'type'         => 'icon-v2',
                    'label' => esc_html__( 'Box icon', 'dotdigital' ),
                    'desc'  => esc_html__( 'Choose box icon', 'dotdigital' ),
                ),
                'icon_type'       => array(
                    'label'   => esc_html__('Icon type', 'dotdigital'),
                    'type'    => 'short-select',
                    'value'   => '',
                    'choices' => array(
                        ''  => esc_html__('Type 1', 'dotdigital'),
                        'type_2' => esc_html__('Type 2', 'dotdigital'),
                    ),
                ),
                'content'      => array(
                    'type'  => 'textarea',
                    'label' => esc_html__( 'Box text', 'dotdigital' ),
                    'desc'  => esc_html__( 'Enter desired box content', 'dotdigital' ),
                ),
                'block_item'       => array(
                    'type'         => 'switch',
                    'label'        => esc_html__( 'Block item', 'dotdigital' ),
                    'desc'         => esc_html__( 'Make icon box as block item with background?', 'dotdigital' ),
                    'value'        => '',
                    'right-choice' => array(
                        'value' => 'block-item',
                        'label' => esc_html__( 'Yes', 'dotdigital' ),
                    ),
                    'left-choice'  => array(
                        'value' => '',
                        'label' => esc_html__( 'No', 'dotdigital' ),
                    ),
                ),
                'custom_class' => array(
                    'label' => esc_html__('Custom Class', 'dotdigital'),
                    'desc'  => esc_html__('Add custom class', 'dotdigital'),
                    'type'  => 'text',
                )
			);
			$this->prefix  = 'widget_icon_box';
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