<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-post sigma-post-style-1'); ?>>
	<div class="sigma-post-wrapper">
		<?php if(has_post_thumbnail()){ ?>
			<a class="sigma_post-thumbnail" href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('full'); ?>
			</a>
		<?php } ?>
		<div class="sigma-post-inner">
			<header class="entry-header">
				<div class="post-categories">
					<?php gautama_posts_categories(); ?>
				</div>
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			</header>
			<div class="entry-footer">
				<ul>
					<?php if(function_exists('sigmacore_get_post_view')){ ?>
					<li class="post-views">
						<div class="entry-meta-footer sigma_post_views">
							<div class="entry-meta-container">
								<span><i class="fas fa-eye"></i> <?php echo sigmacore_get_post_view(); ?></span>
							</div>
						</div>
					</li>
					<?php } ?>
					<li>
						<div class="entry-meta">
							<?php gautama_posted_on(); ?>
						</div>
					</li>
					<li>
						<?php gautama_posts_comments(); ?>
					</li>
				</ul>
			</div>
			<div class="entry-content">
				<?php echo gautama_custom_excerpt(20); ?>
			</div>
			<footer class="entry-footer">
				<div class="author-details">
					<?php gautama_posts_author(); ?>
				</div>
				<div class="post-read-more-link">
					<a href="<?php the_permalink(); ?>">
						<?php echo esc_html('Read More', 'gautama'); ?> <i class="far fa-arrow-right"></i>
					</a>
				</div>
			</footer>
		</div>
	</div>
</article>
