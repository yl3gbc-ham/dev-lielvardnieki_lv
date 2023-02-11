<?php
/**
 * Grid layout helper functions
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the column classes of grid layout.
 *
 * @param array $atts - The shortcode attributes
 *
 * @since 1.0.0
 */
function sigmacore_get_grid_layout_classes( $atts ){

  $post_grid_responsive_xl = ( $atts['post_grid_responsive_xl'] ) ? (int) $atts['post_grid_responsive_xl'] : 3;
  $post_grid_responsive_lg = ( $atts['post_grid_responsive_lg'] ) ? (int) $atts['post_grid_responsive_lg'] : 3;
  $post_grid_responsive_md = ( $atts['post_grid_responsive_md'] ) ? (int) $atts['post_grid_responsive_md'] : 2;
  $post_grid_responsive_sm = ( $atts['post_grid_responsive_sm'] ) ? (int) $atts['post_grid_responsive_sm'] : 2;

  $classes [] = 'col-xl-' . ( 12 / $post_grid_responsive_xl );
  $classes [] = 'col-lg-' . ( 12 / $post_grid_responsive_lg );
  $classes [] = 'col-md-' . ( 12 / $post_grid_responsive_md );
  $classes [] = 'col-sm-' . ( 12 / $post_grid_responsive_sm );
  return implode( ' ', array_filter( array_unique( $classes ) ) );

}

?>
