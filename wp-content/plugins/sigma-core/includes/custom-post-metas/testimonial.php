<?php
/**
 * Register metafields for testimonial.
 *
 * @package Sigma Core
 */
function sigmacore_testimonial_details_metafields() {
	add_meta_box( 'sigma_testimonial_details', esc_html__( 'Testimonial Details', 'sigma-core' ), 'sigmacore_testimonial_details_metafields_callback', 'testimonial', 'advanced' );
}
add_action( 'add_meta_boxes', 'sigmacore_testimonial_details_metafields', 2 );

/**
 * testimonial meta fields display callback.
 *
 * @param WP_Post $post Current post object.
 */
function sigmacore_testimonial_details_metafields_callback( $post ) {
	global $post;

	wp_nonce_field( basename( __FILE__ ), 'sigma-testimonial-meta-nonce' );

	$testimonial_details         = get_post_meta( $post->ID, 'sigma_testimonial_details', true );
	$sigma_testimonial_designation  = isset( $testimonial_details['sigma_testimonial_designation'] ) ? $testimonial_details['sigma_testimonial_designation'] : '';
	$sigma_testimonial_rating       = isset( $testimonial_details['sigma_testimonial_rating'] ) ? (int) $testimonial_details['sigma_testimonial_rating'] : '';

	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_testimonial_designation',
		'title'	=>	__('Designation', 'sigma-core'),
		'description'	=>	__('Assign the user testimonial\'s designation', 'sigma-core'),
		'value'	=>	$sigma_testimonial_designation
	]);

	sigmacore_custom_metafield([
		'type'	=>	'rating',
		'name'	=>	'sigma_testimonial_rating',
		'title'	=>	__('Rating', 'sigma-core'),
		'description'	=>	__('Assign the rating for this testimonial', 'sigma-core'),
		'value'	=>	$sigma_testimonial_rating,
	]);

}

/**
 * Save testimonial fields content.
 *
 * @param int $post_id Post ID.
 */
function sigmacore_testimonial_details_save_meta_box( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_posts' ) ) {
		return;
	}
	if ( ! isset( $_POST['sigma-testimonial-meta-nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sigma-testimonial-meta-nonce'] ) ), basename( __FILE__ ) ) ) {
		return;
	}

	$testimonial_details  = array();

	$testimonial_details['sigma_testimonial_rating']       = isset( $_POST['sigma_testimonial_rating'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_testimonial_rating'] ) ) : '';
	$testimonial_details['sigma_testimonial_designation']  = isset( $_POST['sigma_testimonial_designation'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_testimonial_designation'] ) ) : '';

	update_post_meta( $post_id, 'sigma_testimonial_details', $testimonial_details );
}
add_action( 'save_post', 'sigmacore_testimonial_details_save_meta_box' );
