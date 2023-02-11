<?php
/**
 * Wp bakery Shortcodes
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sigma Core
 */
if ( class_exists( 'Vc_Manager' ) ) {

	// Shortcode Layouts
	require_once trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-layouts/layouts.php';

	$shortcodes = apply_filters('sigmacore/shortcodes', array(
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-portfolio-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-portfolio-details-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-team-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-counter-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-testimonials-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-progress-bar-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-custom-tabs-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-infobox-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-video-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-blog-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-custom-heading-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-list-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-gallery-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-post-slider-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-service-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-single-portfolio-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-pricing-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-history-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-basic-slider-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-event-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-event-details-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-custom-image-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-single-team-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-page-template-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-ministries-shortcode-fields.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/class-sigma-vc-sermons-shortcode-fields.php',

		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/extended/vc-column.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/extended/vc-column-inner.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/extended/vc-row.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/extended/vc-row-inner.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/extended/shortcode-vc-icon.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/extended/shortcode-vc-button.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/extended/shortcode-vc-tta-tour.php',
		trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/extended/shortcode-vc-single-image.php',
	));

	// WooCommerce Shortcodes
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		array_push($shortcodes, trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/woocommerce/class-sigma-vc-products-shortcode-fields.php');
		array_push($shortcodes, trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/woocommerce/class-sigma-vc-product-categories-shortcode-fields.php');
		array_push($shortcodes, trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/woocommerce/class-sigma-vc-product-category-tabs-shortcode-fields.php');
		array_push($shortcodes, trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/woocommerce/class-sigma-vc-featured-products-shortcode-fields.php');
		array_push($shortcodes, trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/woocommerce/class-sigma-vc-single-product-shortcode-fields.php');
	}

    // Give shortcodes
    if ( in_array( 'give/give.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        array_push($shortcodes, trailingslashit( SIGMACORE_PATH ) . 'vc/shortcode-fields/give/class-sigma-vc-give-donation-shortcode-fields.php');
    }

	foreach ( $shortcodes as $shortcode_file ) {
		if ( file_exists( $shortcode_file ) ) {
			require_once( $shortcode_file );
		}
	}
}
