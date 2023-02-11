<?php
/**
 * video shortcode style 2 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_video' ][ 'atts' ];
$video_link = isset( $atts['video_link'] ) ? vc_build_link( $atts['video_link'] ) : '';
?>

<div class="video-wrap">
  <?php if(!empty($video_link['url'])) { ?>
    <a href="<?php echo $video_link['url']; ?>" class="popup-video <?php echo esc_attr($atts['icon_as']); ?>">
      <?php
      if ( $atts[ 'icon_as' ] === 'image' ) {
        if ( $atts[ 'icon_image' ] ) {
          $image_data = wp_get_attachment_image_src( $atts[ 'icon_image' ], 'thumbnail' );
          $image_url  = ( isset( $image_data[0] ) && $image_data[0] ) ? $image_data[0] : '';
          if ( $image_url ) {
            ?>
            <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php esc_attr_e( 'Icon', 'sigma-core' ) ?>">
            <?php
          }
        }
      } else {
      if ( $atts[ 'icon_type' ] ) {
        $icon_type = 'icon_' . $atts[ 'icon_type' ];
        vc_icon_element_fonts_enqueue( $atts[ 'icon_type' ] );
        if ( isset( $atts[ $icon_type ] ) && $atts[ $icon_type ] ) {
        ?>
          <i class="<?php echo esc_attr( $atts[ $icon_type ] ); ?>"></i>
        <?php }
          }
        }
      ?>
    </a>
  <?php } ?>
</div>
