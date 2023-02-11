<?php
/**
 * Register metafields for sermons.
 *
 * @package Sigma Core
 */
function sigmacore_sermons_settings_metafields() {
	add_meta_box( 'sigma_sermons_details', esc_html__( 'Sermons Details', 'sigma-core' ), 'sigmacore_sermons_settings_metafields_callback', 'sermons', 'side' );
}
add_action( 'add_meta_boxes', 'sigmacore_sermons_settings_metafields', 2 );
/**
 * sermons meta fields display callback.
 *
 * @param WP_Post $post Current post object.
 */
function sigmacore_sermons_settings_metafields_callback( $post ) {
	global $post;
	wp_nonce_field( basename( __FILE__ ), 'sigma-sermons-meta-nonce' );
	// Field values
	$sermons_details = get_post_meta( $post->ID, 'sigma_sermons_details', true );
	$sigma_sermons_audio_link = isset( $sermons_details['sigma_sermons_audio_link'] ) ? $sermons_details['sigma_sermons_audio_link'] : '';
	$sigma_sermons_video_link = isset( $sermons_details['sigma_sermons_video_link'] ) ? $sermons_details['sigma_sermons_video_link'] : '';
	$sigma_sermons_doc_link = isset( $sermons_details['sigma_sermons_doc_link'] ) ? $sermons_details['sigma_sermons_doc_link'] : '';
	$sigma_sermons_share_link = isset( $sermons_details['sigma_sermons_share_link'] ) ? $sermons_details['sigma_sermons_share_link'] : '';
	// All metafields
	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_sermons_audio_link',
		'title'	=>	__('Sermons Audio Link', 'sigma-core'),
		'description'	=>	__('Enter the sermons audio link', 'sigma-core'),
		'value'	=>	$sigma_sermons_audio_link
	]);
	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_sermons_video_link',
		'title'	=>	__('Sermons Video Link', 'sigma-core'),
		'description'	=>	__('Enter the sermons video link', 'sigma-core'),
		'value'	=>	$sigma_sermons_video_link
	]);
	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_sermons_doc_link',
		'title'	=>	__('Sermons Doc File Link', 'sigma-core'),
		'description'	=>	__('Enter the sermons doc link', 'sigma-core'),
		'value'	=>	$sigma_sermons_doc_link
	]);
	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_sermons_share_link',
		'title'	=>	__('Sermons Share Link', 'sigma-core'),
		'description'	=>	__('Enter the sermons share link', 'sigma-core'),
		'value'	=>	$sigma_sermons_share_link
	]);
}
/**
 * Save sermons fields content.
 *
 * @param int $post_id Post ID.
 */
function sigmacore_sermons_settings_save_meta_box( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_posts' ) ) {
		return;
	}
	if ( ! isset( $_POST['sigma-sermons-meta-nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sigma-sermons-meta-nonce'] ) ), basename( __FILE__ ) ) ) {
		return;
	}
	// Fields to be saved
	$sermons_details                           = array();
	$sermons_details['sigma_sermons_audio_link'] = isset( $_POST['sigma_sermons_audio_link'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_sermons_audio_link'] ) ) : '';
	$sermons_details['sigma_sermons_video_link'] = isset( $_POST['sigma_sermons_video_link'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_sermons_video_link'] ) ) : '';
	$sermons_details['sigma_sermons_doc_link'] = isset( $_POST['sigma_sermons_doc_link'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_sermons_doc_link'] ) ) : '';
	$sermons_details['sigma_sermons_share_link'] = isset( $_POST['sigma_sermons_share_link'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_sermons_share_link'] ) ) : '';
	update_post_meta( $post_id, 'sigma_sermons_details', $sermons_details );
}
add_action( 'save_post', 'sigmacore_sermons_settings_save_meta_box' );
