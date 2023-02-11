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
  <?php } ?>
  <div class="icon-blocks">
    <?php
    if ( $atts[ 'add_icon' ] ) {
      if ( $atts[ 'icon_type' ] ) {
        $icon_type = 'icon_' . $atts[ 'icon_type' ];
        vc_icon_element_fonts_enqueue( $atts[ 'icon_type' ] );
        if ( isset( $atts[ $icon_type ] ) && $atts[ $icon_type ] ) {
          ?>
          <div class="sigma-list-icon"><i class="<?php echo esc_attr( $atts[ $icon_type ] ); ?>"></i></div>
          <?php
        }
      }
    }
    ?>
      <?php if(isset($atts['custom_title']) && !empty($atts['custom_title'])) {?>
        <span><?php echo html_entity_decode(vc_value_from_safe($atts['custom_title'], true)); ?></span>
      <?php } ?>
  </div>
</div>
