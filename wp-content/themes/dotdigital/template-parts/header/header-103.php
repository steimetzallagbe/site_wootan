<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div class="page_header_side page_header_side_special header_slide header_side_right ls">
    <div class="scrollbar-macosx">
        <div class="side_header_inner">
            <div class="close-wrapper"><a href="javascript:void(0)">&#215;</a></div>
            <div class="header-side-menu">
                <nav class="mainmenu_side_wrapper">
	                <?php dynamic_sidebar( 'sidebar-right-menu' ); ?>
                </nav>
            </div>
        </div>
    </div>
</div><!-- .page_header_side -->