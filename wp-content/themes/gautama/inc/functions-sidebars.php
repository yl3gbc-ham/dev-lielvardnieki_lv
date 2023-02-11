<?php
/**
 * Gautama Sidebars
 *
 * @package Gautama
 */
 if ( ! defined( 'ABSPATH' ) ) {
 	exit;
 }
/**
 * Register widget area.
 *
 * @since 1.0.0
 */
function gautama_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'gautama' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Blog Sidebar.', 'gautama' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	// Footer sidebars.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer column 1', 'gautama' ),
			'id'            => 'footer-column-1',
			'description'   => esc_html__( 'Add widgets here.', 'gautama' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer column 2', 'gautama' ),
			'id'            => 'footer-column-2',
			'description'   => esc_html__( 'Add widgets here.', 'gautama' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer column 3', 'gautama' ),
			'id'            => 'footer-column-3',
			'description'   => esc_html__( 'Add widgets here.', 'gautama' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer column 4', 'gautama' ),
			'id'            => 'footer-column-4',
			'description'   => esc_html__( 'Add widgets here.', 'gautama' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Page Sidebar', 'gautama' ),
			'id'            => 'page-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'gautama' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Portfolio Sidebar', 'gautama' ),
			'id'            => 'portfolio-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'gautama' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
  register_sidebar(
		array(
			'name'          => esc_html__( 'Sermons Sidebar', 'gautama' ),
			'id'            => 'sermons-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'gautama' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
  register_sidebar(
		array(
			'name'          => esc_html__( 'Event Sidebar', 'gautama' ),
			'id'            => 'event-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'gautama' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
  register_sidebar(
		array(
			'name'          => esc_html__( 'Ministries Sidebar', 'gautama' ),
			'id'            => 'ministries-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'gautama' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
  register_sidebar(
    array(
      'name'          => esc_html__( 'Service Sidebar', 'gautama' ),
      'id'            => 'service-sidebar',
      'description'   => esc_html__( 'Add widgets here.', 'gautama' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h6 class="widget-title">',
      'after_title'   => '</h6>',
    )
  );
	register_sidebar(
		array(
			'name'          => esc_html__( 'Header Collapse Sidebar', 'gautama' ),
			'id'            => 'header-collapse-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'gautama' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
}
add_action( 'widgets_init', 'gautama_widgets_init' );
/**
 * Functiion that generates the template class
 *
 * @since 1.0.0
 */
function gautama_grid_column_classes() {
	$sidebar_position = 'right-sidebar';
	$current_sidebar  = gautama_get_current_sidebar();
  $sidebar_position = gautama_sidebar_position();
	if ( is_active_sidebar( $current_sidebar ) ) {
		if ( 'left-sidebar' === $sidebar_position ) {
			$grid_classes = 'col-lg-8 order-lg-2';
		} elseif ( 'right-sidebar' === $sidebar_position ) {
			$grid_classes = 'col-lg-8';
		} else {
			$grid_classes = 'col-12';
		}
	} else {
		$grid_classes = 'col-12';
	}
	return apply_filters( 'gautama/sidebar/grid_classes', $grid_classes );
}
/**
 * Get the current sidebar.
 *
 * @since 1.0.0
 */
function gautama_get_current_sidebar() {
	$sidebar_position = gautama_sidebar_position();
	if ( 'full-width' === $sidebar_position ) {
		return false;
	}
	if ( is_page() ) {
		$current_sidebar = 'page-sidebar';
	} elseif ( is_search() ) {
		$current_sidebar = 'sidebar-1';
	}  elseif ( is_singular( 'portfolio' ) || is_post_type_archive('portfolio') ) {
		$current_sidebar = 'portfolio-sidebar';
	} elseif ( is_singular( 'event' ) || is_post_type_archive('event') ) {
		$current_sidebar = 'event-sidebar';
	} elseif ( is_singular( 'sermons' ) || is_post_type_archive('sermons') ) {
		$current_sidebar = 'sermons-sidebar';
	} elseif ( is_singular( 'ministries' ) || is_post_type_archive('ministries') ) {
		$current_sidebar = 'ministries-sidebar';
	} elseif ( is_singular( 'give_forms' ) || is_post_type_archive('give_forms') ) {
        $current_sidebar = 'give-forms-sidebar';
    } elseif ( is_singular( 'service' ) || is_post_type_archive('service') ) {
		$current_sidebar = 'service-sidebar';
	} elseif ( is_home() || is_archive() || is_singular( 'post' ) ) {
		$current_sidebar = 'sidebar-1';
	} else {
		$current_sidebar = 'sidebar-1';
	}
	return apply_filters( 'gautama/sidebar/current_sidebar', $current_sidebar );
}
/**
 * Get the current sidebar position.
 *
 * @since 1.0.0
 */
function gautama_sidebar_position() {
  // Current page ID
	$current_id = gautama_get_page_id();
  // Possible sidebar positions
  $avaiable_sidebar_positions = array('full-width', 'left-sidebar', 'right-sidebar');
  // Page meta
	$page_settings = $current_id ? get_post_meta( $current_id, 'sigma_page_settings', true ) : '';
	$sidebar_custom_position = isset( $page_settings['sigma_page_sidebar_position'] ) ? $page_settings['sigma_page_sidebar_position'] : '';
  // Default sidebar position value
  $sidebar_position = 'right-sidebar';
  if(in_array($sidebar_custom_position, $avaiable_sidebar_positions)){
    $sidebar_position = $sidebar_custom_position;
  }else{
    if ( is_page() ) {
  		$sidebar_position = gautama_get_option('page_sidebar', $sidebar_position);
  	} elseif ( is_search() ) {
  		$sidebar_position = 'right-sidebar';
  	} elseif ( is_singular( 'portfolio' ) || is_post_type_archive('portfolio') ) {
	     $sidebar_position = gautama_get_option('portfolio_sidebar', $sidebar_position);
    }  elseif ( is_singular( 'event' ) || is_post_type_archive('event') ) {
	     $sidebar_position = gautama_get_option('event_sidebar', $sidebar_position);
    }  elseif ( is_singular( 'sermons' ) || is_post_type_archive('sermons') ) {
	     $sidebar_position = gautama_get_option('sermons_sidebar', $sidebar_position);
    }  elseif ( is_singular( 'ministries' ) || is_post_type_archive('ministries') ) {
	     $sidebar_position = gautama_get_option('ministries_sidebar', $sidebar_position);
    }  elseif ( is_singular( 'give_forms' )  || is_post_type_archive('give_forms')  ) {
        $sidebar_position = gautama_get_option('donation_sidebar', $sidebar_position);
    }  elseif ( is_singular( 'service' ) || is_post_type_archive('service') ) {
	     $sidebar_position = gautama_get_option('service_sidebar', $sidebar_position);
    } elseif ( is_home() || is_archive() || is_singular( 'post' ) ) {
  		$sidebar_position = gautama_get_option('blog_sidebar', $sidebar_position);
  	}
  }
	return apply_filters( 'gautama/sidebar/sidebar_position', $sidebar_position );
}
