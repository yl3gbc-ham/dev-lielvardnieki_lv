<?php

/**
 * Register metafields for portfolio.
 *
 * @package Sigma Core
 */
function sigmacore_portfolio_settings_metafields() {
	add_meta_box( 'sigma_portfolio_details', esc_html__( 'Portfolio Details', 'sigma-core' ), 'sigmacore_portfolio_settings_metafields_callback', 'portfolio', 'side' );
}
add_action( 'add_meta_boxes', 'sigmacore_portfolio_settings_metafields', 2 );

/**
 * portfolio meta fields display callback.
 *
 * @param WP_Post $post Current post object.
 */

function sigmacore_portfolio_settings_metafields_callback( $post ) {

	global $post;

	wp_nonce_field( basename( __FILE__ ), 'sigma-portfolio-meta-nonce' );

	// Field values
	$portfolio_details        = get_post_meta( $post->ID, 'sigma_portfolio_details', true );
	$sigma_portfolio_client_name = isset( $portfolio_details['sigma_portfolio_client_name'] ) ? $portfolio_details['sigma_portfolio_client_name'] : '';
	$sigma_portfolio_location    = isset( $portfolio_details['sigma_portfolio_location'] ) ? $portfolio_details['sigma_portfolio_location'] : '';
	$sigma_portfolio_year        = isset( $portfolio_details['sigma_portfolio_year'] ) ? $portfolio_details['sigma_portfolio_year'] : '';
	$sigma_portfolio_cta_btn_title_1 = isset( $portfolio_details['sigma_portfolio_btn_title_1'] ) ? $portfolio_details['sigma_portfolio_btn_title_1'] : '';
	$sigma_portfolio_cta_btn_link_1 = isset( $portfolio_details['sigma_portfolio_btn_link_1'] ) ? $portfolio_details['sigma_portfolio_btn_link_1'] : '';
	$sigma_portfolio_cta_btn_title_2 = isset( $portfolio_details['sigma_portfolio_btn_title_2'] ) ? $portfolio_details['sigma_portfolio_btn_title_2'] : '';
	$sigma_portfolio_cta_btn_link_2 = isset( $portfolio_details['sigma_portfolio_btn_link_2'] ) ? $portfolio_details['sigma_portfolio_btn_link_2'] : '';

	// All metafields
	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_portfolio_client_name',
		'title'	=>	__('Client Name', 'sigma-core'),
		'description'	=>	__('Enter the Client name', 'sigma-core'),
		'value'	=>	$sigma_portfolio_client_name
	]);
	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_portfolio_location',
		'title'	=>	__('Project Name', 'sigma-core'),
		'description'	=>	__('Enter the Project name', 'sigma-core'),
		'value'	=>	$sigma_portfolio_location
	]);
	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_portfolio_year',
		'title'	=>	__('Date', 'sigma-core'),
		'description'	=>	__('Enter the project date', 'sigma-core'),
		'value'	=>	$sigma_portfolio_year
	]);
	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_portfolio_btn_title_1',
		'title'	=>	__('Widget CTA Button 1 Title', 'sigma-core'),
		'description'	=>	__('Enter the title for call to action button 1', 'sigma-core'),
		'value'	=>	$sigma_portfolio_cta_btn_title_1
	]);
	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_portfolio_btn_link_1',
		'title'	=>	__('Widget CTA Button 1 Link', 'sigma-core'),
		'description'	=>	__('Enter the link for call to action button 1', 'sigma-core'),
		'value'	=>	$sigma_portfolio_cta_btn_link_1
	]);
	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_portfolio_btn_title_2',
		'title'	=>	__('Widget CTA Button 2 Title', 'sigma-core'),
		'description'	=>	__('Enter the title for call to action button 2', 'sigma-core'),
		'value'	=>	$sigma_portfolio_cta_btn_title_2
	]);
	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_portfolio_btn_link_2',
		'title'	=>	__('Widget CTA Button 2 Link', 'sigma-core'),
		'description'	=>	__('Enter the link for call to action button 2', 'sigma-core'),
		'value'	=>	$sigma_portfolio_cta_btn_link_2
	]);

}

/**
 * Save portfolio fields content.
 *
 * @param int $post_id Post ID.
 */
function sigmacore_portfolio_settings_save_meta_box( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_posts' ) ) {
		return;
	}
	if ( ! isset( $_POST['sigma-portfolio-meta-nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sigma-portfolio-meta-nonce'] ) ), basename( __FILE__ ) ) ) {
		return;
	}

	// Fields to be saved
	$portfolio_details                           = array();
	$portfolio_details['sigma_portfolio_client_name'] = isset( $_POST['sigma_portfolio_client_name'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_portfolio_client_name'] ) ) : '';
	$portfolio_details['sigma_portfolio_location']    = isset( $_POST['sigma_portfolio_location'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_portfolio_location'] ) ) : '';
	$portfolio_details['sigma_portfolio_year']        = isset( $_POST['sigma_portfolio_year'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_portfolio_year'] ) ) : '';
	$portfolio_details['sigma_portfolio_btn_title_1']        = isset( $_POST['sigma_portfolio_btn_title_1'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_portfolio_btn_title_1'] ) ) : '';
	$portfolio_details['sigma_portfolio_btn_link_1']        = isset( $_POST['sigma_portfolio_btn_link_1'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_portfolio_btn_link_1'] ) ) : '';
	$portfolio_details['sigma_portfolio_btn_title_2']        = isset( $_POST['sigma_portfolio_btn_title_2'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_portfolio_btn_title_2'] ) ) : '';
	$portfolio_details['sigma_portfolio_btn_link_2']        = isset( $_POST['sigma_portfolio_btn_link_2'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_portfolio_btn_link_2'] ) ) : '';

	update_post_meta( $post_id, 'sigma_portfolio_details', $portfolio_details );

}
add_action( 'save_post', 'sigmacore_portfolio_settings_save_meta_box' );
