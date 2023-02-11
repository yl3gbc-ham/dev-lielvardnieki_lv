<?php
/**
 * Slider layout shortcode options
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return a list of all slider options
 *
 * @since 1.0.0
 */
function sigmacore_get_slider_options(){

  $slider_options = [
    array(
      'type'        => 'textfield',
      'heading'     => esc_html__( 'Slider Speed', 'sigma-core' ),
      'param_name'  => 'post_slider_speed',
      'description' => esc_html__( 'Enter slider speed.', 'sigma-core' ),
      'dependency' => array(
        'element' => 'layout',
        'value'   => 'slider',
      ),
      'edit_field_class' => 'vc_col-sm-6 vc_column',
      'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
    ),
    array(
      'type'             => 'checkbox',
      'heading'          => esc_html__( 'Enable navigation dots?', 'sigma-core' ),
      'param_name'       => 'post_enable_navigation',
      'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
      'description'      => esc_html__( 'Select this checkbox to enable navigation dots.', 'sigma-core' ),
      'edit_field_class' => 'vc_col-sm-6 vc_column',
      'dependency' => array(
        'element' => 'layout',
        'value'   => 'slider',
      ),
      'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
    ),
		array(
			'type'             => 'dropdown',
			'heading'     => esc_html__( 'Arrows style', 'sigma-core' ),
			'param_name'  => 'post_slider_dots_style',
			'description' => esc_html__( 'Select the style of the arrows', 'sigma-core' ),
			'dependency' => array(
				'element' => 'post_enable_navigation',
				'value'   => 'yes',
			),
			'value'            => array(
				esc_html__( 'Style 1', 'sigma-core' ) => 'style-1',
				esc_html__( 'Style 2', 'sigma-core' ) => 'style-2',
			),
			'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
		),
    array(
      'type'             => 'checkbox',
      'heading'          => esc_html__( 'Enable Previous/Next Arrow ?', 'sigma-core' ),
      'param_name'       => 'post_enable_arrow',
      'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
      'description'      => esc_html__( 'Select this checkbox to enable previous/next arrow.', 'sigma-core' ),
      'edit_field_class' => 'vc_col-sm-6 vc_column',
      'dependency' => array(
        'element' => 'layout',
        'value'   => 'slider',
      ),
      'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
    ),

    array(
      'type'             => 'checkbox',
      'heading'          => esc_html__( 'Enable Slider Loop?', 'sigma-core' ),
      'param_name'       => 'post_enable_slider_loop',
      'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
      'description'      => esc_html__( 'Select this checkbox to enable slider loop.', 'sigma-core' ),
      'edit_field_class' => 'vc_col-sm-6 vc_column',
      'dependency' => array(
        'element' => 'layout',
        'value'   => 'slider',
      ),
      'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
    ),
    array(
      'type'             => 'checkbox',
      'heading'          => esc_html__( 'Enable Slider Autoplay?', 'sigma-core' ),
      'param_name'       => 'post_enable_slider_autoplay',
      'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
      'description'      => esc_html__( 'Select this checkbox to enable slider autoplay.', 'sigma-core' ),
      'edit_field_class' => 'vc_col-sm-6 vc_column',
      'dependency' => array(
        'element' => 'layout',
        'value'   => 'slider',
      ),
      'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
    ),
    array(
      'type'             => 'checkbox',
      'heading'          => esc_html__( 'Enable CenterMode?', 'sigma-core' ),
      'param_name'       => 'post_enable_slider_centermode',
      'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
      'description'      => esc_html__( 'Select this checkbox to enable centerMode.', 'sigma-core' ),
      'edit_field_class' => 'vc_col-sm-6 vc_column',
      'dependency' => array(
        'element' => 'layout',
        'value'   => 'slider',
      ),
      'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
    ),
    array(
      'type'        => 'textfield',
      'heading'     => esc_html__( 'Center Padding', 'sigma-core' ),
      'param_name'  => 'post_slider_centerpadding',
      'description' => esc_html__( 'Enter centerPadding.', 'sigma-core' ),
      'dependency' => array(
        'element' => 'post_enable_slider_centermode',
        'value'   => 'true',
      ),
      'edit_field_class' => 'vc_col-sm-6 vc_column',
      'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
    ),
    array(
      'type'        => 'textfield',
      'heading'     => esc_html__( 'Slider Autoplay Speed', 'sigma-core' ),
      'param_name'  => 'post_slider_autoplayspeed',
      'description' => esc_html__( 'Enter autoplay speed.', 'sigma-core' ),
      'dependency' => array(
        'element' => 'post_enable_slider_autoplay',
        'value'   => 'true',
      ),
      'edit_field_class' => 'vc_col-sm-6 vc_column',
      'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
    ),
		array(
      'type'             => 'dropdown',
      'heading'     => esc_html__( 'Arrows position', 'sigma-core' ),
      'param_name'  => 'post_slider_arrow_position',
      'description' => esc_html__( 'Select the position of the arrows', 'sigma-core' ),
			'dependency' => array(
        'element' => 'post_enable_arrow',
        'value'   => 'true',
      ),
      'value'            => array(
				esc_html__( 'Top Right', 'sigma-core' ) => 'arrows-top-right',
				esc_html__( 'Top Left', 'sigma-core' ) => 'arrows-top-left',
				esc_html__( 'Top Center', 'sigma-core' ) => 'arrows-top-center',
				esc_html__( 'Bottom Right', 'sigma-core' ) => 'arrows-bottom-right',
				esc_html__( 'Bottom Left', 'sigma-core' ) => 'arrows-bottom-left',
				esc_html__( 'Bottom Center', 'sigma-core' ) => 'arrows-bottom-center',
				esc_html__( 'Center Center', 'sigma-core' ) => 'arrows-center-center',
      ),
      'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
    ),
		array(
      'type'             => 'dropdown',
      'heading'     => esc_html__( 'Arrows style', 'sigma-core' ),
      'param_name'  => 'post_slider_arrow_style',
      'description' => esc_html__( 'Select the style of the arrows', 'sigma-core' ),
			'dependency' => array(
        'element' => 'post_enable_arrow',
        'value'   => 'true',
      ),
      'value'            => array(
				esc_html__( 'Style 1', 'sigma-core' ) => 'style-1',
				esc_html__( 'Style 2', 'sigma-core' ) => 'style-2',
				esc_html__( 'Style 3', 'sigma-core' ) => 'style-3',
				esc_html__( 'Style 4', 'sigma-core' ) => 'style-4',
      ),
      'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
    ),
    array(
      'type'             => 'dropdown',
      'heading'     => esc_html__( 'No of slide to scroll', 'sigma-core' ),
      'param_name'  => 'post_slider_scroll',
      'description' => esc_html__( 'Enter number of slide to scroll.', 'sigma-core' ),
      'dependency' => array(
        'element' => 'layout',
        'value'   => 'slider',
      ),
      'value'            => array(
        '8' => '8',
        '7' => '7',
        '6' => '6',
        '5' => '5',
        '4' => '4',
        '3' => '3',
        '2' => '2',
        '1' => '1',
      ),
      'std'              => '1',
      'save_always'      => true,
      'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
    ),
    array(
      'type'             => 'dropdown',
      'heading'          => esc_html__( 'Number of slides for > 1400px', 'sigma-core' ),
      'param_name'       => 'post_slider_responsive_xl',
      'value'            => array(
				'8' => '8',
        '7' => '7',
        '6' => '6',
        '5' => '5',
        '4' => '4',
        '3' => '3',
        '2' => '2',
        '1' => '1',
      ),
      'std'              => '3',
      'description'      => esc_html__( 'Select number of slides per view for > 1400px screen.', 'sigma-core' ),
      'edit_field_class' => 'vc_col-sm-6 vc_column',
      'save_always'      => true,
      'dependency' => array(
        'element' => 'layout',
        'value'   => 'slider',
      ),
      'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
    ),
    array(
      'type'             => 'dropdown',
      'heading'          => esc_html__( 'Number of slides for < 1400px', 'sigma-core' ),
      'param_name'       => 'post_slider_responsive_lg',
      'value'            => array(
				'8' => '8',
        '7' => '7',
        '6' => '6',
        '5' => '5',
        '4' => '4',
        '3' => '3',
        '2' => '2',
        '1' => '1',
      ),
      'std'              => '3',
      'description'      => esc_html__( 'Select number of slides per view for < 1400px screen.', 'sigma-core' ),
      'edit_field_class' => 'vc_col-sm-6 vc_column',
      'save_always'      => true,
      'dependency' => array(
        'element' => 'layout',
        'value'   => 'slider',
      ),
      'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
    ),
    array(
      'type'             => 'dropdown',
      'heading'          => esc_html__( 'Number of slides for < 992px', 'sigma-core' ),
      'param_name'       => 'post_slider_responsive_md',
      'value'            => array(
				'8' => '8',
        '7' => '7',
        '6' => '6',
        '5' => '5',
        '4' => '4',
        '3' => '3',
        '2' => '2',
        '1' => '1',
      ),
      'std'              => '2',
      'description'      => esc_html__( 'Select number of slides per view for < 992px screen.', 'sigma-core' ),
      'edit_field_class' => 'vc_col-sm-6 vc_column',
      'save_always'      => true,
      'dependency' => array(
        'element' => 'layout',
        'value'   => 'slider',
      ),
      'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
    ),
    array(
      'type'             => 'dropdown',
      'heading'          => esc_html__( 'Number of slides for < 768px', 'sigma-core' ),
      'param_name'       => 'post_slider_responsive_sm',
      'value'            => array(
				'5' => '5',
        '4' => '4',
        '3' => '3',
        '2' => '2',
        '1' => '1',
      ),
      'std'              => '1',
      'description'      => esc_html__( 'Select number of slides per view in small devices < 768px.', 'sigma-core' ),
      'edit_field_class' => 'vc_col-sm-6 vc_column',
      'save_always'      => true,
      'dependency' => array(
        'element' => 'layout',
        'value'   => 'slider',
      ),
      'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
    ),
    array(
      'type'             => 'dropdown',
      'heading'          => esc_html__( 'Number of slides for < 576px', 'sigma-core' ),
      'param_name'       => 'post_slider_responsive_xs',
      'value'            => array(
				'5' => '5',
        '4' => '4',
        '3' => '3',
        '2' => '2',
        '1' => '1',
      ),
      'std'              => '1',
      'description'      => esc_html__( 'Select number of slides per view in small devices < 576px.', 'sigma-core' ),
      'edit_field_class' => 'vc_col-sm-6 vc_column',
      'save_always'      => true,
      'dependency' => array(
        'element' => 'layout',
        'value'   => 'slider',
      ),
      'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
    ),
  ];

  return $slider_options;

}

/**
 * Return a list of all slider attributes
 *
 * @since 1.0.0
 */
function sigmacore_get_slider_attributes(){

  $slider_attributes = [
    'post_slider_speed'             => '',
		'post_slider_arrow_style'				=> 'style-1',
		'post_slider_dots_style'				=> 'style-1',
		'post_slider_arrow_position'		=> 'arrows-top-right',
    'post_enable_navigation'        => '',
    'post_enable_arrow'             => '',
    'post_enable_slider_loop'       => '',
    'post_enable_slider_autoplay'   => '',
    'post_enable_slider_centermode' => '',
    'post_slider_centerpadding'     => '',
    'post_slider_autoplayspeed'     => '',
    'post_slider_scroll'            => 1,
    'post_slider_responsive_xl'     => 3,
    'post_slider_responsive_lg'     => 2,
    'post_slider_responsive_md'     => 2,
    'post_slider_responsive_sm'     => 1,
    'post_slider_responsive_xs'     => 1,
  ];

  return $slider_attributes;

}


?>
