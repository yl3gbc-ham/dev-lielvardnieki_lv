<?php
/**
 * Color Scheme
 *
 * @package Gautama
 */
return array(
	'title'  => esc_html__( 'Color Scheme', 'gautama' ),
	'id'     => 'color_scheme_settings',
	'desc'   => esc_html__( 'In color schemes, you can change the site default color and set as per your site design.', 'gautama' ),
	'icon'   => 'el el-brush',
	'fields' => array(
		array(
			'id'          => 'primary_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Primary Color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set primary color for the website.', 'gautama' ),
			'transparent' => false,
			'default'     => '#d6a77b',
		),
		array(
			'id'          => 'secondary_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Secondary Color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set secondary color for the website.', 'gautama' ),
			'transparent' => false,
			'default'     => '#1c1c1c',
		),
		array(
			'id'          => 'tertiary_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Tertiary Color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set tertiary color for the website.', 'gautama' ),
			'transparent' => false,
			'default'     => '#efefef',
		),
	),
);
