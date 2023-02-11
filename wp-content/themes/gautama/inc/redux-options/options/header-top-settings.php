<?php
/**
 * Header Logo Settings
 *
 * @package Gautama
 */
return array(
	'title'  => esc_html( 'Header Top Settings', 'gautama' ),
	'id'     => 'header_top_settings',
  'subsection'  =>  true,
	'fields' => array(

    array(
			'id'       => 'display_top_header',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Top Header', 'gautama' ),
      'subtitle' => esc_html__( 'Please choose if you want to display the top header or not.', 'gautama' ),
			'default'  => 0,
		),
		array(
			'id'       => 'adjust-custom-header-top-width',
			'type'     => 'switch',
			'title'    => esc_html__( 'Set Custom Header Top Width', 'gautama' ),
			'default'  => 0,
			'subtitle' => esc_html__( 'Enable to set custom header top width.', 'gautama' ),
			'required' => array('display_top_header',  '=', '1'),
		),
		 array(
      'id' => 'header_top_content_size_custom',
      'type' => 'slider',
      'title' => esc_html__('Header Top Custom Content Size', 'gautama'),
      'subtitle' => esc_html__('Select your desired Header top content size', 'gautama'),
      'min' => 720,
      'step' => 1,
      'max' => 1900,
      'resolution' => 1,
			'display_value' => 'text',
			'required' => array('adjust-custom-header-top-width',  '=', '1'),
	  ),
    array(
			'id'       => 'display_top_sm',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Top Header Social Media', 'gautama' ),
      'subtitle' => esc_html__( 'Please choose if you want to display the top header social media links or not.', 'gautama' ),
			'default'  => 0,
      'required' => array('display_top_header',  '=', '1'),
		),
		array(
			'id'       => 'display_top_menu',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Top Header Menu', 'gautama' ),
      'subtitle' => esc_html__( 'Please choose if you want to display the top header menu', 'gautama' ),
			'default'  => 0,
      'required' => array('display_top_header',  '=', '1'),
		),
		array(
			'id'       => 'display_top_cta_btn',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Call To Action', 'gautama' ),
			'default'  => false,
			'subtitle' => esc_html__( 'Enable to display call to action button', 'gautama' ),
			'required' => array(
				array('header-layout',  '=', 'layout-7'),
				array('display_top_header',  '=', '1'),
			),
		),
		array(
			'id'       => 'header_button_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Call To Action Button Title', 'gautama' ),
			'subtitle' => esc_html__( 'Please enter call to action button title', 'gautama' ),
			'required' => array('display_top_cta_btn',  '=', 'true'),
		),
		array(
			'id'       => 'header_button_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Call To Action Button Link', 'gautama' ),
			'subtitle' => esc_html__( 'Please enter call to action button link', 'gautama' ),
			'required' => array('display_top_cta_btn',  '=', 'true'),
		),
		array(
			'id'          => 'header_top_btn_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Button color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set color for the button.', 'gautama' ),
			'required' => array('display_top_cta_btn',  '=', 'true'),
		),
		array(
			'id'          => 'header_top_btn_bg',
			'type'        => 'color',
			'title'       => esc_html__( 'Button Background Color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set background color for the button.', 'gautama' ),
			'required' => array('display_top_cta_btn',  '=', 'true'),
		),
		array(
			'id'          => 'header_top_bg',
			'type'        => 'color',
			'title'       => esc_html__( 'Header top background color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set background color for the top header.', 'gautama' ),
			'required' => array('display_top_header',  '=', '1'),
		),
		array(
			'id'          => 'header_top_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Header top color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set color for the top header.', 'gautama' ),
			'output'			=> array(
				'.site-header .site-header-top .social-info li a',
				'.site-header .site-header-top-inner .navbar-nav > li > a',
				'.site-header.header-layout-5 .header-controls > div > a'
			),
			'required' => array('display_top_header',  '=', '1'),
		),
		array(
			'id'          => 'header_top_color_hover',
			'type'        => 'color',
			'title'       => esc_html__( 'Header top color on hover', 'gautama' ),
			'subtitle'    => esc_html__( 'Set color on hover for the top header.', 'gautama' ),
			'output'			=> array(
				'.site-header .site-header-top .social-info li a:hover',
				'.site-header .site-header-top-inner .navbar-nav > li > a:hover',
				'.site-header.header-layout-5 .header-controls > div > a:hover'
			),
			'required' => array('display_top_header',  '=', '1'),
		),

	),
);
