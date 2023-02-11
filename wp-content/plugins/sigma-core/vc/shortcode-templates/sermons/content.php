<?php
/**
 * Sermons shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_sermons' ][ 'atts' ];
 ?>
<div class="latest-sermons">
	<?php sigmacore_get_vc_shortcode_template( 'sermons/layouts/' . $atts[ 'layout' ] );
 ?>
</div>
