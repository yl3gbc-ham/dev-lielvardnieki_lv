<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Gautama
 */

get_header();

$page_type = gautama_get_option('404_type', 'static');

get_template_part( 'template-parts/404/content', $page_type );

get_footer();
