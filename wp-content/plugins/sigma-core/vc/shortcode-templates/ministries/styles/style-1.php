<?php
/**
 * Ministries shortcode style 1 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_ministries' ][ 'atts' ];
$thumb_size = function_exists('gautama_get_thumb_size') ? gautama_get_thumb_size('gautama-blog') : 'full';
$ministries_details = get_post_meta( $post->ID, 'sigma_ministries_details', true );
$sigma_ministries_icon = isset( $ministries_details['sigma_ministries_socials_icon'] ) ? $ministries_details['sigma_ministries_socials_icon'] : '';
$wrapp_icon_class = isset( $ministries_details['sigma_ministries_socials_icon'] ) ? 'minsitries-icon' : '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-ministries sigma-ministries-style-1 sigma-ministries-wrapper'); ?>>
  <div class="sigma_ministries style-1 <?php echo esc_attr($wrapp_icon_class); ?>">
      <?php if(has_post_thumbnail() && $atts['show_image'] == 'yes'){
        the_post_thumbnail( $thumb_size );
      }
      ?>
      <?php if(isset($sigma_ministries_icon) && !empty($sigma_ministries_icon) && $atts['show_icon'] == 'yes') { ?>
      <div class="sigma_ministries-thumb">
        <i class="<?php echo esc_attr($sigma_ministries_icon); ?>"></i>
      </div>
      <?php } ?>
    <div class="sigma_ministries-body">
      <h5><?php the_title(); ?></h5>
      <?php
      if(function_exists('gautama_custom_excerpt') && $atts['post_excerpt'] == 'yes'){
        $excerpt_length = !empty($atts['post_excerpt_length']) ? $atts['post_excerpt_length'] : 20;
        ?>
         <p><?php echo gautama_custom_excerpt($excerpt_length); ?></p>
      <?php } if($atts['show_read_more'] == 'yes') { ?>
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn-link"> <?php esc_html_e('Read More', 'sigma-core'); ?> <i class="far fa-arrow-right"></i> </a>
      <?php } ?>
    </div>
  </div>
</article>
