<?php
/**
 * Header Settings
 *
 * @package Gautama
 */
return array(
	'title'  => esc_html( 'Header Settings', 'gautama' ),
	'id'     => 'header_settings',
	'icon'   => 'el el-credit-card',
	'fields' => array(
		array(
			'id'       => 'header-layout',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Header Layout', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the header style to display.', 'gautama' ),
			'options'  => array(
				'layout-1' => esc_html__( 'Header Layout 1', 'gautama' ),
				'layout-2' => esc_html__( 'Header Layout 2', 'gautama' ),
				'layout-3' => esc_html__( 'Header Layout 3', 'gautama' ),
				'layout-4' => esc_html__( 'Header Layout 4', 'gautama' ),
				'layout-5' => esc_html__( 'Header Layout 5', 'gautama' ),
				'layout-6' => esc_html__( 'Header Layout 6', 'gautama' ),
				'layout-7' => esc_html__( 'Header Layout 7', 'gautama' ),
			),
			'default'  => 'layout-6',
		),
		array(
			'id'       => 'header-scheme',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Header Color scheme', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the header color scheme', 'gautama' ),
			'options'  => array(
				'header-scheme-light' => esc_html__( 'Default - Based on options', 'gautama' ),
				'header-scheme-dark' => esc_html__( 'Dark Scheme', 'gautama' ),
			),
			'default'  => 'header-scheme-light',
		),
		array(
			'id'       => 'header-position',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Header Position', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the header position', 'gautama' ),
			'options'  => array(
				'header-absolute' => esc_html__( 'Absolute', 'gautama' ),
				'header-relative' => esc_html__( 'Relative', 'gautama' ),
			),
			'default'  => 'header-relative',
		),
		array(
			'id'       => 'adjust-custom-header-width',
			'type'     => 'switch',
			'title'    => esc_html__( 'Set Custom Header Width', 'gautama' ),
			'default'  => 0,
			'subtitle' => esc_html__( 'Enable to set custom header width.', 'gautama' ),
		),
		 array(
      'id' => 'header_content_size_custom',
      'type' => 'slider',
      'title' => esc_html__('Header Custom Content Size', 'gautama'),
      'subtitle' => esc_html__('Select your desired Header content size', 'gautama'),
      'min' => 720,
      'step' => 1,
      'max' => 1900,
      'resolution' => 1,
			'display_value' => 'text',
			'required' => array('adjust-custom-header-width',  '=', '1'),
	  ),
		array(
      'id'   =>'header_sticky_divider',
      'type' => 'divide'
    ),
		array(
			'id'       => 'sticky-header-enable',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable sticky header', 'gautama' ),
			'default'  => 0,
			'subtitle' => esc_html__( 'Enable sticky header', 'gautama' ),
		),
		array(
			'id'       => 'header-sticky-scheme',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Sticky Header Color scheme', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the sticky header color scheme', 'gautama' ),
			'options'  => array(
				'header-scheme-light' => esc_html__( 'Default - Based on options', 'gautama' ),
				'header-scheme-dark' => esc_html__( 'Dark Scheme', 'gautama' ),
			),
			'default'  => 'header-scheme-light',
			'required' => array('sticky-header-enable',  '=', '1'),
		),
		array(
			'id'          => 'header_sticky_bg',
			'type'        => 'color',
			'title'       => esc_html__( 'Header sticky background color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set background color for the sticky header.', 'gautama' ),
			'required' => array('sticky-header-enable',  '=', '1'),
		),
		array(
			'id'          => 'header_sticky_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Header sticky color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set color for the sticky header.', 'gautama' ),
			'required' 		=> array('sticky-header-enable',  '=', '1'),
			'output'			=> array(
				'.site-header.sticky .site-header-bottom .site-header-bottom-inner > ul > li > a',
				'.site-header.sticky .header-controls > div > a',
				'.site-header.sticky .site-header-bottom-inner > ul > li > a'
			)
		),
		array(
			'id'          => 'header_sticky_color_hover',
			'type'        => 'color',
			'title'       => esc_html__( 'Header sticky color on hover', 'gautama' ),
			'subtitle'    => esc_html__( 'Set color on hover for the sticky header.', 'gautama' ),
			'required'		=> array('sticky-header-enable',  '=', '1'),
			'output'			=> array(
				'.site-header.sticky .site-header-bottom .site-header-bottom-inner > ul > li > a:hover',
				'.site-header.sticky .site-header-bottom-inner > ul > li.current_page_item > a',
				'.site-header.sticky .site-header-bottom-inner > ul > li.current-menu-item > a',
				'.site-header.sticky .header-controls > div > a:hover',
				'.site-header.sticky .site-header-bottom-inner > ul > li > a:hover'
			)
		),
		array(
      'id'   =>'header_v_megamenu_divider',
      'type' => 'divide',
			'required' => array('header-layout',  '=', 'layout-5'),
    ),
		array(
			'id'       => 'display_v_megamenu',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Vertical Mega Menu', 'gautama' ),
			'default'  => false,
			'subtitle' => esc_html__( 'Enable to display the vertical megamenu in the header', 'gautama' ),
			'required' => array('header-layout',  '=', 'layout-5'),
		),
		array(
			'id'       => 'v_megamenu_text',
			'type'     => 'text',
			'title'    => esc_html__( 'Vertical Megamenu Text', 'gautama' ),
			'subtitle' => esc_html__( 'Please enter text that will display in the top level of the vertical megamenu', 'gautama' ),
			'placeholder' => esc_html__( 'Example: Browse', 'gautama' ),
			'required' => array('display_v_megamenu',  '=', 'true'),
		),
		array(
      'id'       => 'v_megamenu_menu',
      'type'     => 'select',
      'title'    => esc_html__('Select Menu', 'gautama'),
      'subtitle' => esc_html__('Select the menu you want to display in the vertical megamenu', 'gautama'),
      'data'  	 => 'menus',
			'required' => array('display_v_megamenu',  '=', 'true'),
    ),
		array(
      'id'   =>'header_controls_divider',
      'type' => 'divide'
    ),
		array(
			'id'       => 'header_controls_style',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Controls Style', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the Controls Style (Search, Cart, User Icon)', 'gautama' ),
			'options'  => array(
				'style-1' => esc_html__( 'Style 1', 'gautama' ),
				'style-2' => esc_html__( 'Style 2', 'gautama' ),
				'style-3' => esc_html__( 'Style 3', 'gautama' ),
			),
			'default'  => 'style-1',
			'required' => array('header-layout',  '=', array('layout-2', 'layout-3', 'layout-5', 'layout-7')),
		),
		array(
			'id'       => 'display-search-icon',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Search', 'gautama' ),
			'default'  => 0,
			'subtitle' => esc_html__( 'Enable to display the search in header.', 'gautama' ),
			'required' => array('header-layout',  '=', array('layout-2', 'layout-3', 'layout-5')),
		),
		array(
			'id'       => 'display-collapse-sidebar-icon',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display collapse sidebar', 'gautama' ),
			'default'  => 0,
			'subtitle' => esc_html__( 'Enable to display the collapse sidebar icon in header.', 'gautama' ),
			'description' => esc_html__( 'Add content in header collapse sidebar using widgets', 'gautama' ),
		),
		array(
			'id'          => 'header_collapse_bg_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Header Collapse Icon Background color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set background-color for the header collaspe icon', 'gautama' ),
			'required' 		=> array(
				array('header-layout',  '=', 'layout-6'),
				array('display-collapse-sidebar-icon',  '=', 'true'),
			),
		),
		array(
			'id'   =>'header_contact_divider',
			'type' => 'divide'
		),
		array(
			'id'       => 'header_contact_info_style',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Contact Info Style', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the Contact Info Style', 'gautama' ),
			'options'  => array(
				'style-1' => esc_html__( 'Style 1', 'gautama' ),
				'style-2' => esc_html__( 'Style 2', 'gautama' ),
				'style-3' => esc_html__( 'Style 3', 'gautama' ),
				'style-4' => esc_html__( 'Style 4', 'gautama' ),
				'style-5' => esc_html__( 'Style 5', 'gautama' ),
			),
			'default'  => 'style-1',
			'required' => array('header-layout',  '=', array('layout-1', 'layout-5', 'layout-6', 'layout-7')),
		),
		array(
			'id'       => 'display_email_address',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Email Address', 'gautama' ),
			'default'  => 0,
			'subtitle' => esc_html__( 'Enable to display your email address', 'gautama' ),
			'desc' => esc_html__( 'Note: This field should be filled from the Contact Information tab', 'gautama' ),
			'required' => array('header-layout',  '=', array('layout-1', 'layout-5', 'layout-6', 'layout-7')),
		),
		array(
			'id'       => 'display_phone_number',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Phone Number', 'gautama' ),
			'default'  => 0,
			'subtitle' => esc_html__( 'Enable to display your phone number', 'gautama' ),
			'desc' => esc_html__( 'Note: This field should be filled from the Contact Information tab', 'gautama' ),
			'required' => array('header-layout',  '=', array('layout-1', 'layout-5', 'layout-6', 'layout-7')),
		),
		array(
			'id'       => 'display_work_address',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Address', 'gautama' ),
			'default'  => 0,
			'subtitle' => esc_html__( 'Enable to display your address', 'gautama' ),
			'desc' => esc_html__( 'Note: This field should be filled from the Contact Information tab', 'gautama' ),
			'required' => array('header-layout',  '=', array('layout-1', 'layout-5', 'layout-6', 'layout-7')),
		),
		array(
			'id'          => 'header_contact_bg',
			'type'        => 'color',
			'title'       => esc_html__( 'Header Contact info background color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set background color for the contact info.', 'gautama' ),
			'description'  => esc_html__( 'If Contact Info style 2 is selected, then this option will apply to the icon color, and not the icon background color', 'gautama' ),
			'required' 		=> array('header-layout',  '=', array('layout-1', 'layout-5', 'layout-6')),
		),
		array(
			'id'          => 'header_contact_bg_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Header Contact info color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set color for the contact info.', 'gautama' ),
			'required' 		=> array('header-layout',  '=', array('layout-1', 'layout-5', 'layout-6')),
			'output'			=> array( '.site-header .contact-info .contact-list span', '.site-header .contact-info .contact-item .contact-list span:last-child', '.site-header .contact-info .contact-item .contact-list span:last-child a', '.site-header .contact-info.style-4 .contact-item .contact-list span:first-child' )
		),
		array(
      'id'   =>'header_colors_divider',
      'type' => 'divide'
    ),
		array(
			'id'          => 'header_bottom_bg',
			'type'        => 'color',
			'title'       => esc_html__( 'Header bottom background color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set background color for the bottom header.', 'gautama' ),
		),

		array(
			'id'          => 'header_bottom_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Header bottom color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set color for the bottom header.', 'gautama' ),
			'output'			=> array('.site-header .site-header-bottom-inner > ul > li > a', '.header-controls > div > a')
		),
		array(
			'id'          => 'header_bottom_color_hover',
			'type'        => 'color',
			'title'       => esc_html__( 'Header bottom color on hover', 'gautama' ),
			'subtitle'    => esc_html__( 'Set color on hover for the bottom header.', 'gautama' ),
			'output'			=> array('.site-header .site-header-bottom-inner > ul > li > a:hover', '.site-header .site-header-bottom-inner > ul > li.current_page_item > a', '.site-header .site-header-bottom-inner > ul > li.current-menu-item > a')
		),

		array(
			'id'          => 'header_submenu_bg',
			'type'        => 'color',
			'title'       => esc_html__( 'Header Submenu background color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set background color for the submenus.', 'gautama' ),
		),

		array(
			'id'          => 'header_submenu_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Header Submenu color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set color for the Submenu.', 'gautama' ),
			'output'			=> array('.site-header .sigma_mega-menu-item ul.menu li a', '.site-header .site-header-bottom-inner > ul ul.sub-menu li a')
		),
		array(
			'id'          => 'header_submenu_color_hover',
			'type'        => 'color',
			'title'       => esc_html__( 'Header Submenu color on hover', 'gautama' ),
			'subtitle'    => esc_html__( 'Set color on hover for the Submenu.', 'gautama' ),
			'output'			=> array('.site-header .sigma_mega-menu-item ul.menu li a:hover', '.site-header .site-header-bottom-inner > ul ul.sub-menu li a:hover')
		),

	),
);
