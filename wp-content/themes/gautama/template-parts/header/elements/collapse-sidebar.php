<?php
/**
 * Template part for header social info.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
$sidebar_style = gautama_get_option('blog-sidebar-style', 'style-2');
if ( !gautama_get_option('display-collapse-sidebar-icon') ) {
	return;
}
$header_layout_class = gautama_get_option('header-layout', 'layout-1');
?>

<!-- Sidebar Navigation -->
<div class="aside-collapse desktop-aside <?php echo esc_attr($header_layout_class .'-style'); ?>">
	<button class="close-btn close-dark aside-trigger">
    <span></span>
		<span></span>
  </button>
	<div class="aside-inner widget-area sidebar <?php echo esc_attr($sidebar_style); ?>">
		<?php
		if(is_active_sidebar('header-collapse-sidebar')) {
			dynamic_sidebar('header-collapse-sidebar');
		}
		?>
	</div>
</div>
<div class="aside-overlay aside-trigger"></div>
