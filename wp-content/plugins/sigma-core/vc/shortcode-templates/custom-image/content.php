<?php
/**
 * Custom Image shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_custom_image' ][ 'atts' ];
sigmacore_get_vc_shortcode_template( 'custom-image/styles/' . $atts[ 'style' ] );
