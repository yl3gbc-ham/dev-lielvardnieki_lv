<?php

/**
 * Template part for displaying services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */

$team_style = gautama_get_option('team-style', 'style-1');
$team_columns = gautama_get_option('team-columns', 'col-lg-6');

?>

<div class="<?php echo esc_attr($team_columns) ?> col-md-6 col-sm-12">
  <?php get_template_part( 'template-parts/team/styles/' . $team_style ); ?>
</div>
