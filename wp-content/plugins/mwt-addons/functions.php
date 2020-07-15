<?php
// FW icon type-v2 process
if ( ! function_exists( 'dotdigital_get_icon_type_v2_html' ) ) :
    function dotdigital_get_icon_type_v2_html($icon_array) {
        $icon_html ='';
        $box_icon_type = ! empty( $icon_array['type']) ? $icon_array['type'] : '';
        if ( $box_icon_type === 'icon-font' ) {
            if ( $icon_array['icon-class'] !== '' ) {
                $icon_html = '<i class="' . $icon_array['icon-class'] . '"></i>';
            }
        } elseif ( $box_icon_type === 'custom-upload' ) {
            $icon_html = '<img src="' . $icon_array['url'] . '" alt="' . $icon_array['attachment-id'] . '">';
        }
        if(! empty( $icon_html)) {
            return $icon_html;
        } else {
            false;
        }
    }
endif;
?>