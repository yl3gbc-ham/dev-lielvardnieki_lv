<?php
/**
 * Portfolio shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $sigma_shortcodes;
$atts   = $sigma_shortcodes[ 'sigma_single_portfolio' ][ 'atts' ];
$thumb_size = function_exists('gautama_get_thumb_size') ? gautama_get_thumb_size('gautama-blog') : 'gautama-blog';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-portfolio sigma-portfolio-style-3 sigma-portfolio-wrapper'); ?>>
	<div class="sigma-portfolio-thumbnail-wrapper">
    <?php if(has_post_thumbnail()){ ?>
		<div class="sigma-portfolio-image-container">
  		<a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail($thumb_size) ?></a>
		</div>
		<?php } ?>
		<div class="sigma-portfolio-content-cover">
			<div class="sigma-portfolio-action-icons">
        <?php if(has_post_thumbnail()){ ?>
					<a class="sigma-mfg-popup-image" href="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>">
						<i class="fas fa-expand"></i>
					</a>
				<?php } ?>
			</div>
			<div class="portfolio-content-sec">
				<div class="sigma-portfolio-title">
          <?php
          $get_terms = get_the_terms( get_the_ID() , 'portfolio-category' );
          if ( $get_terms && $atts['show_post_cat'] == 'yes' ) {
            ?>
            <span class="sigma-portfolio-category">
              <?php
              $terms_data = array();
              foreach ( $get_terms as $term ) {
                echo '<a href="'.esc_url(get_term_link($term)).'">'.esc_html( $term->name ).'</a>';
              }
              ?>
            </span>
					<?php } ?>
					<h5 class="sigma_post-title portfolio-title"><a href="<?php echo esc_url( get_post_permalink() ); ?>"><?php echo get_the_title(); ?></a></h5>
					<?php if($atts['read_more'] == 'yes'){ ?>
					<a href="<?php echo esc_url( get_post_permalink() ); ?>" class="portfolio-link">
            <?php echo esc_html__('Read More', 'sigma-core') ?>
          </a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</article>
