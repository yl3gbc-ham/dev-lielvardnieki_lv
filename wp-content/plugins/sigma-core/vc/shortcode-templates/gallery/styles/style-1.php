<?php
/**
 * gallery shortcode styel 1 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_gallery' ][ 'atts' ];
$gallery_images = explode( ',', $atts['gallery_images'] );

foreach( $gallery_images as $gallery_image ){
  $images = wp_get_attachment_image_src( $gallery_image, 'full' );
             ?>
            <div class="single-gallery-image">
                <a href="<?php echo $images[0] ?>" class="popup-image">
                    <img src="<?php echo $images[0] ?>" alt="Images">
                </a>
            </div>
<?php }
