<?php
/**
 * Event shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_portfolio_details' ][ 'atts' ];
$portfolio_details = get_post_meta( get_the_ID(), 'sigma_portfolio_details', true );
$sigma_portfolio_client_name = isset($portfolio_details['sigma_portfolio_client_name']) && !empty($portfolio_details['sigma_portfolio_client_name']) ? $portfolio_details['sigma_portfolio_client_name'] : '';
$sigma_portfolio_year = isset($portfolio_details['sigma_portfolio_year']) && !empty($portfolio_details['sigma_portfolio_year']) ? $portfolio_details['sigma_portfolio_year'] : '';
?>
<?php if($sigma_portfolio_client_name || $sigma_portfolio_year && is_singular('portfolio')) { ?>
	<div class="sigma-portfolio-meta-details">
	<div class="sigma_portfolio-details">
		<?php if($sigma_portfolio_client_name) { ?>
    <div class="sigma_portfolio-details-item">
      <span><?php esc_html_e('Client', 'sigma-core'); ?></span>
      <h5><?php echo esc_html($sigma_portfolio_client_name); ?></h5>
    </div>
	<?php } ?>
		<?php
		$portfolio_category = get_the_terms($post->ID, 'portfolio-category');
		if($portfolio_category) {
		$portfolio_cat = $portfolio_category[0];
		$portfolio_cat_name = $portfolio_cat->name;
		$portfolio_cat_id = $portfolio_cat->slug;
		if(isset($portfolio_cat_name)) {
		?>
	    <div class="sigma_portfolio-details-item">
	      <span><?php esc_html_e('Category', 'sigma-core'); ?></span>
	      <h5><?php echo esc_html($portfolio_cat_name); ?></h5>
	    </div>
		<?php } } if($sigma_portfolio_year) { ?>
	    <div class="sigma_portfolio-details-item">
	      <span><?php esc_html_e('Date', 'sigma-core'); ?></span>
	      <h5><?php echo esc_html($sigma_portfolio_year); ?></h5>
	    </div>
		<?php } ?>
	</div>
  </div>
<?php } else { ?>
    <h4 class="event-details-error"><?php esc_html_e('No Details Found. Please add meta details in this portfolio', 'sigma-core'); ?></h4>
<?php } ?>
