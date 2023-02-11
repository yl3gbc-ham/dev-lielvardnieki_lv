<?php
/**
 * Footer Settings
 *
 * @package Gautama
 */
return array(
	'title'  => esc_html( 'Footer Settings', 'gautama' ),
	'id'     => 'footer_settings',
	'icon'   => 'el el-align-center',
	'fields' => array(
		array(
      'id'       => 'footer_type',
      'type'     => 'select',
      'title'    => esc_html__('Footer type', 'gautama'),
      'options'  => array(
        'static' => esc_html__('Static', 'gautama'),
				'page-template' => esc_html__('Page Template', 'gautama'),
      ),
      'default'  => 'static',
    ),
		array(
      'id'       => 'footer_type_page_template',
			'title' =>  esc_html__('Select Page Template', 'gautama'),
			'subtitle'  =>  esc_html__('Please select a page template to show in the footer','gautama'),
      'type'     => 'select',
      'multi'    => false,
      'data'     => 'posts',
      'args'     => array( 'post_type' => 'sigma_templates', 'numberposts' => -1 ),
			'required' => array('footer_type','=','page-template')
    ),
		array(
			'id'       => 'footer-layout',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Footer Layout', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the footer style to display.', 'gautama' ),
			'options'  => array(
				'layout-1' => esc_html__( 'Footer Layout 1', 'gautama' ),
				'layout-2' => esc_html( 'Footer Layout 2', 'gautama' ),
				'layout-3' => esc_html( 'Footer Layout 3', 'gautama' ),
			),
			'default'  => 'layout-1',
			'required' => array('footer_type','=','static')
		),
		array(
			'id'       => 'footer-skin',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Footer Color Scheme', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the footer color scheme to display.', 'gautama' ),
			'options'  => array(
				'footer-light' => esc_html__( 'Light Scheme', 'gautama' ),
				'footer-dark' => esc_html__( 'Dark Scheme', 'gautama' ),
			),
			'default'  => 'footer-dark',
			'required' => array('footer_type','=','static')
		),
		array(
			'id'       => 'display-footer-topbar',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Footer Topbar', 'gautama' ),
			'default'  => 1,
			'required' => array('footer_type','=','static')
		),
		array(
			'id'       => 'footer-logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo', 'gautama' ),
			'required' => array( 'display-footer-topbar', '=', '1' ),
			'compiler' => 'true',
			'default'  => array( 'url' => get_parent_theme_file_uri( 'assets/images/logo-white.png' ) ),
			'subtitle' => esc_html__( 'Upload image for logo.', 'gautama' ),
			'required' => array('footer_type','=','static')
		),
		array(
			'id'       => 'display-footer-social-links',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Footer Social Links', 'gautama' ),
			'subtitle' => esc_html__( 'Enable to display the social links in footer topbar.', 'gautama' ),
			'default'  => 1,
			'required' => array(
				array('display-footer-topbar', '=', '1'),
				array('footer_type','=','static')
			),
		),
		array(
			'id'       => 'footer_layout',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Footer Column layout', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the footer layout.', 'gautama' ),
			'options'  => array(
				'6-6'     => array(
					'alt' => esc_html__( 'Footer column 6 - 6', 'gautama' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-6-6.jpg' ),
				),
				'8-4'     => array(
					'alt' => esc_html__( 'Footer column 8 - 4', 'gautama' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-8-4.jpg' ),
				),
				'4-8'     => array(
					'alt' => esc_html__( 'Footer column 4 - 8', 'gautama' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-4-8.jpg' ),
				),
				'4-4-4'   => array(
					'alt' => esc_html__( 'Footer column 4 - 4 - 4', 'gautama' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-4-4-4.jpg' ),
				),
				'3-3-3-3' => array(
					'alt' => esc_html__( 'Footer column 3 - 3 - 3 - 3', 'gautama' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-3-3-3-3.jpg' ),
				),
				'6-3-3'   => array(
					'alt' => esc_html__( 'Footer column 6 - 3 - 3', 'gautama' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-6-3-3.jpg' ),
				),
				'3-3-6'   => array(
					'alt' => esc_html__( 'Footer column 3 - 3 - 6', 'gautama' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-3-3-6.jpg' ),
				),
				'8-2-2'   => array(
					'alt' => esc_html__( 'Footer column 8 - 2 - 2', 'gautama' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-8-2-2.jpg' ),
				),
				'2-2-8'   => array(
					'alt' => esc_html__( 'Footer column 2 - 2 - 8', 'gautama' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-2-2-8.jpg' ),
				),
				'6-2-2-2' => array(
					'alt' => esc_html__( 'Footer column 6 - 2 - 2 - 2', 'gautama' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-6-2-2-2.jpg' ),
				),
				'2-2-2-6' => array(
					'alt' => esc_html__( 'Footer column 2 - 2 - 2 - 6', 'gautama' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-2-2-2-6.jpg' ),
				),
				'2-2-4-4' => array(
					'alt' => esc_html__( 'Footer column 2 - 2 - 4 - 4', 'gautama' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-2-2-4-4.jpg' ),
				),
			),
			'default'  => '3-3-3-3',
			'required' => array('footer_type','=','static')
		),
		array(
			'id'            => 'footer_background',
			'type'          => 'background',
			'title'         => esc_html__( 'Footer Background (The Whole Footer)', 'gautama' ),
			'desc'          => esc_html__( 'Set footer background.', 'gautama' ),
			'preview_media' => true,
			'output'        => '.site-footer',
			'required' => array('footer_type','=','static')
		),
		array(
			'id'          => 'footer_top_bg',
			'type'        => 'color',
			'title'       => esc_html__( 'Footer top background color (This overlaps the Footer Background option)', 'gautama' ),
			'subtitle'    => esc_html__( 'Set background color for the footer top.', 'gautama' ),
			'required' => array('footer_type','=','static')
		),
		array(
			'id'          => 'footer_middle_bg',
			'type'        => 'color',
			'title'       => esc_html__( 'Footer middle background color (This overlaps the Footer Background option)', 'gautama' ),
			'subtitle'    => esc_html__( 'Set background color for the footer middle.', 'gautama' ),
			'required' => array('footer_type','=','static')
		),
		array(
			'id'          => 'footer_bottom_bg',
			'type'        => 'color',
			'title'       => esc_html__( 'Footer bottom background color (This overlaps the Footer Background option)', 'gautama' ),
			'subtitle'    => esc_html__( 'Set background color for the footer bottom.', 'gautama' ),
			'required' => array('footer_type','=','static')
		),
		array(
			'id'       => 'footer_newsletter_text',
			'type'     => 'text',
			'title'    => esc_html__( 'Newsletter Text', 'gautama' ),
			'required' => array(
				array('footer-layout', '!=', 'layout-1'),
				array('footer_type','=','static')
			),
		),
		array(
			'id'       => 'footer_newsletter_shortcode',
			'type'     => 'text',
			'title'    => esc_html__( 'Newsletter Shortcode', 'gautama' ),
			'placeholder'    => esc_html__( 'Example: [mc4wp_form id="47"]', 'gautama' ),
			'subtitle'    => esc_html__( 'Enter your newsletter shortcode, we recommend using MC4WP', 'gautama' ),
			'required' => array(
				array('footer-layout', '!=', 'layout-1'),
				array('footer_type','=','static')
			),
		),
		array(
			'id'       => 'copyright_text_left',
			'type'     => 'editor',
			'title'    => esc_html__( 'Copyright Text Left', 'gautama' ),
			'subtitle' => esc_html__( 'Enter the copyright right content', 'gautama' ),
			'default'  => 'Copyright @ by <a href="#">'.__("Theme Name", "gautama").'</a>',
			'required' => array('footer_type','=','static')
		),
		array(
			'id'       => 'copyright_text_right',
			'type'     => 'editor',
			'title'    => esc_html__( 'Copyright Text Right', 'gautama' ),
			'subtitle' => esc_html__( 'Enter the copyright right content', 'gautama' ),
			'default'  => 'Design by <a href="#">'.__("Theme Name", "gautama").'</a> 2020',
			'required' => array(
				array('footer-layout', '=', 'layout-1'),
				array('footer_type','=','static')
			),
		),
	),
);
