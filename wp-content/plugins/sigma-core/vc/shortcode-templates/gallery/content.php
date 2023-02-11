<?php
/**
 * gallery shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_gallery' ][ 'atts' ];
?>
<div class="gallery-loop">
<?php
sigmacore_get_vc_shortcode_template( 'gallery/styles/' . $atts[ 'style' ] );
?>
</div>
