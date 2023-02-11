<?php
/**
 * Wp bakery extended fields for vc icon
 *
 * @package Sigma Core
 */

add_action( 'init', 'sigmacore_extend_vc_icon', 99 );
if ( ! function_exists( 'sigmacore_extend_vc_icon' ) ) {
	function sigmacore_extend_vc_icon() {
		$shortcode_fields     = vc_get_shortcode( 'vc_icon' );
		$shortcode_fields_new = $shortcode_fields['params'];

		$design_options[] = array(
			'type'             => 'iconpicker',
			'heading'          => esc_html__( 'Icon', 'sigma-core' ),
			'param_name'       => 'flaticon',
				'settings'   => array(
					'emptyIcon'    => false,
					'iconsPerPage' => 500,
					'type' => 'flaticon',
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'pe_icon_7_stroke',
			),
			'description'      => esc_html__( 'Select icon from library.', 'sigma-core' ),
			'edit_field_class' => 'vc_col-sm-6 vc_column vc_column-with-padding',
		);

		unset( $shortcode_fields['params'] );

		array_splice( $shortcode_fields_new, 1, 0, $design_options );

		$shortcode_fields['params'] = array_merge(
			$shortcode_fields_new,
			$design_options
		);

		foreach ( $shortcode_fields['params'] as $key => $shortcode ) {
			if ( isset( $shortcode['param_name'] ) && 'type' === $shortcode['param_name'] ) {
				$shortcode_fields['params'][ $key ]['value'][ esc_html__( 'Pe Icon', 'sigma-core' ) ] = 'pe_icon_7_stroke';
			}
		}

		unset( $shortcode_fields['base'] );

		// Update the inner row fields with the extend ones.
		vc_map_update( 'vc_icon', $shortcode_fields );

	}
}
