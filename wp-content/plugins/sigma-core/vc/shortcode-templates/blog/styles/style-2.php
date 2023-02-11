<?php
/**
 * Blog shortcode style 2 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_blog' ][ 'atts' ];

$thumb_size = function_exists('gautama_get_thumb_size') ? gautama_get_thumb_size('gautama-blog') : 'gautama-blog';

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-post sigma-post-style-2'); ?>>
	<div class="sigma-post-wrapper">
		<?php if(has_post_thumbnail() && $atts['post_featured_image'] == 'yes'){ ?>
			<a class="sigma_post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php the_post_thumbnail( $thumb_size ); ?>
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
			<?php
			if(function_exists('gautama_custom_excerpt') && $atts['post_excerpt'] == 'yes'){
				$excerpt_length = !empty($atts['post_excerpt_length']) ? $atts['post_excerpt_length'] : 20;
				?>
			<div class="entry-content">
				<?php echo gautama_custom_excerpt($excerpt_length); ?>
			</div>
			<?php } ?>

			<?php if($atts['post_date'] == 'yes' || $atts['post_comments'] == 'yes'){ ?>
			<footer class="entry-footer">
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
			</footer>
			<?php } ?>
		</div>
	</div>
</article>
