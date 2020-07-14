<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );

$options = array(
    'items'         => array(
        'type'            => 'addable-box',
        'value'           => '',
        'label'           => esc_html__( 'Carousel items', 'dotdigital' ),
        'box-options'     => array(
            'media_video'    => array(
                'type'    => 'oembed',
                'value'   => '',
                'label'   => esc_html__( 'Video', 'dotdigital' ),
                'desc'    => esc_html__( 'Adds video player', 'dotdigital' ),
                'preview' => array(
                    'width'      => 350, // optional, if you want to set the fixed width to iframe
                    'height'     => 250, // optional, if you want to set the fixed height to iframe
                    /**
                     * if is set to false it will force to fit the dimensions,
                     * because some widgets return iframe with aspect ratio and ignore applied dimensions
                     */
                    'keep_ratio' => true
                ),
            ),
            'media_image'    => array(
                'type'        => 'upload',
                'value'       => array(),
                'label'       => esc_html__( 'Side media image', 'dotdigital' ),
                'desc'        => esc_html__( 'Select image that you want to appear as one half side image', 'dotdigital' ),
                'images_only' => true,
            ),
        ),
        'template'        => '{{=media_video}}',
        'limit'           => 0, // limit the number of boxes that can be added
        'add-button-text' => esc_html__( 'Add', 'dotdigital' ),
        'sortable'        => true,
    ),
);
