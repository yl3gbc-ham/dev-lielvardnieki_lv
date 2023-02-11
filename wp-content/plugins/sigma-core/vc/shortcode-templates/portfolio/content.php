<?php
/**
 * Team shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_portfolio' ][ 'atts' ];
sigmacore_get_vc_shortcode_template( 'portfolio/layouts/' . $atts[ 'layout' ] );
	
