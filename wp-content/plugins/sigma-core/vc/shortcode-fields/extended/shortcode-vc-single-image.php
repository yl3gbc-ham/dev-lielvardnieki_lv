<?php
/**
 * Wp bakery extended fields for inner column
 *
 * @package Sigma Core
 */
add_action( 'init', 'sigmacore_extend_vc_single_image_fields', 99 );
if ( ! function_exists( 'sigmacore_extend_vc_single_image_fields' ) ) {
	function sigmacore_extend_vc_single_image_fields() {
		$shortcode_fields = vc_get_shortcode( 'vc_single_image' );
		$sigma_single_image   = array(
      array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Zoom on Hover', 'sigma-core' ),
				'param_name'  => 'zoom_hover',
				'description' => esc_html__( 'Enable to add zoom effect on image hover .', 'sigma-core' ),
        'group'      => esc_attr__( 'Sigma Fields', 'sigma-core' ),
			)
    );
		$shortcode_fields['params'] = array_merge(
			$shortcode_fields['params'],
			$sigma_single_image
		);
		unset( $shortcode_fields['base'] );
		// Update the inner column fields with the extend ones.
		vc_map_update( 'vc_single_image', $shortcode_fields );
	}
}

/**
 * Wp bakery extended classes for vc_single_image
 *
 * @package Sigma Core
 */
function sigmacore_extend_vc_single_image_classes($class_string, $tag, $atts){
  if($tag === 'vc_single_image'){
    $custom_style = isset($atts['zoom_hover']) && $atts['zoom_hover'] == 'true' ? 'zoom_hover_effect' : '';
    $class_string .= esc_attr('sigma-image-'.$custom_style);
  }
  return $class_string;
}
add_filter('vc_shortcodes_css_class', 'sigmacore_extend_vc_single_image_classes', 10, 3);
