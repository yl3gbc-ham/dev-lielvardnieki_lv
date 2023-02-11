<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-post sigma-post-style-7'); ?>>
	<div class="sigma-post-wrapper">
    <div class="sigma_post-thumb">
			<?php if(has_post_thumbnail()){ ?>
				<a class="sigma_post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
					<?php the_post_thumbnail('gautama-blog'); ?>
				</a>
	      <div class="sigma_post-date">
	          <span><?php echo get_the_date('j').'/'; ?></span>
	          <span><?php echo get_the_date('M'); ?></span>
        </div>
			<?php } ?>
		</div>
		<div class="sigma-post-inner">
			<div class="sigma-post-meta">
				<div class="post-categories">
					<?php gautama_posts_categories(); ?>
				</div>
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
				<div class="entry-content">
					<?php echo gautama_custom_excerpt(20); ?>
				</div>
				<div class="sigma-post-footer">
					<a href="<?php the_permalink(); ?>" class="btn-link">
						<?php echo esc_html('Read More', 'gautama'); ?><i class="far fa-plus"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</article>
