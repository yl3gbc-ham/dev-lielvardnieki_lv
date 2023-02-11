<?php
/**
 * Ministries settings
 *
 * @package Sigma
 */
return array(
	'title'  => esc_html__( 'Ministries Settings', 'gautama' ),
	'id'     => 'ministries_settings',
	'icon'   => 'el el-graph',
	'fields' => array(
		array(
			'id'       => 'ministries_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Ministries Sidebar', 'gautama' ),
			'subtitle' => esc_html__( 'Select the Ministries sidebar position.', 'gautama' ),
			'options'  => array(
				'left-sidebar' => esc_html__( 'Left Sidebar', 'gautama' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'gautama' ),
			),
			'default'  => 'right-sidebar',
		),
		array(
			'id'       => 'show_archive_thumbnail',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Archive Thumbnail', 'gautama' ),
			'default'  => false,
		),
		array(
			'id'       => 'ministries_author_custom_image',
			'type'     => 'media',
			'subtitle' => esc_html__( 'Enter Custom Image.', 'gautama' ),
			'title'    => esc_html__( 'Author Widget custom image', 'gautama' ),
			'required' => array( 'ministries_single_show_author', '=', true ),
		),
		array(
			'id'       => 'ministries-style',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Ministries Style', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the Ministries archive style to display.', 'gautama' ),
			'options'  => array(
				'style-1' => esc_html__( 'Ministries Style 1', 'gautama' ),
				'style-2' => esc_html__( 'Ministries Style 2', 'gautama' ),
			),
			'default'  => 'style-1',
		),
		array(
			'id'       => 'ministries-details-style',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Ministries Detail Style', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the Ministries detail style to display.', 'gautama' ),
			'options'  => array(
				'style-1' => esc_html__( 'Style 1', 'gautama' ),
				'style-2' => esc_html__( 'Style 2', 'gautama' ),
			),
			'default'  => 'style-1',
		),
		array(
			'id'       => 'ministries-columns',
			'type'     => 'select',
			'title'    => esc_html__( 'Number of Columns', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the number of columns in ministries archive.', 'gautama' ),
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
