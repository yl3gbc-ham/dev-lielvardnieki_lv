<?php
/**
 * Single Team shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_single_team' ][ 'atts' ];
$the_query   = $sigma_shortcodes[ 'sigma_single_team' ][ 'the_query' ];
while ( $the_query->have_posts() ) {
	$the_query->the_post();
sigmacore_get_vc_shortcode_template( 'single-team/styles/' . $atts[ 'style' ] );
}
/* Restore original Post Data */
wp_reset_postdata();
