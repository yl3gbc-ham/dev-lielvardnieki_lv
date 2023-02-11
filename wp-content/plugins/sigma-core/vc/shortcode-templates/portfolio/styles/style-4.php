<?php
/**
 * Clients shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $sigma_shortcodes;
$atts   = $sigma_shortcodes[ 'sigma_portfolio' ][ 'atts' ];
$thumb_size = function_exists('gautama_get_thumb_size') ? gautama_get_thumb_size('gautama-portfolio-vertical') : 'gautama-portfolio';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-portfolio sigma-portfolio-style-4 sigma-portfolio-wrapper'); ?>>
  <div class="sigma_portfolio-item">
    <?php if(has_post_thumbnail()){
     the_post_thumbnail($thumb_size);
    } ?>
    <div class="sigma_portfolio-item-content">
      <div class="sigma_portfolio-item-content-inner">
        <h5> <a href="<?php echo esc_url(get_the_permalink()); ?>"> <?php the_title(); ?> </a> </h5>
        <?php
        if($atts['post_excerpt'] == 'yes' && function_exists('gautama_custom_excerpt')){
          $excerpt_length = isset($atts['post_excerpt_length']) && !empty($atts['post_excerpt_length']) ? $atts['post_excerpt_length'] : 10;
          ?>
        <p><?php echo esc_html(gautama_custom_excerpt($excerpt_length)) ?></p>
      <?php } ?>
      </div>
      <a href="<?php echo esc_url(get_the_permalink()); ?>"><i class="fal fa-plus"></i></a>
    </div>
  </div>
</article>
