<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
 ?>
 <article id="post-<?php the_ID(); ?>" <?php post_class('sigma-post sigma-post-style-8'); ?>>
   <div class="sigma-post-body">
     <?php if(has_post_thumbnail()){
        the_post_thumbnail('gautama-team');
      } ?>
      <div class="sigma-post-body-inner">
          <div class="sigma_post-date">
              <?php gautama_posted_on(); ?>
          </div>
          <h5> <a href="<?php the_permalink(); ?>" class="text-white"><?php the_title(); ?></a> </h5>
          <ul class="sigma_post-meta">
            <li><?php gautama_posts_author(); ?></li>
            <li><?php gautama_posts_comments(); ?></li>
          </ul>
      </div>
   </div>
 </article>
