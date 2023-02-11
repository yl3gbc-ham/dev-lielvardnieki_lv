<?php
/**
 * Blog shortcode gird layout file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) { // Or some other WordPress constant
	exit;
}
global $sigma_shortcodes;
$atts        = $sigma_shortcodes[ 'sigma_post_slider' ][ 'atts' ];

sigmacore_get_vc_shortcode_template( 'post-slider/style/' . $atts[ 'style' ] );

?>
