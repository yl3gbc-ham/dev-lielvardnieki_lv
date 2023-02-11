<?php
/**
 * Template part for header controls
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */

 $display_search = gautama_get_option('display-search-icon');
 $display_sidepanel = gautama_get_option('display-collapse-sidebar-icon') && is_active_sidebar('header-collapse-sidebar');
 $display_user = gautama_get_option('display-user-icon');
 $display_cart = gautama_get_option('display-cart');
 $header_style = gautama_get_option('header-layout', 'layout-1');
 $header_controls_style = gautama_get_option('header_controls_style', 'style-1');
?>

<?php if( $display_search || $display_user || $display_sidepanel || $display_cart ){ ?>
<div class="header-controls <?php echo esc_attr($header_controls_style) ?>">

  <?php if($display_user){ ?>
  <div class="user-control">
    <a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>" title="<?php echo esc_attr__('My Account', 'gautama') ?>">
      <i class="fal fa-user"></i>
    </a>
  </div>
  <?php } ?>

  <?php if( $display_search && $header_style != 'layout-5' && $header_style != 'layout-6' ){ ?>
  <div class="search-control">
    <a href="#" class="search-trigger">
      <i class="fal fa-search open-icon"></i>
    </a>
    <div class="search-form-wrap">
      <?php get_search_form(); ?>
    </div>
  </div>
  <?php } ?>

  <?php if( $display_cart && function_exists('wc_get_cart_url') ){ ?>
  <div class="sigma_header-cart sigma_cart-trigger">
    <a class="sigma_header-cart-inner" href="<?php echo esc_url(wc_get_cart_url()) ?>" title="<?php echo esc_attr__('Your Cart', 'gautama') ?>">
      <i class="fal fa-shopping-bag"></i>
      <div class="sigma_header-cart-content">
        <span class="sigma_header-cart-count">
          <?php echo WC()->cart->get_cart_contents_count(); ?>
        </span>
      </div>
    </a>
    <div class="widget_shopping_cart_content"></div>
  </div>
  <?php } ?>

  <?php if( $display_sidepanel && $header_style != 'layout-3' && $header_style != 'layout-6'  && $header_style != 'layout-7' ){ ?>
  <div class="panel-control">
    <div class="burger-icon aside-trigger">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <?php } ?>

</div>
<?php } ?>
