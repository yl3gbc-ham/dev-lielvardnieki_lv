<?php
/**
 * Wp bakery extended fields for vc button
 *
 * @package Sigma Core
 */

add_action( 'init', 'sigmacore_extend_vc_btn', 99 );
if ( ! function_exists( 'sigmacore_extend_vc_btn' ) ) {
	function sigmacore_extend_vc_btn() {
		$shortcode_fields = vc_get_shortcode( 'vc_btn' );

		foreach ( $shortcode_fields['params'] as $key => $shortcode ) {
			if ( isset( $shortcode['param_name'] ) && 'gradient_color_1' === $shortcode['param_name'] ) {
				$shortcode_fields['params'][ $key ]['value'][ esc_html__( 'Primary Color', 'sigma-core' ) ]   = 'primary';
				$shortcode_fields['params'][ $key ]['value'][ esc_html__( 'Secondary Color', 'sigma-core' ) ] = 'secondary';
				$shortcode_fields['params'][ $key ]['value'][ esc_html__( 'Tertiary Color', 'sigma-core' ) ]  = 'tertiary';
			}
			if ( isset( $shortcode['param_name'] ) && 'gradient_color_2' === $shortcode['param_name'] ) {
				$shortcode_fields['params'][ $key ]['value'][ esc_html__( 'Primary Color', 'sigma-core' ) ]   = 'primary';
				$shortcode_fields['params'][ $key ]['value'][ esc_html__( 'Secondary Color', 'sigma-core' ) ] = 'secondary';
				$shortcode_fields['params'][ $key ]['value'][ esc_html__( 'Tertiary Color', 'sigma-core' ) ]  = 'tertiary';
			}
			if ( isset( $shortcode['param_name'] ) && 'color' === $shortcode['param_name'] ) {
				$shortcode_fields['params'][ $key ]['value'][ esc_html__( 'Primary Color', 'sigma-core' ) ]   = 'primary';
				$shortcode_fields['params'][ $key ]['value'][ esc_html__( 'Secondary Color', 'sigma-core' ) ] = 'secondary';
				$shortcode_fields['params'][ $key ]['value'][ esc_html__( 'Tertiary Color', 'sigma-core' ) ]  = 'tertiary';
			}
		}

		unset( $shortcode_fields['base'] );

		// Update the inner row fields with the extend ones.
		vc_map_update( 'vc_btn', $shortcode_fields );

	}
}
