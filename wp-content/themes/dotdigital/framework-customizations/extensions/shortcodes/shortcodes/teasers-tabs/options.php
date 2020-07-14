<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$teaser = fw_ext( 'shortcodes' )->get_shortcode( 'teaser' );

$options = array(
	'tabs'       => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'dotdigital' ),
		'popup-title'   => esc_html__( 'Add/Edit Tabs', 'dotdigital' ),
		'desc'          => esc_html__( 'Create your tabs', 'dotdigital' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'           => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'dotdigital' )
			),
			'tab_columns_width'   => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Column width in tab content', 'dotdigital' ),
				'value'   => 'col-sm-4',
				'desc'    => esc_html__( 'Choose teaser width inside tab content', 'dotdigital' ),
				'choices' => array(
					'col-sm-12' => esc_html__( '1/1', 'dotdigital' ),
					'col-sm-6'  => esc_html__( '1/2', 'dotdigital' ),
					'col-sm-4'  => esc_html__( '1/3', 'dotdigital' ),
					'col-sm-3'  => esc_html__( '1/4', 'dotdigital' ),
				),
			),
			'tab_columns_padding' => array(
				'type'    => 'select',
				'value'   => 'columns_padding_15',
				'label'   => esc_html__( 'Column paddings', 'dotdigital' ),
				'desc'    => esc_html__( 'Choose columns horizontal paddings value', 'dotdigital' ),
				'choices' => array(
					'columns_padding_0'  => esc_html__( '0', 'dotdigital' ),
					'columns_padding_1'  => esc_html__( '1 px', 'dotdigital' ),
					'columns_padding_2'  => esc_html__( '2 px', 'dotdigital' ),
					'columns_padding_5'  => esc_html__( '5 px', 'dotdigital' ),
					'columns_padding_15' => esc_html__( '15 px - default', 'dotdigital' ),
					'columns_padding_25' => esc_html__( '25 px', 'dotdigital' ),
				),
			),
			'tab_teasers'         => array(
				'type'          => 'addable-popup',
				'label'         => esc_html__( 'Teasers in tabs', 'dotdigital' ),
				'popup-title'   => esc_html__( 'Add/Edit Teasers in tabs', 'dotdigital' ),
				'desc'          => esc_html__( 'Create your teasers in tabs', 'dotdigital' ),
				'template'      => '{{=title}}',
				'popup-options' => $teaser->get_options(),

			),
		),

	),
	'top_border' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Top color border', 'dotdigital' ),
		'desc'         => esc_html__( 'Add top color border to tab content', 'dotdigital' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No top border', 'dotdigital' ),
		),
		'right-choice' => array(
			'value' => 'top-color-border',
			'label' => esc_html__( 'Color top border', 'dotdigital' ),
		),
	),
	'id'         => array( 'type' => 'unique' ),
);