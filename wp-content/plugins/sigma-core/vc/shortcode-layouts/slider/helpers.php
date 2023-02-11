<?php
/**
 * Slider layout helper functions
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the slick object of the slider layout.
 *
 * @param array $atts - The shortcode attributes
 *
 * @since 1.0.0
 */
function sigmacore_get_slider_layout_atts( $atts ){

  return array(
  	'autoplay'       => isset( $atts[ 'post_enable_slider_autoplay' ] ) ? (boolean) $atts[ 'post_enable_slider_autoplay' ] : false,
  	'infinite'      => isset( $atts[ 'post_enable_slider_loop' ] ) ? (boolean) $atts[ 'post_enable_slider_loop' ] : false,
  	'arrows'     =>		isset( $atts[ 'post_enable_arrow' ] ) ? (boolean) $atts[ 'post_enable_arrow' ] : false,
  	'speed'     =>		isset( $atts[ 'post_slider_speed' ] ) ? (int) $atts[ 'post_slider_speed' ] : 500,
  	'centerMode'     =>		isset( $atts[ 'post_enable_slider_centermode' ] ) ? (boolean) $atts[ 'post_enable_slider_centermode' ] : false,
  	'centerPadding'     =>		isset( $atts[ 'post_slider_centerpadding' ] ) ? (int) $atts[ 'post_slider_centerpadding' ] : '',
  	'autoplaySpeed'     =>		isset( $atts[ 'post_slider_autoplayspeed' ] ) ? (int) $atts[ 'post_slider_autoplayspeed' ] : '',
  	'dots'        => isset( $atts[ 'post_enable_navigation' ] ) ? (boolean) $atts[ 'post_enable_navigation' ] : false,
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

}

/**
 * Return the slider layout classes
 *
 * @param array $atts - The shortcode attributes
 *
 * @since 1.0.0
 */
function sigmacore_get_slider_layout_classes( $atts ){

	return 'arrows-'.$atts['post_slider_arrow_style'].' shortcode_slider ' . $atts['post_slider_arrow_position'] . ' dots-'.$atts['post_slider_dots_style'];

}

/**
 * Return the html content which goes before the slider.
 *
 * @param array $atts - The shortcode attributes
 *
 * @since 1.0.0
 */
function sigmacore_before_layout_slider( $atts ){

	$alignment = $atts['post_slider_arrow_position'] == 'arrows-top-left' ? 'text-right' : 'text-left';

	if(isset($atts['section_title']) && !empty($atts['section_title']) && $atts['post_slider_arrow_position'] != 'arrows-top-center' ) {
	?>
	<div class="section-heading">
		<div class="d-flex align-items-center">
			<div class="w-100 <?php echo esc_attr($alignment) ?>">
				<?php if($atts['section_title']){ ?>
				<div class="section-title">
					<?php if($atts['section_sub_title']){ ?>
					<span class="title-tag"><?php echo esc_html($atts['section_sub_title']); ?></span>
					<?php } ?>
					<h2><?php echo esc_html($atts['section_title']); ?></h2>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
	<?php
	}

}
