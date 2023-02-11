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

$atts = $sigma_shortcodes[ 'sigma_team' ][ 'atts' ];
sigmacore_get_vc_shortcode_template( 'team/layouts/' . $atts[ 'layout' ] );
	