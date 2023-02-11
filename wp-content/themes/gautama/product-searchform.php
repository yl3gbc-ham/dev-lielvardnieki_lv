<?php
/**
 * Template for displaying search form of products
 *
 * @package WooCommerce/Templates
 * @version 3.3.0
 */
?>

<form method="get" class="search-form woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
  <label>
    <input type="text" class="search-field" id="<?php echo esc_attr(uniqid( 'search-form-' )) ?>" placeholder="<?php echo esc_attr__('Search Products...', 'gautama') ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" required>
  </label>
  <button class="metro_btn-custom search-submit" type="submit"><i class="fas fa-search"></i></button>
</form>
