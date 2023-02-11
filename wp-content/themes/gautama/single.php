<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Gautama
 */
get_header();
$post_detail_style = gautama_get_option('blog-details-style', 'style-2');
?>
<div class="section section-padding">
	<div class="container">
		<div class="row">
			<div id="primary" class="content-area <?php echo esc_attr( gautama_grid_column_classes() ); ?>">
				<main id="main" class="site-main">
					<div class="post-details-box <?php echo esc_attr($post_detail_style); ?>">
						<?php
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/post/single/content' );
							gautama_single_post_pagination();
							// Related Post
							gautama_related_post();
							gautama_post_authorbox();
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						endwhile; // End of the loop.
						?>
					</div>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php
 get_footer();
 ?>
