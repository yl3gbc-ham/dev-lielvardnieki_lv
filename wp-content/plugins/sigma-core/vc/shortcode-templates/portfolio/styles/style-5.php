<?php
/**
 * Clients shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $sigma_shortcodes;
$atts   = $sigma_shortcodes[ 'sigma_portfolio' ][ 'atts' ];
$thumb_size = function_exists('gautama_get_thumb_size') ? gautama_get_thumb_size('gautama-blog') : 'gautama-portfolio';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-portfolio sigma-portfolio-style-5 sigma-portfolio-wrapper'); ?>>
  <div class="sigma_portfolio-item">
    <?php if(has_post_thumbnail()){
     the_post_thumbnail($thumb_size);
    } ?>
    <div class="sigma_portfolio-item-content">
      <div class="sigma_portfolio-item-content-inner">
        <?php
        $portfolio_category = get_the_terms($post->ID, 'portfolio-category');
        if($portfolio_category) {
        $portfolio_cat = $portfolio_category[0];
        $portfolio_cat_name = $portfolio_cat->name;
        $portfolio_cat_id = $portfolio_cat->slug;
        if(isset($portfolio_cat_name)) {
        ?>
        <a href="<?php echo esc_url(get_term_link($portfolio_cat->slug, 'portfolio-category')); ?>" class="custom-primary"><?php echo esc_html($portfolio_cat_name); ?></a>
      <?php } } ?>
        <h5> <a href="<?php echo esc_url(get_the_permalink()); ?>"> <?php the_title(); ?> </a> </h5>
        <a href="<?php echo esc_url(get_the_permalink()); ?>" class="sigma_btn-custom"><?php esc_html_e('Read More', 'sigma-core'); ?></a>
      </div>
    </div>
  </div>
</article>
