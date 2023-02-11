<?php
/**
 * video shortcode style 1 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_video' ][ 'atts' ];
$video_link = isset( $atts['video_link'] ) ? vc_build_link( $atts['video_link'] ) : '';
$image_data = wp_get_attachment_image_src( $atts[ 'video_image' ], 'full' );
$image_url  = ( isset( $image_data[0] ) && $image_data[0] ) ? $image_data[0] : '';
?>
<div class="video-wrap" style="background-image: url(<?php echo esc_url( $image_url ); ?>);">
  <?php if(!empty($video_link['url'])) { ?>
    <a href="<?php echo $video_link['url']; ?>" class="popup-video">
      <?php if ( $atts[ 'icon_type' ] ) {
        $icon_type = 'icon_' . $atts[ 'icon_type' ];
        vc_icon_element_fonts_enqueue( $atts[ 'icon_type' ] );
        if ( isset( $atts[ $icon_type ] ) && $atts[ $icon_type ] ) {
        ?>
          <i class="<?php echo esc_attr( $atts[ $icon_type ] ); ?>"></i>
        <?php }
        } ?>
    </a>
  <?php } ?>
</div>
