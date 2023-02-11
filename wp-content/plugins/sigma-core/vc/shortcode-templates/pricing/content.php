<?php
/**
 * Pricing shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_pricing' ][ 'atts' ];
sigmacore_get_vc_shortcode_template( 'pricing/styles/' . $atts[ 'style' ] );
