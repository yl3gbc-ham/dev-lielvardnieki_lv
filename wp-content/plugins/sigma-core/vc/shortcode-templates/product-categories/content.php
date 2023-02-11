<?php
/**
 * Product Categories shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_product_categories' ][ 'atts' ];
sigmacore_get_vc_shortcode_template( 'product-categories/styles/' . $atts[ 'style' ] );
