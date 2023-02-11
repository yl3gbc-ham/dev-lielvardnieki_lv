<?php
/**
 * Register "testimonial" custom post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type/
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @package Sigma Core
 */
if ( ! function_exists( 'sigmacore_register_cpt_testimonial' ) ) {
	/**
	 * Function to Register "testimonial" custom post type.
	 */
	function sigmacore_register_cpt_testimonial() {
		$labels = array(
			'name'                  => esc_html__( 'Testimonials', 'sigma-core' ),
			'singular_name'         => esc_html__( 'Testimonial', 'sigma-core' ),
			'menu_name'             => esc_html__( 'Testimonials', 'sigma-core' ),
			'name_admin_bar'        => esc_html__( 'Testimonials', 'sigma-core' ),
			'add_new'               => esc_html__( 'Add New', 'sigma-core' ),
			'add_new_item'          => esc_html__( 'Add New Testimonial', 'sigma-core' ),
			'new_item'              => esc_html__( 'New Testimonial', 'sigma-core' ),
			'edit_item'             => esc_html__( 'Edit Testimonial', 'sigma-core' ),
			'view_item'             => esc_html__( 'View Testimonial', 'sigma-core' ),
			'all_items'             => esc_html__( 'All Testimonials', 'sigma-core' ),
			'search_items'          => esc_html__( 'Search Testimonials', 'sigma-core' ),
			'parent_item_colon'     => esc_html__( 'Parent Testimonial:', 'sigma-core' ),
			'not_found'             => esc_html__( 'No Testimonials found.', 'sigma-core' ),
			'not_found_in_trash'    => esc_html__( 'No Testimonials found in Trash.', 'sigma-core' ),
			'featured_image'        => esc_html__( 'Testimonial Image', 'sigma-core' ),
			'set_featured_image'    => esc_html__( 'Set Testimonial Image', 'sigma-core' ),
			'remove_featured_image' => esc_html__( 'Remove Testimonial Image', 'sigma-core' ),
			'use_featured_image'    => esc_html__( 'Use Testimonial Image', 'sigma-core' ),
		);

		$cpt_testimonial_args = array(
			'labels'             => $labels,
			'description'        => esc_html__( 'Description.', 'sigma-core' ),
			'public'             => true,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'testimonial' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'thumbnail', 'excerpt' ),
			'menu_icon'          => 'dashicons-businessman',
		);

		$cpt_testimonial_args = apply_filters( 'sigmacore_register_cpt_testimonial', $cpt_testimonial_args );

		register_post_type( 'testimonial', $cpt_testimonial_args );
	}
}

add_action( 'init', 'sigmacore_register_cpt_testimonial' );

/**
 * Register 'testimonial-category' taxonomy for post type 'testimonial'.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
if ( ! function_exists( 'sigmacore_register_taxonomy_testimonial_category' ) ) {
	/**
	 * Function to register testimonial-category taxonomy.
	 */
	function sigmacore_register_taxonomy_testimonial_category() {
		$labels = array(
			'name'                       => esc_html__( 'Testimonial Categories', 'sigma-core' ),
			'singular_name'              => esc_html__( 'Testimonial Category', 'sigma-core' ),
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

		$testimonial_category_args = array(
			'hierarchical'          => true,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'public'                => true,
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'testimonial-category' ),
		);

		$testimonial_category_args = apply_filters( 'sigmacore_register_taxonomy_testimonial_category', $testimonial_category_args, 'testimonial' );

		register_taxonomy( 'testimonial-category', 'testimonial', $testimonial_category_args );
	}
}

add_action( 'init', 'sigmacore_register_taxonomy_testimonial_category' );
