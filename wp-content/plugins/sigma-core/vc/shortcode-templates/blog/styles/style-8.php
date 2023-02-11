<?php
/**
 * Blog shortcode style 6 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_blog' ][ 'atts' ];
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-post sigma-post-style-8'); ?>>
  <div class="sigma-post-body">
    <?php if(has_post_thumbnail() && $atts['post_featured_image'] == 'yes'){
       the_post_thumbnail('gautama-team');
     } ?>
     <div class="sigma-post-body-inner">
       <?php if($atts['post_date'] == 'yes') { ?>
         <div class="sigma_post-date">
             <?php gautama_posted_on(); ?>
         </div>
       <?php } ?>
         <h5> <a href="<?php the_permalink(); ?>" class="text-white"><?php the_title(); ?></a> </h5>
         <ul class="sigma_post-meta">
           <?php if($atts['post_author'] == 'yes') { ?>
           <li><?php gautama_posts_author(); ?></li>
          <?php } if($atts['post_comments'] == 'yes') { ?>
             <li><?php gautama_posts_comments(); ?></li>
           <?php } ?>
         </ul>
     </div>
  </div>
</article>
