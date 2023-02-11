<?php
/**
 * products shortcode slider layout file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts        = $sigma_shortcodes[ 'sigma_products' ][ 'atts' ];
$the_query   = $sigma_shortcodes[ 'sigma_products' ][ 'the_query' ];

$slick_options = sigmacore_get_slider_layout_atts( $atts );

sigmacore_before_layout_slider( $atts );
?>

<div class="slick-slider <?php echo esc_attr( sigmacore_get_slider_layout_classes($atts) ) ?>" data-slick="<?php echo esc_attr( json_encode( $slick_options ) ); ?>">
	<?php
	$i = 0;
	$per_page = isset($atts['post_per_page']) && !empty($atts['post_per_page']) ? $atts['post_per_page'] : 0;
	$count = $the_query->found_posts > $per_page ? $per_page : $the_query->found_posts;

	while ( $the_query->have_posts() ) {
		$the_query->the_post();

		if($i % 3 == 0 && $atts['style'] == 'style-3'){
			echo '<div class="col-lg-6 p-0">';
		}

		sigmacore_get_vc_shortcode_template( 'products/styles/' . $atts[ 'style' ] );

		if( ($i % 3 == 2 || $i == $count - 1) && $atts['style'] == 'style-3' ){
			echo '</div>';
		}

		$i++;
	}
	/* Reset Post Data */
	wp_reset_postdata();
	?>
</div>
