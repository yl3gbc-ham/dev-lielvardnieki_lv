<?php
/**
 * Ministries shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_ministries' ][ 'atts' ];
 ?>
<div class="latest-ministries">
	<?php sigmacore_get_vc_shortcode_template( 'ministries/layouts/' . $atts[ 'layout' ] );
 ?>
</div>
