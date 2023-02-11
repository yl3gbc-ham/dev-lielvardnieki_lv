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
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-post sigma-post-style-9'); ?>>
  <div class="row no-gutters">
    <?php if(has_post_thumbnail() && $atts['post_featured_image'] == 'yes') { ?>
      <div class="col-lg-6">
        <div class="sigma_post-thumb">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail( gautama_get_thumb_size('gautama-portfolio') ) ?>
          </a>
          <?php if($atts['post_date'] == 'yes') { ?>
            <div class="sigma_post-date">
              <?php gautama_posted_on(); ?>
            </div>
          <?php } ?>
       </div>
      </div>
    <?php } ?>
    <div class="col-lg-6">
      <div class="sigma_post-body">
    <h5> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h5>
    <ul class="sigma_post-meta">
      <?php if($atts['post_author'] == 'yes') { ?>
        <li><?php gautama_posts_author(); ?></li>
      <?php } if($atts['post_comments'] == 'yes') { ?>
        <li><?php gautama_posts_comments(); ?></li>
      <?php } ?>
    </ul>
    <?php if($atts['show_post_tag'] == 'yes') { ?>
      <div class="sigma_post-meta">
        <?php gautama_posts_tags(); ?>
      </div>
    <?php } ?>
    <div class="sigma-post-content">
      <?php
      if(function_exists('gautama_custom_excerpt') && $atts['post_excerpt'] == 'yes'){
        $excerpt_length = !empty($atts['post_excerpt_length']) ? $atts['post_excerpt_length'] : 20;
        ?>
        <p><?php echo gautama_custom_excerpt($excerpt_length); ?></p>
      <?php } ?>
      <?php if($atts['read_more'] == 'yes'){ ?>
        <a href="<?php the_permalink(); ?>" class="sigma_btn-custom"> <?php esc_html_e('Read more', 'gautama'); ?> <i class="far fa-arrow-right"></i> </a>
      <?php } ?>
    </div>
  </div>
    </div>
  </div>
</article>
