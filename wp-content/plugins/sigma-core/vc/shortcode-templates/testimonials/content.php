<?php
/**
 * Testmonial shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_testimonials' ][ 'atts' ];
sigmacore_get_vc_shortcode_template( 'testimonials/layouts/' . $atts[ 'layout' ] );
