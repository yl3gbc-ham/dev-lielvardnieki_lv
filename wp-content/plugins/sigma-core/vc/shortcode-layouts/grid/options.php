<?php
/**
 * Grid layout shortcode options
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return a list of all grid options
 *
 * @since 1.0.0
 */
function sigmacore_get_grid_options(){

  $grid_options = [
    array(
      'type'             => 'dropdown',
      'heading'          => esc_html__( 'Number of items for > 992px', 'sigma-core' ),
      'param_name'       => 'post_grid_responsive_xl',
      'value'            => array(
        '4' => '4',
        '3' => '3',
        '2' => '2',
        '1' => '1',
      ),
      'std'              => '3',
      'description'      => esc_html__( 'Select number of items per view for > 992px screen.', 'sigma-core' ),
      'edit_field_class' => 'vc_col-sm-6 vc_column',
      'save_always'      => true,
      'dependency' => array(
        'element' => 'layout',
        'value'   => ['grid', 'isotope'],
      ),
      'group'            => esc_html__( 'Grid Settings', 'sigma-core' ),
    ),
    array(
      'type'             => 'dropdown',
      'heading'          => esc_html__( 'Number of items for < 992px', 'sigma-core' ),
      'param_name'       => 'post_grid_responsive_lg',
      'value'            => array(
        '3' => '3',
        '2' => '2',
        '1' => '1',
      ),
      'std'              => '3',
      'description'      => esc_html__( 'Select number of items per view for < 992px screen.', 'sigma-core' ),
      'edit_field_class' => 'vc_col-sm-6 vc_column',
      'save_always'      => true,
      'dependency' => array(
        'element' => 'layout',
        'value'   => ['grid', 'isotope'],
      ),
      'group'            => esc_html__( 'Grid Settings', 'sigma-core' ),
    ),
    array(
      'type'             => 'dropdown',
      'heading'          => esc_html__( 'Number of items for < 768px', 'sigma-core' ),
      'param_name'       => 'post_grid_responsive_md',
      'value'            => array(
        '3' => '3',
        '2' => '2',
        '1' => '1',
      ),
      'std'              => '2',
      'description'      => esc_html__( 'Select number of items per view for < 768px screen.', 'sigma-core' ),
      'edit_field_class' => 'vc_col-sm-6 vc_column',
      'save_always'      => true,
      'dependency'       => array(
        'element' => 'layout',
        'value'   => ['grid', 'isotope'],
      ),
      'group'            => esc_html__( 'Grid Settings', 'sigma-core' ),
    ),
    array(
      'type'             => 'dropdown',
      'heading'          => esc_html__( 'Number of items for < 576px', 'sigma-core' ),
      'param_name'       => 'post_grid_responsive_sm',
      'value'            => array(
        '2' => '2',
        '1' => '1',
      ),
      'std'              => '1',
      'description'      => esc_html__( 'Select number of items per view in small devices &le;576px.', 'sigma-core' ),
      'edit_field_class' => 'vc_col-sm-6 vc_column',
      'save_always'      => true,
      'dependency' => array(
        'element' => 'layout',
        'value'   => ['grid', 'isotope'],
      ),
      'group'            => esc_html__( 'Grid Settings', 'sigma-core' ),
    ),
  ];

  return $grid_options;

}

/**
 * Return a list of all grid attributes
 *
 * @since 1.0.0
 */
function sigmacore_get_grid_attributes(){

  $grid_attributes = [
    'post_grid_responsive_xl' => 3,
    'post_grid_responsive_lg' => 2,
    'post_grid_responsive_md' => 2,
    'post_grid_responsive_sm' => 1,
  ];

  return $grid_attributes;

}

?>
