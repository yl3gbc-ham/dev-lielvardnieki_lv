<?php
/**
 * Gautama functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Gautama
 */
function sigmacore_woo_custom_pages( $pages ){
	$pages = [];
	return $pages;
   }
   add_filter('woocommerce_create_pages', 'sigmacore_woo_custom_pages');

 // Theme utility functions
 require get_template_directory() . '/inc/functions-utilities.php';

// Theme Setup
require get_template_directory() . '/inc/functions-setup.php';

// Theme Scripts/Styles
require get_template_directory() . '/inc/functions-scripts.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Social Media Functions
require get_template_directory() . '/inc/functions-social.php';

// Dynamic Css
require get_template_directory() . '/inc/color-customizer.php';

// Subheader Functions
require get_template_directory() . '/inc/functions-subheader.php';

// Sidebar Functions
require get_template_directory() . '/inc/functions-sidebars.php';

// WooCommerce Functions
require get_template_directory() . '/inc/functions-woocommerce.php';

// Load theme options.
require get_template_directory() . '/inc/redux-options/redux-config.php';

// TGM plugin activation.
require get_template_directory() . '/inc/tgm-plugin-activation/required-plugin.php';

/*========================
CUSTOM WALKERS
========================*/

// Comment walker.
require get_template_directory() . '/classes/class-gautama-walker-comment.php';

// Category Widget walker.
require get_template_directory() . '/classes/class-gautama-walker-category.php';
