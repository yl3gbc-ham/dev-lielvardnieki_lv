<?php
/**
 * Template part for displaying post details layout 1
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
if(function_exists('sigmacore_set_post_view')){
	sigmacore_set_post_view();
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-post-details'); ?>>
	<div class="sigma-post-wrapper">
		<?php if(has_post_thumbnail()){ ?>
			<div class="sigma_post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php } ?>
	<div class="sigma-post-inner">
		<header class="entry-header">
			<div class="post-categories">
				<?php gautama_posts_categories(); ?>
			</div>
			<?php
			if ( !gautama_subheader_is_active() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			}
			?>
		</header><!-- .entry-header -->
		<!-- Footer -->
		<div class="entry-footer">
			<ul>
				<li>
					<div class="author-details">
						<?php gautama_posts_author(); ?>
					</div>
				</li>
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
						<span class="posted-on">
							<i class="far fa-calendar-alt"></i>
							<?php echo get_the_date(); ?>
						</span>
  				</div>
				</li>
				<li>
		      <?php gautama_posts_comments(); ?>
				</li>
			</ul>
		</div>
		<div class="entry-content">
			<?php
			the_content();
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gautama' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>
		<!-- .entry-content -->
	<footer class="entry-footer">
	<?php gautama_posts_tags(); ?>
	<?php
	if( function_exists('sigmacore_posts_share') ){
		sigmacore_posts_share();
	}
	?>
	</footer><!-- .entry-footer -->
	</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
