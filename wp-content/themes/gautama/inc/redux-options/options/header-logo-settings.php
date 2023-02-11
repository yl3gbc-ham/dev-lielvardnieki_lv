<?php
/**
 * Header Logo Settings
 *
 * @package Gautama
 */
return array(
	'title'  => esc_html( 'Header Logo Settings', 'gautama' ),
	'id'     => 'header_logo_settings',
  'subsection'  =>  true,
	'fields' => array(

    array(
			'id'       => 'site-logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Site Logo', 'gautama' ),
			'compiler' => 'true',
			'default'  => array( 'url' => get_parent_theme_file_uri( 'assets/images/logo.png' ) ),
			'subtitle' => esc_html__( 'Upload your logo', 'gautama' ),
		),

    array(
      'id'       => 'sticky-logo',
      'type'     => 'media',
      'url'      => true,
      'title'    => esc_html__( 'Sticky Logo', 'gautama' ),
      'compiler' => 'true',
      'default'  => array( 'url' => get_parent_theme_file_uri( 'assets/images/logo.png' ) ),
      'subtitle' => esc_html__( 'Will display a secondary logo when header is sticky and scrolling the page. ONLY available if you have Sticky Header enabled in Header settings.', 'gautama' ),
    ),

    array(
			'id'             => 'logo_text_typo',
			'type'           => 'typography',
			'title'          => esc_html__( 'Logo Text link options', 'gautama' ),
			'subtitle'       => esc_html__( 'Specify the logo typography properties. Will only work if you don\'t upload a logo image.', 'gautama' ),
			'google'         => true,
			'font-backup'    => true,
			'all_styles'     => false,
			'letter-spacing' => true,
			'text-align'     => false,
			'units'          => 'px',
			'color'          => true,
		),
		array(
			'id'       => 'display_logo_icon',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Logo Text Icon', 'gautama' ),
			'subtitle' => esc_html__( 'Please choose if you want to display icon for the logo text.Will only work if you don\'t upload a logo image.', 'gautama' ),
			'default'  => false,
		),
		array(
			'id'       => 'logo-text-icon',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Upload Logo Text Icon', 'gautama' ),
			'compiler' => 'true',
			'required'    => array( 'display_logo_icon', '=', 'true' )
		),
		array(
			'id'          => 'logo-icon-bg',
			'type'        => 'color',
			'title'       => esc_html__( 'Logo Icon Background color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set background-color for the logo icon', 'gautama' ),
			'required' 		=> array(
				array('header-layout',  '=', 'layout-6'),
				array('display_logo_icon',  '=', 'true'),
			),
		),
    array(
			'id'       => 'display_info_card',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Info Card', 'gautama' ),
      'subtitle' => esc_html__( 'Please choose if you want to display the info card or not.', 'gautama' ),
			'default'  => false,
		),
    array(
			'id'          => 'info_card_bg',
			'type'        => 'color',
			'title'       => esc_html__( 'Info Card background color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set background color for the info card', 'gautama' ),
			'transparent' => false,
			'default'     => '#d6a77b',
      'required'    => array( 'display_info_card', '=', 'true' )
		),

    array(
			'id'          => 'info_card_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Info Card text color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set text color for the info card', 'gautama' ),
			'transparent' => false,
			'default'     => '#fff',
      'required'    => array( 'display_info_card', '=', 'true' )
		),

    array(
			'id'       => 'info_card_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Info Card Logo', 'gautama' ),
			'compiler' => 'true',
			'default'  => '',
			'subtitle' => esc_html__( 'Choose your company logo which will appear in info card', 'gautama' ),
      'required'    => array( 'display_info_card', '=', 'true' )
		),

    array(
			'id'       => 'display_info_card_phone',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Phone Number?', 'gautama' ),
      'subtitle' => esc_html__( 'Please check this if you want to display the company Phone Number in the card (Option is set from Contact Information Tab)', 'gautama' ),
			'default'  => false,
      'required'    => array( 'display_info_card', '=', 'true' )
		),

    array(
			'id'       => 'display_info_card_email',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Email?', 'gautama' ),
      'subtitle' => esc_html__( 'Please check this if you want to display the company Email in the card (Option is set from Contact Information Tab)', 'gautama' ),
			'default'  => false,
      'required'    => array( 'display_info_card', '=', 'true' )
		),

    array(
			'id'       => 'display_info_card_address',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Address?', 'gautama' ),
      'subtitle' => esc_html__( 'Please check this if you want to display the company address in the card (Option is set from Contact Information Tab)', 'gautama' ),
			'default'  => false,
      'required'    => array( 'display_info_card', '=', 'true' )
		),
    array(
			'id'       => 'display_info_card_map',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Map Link?', 'gautama' ),
      'subtitle' => esc_html__( 'Please check this if you want to display the company Map Link in the card (Option is set from Contact Information Tab)', 'gautama' ),
			'default'  => false,
      'required'    => array( 'display_info_card', '=', 'true' )
		),
    array(
			'id'       => 'display_info_card_description',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Description?', 'gautama' ),
      'subtitle' => esc_html__( 'Please check this if you want to display the company Description in the card (Option is set from Contact Information Tab)', 'gautama' ),
			'default'  => false,
      'required'    => array( 'display_info_card', '=', 'true' )
		),
    array(
			'id'       => 'display_info_card_socials',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Social Media?', 'gautama' ),
      'subtitle' => esc_html__( 'Please check this if you want to display the company Social Media Links in the card (Option is set from Contact Information Tab)', 'gautama' ),
			'default'  => false,
      'required'    => array( 'display_info_card', '=', 'true' )
		),

	),
);
