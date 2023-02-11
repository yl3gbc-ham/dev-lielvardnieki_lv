<?php
/**
 * File responsible for post views functionality
 *
 * @package Sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns the views of the current post.
 *
 * @since 1.0.0
 */
function sigmacore_get_post_view(){
  $count = get_post_meta(get_the_ID(), 'post_views_count', true);
  return $count . esc_html__(' Views', 'sigma-core');
}

/**
 * Updates the post views of the current post.
 *
 * @since 1.0.0
 */
function sigmacore_set_post_view(){
  $key = 'post_views_count';
  $post_id = get_the_ID();
  $count = (int)get_post_meta($post_id, $key, true);
  $count++;
  update_post_meta($post_id, $key, $count);
}

/**
 * Sets the views column in post backend table
 *
 * @since 1.0.0
 */
function sigmacore_posts_column_views($columns){
	$columns['post_views'] = esc_html__('Views', 'sigma-core');
	return $columns;
}

/**
 * Prints the value of views in the view column in post backend table.
 *
 * @since 1.0.0
 */
function sigmacore_posts_custom_column_views($column){
  if ($column === 'post_views') {
    echo sigmacore_get_post_view();
  }
}
add_filter('manage_posts_columns', 'sigmacore_posts_column_views');
add_action('manage_posts_custom_column', 'sigmacore_posts_custom_column_views');
