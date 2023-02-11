<?php
/**
 * Blog shortcode style 4 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_blog' ][ 'atts' ];

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-post sigma-post-style-4'); ?>>
	<div class="sigma-post-wrapper">
		<?php if(has_post_thumbnail() && $atts['post_featured_image'] == 'yes'){ ?>
			<a class="sigma_post-thumbnail" href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'full' ); ?>
			</a>
		<?php } ?>
		<div class="sigma-post-inner">
      <?php if(function_exists('gautama_posted_on') && $atts['post_date'] == 'yes'){ ?>
			<header class="entry-header">
        <?php gautama_posted_on(); ?>
			</header>
      <?php } ?>
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

      <?php if($atts['read_more'] == 'yes'){ ?>
			<footer class="entry-footer">
				<div class="post-read-more-link">
					<a href="<?php the_permalink(); ?>">
						<?php echo esc_html('Read More', 'gautama'); ?><i class="far fa-chevron-right"></i>
					</a>
				</div>
			</footer>
      <?php } ?>

		</div>
	</div>
</article>
