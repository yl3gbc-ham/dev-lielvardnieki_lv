<?php
/**
 * Template part for displaying sermons items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
$sermons_style = gautama_get_option('sermons-style', 'style-1');
$sermons_columns = gautama_get_option('sermons-columns', 'col-lg-6');
?>
<div class="<?php echo esc_attr($sermons_columns) ?> col-sm-12">
  <?php get_template_part( 'template-parts/sermons/styles/' . $sermons_style ); ?>
</div>
