<?php
/**
 * Template part for displaying portfolio items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
 $thumb_size = function_exists('gautama_get_thumb_size') ? gautama_get_thumb_size('gautama-blog') : 'full';
 $ministries_details = get_post_meta( $post->ID, 'sigma_ministries_details', true );
 $sigma_ministries_icon = isset( $ministries_details['sigma_ministries_socials_icon'] ) ? $ministries_details['sigma_ministries_socials_icon'] : '';
 $wrapp_icon_class = isset( $ministries_details['sigma_ministries_socials_icon'] ) ? 'minsitries-icon' : '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-ministries sigma-ministries-style-1 sigma-ministries-wrapper'); ?>>
  <div class="sigma_ministries style-1 <?php echo esc_attr($wrapp_icon_class); ?>">
      <?php if(has_post_thumbnail() && gautama_get_option('show_archive_thumbnail') == true){
        the_post_thumbnail( $thumb_size );
      }
      ?>
      <?php if(isset($sigma_ministries_icon) && !empty($sigma_ministries_icon)) { ?>
      <div class="sigma_ministries-thumb">
        <i class="<?php echo esc_attr($sigma_ministries_icon); ?>"></i>
      </div>
      <?php } ?>
    <div class="sigma_ministries-body">
      <h5><?php the_title(); ?></h5>
      <p><?php echo esc_html(gautama_custom_excerpt(15)); ?></p>
      <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn-link"> <?php esc_html_e('Read More', 'gautama'); ?> <i class="far fa-arrow-right"></i> </a>
    </div>
  </div>
</article>
