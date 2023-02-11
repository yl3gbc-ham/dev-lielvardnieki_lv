<?php
/**
 * 404 Settings
 *
 * @package Gautama
 */
return array(
	'title'            => esc_html__( '404 Page', 'gautama' ),
	'id'               => '404_page',
	'customizer_width' => '400px',
	'icon'             => 'el el-warning-sign',
	'fields'           => array(
		array(
      'id'       => '404_type',
      'type'     => 'select',
      'title'    => esc_html__('404 Page type', 'gautama'),
      'options'  => array(
        'static' => esc_html__('Static', 'gautama'),
				'slider-rev' => esc_html__('Slider Revolution', 'gautama'),
				'page-template' => esc_html__('Page Template', 'gautama'),
      ),
      'default'  => 'static',
    ),
		array(
      'id'  =>  '404_type_slider',
      'type'  =>  'select',
      'title' =>  esc_html__('Select Slider', 'gautama'),
      'subtitle'  =>  esc_html__('Please select a slider revolution to show in the 404 page','gautama'),
      'options' => gautama_get_rev_sliders(),
      'required' => array('404_type','=','slider-rev')
    ),
    array(
      'id'       => '404_type_page_template',
			'title' =>  esc_html__('Select Page Template', 'gautama'),
			'subtitle'  =>  esc_html__('Please select a page template to show in the 404 page','gautama'),
      'type'     => 'select',
      'multi'    => false,
      'data'     => 'posts',
      'args'     => array( 'post_type' => 'sigma_templates', 'numberposts' => -1 ),
			'required' => array('404_type','=','page-template')
    ),
		array(
			'id'      => 'fof_page_title',
			'type'    => 'text',
			'title'   => esc_html__( 'Page Title', 'gautama' ),
			'desc'    => esc_html__( 'Enter 404 page title.', 'gautama' ),
			'default' => esc_html__( '404', 'gautama' ),
			'required' => array('404_type','=','static')
		),
		array(
			'id'       => 'fof_page_description',
			'type'     => 'textarea',
			'title'    => esc_html__( 'Page Description', 'gautama' ),
			'desc'     => esc_html__( 'Enter 404 page description.', 'gautama' ),
			'validate' => 'html_custom',
			'default'  => 'It looks like nothing was found at this location you can visit slidesigma website if you have some time on your shoulders',
			'required' => array('404_type','=','static')
		),
		array(
			'id'            => 'fof_page_background',
			'type'          => 'background',
			'title'         => esc_html__( '404 Background', 'gautama' ),
			'desc'          => esc_html__( 'Set 404 background.', 'gautama' ),
			'preview_media' => true,
			'output'        => '.fof-page-container',
			'required' => array('404_type','=','static')
		),
		array(
			'id'      => 'fof_page_back_to_home',
			'type'    => 'switch',
			'title'   => esc_html__( 'Back to Home', 'gautama' ),
			'default' => true,
			'required' => array('404_type','=','static')
		),
	),
);
