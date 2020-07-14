<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( ! fw()->extensions->get( 'events' ) ) {
	return;
}
$option_events = fw_get_db_post_option( $post->ID );

?>

<div class="vertical-item item-event-layout overflow-hidden">
    <h6 class="entry-title">
        <a href="<?php echo get_permalink( $post->ID ); ?>">
            <?php echo wp_kses_post( $shortcode->fw_get_event_title_by_id( $post->ID ) ); ?>
        </a>
    </h6>
    <div class="item-content">

        <?php echo esc_html($option_events['excerpt_text_id']); ?>

    </div>
</div>

