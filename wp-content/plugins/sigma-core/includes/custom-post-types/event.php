<?php
/**
 * Register "event" custom post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type/
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @package Sigma Core
 */
if ( ! function_exists( 'sigmacore_register_cpt_event' ) ) {
	/**
	 * Function to Register "event" custom post type.
	 */
	function sigmacore_register_cpt_event() {
		$labels = array(
			'name'                  => esc_html__( 'Event', 'sigma-core' ),
			'singular_name'         => esc_html__( 'Event', 'sigma-core' ),
			'menu_name'             => esc_html__( 'Event', 'sigma-core' ),
			'name_admin_bar'        => esc_html__( 'Event', 'sigma-core' ),
			'add_new'               => esc_html__( 'Add New', 'sigma-core' ),
			'add_new_item'          => esc_html__( 'Add New Event', 'sigma-core' ),
			'new_item'              => esc_html__( 'New Event', 'sigma-core' ),
			'edit_item'             => esc_html__( 'Edit Event', 'sigma-core' ),
			'view_item'             => esc_html__( 'View Event', 'sigma-core' ),
			'all_items'             => esc_html__( 'All Events', 'sigma-core' ),
			'search_items'          => esc_html__( 'Search Event', 'sigma-core' ),
			'parent_item_colon'     => esc_html__( 'Parent Event:', 'sigma-core' ),
			'not_found'             => esc_html__( 'No Event found.', 'sigma-core' ),
			'not_found_in_trash'    => esc_html__( 'No Event found in Trash.', 'sigma-core' ),
			'featured_image'        => esc_html__( 'Event Image', 'sigma-core' ),
			'set_featured_image'    => esc_html__( 'Set Event Image', 'sigma-core' ),
			'remove_featured_image' => esc_html__( 'Remove Event Image', 'sigma-core' ),
			'use_featured_image'    => esc_html__( 'Use Event Image', 'sigma-core' ),
		);
		$cpt_event_args = array(
			'labels'             => $labels,
			'description'        => esc_html__( 'Description.', 'sigma-core' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'event' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail' ),
			'menu_icon'          => 'dashicons-list-view',
		);
		$cpt_event_args = apply_filters( 'sigmacore_register_cpt_event', $cpt_event_args );
		register_post_type( 'event', $cpt_event_args );
	}
}
add_action( 'init', 'sigmacore_register_cpt_event' );
/**
 * Register 'event-category' taxonomy for post type 'event'.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
if ( ! function_exists( 'sigmacore_register_taxonomy_event_category' ) ) {
	/**
	 * Function to register event-category taxonomy.
	 */
	function sigmacore_register_taxonomy_event_category() {
		$labels = array(
			'name'                       => esc_html__( 'Event Categories', 'sigma-core' ),
			'singular_name'              => esc_html__( 'Event Category', 'sigma-core' ),
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
		$event_category_args = array(
			'hierarchical'          => true,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'public'                => true,
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'event-category' ),
		);
		$event_category_args = apply_filters( 'sigmacore_register_taxonomy_event_category', $event_category_args, 'event' );
		register_taxonomy( 'event-category', 'event', $event_category_args );
	}
}
add_action( 'init', 'sigmacore_register_taxonomy_event_category' );


/**
 * Register 'event-tag' taxonomy to post type 'event'.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
if ( ! function_exists( 'sigmacore_register_taxonomy_event_tag' ) ) {
	/**
	 * Function to register event-tag taxonomy.
	 */
	function sigmacore_register_taxonomy_event_tag() {

		$labels = array(
			'name'                       => esc_html__( 'Event Tags', 'sigma-core' ),
			'singular_name'              => esc_html__( 'Event Tag', 'sigma-core' ),
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

		$event_tag_args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'singular_name'     => esc_html__( 'Tag', 'sigma-core' ),
			'show_admin_column' => true,
			'rewrite'           => true,
			'query_var'         => true,
			'show_in_rest'      => true,
		);

		$event_tag_args = apply_filters( 'sigmacore_register_taxonomy_event_tag', $event_tag_args, 'event' );

		register_taxonomy( 'event-tag', 'event', $event_tag_args );
	}
}

add_action( 'init', 'sigmacore_register_taxonomy_event_tag' );
