<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) :

	$has_slider = count($related_products) > 3;
	$slider_class = $has_slider ? 'sigma_related-posts-slider' : 'products columns-3';
	?>

	<section class="related sigma_related-posts">

		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', esc_html__( 'Related products', 'gautama' ) );

		if ( $heading ) :
			?>
			<div class="section-title text-center">
	      <span class="title-tag"><?php echo esc_html__('Shop', 'gautama') ?></span>
	      <h2><?php echo esc_html( $heading ); ?></h2>
	    </div>
		<?php endif; ?>

			<div class="<?php echo esc_attr($slider_class) ?>">
        <?php foreach ( $related_products as $related_product ) : ?>

					<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

					wc_get_template_part( 'content', 'product' );
					?>

  			<?php endforeach; ?>
      </div>


	</section>
	<?php
endif;

wp_reset_postdata();
