<?php

/**
 * Template part for footer layout 1.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */


 $copyright_left = gautama_get_option('copyright_text_left');
?>

<?php if( gautama_get_option('display-footer-topbar') ){ ?>

  <div class="footer-top">

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">

          <div class="logo">

            <?php gautama_get_site_logo('footer-logo', false); ?>

          </div>

          <?php if( gautama_get_option('footer_newsletter_text') ){ ?>
            <p> <?php echo esc_html(gautama_get_option('footer_newsletter_text')) ?> </p>
          <?php } ?>

          <?php
          if( gautama_get_option('footer_newsletter_shortcode') ){
            echo do_shortcode( gautama_get_option('footer_newsletter_shortcode') );
          }
          ?>

        </div>
      </div>
    </div>

  </div>

  <?php }?>

  <?php get_sidebar( 'footer' ); ?>

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

            if( gautama_get_option('display-footer-social-links') ){

            $social_infos = gautama_get_option('social_infos');

          ?>

            <div class="social-icon text-center">

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
