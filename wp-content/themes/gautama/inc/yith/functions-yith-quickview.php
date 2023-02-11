<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

if( !gautama_is_yith_wcqv_active() ){
  return;
}

// Remove default Yith Quickview buttons
remove_action( 'woocommerce_after_shop_loop_item', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
remove_action( 'yith_wcwl_table_after_product_name', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );

add_action('gautama/product/controls', 'gautama_yith_quickview_print', 10);

remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_price', 15 );
remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_add_to_cart', 25 );
remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_meta', 30 );

add_action('yith_wcqv_product_summary', 'woocommerce_template_single_title', 15);
add_action('yith_wcqv_product_summary', 'woocommerce_template_single_rating', 20);
add_action('yith_wcqv_product_summary', 'woocommerce_template_single_excerpt', 25);
add_action('yith_wcqv_product_summary', 'gautama_product_stock_status', 30);
add_action('yith_wcqv_product_summary', 'woocommerce_template_single_price', 35);
add_action('yith_wcqv_product_summary', 'woocommerce_template_single_add_to_cart', 40);
add_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_meta', 45 );


// Image.
remove_action( 'yith_wcqv_product_image', 'woocommerce_show_product_sale_flash', 10 );

/**
 * YITH quick view link
 *
 * @since 1.0.0
 */
function gautama_get_yith_quickview_link(){

  global $product;

  $button = '<a href="#" title="'.esc_attr__('Quick View', 'gautama').'" class="yith-wcqv-button" data-product_id="' . esc_attr( $product->get_id() ) . '"><i class="fal fa-eye"></i> </a>';
  $button = apply_filters( 'yith_add_quick_view_button_html', $button, '', $product );

  return $button;
}

/**
* Print the Quickview button
 *
 * @since 1.0.0
 */
function gautama_yith_quickview_print(){

  $show_wcqv_in_loop = get_option('yith-wcqv-enable');
  echo (!empty($show_wcqv_in_loop) && $show_wcqv_in_loop == 'yes' && gautama_is_yith_wcqv_active() ) ? gautama_get_yith_quickview_link() : '';

}
