<?php
/**
 * Register "sermons" custom post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type/
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @package Sigma Core
 */
if ( ! function_exists( 'sigmacore_register_cpt_sermons' ) ) {
	/**
	 * Function to Register "sermons" custom post type.
	 */
	function sigmacore_register_cpt_sermons() {
		$labels = array(
			'name'                  => esc_html__( 'Sermons', 'sigma-core' ),
			'singular_name'         => esc_html__( 'Sermons', 'sigma-core' ),
			'menu_name'             => esc_html__( 'Sermons', 'sigma-core' ),
			'name_admin_bar'        => esc_html__( 'Sermons', 'sigma-core' ),
			'add_new'               => esc_html__( 'Add New', 'sigma-core' ),
			'add_new_item'          => esc_html__( 'Add New Sermons', 'sigma-core' ),
			'new_item'              => esc_html__( 'New Sermons', 'sigma-core' ),
			'edit_item'             => esc_html__( 'Edit Sermons', 'sigma-core' ),
			'view_item'             => esc_html__( 'View Sermons', 'sigma-core' ),
			'all_items'             => esc_html__( 'All Sermons', 'sigma-core' ),
			'search_items'          => esc_html__( 'Search Sermons', 'sigma-core' ),
			'parent_item_colon'     => esc_html__( 'Parent Sermons:', 'sigma-core' ),
			'not_found'             => esc_html__( 'No Sermons found.', 'sigma-core' ),
			'not_found_in_trash'    => esc_html__( 'No Sermons found in Trash.', 'sigma-core' ),
			'featured_image'        => esc_html__( 'Sermons Image', 'sigma-core' ),
			'set_featured_image'    => esc_html__( 'Set Sermons Image', 'sigma-core' ),
			'remove_featured_image' => esc_html__( 'Remove Sermons Image', 'sigma-core' ),
			'use_featured_image'    => esc_html__( 'Use Sermons Image', 'sigma-core' ),
		);
		$cpt_sermons_args = array(
			'labels'             => $labels,
			'description'        => esc_html__( 'Description.', 'sigma-core' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'sermons' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail' ),
			'menu_icon'          => 'dashicons-image-filter',
		);
		$cpt_sermons_args = apply_filters( 'sigmacore_register_cpt_sermons', $cpt_sermons_args );
		register_post_type( 'sermons', $cpt_sermons_args );
	}
}
add_action( 'init', 'sigmacore_register_cpt_sermons' );
/**
 * Register 'sermons-category' taxonomy for post type 'sermons'.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
if ( ! function_exists( 'sigmacore_register_taxonomy_sermons_category' ) ) {
	/**
	 * Function to register sermons-category taxonomy.
	 */
	function sigmacore_register_taxonomy_sermons_category() {
		$labels = array(
			'name'                       => esc_html__( 'Sermons Categories', 'sigma-core' ),
			'singular_name'              => esc_html__( 'Sermons Category', 'sigma-core' ),
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
		$sermons_category_args = array(
			'hierarchical'          => true,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'public'                => true,
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'sermons-category' ),
		);
		$sermons_category_args = apply_filters( 'sigmacore_register_taxonomy_sermons_category', $sermons_category_args, 'sermons' );
		register_taxonomy( 'sermons-category', 'sermons', $sermons_category_args );
	}
}
add_action( 'init', 'sigmacore_register_taxonomy_sermons_category' );


/**
 * Register 'sermons-tag' taxonomy to post type 'sermons'.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
if ( ! function_exists( 'sigmacore_register_taxonomy_sermons_tag' ) ) {
	/**
	 * Function to register sermons-tag taxonomy.
	 */
	function sigmacore_register_taxonomy_sermons_tag() {

		$labels = array(
			'name'                       => esc_html__( 'Sermons Tags', 'sigma-core' ),
			'singular_name'              => esc_html__( 'Sermons Tag', 'sigma-core' ),
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

		$sermons_tag_args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'singular_name'     => esc_html__( 'Tag', 'sigma-core' ),
			'show_admin_column' => true,
			'rewrite'           => true,
			'query_var'         => true,
			'show_in_rest'      => true,
		);

		$sermons_tag_args = apply_filters( 'sigmacore_register_taxonomy_sermons_tag', $sermons_tag_args, 'sermons' );

		register_taxonomy( 'sermons-tag', 'sermons', $sermons_tag_args );
	}
}

add_action( 'init', 'sigmacore_register_taxonomy_sermons_tag' );
