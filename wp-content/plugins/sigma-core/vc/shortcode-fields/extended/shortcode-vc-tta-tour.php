<?php
/**
 * Wp bakery extended fields for inner column
 *
 * @package Sigma Core
 */
add_action( 'init', 'sigmacore_extend_vc_tta_tour_fields', 99 );
if ( ! function_exists( 'sigmacore_extend_vc_tta_tour_fields' ) ) {
	function sigmacore_extend_vc_tta_tour_fields() {
		$shortcode_fields = vc_get_shortcode( 'vc_tta_tour' );
		$sigma_tta_tour   = array(
      array(
        'type'             => 'dropdown',
				'param_name'       => 'custom-style',
				'heading'          => esc_html__( 'Style', 'sigma-core' ),
				'description'      => esc_html__( 'Select a style (Note: Selecting this overrides all options selected from the General Tab).', 'sigma-core' ),
				'value'            => array(
          esc_html__( 'Default', 'sigma-core' ) => 'default',
					esc_html__( 'Border', 'sigma-core' ) => 'border',
					esc_html__( 'Square', 'sigma-core' )   => 'square',
				),
        'group'      => esc_attr__( 'Sigma Fields', 'sigma-core' ),
      )
		);
		$shortcode_fields['params'] = array_merge(
			$shortcode_fields['params'],
			$sigma_tta_tour
		);
		unset( $shortcode_fields['base'] );
		// Update the inner column fields with the extend ones.
		vc_map_update( 'vc_tta_tour', $shortcode_fields );
	}
}

/**
 * Wp bakery extended classes for vc_tta_tour
 *
 * @package Sigma Core
 */
function sigmacore_extend_vc_tta_tour_classes($class_string, $tag, $atts){
  if($tag === 'vc_tta_tour'){
    $custom_style = isset($atts['custom-style']) ? $atts['custom-style'] : 'default';
    if($custom_style == 'default'){
			$class_string .= esc_attr('sigma-tour-'.$custom_style);
		}else{
			$class_string = esc_attr('vc_general vc_tta vc_tta-tabs vc_tta-o-no-fill');
			$class_string .= esc_attr(' sigma-tour-'.$custom_style);
		}
  }
  return $class_string;
}
add_filter('vc_shortcodes_css_class', 'sigmacore_extend_vc_tta_tour_classes', 10, 3);
