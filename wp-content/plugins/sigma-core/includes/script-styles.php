<?php
/**
 * Script and styles for sigma core plugin.
 *
 * @package Sigma Core
 */

/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 */
function sigmacore_scripts() {
	wp_enqueue_script( 'sigma-shortcodes', trailingslashit( SIGMACORE_URL ) . 'assets/js/shortcodes.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'sigmacore-easypiechart', trailingslashit( SIGMACORE_URL ) . 'assets/js/jquery.easypiechart.js', array( 'jquery' ), '2.1.6', true );

	wp_enqueue_style( 'sigma-vc-progressbar', trailingslashit( SIGMACORE_URL ) . 'assets/css/shortcodes/progress-bar.css' );
	wp_enqueue_style( 'sigma-vc-custom-heading', trailingslashit( SIGMACORE_URL ) . 'assets/css/shortcodes/custom-heading.css' );
	wp_enqueue_style( 'sigma-vc-counter', trailingslashit( SIGMACORE_URL ) . 'assets/css/shortcodes/counter.css' );
	wp_enqueue_style( 'sigma-vc-infobox', trailingslashit( SIGMACORE_URL ) . 'assets/css/shortcodes/infobox.css' );
	wp_enqueue_style( 'sigma-vc-testimonials', trailingslashit( SIGMACORE_URL ) . 'assets/css/shortcodes/testimonials.css' );
	wp_enqueue_style( 'sigma-vc-custom-tabs', trailingslashit( SIGMACORE_URL ) . 'assets/css/shortcodes/custom-tabs.css' );
	wp_enqueue_style( 'sigma-vc-list', trailingslashit( SIGMACORE_URL ) . 'assets/css/shortcodes/list.css' );
	wp_enqueue_style( 'sigma-vc-video', trailingslashit( SIGMACORE_URL ) . 'assets/css/shortcodes/video.css' );
	wp_enqueue_style( 'sigma-vc-gallery', trailingslashit( SIGMACORE_URL ) . 'assets/css/shortcodes/gallery.css' );
	wp_enqueue_style( 'sigma-vc-post-slider', trailingslashit( SIGMACORE_URL ) . 'assets/css/shortcodes/post-slider.css' );
	wp_enqueue_style( 'sigma-vc-pricing', trailingslashit( SIGMACORE_URL ) . 'assets/css/shortcodes/pricing.css' );
	wp_enqueue_style( 'sigma-vc-history', trailingslashit( SIGMACORE_URL ) . 'assets/css/shortcodes/history.css' );
	wp_enqueue_style( 'sigma-vc-custom-image', trailingslashit( SIGMACORE_URL ) . 'assets/css/shortcodes/custom-image.css' );

	wp_enqueue_style( 'sigma-vc-products', trailingslashit( SIGMACORE_URL ) . 'assets/css/shortcodes/products.css' );
	wp_enqueue_style( 'sigma-vc-product-categories', trailingslashit( SIGMACORE_URL ) . 'assets/css/shortcodes/product-categories.css' );
	wp_enqueue_style( 'sigma-vc-featured-products', trailingslashit( SIGMACORE_URL ) . 'assets/css/shortcodes/featured-products.css' );

}
add_action( 'wp_enqueue_scripts', 'sigmacore_scripts' );

/**
 * Enqueue scripts and styles for admin.
 *
 * @since 1.0.0
 */
function sigmacore_admin_scripts( $hook ) {
	wp_enqueue_script( 'sigmacore-fontawesome-iconpicker', trailingslashit( SIGMACORE_URL ) . 'assets/js/fontawesome-iconpicker.min.js', array( 'jquery' ), false, true );
	wp_register_script( 'sigmacore-admin', trailingslashit( SIGMACORE_URL ) . 'assets/js/admin.js', array( 'jquery' ), false, true );
	$sigmacore_object = array(
		'sigmacore_get_social_icons'  => sigmacore_get_social_icons(),
		'sigmacore_get_service_icons' => sigma_vc_iconpicker_type_flaticon(array()),
		);
	wp_localize_script( 'sigmacore-admin', 'sigmacore_object', $sigmacore_object );
	wp_enqueue_script( 'sigmacore-admin' );
	wp_enqueue_style( 'sigmacore-admin-css', trailingslashit( SIGMACORE_URL ) . '/assets/css/admin.css', array(), '1.0.0' );
	wp_enqueue_style( 'sigmacore-fontawesome-iconpicker', trailingslashit( SIGMACORE_URL ) . '/assets/css/fontawesome-iconpicker.min.css', array(), '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'sigmacore_admin_scripts', 99 );

/**
 * Add shortcode inline css.
 *
 * @since 1.0.0
 */
 function sigmacore_vc_add_inline_css( $custom_css = '' ) {
 	global $wp_filesystem, $sigma_vc_inline_css;
 	if ( $sigma_vc_inline_css ) {
 		$upload_dir     = wp_upload_dir();
 		$url = $upload_dir['baseurl'];

 		if($url === $upload_dir['baseurl'] && is_ssl() ) {
 			$url = str_replace( 'http://', 'https://', $url );
 		}

 		$customizer_dir = $upload_dir['basedir'] . '/sigma-vc-inline-css';
 		if ( empty( $wp_filesystem ) ) {
 			require_once( ABSPATH . '/wp-admin/includes/file.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
 			WP_Filesystem();
 		}
 		if ( ! is_dir( $customizer_dir ) ) {
 			wp_mkdir_p( $customizer_dir );
 		}
 		$wp_filesystem->put_contents(
 			$customizer_dir . '/sigma-vc-inline-css.css',
 			implode( ' ', $sigma_vc_inline_css ) . $custom_css,
 			FS_CHMOD_FILE
 		);
 		$inline_shortcode_css      = $url . '/sigma-vc-inline-css/sigma-vc-inline-css.css';
 		$inline_shortcode_css_path = $upload_dir['basedir'] . '/sigma-vc-inline-css/sigma-vc-inline-css.css';
 		if ( file_exists( $inline_shortcode_css_path ) ) {
 			wp_enqueue_style( 'sigma-vc-inline-css', $inline_shortcode_css, array( 'gautama-style' ), date( 'ymd-Gis' ) );
 		}
 	}
 }
add_action( 'get_footer', 'sigmacore_vc_add_inline_css' );

