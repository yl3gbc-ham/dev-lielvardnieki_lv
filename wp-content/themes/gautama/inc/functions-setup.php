<?php
/**
* Gautama Theme setup functions
*
* @package Gautama
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get the available image sizes for the theme.
 *
 * @since 1.0.0
 */
function gautama_theme_image_sizes(){

	$image_sizes = array(
		'gautama-portfolio'	=> array(
			'width'  => 600,
			'height'	=> 700,
			'title' => esc_html__( 'Portfolio Image', 'gautama' ),
			'crop'	=>	true
		),
		'gautama-portfolio-vertical'	=> array(
			'width'  => 380,
			'height'	=> 564,
			'title' => esc_html__( 'Portfolio Vertical Image', 'gautama' ),
			'crop'	=>	true
		),
		'gautama-blog'	=> array(
			'width'  => 600,
			'height'	=> 420,
			'title' => esc_html__( 'Blog Image', 'gautama' ),
			'crop'	=>	true
		),
		'gautama-team'	=> array(
			'width'  => 600,
			'height'	=> 645,
			'title' => esc_html__( 'Team Image', 'gautama' ),
			'crop'	=>	true
		),
		'gautama-product'	=> array(
			'width'  => 360,
			'height'	=> 440,
			'title' => esc_html__( 'Product Image', 'gautama' ),
			'crop'	=>	true
		),
		'gautama-event'	=> array(
			'width'  => 420,
			'height'	=> 630,
			'title' => esc_html__( 'Event Image', 'gautama' ),
			'crop'	=>	true
		),
	);

	return apply_filters( 'gautama/image_sizes', $image_sizes );

}
/**
 * Adjust the names of the theme thumb sizes using the 'image_size_names_choose' filter.
 *
 * @since 1.0.0
 */
function gautama_theme_thumb_size_names( $sizes ) {

	$image_sizes = gautama_theme_image_sizes();
	$retina_mult = gautama_get_retina_multiplier();

	foreach ( $image_sizes as $key => $val ) {
		$sizes[ $key ] = $val['title'];
		if ( $retina_mult > 1 ) {
			$sizes[ $key . '-@retina' ] = $val['title'] . ' ' . esc_html__( '@2x', 'gautama' );
		}
	}

	return $sizes;

}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since 1.0.0
 */
function gautama_setup() {

	$GLOBALS['content_width'] = apply_filters( 'gautama_content_width', 640 );

	// Make theme available for translation.
	load_theme_textdomain( 'gautama', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Autogenerate title tag
	add_theme_support( 'title-tag' );

	//Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', array() );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for core custom logo.
	add_theme_support( 'custom-logo',
		array(
			'width'       => 250,
			'height'      => 80,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	// Add WooCommerce support
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	// Gutenberg support
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );

	// Register the theme's nav menus
	register_nav_menus(
		array(
			'primary-menu' => esc_html__( 'Primary Menu', 'gautama' ),
			'mobile-menu' => esc_html__( 'Mobile Menu', 'gautama' ),
			'top-menu' => esc_html__( 'Top Header Menu', 'gautama' ),
			'menu-left' => esc_html__( 'Left Menu (Header Layout 3)', 'gautama' ),
			'menu-right' => esc_html__( 'Right Menu (Header Layout 3)', 'gautama' ),
		)
	);

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Add Image sizes
	$image_sizes = gautama_theme_image_sizes();
	$retina_mult = gautama_get_retina_multiplier();

	foreach ( $image_sizes as $key => $val ) {

		add_image_size( $key, $val['width'], $val['height'], $val['crop'] );

		// Retina Image sizes
		if ( $retina_mult > 1 ) {
			add_image_size( $key . '-@retina', $val['width'] * $retina_mult, $val['height'] * $retina_mult, $val['crop'] );
		}

	}
	// Add new thumb names
	add_filter( 'image_size_names_choose', 'gautama_theme_thumb_size_names' );

}
add_action( 'after_setup_theme', 'gautama_setup' );
