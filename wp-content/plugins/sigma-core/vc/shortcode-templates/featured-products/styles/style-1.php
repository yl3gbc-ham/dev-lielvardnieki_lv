<?php
/**
 * Featured Products shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_featured_products' ][ 'atts' ];
$product = wc_get_product($post->ID);
$id = $product->get_id();
?>
<div class="product-block">
  <?php if($atts['post_featured_image'] == 'yes'){ ?>
    <a href="<?php echo esc_url(get_the_permalink($id)) ?>" class="product-image">
    <?php echo $product->get_image('medium'); ?>
    </a>
  <?php } ?>
  <div class="product-descr">
    <h5 class="sigma_product-title"> <a href="<?php echo esc_url(get_the_permalink($id)) ?>"> <?php echo esc_html($product->get_name()); ?> </a> </h5>
    <?php if(function_exists('gautama_custom_excerpt')){ ?>
    <p><?php echo esc_html(gautama_custom_excerpt(15, $product->get_short_description())) ?></p>
    <?php } ?>
    <?php if($atts['post_price'] == 'yes') {
       woocommerce_template_loop_price();
    } ?>
  </div>
</div>
