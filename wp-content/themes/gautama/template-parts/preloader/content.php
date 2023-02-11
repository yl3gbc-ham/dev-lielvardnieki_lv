<?php

/**
 * Template part for displaying preloaders
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */


if( gautama_get_option('preloader_enable') ){
$preloader_style = gautama_get_option('preloader_style', 'default');
?>

<div class="sigma_preloader sigma_preloader-<?php echo esc_attr($preloader_style) ?>">
  <div class="sigma_preloader-inner">
    <?php get_template_part( 'template-parts/preloader/styles/' . $preloader_style ); ?>
  </div>
</div>
<?php } ?>
