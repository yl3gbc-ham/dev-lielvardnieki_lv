<?php
/**
 * Event shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_event' ][ 'atts' ];
 ?>
<div class="latest-event">
	<?php sigmacore_get_vc_shortcode_template( 'event/layouts/' . $atts[ 'layout' ] );
 ?>
</div>
