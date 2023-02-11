<?php
/**
 * Clients shortcode template file.
 *
 * @package sigma Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $sigma_shortcodes;

$atts = $sigma_shortcodes[ 'sigma_list' ][ 'atts' ];

sigmacore_get_vc_shortcode_template( 'list/styles/' . $atts[ 'style' ] );
?>
