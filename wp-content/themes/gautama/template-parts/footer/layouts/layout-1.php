<?php

/**
 * Template part for footer layout 1.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */

$copyright_right = gautama_get_option('copyright_text_right');
$copyright_left = gautama_get_option('copyright_text_left');
?>

<?php if( gautama_get_option('display-footer-topbar') ){ ?>

  <div class="footer-top">

    <div class="container">

      <div class="row align-items-center">

        <div class="col-sm-4">

          <div class="logo text-center text-sm-left">

          <?php gautama_get_site_logo('footer-logo', false); ?>

          </div>

        </div>

        <div class="col-sm-8">

        <?php

          if( gautama_get_option('display-footer-social-links') ){

          $social_infos = gautama_get_option('social_infos', '');

        ?>

          <div class="social-icon text-center text-sm-right">

          <?php

          if (is_array($social_infos) || is_object($social_infos)) {

          foreach ( $social_infos as $social_info ) {

            if ( gautama_get_option($social_info . '_link') ) { ?>

            <a href="<?php echo esc_url(gautama_get_option($social_info . '_link')) ?>"><i class="fab fa-<?php echo esc_attr( $social_info ); ?>"></i></a>

          <?php } } } ?>

          </div>

        <?php } ?>

        </div>

      </div>

    </div>

  </div>

  <?php } ?>

  <?php get_sidebar( 'footer' ); ?>

  <?php if($copyright_left || $copyright_right){ ?>
  <div class="sigma-copyright">

    <div class="container">

      <div class="footer-copyright-section">

        <div class="footer-left">

          <?php
          if ( $copyright_left ) {
            echo wp_kses( $copyright_left, array(
              'a' =>  array(
                'href'  =>  array(),
                'title' =>  array()
              ),
              'p'
            ));
          }
          ?>

        </div>

        <div class="footer-right">

          <?php
          if ( $copyright_right ) {
            echo wp_kses( $copyright_right, array(
              'a' =>  array(
                'href'  =>  array(),
                'title' =>  array()
              ),
              'p'
            ));
          }
          ?>

        </div>

      </div>

    </div>

  </div>
  <?php } ?>
