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

		<div class="sigma_product-thumb">

			<a href="<?php echo esc_url(get_the_permalink($id)) ?>">
				<?php echo $product->get_image($thumb_size) ?>
			</a>

		</div>

		<div class="sigma_product-body">

			<h5 class="sigma_product-title"> <a href="<?php echo esc_url(get_the_permalink($id)) ?>"> <?php echo esc_html($product->get_name()); ?> </a> </h5>

			<?php
			if($atts['show_excerpt'] == 'yes' && function_exists('gautama_custom_excerpt')){
				$excerpt_length = !empty($atts['excerpt_length']) ? $atts['excerpt_length'] : 10;
				?>
			<p><?php echo esc_html(gautama_custom_excerpt($excerpt_length, $product->get_short_description())) ?></p>
			<?php } ?>

      <a href="<?php echo get_the_permalink() ?>" class="sigma_product-link"><i class="fal fa-long-arrow-right"></i></a>

		</div>

	</div>

</div>
