<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

if (! class_exists('Redux')) {
    return;
}

    // This is your option name where all the Redux data is helpdeskd.
    $opt_name = "wordpress_helpdesk_options";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'wordpress_helpdesk_options',
        'use_cdn' => true,
        'dev_mode' => false,
        'display_name' => __('WordPress Helpdesk', 'wordpress-helpdesk'),
        'display_version' => '1.7.4',
        'page_title' => __('WordPress Helpdesk', 'wordpress-helpdesk'),
        'update_notice' => true,
        'intro_text' => '',
        'footer_text' => '&copy; ' . date('Y') . ' weLaunch',
        'admin_bar' => true,
        'menu_type' => 'submenu',
        'menu_title' => __('Settings', 'wordpress-helpdesk'),
        'allow_sub_menu' => true,
        'page_parent' => 'edit.php?post_type=ticket',
        'page_parent_post_type' => 'ticket',
        'customizer' => false,
        'default_mark' => '*',
        'hints' => array(
            'icon_position' => 'right',
            'icon_color' => 'lightgray',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => true,
        'output_tag' => true,
        'settings_api' => true,
        'cdn_check_time' => '1440',
        'compiler' => true,
        'page_permissions' => 'manage_options',
        'save_defaults' => true,
        'show_import_export' => true,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => true,
    );

    Redux::setArgs($opt_name, $args);

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'help-tab',
            'title'   => __('Information', 'wordpress-helpdesk'),
            'content' => __('<p>Need support? Please use the comment function on codecanyon.</p>', 'wordpress-helpdesk')
        ),
    );
    Redux::setHelpTab($opt_name, $tabs);

    // Set the help sidebar
    // $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'wordpress-helpdesk' );
    // Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    Redux::setSection($opt_name, array(
        'title'  => __('Helpdesk', 'wordpress-helpdesk'),
        'id'     => 'general',
        'desc'   => __('Need support? Please use the comment function on codecanyon.', 'wordpress-helpdesk'),
        'icon'   => 'el el-home',
    ));

    Redux::setSection($opt_name, array(
        'title'      => __('General', 'wordpress-helpdesk'),
        'id'         => 'general-settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'enable',
                'type'     => 'switch',
                'title'    => __('Enable', 'wordpress-helpdesk'),
                'subtitle' => __('Enable TotalDesk.', 'wordpress-helpdesk'),
                'default'  => '1',
            ),
            array(
                'id'       => 'supportSidebarDisplay',
                'type'     => 'select',
                'title'    => __('Sidebar Display', 'wordpress-helpdesk'),
                'subtitle' => __('Where you want to show the sidebar.', 'wordpress-helpdesk'),
                'options' => array(
                    'none' => __('None', 'wordpress-helpdesk'),
                    'only_faq' => __('Only in Knowledge Base', 'wordpress-helpdesk'),
                    'only_ticket' => __('Only for Ticket pages', 'wordpress-helpdesk'),
                    'both' => __('Show in Ticket & FAQ pages', 'wordpress-helpdesk'),
                ),
                'default' => 'both',
            ),
            array(
                'id'       => 'supportSidebarPosition',
                'type'     => 'select',
                'title'    => __('Sidebar Position', 'wordpress-helpdesk'),
                'subtitle' => __('Left or Right sidebar.', 'wordpress-helpdesk'),
                'options' => array(
                    'left' => __('Left', 'wordpress-helpdesk'),
                    'right' => __('Right', 'wordpress-helpdesk'),
                    ),
                'default' => 'left',
            ),
            array(
                'id'       => 'excel2007',
                'type'     => 'checkbox',
                'title'    => __('Use Excel 2007', 'wordpress-helpdesk'),
                'subtitle' => __('If you can not work with xlsx (Excel 2007 and higher) files, check this. You then can work with normal .xls files.', 'wordpress-helpdesk'),
                'default'  => '0',
            ),
            array(
                'id'   => 'export',
                'type' => 'info',
                'desc' => '<div style="text-align:center;">
                    <a href="' . get_admin_url() . 'edit.php?post_type=stores&page=wordpress_helpdesk_options_options&export-tickets=all" class="button button-success">' . __('Export all Tickets', 'wordpress-helpdesk') . '</a>
                    </div>'
            ),
        )
    ));

    $defaults = array(
        array(
            'id'     =>'defaultStatus',
            'type' => 'select',
            'data' => 'terms',
            'args' => array(
                'taxonomies' => array( 'ticket_status' ),
                'hide_empty' => false,
            ),
            'title' => __('Default New Ticket Status', 'wordpress-helpdesk'),
            'subtitle' => __('The default status for new tickets.', 'wordpress-helpdesk'),
        ),
        array(
            'id'     =>'defaultSolvedStatus',
            'type' => 'select',
            'data' => 'terms',
            'args' => array(
                'taxonomies' => array( 'ticket_status' ),
                'hide_empty' => false,
            ),
            'title' => __('Default Solved (closed) Status', 'wordpress-helpdesk'),
            'subtitle' => __('Set the name of the Solved (closed) ticket status.', 'wordpress-helpdesk'),
        ),
        array(
            'id'     =>'defaultType',
            'type' => 'select',
            'data' => 'terms',
            'args' => array(
                'taxonomies' => array( 'ticket_type' ),
                'hide_empty' => false,
            ),
            'title' => __('Default Type', 'wordpress-helpdesk'),
            'subtitle' => __('The default type for new tickets.', 'wordpress-helpdesk'),
        ),
        array(
            'id'     =>'defaultPriority',
            'type' => 'select',
            'data' => 'terms',
            'args' => array(
                'taxonomies' => array( 'ticket_priority' ),
                'hide_empty' => false,
            ),
            'title' => __('Default priority', 'wordpress-helpdesk'),
            'subtitle' => __('The default priority for new tickets.', 'wordpress-helpdesk'),
        ),
        array(
            'id'     =>'defaultSystem',
            'type' => 'select',
            'data' => 'terms',
            'args' => array(
                'taxonomies' => array( 'ticket_system' ),
                'hide_empty' => false,
            ),
            'title' => __('Default Department', 'wordpress-helpdesk'),
            'subtitle' => __('The default Department for new tickets.', 'wordpress-helpdesk'),
        ),
        array(
            'id'       => 'defaultAgent',
            'type'     => 'select',
            'title'    => __('Default Agent', 'wordpress-helpdesk'),
            'subtitle' => __('The default user for new tickets.', 'wordpress-helpdesk'),
            'data' => 'users',
        ),
        array(
            'id'       => 'defaultAgentsByDepartment',
            'type'     => 'section',
            'title'    => __('Default Agents by Department', 'wordpress-helpdesk'),
            'subtitle'    => __('Choose a default agent per selected department.', 'wordpress-helpdesk'),
            'indent'   => true,
        ),
    );

    $terms = get_terms( array(
        'hide_empty' => false,
    ) );
    $departmentDefaultAgents = array();
    foreach ($terms as $term) {
        if($term->taxonomy == "ticket_system") {
            $departmentDefaultAgents[] = array(
                'id'       => 'defaultAgent' . $term->term_id,
                'type'     => 'select',
                'title'    => sprintf( __('Default Agent for %s', 'wordpress-helpdesk'), $term->name),
                'subtitle' => sprintf( __('The default user for %s.', 'wordpress-helpdesk'), $term->name),
                'data' => 'users',
            );
        }
    }
    $defaults = array_merge($defaults, $departmentDefaultAgents);

    Redux::setSection($opt_name, array(
        'title'      => __('Defaults', 'wordpress-helpdesk'),
        'id'         => 'default-settings',
        'subsection' => true,
        'fields'     => $defaults
    ));


    Redux::setSection($opt_name, array(
        'title'      => __('Desktop Notifications', 'wordpress-helpdesk'),
        'id'         => 'desktop-notifications',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'enableDesktopNotifications',
                'type'     => 'switch',
                'title'    => __('Enable Desktop Notifications', 'wordpress-helpdesk'),
                'default'  => '0',
            ),
            array(                
                'id'       => 'desktopNotificationsAJAXInterval',
                'type'     => 'spinner',
                'title'    => __('AJAX Interval', 'wordpress-helpdesk'),
                'subtitle' => __('Increase the interval (in miliseconds) to save server performance.', 'wordpress-helpdesk'),
                'default'  => '2000',
                'min'      => '1',
                'step'     => '10',
                'max'      => '9999999999',
                'required' => array('enableDesktopNotifications','equals','1'),
            ),
            array(
                'id'       => 'desktopNotificationsWelcomeTitle',
                'type'     => 'text',
                'title'    => __('Welcome Title', 'wordpress-helpdesk'),
                'default'  => __('Welcome to Helpdesk', 'wordpress-helpdesk'),
                'required' => array('enableDesktopNotifications','equals','1'),
            ),
            array(
                'id'       => 'desktopNotificationsWelcomeText',
                'type'     => 'text',
                'title'    => __('Welcome Text', 'wordpress-helpdesk'),
                'default'  => __('How can we help you today?', 'wordpress-helpdesk'),
                'required' => array('enableDesktopNotifications','equals','1'),
            ),
            array(                
                'id'       => 'desktopNotificationsWelcomeTimeout',
                'type'     => 'spinner',
                'title'    => __('Welcome Timout', 'wordpress-helpdesk'),
                'subtitle' => __('Time in minutes when the welcome message should pop up again.', 'wordpress-helpdesk'),
                'default'  => '120',
                'min'      => '1',
                'step'     => '10',
                'max'      => '9999999999',
                'required' => array('enableDesktopNotifications','equals','1'),
            ),
            array(
                'id'        =>'desktopNotificationsIcon',
                'type'      => 'media',
                'url'       => true,
                'title'     => __('Set an icon', 'wordpress-helpdesk'),
                'subtitle'  => __('The icon must be in square format.', 'wordpress-helpdesk'),
                'args'      => array(
                    'teeny'            => false,
                ),
                'required' => array('enableDesktopNotifications','equals','1'),
            ),
            array(
                'id'        =>'desktopNotificationsTimeout',
                'title'     => __('Timeout', 'wordpress-helpdesk'),
                'subtitle'  => __('Set the time when the notification automatically hides.', 'wordpress-helpdesk'),
                'type'     => 'spinner',
                'default'  => '4000',
                'min'      => '100',
                'step'     => '100',
                'max'      => '20000',
                'required' => array('enableDesktopNotifications','equals','1'),
            ),
        )
    ));


    Redux::setSection($opt_name, array(
        'title'      => __('FAQ – Knowledge Base', 'wordpress-helpdesk'),
        'desc'       => __('A custom Post Type FAQ will be created. Tickets can be copied into a new FAQ.', 'wordpress-helpdesk'),
        'id'         => 'faq-settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'enableFAQ',
                'type'     => 'switch',
                'title'    => __('Enable the FAQs Knowledge Base', 'wordpress-helpdesk'),
                'subtitle' => __('Check this to enable our FAQ feature.', 'wordpress-helpdesk'),
                'default'  => '1',
            ),
            array(
                'id'       => 'FAQKnowledgeBasePage',
                'type'     => 'select',
                'title'    => __('Knowledge Base Page', 'wordpress-helpdesk'),
                'subtitle' => __('Make sure the [knowledge_base] shortcode is placed there. After saving go to settings > permalinks and save.', 'wordpress-helpdesk'),
                'data'     => 'pages',
                'required' => array('enableFAQ','equals','1'),
            ),
            array(
                'id'       => 'FAQShowSearch',
                'type'     => 'checkbox',
                'title'    => __('Show FAQ Search in Knowledge Base', 'wordpress-helpdesk'),
                'subtitle'    => __('You can also use the widget instead of this search.', 'wordpress-helpdesk'),
                'default'  => '1',
                'required' => array('enableFAQ','equals','1'),
            ),
            array(
                'id'       => 'FAQSearchComments',
                'type'     => 'checkbox',
                'title'    => __('Search in Comments', 'wordpress-helpdesk'),
                'subtitle'    => __('If no FAQs found, fall back to comment search.', 'wordpress-helpdesk'),
                'default'  => '1',
                'required' => array('enableFAQ','equals','1'),
            ),
            array(
                'id'        =>'FAQSearchMaxResults',
                'title'     => __('Maximum Live Search Results', 'wordpress-helpdesk'),
                'subtitle'  => __('Set maximum results for FAQ live search.', 'wordpress-helpdesk'),
                'type'     => 'spinner',
                'default'  => '4',
                'min'      => '1',
                'step'     => '1',
                'max'      => '10',
                'required' => array('enableFAQ','equals','1'),
            ),
            array(
                'id'       => 'FAQShowTopicTitle',
                'type'     => 'checkbox',
                'title'    => __('Show Topic Title', 'wordpress-helpdesk'),
                'default'  => '0',
                'required' => array('enableFAQ','equals','1'),
            ),
            array(
                'id'       => 'FAQShowTopicTitleAppendix',
                'type'     => 'text',
                'title'    => __('Topic title Appendix', 'wordpress-helpdesk'),
                'required' => array('FAQShowTopicTitle','equals','1'),
            ),

            array(
                'id'       => 'FAQShowBackToParentTopic',
                'type'     => 'checkbox',
                'title'    => __('Show Back to Parent Topic Link', 'wordpress-helpdesk'),
                'default'  => '0',
                'required' => array('enableFAQ','equals','1'),
            ),
            array(
                'id'       => 'FAQShowViews',
                'type'     => 'checkbox',
                'title'    => __('Show Views Count', 'wordpress-helpdesk'),
                'default'  => '1',
                'required' => array('enableFAQ','equals','1'),
            ),
            array(
                'id'       => 'FAQRatingEnable',
                'type'     => 'checkbox',
                'title'    => __('Show Rating', 'wordpress-helpdesk'),
                'default'  => '1',
                'required' => array('enableFAQ','equals','1'),
            ),
            array(
                'id'       => 'FAQRatingDisableDislikeButton',
                'type'     => 'checkbox',
                'title'    => __('Disable the Rating dislike button', 'wordpress-helpdesk'),
                'default'  => '0',
                'required' => array('enableFAQ','equals','1'),
            ),
            array(
                'id'       => 'FAQMasonry',
                'type'     => 'checkbox',
                'title'    => __('Masonry', 'wordpress-helpdesk'),
                'default'  => '0',
                'required' => array('enableFAQ','equals','1'),
            ),
            array(
                'id'       => 'FAQLayout',
                'type'     => 'select',
                'title'    => __('Topics Layout', 'wordpress-helpdesk'),
                'options'  => array(
                    'list' => __('List Layout', 'wordpress-helpdesk'),
                    'boxed' => __('Boxed Layout', 'wordpress-helpdesk'),
                ),
                'default' => 'boxed',
                'required' => array('enableFAQ','equals','1'),
            ),
            array(
                'id'        =>'FAQColumns',
                'title'     => __('Topics Columns', 'wordpress-helpdesk'),
                'subtitle'  => __('Default Topic columns. Needs to be deviable by 12.', 'wordpress-helpdesk'),
                'type'     => 'spinner',
                'default'  => '2',
                'min'      => '1',
                'step'     => '1',
                'max'      => '10',
                'required' => array('enableFAQ','equals','1'),
            ),
            array(
                'id'       => 'FAQItemMasonry',
                'type'     => 'checkbox',
                'title'    => __('Item Masonry', 'wordpress-helpdesk'),
                'default'  => '0',
                'required' => array('enableFAQ','equals','1'),
            ),
            array(
                'id'       => 'FAQHideFAQsWhenSubcategoriesExists',
                'type'     => 'checkbox',
                'title'    => __('Hide FAQs when subcategories exists', 'wordpress-helpdesk'),
                'default'  => '1',
                'required' => array('enableFAQ','equals','1'),
            ),
            array(
                'id'       => 'FAQShowChildren',
                'type'     => 'checkbox',
                'title'    => __('Show Topic Children', 'wordpress-helpdesk'),
                'default'  => '0',
                'required' => array('enableFAQ','equals','1'),
            ),
            array(
                'id'       => 'FAQShowChildCategories',
                'type'     => 'checkbox',
                'title'    => __('Show Topic Children Categories', 'wordpress-helpdesk'),
                'default'  => '1',
                'required' => array('enableFAQ','equals','1'),
            ),
            array(
                'id'        =>'FAQItemColumns',
                'title'     => __('Item Columns', 'wordpress-helpdesk'),
                'subtitle'  => __('Default Topic columns. Needs to be deviable by 12.', 'wordpress-helpdesk'),
                'type'     => 'spinner',
                'default'  => '1',
                'min'      => '1',
                'step'     => '1',
                'max'      => '12',
                'required' => array('enableFAQ','equals','1'),
            ),
            array(
                'id'        =>'FAQLoggedInHideInKnowledgeBase',
                'type'     => 'checkbox',
                'title'     => __('Hide FAQ excerpts for not logged in', 'wordpress-helpdesk'),
                'subtitle'  => __('Hide all FAQ excerpts for not logged in users in the Knwoledge Base', 'wordpress-helpdesk'),
                'default'   => '0',
                'required'  => array('enableFAQ','equals','1'),
            ),
            array(
                'id'       => 'FAQSingleLoggedIn',
                'type'     => 'checkbox',
                'title'    => __('Hide All Single FAQs pages', 'wordpress-helpdesk'),
                'subtitle'  => __('Hide all Single FAQ pages for not logged in users.', 'wordpress-helpdesk'),
                'default'  => '0',
                'required' => array('enableFAQ','equals','1'),
            ),
            array(
                'id'     =>'FAQLoggedInOnly',
                'type' => 'select',
                'data' => 'posts',
                'args' => array('post_type' => array('faq'), 'posts_per_page' => -1),
                'multi' => true,
                'title' => __('Hide some FAQs', 'wordpress-helpdesk'), 
                'subtitle' => __('Show the following FAQs only to logged in Users:', 'wordpress-helpdesk'),
                'required' => array('enableFAQ','equals','1'),
            ),
            array(
                'id'     =>'FAQTopicsLoggedInOnly',
                'type' => 'select',
                'data' => 'terms',
                'args' => array(
                    'taxonomies' => array( 'faq_topics' ),
                    'hide_empty' => false,
                ),
                'multi' => true,
                'title' => __('Hide some Topics', 'wordpress-helpdesk'), 
                'subtitle' => __('Hide complete Topics from not logged in users:', 'wordpress-helpdesk'),
                'required' => array('enableFAQ','equals','1'),
            ),
            array(
                'id'       => 'FAQContentBefore',
                'type'     => 'editor',
                'title'    => __('Content Before FAQ', 'wordpress-helpdesk'),
                'subtitle' =>  __('Accepts shortcodes also.', 'wordpress-helpdesk'),
                'required' => array('enableFAQ','equals','1'),
            ),
            array(
                'id'       => 'FAQContentAfter',
                'type'     => 'editor',
                'title'    => __('Content After FAQ', 'wordpress-helpdesk'),
                'subtitle' =>  __('Accepts shortcodes also.', 'wordpress-helpdesk'),
                'required' => array('enableFAQ','equals','1'),
            ),
        )
    ));

    Redux::setSection($opt_name, array(
        'title'      => __('Form Fields', 'wordpress-helpdesk'),
        'id'         => 'fields-settings',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'fieldsSimple',
                'type'     => 'section',
                'title'    => __('Simple Form Fields', 'wordpress-helpdesk'),
                'subtitle' => __('Fields for the Simple [new_ticket] form. ', 'wordpress-helpdesk'),
                'indent'   => false,
            ),
                array(
                    'id'       => 'fieldsSimpleSystem',
                    'type'     => 'checkbox',
                    'title'    => __('Systems / Project Select Field', 'wordpress-helpdesk'),
                    'default'  => '1',
                ),
                array(
                    'id'       => 'fieldsSimplePriority',
                    'type'     => 'checkbox',
                    'title'    => __('Priority Select Field', 'wordpress-helpdesk'),
                    'default'  => '0',
                ),
                array(
                    'id'       => 'fieldsSimpleTypes',
                    'type'     => 'checkbox',
                    'title'    => __('Types Select Field', 'wordpress-helpdesk'),
                    'default'  => '0',
                ),
                array(
                    'id'       => 'fieldsSimpleWebsiteURL',
                    'type'     => 'checkbox',
                    'title'    => __('Website URL', 'wordpress-helpdesk'),
                    'default'  => '0',
                ),
                array(
                    'id'       => 'fieldsSimpleAttachments',
                    'type'     => 'checkbox',
                    'title'    => __('Attachments field', 'wordpress-helpdesk'),
                    'default'  => '1',
                ),
                array(
                    'id'       => 'fieldsSimpleRequiredCustom',
                    'type'     => 'multi_text',
                    'title'    => esc_html__('Custom Required Fields', 'wordpress-helpdesk'),
                    'subtitle' => esc_html__('Create custom fields here.'),
                    'default'  => array(),
                ),
                array(
                    'id'       => 'fieldsSimpleOptionalCustom',
                    'type'     => 'multi_text',
                    'title'    => esc_html__('Custom Optional Fields', 'wordpress-helpdesk'),
                    'subtitle' => esc_html__('Create custom fields here.'),
                    'default'  => array(),
                ),

            array(
                'id'       => 'fieldsEnvato',
                'type'     => 'section',
                'title'    => __('Envato Form Fields', 'wordpress-helpdesk'),
                'subtitle' => __('Fields for the Simple [new_ticket type="Envato"] form. ', 'wordpress-helpdesk'),
                'indent'   => false,
            ),
                array(
                    'id'       => 'fieldsEnvatoSystem',
                    'type'     => 'checkbox',
                    'title'    => __('Systems / Project Select Field', 'wordpress-helpdesk'),
                    'default'  => '0',
                ),
                array(
                    'id'       => 'fieldsEnvatoPriority',
                    'type'     => 'checkbox',
                    'title'    => __('Priority Select Field', 'wordpress-helpdesk'),
                    'default'  => '0',
                ),
                array(
                    'id'       => 'fieldsEnvatoTypes',
                    'type'     => 'checkbox',
                    'title'    => __('Types Select Field', 'wordpress-helpdesk'),
                    'default'  => '0',
                ),
                array(
                    'id'       => 'fieldsEnvatoWebsiteURL',
                    'type'     => 'checkbox',
                    'title'    => __('Website URL', 'wordpress-helpdesk'),
                    'default'  => '1',
                ),
                array(
                    'id'       => 'fieldsEnvatoAttachments',
                    'type'     => 'checkbox',
                    'title'    => __('Attachments field', 'wordpress-helpdesk'),
                    'default'  => '1',
                ),
                array(
                    'id'       => 'fieldsEnvatoPurchaseCode',
                    'type'     => 'checkbox',
                    'title'    => __('Purchase Code', 'wordpress-helpdesk'),
                    'default'  => '1',
                ),
                array(
                    'id'       => 'fieldsEnvatoItems',
                    'type'     => 'checkbox',
                    'title'    => __('Envato Items', 'wordpress-helpdesk'),
                    'subtitle' => __('A selected Item will be overwritten when an item is found within the purchase code.', 'wordpress-helpdesk'),
                    'default'  => '1',
                ),
                array(
                    'id'       => 'fieldsEnvatoRequiredCustom',
                    'type'     => 'multi_text',
                    'title'    => esc_html__('Custom Envato Required Fields', 'wordpress-helpdesk'),
                    'subtitle' => esc_html__('Create custom fields here.'),
                    'default'  => array(),
                ),
                array(
                    'id'       => 'fieldsEnvatoOptionalCustom',
                    'type'     => 'multi_text',
                    'title'    => esc_html__('Custom Envato Optional Fields', 'wordpress-helpdesk'),
                    'subtitle' => esc_html__('Create custom fields here.'),
                    'default'  => array(),
                ),

            array(
                'id'       => 'fieldsWooCommerce',
                'type'     => 'section',
                'title'    => __('WooCommerce Form Fields', 'wordpress-helpdesk'),
                'subtitle' => __('Fields for the Simple [new_ticket type="WooCommerce"] form. ', 'wordpress-helpdesk'),
                'indent'   => false,
            ),
                array(
                    'id'       => 'fieldsWooCommerceSystem',
                    'type'     => 'checkbox',
                    'title'    => __('Systems / Project Select Field', 'wordpress-helpdesk'),
                    'default'  => '0',
                ),
                array(
                    'id'       => 'fieldsWooCommercePriority',
                    'type'     => 'checkbox',
                    'title'    => __('Priority Select Field', 'wordpress-helpdesk'),
                    'default'  => '0',
                ),
                array(
                    'id'       => 'fieldsWooCommerceTypes',
                    'type'     => 'checkbox',
                    'title'    => __('Types Select Field', 'wordpress-helpdesk'),
                    'default'  => '0',
                ),
                array(
                    'id'       => 'fieldsWooCommerceWebsiteURL',
                    'type'     => 'checkbox',
                    'title'    => __('Website URL', 'wordpress-helpdesk'),
                    'default'  => '1',
                ),
                array(
                    'id'       => 'fieldsWooCommerceAttachments',
                    'type'     => 'checkbox',
                    'title'    => __('Attachments field', 'wordpress-helpdesk'),
                    'default'  => '1',
                ),
                array(
                    'id'       => 'fieldsWooCommerceProducts',
                    'type'     => 'checkbox',
                    'title'    => __('Product Support (lists all Products)', 'wordpress-helpdesk'),
                    'default'  => '1',
                ),
                array(
                    'id'       => 'fieldsWooCommerceOrders',
                    'type'     => 'checkbox',
                    'title'    => __('Order Support (lists all Orders)', 'wordpress-helpdesk'),
                    'default'  => '1',
                ),
                array(
                    'id'       => 'fieldsWooCommerceRequiredCustom',
                    'type'     => 'multi_text',
                    'title'    => esc_html__('Custom WooCommerce Required Fields', 'wordpress-helpdesk'),
                    'subtitle' => esc_html__('Create custom fields here.'),
                    'default'  => array(),
                ),
                array(
                    'id'       => 'fieldsWooCommerceOptionalCustom',
                    'type'     => 'multi_text',
                    'title'    => esc_html__('Custom WooCommerce Optional Fields', 'wordpress-helpdesk'),
                    'subtitle' => esc_html__('Create custom fields here.'),
                    'default'  => array(),
                ),
        )
    ));

    Redux::setSection($opt_name, array(
        'title'      => __('Inbox', 'wordpress-helpdesk'),
        'id'         => 'mail-settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'enableInbox',
                'type'     => 'checkbox',
                'title'    => __('Enable Inbox', 'wordpress-helpdesk'),
                'subtitle' => __('Enable this to allow ticket creation via Email.', 'wordpress-helpdesk'),
                'default'  => '0',
            ),
            array(
                'id'       => 'mailAccountRecurrence',
                'type'     => 'select',
                'title'    => __('Recurrence', 'wordpress-helpdesk'),
                'subtitle' => __('How often should Emails be fetched.', 'wordpress-helpdesk'),
                'options' => array(
                    'hourly' => __('Hourly', 'wordpress-helpdesk'),
                    'twicedaily' => __('Twice daily', 'wordpress-helpdesk'),
                    'daily' => __('Daily', 'wordpress-helpdesk'),
                    ),
                'default' => 'hourly',
                'required' => array('enableInbox','equals','1'),
            ),
            array(
                'id'       => 'mailAccountSection',
                'type'     => 'section',
                'title'    => __('Mail Account Settings', 'wordpress-helpdesk'),
                'subtitle' => __('Settings for your Mail Account.', 'wordpress-helpdesk'),
                'indent'   => false,
                'required' => array('enableInbox','equals','1'),
            ),
            array(
                'id'       => 'mailAccountEmail',
                'type'     => 'text',
                'title'    => __('Email', 'wordpress-helpdesk'),
                'required' => array('enableInbox','equals','1'),
            ),
            array(
                'id'          => 'mailAccountUser',
                'type'        => 'password',
                'username'    => true,
                'title'       => __('Username & Password', 'wordpress-helpdesk'),
                'placeholder' => array(
                    'username'   => __('Enter your Username', 'wordpress-helpdesk'),
                    'password'   => __('Enter your Password', 'wordpress-helpdesk'),
                ),
                'required' => array('enableInbox','equals','1'),
            ),
            array(
                'id'       => 'mailAccountHost',
                'type'     => 'text',
                'title'    => __('Host', 'wordpress-helpdesk'),
                'required' => array('enableInbox','equals','1'),
            ),
            array(
                'id'       => 'mailAccountFolder',
                'type'     => 'text',
                'title'    => __('Inbox Folder', 'wordpress-helpdesk'),
                'subtitle' => __('The folder where to scan for new mails. Most of the time it is the INBOX folder.', 'wordpress-helpdesk'),
                'default'  => 'INBOX',
                'required' => array('enableInbox','equals','1'),
            ),
            array(
                'id'       => 'mailAccountArchiveFolder',
                'type'     => 'text',
                'title'    => __('Archive Folder', 'wordpress-helpdesk'),
                'subtitle'    => __('The target folder, where processed mails should be moved (eg. Archiv).', 'wordpress-helpdesk'),
                'default'  => 'Archiv',
                'required' => array('enableInbox','equals','1'),
            ),
            array(
                'id'       => 'mailAccountProtocol',
                'type'     => 'select',
                'title'    => __('Protocol', 'wordpress-helpdesk'),
                'options'  => array(
                    'tls' => __('TLS', 'wordpress-helpdesk'),
                    'ssl' => __('SSL', 'wordpress-helpdesk'),
                ),
                'default' => 'tls',
                'required' => array('enableInbox','equals','1'),
            ),
            array(
                'id'       => 'mailAccountPort',
                'type'     => 'select',
                'title'    => __('Port', 'wordpress-helpdesk'),
                'options'  => array(
                    '143' => __('143', 'wordpress-helpdesk'),
                    '993' => __('993', 'wordpress-helpdesk'),
                    '110' => __('110', 'wordpress-helpdesk'),
                    '995' => __('995', 'wordpress-helpdesk'),
                ),
                'default' => '143',
                'required' => array('enableInbox','equals','1'),
            ),
            array(
                'id'       => 'mailAccountType',
                'type'     => 'select',
                'title'    => __('Protocol', 'wordpress-helpdesk'),
                'options'  => array(
                    'imap' => __('IMAP', 'wordpress-helpdesk'),
                    'imaps' => __('IMAPS', 'wordpress-helpdesk'),
                    'pop3' => __('POP3', 'wordpress-helpdesk'),
                    'pop3s' => __('POP3S', 'wordpress-helpdesk'),
                ),
                'default' => 'imap',
                'required' => array('enableInbox','equals','1'),
            ),
            array(
                'id'       => 'mailAccountNovalidateCert',
                'type'     => 'checkbox',
                'title'    => __('No Validate Cert', 'wordpress-helpdesk'),
                'subtitle' => __('Do not validate Certificates.', 'wordpress-helpdesk'),
                'default'  => '0',
                'required' => array('enableInbox','equals','1'),
            ),
            array(
                'id'   => 'mailInfo',
                'type' => 'info',
                'desc' => '<a href="' . admin_url('edit.php?post_type=ticket&page=wordpress_helpdesk_options_options&check-inbox=true') . '" class="button button-primary">' . __('Test Mail Account', 'wordpress-helpdesk') . '</a>  <a href="' . admin_url('edit.php?post_type=ticket&page=wordpress_helpdesk_options_options&check-folders=true') . '" class="button button-primary">' . __('Check Folder', 'wordpress-helpdesk') . '</a> <a href="' . admin_url('edit.php?post_type=ticket&page=wordpress_helpdesk_options_options&fetch-now=true') . '" class="button button-primary">' . __('Fetch Emails Now', 'wordpress-helpdesk') . '</a>',
                'required' => array('enableInbox','equals','1'),
            ),
        )
    ));

    Redux::setSection($opt_name, array(
        'title'      => __('Integrations', 'wordpress-helpdesk'),
        'id'         => 'integration-settings',
        'subsection' => true,
        'fields'     => array(
            // 
            array(
                'id'       => 'integrationsInvisibleRecaptcha',
                'type'     => 'checkbox',
                'title'    => __('Invisible Recaptcha Integration', 'wordpress-helpdesk'),
                'subtitle'    => __('Install & Setup the <a href="https://wordpress.org/plugins/invisible-recaptcha/" target="_blank">invisible recaptcha plugin from here</a>. Then check this option.', 'wordpress-helpdesk'),
                'default'  => '0',
            ),
            // Envato
            array(
                'id'       => 'integrationsEnvato',
                'type'     => 'checkbox',
                'title'    => __('Envato Integration', 'wordpress-helpdesk'),
                'default'  => '0',
            ),
            array(
                'id'       => 'integrationsEnvatoUsername',
                'type'     => 'text',
                'title'    => __('Your Envato Username', 'wordpress-helpdesk'),
                'required' => array('integrationsEnvato','equals','1'),
            ),
            array(
                'id'       => 'integrationsEnvatoAPIKey',
                'type'     => 'text',
                'title'    => __('Envato API Key', 'wordpress-helpdesk'),
                'subtitle'  => __('<a href="https://build.Envato.com/my-apps/" target="_blank">Click here to get your API key > Person Tokens</a>.', 'wordpress-helpdesk'),
                'required' => array('integrationsEnvato','equals','1'),
            ),
            array(
                'id'       => 'integrationsEnvatoPurchaseCodeRequired',
                'type'     => 'checkbox',
                'title'    => __('Purchase Code required?', 'wordpress-helpdesk'),
                'subtitle'  => __('If enabled manual ticket creations will require a purchase code. Requests without a purchase code will automatically be denied and a reply will be sent with the request for the code.', 'wordpress-helpdesk'),
                'default'  => '0',
                'required' => array('integrationsEnvato','equals','1'),
            ),
            array(
                'id'       => 'integrationsEnvatoPurchaseCodeSupportRequired',
                'type'     => 'checkbox',
                'title'    => __('Check Support until for Purchase?', 'wordpress-helpdesk'),
                'subtitle'  => __('If enabled purchases, where the support is expired will not be created as a ticket.', 'wordpress-helpdesk'),
                'default'  => '0',
                'required' => array('integrationsEnvato','equals','1'),
            ),
            // WooCommerce
            array(
                'id'       => 'integrationsWooCommerce',
                'type'     => 'checkbox',
                'title'    => __('WooCommerce Integration', 'wordpress-helpdesk'),
                'default'  => '0',
            ),
            array(
                'id'       => 'integrationsWooCommerceFAQ',
                'type'     => 'checkbox',
                'title'    => __('WooCommerce – Show FAQs Tab on Product pages', 'wordpress-helpdesk'),
                'default'  => '0',
                'required' => array('integrationsWooCommerce','equals','1'),
            ),
            array(
                'id'       => 'integrationsWooCommerceFAQTitle',
                'type'     => 'text',
                'title'    => __('Tab Title', 'wordpress-helpdesk'),
                'default'  => 'FAQs',
                'required' => array('integrationsWooCommerce','equals','1'),
            ),
            array(
                'id'       => 'integrationsWooCommerceFAQExcerpt',
                'type'     => 'checkbox',
                'title'    => __('WooCommerce – FAQ – Show excerpt and read more.', 'wordpress-helpdesk'),
                'default'  => '1',
                'required' => array('integrationsWooCommerceFAQ','equals','1'),
            ),
            array(
                'id'       => 'integrationsWooCommerceFAQColumns',
                'title'    => __('WooCommerce – FAQ – Columns', 'wordpress-helpdesk'),
                'type'     => 'spinner',
                'default'  => '2',
                'min'      => '1',
                'step'     => '1',
                'max'      => '10',
                'required' => array('integrationsWooCommerceFAQ','equals','1'),
            ),
            array(
                'id'       => 'integrationsWooCommercePreventAdminBar',
                'type'     => 'checkbox',
                'title'    => __('WooCommerce – Hide Admin bar for Reporters', 'wordpress-helpdesk'),
                'default'  => '0',
                'required' => array('integrationsWooCommerce','equals','1'),
            ),
            array(
                'id'       => 'integrationsWooCommercePreventAdminAccess',
                'type'     => 'checkbox',
                'title'    => __('WooCommerce – Prevent Admin access for Reporters', 'wordpress-helpdesk'),
                'default'  => '0',
                'required' => array('integrationsWooCommerce','equals','1'),
            ),
            // Slack
            array(
                'id'       => 'integrationsSlack',
                'type'     => 'checkbox',
                'title'    => __('Slack Integration', 'wordpress-helpdesk'),
                'default'  => '0',
            ),
            array(
                'id'       => 'integrationsSlackWebhokURL',
                'type'     => 'text',
                'title'    => __('Webhook URL', 'wordpress-helpdesk'),
                'subtitle'  => __('Then <a href="https://my.slack.com/services/new/incoming-webhook" target="_blank">create an incoming webhook</a> on your Slack account for the package to use. You\'ll need the webhook URL to instantiate the client.', 'wordpress-helpdesk'),
                'default'  => __('https://hooks.slack.com/services/...', 'wordpress-helpdesk'),
                'required' => array('integrationsSlack','equals','1'),
            ),
            array(
                'id'       => 'integrationsSlackChannel',
                'type'     => 'text',
                'title'    => __('Channel', 'wordpress-helpdesk'),
                'subtitle'  => __('Channel where to post to.', 'wordpress-helpdesk'),
                'default'  => '#general',
                'required' => array('integrationsSlack','equals','1'),
            ),
            array(
                'id'       => 'integrationsSlackIcon',
                'type'     => 'text',
                'title'    => __('Icon', 'wordpress-helpdesk'),
                'subtitle'  => __('Set your custom Slack Icon', 'wordpress-helpdesk'),
                'type'      => 'media',
                'url'       => true,
                'args'      => array(
                    'teeny'            => false,
                ),
                'required' => array('integrationsSlack','equals','1'),
            ),
            array(
                'id'       => 'integrationsSlackNewTicket',
                'type'     => 'checkbox',
                'title'    => __('New Ticket Notification', 'wordpress-helpdesk'),
                'default'  => '0',
                'required' => array('integrationsSlack','equals','1'),
            ),
            array(
                'id'       => 'integrationsSlackStatusChange',
                'type'     => 'checkbox',
                'title'    => __('Status Change Notification', 'wordpress-helpdesk'),
                'default'  => '0',
                'required' => array('integrationsSlack','equals','1'),
            ),
            array(
                'id'       => 'integrationsSlackCommentAdded',
                'type'     => 'checkbox',
                'title'    => __('Enable Comment added Notification', 'wordpress-helpdesk'),
                'default'  => '0',
                'required' => array('integrationsSlack','equals','1'),
            ),
            array(
                'id'       => 'integrationsSlackAgentChanged',
                'type'     => 'checkbox',
                'title'    => __('Enable Comment added Notification', 'wordpress-helpdesk'),
                'default'  => '0',
                'required' => array('integrationsSlack','equals','1'),
            ),
            array(
                'id'       => 'enableLiveChatFBMessenger',
                'type'     => 'checkbox',
                'title'    => __('Enable FB Messenger Live Chat.', 'wordpress-helpdesk'),
                'subtitle' => __('Learn more here: <a href="https://developers.facebook.com/docs/messenger-platform/discovery/customer-chat-plugin">Click</a>', 'wordpress-helpdesk'),
                'default'  => '0',
            ),
            array(
                'id'       => 'liveChatFBMessengerCode',
                'type'     => 'ace_editor',
                'mode'     => 'js',
                'title'    => __('FBMessenger Code', 'wordpress-helpdesk'),
                'subtitle' => __('<a href="https://developers.facebook.com/docs/messenger-platform/discovery/customer-chat-plugin#steps">Follow the steps here to get the Messenger code.</a>', 'wordpress-helpdesk'),
                'required' => array('enableLiveChatFBMessenger','equals','1'),
            ), 
            array(
                'id'       => 'enableLiveChatCrisp',
                'type'     => 'checkbox',
                'title'    => __('Enable Crisp Live Chat.', 'wordpress-helpdesk'),
                'subtitle' => __('Learn more here: https://crisp.chat/en/', 'wordpress-helpdesk'),
                'default'  => '0',
            ),
            array(
                'id'       => 'liveChatCrispCode',
                'type'     => 'ace_editor',
                'mode'     => 'js',
                'title'    => __('Crisp Code', 'wordpress-helpdesk'),
                'subtitle' => __('Copy & paste the HTML code here. https://app.crisp.chat/settings/websites/', 'wordpress-helpdesk'),
                'required' => array('enableLiveChatCrisp','equals','1'),
            ),
            array(
                'id'       => 'enableLiveChatPureChat',
                'type'     => 'checkbox',
                'title'    => __('Enable PureChat Live Chat.', 'wordpress-helpdesk'),
                'subtitle' => __('Learn more here: https://www.purechat.com/', 'wordpress-helpdesk'),
                'default'  => '0',
            ),
            array(
                'id'       => 'liveChatPureChatCode',
                'type'     => 'ace_editor',
                'mode'     => 'js',
                'title'    => __('PureChat Code', 'wordpress-helpdesk'),
                'subtitle' => __('Copy & paste the HTML code here. https://app.purechat.com/websites/install-first', 'wordpress-helpdesk'),
                'required' => array('enableLiveChatPureChat','equals','1'),
            ), 
            array(
                'id'       => 'enableLiveChatChatra',
                'type'     => 'checkbox',
                'title'    => __('Enable Chatra Live Chat.', 'wordpress-helpdesk'),
                'subtitle' => __('Learn more here: https://chatra.io', 'wordpress-helpdesk'),
                'default'  => '0',
            ),
            array(
                'id'       => 'liveChatChatraCode',
                'type'     => 'ace_editor',
                'mode'     => 'js',
                'title'    => __('Chatra Code', 'wordpress-helpdesk'),
                'subtitle' => __('Copy & paste the HTML code here. https://app.chatra.io/settings/general', 'wordpress-helpdesk'),
                'required' => array('enableLiveChatChatra','equals','1'),
            ), 
        )
    ));

    Redux::setSection($opt_name, array(
        'title'      => __('Mail Notifications', 'wordpress-helpdesk'),
        'id'         => 'notifications-settings',
        'subsection' => true,
        'fields'     => array(
            // New Ticket
            array(
                'id'       => 'newTicket',
                'type'     => 'section',
                'title'    => __('New Ticket Notification', 'wordpress-helpdesk'),
                'subtitle' => __('Notification when a new ticket has been created. ', 'wordpress-helpdesk'),
                'indent'   => false,
            ),
            array(
                'id'       => 'notificationsNewTicket',
                'type'     => 'checkbox',
                'title'    => __('New Ticket Notification', 'wordpress-helpdesk'),
                'default'  => '1',
            ),
            array(
                'id'       => 'notificationsNewTicketReporter',
                'type'     => 'checkbox',
                'title'    => __('Notify the reporter.', 'wordpress-helpdesk'),
                'default'  => '1',
                'required' => array('notificationsNewTicket','equals','1'),
            ),
            array(
                'id'       => 'notificationsNewTicketAgent',
                'type'     => 'checkbox',
                'title'    => __('Notify the by default assigned agent.', 'wordpress-helpdesk'),
                'default'  => '1',
                'required' => array('notificationsNewTicket','equals','1'),
            ),
            array(
                'id'       => 'notificationsNewTicketUsers',
                'type'     => 'select',
                'title'    => __('Notify the following users:', 'wordpress-helpdesk'),
                'data' => 'users',
                'multi' => true,
                'required' => array('notificationsNewTicket','equals','1'),
            ),
            array(
                'id'       => 'statusChange',
                'type'     => 'section',
                'title'    => __('Status Change Notification', 'wordpress-helpdesk'),
                'subtitle' => __('Notification when a ticket status has been changed. ', 'wordpress-helpdesk'),
                'indent'   => false,
            ),
            array(
                'id'       => 'notificationsStatusChange',
                'type'     => 'checkbox',
                'title'    => __('Status Change Notification', 'wordpress-helpdesk'),
                'default'  => '1',
            ),
            array(
                'id'       => 'notificationsStatusChangeReporter',
                'type'     => 'checkbox',
                'title'    => __('Notify the reporter.', 'wordpress-helpdesk'),
                'default'  => '1',
                'required' => array('notificationsStatusChange','equals','1'),
            ),
            array(
                'id'       => 'notificationsStatusChangeAgent',
                'type'     => 'checkbox',
                'title'    => __('Notify the assigned agent.', 'wordpress-helpdesk'),
                'default'  => '1',
                'required' => array('notificationsStatusChange','equals','1'),
            ),
            array(
                'id'       => 'notificationsStatusChangeUsers',
                'type'     => 'select',
                'title'    => __('Notify the following users:', 'wordpress-helpdesk'),
                'data' => 'users',
                'multi' => true,
                'required' => array('notificationsStatusChange','equals','1'),
            ),
            array(
                'id'       => 'commentAdded',
                'type'     => 'section',
                'title'    => __('Comment Added Notification', 'wordpress-helpdesk'),
                'subtitle' => __('Whenever a comment has been added. ', 'wordpress-helpdesk'),
                'indent'   => false,
            ),
            array(
                'id'       => 'notificationsCommentAdded',
                'type'     => 'checkbox',
                'title'    => __('Enable Comment added Notification', 'wordpress-helpdesk'),
                'default'  => '1',
            ),
            array(
                'id'       => 'notificationsCommentAddedReporter',
                'type'     => 'checkbox',
                'title'    => __('Notify the reporter.', 'wordpress-helpdesk'),
                'subtitle' => __('The reporter will not be notified, when he has made the comment.'),
                'default'  => '1',
                'required' => array('notificationsCommentAdded','equals','1'),
            ),
            array(
                'id'       => 'notificationsCommentAddedAgent',
                'type'     => 'checkbox',
                'title'    => __('Notify the agent.', 'wordpress-helpdesk'),
                'subtitle' => __('The agent will not be notified, when he has made the comment.'),
                'default'  => '1',
                'required' => array('notificationsCommentAdded','equals','1'),
            ),
            array(
                'id'       => 'notificationsCommentAddedUsers',
                'type'     => 'select',
                'title'    => __('Notify the following users:', 'wordpress-helpdesk'),
                'data' => 'users',
                'multi' => true,
                'required' => array('notificationsCommentAdded','equals','1'),
            ),
            array(
                'id'       => 'agentChanged',
                'type'     => 'section',
                'title'    => __('Assigned Agent Changed Notification', 'wordpress-helpdesk'),
                'subtitle' => __('Whenever the assigned agent changed. ', 'wordpress-helpdesk'),
                'indent'   => false,
            ),
            array(
                'id'       => 'notificationsAgentChanged',
                'type'     => 'checkbox',
                'title'    => __('Enable agent changed added Notification', 'wordpress-helpdesk'),
                'default'  => '1',
            ),
            array(
                'id'       => 'notificationsAgentChangedReporter',
                'type'     => 'checkbox',
                'title'    => __('Notify the reporter.', 'wordpress-helpdesk'),
                'default'  => '1',
                'required' => array('notificationsAgentChanged','equals','1'),
            ),
            array(
                'id'       => 'notificationsAgentChangedAgent',
                'type'     => 'checkbox',
                'title'    => __('Notify the agent.', 'wordpress-helpdesk'),
                'default'  => '1',
                'required' => array('notificationsAgentChanged','equals','1'),
            ),
            array(
                'id'       => 'notificationsAgentChangedUsers',
                'type'     => 'select',
                'title'    => __('Notify the following users:', 'wordpress-helpdesk'),
                'data' => 'users',
                'multi' => true,
                'required' => array('notificationsAgentChanged','equals','1'),
            ),
            array(
                'id'       => 'supportNotificationSettings',
                'type'     => 'section',
                'title'    => __('Notification settings', 'wordpress-helpdesk'),
                'subtitle' => __('The default notification settings for mails etc.', 'wordpress-helpdesk'),
                'indent'   => false,
            ),
            array(
                'id'       => 'supportName',
                'type'     => 'text',
                'title'    => __('Name', 'wordpress-helpdesk'),
                'subtitle' => __('This is the default from name for your mail notifications.', 'wordpress-helpdesk'),
                'default'  => __('Helpdesk', 'wordpress-helpdesk'),
            ),
            array(
                'id'        =>'supportLogo',
                'type'      => 'media',
                'url'       => true,
                'title'     => __('Set a Logo', 'wordpress-helpdesk'),
                'subtitle'  => __('The logo will be used in all Mail notifications.', 'wordpress-helpdesk'),
                'args'      => array(
                    'teeny'            => false,
                )
            ),
            array(
                'id'       => 'supportMail',
                'type'     => 'text',
                'title'    => __('Support Mail Address', 'wordpress-helpdesk'),
                'subtitle' => __('This will be used in your mail notifications as the default reply to address.', 'wordpress-helpdesk'),
                'default'  => 'support@yourdomain.com',
            ),
            array(
                'id'       => 'supportFooter',
                'type'     => 'editor',
                'title'    => __('Footer for Mails', 'wordpress-helpdesk'),
                'default'  => 'You can reply to this Email. Ticket created by WP TotalDesk Software.',
            ),
        )
    ));

    Redux::setSection($opt_name, array(
        'title'      => __('Live Chat', 'wordpress-helpdesk'),
        'id'         => 'chat-settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'enableLiveChat',
                'type'     => 'checkbox',
                'title'    => __('Enable Live Chat', 'wordpress-helpdesk'),
                'default'  => '0',
            ),
            array(
                'id'       => 'liveChatAllowGuest',
                'type'     => 'checkbox',
                'title'    => __('Allow Guest-Chat', 'wordpress-helpdesk'),
                'default'  => '0',
                'required' => array('enableLiveChat','equals','1'),
            ),
            array(
                'id'       => 'liveChatAllowAttachments',
                'type'     => 'checkbox',
                'title'    => __('Allow Attachments', 'wordpress-helpdesk'),
                'default'  => '1',
                'required' => array('enableLiveChat','equals','1'),
            ),
            array(
                'id'       => 'liveChatHideAgentsOffline',
                'type'     => 'checkbox',
                'title'    => __('Hide Livechat when agents offline', 'wordpress-helpdesk'),
                'default'  => '0',
                'required' => array('enableLiveChat','equals','1'),
            ),
            array(
                'id'        =>'liveChatDefaultIcon',
                'type'      => 'media',
                'url'       => true,
                'title'     => __('Default Icon', 'wordpress-helpdesk'),
                'subtitle'  => __('The icon must be in square format.', 'wordpress-helpdesk'),
                'args'      => array(
                    'teeny'            => false,
                ),
                'required' => array('enableLiveChat','equals','1'),
            ),
            array(
                'id'     =>'liveChatAccentColor',
                'type' => 'color',
                'title' => __('Chat Accent Color', 'woocommerce-group-attributes'), 
                'validate' => 'color',
                'default' => '#1786e5',
                'required' => array('enableLiveChat','equals','1'),
            ),
            array(
                'id'       => 'liveChatTitle',
                'type'     => 'text',
                'title'    => __('Live Chat Title', 'wordpress-helpdesk'),
                'default'  => __('Live Chat', 'wordpress-helpdesk'),
                'required' => array('enableLiveChat','equals','1'),
            ),
            array(
                'id'       => 'liveChatStatusOnline',
                'type'     => 'text',
                'title'    => __('Status Text (Online)', 'wordpress-helpdesk'),
                'default'  => __('Our customer service is available.', 'wordpress-helpdesk'),
                'required' => array('enableLiveChat','equals','1'),
            ),
            array(
                'id'       => 'liveChatStatusOffline',
                'type'     => 'text',
                'title'    => __('Status Text (Offline)', 'wordpress-helpdesk'),
                'default'  => __('No agents online.', 'wordpress-helpdesk'),
                'required' => array('enableLiveChat','equals','1'),
            ),
            array(
                'id'       => 'liveChatWelcomeOnline',
                'type'     => 'editor',
                'title'    => __('Welcome Text (Online)', 'wordpress-helpdesk'),
                'default'  => __('Hi %s,<br><br>Please tell us your subject and your concerns.', 'wordpress-helpdesk'),
                'required' => array('enableLiveChat','equals','1'),
            ),
            array(
                'id'       => 'liveChatWelcomeOffline',
                'type'     => 'editor',
                'title'    => __('Welcome Text (Offline)', 'wordpress-helpdesk'),
                'default'  => __('Sorry,<br><br>None of our agents is online right now. But you can leave a message.', 'wordpress-helpdesk'),
                'required' => array('enableLiveChat','equals','1'),
            ),
            array(
                'id'       => 'liveChatButtonText',
                'type'     => 'text',
                'title'    => __('Button Text', 'wordpress-helpdesk'),
                'default'  => __('Enter Chat', 'wordpress-helpdesk'),
                'required' => array('enableLiveChat','equals','1'),
            ),
            array(                
                'id'       => 'liveChatAJAXInterval',
                'type'     => 'spinner',
                'title'    => __('AJAX Interval', 'wordpress-helpdesk'),
                'subtitle' => __('Increase the interval (in miliseconds) to save server performance.', 'wordpress-helpdesk'),
                'default'  => '2000',
                'min'      => '1',
                'step'     => '10',
                'max'      => '9999999999',
                'required' => array('enableLiveChat','equals','1'),
            ),    
        )
    ));

    Redux::setSection($opt_name, array(
        'title'      => __('Saved Replies (BOT)', 'wordpress-helpdesk'),
        'id'         => 'saved-replies',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'enableSavedReplies',
                'type'     => 'checkbox',
                'title'    => __('Enable Saved Replies', 'wordpress-helpdesk'),
                'subtitle' => __('This allows you to save comments into a saved reply, that can be reused for later tickets.', 'wordpress-helpdesk'),
                'default'  => '1',
            ),
            array(
                'id'       => 'savedRepliesAutomatic',
                'type'     => 'checkbox',
                'title'    => __('Enable Automatic Replies', 'wordpress-helpdesk'),
                'subtitle' => __('This will use your saved replies based on tags & word matches to automatically reply.', 'wordpress-helpdesk'),
                'default'  => '0',
            ),
            array(
                'id'       => 'savedRepliesAutomaticUser',
                'type'     => 'select',
                'title'    => __('Automatic Reply User', 'wordpress-helpdesk'),
                'subtitle' => __('This User will be used for automatic replies. You can create a user Bot for example and set it here.', 'wordpress-helpdesk'),
                'data' => 'users',
                'required' => array('savedRepliesAutomatic','equals','1'),
            ),
            array(
                'id'       => 'savedRepliesAutomaticNewTicket',
                'type'     => 'checkbox',
                'title'    => __('Enable Automatic Replies for new Tickets', 'wordpress-helpdesk'),
                'default'  => '0',
                'required' => array('savedRepliesAutomatic','equals','1'),
            ),
            array(
                'id'       => 'savedRepliesAutomaticNewReply',
                'type'     => 'checkbox',
                'title'    => __('Enable Automatic Reply for new Ticket Replies', 'wordpress-helpdesk'),
                'default'  => '0',
                'required' => array('savedRepliesAutomatic','equals','1'),
            ),
        )
    ));

    Redux::setSection($opt_name, array(
        'title'      => __('Support Rating', 'wordpress-helpdesk'),
        'desc'       => __('Send out Emails when tickets are completed and ask for a support rating.', 'wordpress-helpdesk'),
        'id'         => 'rate-settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'enableSupportRating',
                'type'     => 'checkbox',
                'title'    => __('Enable Support Rating', 'wordpress-helpdesk'),
                'default'  => '1',
            ),
            array(
                'id'     =>'supportRatingStatus',
                'type' => 'select',
                'data' => 'terms',
                'args' => array(
                    'taxonomies' => array( 'ticket_status' ),
                    'hide_empty' => false,
                ),
                'title' => __('Rating Status', 'wordpress-helpdesk'),
                'subtitle' => __('The status when the rating support email should be sent out.', 'wordpress-helpdesk'),
                'required' => array('enableSupportRating','equals','1'),
            ),
            array(
                'id'       => 'supportRatingFeedbackPage',
                'type'     => 'select',
                'title'    => __('Feedback Page', 'wordpress-helpdesk'),
                'subtitle' => __('Make sure the [helpdesk_feedback] shortcode is placed there. After saving here go to settings > permalinks and save.', 'wordpress-helpdesk'),
                'data'     => 'pages',
                'required' => array('enableSupportRating','equals','1'),
            ),
            array(
                'id'     =>'supportRatingEmailSubject',
                'type'     => 'text',
                'title'    => __('Email Subject', 'wordpress-helpdesk'),
                'default'  => __('How would you rate the support?', 'wordpress-helpdesk'),
                'required' => array('enableSupportRating','equals','1'),
            ),
            array(
                'id'     =>'supportRatingEmailIntro',
                'type'     => 'editor',
                'title'    => __('Email Intro', 'wordpress-helpdesk'),
                'default'  => __('Hello %s,<br/><br/>We\'d love to hear about your support experience. Please take a moment to answer one simple question by clicking either link below:<br/><br/>How would you rate the support you received?<br/><br/>', 'wordpress-helpdesk'),
                'required' => array('enableSupportRating','equals','1'),
            ),
            array(
                'id'     =>'supportRatingEmailSatisfied',
                'type'     => 'text',
                'title'    => __('Email Satisfied Text', 'wordpress-helpdesk'),
                'default'  => __('Good, I\'m satisfied', 'wordpress-helpdesk'),
                'required' => array('enableSupportRating','equals','1'),
            ),
            array(
                'id'     =>'supportRatingEmailUnsatisfied',
                'type'     => 'text',
                'title'    => __('Email Satisfied Text', 'wordpress-helpdesk'),
                'default'  => __('Bad, I\'m unsatisfied', 'wordpress-helpdesk'),
                'required' => array('enableSupportRating','equals','1'),
            ),
            array(
                'id'     =>'supportRatingEmailOutro',
                'type'     => 'editor',
                'title'    => __('Email Outro', 'wordpress-helpdesk'),
                'default'  => __('Not solved yet?<br><br>The message you add to your feedback will not be forwarded as a reply. If you have further questions you can reply to this email.', 'wordpress-helpdesk'),
                'required' => array('enableSupportRating','equals','1'),
            ),
        )
    ));

    Redux::setSection($opt_name, array(
        'title'      => __('Tickets', 'wordpress-helpdesk'),
        'id'         => 'tickets',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'supportNewTicketPage',
                'type'     => 'select',
                'title'    => __('New Ticket Page', 'wordpress-helpdesk'),
                'subtitle' => __('Make sure the [new_ticket] shortcode is placed there.', 'wordpress-helpdesk'),
                'data'     => 'pages'
            ),
            array(
                'id'       => 'supportRedirectAfterLogin',
                'type'     => 'checkbox',
                'title'    => __('Redirect reporters to My Tickets page', 'wordpress-helpdesk'),
                'subtitle' => __('After login all reporters will be redirected to the my tickets page.', 'wordpress-helpdesk'),
                'default'  => '0',
            ),
            array(
                'id'       => 'supportAgentCanCreateTickets',
                'type'     => 'checkbox',
                'title'    => __('Agents can create tickets for Users', 'wordpress-helpdesk'),
                'subtitle' => __('In the new ticket page, agents can create tickets on behalf of other users.', 'wordpress-helpdesk'),
                'default'  => '0',
            ),
            array(
                'id'       => 'supportOnlyLoggedIn',
                'type'     => 'checkbox',
                'title'    => __('Only Logged In', 'wordpress-helpdesk'),
                'subtitle' => __('Allow Ticket creation via Forms only when User is logged in.', 'wordpress-helpdesk'),
                'default'  => '0',
            ),
            array(
                'id'       => 'supportLoginPage',
                'type'     => 'select',
                'title'    => __('Login Page', 'wordpress-helpdesk'),
                'subtitle' => __('This will be the page, where the login button will link to.', 'wordpress-helpdesk'),
                'data'     => 'pages'
            ),
            array(
                'id'       => 'supportSendLoginCredentials',
                'type'     => 'checkbox',
                'title'    => __('Send Login credentials', 'wordpress-helpdesk'),
                'subtitle' => __('Send out the login credentials when a new account has been created for a new user.', 'wordpress-helpdesk'),
                'default'  => '1',
            ),
            array(
                'id'       => 'supportCloseTicketsAutomatically',
                'type'     => 'checkbox',
                'title'    => __('Automatically Close Tickets', 'wordpress-helpdesk'),
                'subtitle' => __('Automatically set Tickets to close / solved after X Days no comment / update was made. You need to set a default solved status!', 'wordpress-helpdesk'),
                'default'  => '0',
            ),
            array(                
                'id'       => 'supportCloseTicketsAutomaticallyDays',
                'type'     => 'spinner',
                'title'    => __('Days after a Ticket gets closed', 'wordpress-helpdesk'),
                'default'  => '31',
                'min'      => '1',
                'step'     => '1',
                'max'      => '9999999999',
                'required' => array('supportCloseTicketsAutomatically','equals','1'),
            ),
            array(
                'id'       => 'ticketContentBefore',
                'type'     => 'editor',
                'title'    => __('Content Before Single Ticket', 'wordpress-helpdesk'),
                'subtitle' =>  __('Accepts shortcodes also.', 'wordpress-helpdesk'),
            ),
            array(
                'id'       => 'ticketContentAfter',
                'type'     => 'editor',
                'title'    => __('Content After Single Ticket', 'wordpress-helpdesk'),
                'subtitle' =>  __('Accepts shortcodes also.', 'wordpress-helpdesk'),
            ),
            array(
                'id'       => 'myTicketsSection',
                'type'     => 'section',
                'title'    => __('My tickets', 'wordpress-helpdesk'),
                'subtitle'    => __('Configure what you want to show in the My tickets table.', 'wordpress-helpdesk'),
                'indent'   => true,
            ),
            array(
                'id'       => 'supportMyTicketsPage',
                'type'     => 'select',
                'title'    => __('My Tickets Page', 'wordpress-helpdesk'),
                'subtitle' => __('Make sure the [my_tickets] shortcode is placed there. After saving go to settings > permalinks and save.', 'wordpress-helpdesk'),
                'data'     => 'pages'
            ),
            array(
                'id'       => 'myTicketsDatatablesEnable',
                'type'     => 'checkbox',
                'title'    => __( 'Enable Datatables', 'woocommerce-variations-table' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'myTicketsDatatablesLanguage',
                'type'     => 'select',
                'title'    => __('Datatables Language', 'woocommerce-variations-table'),
                'subtitle' => __('Set a language for the datatable.', 'woocommerce-variations-table'),
                'default'  => 'English',
                'options'  => array( 
                    'Afrikaans' => __('Afrikaans', 'woocommerce-variations-table'),
                    'Albanian' => __('Albanian', 'woocommerce-variations-table'),
                    'Amharic' => __('Amharic', 'woocommerce-variations-table'),
                    'Arabic' => __('Arabic', 'woocommerce-variations-table'),
                    'Armenian' => __('Armenian', 'woocommerce-variations-table'),
                    'Azerbaijan' => __('Azerbaijan', 'woocommerce-variations-table'),
                    'Bangla' => __('Bangla', 'woocommerce-variations-table'),
                    'Basque' => __('Basque', 'woocommerce-variations-table'),
                    'Belarusian' => __('Belarusian', 'woocommerce-variations-table'),
                    'Bulgarian' => __('Bulgarian', 'woocommerce-variations-table'),
                    'Catalan' => __('Catalan', 'woocommerce-variations-table'),
                    'Chinese-traditional' => __('traditional', 'woocommerce-variations-table'),
                    'Chinese' => __('Chinese', 'woocommerce-variations-table'),
                    'Croatian' => __('Croatian', 'woocommerce-variations-table'),
                    'Czech' => __('Czech', 'woocommerce-variations-table'),
                    'Danish' => __('Danish', 'woocommerce-variations-table'),
                    'Dutch' => __('Dutch', 'woocommerce-variations-table'),
                    'English' => __('English', 'woocommerce-variations-table'),
                    'Estonian' => __('Estonian', 'woocommerce-variations-table'),
                    'Filipino' => __('Filipino', 'woocommerce-variations-table'),
                    'Finnish' => __('Finnish', 'woocommerce-variations-table'),
                    'French' => __('French', 'woocommerce-variations-table'),
                    'Galician' => __('Galician', 'woocommerce-variations-table'),
                    'Georgian' => __('Georgian', 'woocommerce-variations-table'),
                    'German' => __('German', 'woocommerce-variations-table'),
                    'Greek' => __('Greek', 'woocommerce-variations-table'),
                    'Gujarati' => __('Gujarati', 'woocommerce-variations-table'),
                    'Hebrew' => __('Hebrew', 'woocommerce-variations-table'),
                    'Hindi' => __('Hindi', 'woocommerce-variations-table'),
                    'Hungarian' => __('Hungarian', 'woocommerce-variations-table'),
                    'Icelandic' => __('Icelandic', 'woocommerce-variations-table'),
                    'Indonesian-Alternative' => __('Alternative', 'woocommerce-variations-table'),
                    'Indonesian' => __('Indonesian', 'woocommerce-variations-table'),
                    'Irish' => __('Irish', 'woocommerce-variations-table'),
                    'Italian' => __('Italian', 'woocommerce-variations-table'),
                    'Japanese' => __('Japanese', 'woocommerce-variations-table'),
                    'Kazakh' => __('Kazakh', 'woocommerce-variations-table'),
                    'Korean' => __('Korean', 'woocommerce-variations-table'),
                    'Kyrgyz' => __('Kyrgyz', 'woocommerce-variations-table'),
                    'Latvian' => __('Latvian', 'woocommerce-variations-table'),
                    'Lithuanian' => __('Lithuanian', 'woocommerce-variations-table'),
                    'Macedonian' => __('Macedonian', 'woocommerce-variations-table'),
                    'Malay' => __('Malay', 'woocommerce-variations-table'),
                    'Mongolian' => __('Mongolian', 'woocommerce-variations-table'),
                    'Nepali' => __('Nepali', 'woocommerce-variations-table'),
                    'Norwegian-Bokmal' => __('Bokmal', 'woocommerce-variations-table'),
                    'Norwegian-Nynorsk' => __('Nynorsk', 'woocommerce-variations-table'),
                    'Pashto' => __('Pashto', 'woocommerce-variations-table'),
                    'Persian' => __('Persian', 'woocommerce-variations-table'),
                    'Polish' => __('Polish', 'woocommerce-variations-table'),
                    'Portuguese-Brasil' => __('Brasil', 'woocommerce-variations-table'),
                    'Portuguese' => __('Portuguese', 'woocommerce-variations-table'),
                    'Romanian' => __('Romanian', 'woocommerce-variations-table'),
                    'Russian' => __('Russian', 'woocommerce-variations-table'),
                    'Serbian' => __('Serbian', 'woocommerce-variations-table'),
                    'Sinhala' => __('Sinhala', 'woocommerce-variations-table'),
                    'Slovak' => __('Slovak', 'woocommerce-variations-table'),
                    'Slovenian' => __('Slovenian', 'woocommerce-variations-table'),
                    'Spanish' => __('Spanish', 'woocommerce-variations-table'),
                    'Swahili' => __('Swahili', 'woocommerce-variations-table'),
                    'Swedish' => __('Swedish', 'woocommerce-variations-table'),
                    'Tamil' => __('Tamil', 'woocommerce-variations-table'),
                    'telugu' => __('telugu', 'woocommerce-variations-table'),
                    'Thai' => __('Thai', 'woocommerce-variations-table'),
                    'Turkish' => __('Turkish', 'woocommerce-variations-table'),
                    'Ukrainian' => __('Ukrainian', 'woocommerce-variations-table'),
                    'Urdu' => __('Urdu', 'woocommerce-variations-table'),
                    'Uzbek' => __('Uzbek', 'woocommerce-variations-table'),
                    'Vietnamese' => __('Vietnamese', 'woocommerce-variations-table'),
                    'Welsh' => __('Welsh', 'woocommerce-variations-table'),
                ),
                'required' => array('myTicketsDatatablesEnable','equals','1'),
            ),
            array(
                'id'       => 'myTicketsShowName',
                'type'     => 'checkbox',
                'title'    => __('Show Name', 'wordpress-helpdesk'),
                'default'  => '1',
            ),
            array(
                'id'       => 'myTicketsShowDate',
                'type'     => 'checkbox',
                'title'    => __('Show Date', 'wordpress-helpdesk'),
                'default'  => '1',
            ),
            array(
                'id'       => 'myTicketsShowStatus',
                'type'     => 'checkbox',
                'title'    => __('Show Status', 'wordpress-helpdesk'),
                'default'  => '1',
            ),
            array(
                'id'       => 'myTicketsShowSystem',
                'type'     => 'checkbox',
                'title'    => __('Show System', 'wordpress-helpdesk'),
                'default'  => '1',
            ),
            array(
                'id'       => 'myTicketsShowType',
                'type'     => 'checkbox',
                'title'    => __('Show Type', 'wordpress-helpdesk'),
                'default'  => '1',
            ),
        )
    ));

    Redux::setSection($opt_name, array(
        'title'      => __('Advanced settings', 'wordpress-helpdesk'),
        'desc'       => __('Custom stylesheet / javascript.', 'wordpress-helpdesk'),
        'id'         => 'advanced',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'useThemesTemplate',
                'type'     => 'checkbox',
                'title'    => __('Use Theme Template', 'wordpress-helpdesk'),
                'subtitle'    => __('Enable this to override the custom templates.', 'wordpress-helpdesk'),
                'default'  => '0',
            ),
            array(
                'id'       => 'supportMailTemplate',
                'type'     => 'ace_editor',
                'mode'     => 'html',
                'title'    => __('Support Mail Template', 'wordpress-helpdesk'),
                'subtitle' => __('This will be used for notifications.', 'wordpress-helpdesk'),
                'default'  => file_get_contents(dirname(__FILE__) . '/views/emailTemplate.html'),
            ),
            array(
                'id'       => 'customCSS',
                'type'     => 'ace_editor',
                'mode'     => 'css',
                'title'    => __('Custom CSS', 'wordpress-helpdesk'),
                'subtitle' => __('Add some stylesheet if you want.', 'wordpress-helpdesk'),
            ),
            array(
                'id'       => 'customJS',
                'type'     => 'ace_editor',
                'mode'     => 'js',
                'title'    => __('Custom JS', 'wordpress-helpdesk'),
                'subtitle' => __('Add some stylesheet if you want.', 'wordpress-helpdesk'),
            ),            
        )
    ));