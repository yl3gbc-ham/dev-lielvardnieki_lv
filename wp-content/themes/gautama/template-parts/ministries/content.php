<?php
/**
 * Template part for displaying ministries items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
$ministries_style = gautama_get_option('ministries-style', 'style-1');
$ministries_columns = gautama_get_option('ministries-columns', 'col-lg-6');
?>
<div class="<?php echo esc_attr($ministries_columns) ?> col-sm-12">
  <?php get_template_part( 'template-parts/ministries/styles/' . $ministries_style ); ?>
</div>
