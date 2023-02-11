<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-post sigma-post-style-4'); ?>>
	<div class="sigma-post-wrapper">
		<?php if(has_post_thumbnail()){ ?>
			<a class="sigma_post-thumbnail" href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( gautama_get_thumb_size('full') ); ?>
			</a>
		<?php } ?>
		<div class="sigma-post-inner">
			<header class="entry-header">
				<?php gautama_posted_on(); ?>
			</header>
			<?php the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
			<footer class="entry-footer">
				<div class="post-read-more-link">
					<a href="<?php the_permalink(); ?>">
						<?php echo esc_html('Read More', 'gautama'); ?><i class="far fa-chevron-right"></i>
					</a>
				</div>
			</footer>
		</div>
	</div>
</article>
