<?php
/**
 * portfolio settings
 *
 * @package Sigma
 */
return array(
	'title'  => esc_html__( 'Portfolio Settings', 'gautama' ),
	'id'     => 'portfolio_settings',
	'icon'   => 'el el-graph',
	'fields' => array(

		array(
			'id'       => 'portfolio_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Portfolio Sidebar', 'gautama' ),
			'subtitle' => esc_html__( 'Select the Portfolio sidebar position.', 'gautama' ),
			'options'  => array(
				'left-sidebar' => esc_html__( 'Left Sidebar', 'gautama' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'gautama' ),
			),
			'default'  => 'right-sidebar',
		),
		array(
			'id'       => 'portfolio_single_show_author',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Author box in sidebar', 'gautama' ),
			'default'  => false,
		),
		array(
			'id'       => 'portfolio_author_custom_image',
			'type'     => 'media',
			'subtitle' => esc_html__( 'Enter Custom Image.', 'gautama' ),
			'title'    => esc_html__( 'Author Widget custom image', 'gautama' ),
			'required' => array( 'portfolio_single_show_author', '=', true ),
		),
		array(
			'id'       => 'portfolio-style',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Portfolio Style', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the Portfolio archive style to display.', 'gautama' ),
			'options'  => array(
				'style-1' => esc_html__( 'Portfolio Style 1', 'gautama' ),
				'style-2' => esc_html__( 'Portfolio Style 2', 'gautama' ),
				'style-3' => esc_html__( 'Portfolio Style 3', 'gautama' ),
				'style-4' => esc_html__( 'Portfolio Style 4', 'gautama' ),
				'style-5' => esc_html__( 'Portfolio Style 5', 'gautama' ),
			),
			'default'  => 'style-1',
		),
		array(
			'id'       => 'portfolio-details-style',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Portfolio Detail Style', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the Portfolio detail style to display.', 'gautama' ),
			'options'  => array(
				'style-1' => esc_html__( 'Portfolio Style 1', 'gautama' ),
				'style-2' => esc_html__( 'Portfolio Style 2', 'gautama' ),
			),
			'default'  => 'style-1',
		),
		array(
			'id'       => 'portfolio-columns',
			'type'     => 'select',
			'title'    => esc_html__( 'Number of Columns', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the number of columns in portfolio archive.', 'gautama' ),
			'options'  => array(
				'col-lg-12' => esc_html__( '1 Column', 'gautama' ),
				'col-lg-6' => esc_html__( '2 Columns', 'gautama' ),
				'col-lg-4' => esc_html__( '3 Columns', 'gautama' ),
				'col-lg-3' => esc_html__( '4 Columns', 'gautama' ),
			),
			'default'  => 'col-lg-12',
		),

	),
);
