<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Gautama
 */

if ( ! function_exists( 'gautama_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time with the social icons.
	 */
	function gautama_posted_on() {
		?>
		<span class="posted-on">
			<a href="<?php echo get_the_permalink(); ?>" rel="bookmark">
				<i class="far fa-calendar-alt"></i>
				<?php echo get_the_date(); ?>
			</a>
		</span>
		<?php
	}
}

/**
 * Single Post pagination
 *
 * @since 1.0.0
 */
if(!function_exists('gautama_single_post_pagination')){
	function gautama_single_post_pagination($with_content = true){
		$previous = get_previous_post();
		$next = get_next_post();
		if( $next || $previous ){
			?>
			<div class="navigation post-navigation">
				 <h2 class="screen-reader-text"><?php echo esc_html__('Post navigation', 'gautama') ?></h2>
				 <div class="nav-links">
					 <?php if ( $previous ) { ?>
					 <div class="nav-previous">
						 <a title="<?php echo esc_attr(get_the_title($previous)) ?>" href="<?php echo esc_url(get_the_permalink($previous)) ?>">
							 <span><?php echo esc_html__('Previous Post', 'gautama') ?></span>
							 <h3><?php echo get_the_title($previous) ?></h3>
						 </a>
					 </div>
					 <?php } ?>
					 <?php if( $next && $previous ){ ?>
					 <div class="navigation-dots">
						 <span></span><span></span><span></span><span></span><span></span>
						 <span></span><span></span><span></span><span></span>
					 </div>
					 <?php } ?>
					 <?php if ( $next ) { ?>
					 <div class="nav-next">
						 <a title="<?php echo esc_attr(get_the_title($next)) ?>" href="<?php echo esc_url(get_the_permalink($next)) ?>">
							 <span><?php echo esc_html__('Next Post', 'gautama') ?></span>
							 <h3><?php echo get_the_title($next) ?></h3>
						 </a>
					 </div>
					 <?php } ?>
				 </div>
			 </div>
			<?php
		}
	}
}

if ( ! function_exists( 'gautama_post_authorbox' ) ) {
	/**
	 * Displays an post authorbox.
	 */
	function gautama_post_authorbox() {
		if ( get_the_author_meta( 'description' ) ) {
			$retina_mult = gautama_get_retina_multiplier();
			?>
			<div class="post-author-box">
				<div class="post-author-image">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 150 * $retina_mult ); ?>
				</div>
				<div class="post-author-details">
					<?php
					if ( ! is_author() ) {
						?>
						<span> <?php echo esc_html__('Written By ', 'gautama') ?></span>
						<h3 class="author-title">
							<?php echo get_the_author(); ?>
						</h3>
						<?php
					}
					?>
					<div class="post-author-description">
						<p class="author-description"><?php the_author_meta( 'description' ); ?></p>
					</div>
				</div>
			</div>
			<?php
		}
	}
}

/**
 * Displays related posts in single post page.
 *
 * @since 1.0.0
 */
function gautama_related_post() {
	$related_category_ids = wp_get_post_categories( get_the_ID() );
	if ( empty( $related_category_ids ) ) {
		return;
	}
	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 2,
		'post__not_in'   => array( get_the_ID() ),
		'tax_query'      => array(
			array(
				'taxonomy' => 'category',
				'field'    => 'id',
				'terms'    => $related_category_ids,
			),
		),
	);
	$related_post_query = new WP_Query( $args );
	if ( $related_post_query->have_posts() ) {
		?>
		<h3 class="sigma-related-title"><?php echo esc_html__('Related Posts', 'gautama') ?></h3>
		<div class="related-posts sigma_blog_wrapper sigma-shortcode-wrapper">
			<div class="row">
				<?php
				while ( $related_post_query->have_posts() ) {
					$related_post_query->the_post();
					echo '<div class="col-lg-6">';
					get_template_part( 'template-parts/post/styles/style-6');
					echo '</div>';
				}
				wp_reset_postdata();
				?>
			</div>
		</div>
		<?php
	}
}

/**
 * Posts author meta info
 */
if ( ! function_exists( 'gautama_posts_author' ) ) {
	function gautama_posts_author() {
		global $post;
		?>
		<div class="entry-meta-footer sigma_post_author">
			<div class="entry-meta-container">
				<span class="author vcard">
				<?php echo get_avatar(get_the_author_meta('email'), ''); ?>
					<a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
						<?php echo esc_html__('By ', 'gautama') . esc_html( get_the_author() ); ?>
					</a>
				</span>
			</div>
		</div>
		<?php
	}
}

/**
* Prints HTML for post categories
 */
if ( ! function_exists( 'gautama_posts_categories' ) ) {
	function gautama_posts_categories() {
		global $post;
		?>
		<div class="entry-meta-footer sigma_post_categories">
			<div class="entry-meta-container">
			<?php
				$categories_list = get_the_category_list( esc_html__( ' ', 'gautama' ) );
				if ( ! empty( $categories_list ) ) {
					?>
					<span class="categories-list">
						<?php print_r( $categories_list ); ?>
					</span>
					<?php
				}
			?>
			</div>
		</div>
		<?php
	}
}

/**
 * Prints HTML for post tags
 */
if ( ! function_exists( 'gautama_posts_tags' ) ) {

	function gautama_posts_tags() {
		global $post;
		?>
		<div class="entry-meta-footer sigma_post_tags">
		<?php
			$tags_list = get_the_tag_list( '', esc_html_x( '', 'list item separator', 'gautama' ) );
			if ( ! empty( $tags_list ) ) {
			?>
			<h5><?php echo esc_html('Tags', 'gautama'); ?></h5>
			<div class="entry-meta-container">
				<span class="tag-list">
					<i class="fas fa-tags"></i>
					<?php print_r( $tags_list ); ?>
				</span>
			</div>
			<?php } ?>
		</div>
		<?php
	}
}

/**
 * Posts comments
 */
if ( ! function_exists( 'gautama_posts_comments' ) ) {
	function gautama_posts_comments() {
		global $post;
		?>
		<div class="entry-meta-footer sigma_post_comments">
			<div class="entry-meta-container">
			<?php if ( comments_open() ) { ?>
				<span class="meta-comment">
					<i class="far fa-comments"></i>
					<?php
					$comment_template = '<span class="comment-count">%s</span> <span class="comment-count-label">%s</span>';
					comments_popup_link(
						sprintf( $comment_template, '0', esc_html__( 'comments', 'gautama' ) ),
						sprintf( $comment_template, '1', esc_html__( 'comment', 'gautama' ) ),
						sprintf( $comment_template, '%', esc_html__( 'comments', 'gautama' ) )
					);
					?>
				</span>
			<?php } ?>
			</div>
		</div>
	<?php
	}
}

/**
 * Get post single author.
 *
 * @since 1.0.0
 */
if(!function_exists('gautama_get_post_author')){
	function gautama_get_post_author(){
			global $gautama_options;
		if( !empty( get_the_author_meta( 'description' ) ) && (is_singular('portfolio') && ('portfolio' === get_post_type())) && $gautama_options['portfolio_single_show_author'] ){
			$post_author_image = gautama_get_option('portfolio_author_custom_image');
			if(isset($post_author_image) && !empty($post_author_image)) {
			$post_author_img_url = $post_author_image['url'];
			}
			?>
				<div class="widget about-author-widget">
						<div class="widget-about-author-inner">
							<?php
							if($post_author_img_url) { ?>
								<div class="widget-about-author-bg">
									<img src="<?php echo esc_url($post_author_img_url); ?>"/>
								</div>
							<?php } ?>
							<div class="widget-about-author-content">
								<h5><?php echo get_the_author_meta( 'display_name' ); ?></h5>
								<?php echo wpautop(get_the_author_meta( 'description' )); ?>
								<?php gautama_get_post_author_sm_links(); ?>
							</div>
						</div>
					</div>
			<?php
		}
	}
}
add_action('before_portfolio_sidebar', 'gautama_get_post_author', 20);
