<?php
/**
 * Register "service" custom post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type/
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @package Sigma Core
 */
if ( ! function_exists( 'sigmacore_register_cpt_service' ) ) {
	/**
	 * Function to Register "service" custom post type.
	 */
	function sigmacore_register_cpt_service() {
		$labels = array(
			'name'                  => esc_html__( 'Services', 'sigma-core' ),
			'singular_name'         => esc_html__( 'Service', 'sigma-core' ),
			'menu_name'             => esc_html__( 'Services', 'sigma-core' ),
			'name_admin_bar'        => esc_html__( 'Service', 'sigma-core' ),
			'add_new'               => esc_html__( 'Add New', 'sigma-core' ),
			'add_new_item'          => esc_html__( 'Add New Service', 'sigma-core' ),
			'new_item'              => esc_html__( 'New Service', 'sigma-core' ),
			'edit_item'             => esc_html__( 'Edit Service', 'sigma-core' ),
			'view_item'             => esc_html__( 'View Service', 'sigma-core' ),
			'all_items'             => esc_html__( 'All Service', 'sigma-core' ),
			'search_items'          => esc_html__( 'Search Service', 'sigma-core' ),
			'parent_item_colon'     => esc_html__( 'Parent Service:', 'sigma-core' ),
			'not_found'             => esc_html__( 'No service found.', 'sigma-core' ),
			'not_found_in_trash'    => esc_html__( 'No service found in Trash.', 'sigma-core' ),
			'featured_image'        => esc_html__( 'Service Image', 'sigma-core' ),
			'set_featured_image'    => esc_html__( 'Set Service Image', 'sigma-core' ),
			'remove_featured_image' => esc_html__( 'Remove Service Image', 'sigma-core' ),
			'use_featured_image'    => esc_html__( 'Use Service Image', 'sigma-core' ),
		);

		$cpt_service_args = array(
			'labels'             => $labels,
			'description'        => esc_html__( 'Description.', 'sigma-core' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'show_in_rest'       => true,
			'rewrite'            => array( 'slug' => 'service' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail' ),
			'menu_icon'          => 'dashicons-welcome-write-blog',
		);

		$cpt_service_args = apply_filters( 'sigmacore_register_cpt_service', $cpt_service_args );

		register_post_type( 'service', $cpt_service_args );
	}
}

add_action( 'init', 'sigmacore_register_cpt_service' );

/**
 * Register 'service-category' taxonomy for post type 'service'.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
if ( ! function_exists( 'sigmacore_register_taxonomy_service_category' ) ) {
	/**
	 * Function to register service-category taxonomy.
	 */
	function sigmacore_register_taxonomy_service_category() {
		$labels = array(
			'name'                       => esc_html__( 'Service Categories', 'sigma-core' ),
			'singular_name'              => esc_html__( 'Service Category', 'sigma-core' ),
			'search_items'               => esc_html__( 'Search Categories', 'sigma-core' ),
			'popular_items'              => esc_html__( 'Popular Categories', 'sigma-core' ),
			'all_items'                  => esc_html__( 'All Categories', 'sigma-core' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => esc_html__( 'Edit Category', 'sigma-core' ),
			'update_item'                => esc_html__( 'Update Category', 'sigma-core' ),
			'add_new_item'               => esc_html__( 'Add New Category', 'sigma-core' ),
			'new_item_name'              => esc_html__( 'New Category Name', 'sigma-core' ),
			'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'sigma-core' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove Categories', 'sigma-core' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used Categories', 'sigma-core' ),
			'not_found'                  => esc_html__( 'No categories found.', 'sigma-core' ),
			'menu_name'                  => esc_html__( 'Categories', 'sigma-core' ),
		);

		$service_category_args = array(
			'hierarchical'          => true,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'public'                => true,
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'service-category' ),
			'show_in_rest'          => true,
		);

		$service_category_args = apply_filters( 'sigmacore_register_taxonomy_service_category', $service_category_args, 'service' );

		register_taxonomy( 'service-category', 'service', $service_category_args );
	}
}

add_action( 'init', 'sigmacore_register_taxonomy_service_category' );


/**
 * Register 'service-tag' taxonomy to post type 'service'.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
if ( ! function_exists( 'sigmacore_register_taxonomy_service_tag' ) ) {
	/**
	 * Function to register service-tag taxonomy.
	 */
	function sigmacore_register_taxonomy_service_tag() {

		$labels = array(
			'name'                       => esc_html__( 'Service Tags', 'sigma-core' ),
			'singular_name'              => esc_html__( 'Service Tag', 'sigma-core' ),
			'search_items'               => esc_html__( 'Search Tags', 'sigma-core' ),
			'popular_items'              => esc_html__( 'Popular Tags', 'sigma-core' ),
			'all_items'                  => esc_html__( 'All Tags', 'sigma-core' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => esc_html__( 'Edit Tag', 'sigma-core' ),
			'update_item'                => esc_html__( 'Update Tag', 'sigma-core' ),
			'add_new_item'               => esc_html__( 'Add New Tag', 'sigma-core' ),
			'new_item_name'              => esc_html__( 'New Tag Name', 'sigma-core' ),
			'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'sigma-core' ),
			'menu_name'                  => esc_html__( 'Tags', 'sigma-core' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove Tag', 'sigma-core' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used Categories', 'sigma-core' ),
		);

		$service_tag_args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'singular_name'     => esc_html__( 'Tag', 'sigma-core' ),
			'show_admin_column' => true,
			'rewrite'           => true,
			'query_var'         => true,
			'show_in_rest'      => true,
		);

		$service_tag_args = apply_filters( 'sigmacore_register_taxonomy_service_tag', $service_tag_args, 'service' );

		register_taxonomy( 'service-tag', 'service', $service_tag_args );
	}
}

add_action( 'init', 'sigmacore_register_taxonomy_service_tag' );
