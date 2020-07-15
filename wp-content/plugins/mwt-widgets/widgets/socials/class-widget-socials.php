<?php if ( ! defined( 'ABSPATH' ) ) {
	die();
}
if ( ( defined( 'FW' ) ) && ! ( class_exists( 'Dotdigital_Widget_Socials' ) ) ) :

	class Dotdigital_Widget_Socials extends WP_Widget {

		/**
		 * Widget constructor.
		 */
		private $options;
		private $prefix;

		function __construct() {

			$widget_ops = array(
				'classname'   => 'widget_socials',
				'description' => esc_html__( 'Add socials links', 'dotdigital' ),
			);

			parent::__construct( false, esc_html__( 'Theme - Socials', 'dotdigital' ), $widget_ops );

			//Create our options by using Unyson option types
			$this->options = array(
				'title'        => array(
					'type'  => 'text',
					'label' => esc_html__( 'Widget Title', 'dotdigital' ),
				),
				'icon_style'        => array(
					'type'    => 'select',
					'value'   => 'color-icon',
					'label' => esc_html__( 'Icons style', 'dotdigital' ),
					'choices' => array(
						'color-icon' => esc_html__( 'Color Icon', 'dotdigital' ),
						'color-icon border-icon rounded-icon' => esc_html__( 'Bordered Icons', 'dotdigital' ),
						'color-bg-icon rounded-icon'  => esc_html__( 'Color Background Icons', 'dotdigital' ),
                        'color-icon bg-icon rounded-icon'     => esc_html__( 'Color Light Background Rounded Icon', 'dotdigital' ),
					),
				),
				'social_icons' => array(
					'type'          => 'addable-popup',
					'label'         => esc_html__( 'Icons in list', 'dotdigital' ),
					'popup-title'   => esc_html__( 'Add/Edit Icons in list', 'dotdigital' ),
					'desc'          => esc_html__( 'Create your tabs', 'dotdigital' ),
					'template'      => '{{=icon_title}}',
					'popup-options' => array(
						'icon_title'      => array(
							'label' => esc_html__( 'Social Title', 'dotdigital' ),
							'desc'  => esc_html__( 'Enter the title', 'dotdigital' ),
							'type'  => 'text',
							'value' => esc_html__( '', 'dotdigital' ),
						),
						'icon_class' => array(
							'type'  => 'icon',
							'label' => esc_html__( 'Social Icon', 'dotdigital' ),
							'set'   => 'social-icons',
						),
						'icon_link'  => array(
							'type'  => 'text',
							'value' => '',
							'label' => esc_html__( 'Social URL', 'dotdigital' ),
						),
					),
				),
			);
			$this->prefix  = 'widget_socials';
		}

		function widget( $args, $instance ) {
			extract( wp_parse_args( $args ) );

			$params = array();

			foreach ( $instance as $key => $value ) {
				$params[ $key ] = $value;
			}

			$instance = $params;

			$filepath = get_template_directory() . '/inc/widgets/socials/views/widget.php';

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

endif;