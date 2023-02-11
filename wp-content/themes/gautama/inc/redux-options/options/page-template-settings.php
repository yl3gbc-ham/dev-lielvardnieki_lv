<?php
/**
 * Page Template Settings
 *
 * @package Gautama
 */
return array(
	'title'            => esc_html__( 'Page Template', 'gautama' ),
	'id'               => 'page_template_settings',
	'customizer_width' => '400px',
	'icon'             => 'el el-file-edit',
	'fields'           => array(
		array(
			'id'      => 'enable_page_template_before_header',
			'type'    => 'switch',
			'title'   => esc_html__( 'Page Template Before Header', 'gautama' ),
      'subtitle' => esc_html__( 'Enable to  show custom page template before header.', 'gautama' ),
			'default' => false,
		),
    array(
			'id'       => 'page_template_before_header',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Page Template', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the page template to display before header.', 'gautama' ),
			'options'  => gautama_get_posts_select('sigma_templates'),
      'required' => array('enable_page_template_before_header','=','true')
		),
		array(
			'id'      => 'enable_page_template_after_header',
			'type'    => 'switch',
			'title'   => esc_html__( 'Page Template After Header', 'gautama' ),
			'subtitle' => esc_html__( 'Enable to  show custom page template after header.', 'gautama' ),
			'default' => false,
		),
		array(
			'id'       => 'page_template_after_header',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Page Template', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the page template to display after header.', 'gautama' ),
			'options'  => gautama_get_posts_select('sigma_templates'),
			'required' => array('enable_page_template_after_header','=','true')
		),
		array(
			'id'      => 'enable_page_template_before_footer',
			'type'    => 'switch',
			'title'   => esc_html__( 'Page Template Before Footer', 'gautama' ),
      'subtitle' => esc_html__( 'Enable to  show custom page template before footer.', 'gautama' ),
			'default' => false,
		),
    array(
			'id'       => 'page_template_before_footer',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Page Template', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the page template to display before footer.', 'gautama' ),
			'options'  => gautama_get_posts_select('sigma_templates'),
      'required' => array('enable_page_template_before_footer','=','true')
		),
		array(
			'id'      => 'enable_page_template_after_footer',
			'type'    => 'switch',
			'title'   => esc_html__( 'Page Template After Footer', 'gautama' ),
			'subtitle' => esc_html__( 'Enable to  show custom page template after footer.', 'gautama' ),
			'default' => false,
		),
		array(
			'id'       => 'page_template_after_footer',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Page Template', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the page template to display after footer.', 'gautama' ),
			'options'  => gautama_get_posts_select('sigma_templates'),
			'required' => array('enable_page_template_after_footer','=','true')
		),
	),
);
