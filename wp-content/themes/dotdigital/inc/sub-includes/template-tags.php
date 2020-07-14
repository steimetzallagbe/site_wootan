<?php

/**
 * -------------------------
 * The Template Tags Library
 * -------------------------
 *
 * Formatted output for:
 *
 * 1. Excerpt.
 * 2. Categories, Tags, Terms.
 * 3. Date, Time.
 * 4. Comments Counter
 * 5. Author
 * 6. Sticky Marker
 */


if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * Tools
 */

if ( ! function_exists( 'dotdigital_auto_taxonomy' ) ) :
	/**
	 * Return taxonomy of given type for given post_type.
	 */
	function dotdigital_auto_taxonomy( $args = array() ) {

		$post_type = array_key_exists( 'post_type', $args )
			? $args['post_type']
			: ( array_key_exists( 'post_id', $args )
				? get_post_type( $args['post_id'] )
				: get_post_type() );

		$type = array_key_exists( 'type', $args ) ? $args['type'] : 'category';

		$out = '';

		$taxonomies = array(
			'post'         => array(
				'category' => 'category',
				'tag'      => 'post_tag',
			),
			'fw-portfolio' => array(
				'category' => 'fw-portfolio-category',
			),
			'fw-event'     => array(
				'category' => 'fw-event-taxonomy-name',
			),
			'fw-services'  => array(
				'category' => 'fw-services-category',
			),
			'team_member'  => array(
				'category' => 'team_category',
				'tag'      => 'team_tag',
			),
			'product'      => array(
				'category' => 'product_cat',
				'tag'      => 'product_tag',
			),
		);

		$taxonomies = array_merge( $taxonomies, apply_filters( 'dotdigital_auto_taxonomy_list', array() ) );

		if ( array_key_exists( $post_type, $taxonomies ) ) {
			if ( array_key_exists( $type, $taxonomies[ $post_type ] ) ) {
				$out = $taxonomies[ $post_type ][ $type ];
			}
		}

		return $out;
	}
endif;


if ( ! function_exists( 'dotdigital_tt_kses_list' ) ) :
	/**
	 * Return array of allowed tags for template tags functions.
	 */
	function dotdigital_tt_kses_list( $args = array() ) {

		if ( array_key_exists( 'kses_list', $args ) ) {
			$out = $args['kses_list'];
		} else {
			$out = function_exists( 'dotdigital_kses_list' ) ? dotdigital_kses_list() : 'post';
			$out = apply_filters( 'dotdigital_tt_kses_list', $out );
		}

		return $out;
	}
endif;


/**
 * Excerpt.
 * --------------------------------------------------------------------------------------------------------------------
 */


if ( ! function_exists( 'dotdigital_get_the_excerpt' ) ) :
	/**
	 * Retrieve excerpt with custom length in characters or words and custom more link.
	 */
	function dotdigital_get_the_excerpt( $args = array() ) {

		// args defaults

		$defaults = array(

			'use_summary'   => true,
			'use_content'   => true,
			'content_part'  => 'whole-post',
			'respect_pages' => 'all-pages',

			'strip_shortcodes'        => true,
			'use_the_content_filters' => true,
			'escape_cdata_closing'    => true,
			'strip_tags'              => true,
			'merge_spaces'            => true,

			'length'        => 55,
			'crop_type'     => 'words',
			'respect_words' => true,

			'before' => '',
			'after'  => '',

			'more'                 => esc_html__( '[...]', 'dotdigital' ),
			'more_only_if_cropped' => true,
			'more_before'          => '',
			'more_after'           => '',
			'use_link'             => false,
			'link_class'           => '',
			'link_attributes'      => '',
			'link_before'          => '',
			'link_after'           => '',
		);

		$defaults = array_merge( $defaults, apply_filters( 'dotdigital_get_the_excerpt_defaults', array() ) );

		extract( $args );

		$post_id = isset( $post_id ) ? $post_id : get_the_ID();

		$use_summary   = isset( $use_summary ) ? $use_summary : $defaults['use_summary'];
		$use_content   = isset( $use_content ) ? $use_content : $defaults['use_content'];
		$content_part  = isset( $content_part ) ? $content_part : $defaults['content_part'];
		$respect_pages = isset( $respect_pages ) ? $respect_pages : $defaults['respect_pages'];

		$strip_shortcodes        = isset( $strip_shortcodes ) ? $strip_shortcodes : $defaults['strip_shortcodes'];
		$use_the_content_filters = isset( $use_the_content_filters ) ? $use_the_content_filters : $defaults['use_the_content_filters'];
		$escape_cdata_closing    = isset( $escape_cdata_closing ) ? $escape_cdata_closing : $defaults['escape_cdata_closing'];
		$strip_tags              = isset( $strip_tags ) ? $strip_tags : $defaults['strip_tags'];
		$merge_spaces            = isset( $merge_spaces ) ? $merge_spaces : $defaults['merge_spaces'];

		$length        = isset( $length ) ? $length : $defaults['length'];
		$crop_type     = isset( $crop_type ) ? $crop_type : $defaults['crop_type'];
		$respect_words = isset( $respect_words ) ? $respect_words : $defaults['respect_words'];

		$before = isset( $before ) ? $before : $defaults['before'];
		$after  = isset( $after ) ? $after : $defaults['after'];

		$more                 = isset( $more ) ? $more : $defaults['more'];
		$more_only_if_cropped = isset( $more_only_if_cropped ) ? $more_only_if_cropped : $defaults['more_only_if_cropped'];
		$more_before          = isset( $more_before ) ? $more_before : $defaults['more_before'];
		$more_after           = isset( $more_after ) ? $more_after : $defaults['more_after'];
		$use_link             = isset( $use_link ) ? $use_link : $defaults['use_link'];
		$link_class           = isset( $link_class ) ? $link_class : $defaults['link_class'];
		$link_attributes      = isset( $link_attributes ) ? $link_attributes : $defaults['link_attributes'];
		$link_before          = isset( $link_before ) ? $link_before : $defaults['link_before'];
		$link_after           = isset( $link_after ) ? $link_after : $defaults['link_after'];

		$out = '';

		// get excerpt
		$post = get_post( $post_id );
		if ( ! empty( $post ) ) {

			if ( post_password_required( $post ) ) {

				// if password protected
				$out = esc_html__( 'There is no excerpt because this is a protected post.', 'dotdigital' );
			} else {

				// use summary
				if ( $use_summary ) {

					// raw data
					$out = $post->post_excerpt;

					// shortcodes
					if ( $strip_shortcodes ) {
						$out = strip_shortcodes( $out );
					}
				}

				// use content  ( also if summary is empty )
				if ( '' == $out && $use_content ) {

					// raw data
					$out = get_extended( $post->post_content );

					// pages   ( all / first / current )
					if ( 'before-more' != $content_part ) {

						// raw data
						global $pages;

						switch ( $respect_pages ) {

							case 'first-page':
								$out['extended'] = $pages[0];
								break;

							case 'current-page':
								global $page;
								$out['extended'] = $pages[ $page - 1 ];
								break;

							case 'all-pages':
							default:
								$out['extended'] = implode( ' ', $pages );
								break;
						}
					}

					// content part   ( before "more break" / before "after break" / whole post content )
					switch ( $content_part ) {

						case 'before-more':
							$out = $out['main'];
							break;

						case 'after-more':
							$out = $out['extended'];
							break;

						case 'whole-post':
						default:
							$out = implode( ' ', $out );
							break;
					}

					// shortcodes
					if ( $strip_shortcodes ) {
						$out = strip_shortcodes( $out );
					}

					// the_content filters
					if ( $use_the_content_filters ) {
						$out = apply_filters( 'the_content', $out );
					}

					// escape CDATA closing tag
					if ( $escape_cdata_closing ) {
						$out = str_replace( ']]>', ']]&gt;', $out );
					}
				}

			}

		}

		if ( '' != $out ) {

			// strip all tags
			if ( $strip_tags ) {
				$out = strip_tags( $out );
			}

			// merge spaces
			if ( $merge_spaces ) {
				$out = trim( preg_replace( '/\s+/', ' ', $out ) );
			}

			// crop
			$cropped = false;
			if ( $length > - 1 ) {

				// cropping needs strip tags
				if ( ! $strip_tags ) {
					$out = strip_tags( $out );
				}

				$words_array = array();
				if ( 'words' == $crop_type || $respect_words ) {
					$words_array = preg_split( "/[\n\r\t ]+/", $out, - 1, PREG_SPLIT_NO_EMPTY );
				}

				// words or symbols
				switch ( $crop_type ) {

					case 'symbols':

						if ( $length < strlen( $out ) ) {

							if ( $respect_words ) {
								$counter = 0;
								$sum     = 0;
								$lengths = array_map( 'strlen', $words_array );
								for ( $i = 1; $i < count( $lengths ) - 1; $i ++ ) {
									$lengths[ $i ] ++;
								}
								foreach ( $lengths as $cur ) {
									$sum += $cur;
									if ( $sum > $length ) {
										break;
									}
									$counter ++;
								}

								$out = implode( ' ', array_slice( $words_array, 0, $counter ) );

							} else {
								$out = substr( $out, 0, $length );
							}
							$cropped = true;
						}

						break;

					case 'words':
					default:
						if ( $length < count( $words_array ) ) {
							$out     = implode( ' ', array_slice( $words_array, 0, $length ) );
							$cropped = true;
						}
						break;
				}

				if ( $cropped && ( 'words' == $crop_type || $respect_words ) ) {
					$more = ' ' . $more;
				}
			}

			// output
			$out = $before . $out;

			if ( '' != $more && ! ( $more_only_if_cropped && ! $cropped ) ) {

				$out .= $more_before;

				if ( $use_link ) {

					$out .= sprintf( '<a%s%s%s>%s%s%s</a>',
						'' != $link_class ? ' ' . 'class="' . $link_class . '"' : '',
						' ' . 'href="' . get_permalink( $post_id ) . '"',
						'' != $link_attributes ? ' ' . $link_attributes : '',
						$link_before,
						$more,
						$link_after
					);

				} else {
					$out .= $more;
				}

				$out .= $more_after;
			}

			$out .= $after;
		}

		return apply_filters( 'dotdigital_get_the_excerpt', $out );
	}
endif;


if ( ! function_exists( 'dotdigital_the_excerpt' ) ) :
	/**
	 * Echo excerpt with custom length in characters or words and custom more link.
	 */
	function dotdigital_the_excerpt( $args = array() ) {

		echo wp_kses( dotdigital_get_the_excerpt( $args ), dotdigital_tt_kses_list( $args ) );
	}
endif;


/**
 * Categories, Tags, Terms.
 * --------------------------------------------------------------------------------------------------------------------
 */


if ( ! function_exists( 'dotdigital_get_term_choices' ) ) :
	/**
	 * Retrieve associative array of "term_id => term_name" pairs.
	 */
	function dotdigital_get_term_choices( $post_id, $taxonomy ) {

		$terms = get_the_terms( $post_id, $taxonomy );

		$out = array();
		foreach ( $terms as $term ) {
			$out[ $term->term_id ] = $term->name;
		}

		return $out;
	}
endif;


if ( ! function_exists( 'dotdigital_get_the_terms' ) ) :
	/**
	 * Retrieve formatted terms.
	 */
	function dotdigital_get_the_terms( $args = array() ) {

		// args defaults

		$defaults = array(

			'taxonomy' => 'category',

			'featured_ids'  => array(),
			'max_items'     => - 1,
			'output_format' => '',

			'before'          => '',
			'after'           => '',
			'before_singular' => '',
			'after_singular'  => '',
			'output_multiple' => true,
			'output_singular' => true,

			'item_before' => '',
			'item_after'  => '',

			'screen_reader'   => '',
			'items_separator' => '<span>' . esc_html_x(
					', ', 'Used between list items, there is a space after the comma.', 'dotdigital' ) . '</span>',

			'link_class'      => '',
			'link_attributes' => '',
			'link_before'     => '',
			'link_after'      => '',

		);

		$defaults = array_merge( $defaults, apply_filters( 'dotdigital_get_the_terms_defaults', array() ) );

		extract( $args );

		$post_id  = isset( $post_id ) ? $post_id : get_the_ID();
		$taxonomy = isset( $taxonomy ) ? $taxonomy : $defaults['taxonomy'];

		$featured_ids  = isset( $featured_ids ) ? $featured_ids : $defaults['featured_ids'];
		$max_items     = isset( $max_items ) ? $max_items : $defaults['max_items'];
		$output_format = isset( $output_format ) ? $output_format : $defaults['output_format'];

		$before          = isset( $before ) ? $before : $defaults['before'];
		$after           = isset( $after ) ? $after : $defaults['after'];
		$before_singular = isset( $before_singular ) ? $before_singular : $defaults['before_singular'];
		$after_singular  = isset( $after_singular ) ? $after_singular : $defaults['after_singular'];
		$output_multiple = isset( $output_multiple ) ? $output_multiple : $defaults['output_multiple'];
		$output_singular = isset( $output_singular ) ? $output_singular : $defaults['output_singular'];

		$screen_reader   = isset( $screen_reader ) ? $screen_reader : $defaults['screen_reader'];
		$items_separator = isset( $items_separator ) ? $items_separator : $defaults['items_separator'];

		$item_before = isset( $item_before ) ? $item_before : $defaults['item_before'];
		$item_after  = isset( $item_after ) ? $item_after : $defaults['item_after'];

		$link_class      = isset( $link_class ) ? $link_class : $defaults['link_class'];
		$link_attributes = isset( $link_attributes ) ? $link_attributes : $defaults['link_attributes'];
		$link_before     = isset( $link_before ) ? $link_before : $defaults['link_before'];
		$link_after      = isset( $link_after ) ? $link_after : $defaults['link_after'];

		$crop = isset( $crop ) ? $crop : - 1;

		$out = '';

		// get terms
		$terms_raw = get_the_terms( $post_id, $taxonomy );
		$terms     = array();

		if ( ! empty( $terms_raw ) && ! is_wp_error( $terms_raw ) ) {

			// featured filter
			if ( is_string( $featured_ids ) ) {
				$featured_ids = function_exists( 'fw_get_db_post_option' )
					? fw_get_db_post_option( $post_id, $featured_ids, '' ) : '';
			}
			if ( ! is_array( $featured_ids ) ) {
				$featured_ids = array();
			}
			if ( ! empty( $featured_ids ) ) {
				foreach ( $terms_raw as $term ) {
					if ( in_array( $term->term_id, $featured_ids ) ) {
						$terms[] = $term;
					}
				}
			}

			// use any terms if there are no featured
			if ( empty( $terms ) ) {
				$terms = $terms_raw;
			}

			// crop terms array to $max_items
			if ( ! empty( $terms ) ) {
				if ( - 1 != $max_items ) {
					$terms = array_slice( $terms, 0, $max_items );
				}
			}

			if ( ! empty( $terms ) ) {

				// crop terms array to $max_items
				if ( - 1 != $max_items ) {
					$terms = array_slice( $terms, 0, $max_items );
				}

				// sanitize $output_format
				if ( ! in_array( $output_format,
					array(
						'object-array',
						'name-array',
						'link-array',
						'name-list',
						'link-list',
					) )
				) {
					$output_format = 'link-list';
				}

				// all terms crop
				if ( 'object-array' != $output_format ) {

					if ( $crop > - 1 && count( $terms ) > 0 ) {

						$terms_length     = 0;
						$terms_new_length = 0;
						$separator_length = strlen( $items_separator );
						$crop             = false;

						foreach ( $terms as $key => &$term ) {

							$terms_length += strlen( $term->name );

							$terms_length += $separator_length;

							if ( $crop ) {
								unset( $terms[ $key ] );
							} elseif ( $terms_length > $crop ) {
								$crop             = true;
								$terms_new_length = $terms_length;
							}
						}

						$terms_new_length -= strlen( end( $terms )->name ) + $separator_length;
						$terms_new_length = $crop - $terms_new_length;

						if ( $terms_new_length > 0 ) {
							end( $terms )->name = substr( end( $terms )->name, 0, $terms_new_length );
						} else {
							array_pop( $terms );
						}
					}
				}

				// Multiple or Singular
				if ( count( $terms ) == 1 ) {
					$has_output = $output_singular;

					if ( '' != $before_singular ) {
						$before = $before_singular;
					}
					if ( '' != $after_singular ) {
						$after = $after_singular;
					}
				} else {
					$has_output = $output_multiple;
				}

				// Output
				if ( $has_output ) {

					if ( 'object-array' == $output_format ) {
						$out = $terms;
					} else {

						// term items array
						$term_items = array();
						foreach ( $terms as $term ) {

							$term_item = '';

							$term_item .= $item_before;

							// term item content
							switch ( $output_format ) {

								case 'name-array':
								case 'name-list':
									$term_item .= $term->name;
									break;

								// term link
								case 'link-array':
								case 'link-list':

									$term_item .= sprintf( '<a%s%s%s>%s%s%s</a>',
										'' != $link_class ? ' ' . 'class="' . $link_class . '"' : '',
										' ' . 'href="' . get_term_link( $term ) . '"',
										'' != $link_attributes ? ' ' . $link_attributes : '',
										$link_before,
										$term->name,
										$link_after
									);
									break;
							}

							$term_item .= $item_after;

							$term_items[] = $term_item;
						}

						// array or list output
						switch ( $output_format ) {

							// array
							case 'name-array':
							case 'link-array':
								$out = $term_items;
								break;

							// list
							case 'link-list':
							case 'name-list':

								$out .= $before;
								$out .= $screen_reader;
								$out .= implode( $items_separator, $term_items );
								$out .= $after;
								break;
						}
					}
				}
			}
		}

		return apply_filters( 'dotdigital_get_the_terms', $out );
	}
endif;


if ( ! function_exists( 'dotdigital_the_terms' ) ) :
	/**
	 * Echo formatted terms.
	 */
	function dotdigital_the_terms( $args = array() ) {

		echo wp_kses( dotdigital_get_the_terms( $args ), dotdigital_tt_kses_list( $args ) );
	}
endif;


if ( ! function_exists( 'dotdigital_get_featured_term' ) ) :
	/**
	 * Retrieve featured term.
	 */
	function dotdigital_get_featured_term( $args = array() ) {

		if ( ! array_key_exists( 'max_items', $args ) ) {
			$args['max_items'] = 1;
		}

		return dotdigital_get_the_terms( $args );
	}
endif;


if ( ! function_exists( 'dotdigital_featured_term' ) ) :
	/**
	 * Echo featured term.
	 */
	function dotdigital_featured_term( $args = array() ) {

		echo wp_kses( dotdigital_get_featured_term( $args ), dotdigital_tt_kses_list( $args ) );
	}
endif;


if ( ! function_exists( 'dotdigital_get_the_categories' ) ) :
	/**
	 * Retrieve formatted categories.
	 */
	function dotdigital_get_the_categories( $args = array() ) {

		if ( ! array_key_exists( 'taxonomy', $args ) ) {
			$args['taxonomy'] = 'category';

			if ( apply_filters( 'dotdigital_use_auto_taxonomy_for_template_tags', true ) ) {
				$args['taxonomy'] = dotdigital_auto_taxonomy( array( 'type' => 'category' ) );
			}
		}

		return dotdigital_get_the_terms( $args );
	}
endif;


if ( ! function_exists( 'dotdigital_the_categories' ) ) :
	/**
	 * Echo formatted categories.
	 */
	function dotdigital_the_categories( $args = array() ) {

		echo wp_kses( dotdigital_get_the_categories( $args ), dotdigital_tt_kses_list( $args ) );
	}
endif;


if ( ! function_exists( 'dotdigital_get_featured_category' ) ) :
	/**
	 * Retrieve featured category.
	 */
	function dotdigital_get_featured_category( $args = array() ) {

		if ( ! array_key_exists( 'max_items', $args ) ) {
			$args['max_items'] = 1;
		}

		if ( ! array_key_exists( 'featured_ids', $args ) ) {
			$args['featured_ids'] = 'featured-category';
		}

		return dotdigital_get_the_categories( $args );
	}
endif;


if ( ! function_exists( 'dotdigital_featured_category' ) ) :
	/**
	 * Echo featured category.
	 */
	function dotdigital_featured_category( $args = array() ) {

		echo wp_kses( dotdigital_get_featured_category( $args ), dotdigital_tt_kses_list( $args ) );
	}
endif;


if ( ! function_exists( 'dotdigital_get_the_tags' ) ) :
	/**
	 * Retrieve formatted tags.
	 */
	function dotdigital_get_the_tags( $args = array() ) {

		if ( ! array_key_exists( 'taxonomy', $args ) ) {
			$args['taxonomy'] = 'post_tag';

			if ( apply_filters( 'dotdigital_use_auto_taxonomy_for_template_tags', true ) ) {
				$args['taxonomy'] = dotdigital_auto_taxonomy( array( 'type' => 'tag' ) );
			}
		}

		return dotdigital_get_the_terms( $args );
	}
endif;


if ( ! function_exists( 'dotdigital_the_tags' ) ) :
	/**
	 * Echo formatted tags.
	 */
	function dotdigital_the_tags( $args = array() ) {

		echo wp_kses( dotdigital_get_the_tags( $args ), dotdigital_tt_kses_list( $args ) );
	}
endif;


if ( ! function_exists( 'dotdigital_get_featured_tag' ) ) :
	/**
	 * Retrieve featured tag.
	 */
	function dotdigital_get_featured_tag( $args = array() ) {

		if ( ! array_key_exists( 'max_items', $args ) ) {
			$args['max_items'] = 1;
		}

		if ( ! array_key_exists( 'featured_ids', $args ) ) {
			$args['featured_ids'] = 'featured-tag';
		}

		return dotdigital_get_the_tags( $args );
	}
endif;


if ( ! function_exists( 'dotdigital_featured_tag' ) ) :
	/**
	 * Echo featured tag.
	 */
	function dotdigital_featured_tag( $args = array() ) {

		echo wp_kses( dotdigital_get_featured_tag( $args ), dotdigital_tt_kses_list( $args ) );
	}
endif;


/**
 * Date, Time.
 * --------------------------------------------------------------------------------------------------------------------
 */


if ( ! function_exists( 'dotdigital_get_object_time' ) ) :
	/**
	 * Retrieve formatted object time.
	 */
	function dotdigital_get_object_time( $args = array() ) {

		// args defaults

		$defaults = array(

			'object_type'  => 'post',
			'comment_args' => array(),

			'format'        => 'F d, Y \a\t H:i a',
			'time_variant'  => 'published',
			'output_format' => 'time-tag',
			'screen_reader' => '',

			'before' => '',
			'after'  => '',

			'use_link'        => true,
			'link_variant'    => 'day',
			'link_class'      => '',
			'link_attributes' => '',

			'time_tag_class'      => '',
			'time_tag_attributes' => '',

			'days_ago'          => false,
			'days_ago_max_days' => - 1,
			'days_ago_text'     => esc_html__( 'days ago', 'dotdigital' ),
			'today'             => esc_html__( 'Today', 'dotdigital' ),
			'yesterday'         => esc_html__( 'Yesterday', 'dotdigital' ),
			'week_ago'          => esc_html__( 'Week ago', 'dotdigital' ),
			'weeks_ago'         => esc_html__( 'weeks ago', 'dotdigital' ),
			'month_ago'         => esc_html__( 'Month ago', 'dotdigital' ),
			'months_ago'        => esc_html__( 'months ago', 'dotdigital' ),
			'year_ago'          => esc_html__( 'Year ago', 'dotdigital' ),
			'years_ago'         => esc_html__( 'years ago', 'dotdigital' ),
		);

		$defaults = array_merge( $defaults, apply_filters( 'dotdigital_get_object_time_defaults', array() ) );

		extract( $args );

		$object_type  = isset( $object_type ) ? $object_type : $defaults['object_type'];
		$comment_args = isset( $comment_args ) ? $comment_args : $defaults['comment_args'];

		$format        = isset( $format ) ? $format : $defaults['format'];
		$time_variant  = isset( $time_variant ) ? $time_variant : $defaults['time_variant'];
		$output_format = isset( $output_format ) ? $output_format : $defaults['output_format'];
		$screen_reader = isset( $screen_reader ) ? $screen_reader : $defaults['screen_reader'];

		$before = isset( $before ) ? $before : $defaults['before'];
		$after  = isset( $after ) ? $after : $defaults['after'];

		$use_link        = isset( $use_link ) ? $use_link : $defaults['use_link'];
		$link_variant    = isset( $link_variant ) ? $link_variant : $defaults['link_variant'];
		$link_class      = isset( $link_class ) ? $link_class : $defaults['link_class'];
		$link_attributes = isset( $link_attributes ) ? $link_attributes : $defaults['link_attributes'];

		$time_tag_class      = isset( $time_tag_class ) ? $time_tag_class : $defaults['time_tag_class'];
		$time_tag_attributes = isset( $time_tag_attributes ) ? $time_tag_attributes : $defaults['time_tag_attributes'];

		$days_ago          = isset( $days_ago ) ? $days_ago : $defaults['days_ago'];
		$days_ago_max_days = isset( $days_ago_max_days ) ? $days_ago_max_days : $defaults['days_ago_max_days'];
		$days_ago_text     = isset( $days_ago_text ) ? $days_ago_text : $defaults['days_ago_text'];
		$today             = isset( $today ) ? $today : $defaults['today'];
		$yesterday         = isset( $yesterday ) ? $yesterday : $defaults['yesterday'];
		$week_ago          = isset( $week_ago ) ? $week_ago : $defaults['week_ago'];
		$weeks_ago         = isset( $weeks_ago ) ? $weeks_ago : $defaults['weeks_ago'];
		$month_ago         = isset( $month_ago ) ? $month_ago : $defaults['month_ago'];
		$months_ago        = isset( $months_ago ) ? $months_ago : $defaults['months_ago'];
		$year_ago          = isset( $year_ago ) ? $year_ago : $defaults['year_ago'];
		$years_ago         = isset( $years_ago ) ? $years_ago : $defaults['years_ago'];

		$out = '';

		if ( ! in_array( $object_type, array( 'post', 'comment' ) ) ) {
			return $out;
		}

		if ( ! in_array( $time_variant, array( 'published', 'updated' ) ) || 'comment' == $object_type ) {
			$time_variant = 'published';
		}

		$object_id = '';
		$time      = '';
		$time_diff = '';

		if ( 'post' == $object_type ) {

			$object_id = isset( $post_id ) ? $post_id : get_the_ID();

			if ( 'published' == $time_variant ) {
				$time      = get_the_date( $format, $object_id );
				$time_diff = new DateTime( get_the_date( '', $object_id ) . 'T' . get_the_time( 'H:i', $object_id ) );
			}

			if ( 'updated' == $time_variant ) {
				$time      = get_the_modified_date( $format, $object_id );
				$time_diff = new DateTime( get_the_modified_date( '', $object_id ) . 'T' . get_the_modified_time( 'H:i', $object_id ) );
			}
		}

		if ( 'comment' == $object_type ) {

			$object_id = isset( $comment_id ) ? $comment_id : get_comment_ID();

			$time      = get_comment_date( $format, $object_id );
			$time_diff = new DateTime( get_comment_date( '', $object_id ) . 'T' . get_comment_date( 'H:i', $object_id ) );
		}

		if ( '' != $time ) {

			if ( '' != $time_diff && $days_ago ) {

				$time_diff   = $time_diff->diff( new DateTime( 'NOW' ) );
				$time_days   = $time_diff->days;
				$time_months = $time_diff->m;
				$time_years  = $time_diff->y;

				if ( $days_ago_max_days > 0 ) {
					$days_ago = ( $days_ago_max_days >= $time_days );
				}

				if ( $days_ago ) {

					if ( $time_years > 0 ) {

						switch ( $time_years ) {
							case 1:
								$time = $year_ago;
								break;
							default:
								$time = $time_years . ' ' . $years_ago;
								break;
						}

					} elseif ( $time_months > 0 ) {

						switch ( $time_months ) {
							case 1:
								$time = $month_ago;
								break;
							default:
								$time = $time_months . ' ' . $months_ago;
								break;
						}

					} else {

						switch ( $time_days ) {
							case 0:
								$time = $today;
								break;
							case 1:
								$time = $yesterday;
								break;
							case $time_days > 1 && $time_days < 7:
								$time = $time_days . ' ' . $days_ago_text;
								break;
							case $time_days >= 7 && $time_days < 14:
								$time = $week_ago;
								break;
							case $time_days >= 14 && $time_days < 30:
								$time = floor( $time_days / 7 ) . ' ' . $weeks_ago;
								break;
							default:
								$time = $time_days . ' ' . $days_ago_text;
								break;
						}
					}
				}
			}

			$time_iso = '';

			if ( 'post' == $object_type ) {
				$time_iso = get_the_date( 'c' );
			}

			if ( 'comment' == $object_type ) {
				$time_iso = get_comment_date( 'c' );
			}

			if ( ! in_array( $output_format, array( 'time-tag', 'simple' ) ) ) {
				$output_format = 'time-tag';
			}

			$time_string = '';

			if ( 'time-tag' == $output_format ) {

				$time_string = sprintf( '<time class="%s%s" datetime="%s"%s>%s</time>',
					$time_variant,
					( '' != $time_tag_class ) ? ' ' . $time_tag_class : '',
					$time_iso,
					( '' != $time_tag_attributes ) ? ' ' . $time_tag_attributes : '',
					$time
				);
			}

			if ( 'simple' == $output_format ) {
				$time_string = $time;
			}

			$out .= $before;

			if ( '' != $screen_reader ) {
				$out .= '<span class="screen-reader-text">' . $screen_reader . '</span>';
			}

			if ( $use_link ) {

				if ( ! in_array( $link_variant, array( 'year', 'month', 'day' ) ) ) {
					$link_variant = 'day';
				}

				$time_url = '';

				if ( 'post' == $object_type ) {

					switch ( $link_variant ) {
						case 'year':
							$time_url = esc_url( get_year_link(
								get_the_date( 'Y', $object_id )
							) );
							break;
						case 'month':
							$time_url = esc_url( get_month_link(
								get_the_date( 'Y', $object_id ),
								get_the_date( 'm', $object_id )
							) );
							break;
						case 'day':
						default:
							$time_url = esc_url( get_day_link(
								get_the_date( 'Y', $object_id ),
								get_the_date( 'm', $object_id ),
								get_the_date( 'd', $object_id )
							) );
							break;
					}
				}

				if ( 'comment' == $object_type ) {
					$time_url = esc_url( get_comment_link( $object_id, $comment_args ) );
				}

				$out .= sprintf( '<a%s href="%s"%s>%s</a>',
					( '' != $link_class ) ? ' ' . 'class="' . $link_class . '"' : '',
					esc_url( $time_url ),
					( '' != $link_attributes ) ? ' ' . $link_attributes : '',
					$time_string
				);

			} else {
				$out .= $time_string;
			}

			$out .= $after;
		}

		return apply_filters( 'dotdigital_get_object_time', $out );
	}
endif;


if ( ! function_exists( 'dotdigital_get_the_date' ) ) :
	/**
	 * Retrieve formatted post date.
	 */
	function dotdigital_get_the_date( $args = array() ) {

		if ( ! array_key_exists( 'object_type', $args ) ) {
			$args['object_type'] = 'post';
		}

		if ( ! array_key_exists( 'format', $args ) ) {
			$args['format'] = get_option( 'date_format' );
		}

		return dotdigital_get_object_time( $args );
	}
endif;


if ( ! function_exists( 'dotdigital_the_date' ) ) :
	/**
	 * Echo formatted post date.
	 */
	function dotdigital_the_date( $args = array() ) {

		echo wp_kses( dotdigital_get_the_date( $args ), dotdigital_tt_kses_list( $args ) );
	}
endif;


if ( ! function_exists( 'dotdigital_get_the_time' ) ) :
	/**
	 * Retrieve formatted post time.
	 */
	function dotdigital_get_the_time( $args = array() ) {

		if ( ! array_key_exists( 'object_type', $args ) ) {
			$args['object_type'] = 'post';
		}

		if ( ! array_key_exists( 'format', $args ) ) {
			$args['format'] = get_option( 'time_format' );
		}

		return dotdigital_get_object_time( $args );
	}
endif;


if ( ! function_exists( 'dotdigital_the_time' ) ) :
	/**
	 * Echo formatted post time.
	 */
	function dotdigital_the_time( $args = array() ) {

		echo wp_kses( dotdigital_get_the_time( $args ), dotdigital_tt_kses_list( $args ) );
	}
endif;


if ( ! function_exists( 'dotdigital_get_comment_date' ) ) :
	/**
	 * Retrieve formatted comment date.
	 */
	function dotdigital_get_comment_date( $args = array() ) {

		if ( ! array_key_exists( 'object_type', $args ) ) {
			$args['object_type'] = 'comment';
		}

		if ( ! array_key_exists( 'format', $args ) ) {
			$args['format'] = get_option( 'date_format' );
		}

		return dotdigital_get_object_time( $args );
	}
endif;


if ( ! function_exists( 'dotdigital_comment_date' ) ) :
	/**
	 * Echo formatted comment date.
	 */
	function dotdigital_comment_date( $args = array() ) {

		echo wp_kses( dotdigital_get_comment_date( $args ), dotdigital_tt_kses_list( $args ) );
	}
endif;


if ( ! function_exists( 'dotdigital_get_comment_time' ) ) :
	/**
	 * Retrieve formatted comment time.
	 */
	function dotdigital_get_comment_time( $args = array() ) {

		if ( ! array_key_exists( 'object_type', $args ) ) {
			$args['object_type'] = 'comment';
		}

		if ( ! array_key_exists( 'format', $args ) ) {
			$args['format'] = get_option( 'time_format' );
		}

		return dotdigital_get_object_time( $args );
	}
endif;


if ( ! function_exists( 'dotdigital_comment_time' ) ) :
	/**
	 * Echo formatted comment time.
	 */
	function dotdigital_comment_time( $args = array() ) {

		echo wp_kses( dotdigital_get_comment_time( $args ), dotdigital_tt_kses_list( $args ) );
	}
endif;


/**
 * Comments Counter.
 * --------------------------------------------------------------------------------------------------------------------
 */


if ( ! function_exists( 'dotdigital_get_comments_counter' ) ) :
	/**
	 * Retrieve formatted post comments counter.
	 */
	function dotdigital_get_comments_counter( $args = array() ) {

		// args defaults
		$defaults = array(

			'output_counter'     => true,
			'use_closed_message' => true,
			'screen_reader'      => '',

			'before' => '',
			'after'  => '',

			'use_link'        => true,
			'link_class'      => '',
			'link_attributes' => '',

			'comment'             => 'Comment',
			'comments'            => 'Comments',
			'live_a_comment'      => 'Leave a comment',
			'comments_are_closed' => 'Comments are closed',
		);

		$defaults = array_merge( $defaults, apply_filters( 'dotdigital_get_comments_counter_defaults', array() ) );

		extract( $args );

		$post_id = isset( $post_id ) ? $post_id : get_the_ID();

		$output_counter     = isset( $output_counter ) ? $output_counter : $defaults['output_counter'];
		$use_closed_message = isset( $use_closed_message ) ? $use_closed_message : $defaults['use_closed_message'];
		$screen_reader      = isset( $screen_reader ) ? $screen_reader : $defaults['screen_reader'];

		$before = isset( $before ) ? $before : $defaults['before'];
		$after  = isset( $after ) ? $after : $defaults['after'];

		$use_link        = isset( $use_link ) ? $use_link : $defaults['use_link'];
		$link_class      = isset( $link_class ) ? $link_class : $defaults['link_class'];
		$link_attributes = isset( $link_attributes ) ? $link_attributes : $defaults['link_attributes'];

		$comment             = isset( $comment ) ? $comment : $defaults['comment'];
		$comments            = isset( $comments ) ? $comments : $defaults['comments'];
		$live_a_comment      = isset( $live_a_comment ) ? $live_a_comment : $defaults['live_a_comment'];
		$comments_are_closed = isset( $comments_are_closed ) ? $comments_are_closed : $defaults['comments_are_closed'];

		$out = '';

		$comments_num = get_comments_number( $post_id );

		$comment_string = '';
		$comment_url    = '';

		$counter = $output_counter ? $comments_num . ' ' : '';

		if ( $comments_num ) {
			$comment_string = $counter . ( $comments_num == 1 ? $comment : $comments );
			$comment_url    = get_comments_link( $post_id );

		} elseif ( comments_open() ) {
			$comment_string = $live_a_comment;
			$comment_url    = get_comments_link( $post_id );

		} elseif ( $use_closed_message ) {
			$comment_string = $comments_are_closed;
		}

		$screen_reader = '<span class="screen-reader-text">'
		                 . $screen_reader . $comment_string . '</span>';

		$out .= $before;

		$out .= $screen_reader;

		if ( $use_link && '' != $comment_url ) {

			$out .= sprintf( '<a%s href="%s"%s>%s</a>',
				( '' != $link_class ) ? ' ' . 'class="' . $link_class . '"' : '',
				esc_url( $comment_url ),
				( '' != $link_attributes ) ? ' ' . $link_attributes : '',
				$comment_string
			);
		} else {
			$out .= $comment_string;
		}

		$out .= $after;

		return apply_filters( 'dotdigital_get_comments_counter', $out );
	}
endif;


if ( ! function_exists( 'dotdigital_comments_counter' ) ) :
	/**
	 * Echo formatted post comments counter.
	 */
	function dotdigital_comments_counter( $args = array() ) {

		echo wp_kses( dotdigital_get_comments_counter( $args ), dotdigital_tt_kses_list( $args ) );
	}
endif;


/**
 * Author.
 * --------------------------------------------------------------------------------------------------------------------
 */


if ( ! function_exists( 'dotdigital_get_the_author' ) ) :
	/**
	 * Retrieve formatted author vcard.
	 */
	function dotdigital_get_the_author( $args = array() ) {

		// args defaults
		$defaults = array(

			'before' => '',
			'after'  => '',

			'crop' => - 1,

			'use_link'        => true,
			'link_class'      => '',
			'link_attributes' => '',
		);

		$defaults = array_merge( $defaults, apply_filters( 'dotdigital_get_the_author_defaults', array() ) );

		extract( $args );

		$before = isset( $before ) ? $before : $defaults['before'];
		$after  = isset( $after ) ? $after : $defaults['after'];

		$crop = isset( $crop ) ? $crop : $defaults['crop'];

		$use_link        = isset( $use_link ) ? $use_link : $defaults['use_link'];
		$link_class      = isset( $link_class ) ? $link_class : $defaults['link_class'];
		$link_attributes = isset( $link_attributes ) ? $link_attributes : $defaults['link_attributes'];

		$out = '';

		$author = get_the_author();

		if ( $crop > - 1 ) {
			$author = substr( $author, 0, $crop );
		}

		if ( '' != $author ) {

			$out .= $before;

			if ( $use_link ) {

				$out .= sprintf( '<a%s href="%s"%s>%s</a>',
					( '' != $link_class ) ? ' ' . 'class="' . $link_class . '"' : '',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					( '' != $link_attributes ) ? ' ' . $link_attributes : '',
					$author
				);
			} else {
				$out .= $author;
			}

			$out .= $after;
		}

		return apply_filters( 'dotdigital_get_the_author', $out );
	}
endif;


if ( ! function_exists( 'dotdigital_the_author' ) ) :
	/**
	 * Echo formatted author vcard.
	 */
	function dotdigital_the_author( $args = array() ) {

		echo wp_kses( dotdigital_get_the_author( $args ), dotdigital_tt_kses_list( $args ) );
	}
endif;


/**
 * Sticky Marker.
 * --------------------------------------------------------------------------------------------------------------------
 */


if ( ! function_exists( 'dotdigital_get_sticky_marker' ) ) :
	/**
	 * Retrieve formatted sticky marker.
	 */
	function dotdigital_get_sticky_marker( $args = array() ) {

		// args defaults
		$defaults = array(

			'sticky_symbol' => 'fa fa-paperclip',

			'before' => '',
			'after'  => '',

			'class'      => '',
			'attributes' => '',
		);

		$defaults = array_merge( $defaults, apply_filters( 'dotdigital_get_sticky_marker_defaults', array() ) );

		extract( $args );

		$sticky_symbol = isset( $sticky_symbol ) ? $sticky_symbol : $defaults['sticky_symbol'];

		$before = isset( $before ) ? $before : $defaults['before'];
		$after  = isset( $after ) ? $after : $defaults['after'];

		$class      = isset( $class ) ? $class : $defaults['class'];
		$attributes = isset( $attributes ) ? $attributes : $defaults['attributes'];

		$out = '';

		if ( is_sticky() && is_home() && ! is_paged() ) {

			$out .= $before;

			$out .= sprintf( '<i%s%s></i>',
				' ' . 'class="' . $sticky_symbol . ( '' != $class ? ' ' . $class : '' ) . '"',
				( '' != $attributes ) ? ' ' . $attributes : ''
			);

			$out .= $after;
		}

		return apply_filters( 'dotdigital_get_sticky_marker', $out );
	}
endif;


if ( ! function_exists( 'dotdigital_sticky_marker' ) ) :
	/**
	 * Echo formatted sticky marker.
	 */
	function dotdigital_sticky_marker( $args = array() ) {

		echo wp_kses( dotdigital_get_sticky_marker( $args ), dotdigital_tt_kses_list( $args ) );
	}
endif;