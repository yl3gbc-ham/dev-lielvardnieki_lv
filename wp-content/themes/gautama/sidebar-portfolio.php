<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gautama
 */
$current_sidebar = gautama_get_current_sidebar();
$sidebar_style = gautama_get_option('portfolio-sidebar-style', 'style-2');
if ( ! $current_sidebar || ! is_active_sidebar( $current_sidebar ) ) {
	return;
}
?>
<aside id="secondary" class="widget-area sidebar col-sm-12 col-md-12 col-lg-4 <?php echo esc_attr($sidebar_style); ?>">
	<?php
  do_action('before_portfolio_sidebar');
  dynamic_sidebar( $current_sidebar ); ?>
</aside><!-- #secondary -->
