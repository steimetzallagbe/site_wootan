<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

if ( ! function_exists( 'dotdigital_post_adds' ) ) :
	function dotdigital_post_adds() {
		if ( function_exists( 'mwt_share_this' ) ) {
			echo '<div class="post-adds">';
			mwt_share_this();
			echo '</div>';
		}
	} //dotdigital_post_adds()
endif;

if ( ! function_exists( 'dotdigital_blog_adds' ) ) :
	function dotdigital_blog_adds() {
		if ( function_exists( 'mwt_post_like_button' ) && ( 'mwt_post_like_count' ) && ( 'mwt_show_post_views_count' )&& ( 'mwt_share_this' ) ) {
			echo '<div class="blog-adds">';

			echo '<span class="views-count">';
			mwt_show_post_views_count();
			echo '</span>';

			echo '<span class="comment-count">';
			echo get_comments_number( get_the_ID() );
			echo '</span>';

			echo '<span class="like-count">';
			mwt_post_like_count( get_the_ID() );
			echo '</span>';

			echo '</div>';
		}
	} //dotdigital_blog_adds()
endif;
