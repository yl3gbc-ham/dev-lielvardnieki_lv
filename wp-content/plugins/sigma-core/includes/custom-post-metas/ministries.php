<?php
/**
 * Register metafields for ministries.
 *
 * @package Sigma Core
 */
function sigmacore_ministries_settings_metafields() {
	add_meta_box( 'sigma_ministries_details', esc_html__( 'Ministries Details', 'sigma-core' ), 'sigmacore_ministries_settings_metafields_callback', 'ministries', 'side' );
}
add_action( 'add_meta_boxes', 'sigmacore_ministries_settings_metafields', 2 );
/**
 * ministries meta fields display callback.
 *
 * @param WP_Post $post Current post object.
 */
function sigmacore_ministries_settings_metafields_callback( $post ) {
	global $post;
	wp_nonce_field( basename( __FILE__ ), 'sigma-ministries-meta-nonce' );
	// Field values
	$ministries_details        = get_post_meta( $post->ID, 'sigma_ministries_details', true );
  $sigma_ministries_cta_title_1 = isset( $ministries_details['sigma_ministries_cta_title_1'] ) ? $ministries_details['sigma_ministries_cta_title_1'] : '';
  $sigma_ministries_cta_link_1 = isset( $ministries_details['sigma_ministries_cta_link_1'] ) ? $ministries_details['sigma_ministries_cta_link_1'] : '';
  $sigma_ministries_cta_title_2 = isset( $ministries_details['sigma_ministries_cta_title_2'] ) ? $ministries_details['sigma_ministries_cta_title_2'] : '';
  $sigma_ministries_cta_link_2 = isset( $ministries_details['sigma_ministries_cta_link_2'] ) ? $ministries_details['sigma_ministries_cta_link_2'] : '';
  $sigma_ministries_socials_icon  = isset( $ministries_details['sigma_ministries_socials_icon'] ) ? $ministries_details['sigma_ministries_socials_icon'] : '';
	// All metafields
	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_ministries_cta_widget_title',
		'title'	=>	__('Call To Action Widget Title', 'sigma-core'),
		'description'	=>	__('Enter the widget title for call to action widget', 'sigma-core'),
		'value'	=>	$sigma_ministries_cta_widget_title
	]);
	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_ministries_cta_title_1',
		'title'	=>	__('CTA Button 1 Title', 'sigma-core'),
		'description'	=>	__('Enter the title for call to action button 1', 'sigma-core'),
		'value'	=>	$sigma_ministries_cta_title_1
	]);
	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_ministries_cta_link_1',
		'title'	=>	__('CTA Button 1 Link', 'sigma-core'),
		'description'	=>	__('Enter the link for call to action button 1', 'sigma-core'),
		'value'	=>	$sigma_ministries_cta_link_1
	]);
  sigmacore_custom_metafield([
    'type'	=>	'text',
    'name'	=>	'sigma_ministries_cta_title_2',
    'title'	=>	__('CTA Button 2 Title', 'sigma-core'),
    'description'	=>	__('Enter the title for call to action button 2', 'sigma-core'),
    'value'	=>	$sigma_ministries_cta_title_2
  ]);
  sigmacore_custom_metafield([
    'type'	=>	'text',
    'name'	=>	'sigma_ministries_cta_link_2',
    'title'	=>	__('CTA Button 2 Link', 'sigma-core'),
    'description'	=>	__('Enter the link for call to action button 2', 'sigma-core'),
    'value'	=>	$sigma_ministries_cta_link_2
  ]);
  sigmacore_custom_metafield([
    'type'	=>	'text',
    'name'	=>	'sigma_ministries_socials_icon',
    'title'	=>	__('Ministries Icon', 'sigma-core'),
    'value'	=>	$sigma_ministries_socials_icon
  ]);
}
/**
 * Save ministries fields content.
 *
 * @param int $post_id Post ID.
 */
function sigmacore_ministries_settings_save_meta_box( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_posts' ) ) {
		return;
	}
	if ( ! isset( $_POST['sigma-ministries-meta-nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sigma-ministries-meta-nonce'] ) ), basename( __FILE__ ) ) ) {
		return;
	}
	// Fields to be saved
	$ministries_details = array();
	$ministries_details['sigma_ministries_cta_title_1'] = isset( $_POST['sigma_ministries_cta_title_1'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_ministries_cta_title_1'] ) ) : '';
	$ministries_details['sigma_ministries_cta_link_1'] = isset( $_POST['sigma_ministries_cta_link_1'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_ministries_cta_link_1'] ) ) : '';
  $ministries_details['sigma_ministries_cta_title_2'] = isset( $_POST['sigma_ministries_cta_title_2'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_ministries_cta_title_2'] ) ) : '';
	$ministries_details['sigma_ministries_cta_link_2'] = isset( $_POST['sigma_ministries_cta_link_2'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_ministries_cta_link_2'] ) ) : '';
	$ministries_details['sigma_ministries_socials_icon'] = isset( $_POST['sigma_ministries_socials_icon'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_ministries_socials_icon'] ) ) : '';
	update_post_meta( $post_id, 'sigma_ministries_details', $ministries_details );
}
add_action( 'save_post', 'sigmacore_ministries_settings_save_meta_box' );
