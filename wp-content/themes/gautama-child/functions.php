<?php
//
// Recommended way to include parent theme styles.
//  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
//

add_action( 'wp_enqueue_scripts', 'gautama_child_enqueue_styles' );
function gautama_child_enqueue_styles() {

    $parent_style = 'gautama-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'gautama-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
// Your code goes below
//
