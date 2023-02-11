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
if($atts['small_image']) {
$custom_small_img = wp_get_attachment_image_src( $atts[ 'small_image' ], 'full' );
$custom_small_img_url  = ( isset( $custom_small_img[0] ) && $custom_small_img[0] ) ? $custom_small_img[0] : '';
}
if(!empty($custom_large_img_url) || !empty($custom_small_img_url)) {
?>
<div class="image-wrapper">
	<?php if(!empty($custom_large_img_url)) { ?>
	  <img src="<?php echo esc_url($custom_large_img_url); ?>" alt="img">
	<?php } if(!empty($custom_small_img_url)) { ?>
	  <img src="<?php echo esc_url($custom_small_img_url); ?>" class="image-1" alt="img">
	<?php } ?>
</div>
<?php }
