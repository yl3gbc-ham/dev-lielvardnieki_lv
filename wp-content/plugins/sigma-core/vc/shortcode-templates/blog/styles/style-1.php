<?php
/**
 * Blog shortcode style 1 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_blog' ][ 'atts' ];
$slide_classes  = 'sigma-post-slide';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-post sigma-post-style-1'); ?>>
	<div class="sigma-post-wrapper">
		<?php if(has_post_thumbnail() && $atts['post_featured_image'] == 'yes'){ ?>
			<a class="sigma_post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php the_post_thumbnail('full'); ?>
			</a>
		<?php } ?>
		<div class="sigma-post-inner">
			<header class="entry-header">
				<?php if(function_exists('gautama_posts_categories') && $atts['show_post_cat'] == 'yes'){ ?>
				<div class="post-categories">
					<?php gautama_posts_categories(); ?>
				</div>
				<?php } ?>
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			</header>

			<?php if($atts['post_date'] == 'yes' || $atts['post_comments'] == 'yes'){ ?>
			<div class="entry-footer">
				<ul>
					<?php if(function_exists('gautama_posted_on') && $atts['post_date'] == 'yes'){ ?>
					<li>
						<div class="entry-meta">
							<?php gautama_posted_on(); ?>
						</div>
					</li>
					<?php } ?>
					<?php if(function_exists('gautama_posts_comments') && $atts['post_comments'] == 'yes'){ ?>
					<li>
						<?php gautama_posts_comments(); ?>
					</li>
					<?php } ?>
				</ul>
			</div>
			<?php } ?>
			<?php
			if(function_exists('gautama_custom_excerpt') && $atts['post_excerpt'] == 'yes'){
				$excerpt_length = !empty($atts['post_excerpt_length']) ? $atts['post_excerpt_length'] : 20;
				?>
			<div class="entry-content">
				<?php echo gautama_custom_excerpt($excerpt_length); ?>
			</div>
			<?php } ?>

			<?php if($atts['read_more'] == 'yes' || $atts['post_author'] == 'yes'){ ?>
			<footer class="entry-footer">
				<?php if(function_exists('gautama_posts_author') && $atts['post_author'] == 'yes'){ ?>
				<div class="author-details">
					<?php gautama_posts_author(); ?>
				</div>
				<?php } ?>
				<?php if($atts['read_more'] == 'yes'){ ?>
				<div class="post-read-more-link">
					<a href="<?php the_permalink(); ?>">
						<?php echo esc_html('Read More', 'sigma-core'); ?><i class="fas fa-arrow-right"></i>
					</a>
				</div>
				<?php } ?>
			</footer>
			<?php } ?>
		</div>
	</div>
</article>
