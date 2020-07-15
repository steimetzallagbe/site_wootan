<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'      => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Box title', 'dotdigital' ),
	),
	'title_link' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Box title link', 'dotdigital' ),
	),
	'box_icon'   => array(
		'type'         => 'icon-v2',
		/**
		 * small | medium | large | sauron
		 * Yes, sauron. Definitely try it. Great one.
		 */
		'preview_size' => 'medium',
		/**
		 * small | medium | large
		 */
		'modal_size'   => 'medium',
		'label' => esc_html__( 'Box icon', 'dotdigital' ),
		'desc'  => esc_html__( 'Choose box icon', 'dotdigital' ),
	),
	'features'   => array(
		'type'            => 'addable-box',
		'value'           => '',
		'label'           => esc_html__( 'Info box features', 'dotdigital' ),
		'box-options'     => array(
			'feature_name'    => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Feature name', 'dotdigital' ),
			),
		),
		'template'        => '{{=feature_name}}',
		'limit'           => 0, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'dotdigital' ),
		'sortable'        => true,
	),
);