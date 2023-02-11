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
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-post sigma-post-style-7'); ?>>
	<div class="sigma-post-wrapper">
    <div class="sigma_post-thumb">
			<?php if(has_post_thumbnail() && $atts['post_featured_image'] == 'yes'){ ?>
				<a class="sigma_post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
					<?php the_post_thumbnail('gautama-blog'); ?>
				</a>
        <?php if($atts['post_date'] == 'yes') { ?>
	      <div class="sigma_post-date">
	          <span><?php echo get_the_date('j').'/'; ?></span>
	          <span><?php echo get_the_date('M'); ?></span>
        </div>
			<?php } } ?>
		</div>
		<div class="sigma-post-inner">
			<div class="sigma-post-meta">
        <?php if(function_exists('gautama_posts_categories') && $atts['show_post_cat'] == 'yes'){ ?>
  				<div class="post-categories">
  					<?php gautama_posts_categories(); ?>
  				</div>
        <?php } ?>
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
        <?php
				if(function_exists('gautama_custom_excerpt') && $atts['post_excerpt'] == 'yes'){
					$excerpt_length = !empty($atts['post_excerpt_length']) ? $atts['post_excerpt_length'] : 20;
					?>
  				<div class="entry-content">
  					<?php echo gautama_custom_excerpt($excerpt_length); ?>
  				</div>
				<?php } ?>
        <?php if($atts['read_more'] == 'yes'){ ?>
  				<div class="sigma-post-footer">
  					<a href="<?php the_permalink(); ?>" class="btn-link">
  						<?php echo esc_html('Read More', 'gautama'); ?><i class="far fa-plus"></i>
  					</a>
  				</div>
        <?php } ?>
			</div>
		</div>
	</div>
</article>
