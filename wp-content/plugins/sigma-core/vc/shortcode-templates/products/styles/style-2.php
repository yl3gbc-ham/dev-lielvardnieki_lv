<?php

/**
 * Products shortcode style 1 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $sigma_shortcodes;

$atts = $sigma_shortcodes[ 'sigma_products' ][ 'atts' ];

$product = wc_get_product($post->ID);
$id = $product->get_id();

$thumb_size = function_exists('gautama_get_thumb_size') ? gautama_get_thumb_size('gautama-product') : 'gautama-product';

?>

<div <?php wc_product_class( $atts['style'] .' sigma_product ', $product ); ?>>

	<div class="sigma_product-inner">

		<?php
		if( function_exists('gautama_product_badges') && $atts['show_featured_badge'] == 'yes' ){
			gautama_product_badges();
		}
		if($atts['show_sale_discount'] == 'yes'){
			woocommerce_show_product_loop_sale_flash();
		}
		?>

		<div class="sigma_product-thumb">

			<a href="<?php echo esc_url(get_the_permalink($id)) ?>">
				<?php echo $product->get_image($thumb_size) ?>
			</a>

      <?php
			if($atts['show_rating'] == 'yes'){
				woocommerce_template_loop_rating();
			}

      echo '<div class="sigma_product-controls">';
        do_action('gautama/product/controls');
      echo '</div>';

			?>

		</div>

		<div class="sigma_product-body">

			<h5 class="sigma_product-title"> <a href="<?php echo esc_url(get_the_permalink($id)) ?>"> <?php echo esc_html($product->get_name()); ?> </a> </h5>

			<?php if($atts['show_price'] == 'yes'){ ?>
				<div class="sigma_product-body-meta">
				<?php woocommerce_template_loop_price(); ?>
				</div>
			<?php } ?>

			<?php
			if($atts['show_excerpt'] == 'yes' && function_exists('gautama_custom_excerpt')){
				$excerpt_length = !empty($atts['excerpt_length']) ? $atts['excerpt_length'] : 10;
				?>
			<p><?php echo esc_html(gautama_custom_excerpt($excerpt_length, $product->get_short_description())) ?></p>
			<?php } ?>

		</div>

	</div>

</div>
