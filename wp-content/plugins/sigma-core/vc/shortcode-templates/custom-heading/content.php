<?php
/**
 * Custom heading shortcode template file.
 *
 * @package sigma Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $sigma_shortcodes;

$atts = $sigma_shortcodes[ 'sigma_custom_heading' ][ 'atts' ];
sigmacore_get_vc_shortcode_template( 'custom-heading/styles/' . $atts[ 'style' ] );