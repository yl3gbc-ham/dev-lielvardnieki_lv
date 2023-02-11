<?php
/**
 * Template part for header layout 6.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
?>
<?php if( gautama_get_option('display_top_header') ){ ?>
<div class="site-header-top">
  <div class="container-fluid">
    <div class="site-header-top-inner">
      <?php
      // Contact info
      get_template_part( 'template-parts/header/elements/contact-info' );
      // Top Menu
      if( gautama_get_option('display_top_menu') ){
        gautama_nav_menu('top-menu');
      }
      if( gautama_get_option('display_top_cta_btn') ){
        get_template_part('template-parts/header/elements/button');
      }
      ?>
    </div>
  </div>
</div>
<?php } ?>
<div class="site-header-bottom">
    <div class="site-header-bottom-inner">
      <?php
      // Site logo
      get_template_part( 'template-parts/header/elements/logo' );
    	gautama_nav_menu();
      ?>
      <?php
      // Controls
      get_template_part( 'template-parts/header/elements/controls' );
      ?>
      <?php if( gautama_get_option('display-collapse-sidebar-icon') && is_active_sidebar('header-collapse-sidebar') ){ ?>
      <!-- Side hamburger button -->
      <div class="sigma_header-controls">
        <ul class="sigma_header-controls-inner">
              <!-- Desktop Toggler -->
              <li class="aside-toggler style-2 aside-trigger-right desktop-toggler aside-trigger">
                <span></span>
                <span></span>
                <span></span>
              </li>

              <!-- Mobile Toggler -->
              <li class="aside-toggler style-2 aside-trigger-left aside-m-trigger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
              </li>
            </ul>
      </div>
      <?php } ?>
    </div>
</div>
