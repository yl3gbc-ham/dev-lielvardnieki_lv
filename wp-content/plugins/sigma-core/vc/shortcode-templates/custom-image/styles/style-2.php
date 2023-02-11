<?php
/**
 * Custom Image shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_custom_image' ][ 'atts' ];
if($atts['large_image']) {
$custom_large_img = wp_get_attachment_image_src( $atts[ 'large_image' ], 'full' );
$custom_large_img_url  = ( isset( $custom_large_img[0] ) && $custom_large_img[0] ) ? $custom_large_img[0] : '';
}
?>
<div class="image-wrapper">
	<?php if(!empty($custom_large_img_url)) { ?>
	  <img src="<?php echo esc_url($custom_large_img_url); ?>" alt="img">
	<?php } if(!empty($atts['custom_text'])) { ?>
	   <span><?php echo html_entity_decode(vc_value_from_safe($atts['custom_text'], true)); ?></span>
	<?php } ?>
</div>
