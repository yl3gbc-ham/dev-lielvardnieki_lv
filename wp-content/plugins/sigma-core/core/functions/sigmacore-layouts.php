<?php
/**
 * File responsible for layouts functionality.
 *
 * @package Sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

 /**
  * Create new post type for managing layouts
  *
  * @since 1.0.0
  */
function sigmacore_register_cpt_layouts(){

	$labels = array(
		'name' 					=> esc_html__('Page Layouts','sigma-core'),
		'singular_name' 		=> esc_html__('Page Layout','sigma-core'),
		'add_new'				=> esc_html__('Add New','sigma-core'),
		'add_new_item' 			=> esc_html__('Add New Page Layout','sigma-core'),
		'edit_item' 			=> esc_html__('Edit Page Layout','sigma-core'),
		'new_item' 				=> esc_html__('New Page Layout','sigma-core'),
		'view_item' 			=> esc_html__('View Page Layout','sigma-core'),
		'search_items' 			=> esc_html__('Search Page Layouts','sigma-core'),
		'not_found' 			=> esc_html__('No page layouts found','sigma-core'),
		'not_found_in_trash'	=> esc_html__('No page layouts found in Trash','sigma-core'),
		'parent_item_colon' 	=> '',
	);

	$cpt_layouts_args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'show_in_rest'       => true,
		'rewrite'            => array( 'slug' => 'layout_manager' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor' ),
		'menu_icon'				=> 'dashicons-welcome-widgets-menus',
	);

  $cpt_layouts_args = apply_filters( 'sigmacore_register_cpt_layouts', $cpt_layouts_args );

	register_post_type( 'layouts', $cpt_layouts_args );

}
add_action( 'init', 'sigmacore_register_cpt_layouts' );

/**
 * Returns all user generated layouts
 *
 * @since 1.0.0
 */
function sigmacore_get_page_layouts(){

  $layouts = array( 0 => esc_html__('Theme Defaults (From Theme Options)', 'sigma-core') );

  $args = array(
    'post_type' => 'layouts',
    'posts_per_page'=> -1,
  );
  $layout_posts = get_posts( $args );

  if( is_array( $layout_posts ) ){
    foreach ( $layout_posts as $layout ){
      $layouts[$layout->ID] = $layout->post_title;
    }
  }

  return $layouts;

}
