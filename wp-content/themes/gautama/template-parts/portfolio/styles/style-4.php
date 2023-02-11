<?php
/**
 * Template part for displaying portfolio items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-portfolio sigma-portfolio-style-4 sigma-portfolio-wrapper'); ?>>
  <div class="sigma_portfolio-item">
    <?php if(has_post_thumbnail()){
     the_post_thumbnail('gautama-portfolio-vertical');
    } ?>
    <div class="sigma_portfolio-item-content">
      <div class="sigma_portfolio-item-content-inner">
        <h5> <a href="<?php echo esc_url(get_the_permalink()); ?>"> <?php the_title(); ?> </a> </h5>
        <p><?php echo esc_html(gautama_custom_excerpt(20)); ?></p>
      </div>
      <a href="<?php echo esc_url(get_the_permalink()); ?>"><i class="fal fa-plus"></i></a>
    </div>
  </div>
</article>
