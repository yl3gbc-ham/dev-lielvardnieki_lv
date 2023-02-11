<?php
/**
 * Wp bakery extended fields for inner row
 *
 * @package Sigma Core
 */

add_action( 'init', 'sigmacore_extend_vc_innner_row_fields', 99 );
if ( ! function_exists( 'sigmacore_extend_vc_innner_row_fields' ) ) {
	/**
	 * Inner row fields extend.
	 */
	function sigmacore_extend_vc_innner_row_fields() {
		$shortcode_fields  = vc_get_shortcode( 'vc_row_inner' );
		$design_options = array(
			array(
				'type'             => 'css_editor',
				'heading'          => esc_html__( 'CSS box for medium Devices', 'sigma-core' ),
				'param_name'       => 'inner_row_css_md',
				'group'            => esc_attr__( 'Design Options', 'sigma-core' ),
			),
			array(
				'type'             => 'css_editor',
				'heading'          => esc_html__( 'CSS box for small Devices', 'sigma-core' ),
				'param_name'       => 'inner_row_css_sm',
				'group'            => esc_attr__( 'Design Options', 'sigma-core' ),
			),
			array(
				'type'             => 'css_editor',
				'heading'          => esc_html__( 'CSS box for extra small Devices', 'sigma-core' ),
				'param_name'       => 'inner_row_css_xs',
				'group'            => esc_attr__( 'Design Options', 'sigma-core' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Background Color Scheme', 'sigma-core' ),
				'param_name'  => 'bg_color_scheme',
				'value'       => array(
					esc_html__( 'Primary Color', 'sigma-core' )   => 'primary',
					esc_html__( 'Secondary Color', 'sigma-core' ) => 'secondary',
					esc_html__( 'Tertiary Color', 'sigma-core' )  => 'tertiary',
					esc_html__( 'White', 'sigma-core' )           => 'white',
					esc_html__( 'Transparent', 'sigma-core' )     => 'transparent',
				),
				'std'         => 'transparent',
				'group'       => esc_attr__( 'Sigma Fields', 'sigma-core' ),
				'description' => esc_html__( 'Select the color scheme for background color. Color will apply from the color scheme theme options.', 'sigma-core' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Background Position', 'sigma-core' ),
				'param_name'  => 'bg_position',
				'value'       => array(
					esc_html__( 'Left Top', 'sigma-core' )      => 'left-top',
					esc_html__( 'Left Center', 'sigma-core' )   => 'left-center',
					esc_html__( 'Left Bottom', 'sigma-core' )   => 'left-bottom',
					esc_html__( 'Center Top', 'sigma-core' )    => 'center-top',
					esc_html__( 'Center Center', 'sigma-core' ) => 'center-center',
					esc_html__( 'Center Bottom', 'sigma-core' ) => 'center-bottom',
					esc_html__( 'Right Top', 'sigma-core' )     => 'right-top',
					esc_html__( 'Right Center', 'sigma-core' )  => 'right-center',
					esc_html__( 'Right Bottom', 'sigma-core' )  => 'right-bottom',
				),
				'group'       => esc_attr__( 'Sigma Fields', 'sigma-core' ),
				'description' => esc_html__( 'Select the background position.', 'sigma-core' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Title Color Scheme', 'sigma-core' ),
				'param_name'  => 'title_color_scheme',
				'value'       => array(
					esc_html__( 'Default', 'sigma-core' ) => 'default',
					esc_html__( 'Light', 'sigma-core' ) => 'light',
				),
				'group'       => esc_attr__( 'Sigma Fields', 'sigma-core' ),
				'description' => esc_html__( 'Select the color scheme for section title.', 'sigma-core' ),
			),
		);

		$shortcode_fields['params'] = array_merge(
			$shortcode_fields['params'],
			$design_options
		);

		unset( $shortcode_fields['base'] );
		
		// Update the inner row fields with the extend ones.
		vc_map_update( 'vc_row_inner', $shortcode_fields );

	}
}
