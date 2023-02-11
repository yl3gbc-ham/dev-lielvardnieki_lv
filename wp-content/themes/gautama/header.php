<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gautama
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php get_template_part( 'template-parts/preloader/content'); ?>

<div id="page" class="site">

	<!-- Page Template Before Header --->
		<?php echo get_the_page_template( 'page_template_before_header', 'enable_page_template_before_header' ); ?>

	<?php get_template_part( 'template-parts/header/content' ); ?>

	<!-- Page Template After Header --->
	<?php echo get_the_page_template( 'page_template_after_header', 'enable_page_template_after_header' ); ?>

	<div id="content" class="site-content">

		<?php get_template_part( 'template-parts/subheader/content'); ?>
