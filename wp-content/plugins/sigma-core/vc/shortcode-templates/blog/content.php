<?php
/**
 * Blog shortcode template file.
 *
 * @package sigma Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $sigma_shortcodes;

$atts = $sigma_shortcodes[ 'sigma_blog' ][ 'atts' ]; ?>
<div class="latest-news">
	<?php sigmacore_get_vc_shortcode_template( 'blog/layouts/' . $atts[ 'layout' ] ); ?>
</div>
