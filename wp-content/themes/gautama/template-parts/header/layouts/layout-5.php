<?php
/**
 * Template part for header layout 1.
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

      // Contact info
      get_template_part( 'template-parts/header/elements/contact-info' );

      // Site logo
      get_template_part( 'template-parts/header/elements/logo' );

      // Controls
      get_template_part( 'template-parts/header/elements/controls' );

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
<?php } ?>

<div class="site-header-bottom">
  <div class="container">
    <div class="site-header-bottom-inner">

      <?php
      // Vertical Menu
      get_template_part( 'template-parts/header/elements/vertical-megamenu' );

      // Menu
      gautama_nav_menu();
      ?>

      <?php if(gautama_get_option('display-search-icon')){ ?>
      <div class="search-form-wrap">
        <?php get_search_form(); ?>
      </div>
      <?php } ?>

    </div>
  </div>
</div>
