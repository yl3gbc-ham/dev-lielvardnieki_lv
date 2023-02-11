<?php
/**
 * Template part for displaying service items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
$service_style = gautama_get_option('service-style', 'style-1');
$service_columns = gautama_get_option('service-columns', 'col-lg-6');
?>
<div class="<?php echo esc_attr($service_columns) ?> col-sm-12">
  <?php get_template_part( 'template-parts/service/styles/' . $service_style ); ?>
</div>
