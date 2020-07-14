<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//custom template parts

//header that already chosen in customizer
$header_from_customizer = '1';
if ( function_exists( 'fw_get_db_customizer_option' ) ) {
	$header_from_customizer = fw_get_db_customizer_option( 'header' );
	if ( empty ( $header_from_customizer ) ) {
		$header_from_customizer = '1';
	}
} else {
	$header_from_customizer = '1';
}


$options = array(
	'page-options-section' => array(
		'title'   => esc_html__( 'Additional Options', 'dotdigital' ),
		'type'    => 'box',
		'context' => 'normal',
		'options' => array(
		),
	),

);


//page slider
$slider_extension = fw()->extensions->get( 'slider' );
//returning if no slider - only options for page is slider options
if ( empty ( $slider_extension ) ) {
	return;
}

$choices = '';
if ( ! empty ( $slider_extension ) ) {
	$choices = $slider_extension->get_populated_sliders_choices();
}

if ( ! empty( $choices ) ) {
	//adding empty value to disable slider
	$choices['0'] = esc_html__( 'No Slider', 'dotdigital' );

	array_push( $options['page-options-section']['options'], array(
			'slider_id' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Select Slider', 'dotdigital' ),
				'choices' => $choices
			),
		)
	);
} else {
	array_push( $options['page-options-section']['options'], array(
			'slider_id' => array( // make sure it exists to prevent notices when try to get ['slider_id'] somewhere in the code
				'type' => 'hidden',
			),
			'no-forms'  => array(
				'type'  => 'html-full',
				'label' => false,
				'desc'  => false,
				'html'  =>
					'<div>' .
					'<h1 style="font-weight:100; text-align:center;">' . esc_html__( 'No Sliders Available', 'dotdigital' ) . '</h1>' .
					'<p style="text-align:center">' .
					'<em>' .
					str_replace(
						array(
							'{br}',
							'{add_slider_link}'
						),
						array(
							'<br/>',
							fw_html_tag( 'a', array(
								'href'   => admin_url( 'post-new.php?post_type=' . fw()->extensions->get( 'slider' )->get_post_type() ),
								'target' => '_blank',
							), esc_html__( 'create a new Slider', 'dotdigital' ) )
						),
						esc_html__( 'No Sliders created yet. Please go to the {br}Sliders page and {add_slider_link}.', 'dotdigital' )
					) .
					'</em>' .
					'</p>' .
					'</div>'
			)
		)
	);
}