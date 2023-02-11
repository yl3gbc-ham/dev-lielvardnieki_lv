<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

if( !gautama_is_woo_active() ){
  return;
}

//======= Actions & Filters =========//
add_filter( 'woocommerce_add_to_cart_fragments', 'gautama_refresh_cart_fragment' );

// Change Filter
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 5 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

add_action( 'woocommerce_before_shop_loop', 'gautama_shop_controls_start', 15 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_before_shop_loop', 'gautama_shop_controls_end', 40 );

// Remove breadcrumbs
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

// Change thumbnail
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title', 'gautama_product_thumbnail_start', 10);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 15);
add_action('woocommerce_before_shop_loop_item_title', 'gautama_product_thumbnail', 20);
add_action('woocommerce_before_shop_loop_item_title', 'gautama_product_thumbnail_end', 30);

// Change Title
add_action( 'woocommerce_before_shop_loop_item_title', 'gautama_product_content_wrapper_start', 30 );
add_action( 'woocommerce_after_shop_loop_item_title', 'gautama_product_content_wrapper_end', 35 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'gautama_product_countdown', 5 );
add_action( 'woocommerce_shop_loop_item_title', 'gautama_product_title', 10 );

// Product Excerpt
add_action('woocommerce_after_shop_loop_item_title', 'gautama_product_excerpt', 25);

// Remove link tags
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

// Change Price,  Rating and Sale flash
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_rating', 25);

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);

add_action('woocommerce_after_shop_loop_item_title', 'gautama_product_meta_wrapper_start', 5);
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
add_action('woocommerce_after_shop_loop_item_title', 'gautama_product_meta_wrapper_end', 20);

add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 30 );

// Remove the default add to cart button
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// Badges
add_action( 'woocommerce_before_shop_loop_item_title', 'gautama_product_badges', 5 );
add_filter( 'woocommerce_sale_flash', 'gautama_get_sale_flash_discount', 90, 3 );

// Product Single
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

add_action('woocommerce_single_product_summary', 'gautama_product_countdown', 20);

add_action('woocommerce_before_lost_password_form', 'gautama_before_lost_password_form', 10);
add_action( 'wp_enqueue_scripts', 'gautama_woocommerce_scripts' );
add_action( 'woocommerce_checkout_before_order_review_heading', 'gautama_checkout_order_review_start', 10 );
add_action( 'woocommerce_checkout_after_order_review', 'gautama_checkout_order_review_end', 10 );
add_action('woocommerce_product_meta_end',  'gautama_single_product_custom_share_wrapper_start', 10);
add_action('woocommerce_product_meta_end',  'gautama_single_product_custom_share_wrapper_end', 20);

/**
 * Open tag for WooCommerce checkout order review.
 *
 * @since 1.0.0
 */
function gautama_checkout_order_review_start(){
  echo '<div class="order_review">';
}

/**
 * Close tag for WooCommerce checkout order review.
 *
 * @since 1.0.0
 */
function gautama_checkout_order_review_end(){
  echo '</div>';
}

/**
 * Adds woocommerce options to redux sections.
 *
 * @since 1.0.0
 */
function gautama_woocommerce_redux_options( $options_files ) {

  $options_files[] = get_template_directory() . '/inc/redux-options/options/woocommerce-settings.php';
  $options_files[] = get_template_directory() . '/inc/redux-options/options/product-settings.php';
  $options_files[] = get_template_directory() . '/inc/redux-options/options/product-details-settings.php';
  $options_files[] = get_template_directory() . '/inc/redux-options/options/my-account-settings.php';

  return $options_files;
}
add_filter( 'gautama_redux_option_files', 'gautama_woocommerce_redux_options', 10, 1 );

/**
 * Enqueue woocommerce scripts and styles.
 *
 * @since 1.0.0
 */
function gautama_woocommerce_scripts() {

  wp_enqueue_style( 'gautama-woocommerce', get_template_directory_uri() . '/assets/css/theme-woocommerce.css', array(), '1.0.0' );
  wp_enqueue_script( 'gautama-woocommerce', get_template_directory_uri() . '/assets/js/theme-woocommerce.js', array( 'jquery' ), '1.0.0', true );

}

/**
 * Add the widget areas for woocommerce
 *
 * @since 1.0.0
 */
if(!function_exists('gautama_woo_widgets_init')){
  function gautama_woo_widgets_init() {
    register_sidebar( array(
  		'name'          => esc_html__( 'Shop Sidebar', 'gautama' ),
  		'id'            => 'shop',
  		'description'   => esc_html__( 'Add widgets here to appear in your Shop.', 'gautama' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
  	) );
    register_sidebar( array(
  		'name'          => esc_html__( 'Product Details Sidebar', 'gautama' ),
  		'id'            => 'product',
  		'description'   => esc_html__( 'Add widgets here to appear in your product details page.', 'gautama' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
  	) );
  }
  add_action( 'widgets_init', 'gautama_woo_widgets_init' );
}

/**
 * Add necessary classes to the product loop.
 *
 * @since 1.0.0
 */
function gautama_product_classes( $classes, $product ){

	$classes[] = 'sigma_product';
  $classes[] = is_woocommerce() || is_singular('product') || is_cart() || is_checkout() ? gautama_get_option('product_style') : '';

	return $classes;
}
add_filter( 'woocommerce_post_class', 'gautama_product_classes', 10, 2 );

/**
 * Adjust the returned sidebar value when in the shop page and product details page.
 *
 * @since 1.0.0
 */
function gautama_shop_sidebar( $current_sidebar ){

  if( is_shop() || is_product_category() || is_product_tag() ){
    $current_sidebar = 'shop';
  }elseif( is_singular( 'product' ) ){
    $current_sidebar = 'product';
  }

  return $current_sidebar;

}
add_filter( 'gautama/sidebar/current_sidebar', 'gautama_shop_sidebar' );

/**
 * Adjust lost password form title
 *
 * @since 1.0.0
 */
function gautama_before_lost_password_form(){
  echo '<h4>'.esc_html__("Lost password", 'gautama').'</h4>';
}

/**
 * Change the main wrapper of the product pages.
 *
 * @since 1.0.0
 */
function woocommerce_output_content_wrapper(){
	echo '<main id="main" class="site-main">';
}

/**
 * Change the main wrapper of the product pages.
 *
 * @since 1.0.0
 */
function woocommerce_output_content_wrapper_end(){
	echo '</main>';
}

/**
 * Opening tags for shop filter.
 *
 * @since 1.0.0
 */
function gautama_shop_controls_start(){
  echo '<div class="sigma_shop-global">';
}

/**
 * Closing tags for shop filter.
 *
 * @since 1.0.0
 */
function gautama_shop_controls_end(){
  echo '</div>';
}

/**
 * Openning tag for the product thumbnail.
 *
 * @since 1.0.0
 */
function gautama_product_thumbnail_start(){
  echo '<div class="sigma_product-thumb">';

  echo '<div class="sigma_product-controls">';
    do_action('gautama/product/controls');
  echo '</div>';
}

/**
 * Closing tag for the product thumbnail.
 *
 * @since 1.0.0
 */
function gautama_product_thumbnail_end(){
  echo '</div>';
}

/**
 * Product thumbnail.
 *
 * @since 1.0.0
 */
function gautama_product_thumbnail(){

  global $product;
  $id = $product->get_id();
  if(has_post_thumbnail($id)){
    echo '<a href="'.esc_url(get_the_permalink($id)).'">'.get_the_post_thumbnail($id, gautama_get_thumb_size('gautama-product')).'</a>';
  }

}

/**
 * Openning tag for the product content.
 *
 * @since 1.0.0
 */
function gautama_product_content_wrapper_start(){
  echo '<div class="sigma_product-body">';
}

/**
 * Closing tag for the product content.
 *
 * @since 1.0.0
 */
function gautama_product_content_wrapper_end(){
  echo '</div>';
}

/**
 * Openning tag for the product content.
 *
 * @since 1.0.0
 */
function gautama_product_meta_wrapper_start(){
  echo '<div class="sigma_product-body-meta">';
}

/**
 * Closing tag for the product content.
 *
 * @since 1.0.0
 */
function gautama_product_meta_wrapper_end(){
  echo '</div>';
}

/**
 * Product Title.
 *
 * @since 1.0.0
 */
function gautama_product_title(){
  global $product;
  $id = $product->get_id();

  echo '<h5 class="sigma_product-title"> <a href="'.esc_url(get_the_permalink($id)).'">'.get_the_title($id).'</a> </h5>';
}

/**
 * Product Countdown.
 *
 * @since 1.0.0
 */
function gautama_product_countdown(){

  global $product;

  $sale_from = $product->get_date_on_sale_from();
  $sale_to = $product->get_date_on_sale_to();
  $is_on_sale = $product->is_on_sale();

  $show_countdown = is_product() ? gautama_get_option('product_single_show_countdown') : gautama_get_option('product_show_countdown');

  if($sale_from && $sale_to && $is_on_sale && $show_countdown){
    $sale_to = new DateTime($sale_to);
    echo '<div class="sigma_countdown-timer" data-countdown="'.esc_js($sale_to->format('Y-m-d')).'"></div>';
  }

}

/**
 * Add short excerpt after price.
 *
 * @since 1.0.0
 */
function gautama_product_excerpt(){
  global $product;

  if(gautama_get_option('product_show_excerpt')){
    $excerpt_length = gautama_get_option('product_excerpt_length', 10);
    echo '<p>'.esc_html(gautama_custom_excerpt($excerpt_length)).'</p>';
  }

}

/**
 * Return the stock status of a product.
 *
 * @since 1.0.0
 */
function gautama_product_stock_status() {
  global $product;
  ?>
  <div class="sigma_product-stock-status">
    <span><?php echo esc_html__('Availability: ', 'gautama') ?></span>
    <div class="<?php echo esc_attr($product->get_stock_status()) ?>">
      <?php echo esc_html($product->is_in_stock()) ? esc_html__( ' In stock', 'gautama' ) : esc_html__( 'Out of stock', 'gautama' ); ?>
    </div>
  </div>
  <?php
}

/**
 * Add Custom badges to the detail product and archive.
 *
 * @since 1.0.0
 */
function gautama_product_badges(){
  global $product;

  $featured = '';
  if($product->is_featured()){
    $featured = 1;
  }

  $sold_out = '';
  if ( !$product->is_in_stock() ) {
    $sold_out = 1;
  }
  ?>

  <?php if(!empty($sold_out)){ ?>
  <div class="sigma_product-badge sigma_badge-soldout"><?php echo esc_html__('Sold', 'gautama'); ?> </div>
  <?php } ?>
  <?php if(!empty($featured)){ ?>
  <div class="sigma_product-badge featured"><?php esc_html_e('Featured', 'gautama'); ?></div>
<?php } ?>

  <?php

}

/**
 * Display the discounted amount in %.
 *
 * @since 1.0.0
 *
 * @return string
 */
function gautama_get_sale_flash_discount( $text, $post, $product ){

  $discount = 0;
  if ( $product->is_on_sale() ) {
    if ( $product->get_type() == 'variable' ) {
      $available_variations = $product->get_available_variations();
      for ( $i = 0; $i < count( $available_variations ); ++$i ) {
        $variation_id = $available_variations[$i]['variation_id'];
        $variable_product1 = new WC_Product_Variation( $variation_id );
        $regular_price = $variable_product1->get_regular_price();
        if ( $regular_price > 0 ) {
          $sales_price = $variable_product1->get_sale_price();
          if($sales_price){
            $percentage = round( ( ( ( $regular_price - $sales_price ) / $regular_price ) * 100 ), 1 );
          }
          if ( !empty($percentage) && $percentage > $discount ) {
            $discount = $percentage;
          }
        }
      }
    }
    elseif ( $product->get_type() == 'simple' ) {
      $discount = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
    }
    if ( $discount ) {
      $discount = "{$discount}%";
    }
    else {
      $discount = '';
    }
    $text =  sprintf( esc_html__( '%s Off', 'gautama' ), $discount );
  }

  if(!empty($discount)){
    return '<div class="sigma_product-badge sigma_badge-sale">' . esc_html($text) . '</div>';
  }

}

/**
 * Retruns a list of all product categories.
 *
 * @since 1.0.0
 */
if(!function_exists('gautama_get_product_categories')){
  function gautama_get_product_categories(){

    $args = array(
      'taxonomy' => 'product_cat',
      'hide_empty' => false,
    );

    $terms = '';
    $terms_list = get_terms($args);

    if($terms_list){
      foreach($terms_list as $term){

        $term_link = get_term_link( $term, 'product_cat' );

        $terms .= '<a href="'.esc_url($term_link).'">'.esc_html($term->name).'</a>';
      }
    }

    return $terms;
  }
}

/* Single product style */
function gautama_product_details_style() {
    $product_detail_style = (gautama_get_option('product_details_style')) ? gautama_get_option('product_details_style') : 'style-1';

    if($product_detail_style == 'style-2' || $product_detail_style == 'style-3') {
      add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 20);
      add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 25);
      add_action('woocommerce_single_product_summary', 'gautama_product_stock_status', 30);
      add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 35);
      add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 36);
    } else{
      add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 20);
      add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 25);
      add_action('woocommerce_single_product_summary', 'gautama_product_stock_status', 30);
      add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 35);
      add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 36);
    }
}
add_action('init', 'gautama_product_details_style');

/**
 * Open Tag Poduct single custom share
 */
 function gautama_single_product_custom_share_wrapper_start() {
   echo '<div class="product-share-wrapper">';
   if(gautama_get_option('display_product_share') == true && function_exists('sigmacore_posts_share') ) {
   echo '<div class="product_details_meta">';
      echo '<div class="product_share_meta">';
     sigmacore_posts_share();
     echo '</div>';
     echo '<div class="product_meta_controls">';
     do_action('gautama/product_single/controls');
     echo '</div>';
   echo '</div>';
  }
 }
 /**
  * Closing tag for product single custom share
  */
  function gautama_single_product_custom_share_wrapper_end() {
    if(!empty(gautama_get_option('payment_method_title')) && !empty(gautama_get_option('payment_method_img')) ) {
      $custom_img_url = gautama_get_option('payment_method_img')['url'];
      ?>
      <div class="custom-payment-method">
          <h5><?php echo esc_html(gautama_get_option('payment_method_title')); ?></h5>
          <img src="<?php echo esc_url($custom_img_url); ?>"/>
      </div>
      <?php
    }
    echo '</div>';
  }

/**
 * Refresh cart contents / total fragment using Ajax
 *
 * @since 1.0.0
 */
if(!function_exists('gautama_refresh_cart_fragment')){
  function gautama_refresh_cart_fragment( $fragments ) {
  	global $woocommerce;

  	ob_start();

  	?>

    <a class="sigma_header-cart-inner" href="<?php echo esc_url(wc_get_cart_url()) ?>" title="<?php echo esc_attr__('Your Cart', 'gautama') ?>">
      <i class="fal fa-shopping-bag"></i>
      <div class="sigma_header-cart-content">
        <span class="sigma_header-cart-count">
          <?php echo WC()->cart->get_cart_contents_count(); ?>
        </span>
      </div>
    </a>

  	<?php
  	$fragments['a.sigma_header-cart-inner'] = ob_get_clean();
  	return $fragments;
  }
}

/**
 * Change number of upsells output
 *
 * @since 1.0.0
 */
add_filter( 'woocommerce_upsell_display_args', 'gautama_change_upsells_count', 20 );
function gautama_change_upsells_count( $args ) {

 $args['posts_per_page'] = 3;
 $args['columns'] = 3; //change number of upsells here
 return $args;
}

/**
 * Change number of cross sells output
 *
 * @since 1.0.0
 */
add_filter( 'woocommerce_cross_sells_columns', 'gautama_change_crosssells_count' );
function gautama_change_crosssells_count( $columns ) {
  return 3;
}

// Functions responsible for YITH Quickview
require get_template_directory(). '/inc/yith/functions-yith-quickview.php';

// Functions responsible for YITH Wishlist
require get_template_directory(). '/inc/yith/functions-yith-wishlist.php';

// Functions responsible for YITH Compare
require get_template_directory(). '/inc/yith/functions-yith-compare.php';

?>
