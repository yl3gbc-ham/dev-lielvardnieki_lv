<?php

/**
 * Template part for displaying portfolio items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */

$portfolio_style = gautama_get_option('portfolio-style', 'style-1');
$portfolio_columns = gautama_get_option('portfolio-columns', 'col-lg-6');
?>

<div class="<?php echo esc_attr($portfolio_columns) ?> col-sm-12">
  <?php get_template_part( 'template-parts/portfolio/styles/' . $portfolio_style ); ?>
</div>
