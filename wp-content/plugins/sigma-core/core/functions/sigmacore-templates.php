<?php
/**
 * File responsible for sigma_templates functionality.
 *
 * @package Sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Adds sigma_templates CPT
 */
add_action( 'init', 'sigmacore_register_cpt_sigma_templates' );

add_action( 'wp_enqueue_scripts', 'sigmacore_enqueue_templates_scripts', 99 );

/**
 * Register "sigma_templates" custom post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type/
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @package Sigma Core
 */
function sigmacore_register_cpt_sigma_templates() {
	$labels = array(
		'name'                  => esc_html__( 'Templates', 'sigma-core' ),
		'singular_name'         => esc_html__( 'Template', 'sigma-core' ),
		'menu_name'             => esc_html__( 'Templates', 'sigma-core' ),
		'name_admin_bar'        => esc_html__( 'Template', 'sigma-core' ),
		'add_new'               => esc_html__( 'Add New', 'sigma-core' ),
		'add_new_item'          => esc_html__( 'Add New Template', 'sigma-core' ),
		'new_item'              => esc_html__( 'New Template', 'sigma-core' ),
		'edit_item'             => esc_html__( 'Edit Template', 'sigma-core' ),
		'view_item'             => esc_html__( 'View Template', 'sigma-core' ),
		'all_items'             => esc_html__( 'All Templates', 'sigma-core' ),
		'search_items'          => esc_html__( 'Search Template', 'sigma-core' ),
		'parent_item_colon'     => esc_html__( 'Parent Template:', 'sigma-core' ),
		'not_found'             => esc_html__( 'No Template found.', 'sigma-core' ),
		'not_found_in_trash'    => esc_html__( 'No Template found in Trash.', 'sigma-core' ),
		'featured_image'        => esc_html__( 'Template Image', 'sigma-core' ),
		'set_featured_image'    => esc_html__( 'Set Template Image', 'sigma-core' ),
		'remove_featured_image' => esc_html__( 'Remove Template Image', 'sigma-core' ),
		'use_featured_image'    => esc_html__( 'Use Template Image', 'sigma-core' ),
	);

	$cpt_sigma_templates_args = array(
		'labels'             => $labels,
		'description'        => esc_html__( 'Description.', 'sigma-core' ),
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'show_in_rest'       => true,
		'rewrite'            => array( 'slug' => 'sigma-templates' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor' ),
		'menu_icon'          => 'dashicons-media-text',
	);

	$cpt_sigma_templates_args = apply_filters( 'sigmacore_register_cpt_sigma_templates', $cpt_sigma_templates_args );

	register_post_type( 'sigma_templates', $cpt_sigma_templates_args );
}

/**
 * Adds the required scripts and styles to run the templates.
 *
 * @since 1.0.0
 */
function sigmacore_enqueue_templates_scripts(){

	wp_enqueue_style( 'sigma-templates', trailingslashit( SIGMACORE_URL ) . 'core/assets/sigma-templates.css', array() );

}

/**
* Adds template specific VC shortcodes
 *
 * @since 1.0.0
 *
 * @return string $shortcodes List of shortcodes
*/
function sigmacore_templates_vc_shortcode( $shortcodes ){

	$shortcodes[] = trailingslashit( SIGMACORE_PATH ) . 'core/vc/shortcode-fields/class-sigma-vc-footer-menu.php';
	$shortcodes[] = trailingslashit( SIGMACORE_PATH ) . 'core/vc/shortcode-fields/class-sigma-vc-social-links.php';
	$shortcodes[] = trailingslashit( SIGMACORE_PATH ) . 'core/vc/shortcode-fields/class-sigma-vc-subheader-title.php';
	$shortcodes[] = trailingslashit( SIGMACORE_PATH ) . 'core/vc/shortcode-fields/class-sigma-vc-subheader-breadcrumb.php';

	return $shortcodes;

}
add_filter('sigmacore/shortcodes', 'sigmacore_templates_vc_shortcode');
