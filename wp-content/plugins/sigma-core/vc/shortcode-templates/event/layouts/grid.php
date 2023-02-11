<?php
/**
 * Event shortcode gird layout file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) { // Or some other WordPress constant
	exit;
}
global $sigma_shortcodes;
$atts        = $sigma_shortcodes[ 'sigma_event' ][ 'atts' ];
$the_query   = $sigma_shortcodes[ 'sigma_event' ][ 'the_query' ];
$classes 		 = sigmacore_get_grid_layout_classes($atts);
?>
<div class="row">
	<?php
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		?>
		<div class="<?php echo esc_attr( $classes ); ?>">
			<?php sigmacore_get_vc_shortcode_template( 'event/styles/' . $atts[ 'style' ] ); ?>
		</div>
		<?php
	}
	/* Restore original Post Data */
	wp_reset_postdata();
	?>
</div>
