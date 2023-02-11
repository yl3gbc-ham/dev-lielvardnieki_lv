<?php
/**
 * File responsible for adding all vc layout functionality
 *
 * @package Sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-layouts/slider/options.php';
require_once trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-layouts/slider/helpers.php';

require_once trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-layouts/grid/options.php';
require_once trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-layouts/grid/helpers.php';

require_once trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-layouts/isotope/options.php';
require_once trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-layouts/isotope/helpers.php';

/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 */
function sigmacore_enqueue_shortcode_layouts_css() {


	wp_enqueue_style( 'sigma-vc-layouts', trailingslashit( SIGMACORE_URL ) . 'vc/shortcode-layouts/layouts.css' );

}
add_action( 'wp_enqueue_scripts', 'sigmacore_enqueue_shortcode_layouts_css' );

/**
 * Return a list of available layouts
 *
 * @param array $args - The layouts which you want to exclude - E.g. ['slider', 'grid']
 *
 * @since 1.0.0
 */
function sigmacore_get_available_layouts( $args = [] ){

  $all_layouts = [
    esc_html__( 'Slider', 'sigma-core' ) => 'slider',
    esc_html__( 'Grid', 'sigma-core' )   => 'grid',
    esc_html__( 'Isotope', 'sigma-core' )   => 'isotope',
  ];

  $layouts = array_diff( array_merge( array_values($all_layouts) ), $args );
  $all_layouts = [];

  foreach($layouts as $layout){
    $all_layouts[ucfirst($layout)] = $layout;
  }

  return $all_layouts;

}

/**
 * Add the layout options to the shortcode fields
 *
 * @param array $fields - The shorcode fields
 * @param array $args - The layouts which you want to include - E.g. ['slider', 'grid']
 * @param string $taxonomy - The taxonomy which will be added into the Isotope repeater
 * @since 1.0.0
 */
function sigmacore_get_layout_options( $fields = [], $args = [], $taxonomy = '' ){

  if(empty($fields)){
    return false;
  } else if(empty($args)){
    return $fields;
  }

  if( in_array( 'slider', $args ) ){
    foreach(sigmacore_get_slider_options() as $slider_option){
      $fields[] = $slider_option;
    }
  }
  if( in_array( 'isotope', $args ) && !empty($taxonomy) ){
    foreach(sigmacore_get_isotope_options($taxonomy) as $isotope_option){
      $fields[] = $isotope_option;
    }
  }
  if( in_array( 'grid', $args ) ){
    foreach(sigmacore_get_grid_options() as $grid_option){
      $fields[] = $grid_option;
    }
  }
  return $fields;

}

/**
 * Add the layout attributes to the shortcode atts
 *
 * @param array $default_atts - The shortcode attributes
 * @param array $args - The layouts which you want to include - E.g. ['slider', 'grid']
 * @since 1.0.0
 */
function sigmacore_get_layout_attributes( $default_atts = [], $args = [] ){

  if(empty($default_atts)){
    return false;
  }else if(empty($args)){
    return $default_atts;
  }

  if( in_array( 'slider', $args ) ){
    foreach(sigmacore_get_slider_attributes() as $key => $slider_attribute){
      $default_atts[$key] = $slider_attribute;
    }
  }
  if( in_array( 'isotope', $args ) ){
    foreach(sigmacore_get_isotope_attributes() as $key => $isotope_attribute){
      $default_atts[$key] = $isotope_attribute;
    }
  }
  if( in_array( 'grid', $args ) ){
    foreach(sigmacore_get_grid_attributes() as $key => $grid_attribute){
      $default_atts[$key] = $grid_attribute;
    }
  }
  return $default_atts;

}
