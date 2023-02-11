<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-post sigma-post-style-2'); ?>>
	<div class="sigma-post-wrapper">
		<?php if(has_post_thumbnail()){ ?>
			<a class="sigma_post-thumbnail" href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( gautama_get_thumb_size('gautama-blog') ); ?>
			</a>
		<?php } ?>
		<div class="sigma-post-inner">
			<header class="entry-header">
				<div class="post-categories">
					<?php gautama_posts_categories(); ?>
				</div>
				<?php the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
			</header>
			<div class="entry-content">
				<?php echo gautama_custom_excerpt(20); ?>
			</div>
			<footer class="entry-footer">
				<ul>
					<li>
						<div class="entry-meta">
							<?php gautama_posted_on(); ?>
						</div><!-- .entry-meta -->
					</li>
					<li>
					<?php gautama_posts_comments(); ?>
					</li>
				</ul>
			</footer>
		</div>
	</div>
</article>
