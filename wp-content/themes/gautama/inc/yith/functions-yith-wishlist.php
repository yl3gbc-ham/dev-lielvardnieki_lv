<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

if( !gautama_is_yith_wcwl_active() ){
  return;
}

add_action('gautama/product/controls', 'gautama_yith_wishlist_print', 20);
add_action('gautama/product_single/controls', 'gautama_yith_wishlist_print', 20);
add_filter( 'yith_wcwl_loop_positions', 'gautama_force_wishlist_position', 10, 1 );
add_filter( 'yith_wcwl_positions', 'gautama_force_wishlist_position', 10, 1 );

/**
 * Force a single position for the wishlist.
 *
 * See: yith-woocommerce-wishlist/includes/class.yith-wcwl-frontend.php
 *
 * @since 1.0.0
 */
function gautama_force_wishlist_position( $values ) {
  $values = null;
  return $values;
}

/**
 * Return the currently selected wishlist page.
 *
 * @since 1.0.0
 */
function gautama_get_yith_wishlist_page_url(){
  $wishlist_page = get_option('yith_wcwl_wishlist_page_id');
  return !empty($wishlist_page) ? get_the_permalink($wishlist_page) : '#';
}

/**
 * YITH wish list link
 *
 * @since 1.0.0
 */
function gautama_get_yith_wishlist_link(){

  global $product;
  return do_shortcode( '[yith_wcwl_add_to_wishlist product_id='.$product->get_id().']' );
}

/**
 * Print the Wishlist button
 *
 * @since 1.0.0
 */
function gautama_yith_wishlist_print(){

  $wcwl_active = gautama_is_yith_wcwl_active();
  $show_wcwl_in_loop = get_option('yith_wcwl_show_on_loop');
  echo (!empty($show_wcwl_in_loop) && $show_wcwl_in_loop == 'yes' && $wcwl_active ) ? gautama_get_yith_wishlist_link() : '';

}
