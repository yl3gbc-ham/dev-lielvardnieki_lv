<?php
/**
 * Ministries shortcode isotope shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts        = $sigma_shortcodes[ 'sigma_ministries' ][ 'atts' ];
$number_post = isset($atts['post_per_page']) && !empty($atts['post_per_page']) ? $atts['post_per_page'] : 3;
$taxonomy    = 'ministries-category';
$cpt         = 'ministries';

if ( !$atts['isotope_list_items'] ) {
	return;
}

$list_items = vc_param_group_parse_atts( $atts['isotope_list_items'] );
?>

<div class="row <?php echo esc_attr( $atts['isotope_style'] ) ?> sigma_post-filter <?php echo esc_attr($atts['isotope_alignment']) ?>">
  <?php sigmacore_isotope_categories_markup( $atts, $list_items, $taxonomy ); ?>
</div>

<div class="row sigma_post-filter-items posts">
  <?php

  $classes = sigmacore_get_grid_layout_classes($atts);

  $args = array(
    'ignore_sticky_posts' => 1,
    'post_type' => $cpt,
    'posts_per_page' => $number_post,
  );
  $the_query = new WP_Query( $args );
  if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) :
      $the_query->the_post();
			$terms = wp_get_object_terms( get_the_ID(), $taxonomy, array( 'fields' => 'slugs' ) );
			$tab_filter_class = !empty($terms) ? implode(" ", $terms) : '';
       ?>
       <div class="<?php echo esc_attr( $classes .' '.$tab_filter_class); ?>">
         <?php sigmacore_get_vc_shortcode_template( 'ministries/styles/' . $atts[ 'style' ] ); ?>
       </div>
       <?php
    endwhile;
    wp_reset_postdata();
  endif;
  ?>
</div>
