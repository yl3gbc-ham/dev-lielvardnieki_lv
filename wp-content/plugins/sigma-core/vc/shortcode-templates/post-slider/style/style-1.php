<?php
/**
 * Blog shortcode gird layout file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) { // Or some other WordPress constant
	exit;
}
global $sigma_shortcodes;
$atts        = $sigma_shortcodes[ 'sigma_post_slider' ][ 'atts' ];
$the_query   = $sigma_shortcodes[ 'sigma_post_slider' ][ 'the_query' ];

if( $the_query->have_posts() ) {
?>

<div class="container-fluid p-0">
  <div class="row posts-slider-one">

    <?php
    while ( $the_query->have_posts() ) {
  		$the_query->the_post();
      $post_thumbnail = get_the_post_thumbnail_url( get_the_id(), 'full' );
      ?>
    <div class="col">
      <div class="slider-img" style="background-image: url(<?php echo esc_url($post_thumbnail) ?>);"> </div>
    </div>
    <?php } ?>

  </div>
</div>

<div class="posts-content-wrap">
  <div class="container">
    <div class="row justify-content-center justify-content-md-start">
      <div class="col-xl-4 col-lg-5 col-sm-8">
        <div class="post-content-box">

          <div class="slider-count"></div>
          <div class="slider-count-big"></div>

          <div class="post-content-slider">

            <?php
            while ( $the_query->have_posts() ) {
          		$the_query->the_post();
              ?>
            <div class="single-content">

              <?php
							if ( $atts[ 'icon_type' ] ) {
								$icon_type = 'icon_' . $atts[ 'icon_type' ];
								vc_icon_element_fonts_enqueue( $atts[ 'icon_type' ] );
								if ( isset( $atts[ $icon_type ] ) && $atts[ $icon_type ] ) {
									?>
									<div class="icon"><i class="<?php echo esc_attr( $atts[ $icon_type ] ); ?>"></i></div>
									<?php
								}
							}
							?>

              <h3><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title(); ?></a></h3>

              <?php if(function_exists('gautama_custom_excerpt')){ ?>
              <p><?php echo gautama_custom_excerpt(10); ?></p>
              <?php } ?>

            </div>
            <?php } ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
wp_reset_postdata();
}else{
  echo esc_html__('No Posts Found', 'sigma-core');
}
?>
