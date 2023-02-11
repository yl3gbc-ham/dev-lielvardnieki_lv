<?php
/**
 * Single product shortcode template file style 1.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes, $product;
$atts = $sigma_shortcodes[ 'sigma_single_product' ][ 'atts' ];
$the_query   = $sigma_shortcodes[ 'sigma_single_product' ][ 'the_query' ];
if(isset($atts['custom_image'])){
	$image_data = wp_get_attachment_image_src( $atts[ 'custom_image' ], 'full' );
  $image_url  = ( isset( $image_data[0] ) && $image_data[0] ) ? $image_data[0] : '';
}
if ( $the_query->have_posts() ) :
  while ( $the_query->have_posts() ) :
    $the_query->the_post();
		$product = wc_get_product(get_the_id());
		$id = $product->get_id();
?>
<div class="row">
	<?php if(!empty($image_url)) { ?>
	  <div class="col-lg-6">
	    <div class="image-wrapper">
	      <img src="<?php echo esc_url($image_url); ?>" class="w-100" alt="img">
	    </div>
	  </div>
	<?php } ?>
  <div class="col-lg-6">
    <div class="product-of-month">
			<?php if(has_post_thumbnail() && $atts['post_featured_image'] == 'true') { ?>
	      <div class="product-image">
	        <?php echo $product->get_image('medium') ?>
	      </div>
			<?php } ?>
      <div class="product-descr">
        <h5> <a href="<?php echo esc_url(get_the_permalink($id)) ?>"> <?php echo esc_html($product->get_name()); ?> </a> </h5>
				<?php
				if($atts['post_excerpt'] == 'true' && function_exists('gautama_custom_excerpt')){
					$excerpt_length = !empty($atts['post_excerpt_length']) ? $atts['post_excerpt_length'] : 10;
					?>
				<p><?php echo esc_html(gautama_custom_excerpt($excerpt_length, $product->get_short_description())) ?></p>
				<?php } ?>
        	<?php
					if($atts['post_price'] == 'true') {
						 woocommerce_template_loop_price();
					 } ?>
					 <?php
	 	      if($atts['show_cart_btn'] == 'yes'){
	 	        woocommerce_template_loop_add_to_cart();
	 	      }
	 	      ?>
      </div>
    </div>
  </div>
</div>
<?php 	endwhile;
  wp_reset_postdata();
endif;
