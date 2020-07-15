<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var $wrapper_atts
 * @var $atts
 * @var $content
 * @var $tag
 */
?>

<?php $wrapper_atts['class'] = fw_akg( 'class', $wrapper_atts, '' ) . ' fw-shortcode-calendar-wrapper shortcode-container theme-calendar-wrappper' ?>

<div <?php echo fw_attr_to_html( $wrapper_atts ); ?>>

    <div class="clearfix"></div>
    <div class="page-header hidden-header">

        <div class="form-inline">
            <div class="btn-group pull-left">
                <button data-calendar-nav="prev"><i class="fa fa-angle-left"></i></button>
            </div>
            <div class="btn-group center-group">
                <div data-calendar-nav="today"><h3><!-- Here will be set the title --></h3></div>
            </div>
            <div class="btn-group pull-right">
                <button data-calendar-nav="next"><i class="fa fa-angle-right"></i></button>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-xs-12 table-wrap">
            <div class="fw-shortcode-calendar theme-calendar"></div>
        </div>
    </div>

</div>
