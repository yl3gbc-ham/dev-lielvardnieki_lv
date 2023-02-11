<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-post sigma-post-style-9'); ?>>
  <div class="row no-gutters">
    <?php if(has_post_thumbnail()) { ?>
      <div class="col-lg-6">
        <div class="sigma_post-thumb">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail( gautama_get_thumb_size('gautama-portfolio') ) ?>
          </a>
          <div class="sigma_post-date">
            <?php gautama_posted_on(); ?>
          </div>
       </div>
      </div>
    <?php } ?>
    <div class="col-lg-6">
      <div class="sigma_post-body">
    <h5> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h5>
    <ul class="sigma_post-meta">
      <li><?php gautama_posts_author(); ?></li>
      <li><?php gautama_posts_comments(); ?></li>
    </ul>
    <div class="sigma_post-meta">
      <?php gautama_posts_tags(); ?>
    </div>
    <div class="sigma-post-content">
      <p><?php echo gautama_custom_excerpt(20); ?></p>
      <a href="<?php the_permalink(); ?>" class="sigma_btn-custom"> <?php esc_html_e('Read more', 'gautama'); ?> <i class="far fa-arrow-right"></i> </a>
    </div>
  </div>
    </div>
  </div>
</article>
