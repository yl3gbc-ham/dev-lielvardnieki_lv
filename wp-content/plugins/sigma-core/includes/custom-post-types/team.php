<?php
/**
 * Register "team" custom post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type/
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @package Sigma Core
 */
if ( ! function_exists( 'sigmacore_register_cpt_team' ) ) {
	/**
	 * Function to Register "team" custom post type.
	 */
	function sigmacore_register_cpt_team() {
		$labels = array(
			'name'                  => esc_html__( 'Team', 'sigma-core' ),
			'singular_name'         => esc_html__( 'Team Member', 'sigma-core' ),
			'menu_name'             => esc_html__( 'Team', 'sigma-core' ),
			'name_admin_bar'        => esc_html__( 'Team Member', 'sigma-core' ),
			'add_new'               => esc_html__( 'Add New', 'sigma-core' ),
			'add_new_item'          => esc_html__( 'Add New Member', 'sigma-core' ),
			'new_item'              => esc_html__( 'New Member', 'sigma-core' ),
			'edit_item'             => esc_html__( 'Edit Member', 'sigma-core' ),
			'view_item'             => esc_html__( 'View Member', 'sigma-core' ),
			'all_items'             => esc_html__( 'All Members', 'sigma-core' ),
			'search_items'          => esc_html__( 'Search Member', 'sigma-core' ),
			'parent_item_colon'     => esc_html__( 'Parent Member:', 'sigma-core' ),
			'not_found'             => esc_html__( 'No Member found.', 'sigma-core' ),
			'not_found_in_trash'    => esc_html__( 'No Member found in Trash.', 'sigma-core' ),
			'featured_image'        => esc_html__( 'Member Image', 'sigma-core' ),
			'set_featured_image'    => esc_html__( 'Set Member Image', 'sigma-core' ),
			'remove_featured_image' => esc_html__( 'Remove Member Image', 'sigma-core' ),
			'use_featured_image'    => esc_html__( 'Use Member Image', 'sigma-core' ),
		);

		$cpt_team_args = array(
			'labels'             => $labels,
			'description'        => esc_html__( 'Description.', 'sigma-core' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'team' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
			'menu_icon'          => 'dashicons-groups',
		);

		$cpt_team_args = apply_filters( 'sigmacore_register_cpt_team', $cpt_team_args );

		register_post_type( 'team', $cpt_team_args );
	}
}

add_action( 'init', 'sigmacore_register_cpt_team' );

/**
 * Register 'team-category' taxonomy for post type 'team'.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
if ( ! function_exists( 'sigmacore_register_taxonomy_team_category' ) ) {
	/**
	 * Function to register team-category taxonomy.
	 */
	function sigmacore_register_taxonomy_team_category() {
		$labels = array(
			'name'                       => esc_html__( 'Team Categories', 'sigma-core' ),
			'singular_name'              => esc_html__( 'Team Category', 'sigma-core' ),
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

		$team_category_args = array(
			'hierarchical'          => true,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'public'                => true,
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'team-category' ),
		);

		$team_category_args = apply_filters( 'sigmacore_register_taxonomy_team_category', $team_category_args, 'team' );

		register_taxonomy( 'team-category', 'team', $team_category_args );
	}
}

add_action( 'init', 'sigmacore_register_taxonomy_team_category' );
