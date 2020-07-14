<?php

if ( ! function_exists( 'dotdigital_action_register_required_plugins' ) ):
	/** @internal */
	function dotdigital_action_register_required_plugins() {
		$plugins = array(
			array(
				'name'     => esc_html__( 'Unyson', 'dotdigital' ),
				'slug'     => 'unyson',
				'required' => true,
			),
			array(
				'name'     => esc_html__( 'Classic editor', 'dotdigital' ),
				'slug'     => 'classic-editor',
				'required' => true,
			),
			array(
				'name'     => esc_html__( 'MWTemplates Theme Addons', 'dotdigital' ),
				'slug'     => 'mwt-addons',
                'source'   => esc_url( 'http://webdesign-finder.com/dotdigital/plugins/mwt-addons.zip' ),
				'required' => true,
				'version'  => '1.1.0',
			),
            array(
                'name'     => esc_html__( 'MWT Unyson Extension', 'dotdigital' ),
                'slug'     => 'mwt-unyson-extensions',
                'source'   => esc_url( 'http://webdesign-finder.com/dotdigital/plugins/mwt-unyson-extensions.zip' ),
                'required' => true,
                'version'  => '1.1.0',
            ),
            array (
                'name'      => 'MWTemplates Widgets',
                'slug'      => 'mwt-widgets',
                'source'    => esc_url('http://webdesign-finder.com/dotdigital/plugins/mwt-widgets.zip'),
                'required'  => true,
                'version'   => '1.0.0',
            ),
			array(
				'name'     => esc_html__( 'MWT Helpers', 'dotdigital' ),
				'slug'     => 'mwt-helpers',
                'source'   => esc_url( 'http://webdesign-finder.com/dotdigital/plugins/mwt-helpers.zip' ),
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'Woocommerce', 'dotdigital' ),
				'slug'     => 'woocommerce',
				'required' => true,
			),
			array(
				'name'     => esc_html__( 'MailChimp', 'dotdigital' ),
				'slug'     => 'mailchimp-for-wp',
				'required' => true,
			),
            array(
                'name'     => esc_html__( 'Accordion and Accordion Slider', 'dotdigital' ),
                'slug'     => 'accordion-and-accordion-slider',
                'required' => true,
            ),
			array(
				'name'     => esc_html__( 'Slider Revolution', 'dotdigital' ),
				'slug'     => 'rev-slider',
				'source'   => esc_url( 'http://webdesign-finder.com/remote-demo-content/common-plugins-original/revslider.zip' ),
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'Helpdesk Plugin', 'dotdigital' ),
				'slug'     => 'wordpress-helpdesk',
				'source'   => esc_url( 'http://webdesign-finder.com/remote-demo-content/common-plugins-original/wordpress-helpdesk.zip' ),
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'Redux Framework (for Helpdesk Plugin)', 'dotdigital' ),
				'slug'     => 'redux-framework',
				'required' => true,
			),
			array(
				'name'     => esc_html__( 'RVM - Responsive Vector Maps', 'dotdigital' ),
				'slug'     => 'responsive-vector-maps',
				'required' => true,
			),
			array(
				'name'     => esc_html__( 'Sass Compiler', 'dotdigital' ),
				'slug'     => 'wp-scss',
				'required' => true,
			),
			array(
				'name'     => esc_html__( 'Booked plugin', 'dotdigital' ),
				'slug'     => 'booked',
                'source'   => esc_url( 'http://webdesign-finder.com/dotdigital/plugins/booked.zip' ),
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'Envato Market', 'dotdigital' ),
				'slug'     => 'envato-market',
				'source'   => esc_url( 'https://envato.github.io/wp-envato-market/dist/envato-market.zip' ),
				'required' => true,
			),
			array(
				'name'     => esc_html__( 'Instagram Feed', 'dotdigital' ),
				'slug'     => 'instagram-feed',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'User custom avatar', 'dotdigital' ),
				'slug'     => 'wp-user-avatar',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'AccessPress Social Counter', 'dotdigital' ),
				'slug'     => 'accesspress-social-counter',
				'required' => true
			),
			array (
				'name'             => esc_html__('Snazzy Maps', 'dotdigital'),
				'slug'             => 'snazzy-maps',
				'source'           => 'http://webdesign-finder.com/remote-demo-content/common-plugins-original/snazzy-maps.1.1.5.zip',
				'required'         => true,
				'version'          => '1.1.5',
			),
			array(
				'name'     => esc_html__( 'Widget CSS Classes', 'dotdigital' ),
				'slug'     => 'widget-css-classes',
				'required' => false,
			),
		);
		$config  = array(
			'domain'       => 'dotdigital',
			'dismissable'  => false,
			'is_automatic' => false
		);
		tgmpa( $plugins, $config );
	}
endif;