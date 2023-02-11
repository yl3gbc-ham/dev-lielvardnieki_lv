<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */

$blog_style = gautama_get_option('blog-style', 'style-6');
$blog_columns = gautama_get_option('blog-columns', 'col-lg-12');
?>

<div class="<?php echo esc_attr($blog_columns) ?>">
  <?php get_template_part( 'template-parts/post/styles/' . $blog_style ); ?>
</div>
