<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

//remove page title in shop page
add_filter( 'woocommerce_show_page_title', 'dotdigital_filter_remove_shop_title_in_content' );
if ( ! function_exists( 'dotdigital_filter_remove_shop_title_in_content' ) ) :
	function dotdigital_filter_remove_shop_title_in_content() {
		return false;
	}
endif;

//remove wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

//wrap in col-sm- and .columns-2 all products on shop page
add_action( 'woocommerce_before_shop_loop', 'dotdigital_action_echo_div_columns_before_shop_loop' );
if ( ! function_exists( 'dotdigital_action_echo_div_columns_before_shop_loop' ) ) :
	function dotdigital_action_echo_div_columns_before_shop_loop() {
		$column_classes = dotdigital_get_columns_classes();
		$columns_amount = ( $column_classes[ 'main_column_class' ] === 'col-xs-12' ) ? 3 : 2;

		//fix for Woo v3.3
		if( function_exists( 'wc_get_loop_prop') ) {
			$columns_amount = wc_get_loop_prop( 'columns', $columns_amount );
		}
		echo '<div id="content_products" class="' . esc_attr( $column_classes[ 'main_column_class' ] ) . '">';
		echo '<div class="columns-' . esc_attr( apply_filters( 'loop_shop_columns', $columns_amount ) ) . '">';
	}
endif;

//wrapping sort form in div and adding view toggle button
add_action( 'woocommerce_before_shop_loop', 'dotdigital_action_before_shop_loop_wrap_form', 15 );
if ( ! function_exists( 'dotdigital_action_before_shop_loop_wrap_form' ) ) :
	function dotdigital_action_before_shop_loop_wrap_form() {
		echo '<div class="storefront-sorting clearfix">';
	}
endif;

add_action( 'woocommerce_before_shop_loop', 'dotdigital_action_before_shop_loop_wrap_form_close', 40 );
if ( ! function_exists( 'dotdigital_action_before_shop_loop_wrap_form_close' ) ) :
	function dotdigital_action_before_shop_loop_wrap_form_close() {
		echo '</div>';
	}
endif;

//start loop - adding classes to products ul
if ( ! function_exists( 'woocommerce_product_loop_start' ) ) :
	function woocommerce_product_loop_start( $echo = true ) {
		//id products is necessary for scripts
		$html                                    = '<ul class="products list-unstyled grid-view">';
		$GLOBALS[ 'woocommerce_loop' ][ 'loop' ] = 0;
		if ( $echo ) {
			echo wp_kses_post( $html );
		} else {
			return $html;
		}
	}
endif;

//loop pagination
//closing main column and getting sidebar if exist
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination' );
add_action( 'woocommerce_after_shop_loop', 'dotdigital_action_echo_div_columns_after_shop_loop' );
if ( ! function_exists( 'dotdigital_action_echo_div_columns_after_shop_loop' ) ):
	function dotdigital_action_echo_div_columns_after_shop_loop() {
		echo '</div><!-- eof .columns-2 -->';
		$pagination_html = dotdigital_bootstrap_paginate_links();
		if ( $pagination_html ) {
			echo '<div class="text-center">';
			echo wp_kses_post( $pagination_html );
			echo '</div>';
		}
		echo '</div><!-- eof #content_products -->';
		$column_classes = dotdigital_get_columns_classes();
		if ( $column_classes[ 'sidebar_class' ] ): ?>
            <!-- main aside sidebar -->
            <aside class="<?php echo esc_attr( $column_classes[ 'sidebar_class' ] ); ?>">
				<?php get_sidebar(); ?>
            </aside>
            <!-- eof main aside sidebar -->
		<?php
		endif;
	}
endif;

// single product in shop loop
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

//start of loop item
add_action( 'woocommerce_before_shop_loop_item', 'dotdigital_action_echo_markup_before_shop_loop_item' );
if ( ! function_exists( 'dotdigital_action_echo_markup_before_shop_loop_item' ) ):
	function dotdigital_action_echo_markup_before_shop_loop_item() {
		echo '<div class="vertical-item overflow-hidden text-center">';
		echo '<div class="item-media with_background">';
		woocommerce_template_loop_product_link_open();
	}
endif;


add_action( 'woocommerce_after_shop_loop_item_title', 'dotdigital_action_echo_markup_after_shop_loop_item_title' );
if ( ! function_exists( 'dotdigital_action_echo_markup_after_shop_loop_item_title' ) ):
	function dotdigital_action_echo_markup_after_shop_loop_item_title() {
		woocommerce_template_loop_product_link_close();
		echo '</div> <!-- eof .item-media -->';
		echo '<div class="item-content">';

		//product short description
		woocommerce_template_loop_product_link_open();
		woocommerce_template_loop_product_title();
		woocommerce_template_loop_product_link_close();
		global $post;
		echo apply_filters( 'woocommerce_short_description', $post->post_excerpt );
		echo '<div class="product-meta">';
		//Product rating
		if ( ! ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) ) {
			global $product;
			global $woocommerce;
			if ( version_compare( $woocommerce->version, '3.0', "<" ) ) {
				if ( $rating_html = $product->get_rating_html() ) :
					echo '<h4>' . esc_html__( 'Product Rating', 'dotdigital' ) . '</h4>';
					echo wp_kses_post( $rating_html );
				endif;
			} else {
				if ( $rating_html = wc_get_rating_html( $product->get_average_rating() ) ) :
					echo '<h4>' . esc_html__( 'Product Rating', 'dotdigital' ) . '</h4>';
					echo wp_kses_post( $rating_html );
				endif;
			}
		}
		woocommerce_template_loop_price();
		echo '</div>';
		woocommerce_template_loop_add_to_cart();
	}
endif;

//end of loop item
add_action( 'woocommerce_after_shop_loop_item', 'dotdigital_action_echo_markup_after_shop_loop_item' );
if ( ! function_exists( 'dotdigital_action_echo_markup_after_shop_loop_item' ) ):
	function dotdigital_action_echo_markup_after_shop_loop_item() {
		echo '</div> <!-- eof .item-content -->';
		echo '</div> <!-- eof .side-item -->';
	}
endif;


///////////////////////////////////////
/// li.product-category in shop page///
/// ///////////////////////////////////


//shop page - li.product-category additional classes
add_filter('product_cat_class', 'dotdigital_product_cat_class_addons');
if ( ! function_exists( 'dotdigital_product_cat_class_addons' ) ):
	function dotdigital_product_cat_class_addons( $classes_array ) {
		$classes_array[] = 'additional-product-category-class';
		return $classes_array;
	}
endif;

//wrapping category in our div.vertical-item inside LI element
add_action( 'woocommerce_before_subcategory', 'dotdigital_echo_media_item_start', 5 );
if ( ! function_exists( 'dotdigital_echo_media_item_start' ) ):
	function dotdigital_echo_media_item_start( $classes_array ) {
		echo '<div class="vertical-item content-padding text-center"><div class="item-media with_background">';
	}
endif;

//closing link on image before title
add_action( 'woocommerce_before_subcategory_title', 'dotdigital_echo_closing_a', 20 );
//closing our div.item-media
add_action( 'woocommerce_before_subcategory_title', 'dotdigital_echo_closing_div', 30 );

//opening our .item-content after .item-media and before sub-category-title
add_action( 'woocommerce_before_subcategory_title', 'dotdigital_echo_media_item_content_start', 40 );
if ( ! function_exists( 'dotdigital_echo_media_item_content_start' ) ):
	function dotdigital_echo_media_item_content_start( $classes_array ) {
		echo '<div class="item-content">';
	}
endif;

//removing category title because we do not want to wrap H2 tag in A tag. We want opposite:
//add A tag inside H2 tag
remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );
//adding our custom title
add_action( 'woocommerce_shop_loop_subcategory_title', 'dotdigital_template_loop_category_title', 10, 1 );
if ( ! function_exists( 'dotdigital_template_loop_category_title' ) ) {

	/**
	 * Show the subcategory title in the product loop, adding A inside it.
	 *
	 * @param object $category Category object.
	 */
	function dotdigital_template_loop_category_title( $category ) {
		?>
        <h2 class="woocommerce-loop-category__title">
			<?php

			woocommerce_template_loop_category_link_open( $category );

			echo esc_html( $category->name );

			if ( $category->count > 0 ) {
				echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . esc_html( $category->count ) . ')</mark>', $category ); // WPCS: XSS ok.
			}

			woocommerce_template_loop_category_link_close();

			?>
        </h2>
		<?php
	}
}

//closing our div.item-content
add_action( 'woocommerce_after_subcategory', 'dotdigital_echo_closing_div', 11 );
//closing our div.vertical-item
add_action( 'woocommerce_after_subcategory', 'dotdigital_echo_closing_div', 12 );

//removing not needed closing A tag
remove_action( 'woocommerce_after_subcategory', 'woocommerce_template_loop_category_link_close', 10 );

if ( ! function_exists( 'dotdigital_echo_closing_div' ) ):
	function dotdigital_echo_closing_div( $classes_array ) {
		echo '</div>';
	}
endif;

if ( ! function_exists( 'dotdigital_echo_closing_a' ) ):
	function dotdigital_echo_closing_a( $classes_array ) {
		echo '</a>';
	}
endif;
/// end of li.product-category in shop page///


//single product view
//single product image and summary layout
//wrap in col-sm- and .columns-2 all products on shop page
add_action( 'woocommerce_before_single_product', 'dotdigital_action_echo_div_columns_before_single_product' );
if ( ! function_exists( 'dotdigital_action_echo_div_columns_before_single_product' ) ):
	function dotdigital_action_echo_div_columns_before_single_product() {
		$column_classes = dotdigital_get_columns_classes();
		echo '<div id="content_product" class="' . esc_attr( $column_classes[ 'main_column_class' ] ) . '">';
	}
endif;

add_action( 'woocommerce_after_single_product', 'dotdigital_action_echo_div_columns_after_single_product' );
if ( ! function_exists( 'dotdigital_action_echo_div_columns_after_single_product' ) ):
	function dotdigital_action_echo_div_columns_after_single_product() {
		echo '</div> <!-- eof .col- -->';
		$column_classes = dotdigital_get_columns_classes();
		if ( $column_classes[ 'sidebar_class' ] ): ?>
            <!-- main aside sidebar -->
            <aside class="<?php echo esc_attr( $column_classes[ 'sidebar_class' ] ); ?>">
				<?php get_sidebar(); ?>
            </aside>
            <!-- eof main aside sidebar -->
		<?php
		endif;
	}
endif;

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
//add_action('woocommerce_product_thumbnails', 'woocommerce_show_product_sale_flash', 9 );
add_filter( 'woocommerce_single_product_image_html', 'dotdigital_filter_put_onsale_span_in_main_image' );
if ( ! function_exists( 'dotdigital_filter_put_onsale_span_in_main_image' ) ):
	function dotdigital_filter_put_onsale_span_in_main_image( $html ) {
		return $html . woocommerce_show_product_sale_flash();
	}
endif;

add_action( 'woocommerce_before_single_product_summary', 'dotdigital_action_echo_div_columns_before_single_product_summary', 9 );
if ( ! function_exists( 'dotdigital_action_echo_div_columns_before_single_product_summary' ) ):
	function dotdigital_action_echo_div_columns_before_single_product_summary() {
		echo '<div class="row">';
		echo '<div class="col-sm-6">';
	}
endif;

add_action( 'woocommerce_before_single_product_summary', 'dotdigital_action_echo_div_close_first_column_before_single_product_summary', 21 );
if ( ! function_exists( 'dotdigital_action_echo_div_close_first_column_before_single_product_summary' ) ):
	function dotdigital_action_echo_div_close_first_column_before_single_product_summary() {
		echo '</div><!-- eof .col-sm- with single product images -->';
		echo '<div class="col-sm-6">';
	}
endif;

add_action( 'woocommerce_after_single_product_summary', 'dotdigital_action_echo_div_close_columns_after_single_product_summary', 9 );
if ( ! function_exists( 'dotdigital_action_echo_div_close_columns_after_single_product_summary' ) ):
	function dotdigital_action_echo_div_close_columns_after_single_product_summary() {
		echo '</div> <!--eof .col-sm- .summary -->';
		echo '</div> <!--eof .row -->';
	}
endif;

//elements in single product summary
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );


add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 8 );
add_action( 'woocommerce_single_product_summary', 'dotdigital_action_echo_template_single_meta', 9 );
if ( ! function_exists( 'dotdigital_action_echo_template_single_meta' ) ):
	function dotdigital_action_echo_template_single_meta() {
		echo '<div class="grey theme_buttons small_buttons color1">';
		woocommerce_template_single_meta();
		echo '</div>';
	}
endif;

add_action( 'woocommerce_before_add_to_cart_button', 'dotdigital_action_echo_open_div_before_add_to_cart_button' );
if ( ! function_exists( 'dotdigital_action_echo_open_div_before_add_to_cart_button' ) ):
	function dotdigital_action_echo_open_div_before_add_to_cart_button() {
		echo '<div class="add-to-cart theme_buttons color1">';
	}
endif;

add_action( 'woocommerce_after_add_to_cart_button', 'dotdigital_action_echo_open_div_after_add_to_cart_button' );
if ( ! function_exists( 'dotdigital_action_echo_open_div_after_add_to_cart_button' ) ):
	function dotdigital_action_echo_open_div_after_add_to_cart_button() {
		echo '</div>';
	}
endif;

//account navigation
add_action( 'woocommerce_before_account_navigation', 'dotdigital_action_woocommerce_before_account_navigation' );
if ( ! function_exists( 'dotdigital_action_woocommerce_before_account_navigation' ) ):
	function dotdigital_action_woocommerce_before_account_navigation() {
		echo '<div class="theme_buttons small_buttons">';
	}
endif;

add_action( 'woocommerce_after_account_navigation', 'dotdigital_action_woocommerce_after_account_navigation' );
if ( ! function_exists( 'dotdigital_action_woocommerce_after_account_navigation' ) ):
	function dotdigital_action_woocommerce_after_account_navigation() {
		echo '</div><!-- eof theme_buttons -->';
	}
endif;

//checkout placeholders
add_filter( 'woocommerce_checkout_fields', 'dotdigital_custom_override_checkout_fields' );
if ( ! function_exists( 'dotdigital_custom_override_checkout_fields' ) ):
	function dotdigital_custom_override_checkout_fields( $fields ) {
		/*unset($fields['billing']['billing_last_name']);*/
		$fields['billing']['billing_first_name']['placeholder'] = esc_attr__( 'First Name', 'dotdigital' );
		$fields['billing']['billing_last_name']['placeholder']  = esc_attr__( 'Last Name', 'dotdigital' );
		$fields['billing']['billing_company']['placeholder']    = esc_attr__( 'Company Name', 'dotdigital' );
		$fields['billing']['billing_city']['placeholder']       = esc_attr__( 'Town / City', 'dotdigital' );
		$fields['billing']['billing_state']['placeholder']      = esc_attr__( 'State / County', 'dotdigital' );
		$fields['billing']['billing_postcode']['placeholder']   = esc_attr__( 'Postcode / ZIP', 'dotdigital' );
		$fields['billing']['billing_phone']['placeholder']      = esc_attr__( 'Phone', 'dotdigital' );
		$fields['billing']['billing_email']['placeholder']      = esc_attr__( 'Email address', 'dotdigital' );
		$fields['order']['order_comments']['placeholder']       = esc_attr__( 'Additional info', 'dotdigital' );

		return $fields;
	}
endif;