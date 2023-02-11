<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
 if(function_exists('sigmacore_set_post_view')){
 	sigmacore_set_post_view();
 }
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-post sigma-post-style-10'); ?>>
	<div class="sigma-post-wrapper">
    <div class="sigma_post-thumb">
			<?php if(has_post_thumbnail()){ ?>
				<a class="sigma_post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
					<?php the_post_thumbnail('gautama-blog'); ?>
				</a>
			<?php } ?>
		</div>
		<div class="sigma-post-inner">
			<div class="sigma-post-meta">
				<div class="post-categories">
					<?php gautama_posts_categories(); ?>
				</div>
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
        <ul class="sigma-post-meta-footer">
          <li><?php esc_html_e('By: ', 'gautama'); ?><span><?php echo get_the_author(); ?></span></li>
          <li><?php echo sigmacore_get_post_view(); ?></li>
        </ul>
				<div class="entry-content">
					<?php echo gautama_custom_excerpt(20); ?>
				</div>
			</div>
		</div>
	</div>
</article>
