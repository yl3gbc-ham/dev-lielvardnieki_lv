<?php
/**
 * Basic slider shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_basic_slider' ][ 'atts' ];
if ( ! $atts['slide_list'] ) {
	return;
}
$slick_options = array(
	'autoplay'       => isset( $atts[ 'post_enable_slider_autoplay' ] ) ? (boolean) $atts[ 'post_enable_slider_autoplay' ] : false,
	'infinite'      => isset( $atts[ 'post_enable_slider_loop' ] ) ? (boolean) $atts[ 'post_enable_slider_loop' ] : false,
	'speed'     =>		isset( $atts[ 'post_slider_speed' ] ) ? (int) $atts[ 'post_slider_speed' ] : 500,
  'arrows'   => isset( $atts[ 'post_enable_arrow' ] ) ? (boolean) $atts[ 'post_enable_arrow' ] : false,
	'autoplaySpeed'     =>		isset( $atts[ 'post_slider_autoplayspeed' ] ) ? (int) $atts[ 'post_slider_autoplayspeed' ] : '',
	'dots'        =>   false,
	'slidesToShow'       =>  isset( $atts[ 'post_slider_responsive_lg' ] ) ? (int) $atts[ 'post_slider_responsive_lg' ] : 4,
	'slidesToScroll' => isset( $atts[ 'post_slider_scroll' ] ) ? (int) $atts[ 'post_slider_scroll' ] : 1,
	'responsive' => array(
		array(
			'breakpoint' => 1800,
			'settings'  => array(
				'slidesToShow' => isset( $atts[ 'post_slider_responsive_xl' ] ) ? (int) $atts[ 'post_slider_responsive_xl' ] : 4,
			),
		),
		array(
			'breakpoint' => 1400,
			'settings'  => array(
				'slidesToShow' => isset( $atts[ 'post_slider_responsive_lg' ] ) ? (int) $atts[ 'post_slider_responsive_lg' ] : 3,
			),
		),
		array(
			'breakpoint' => 992,
			'settings'  => array(
				'slidesToShow' =>  isset( $atts[ 'post_slider_responsive_md' ] ) ? (int) $atts[ 'post_slider_responsive_md' ] : 2,
			),
		),
		array(
			'breakpoint' => 768,
			'settings'  => array(
				'slidesToShow' =>  isset( $atts[ 'post_slider_responsive_sm' ] ) ? (int) $atts[ 'post_slider_responsive_sm' ] : 2,
			),
		),
		array(
			'breakpoint' => 576,
			'settings'  => array(
				'slidesToShow' =>  isset( $atts[ 'post_slider_responsive_xs' ] ) ? (int) $atts[ 'post_slider_responsive_xs' ] : 1,
			),
		),
	)
);
$slide_lists = vc_param_group_parse_atts( $atts['slide_list'] );
?>
<div class="basic-dot-slider shortcode_slider" data-slick="<?php echo esc_attr( json_encode( $slick_options ) ); ?>">
  <?php foreach ( $slide_lists as $slide_list ) { ?>
  <div class="slide-item">
    <p class="mb-30"><?php echo esc_html($slide_list['description']); ?></p>
  </div>
<?php } ?>
</div>
