<?php
/**
 * Sermons settings
 *
 * @package Sigma
 */
return array(
	'title'  => esc_html__( 'Sermons Settings', 'gautama' ),
	'id'     => 'sermons_settings',
	'icon'   => 'el el-graph',
	'fields' => array(
		array(
			'id'       => 'sermons_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Sermons Sidebar', 'gautama' ),
			'subtitle' => esc_html__( 'Select the Sermons sidebar position.', 'gautama' ),
			'options'  => array(
				'left-sidebar' => esc_html__( 'Left Sidebar', 'gautama' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'gautama' ),
			),
			'default'  => 'right-sidebar',
		),
		array(
			'id'       => 'sermons-style',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Sermons Style', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the Sermons archive style to display.', 'gautama' ),
			'options'  => array(
				'style-1' => esc_html__( 'Sermons Style 1', 'gautama' ),
			),
			'default'  => 'style-1',
		),
		array(
			'id'       => 'sermons-columns',
			'type'     => 'select',
			'title'    => esc_html__( 'Number of Columns', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the number of columns in sermons archive.', 'gautama' ),
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
