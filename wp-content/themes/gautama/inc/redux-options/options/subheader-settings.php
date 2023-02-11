<?php
/**
 * Subheader Settings
 *
 * @package Gautama
 */
return array(
	'title'  => esc_html__( 'Subheader Settings', 'gautama' ),
	'id'     => 'subheader_settings',
	'icon'   => 'el el-file-edit',
	'fields' => array(
		array(
			'id'      => 'display_subheader',
			'type'    => 'switch',
			'title'   => esc_html__( 'Display Subheader', 'gautama' ),
			'default' => 1,
		),
		array(
      'id'       => 'subheader_type',
      'type'     => 'select',
      'title'    => esc_html__('Subheader type', 'gautama'),
      'options'  => array(
        'static' => esc_html__('Static', 'gautama'),
				'page-template' => esc_html__('Page Template', 'gautama'),
      ),
      'default'  => 'static',
			'required' => array('display_subheader','=','1'),
    ),
		array(
      'id'       => 'subheader_type_page_template',
			'title' =>  esc_html__('Select Page Template', 'gautama'),
			'subtitle'  =>  esc_html__('Please select a page template to show in the subheader','gautama'),
      'type'     => 'select',
      'multi'    => false,
      'data'     => 'posts',
      'args'     => array( 'post_type' => 'sigma_templates', 'numberposts' => -1 ),
			'required' => array('subheader_type','=','page-template')
    ),
		array(
			'id'       => 'subheader_style',
			'type'     => 'select',
			'title'    => esc_html__('Subheader Style', 'gautama'),
			'options'  => array(
				'style-1' => esc_html__('Style 1', 'gautama'),
				'style-2' => esc_html__('Style 2', 'gautama'),
				'style-3' => esc_html__('Style 3', 'gautama'),
				'style-4' => esc_html__('Style 4', 'gautama'),
				'style-5' => esc_html__('Style 5', 'gautama'),
			),
			'default'  => 'style-1',
			'required' => array(
				array('display_subheader','=','1'),
				array('subheader_type','=','static')
			),
		),
		array(
			'id'       => 'display_breadcrumb',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Breadcrumb ?', 'gautama' ),
			'default'  => 1,
			'required' => array(
				array('display_subheader','=','1'),
				array('subheader_type','=','static')
			),
		),
		array(
			'id'       => 'breadcrumb_custom_separator',
			'type'     => 'switch',
			'title'    => esc_html__( 'Custom breadcrumb separator?', 'gautama' ),
			'default'  => 1,
			'required' => array(
				array('display_subheader','=','1'),
				array('subheader_type','=','static')
			),
		),
		array(
			'id'       => 'breadcrumb_custom_icon',
			'type'     => 'select',
			'title'    => esc_html__('Select Icon', 'gautama'),
			'subtitle'    => esc_html__('Select a custom icon as a seperator between breadcrumb items', 'gautama'),
			'options'  => gautama_get_fa_icons(),
			'required' => array(
				array('display_subheader','=','1'),
				array('breadcrumb_custom_separator','=','1'),
				array('subheader_type','=','static')
			),
		),
		array(
			'id'       => 'breadcrumb_position',
			'type'     => 'select',
			'title'    => esc_html__('Breadcrumbs Position', 'gautama'),
			'options'  => array(
				'before-title' => esc_html__('Before title', 'gautama'),
				'after-title' => esc_html__('After title', 'gautama'),
				'below-image' => esc_html__('Below Subheader', 'gautama'),
			),
			'required' => array(
				array('subheader_style','!=','style-4'),
				array( 'display_breadcrumb', '=', 1 ),

			),
			'default'  => 'after-title',
		),
		array(
			'id'          => 'breadcrumb_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Breadcrumbs text color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set the text color for your breadcrumbs', 'gautama' ),
			'required' 		=> array('display_breadcrumb',  '=', 1),
			'output'			=> array(
				'.breadcrumb .breadcrumb-item.active',
				'.breadcrumb .breadcrumb-item+.breadcrumb-item::before',
				'.sigma-subheader.style-4 .breadcrumb li:last-child',
				'.breadcrumb i',
				'.breadcrumb li',
				'.breadcrumb i',
				'.sigma-subheader.style-2 .breadcrumb li',
				'.sigma-subheader.style-3 .breadcrumb li',
				'.sigma-subheader.style-4 .breadcrumb i',
				'.sigma-subheader.style-4 .breadcrumb li:last-child',
				'.sigma-subheader.style-4 .breadcrumb li.active',
				'.sigma-subheader.style-5 .breadcrumb li'
			)
		),
		array(
			'id'          => 'breadcrumb_link_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Breadcrumbs link color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set the link color for your breadcrumbs', 'gautama' ),
			'required' 		=> array('display_breadcrumb',  '=', 1),
			'output'			=> array(
				'.breadcrumb .breadcrumb-item a',
				'.sigma-subheader.style-3 .breadcrumb li a',
				'.sigma-subheader.style-2 .breadcrumb li a',
				'.sigma-subheader.style-5 .breadcrumb li a'
			)
		),
		array(
			'id'          => 'breadcrumb_link_color_hover',
			'type'        => 'color',
			'title'       => esc_html__( 'Breadcrumbs link color on hover', 'gautama' ),
			'subtitle'    => esc_html__( 'Set the link color on hover for your breadcrumbs', 'gautama' ),
			'required' 		=> array('display_breadcrumb',  '=', 1),
			'output'			=> array(
				'.breadcrumb .breadcrumb-item a:hover',
				'.sigma-subheader.style-3 .breadcrumb li a:hover',
				'.sigma-subheader.style-2 .breadcrumb li a:hover',
				'.sigma-subheader.style-5 .breadcrumb li a:hover'
			)
		),
		array(
			'id'          => 'breadcrumb_bg',
			'type'        => 'color',
			'title'       => esc_html__( 'Breadcrumbs background color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set the background color for your breadcrumbs', 'gautama' ),
			'description' => esc_html__( 'Subheader styles 1, and 4, or if the breadcrumbs are under the subheader', 'gautama' ),
			'required' 		=> array(
				array('display_breadcrumb',  '=', 1),
				array('subheader_style','!=','style-5'),
			),
		),
		array(
			'id'       => 'subheader_alignment',
			'type'     => 'select',
			'title'    => esc_html__('Subheader Alignment', 'gautama'),
			'options'  => array(
				'text-left' => esc_html__('Left', 'gautama'),
				'text-center' => esc_html__('Center', 'gautama'),
				'text-right' => esc_html__('Right', 'gautama'),
			),
			'default'  => 'text-left',
			'required' => array(
				array('display_subheader','=','1'),
				array('subheader_type','=','static'),
				array('subheader_style','!=','style-5'),
			),
		),
		array(
			'id'       => 'subheader_banner_image',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'gautama' ),
			'compiler' => 'true',
			'subtitle' => esc_html__( 'Set page background image.', 'gautama' ),
			'default' => array('url' => get_parent_theme_file_uri('assets/images/logo.png')),
			'required' => array(
				array('display_subheader','=','1'),
				array('subheader_type','=','static')
			),
		),
		array(
			'id'       => 'subheader_caption',
			'type'     => 'text',
			'subtitle' => esc_html__( 'Enter caption title.', 'gautama' ),
			'title'    => esc_html__( 'Subheader Caption', 'gautama' ),
			'required' => array(
				array('display_subheader','=','1'),
				array('subheader_type','=','static')
			),
		),
		array(
			'id'          => 'subheader_title_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Subheader title color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set the title color for your subheader', 'gautama' ),
			'required' => array(
				array('display_subheader','=','1'),
				array('subheader_type','=','static')
			),
			'output'			=> array(
				'.sigma-subheader .page-title',
			)
		),
		array(
			'id'          => 'subheader_caption_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Subheader caption color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set the caption color for your subheader', 'gautama' ),
			'required' => array(
				array('display_subheader','=','1'),
				array('subheader_type','=','static')
			),
			'output'			=> array(
				'.sigma-subheader .subheader-caption',
			)
		),
		array(
			'id'       => 'subheader_background_color',
			'type'     => 'color_rgba',
			'title'    => esc_html__( 'Background Opacity Color', 'gautama' ),
			'mode'     => 'background-color',
			'output'   => '.sigma-subheader-layer',
			'required' => array(
				array('display_subheader','=','1'),
				array('subheader_type','=','static')
			),
		),
	),
);
