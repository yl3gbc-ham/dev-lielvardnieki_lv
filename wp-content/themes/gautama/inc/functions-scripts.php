<?php
/**
* Gautama Theme scripts and styles.
*
* @package Gautama
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function gautama_load_google_fonts(){
	$fonts_url = '';
	/* Translators: If there are characters in your language that are not
		* supported by Lora, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$poppins = _x( 'on', 'Poppins font: on or off', 'gautama' );
		/* Translators: If there are characters in your language that are not
		* supported by Open Sans, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$rubik = _x( 'on', 'Rubik font: on or off', 'gautama' );
		if ( 'off' !== $poppins || 'off' !== $rubik ) {
			$font_families = array();
			if ( 'off' !== $rubik ) {
			$font_families[] = 'Rubik:300,400,500,600,700,800,900&display=swap';
			}
			if ( 'off' !== $poppins ) {
			$font_families[] = 'Poppins:100,200,300,400,500,600,700,800,900&display=swap';
			}
			$query_args =
			array(
			'family' => urlencode( implode( '|', $font_families ) ),
			);
			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}
	return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 */
function gautama_scripts() {
	$theme_data = wp_get_theme();
	if ( is_child_theme() && is_object( $theme_data->parent() ) ) {
		$theme_data = wp_get_theme( $theme_data->parent()->template );
	}
	$version = $theme_data->get( 'Version' );

	// 3rd Party Styles
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/plugins/bootstrap.min.css', array(), '4.0.0' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/plugins/flaticon.css', array(), $version );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/plugins/magnific-popup.css', array(), '1.1.0' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/plugins/slick.css', array(), '1.0.0' );
	wp_enqueue_style( 'select2', get_template_directory_uri() . '/assets/css/plugins/select2.min.css', array(), '4.1.0' );
	wp_enqueue_style( 'v4-shims', get_template_directory_uri() . '/assets/fonts/css/v4-shims.min.css', array(), '5.11.2' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/fonts/css/font-awesome.min.css', array( 'v4-shims' ), '5.11.2' );

	// Google Fonts
	wp_enqueue_style( 'google-fonts', gautama_load_google_fonts(), array(), null );

	// Theme Styles
    // give
    if( class_exists( 'Give' ) ){
        wp_enqueue_style( 'gautama-give', get_template_directory_uri() . '/assets/css/theme-give.css', array(), $version );
    }
    wp_enqueue_style( 'gautama-style', get_stylesheet_uri(), array( 'bootstrap' ) );
	wp_enqueue_style( 'gautama-theme', get_template_directory_uri() . '/assets/css/theme.css', array(), $version );
	wp_enqueue_style( 'gautama-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), $version );

	// 3rd Party Scripts
	wp_enqueue_script('masonry');
	wp_enqueue_script('imagesloaded');
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/plugins/popper.min.js', array( 'jquery' ), $version, true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/plugins/bootstrap.min.js', array( 'jquery' ), '4.0.0', true );
	wp_enqueue_script( 'isotope', get_theme_file_uri( '/assets/js/plugins/isotope.min.js'), array('jquery'), false, true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/plugins/magnific-popup.js', array( 'jquery' ), '1.1.0', true );
	wp_enqueue_script( 'inview', get_template_directory_uri() . '/assets/js/plugins/jquery.inview.min.js', array( 'jquery' ), $version, true );
	wp_enqueue_script( 'countTo', get_template_directory_uri() . '/assets/js/plugins/jquery.countTo.js', array( 'jquery' ), $version, true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/plugins/slick.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'select2', get_template_directory_uri() . '/assets/js/plugins/select2.min.js', array( 'jquery' ), '4.1.0', true );

	// Theme Scripts
	wp_enqueue_script( 'gautama-theme', get_template_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), $version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gautama_scripts', 10 );

/**
 * Enqueue the dynamic CSS
 *
 * @since 1.0.0
 */
function gautama_dynamic_css_sheet(){
	wp_enqueue_style( 'gautama-dynamic', get_template_directory_uri() . '/assets/css/dynamic.css', array() );

	// Theme options custom css
	$custom_dynamic_style = gautama_custom_dynamic_style();
	if( ! empty( $custom_dynamic_style ) ){
		wp_add_inline_style( 'gautama-dynamic', $custom_dynamic_style );
	}
}
add_action( 'wp_enqueue_scripts', 'gautama_dynamic_css_sheet', 30 );

/**
 * Enqueue scripts and styles for backend.
 *
 * @since 1.0.0
 */
function gautama_enqueue_scripts_admin( $hook ) {
	$theme_data = wp_get_theme();
	if ( is_child_theme() && is_object( $theme_data->parent() ) ) {
		$theme_data = wp_get_theme( $theme_data->parent()->template );
	}
	$version = $theme_data->get( 'Version' );
	wp_enqueue_style( 'v4-shims', get_template_directory_uri() . '/assets/fonts/css/v4-shims.min.css', array(), '5.11.2' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/fonts/css/font-awesome.min.css', array( 'v4-shims' ), '5.11.2' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/plugins/flaticon.css', array(), $version );
}
add_action( 'admin_enqueue_scripts', 'gautama_enqueue_scripts_admin' );
