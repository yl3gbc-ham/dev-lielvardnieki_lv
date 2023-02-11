<?php
/**
 * The template for displaying all single portfolio posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Gautama
 */
get_header();
?>
<div class="section">
	<div class="container">
		<div class="row">
				<div id="primary" class="<?php echo esc_attr( gautama_grid_column_classes() ); ?> content-area">
					<main id="main" class="site-main">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/ministries/single/style-1' );
						gautama_single_post_pagination();
					endwhile; // End of the loop.
					?>
					</main><!-- #main -->
				</div><!-- #primary -->
				<?php
				 get_sidebar(); ?>
		</div>
	</div>
</div>
<?php
get_footer();
