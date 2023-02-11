<?php
/**
 * Progress bar shortcode template file.
 *
 * @package sigma Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $sigma_shortcodes;


$atts = $sigma_shortcodes[ 'sigma_progress_bar' ][ 'atts' ];
sigmacore_get_vc_shortcode_template( 'progress-bar/styles/' . $atts[ 'style' ] );
