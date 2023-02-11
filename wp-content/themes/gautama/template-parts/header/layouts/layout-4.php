<?php
/**
 * Template part for header layout 3.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */

?>

<?php if( gautama_get_option('display_top_header') ){ ?>
<div class="site-header-top">
  <div class="container">
    <div class="site-header-top-inner">

      <?php

      // Social media
      if( gautama_get_option('display_top_sm') ){
        get_template_part( 'template-parts/header/elements/social-info' );
      }

      // Top Menu
      if( gautama_get_option('display_top_menu') ){
        gautama_nav_menu('top-menu');
      }

      ?>

    </div>
  </div>
</div>
<?php } ?>

<div class="site-header-bottom">
  <div class="container">
    <div class="site-header-bottom-inner">

      <?php if( gautama_get_option('display-collapse-sidebar-icon') && is_active_sidebar('header-collapse-sidebar') ){ ?>

      <!-- Side hamburger button -->
      <div class="burger-icon aside-trigger">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <?php } ?>

      <?php

    	gautama_nav_menu('menu-left');

      // Site logo
      get_template_part( 'template-parts/header/elements/logo' );

      gautama_nav_menu('menu-right');

      ?>

    	<!-- Mobile Aside trigger -->
    	<div class="burger-icon aside-m-trigger">
        <span></span>
        <span></span>
        <span></span>
      </div>

    </div>
  </div>
</div>
