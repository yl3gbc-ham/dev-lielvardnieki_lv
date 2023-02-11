<?php
/**
 * File responsible for adding the page meta fields
 *
 * @package Sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register metafields for page.
 *
 * @package Sigma Core
 */
function sigmacore_page_settings_metafields() {
	add_meta_box( 'sigma_page_settings', esc_html__( 'Page Settings', 'sigma-core' ), 'sigmacore_page_settings_metafields_callback', 'page', 'side' );
}
add_action( 'add_meta_boxes', 'sigmacore_page_settings_metafields', 90 );

/**
 * Page meta fields display callback.
 *
 * @param WP_Post $post Current post object.
 */
function sigmacore_page_settings_metafields_callback( $post ) {

	global $post;
	wp_nonce_field( basename( __FILE__ ), 'sigma-page-meta-nonce' );

	// The field values
	$page_settings         		= get_post_meta( $post->ID, 'sigma_page_settings', true );
	$sigma_page_custom_layout = isset( $page_settings['sigma_page_custom_layout'] ) ? $page_settings['sigma_page_custom_layout'] : '';
	$sigma_subheader_disable = isset( $page_settings['sigma_subheader_disable'] ) ? (bool) $page_settings['sigma_subheader_disable'] : '';
	$sigma_page_custom_title = isset( $page_settings['sigma_page_custom_title'] ) ? $page_settings['sigma_page_custom_title'] : '';
	$sigma_page_custom_subtitle = isset( $page_settings['sigma_page_custom_subtitle'] ) ? $page_settings['sigma_page_custom_subtitle'] : '';
	$sigma_page_sidebar_position = isset( $page_settings['sigma_page_sidebar_position'] ) ? $page_settings['sigma_page_sidebar_position'] : '';
	$sigma_page_layout = isset( $page_settings['sigma_page_layout'] ) ? $page_settings['sigma_page_layout'] : '';
	$sigma_custom_subheader = isset( $page_settings['sigma_custom_subheader'] ) ? $page_settings['sigma_custom_subheader'] : '';

	// All metafields
	sigmacore_custom_metafield([
		'type'	=>	'select',
		'name'	=>	'sigma_page_custom_layout',
		'title'	=>	__('Custom Page Layout', 'sigma-core'),
		'description'	=>	__('Select custom page layout', 'sigma-core'),
		'value'	=>	$sigma_page_custom_layout,
		'options'	=>	sigmacore_get_page_layouts()
	]);
	sigmacore_custom_metafield([
		'type'	=>	'checkbox',
		'name'	=>	'sigma_subheader_disable',
		'title'	=>	__('Disable Page subheader', 'sigma-core'),
		'description'	=>	__('Check this box if you want to hide the subheader on this page', 'sigma-core'),
		'value'	=>	$sigma_subheader_disable
	]);
	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_page_custom_title',
		'title'	=>	__('Custom Title', 'sigma-core'),
		'description'	=>	__('Overrides the page title in the subheader. (Notice: This will not change the original page title for SEO. For this we recommend using a 3rd party plugin). Also this does not work for Archives & Page Template type subheader', 'sigma-core'),
		'value'	=>	$sigma_page_custom_title
	]);
	sigmacore_custom_metafield([
		'type'	=>	'text',
		'name'	=>	'sigma_page_custom_subtitle',
		'title'	=>	__('Custom Subtitle', 'sigma-core'),
		'description'	=>	__('Overrides the page subtitle in the subheader. (This option is originally set from Theme Options)', 'sigma-core'),
		'value'	=>	$sigma_page_custom_subtitle
	]);
	sigmacore_custom_metafield([
		'type'	=>	'select',
		'name'	=>	'sigma_page_sidebar_position',
		'title'	=>	__('Sidebar position', 'sigma-core'),
		'description'	=>	__('Select a sidebar position, or disable it.  (This option is originally set from Theme Options)', 'sigma-core'),
		'value'	=>	$sigma_page_sidebar_position,
		'options'	=>	sigmacore_get_redux_select_options('page_sidebar')
	]);
	sigmacore_custom_metafield([
		'type'	=>	'select',
		'name'	=>	'sigma_page_layout',
		'title'	=>	__('Boxed Layout?', 'sigma-core'),
		'description'	=>	__('Select whether or not you want to use Boxed layout.  (This option is originally set from Theme Options)', 'sigma-core'),
		'value'	=>	$sigma_page_layout,
		'options'	=>	sigmacore_get_redux_select_options('page_layout')
	]);
	sigmacore_custom_metafield([
		'type'	=>	'file',
		'name'	=>	'sigma_custom_subheader',
		'title'	=>	__('Custom Subheader Image', 'sigma-core'),
		'description'	=>	__('Select a custom subheader image for this page.', 'sigma-core'),
		'value'	=>	$sigma_custom_subheader,
	]);

}

/**
 * Save page fields content.
 *
 * @param int $post_id Post ID.
 */
function sigmacore_page_settings_save_meta_box( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_posts' ) ) {
		return;
	}
	if ( ! isset( $_POST['sigma-page-meta-nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sigma-page-meta-nonce'] ) ), basename( __FILE__ ) ) ) {
		return;
	}

	$page_settings                          	 = array();
	$page_settings['sigma_page_custom_layout'] = isset( $_POST['sigma_page_custom_layout'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_page_custom_layout'] ) ) : '';
	$page_settings['sigma_subheader_disable'] = isset( $_POST['sigma_subheader_disable'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_subheader_disable'] ) ) : '';
	$page_settings['sigma_page_custom_title'] = isset( $_POST['sigma_page_custom_title'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_page_custom_title'] ) ) : '';
	$page_settings['sigma_page_custom_subtitle'] = isset( $_POST['sigma_page_custom_subtitle'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_page_custom_subtitle'] ) ) : '';
	$page_settings['sigma_page_sidebar_position'] = isset( $_POST['sigma_page_sidebar_position'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_page_sidebar_position'] ) ) : '';
	$page_settings['sigma_page_layout'] = isset( $_POST['sigma_page_layout'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_page_layout'] ) ) : '';
	$page_settings['sigma_custom_subheader'] = isset( $_POST['sigma_custom_subheader'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_custom_subheader'] ) ) : '';

	update_post_meta( $post_id, 'sigma_page_settings', $page_settings );

}
add_action( 'save_post', 'sigmacore_page_settings_save_meta_box' );
