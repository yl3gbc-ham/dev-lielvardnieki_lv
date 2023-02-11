<?php
/**
 * Template part for displaying event items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
$event_style = gautama_get_option('event-style', 'style-1');
$event_columns = gautama_get_option('event-columns', 'col-lg-6');
?>
<div class="<?php echo esc_attr($event_columns) ?> col-sm-12">
  <?php get_template_part( 'template-parts/event/styles/' . $event_style ); ?>
</div>
