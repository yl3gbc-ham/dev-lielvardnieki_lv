<?php
/**
 * Featured Products shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_featured_products' ][ 'atts' ];
$the_query = $sigma_shortcodes[ 'sigma_featured_products' ][ 'the_query' ];
?>
<div class="featured-product-list">
	<?php if(isset($atts['title']) && !empty($atts['title'])) { ?>
		<h4><?php echo esc_html($atts['title']); ?></h4>
	<?php } ?>
<?php
while ( $the_query->have_posts() ) {
	$the_query->the_post();
 		sigmacore_get_vc_shortcode_template( 'featured-products/styles/' . $atts[ 'style' ] );
}
/* Restore original Post Data */
wp_reset_postdata();
 ?>
</div>
