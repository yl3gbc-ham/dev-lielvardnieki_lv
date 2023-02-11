<?php
/**
 * Template part for displaying post details
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
$blog_details_style = gautama_get_option('blog-details-style', 'style-2');
   get_template_part( 'template-parts/post/single/styles/' . $blog_details_style );
