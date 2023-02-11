<?php
/**
 * Ministries shortcode slider layout file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts        = $sigma_shortcodes[ 'sigma_ministries' ][ 'atts' ];
$the_query   = $sigma_shortcodes[ 'sigma_ministries' ][ 'the_query' ];

$slick_options = sigmacore_get_slider_layout_atts( $atts );

sigmacore_before_layout_slider( $atts );

?>
<div class="slick-slider <?php echo esc_attr( sigmacore_get_slider_layout_classes($atts) ) ?>" data-slick="<?php echo esc_attr( json_encode( $slick_options ) ); ?>">
	<?php
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		sigmacore_get_vc_shortcode_template( 'ministries/styles/' . $atts[ 'style' ] );
	}
	/* Reset Post Data */
	wp_reset_postdata();
	?>
</div>
