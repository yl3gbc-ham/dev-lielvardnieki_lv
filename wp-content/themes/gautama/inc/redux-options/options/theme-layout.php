<?php
/**
 * Theme Layout
 *
 * @package Gautama
 */
return array(
  'title' => 'Theme Layout' ,
  'desc'  =>  esc_html__('This section control the theme\'s layout', 'gautama'),
  'id'  => 'theme-layout-options' ,
  'customizer_width' => '400px' ,
  'icon'  =>  'el el-screen',
  'fields'  =>  array(
    array(
      'id'       => 'content_size',
      'type'     => 'select',
      'title'    => esc_html__('Content Size', 'gautama'),
      'subtitle'     => esc_html__('Please choose the desired default size for the content.', 'gautama'),
      'options'  => array(
        '1140' => '1140px',
        '960' => '960px',
        'custom'  =>  esc_html__('Custom Size', 'gautama')
      ),
    ),
    array(
      'id'       => 'content_size_custom',
      'type'     => 'slider',
      'title'    => esc_html__('Custom Content Size', 'gautama'),
      'subtitle' => esc_html__('Select your desired content size', 'gautama'),
      'min'      => 960,
      'step'     => 1,
      'max'      => 1900,
      'resolution' => 1,
      'display_value' => 'text',
      'required'  =>  array( 'content_size', 'equals', 'custom' ),
    ),
     array(
       'id'       => 'body_bg',
       'type'     => 'background',
       'title'    => esc_html__('Website body Background color / Image', 'gautama'),
       'compiler' => 'true',
       'background-color' => true,
       'background-attachment' => true,
       'output'  =>  'body',
     ),
     array(
       'id'       => 'mobile_view',
       'type'     => 'select',
       'title'    => esc_html__('Mobile View', 'gautama'),
       'subtitle'     => esc_html__('Enabling App view will redirect your users to a custom home page if they were on mobile.', 'gautama'),
       'options'  => array(
         'app_view' => esc_html__('App View', 'gautama'),
         'responsive_view' => esc_html__('Responsive View', 'gautama'),
         ),
        'default'  => 'responsive_view',
     ),
     array(
      'id'       => 'app_view_home',
      'type'     => 'select',
      'multi'    => false,
      'data'     => 'pages',
      'title'    => esc_html__( 'Your App view Home page', 'gautama' ),
      'subtitle' => esc_html__( 'Enter the URL for the App view Home page', 'gautama' ),
      'required' => array('mobile_view','equals', array('app_view'))
    ),
    array(
      'id'   =>'preloader_divider',
      'type' => 'divide'
    ),
    array(
			'id'       => 'preloader_enable',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Preloader', 'gautama' ),
			'default'  => 1,
		),
    array(
      'id'       => 'preloader_style',
      'type'     => 'select',
      'title'    => esc_html__('Preloader style', 'gautama'),
      'subtitle'     => esc_html__('Please choose the preloader style', 'gautama'),
      'options'  => array(
        'default'  =>  esc_html__('Default', 'gautama'),
        'name'     =>  esc_html__('Website Name', 'gautama'),
        'eclipse'  =>  esc_html__('Eclipse', 'gautama'),
        'spinner'  =>  esc_html__('Spinner', 'gautama'),
        'diamond'  =>  esc_html__('Diamond', 'gautama'),
        'ripple'   =>  esc_html__('Ripple', 'gautama'),
        'gear'     =>  esc_html__('Gear', 'gautama'),
        'pulse'    =>  esc_html__('Pulse', 'gautama'),
        'squares'  =>  esc_html__('Squares', 'gautama'),
        'dual'     =>  esc_html__('Dual', 'gautama'),
      ),
      'required' => array('preloader_enable','=','1'),
      'default'  => 'default',
    ),
    array(
			'id'          => 'preloader_bg',
			'type'        => 'color',
			'title'       => esc_html__( 'preloader background color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set background color for the preloader', 'gautama' ),
			'required' => array('preloader_enable','=','1')
		),
    array(
			'id'          => 'preloader_color',
			'type'        => 'color',
			'title'       => esc_html__( 'preloader color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set color for the preloader', 'gautama' ),
			'required' => array('preloader_enable','=','1')
		),
    array(
      'id'   =>'back_to_top_divider',
      'type' => 'divide'
    ),
    array(
			'id'       => 'back_to_top',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Back to Top', 'gautama' ),
			'default'  => 1,
		),
    array(
			'id'       => 'back_to_top_icon',
			'type'     => 'select',
			'title'    => esc_html__('Back to top custom icon', 'gautama'),
			'subtitle'    => esc_html__('Select a custom icon for the back to top button', 'gautama'),
			'options'  => gautama_get_fa_icons(),
			'required' => array('back_to_top','=','1'),
      'default'  => 'fas fa-arrow-up',
		),
    array(
      'id'       => 'back_to_top_position',
      'type'     => 'select',
      'title'    => esc_html__('Back to top Position', 'gautama'),
      'subtitle'     => esc_html__('Please choose the desired position for your button', 'gautama'),
      'options'  => array(
        'bottom-right'  =>  esc_html__('Bottom Right', 'gautama'),
        'bottom-center'  =>  esc_html__('Bottom Center', 'gautama'),
        'bottom-left'  =>  esc_html__('Bottom Left', 'gautama'),
      ),
      'required' => array('back_to_top','=','1'),
    ),
    array(
      'id'       => 'back_to_top_style',
      'type'     => 'select',
      'title'    => esc_html__('Back to top style', 'gautama'),
      'subtitle'     => esc_html__('Please choose the desired style for your button', 'gautama'),
      'options'  => array(
        'square'  =>  esc_html__('Square', 'gautama'),
        'round'  =>  esc_html__('Round', 'gautama'),
        'circle'  =>  esc_html__('Circle', 'gautama'),
      ),
      'required' => array('back_to_top','=','1'),
    ),
    array(
			'id'          => 'back_to_top_bg',
			'type'        => 'color',
			'title'       => esc_html__( 'Back to top background color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set background color for the button', 'gautama' ),
			'required' => array('back_to_top','=','1')
		),
    array(
			'id'          => 'back_to_top_bg_hover',
			'type'        => 'color',
			'title'       => esc_html__( 'Back to top background color on hover', 'gautama' ),
			'subtitle'    => esc_html__( 'Set background color for the button on hover', 'gautama' ),
			'required' => array('back_to_top','=','1')
		),
    array(
			'id'          => 'back_to_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Back to top color', 'gautama' ),
			'subtitle'    => esc_html__( 'Set color for the button', 'gautama' ),
			'required' => array('back_to_top','=','1'),
      'output'        => ['.sigma_to-top'],
		),
    array(
			'id'          => 'back_to_color_hover',
			'type'        => 'color',
			'title'       => esc_html__( 'Back to top color on hover', 'gautama' ),
			'subtitle'    => esc_html__( 'Set color for the button on hover', 'gautama' ),
			'required' => array('back_to_top','=','1'),
      'output'        => ['.sigma_to-top:hover'],
		),
    array(
      'id'   =>'retina_divider',
      'type' => 'divide'
    ),
    array(
			'id'       => 'enable_retina',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Retina Display', 'gautama' ),
		),
    array(
			'id'       => 'retina_ready',
			'type'     => 'text',
			'title'    => esc_html__( 'Retina Multiplier', 'gautama' ),
      'subtitle' => esc_html__( 'Set the Retina Multiplier value. Example: 2. This will multiply the default image size by 2. If the image size was 700x700, and you set the multipler to 2, it will become 1400x1400. This will result in crispier images', 'gautama' ),
			'required' => array( 'enable_retina', '=', '1' ),
      'default' => '1',
      'placeholder' =>  esc_html__('Example 1,2 or 3', 'gautama'),
      'validate' => array( 'numeric', 'not_empty' ),
		),
  ),
);
