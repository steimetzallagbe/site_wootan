<?php if (!defined('FW')) {
    die('Forbidden');
}
/**
 * @var $atts The shortcode attributes
 */


?>

<?php  if ($atts['price_layout'] == 1) : ?>

<div class="pricing-plan <?php echo esc_attr($atts['featured'] . ' ' . $atts['pattern']); ?> <?php echo esc_attr($atts['background_color']); ?>">
    <?php if (!empty($atts['title'])) : ?>
        <div class="plan-name">
            <h3 class="<?php echo esc_attr($atts['font_color']); ?>">
                <?php echo wp_kses_post($atts['title']); ?>
            </h3>
        </div>
    <?php endif; ?>
    <div class="price-wrap text-center">
        <?php if (!empty($atts['currency'])) : ?>
            <span class="plan-sign"><?php echo wp_kses_post($atts['currency']); ?></span>
        <?php endif; ?>
        <?php if (!empty($atts['price'])) : ?>
            <span class="plan-price"><?php echo wp_kses_post($atts['price']); ?></span>
        <?php endif; ?>
        <?php if (!empty($atts['price_after'])) : ?>
            <span class="plan-decimals">.<?php echo wp_kses_post($atts['price_after']); ?></span>
        <?php endif; ?>
    </div>
    <?php if (!empty($atts['description'])) : ?>
        <div class="plan-description">
            <?php echo wp_kses_post($atts['description']); ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($atts['features'])) : ?>
        <div class="plan-features">
            <ul class="list-unstyled text-center">
                <?php foreach (($atts['features']) as $feature) : ?>
                    <li class="<?php echo esc_attr($feature['feature_checked']); ?>">
                        <?php echo wp_kses_post($feature['feature_name']); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="plan-button <?php echo esc_attr($atts['show_btn']); ?>">
        <a href="<?php echo esc_attr( $atts['link'] ) ?>" target="<?php echo esc_attr( $atts['target'] ) ?>"
           class="wide_button <?php echo esc_attr( $atts['type'] .' '. $atts['color'].' '. $atts['size']); ?>">
            <?php echo wp_kses( $atts['label'], dotdigital_kses_list() ); ?>
        </a>
    </div>
</div>

<?php elseif ($atts['price_layout'] == 2) : ?>

<div class="pricing-plan ls layout-2 <?php echo esc_attr($atts['featured'] . ' ' . $atts['pattern']); ?> <?php echo esc_attr($atts['background_color']); ?>">
    <?php foreach ( $atts['icons'] as $icon ) :
        $icon_array = dotdigital_get_unyson_icon_type_v2_array( $icon, 'icon' );
        $icon_styled_class = dotdigital_get_unyson_icon_styled_class( $icon );
    ?>
    <div class="icon-styled <?php echo esc_attr( $icon_styled_class ); ?>">
        <?php echo wp_kses_post( $icon_array['icon_html'] ); ?>
    </div>
    <?php endforeach;?>
    <?php if (!empty($atts['title'])) : ?>
        <div class="plan-name">
            <h3 class="<?php echo esc_attr($atts['font_color']); ?>">
                <?php echo wp_kses_post($atts['title']); ?>
            </h3>
        </div>
    <?php endif; ?>
    <?php if (!empty($atts['description'])) : ?>
        <div class="plan-description">
            <?php echo wp_kses_post($atts['description']); ?>
        </div>
    <?php endif; ?>
    <div class="price-wrap text-center">
        <?php if (!empty($atts['currency'])) : ?>
            <span class="plan-sign"><?php echo wp_kses_post($atts['currency']); ?></span>
        <?php endif; ?>
        <?php if (!empty($atts['price'])) : ?>
            <span class="plan-price"><?php echo wp_kses_post($atts['price']); ?></span>
        <?php endif; ?>
        <?php if (!empty($atts['price_after'])) : ?>
            <span class="plan-decimals"><?php echo wp_kses_post($atts['price_after']); ?></span>
        <?php endif; ?>
    </div>
    <div class="special-heading text-center">
        <span class="underline divider-20"></span>
    </div>
    <?php if (!empty($atts['features'])) : ?>
        <div class="plan-features">
            <ul class="list-styled">
                <?php foreach (($atts['features']) as $feature) : ?>
                    <li class="<?php echo esc_attr($feature['feature_checked']); ?>">
                        <?php echo wp_kses_post($feature['feature_name']); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="plan-button <?php echo esc_attr($atts['show_btn']); ?>">
        <a href="<?php echo esc_attr( $atts['link'] ) ?>" target="<?php echo esc_attr( $atts['target'] ) ?>"
           class="wide_button <?php echo esc_attr( $atts['type'] .' '. $atts['color'].' '. $atts['size']); ?>">
            <?php echo wp_kses( $atts['label'], dotdigital_kses_list() ); ?>
        </a>
    </div>
</div>

<?php elseif ($atts['price_layout'] == 3) : ?>

<div class="pricing-plan ls layout-3 <?php echo esc_attr($atts['featured'] . ' ' . $atts['pattern']); ?> <?php echo esc_attr($atts['background_color']); ?>">
    <?php foreach ( $atts['icons'] as $icon ) :
        $icon_array = dotdigital_get_unyson_icon_type_v2_array( $icon, 'icon' );
        $icon_styled_class = dotdigital_get_unyson_icon_styled_class( $icon );
        ?>
        <div class="icon-styled <?php echo esc_attr( $icon_styled_class ); ?>">
            <?php echo wp_kses_post( $icon_array['icon_html'] ); ?>
        </div>
    <?php endforeach;?>
    <?php if (!empty($atts['title'])) : ?>
        <div class="plan-name">
            <h3 class="<?php echo esc_attr($atts['font_color']); ?>">
                <?php echo wp_kses_post($atts['title']); ?>
            </h3>
        </div>
    <?php endif; ?>
    <?php if (!empty($atts['description'])) : ?>
        <div class="plan-description">
            <?php echo wp_kses_post($atts['description']); ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($atts['features'])) : ?>
        <div class="plan-features text-center">
            <ul class="list-styled">
                <?php foreach (($atts['features']) as $feature) : ?>
                    <li class="<?php echo esc_attr($feature['feature_checked']); ?>">
                        <?php echo wp_kses_post($feature['feature_name']); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="price-wrap text-center">
        <?php if (!empty($atts['price_after'])) : ?>
            <span class="plan-decimals d-block"><?php echo wp_kses_post($atts['price_after']); ?></span>
        <?php endif; ?>
        <?php if (!empty($atts['price'])) : ?>
            <span class="plan-price"><?php echo wp_kses_post($atts['price']); ?></span>
        <?php endif; ?>
        <?php if (!empty($atts['currency'])) : ?>
            <span class="plan-sign"><?php echo wp_kses_post($atts['currency']); ?></span>
        <?php endif; ?>
    </div>
    <div class="plan-button <?php echo esc_attr($atts['show_btn']); ?>">
        <a href="<?php echo esc_attr( $atts['link'] ) ?>" target="<?php echo esc_attr( $atts['target'] ) ?>"
           class="wide_button <?php echo esc_attr( $atts['type'] .' '. $atts['color'].' '. $atts['size']); ?>">
            <?php echo wp_kses( $atts['label'], dotdigital_kses_list() ); ?>
        </a>
    </div>
</div>

<?php  elseif ($atts['price_layout'] == 4) : ?>

<div class="pricing-plan layout-4 <?php echo esc_attr($atts['featured'] . ' ' . $atts['pattern']); ?> <?php echo esc_attr($atts['background_color']); ?>">
        <?php if (!empty($atts['title'])) : ?>
            <div class="plan-name">
                <h3 class="<?php echo esc_attr($atts['font_color']); ?>">
                    <?php echo wp_kses_post($atts['title']); ?>
                </h3>
            </div>
        <?php endif; ?>
        <div class="price-wrap text-center">
            <?php if (!empty($atts['currency'])) : ?>
                <span class="plan-sign"><?php echo wp_kses_post($atts['currency']); ?></span>
            <?php endif; ?>
            <?php if (!empty($atts['price'])) : ?>
                <span class="plan-price"><?php echo wp_kses_post($atts['price']); ?></span>
            <?php endif; ?>
            <?php if (!empty($atts['price_after'])) : ?>
                <p class="plan-decimals"><?php echo wp_kses_post($atts['price_after']); ?></p>
            <?php endif; ?>
        </div>
        <?php if (!empty($atts['description'])) : ?>
            <div class="plan-description">
                <?php echo wp_kses_post($atts['description']); ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($atts['features'])) : ?>
            <div class="plan-features text-center">
                <ul class="list-unstyled">
                    <?php foreach (($atts['features']) as $feature) : ?>
                        <li class="<?php echo esc_attr($feature['feature_checked']); ?>">
                            <?php echo wp_kses_post($feature['feature_name']); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="plan-button <?php echo esc_attr($atts['show_btn']); ?>">
            <a href="<?php echo esc_attr( $atts['link'] ) ?>" target="<?php echo esc_attr( $atts['target'] ) ?>"
               class="wide_button <?php echo esc_attr( $atts['type'] .' '. $atts['color'].' '. $atts['size']); ?>">
                <?php echo wp_kses( $atts['label'], dotdigital_kses_list() ); ?>
            </a>
        </div>
    </div>

<?php  elseif ($atts['price_layout'] == 5) : ?>

<div class="pricing-plan layout-5 <?php echo esc_attr($atts['featured'] . ' ' . $atts['pattern']); ?> <?php echo esc_attr($atts['background_color']); ?>">
        <?php if (!empty($atts['title'])) : ?>
            <div class="plan-name">
                <h3 class="<?php echo esc_attr($atts['font_color']); ?>">
                    <?php echo wp_kses_post($atts['title']); ?>
                </h3>
            </div>
        <?php endif; ?>
        <div class="price-wrap text-center">
            <?php if (!empty($atts['currency'])) : ?>
                <span class="plan-sign"><?php echo wp_kses_post($atts['currency']); ?></span>
            <?php endif; ?>
            <?php if (!empty($atts['price'])) : ?>
                <span class="plan-price"><?php echo wp_kses_post($atts['price']); ?></span>
            <?php endif; ?>
            <?php if (!empty($atts['price_after'])) : ?>
                <span class="plan-decimals"><?php echo wp_kses_post($atts['price_after']); ?></span>
            <?php endif; ?>
            <?php if (!empty($atts['description'])) : ?>
                <div class="plan-description">
                    <?php echo wp_kses_post($atts['description']); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php if (!empty($atts['features'])) : ?>
            <div class="plan-features text-center">
                <ul class="list-unstyled">
                    <?php foreach (($atts['features']) as $feature) : ?>
                        <li class="<?php echo esc_attr($feature['feature_checked']); ?>">
                            <?php echo wp_kses_post($feature['feature_name']); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="plan-button <?php echo esc_attr($atts['show_btn']); ?>">
            <a href="<?php echo esc_attr( $atts['link'] ) ?>" target="<?php echo esc_attr( $atts['target'] ) ?>"
               class="wide_button <?php echo esc_attr( $atts['type'] .' '. $atts['color'].' '. $atts['size']); ?>">
                <?php echo wp_kses( $atts['label'], dotdigital_kses_list() ); ?>
            </a>
        </div>
    </div>

<?php  elseif ($atts['price_layout'] == 6) : ?>

<div class="pricing-plan ls layout-6 <?php echo esc_attr($atts['featured'] . ' ' . $atts['pattern']); ?> <?php echo esc_attr($atts['background_color']); ?>">
        <?php if (!empty($atts['title'])) : ?>
            <div class="plan-name">
                <h3 class="<?php echo esc_attr($atts['font_color']); ?>">
                    <?php echo wp_kses_post($atts['title']); ?>
                </h3>
            </div>
        <?php endif; ?>
        <?php if (!empty($atts['description'])) : ?>
            <div class="plan-description">
                <?php echo wp_kses_post($atts['description']); ?>
            </div>
        <?php endif; ?>
        <div class="price-wrap text-center">
            <?php if (!empty($atts['currency'])) : ?>
                <h6 class="plan-sign"><?php echo wp_kses_post($atts['currency']); ?></h6>
            <?php endif; ?>
            <?php if (!empty($atts['price'])) : ?>
                <h6 class="plan-price"><?php echo wp_kses_post($atts['price']); ?></h6>
            <?php endif; ?>
            <?php if (!empty($atts['price_after'])) : ?>
                <p class="plan-decimals"><?php echo wp_kses_post($atts['price_after']); ?></p>
            <?php endif; ?>
        </div>

        <?php if (!empty($atts['features'])) : ?>
            <div class="plan-features">
                <ul class="list-styled">
                    <?php foreach (($atts['features']) as $feature) : ?>
                        <li class="<?php echo esc_attr($feature['feature_checked']); ?>">
                            <?php echo wp_kses_post($feature['feature_name']); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="plan-button <?php echo esc_attr($atts['show_btn']); ?>">
            <a href="<?php echo esc_attr( $atts['link'] ) ?>" target="<?php echo esc_attr( $atts['target'] ) ?>"
               class="wide_button <?php echo esc_attr( $atts['type'] .' '. $atts['color'].' '. $atts['size']); ?>">
                <?php echo wp_kses( $atts['label'], dotdigital_kses_list() ); ?>
            </a>
        </div>
</div>

<?php endif; ?>