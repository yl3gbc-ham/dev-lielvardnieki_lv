<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

if( !gautama_is_yith_woocompare_active() ){
  return;
}

global $yith_woocompare;

// Remove YITH WooCompare default buttons.
if ( get_option( 'yith_woocompare_compare_button_in_product_page', 'yes' ) == 'yes' ){
  remove_action('woocommerce_single_product_summary', array($yith_woocompare->obj, 'add_compare_link'), 35);
}
if ( get_option( 'yith_woocompare_compare_button_in_products_list', 'no' ) == 'yes' ){
  remove_action('woocommerce_after_shop_loop_item', array($yith_woocompare->obj, 'add_compare_link'), 20);
}

// Add compare to product details
if ( get_option( 'yith_woocompare_compare_button_in_product_page', 'yes' ) == 'yes' ){
  add_action('gautama/product_single/controls', array($yith_woocompare->obj, 'add_compare_link'), 30);
}
// Add compare to product catalog
if ( get_option( 'yith_woocompare_compare_button_in_products_list', 'no' ) == 'yes' ){
  add_action('gautama/product/controls', array($yith_woocompare->obj, 'add_compare_link'), 30);
}
