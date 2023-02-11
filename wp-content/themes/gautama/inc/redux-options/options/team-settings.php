<?php

/**
 * Team Settings
 *
 * @package Gautama
 */
return array(
	'title'  => esc_html__( 'Team Settings', 'gautama' ),
	'id'     => 'team_settings',
	'icon'   => 'el el-graph',
	'fields' => array(
    array(
			'id'       => 'team-style',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Team Style', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the team archive style to display.', 'gautama' ),
			'options'  => array(
				'style-1' => esc_html__( 'Team Style 1', 'gautama' ),
				'style-2' => esc_html__( 'Team Style 2', 'gautama' ),
				'style-3' => esc_html__( 'Team Style 3', 'gautama' ),
				'style-4' => esc_html__( 'Team Style 4', 'gautama' ),
				'style-5' => esc_html__( 'Team Style 5', 'gautama' ),
				'style-6' => esc_html__( 'Team Style 6', 'gautama' ),
				'style-7' => esc_html__( 'Team Style 7', 'gautama' ),
			),
			'default'  => 'style-2',
		),

		array(
			'id'       => 'team-columns',
			'type'     => 'select',
			'title'    => esc_html__( 'Number of Columns', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the number of columns in team archive.', 'gautama' ),
			'options'  => array(
				'col-lg-12' => esc_html__( '1 Column', 'gautama' ),
				'col-lg-6' => esc_html__( '2 Columns', 'gautama' ),
				'col-lg-4' => esc_html__( '3 Columns', 'gautama' ),
				'col-lg-3' => esc_html__( '4 Columns', 'gautama' ),
			),
			'default'  => 'col-lg-6',
		),

	),
);
