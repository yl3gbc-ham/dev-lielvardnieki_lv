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

<div class="row posts-slider-two justify-content-center">

  <?php
  while ( $the_query->have_posts() ) {
    $the_query->the_post();
    $post_thumbnail = get_the_post_thumbnail_url( get_the_id(), 'full' );
		$post_type = get_post_type( get_the_id() );

		$wrapper_class = $post_type == 'sigma-post';

		if($post_type == 'product'){
			$product = wc_get_product( get_the_id() );
			$id = $product->get_id();
		}

		$col_class1 = $post_type == 'product' || $post_type == 'col-12';

  ?>
  <div class="col-lg-6 <?php echo esc_attr($wrapper_class) ?>">
    <div class="single-posts-box">
      <div class="post-img">
        <div class="img" style="background-image: url(<?php echo esc_url($post_thumbnail) ?>);">
        </div>
      </div>
      <div class="post-desc">
        <div class="row align-items-center">
          <div class="<?php echo esc_attr($col_class1) ?>">

            <h3><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title(); ?></a></h3>

            <?php if(function_exists('gautama_custom_excerpt')){ ?>
            <p><?php echo gautama_custom_excerpt(20); ?></p>
            <?php } ?>

          </div>
					<?php if($post_type == 'product'){ ?>
          <div class="col-sm-4">
            <div class="price">
              <?php
							if($post_type == 'product'){

								echo $product->get_price_html();

							}
            	?>
            </div>
          </div>
					<?php } ?>

        </div>
      </div>
    </div>
  </div>
  <?php
  }
  wp_reset_postdata();
}else{
  echo esc_html__('No Posts Found', 'sigma-core');
}
?>

</div>
