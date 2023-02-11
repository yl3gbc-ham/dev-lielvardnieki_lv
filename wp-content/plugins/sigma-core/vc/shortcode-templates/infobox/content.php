<?php
/**
 * Info box shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_infobox' ][ 'atts' ];
sigmacore_get_vc_shortcode_template( 'infobox/styles/' . $atts[ 'style' ] );
