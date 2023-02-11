<?php
/**
 * Register metafields for event.
 *
 * @package Sigma Core
 */
function sigmacore_event_settings_metafields() {
	add_meta_box( 'sigma_event_details', esc_html__( 'Event Details', 'sigma-core' ), 'sigmacore_event_settings_metafields_callback', 'event', 'side' );
}
add_action( 'add_meta_boxes', 'sigmacore_event_settings_metafields', 2 );
/**
 * event meta fields display callback.
 *
 * @param WP_Post $post Current post object.
 */
function sigmacore_event_settings_metafields_callback( $post ) {
	global $post;
	wp_nonce_field( basename( __FILE__ ), 'sigma-event-meta-nonce' );
	// Field values
	$event_details        = get_post_meta( $post->ID, 'sigma_event_details', true );
	$event_date = isset( $event_details['sigma_event_date'] ) ? $event_details['sigma_event_date'] : '';
  $event_location = isset( $event_details['sigma_event_location'] ) ? $event_details['sigma_event_location'] : '';
  $event_speaker = isset( $event_details['sigma_event_speaker'] ) ? $event_details['sigma_event_speaker'] : '';
	$sigma_event_cta_title_1 = isset( $event_details['sigma_event_cta_title_1'] ) ? $event_details['sigma_event_cta_title_1'] : '';
  $sigma_event_cta_link_1 = isset( $event_details['sigma_event_cta_link_1'] ) ? $event_details['sigma_event_cta_link_1'] : '';
  $sigma_event_cta_title_2 = isset( $event_details['sigma_event_cta_title_2'] ) ? $event_details['sigma_event_cta_title_2'] : '';
  $sigma_event_cta_link_2 = isset( $event_details['sigma_event_cta_link_2'] ) ? $event_details['sigma_event_cta_link_2'] : '';
	// All metafields
	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_event_date',
		'title'	=>	__('Event Date', 'sigma-core'),
		'description'	=>	__('Enter the event start date', 'sigma-core'),
		'value'	=>	$event_date
	]);
	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_event_location',
		'title'	=>	__('Event Location', 'sigma-core'),
		'description'	=>	__('Enter the event location', 'sigma-core'),
		'value'	=>	$event_location
	]);
	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_event_speaker',
		'title'	=>	__('No of Speakers', 'sigma-core'),
		'description'	=>	__('Enter the no of speakers', 'sigma-core'),
		'value'	=>	$event_speaker
	]);
	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_event_cta_title_1',
		'title'	=>	__('CTA Button 1 Title', 'sigma-core'),
		'description'	=>	__('Enter the title for call to action button 1', 'sigma-core'),
		'value'	=>	$sigma_event_cta_title_1
	]);
	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_event_cta_link_1',
		'title'	=>	__('CTA Button 1 Link', 'sigma-core'),
		'description'	=>	__('Enter the link for call to action button 1', 'sigma-core'),
		'value'	=>	$sigma_event_cta_link_1
	]);
  sigmacore_custom_metafield([
    'type'	=>	'text',
    'name'	=>	'sigma_event_cta_title_2',
    'title'	=>	__('CTA Button 2 Title', 'sigma-core'),
    'description'	=>	__('Enter the title for call to action button 2', 'sigma-core'),
    'value'	=>	$sigma_event_cta_title_2
  ]);
  sigmacore_custom_metafield([
    'type'	=>	'text',
    'name'	=>	'sigma_event_cta_link_2',
    'title'	=>	__('CTA Button 2 Link', 'sigma-core'),
    'description'	=>	__('Enter the link for call to action button 2', 'sigma-core'),
    'value'	=>	$sigma_event_cta_link_2
  ]);
}
/**
 * Save event fields content.
 *
 * @param int $post_id Post ID.
 */
function sigmacore_event_settings_save_meta_box( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_posts' ) ) {
		return;
	}
	if ( ! isset( $_POST['sigma-event-meta-nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sigma-event-meta-nonce'] ) ), basename( __FILE__ ) ) ) {
		return;
	}
	// Fields to be saved
	$event_details                           = array();
	$event_details['sigma_event_date'] = isset( $_POST['sigma_event_date'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_event_date'] ) ) : '';
	$event_details['sigma_event_location'] = isset( $_POST['sigma_event_location'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_event_location'] ) ) : '';
	$event_details['sigma_event_speaker'] = isset( $_POST['sigma_event_speaker'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_event_speaker'] ) ) : '';
	$event_details['sigma_event_cta_title_1'] = isset( $_POST['sigma_event_cta_title_1'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_event_cta_title_1'] ) ) : '';
	$event_details['sigma_event_cta_link_1'] = isset( $_POST['sigma_event_cta_link_1'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_event_cta_link_1'] ) ) : '';
  $event_details['sigma_event_cta_title_2'] = isset( $_POST['sigma_event_cta_title_2'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_event_cta_title_2'] ) ) : '';
	$event_details['sigma_event_cta_link_2'] = isset( $_POST['sigma_event_cta_link_2'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_event_cta_link_2'] ) ) : '';
	update_post_meta( $post_id, 'sigma_event_details', $event_details );
}
add_action( 'save_post', 'sigmacore_event_settings_save_meta_box' );
