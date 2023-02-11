<?php
/**
 * Page Settings
 *
 * @package Gautama
 */
return array(
	'title'  => esc_html__( 'Page Settings', 'gautama' ),
	'id'     => 'page_settings',
	'icon'   => 'el el-file-edit',
	'fields' => array(
		array(
			'id'       => 'page_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Page Sidebar', 'gautama' ),
			'subtitle' => esc_html__( 'Select the Page sidebar position.', 'gautama' ),
			'options'  => array(
				'full-width' => esc_html__( 'No Sidebar', 'gautama' ),
				'left-sidebar' => esc_html__( 'Left Sidebar', 'gautama' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'gautama' ),
			),
			'default'  => 'right-sidebar',
		),
		array(
			'id'       => 'page_layout',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Page Layout', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the page layout.', 'gautama' ),
			'options'  => array(
				'container' => esc_html__( 'Boxed', 'gautama' ),
				'container-fluid' => esc_html__( 'Full Width', 'gautama' ),
			),
			'description'	=>	esc_html__('Only works in pages that do not have WP Bakery content.', 'gautama'),
			'default'  => 'container',
		),

	),
);
