<?php
/**
 * Blog Settings
 *
 * @package gautama
 */
return array(
	'title'  => esc_html( 'Blog Settings', 'gautama' ),
	'id'     => 'blog_settings',
	'icon'   => 'el el-blogger',
	'fields' => array(
		array(
			'id'       => 'blog-style',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Blog Style', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the blog style to display.', 'gautama' ),
			'options'  => array(
				'style-1' => esc_html__( 'Blog Style 1', 'gautama' ),
				'style-2' => esc_html__( 'Blog Style 2', 'gautama' ),
				'style-3' => esc_html__( 'Blog Style 3', 'gautama' ),
				'style-4' => esc_html__( 'Blog Style 4', 'gautama' ),
				'style-5' => esc_html__( 'Blog Style 5', 'gautama' ),
				'style-6' => esc_html__( 'Blog Style 6', 'gautama' ),
				'style-7' => esc_html__( 'Blog Style 7', 'gautama' ),
				'style-8' => esc_html__( 'Blog Style 8', 'gautama' ),
				'style-9' => esc_html__( 'Blog Style 9', 'gautama' ),
				'style-10' => esc_html__( 'Blog Style 10', 'gautama' ),
			),
			'default'  => 'style-6',
		),
		array(
			'id'       => 'blog-columns',
			'type'     => 'select',
			'title'    => esc_html__( 'Number of Columns', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the number of columns in blog archive.', 'gautama' ),
			'options'  => array(
				'col-lg-12' => esc_html__( '1 Column', 'gautama' ),
				'col-lg-6' => esc_html__( '2 Columns', 'gautama' ),
				'col-lg-4' => esc_html__( '3 Columns', 'gautama' ),
				'col-lg-3' => esc_html__( '4 Columns', 'gautama' ),
			),
			'default'  => 'col-lg-12',
		),
		array(
			'id'       => 'blog-sidebar-style',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Sidebar Style', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the sidebar style to display.', 'gautama' ),
			'options'  => array(
				'style-1' => esc_html__( 'Sidebar Style 1', 'gautama' ),
				'style-2' => esc_html__( 'Sidebar Style 2', 'gautama' ),
				'style-3' => esc_html__( 'Sidebar Style 3', 'gautama' ),
			),
			'default'  => 'style-2',
		),
		array(
			'id'       => 'blog_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Blog Sidebar', 'gautama' ),
			'subtitle' => esc_html__( 'Select the blog sidebar position.', 'gautama' ),
			'options'  => array(
				'full-width' => esc_html__( 'No Sidebar', 'gautama' ),
				'left-sidebar' => esc_html__( 'Left Sidebar', 'gautama' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'gautama' ),
			),
			'default'  => 'right-sidebar',
		),
		array(
			'id'       => 'blog-details-style',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Blog Detail Style', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the blog detail style to display.', 'gautama' ),
			'options'  => array(
				'style-1' => esc_html__( 'Blog Style 1', 'gautama' ),
				'style-2' => esc_html__( 'Blog Style 2', 'gautama' ),
			),
			'default'  => 'style-2',
		),
		array(
			'id'       => 'pagination-style',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Pagination Style', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the pagination style to display.', 'gautama' ),
			'options'  => array(
				'style-1' => esc_html__( 'Style 1', 'gautama' ),
				'style-2' => esc_html__( 'Style 2', 'gautama' ),
			),
			'default'  => 'style-2',
		),
		array(
			'id'       => 'facebook_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Facebook Share', 'gautama' ),
			'subtitle' => esc_html__( 'You can share post on facebook.', 'gautama' ),
			'default'  => false,
		),
		array(
			'id'       => 'twitter_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Twitter Share', 'gautama' ),
			'subtitle' => esc_html__( 'You can share post on twitter', 'gautama' ),
			'default'  => false,
		),
		array(
			'id'       => 'linkedin_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Linkedin Share', 'gautama' ),
			'subtitle' => esc_html__( 'You can share post on linkedin', 'gautama' ),
			'default'  => false,
		),
		array(
			'id'       => 'pinterest_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Pinterest Share', 'gautama' ),
			'subtitle' => esc_html__( 'You can share post on pinterest', 'gautama' ),
			'default'  => false,
		),
		array(
			'id'       => 'tumblr_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Tumblr Share', 'gautama' ),
			'subtitle' => esc_html__( 'You can share post on Tumblr', 'gautama' ),
			'default'  => false,
		),
		array(
			'id'       => 'skype_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Skype Share', 'gautama' ),
			'subtitle' => esc_html__( 'You can share post on Skype', 'gautama' ),
			'default'  => false,
		),
	),
);
