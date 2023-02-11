<?php
/**
 * Single product shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_single_product' ][ 'atts' ];
sigmacore_get_vc_shortcode_template( 'single-product/styles/' . $atts[ 'single-style' ] );
