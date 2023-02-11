<?php
/**
 * Counter shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_counter' ][ 'atts' ];
sigmacore_get_vc_shortcode_template( 'counter/styles/' . $atts[ 'style' ] );
