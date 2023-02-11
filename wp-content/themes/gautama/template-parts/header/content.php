<?php
/**
 * Template part for header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
$header_layout = gautama_get_option('header-layout', 'layout-6');

?>

<!-- Site Header -->
<header class="site-header <?php echo esc_attr( gautama_header_classes() ); ?>">
	<?php get_template_part( 'template-parts/header/layouts/' . $header_layout ); ?>
</header>

<!-- Sticky Header -->
<?php if( gautama_get_option('sticky-header-enable') ){ ?>
<header class="site-header can-sticky <?php echo esc_attr( gautama_header_sticky_classes() ); ?>">
	<?php get_template_part( 'template-parts/header/layouts/' . $header_layout ); ?>
</header>
<?php } ?>

<?php
// Mobile Header
get_template_part( 'template-parts/header/elements/mobile-sidebar' );

// Collapse sidebar
if( gautama_get_option('display-collapse-sidebar-icon') && is_active_sidebar('header-collapse-sidebar') ){
	get_template_part( 'template-parts/header/elements/collapse-sidebar' );
}
?>
