<?php
/**
 * Register metafields for service custom post type.
 *
 * @package Sigma Core
 */
if ( ! function_exists( 'sigmacore_register_service_metafields' ) ) {
	/**
	 * Register metafields for service members.
	 */
	function sigmacore_register_service_metafields() {
		add_meta_box( 'service_details', __( 'Service Details', 'sigma-core' ), 'sigmacore_service_details_callback', 'service' );
	}
}
add_action( 'add_meta_boxes', 'sigmacore_register_service_metafields' );
if ( ! function_exists( 'sigmacore_service_details_callback' ) ) {
	/**
	 * service meta fields display callback.
	 *
	 * @param WP_Post $post Current post object.
	 */
	function sigmacore_service_details_callback( $post ) {
		global $post;
		wp_nonce_field( basename( __FILE__ ), 'sigma-service-meta-nonce' );
		$service_details = get_post_meta( $post->ID, 'sigma_service_details', true );
		$kb_service_icon = isset( $service_details['kb_service_icon'] ) ? $service_details['kb_service_icon'] : '';
		?>
		<div class="sigma-service-metafields-container">
			<div class="sigma-service-content">
				<div class="sigma-service-input-field">
					<label for="kb_service_icon"><?php esc_html_e( 'Service Icon', 'sigma-core' ); ?></label>
					<input class="widefat service-icons" type="text" name="kb_service_icon" value="<?php echo esc_attr( $kb_service_icon ); ?>">
				</div>
			</div>
		</div>
		<?php
	}
}
if ( ! function_exists( 'sigmacore_service_save_meta_box' ) ) {
	/**
	 * Save service fields content.
	 *
	 * @param int $post_id Post ID.
	 */
	function sigmacore_service_save_meta_box( $post_id ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! current_user_can( 'edit_posts' ) ) {
			return;
		}
		if ( ! isset( $_POST['sigma-service-meta-nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sigma-service-meta-nonce'] ) ), basename( __FILE__ ) ) ) {
			return;
		}
		$service_details                    = array();
		$service_details['kb_service_icon'] = isset( $_POST['kb_service_icon'] ) ? sanitize_text_field( wp_unslash( $_POST['kb_service_icon'] ) ) : '';
		update_post_meta( $post_id, 'sigma_service_details', $service_details );
	}
}
add_action( 'save_post', 'sigmacore_service_save_meta_box' );
