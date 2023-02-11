<?php
/**
 * Register "portfolio" custom post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type/
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @package Sigma Core
 */
if ( ! function_exists( 'sigmacore_register_cpt_portfolio' ) ) {
	/**
	 * Function to Register "portfolio" custom post type.
	 */
	function sigmacore_register_cpt_portfolio() {
		$labels = array(
			'name'                  => esc_html__( 'Portfolio', 'sigma-core' ),
			'singular_name'         => esc_html__( 'Portfolio', 'sigma-core' ),
			'menu_name'             => esc_html__( 'Portfolio', 'sigma-core' ),
			'name_admin_bar'        => esc_html__( 'Portfolio', 'sigma-core' ),
			'add_new'               => esc_html__( 'Add New', 'sigma-core' ),
			'add_new_item'          => esc_html__( 'Add New Portfolio', 'sigma-core' ),
			'new_item'              => esc_html__( 'New Portfolio', 'sigma-core' ),
			'edit_item'             => esc_html__( 'Edit Portfolio', 'sigma-core' ),
			'view_item'             => esc_html__( 'View Portfolio', 'sigma-core' ),
			'all_items'             => esc_html__( 'All Portfolios', 'sigma-core' ),
			'search_items'          => esc_html__( 'Search Portfolio', 'sigma-core' ),
			'parent_item_colon'     => esc_html__( 'Parent Portfolio:', 'sigma-core' ),
			'not_found'             => esc_html__( 'No Portfolio found.', 'sigma-core' ),
			'not_found_in_trash'    => esc_html__( 'No Portfolio found in Trash.', 'sigma-core' ),
			'featured_image'        => esc_html__( 'Portfolio Image', 'sigma-core' ),
			'set_featured_image'    => esc_html__( 'Set Portfolio Image', 'sigma-core' ),
			'remove_featured_image' => esc_html__( 'Remove Portfolio Image', 'sigma-core' ),
			'use_featured_image'    => esc_html__( 'Use Portfolio Image', 'sigma-core' ),
		);

		$cpt_portfolio_args = array(
			'labels'             => $labels,
			'description'        => esc_html__( 'Description.', 'sigma-core' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'portfolio' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail' ),
			'menu_icon'          => 'dashicons-portfolio',
		);

		$cpt_portfolio_args = apply_filters( 'sigmacore_register_cpt_portfolio', $cpt_portfolio_args );

		register_post_type( 'portfolio', $cpt_portfolio_args );
	}
}

add_action( 'init', 'sigmacore_register_cpt_portfolio' );

/**
 * Register 'portfolio-category' taxonomy for post type 'portfolio'.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
if ( ! function_exists( 'sigmacore_register_taxonomy_portfolio_category' ) ) {
	/**
	 * Function to register portfolio-category taxonomy.
	 */
	function sigmacore_register_taxonomy_portfolio_category() {
		$labels = array(
			'name'                       => esc_html__( 'Portfolio Categories', 'sigma-core' ),
			'singular_name'              => esc_html__( 'Portfolio Category', 'sigma-core' ),
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

		$portfolio_category_args = array(
			'hierarchical'          => true,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'public'                => true,
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'portfolio-category' ),
		);

		$portfolio_category_args = apply_filters( 'sigmacore_register_taxonomy_portfolio_category', $portfolio_category_args, 'portfolio' );

		register_taxonomy( 'portfolio-category', 'portfolio', $portfolio_category_args );
	}
}

add_action( 'init', 'sigmacore_register_taxonomy_portfolio_category' );
