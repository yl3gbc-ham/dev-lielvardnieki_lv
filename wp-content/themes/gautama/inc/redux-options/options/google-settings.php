<?php
/**
 * 404 Settings
 *
 * @package Gautama
 */
return array(
	'title'            => esc_html__( 'Google Settings', 'gautama' ),
	'id'               => 'google_options',
	'customizer_width' => '400px',
	'icon'             => 'el el-graph',
	'fields'           => array(

		array(
			'id'      => 'google_analytics',
			'type'    => 'textarea',
			'title'   => esc_html__( 'Google Analytics', 'gautama' ),
			'subtitle'    => esc_html__( 'Enter your Google Analytics tracking code here', 'gautama' ),
		),

    array(
			'id'      => 'google_tag_manager',
			'type'    => 'textarea',
			'title'   => esc_html__( 'Google Tag Manager', 'gautama' ),
			'subtitle'    => esc_html__( 'Enter your Google Tag Manager tracking code here', 'gautama' ),
		),

    array(
			'id'      => 'google_web_master',
			'type'    => 'textarea',
			'title'   => esc_html__( 'Google Web Master Tools', 'gautama' ),
			'subtitle'    => esc_html__( 'Enter your Google Web Master Tools <meta> tag here', 'gautama' ),
		),

	),
);
