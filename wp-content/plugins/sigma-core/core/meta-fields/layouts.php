<?php
/**
 * File responsible for adding the layouts meta fields
 *
 * @package Sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register metafields for layouts.
 *
 * @package Sigma Core
 */
function sigmacore_layout_settings_metafields() {
	add_meta_box( 'sigma_layout_settings', esc_html__( 'Layout Settings', 'sigma-core' ), 'sigmacore_layout_settings_metafields_callback', 'layouts', 'advanced' );
}
add_action( 'add_meta_boxes', 'sigmacore_layout_settings_metafields', 2 );

/**
 * Layouts meta fields display callback.
 *
 * @param WP_Post $post Current post object.
 */
function sigmacore_layout_settings_metafields_callback( $post ) {

	global $post;
	wp_nonce_field( basename( __FILE__ ), 'sigma-layout-meta-nonce' );

	// The field values
	$layout_settings = get_post_meta( $post->ID, 'sigma_layout_settings', true );
	$sigma_layout_header_style = isset( $layout_settings['header-layout'] ) ? $layout_settings['header-layout'] : '';
	$sigma_layout_header_scheme = isset( $layout_settings['header-scheme'] ) ? $layout_settings['header-scheme'] : '';
	$sigma_layout_header_position = isset( $layout_settings['header-position'] ) ? $layout_settings['header-position'] : '';

	$sigma_layout_header_logo = isset( $layout_settings['site-logo'] ) ? $layout_settings['site-logo'] : '';

	$sigma_layout_subheader_style = isset( $layout_settings['subheader_style'] ) ? $layout_settings['subheader_style'] : '';
	$sigma_layout_breadcrumb_position = isset( $layout_settings['breadcrumb_position'] ) ? $layout_settings['breadcrumb_position'] : '';
	$sigma_layout_subheader_alignment = isset( $layout_settings['subheader_alignment'] ) ? $layout_settings['subheader_alignment'] : '';

	// All metafields
	?>
	<div class="sigma_tabs-wrapper">

		<div class="sigma_tabs-nav">

			<a class="sigma_tab active" href="#" data-target="#sigma-tab-header-options">
				<?php echo esc_html__('Header Settings', 'sigma-core') ?>
			</a>

			<a class="sigma_tab" href="#" data-target="#sigma-tab-subheader-options">
				<?php echo esc_html__('Subheader Settings', 'sigma-core') ?>
			</a>

			<a class="sigma_tab" href="#" data-target="#sigma-tab-logo-options">
				<?php echo esc_html__('Logo Settings', 'sigma-core') ?>
			</a>

		</div>

		<div class="sigma_tab-item active" id="sigma-tab-header-options">
			<?php
			sigmacore_custom_metafield([
				'type'	=>	'select',
				'name'	=>	'header-layout',
				'title'	=>	__('Header Style', 'sigma-core'),
				'description'	=>	__('Please select the header style to display.', 'sigma-core'),
				'value'	=>	$sigma_layout_header_style,
				'options'	=>	sigmacore_get_redux_select_options('header-layout')
			]);
			sigmacore_custom_metafield([
				'type'	=>	'select',
				'name'	=>	'header-scheme',
				'title'	=>	__('Header Color Scheme', 'sigma-core'),
				'description'	=>	__('Please select the header color scheme', 'sigma-core'),
				'value'	=>	$sigma_layout_header_scheme,
				'options'	=>	sigmacore_get_redux_select_options('header-scheme')
			]);
			sigmacore_custom_metafield([
				'type'	=>	'select',
				'name'	=>	'header-position',
				'title'	=>	__('Header position', 'sigma-core'),
				'description'	=>	__('Please select the header position', 'sigma-core'),
				'value'	=>	$sigma_layout_header_position,
				'options'	=>	sigmacore_get_redux_select_options('header-position')
			]);
			?>
		</div>

		<div class="sigma_tab-item" id="sigma-tab-subheader-options">
			<?php
			sigmacore_custom_metafield([
				'type'	=>	'select',
				'name'	=>	'subheader_style',
				'title'	=>	__('Subheader Style', 'sigma-core'),
				'description'	=>	__('Please select the subheader style', 'sigma-core'),
				'value'	=>	$sigma_layout_subheader_style,
				'options'	=>	sigmacore_get_redux_select_options('subheader_style')
			]);
			sigmacore_custom_metafield([
				'type'	=>	'select',
				'name'	=>	'subheader_alignment',
				'title'	=>	__('Subheader alignment', 'sigma-core'),
				'description'	=>	__('Please select the subheader alignment', 'sigma-core'),
				'value'	=>	$sigma_layout_subheader_alignment,
				'options'	=>	sigmacore_get_redux_select_options('subheader_alignment')
			]);
			sigmacore_custom_metafield([
				'type'	=>	'select',
				'name'	=>	'breadcrumb_position',
				'title'	=>	__('Breadcrumb Position', 'sigma-core'),
				'description'	=>	__('Please select the breadcrumb position', 'sigma-core'),
				'value'	=>	$sigma_layout_breadcrumb_position,
				'options'	=>	sigmacore_get_redux_select_options('breadcrumb_position')
			]);

			?>
		</div>

		<div class="sigma_tab-item" id="sigma-tab-logo-options">
			<?php
			sigmacore_custom_metafield([
				'type'	=>	'file',
				'name'	=>	'site-logo',
				'title'	=>	__('Site Logo', 'sigma-core'),
				'description'	=>	__('Select a custom logo for the header', 'sigma-core'),
				'value'	=>	$sigma_layout_header_logo,
			]);
			?>
		</div>

	</div>

	<?php

}

/**
 * Save layouts fields content.
 *
 * @param int $post_id Post ID.
 */
function sigmacore_layout_settings_save_meta_box( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_posts' ) ) {
		return;
	}
	if ( ! isset( $_POST['sigma-layout-meta-nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sigma-layout-meta-nonce'] ) ), basename( __FILE__ ) ) ) {
		return;
	}

	$layout_settings = array();
	$layout_settings['header-layout'] = isset( $_POST['header-layout'] ) ? sanitize_text_field( wp_unslash( $_POST['header-layout'] ) ) : '';
	$layout_settings['header-scheme'] = isset( $_POST['header-scheme'] ) ? sanitize_text_field( wp_unslash( $_POST['header-scheme'] ) ) : '';
	$layout_settings['header-position'] = isset( $_POST['header-position'] ) ? sanitize_text_field( wp_unslash( $_POST['header-position'] ) ) : '';

	$layout_settings['site-logo'] = isset( $_POST['site-logo'] ) ? sanitize_text_field( wp_unslash( $_POST['site-logo'] ) ) : '';

	$layout_settings['subheader_style'] = isset( $_POST['subheader_style'] ) ? sanitize_text_field( wp_unslash( $_POST['subheader_style'] ) ) : '';
	$layout_settings['breadcrumb_position'] = isset( $_POST['breadcrumb_position'] ) ? sanitize_text_field( wp_unslash( $_POST['breadcrumb_position'] ) ) : '';
	$layout_settings['subheader_alignment'] = isset( $_POST['subheader_alignment'] ) ? sanitize_text_field( wp_unslash( $_POST['subheader_alignment'] ) ) : '';

	update_post_meta( $post_id, 'sigma_layout_settings', $layout_settings );

}
add_action( 'save_post', 'sigmacore_layout_settings_save_meta_box' );
