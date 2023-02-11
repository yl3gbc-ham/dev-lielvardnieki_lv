<?php

/**
 * Register metafields for team.
 *
 * @package Sigma Core
 */
if(!function_exists('sigmacore_team_details_metafields')){
	function sigmacore_team_details_metafields() {
		add_meta_box( 'sigma_team_details', esc_html__( 'Team Member Details', 'sigma-core' ), 'sigmacore_team_details_metafields_callback', 'team', 'advanced' );
	}
}
add_action( 'add_meta_boxes', 'sigmacore_team_details_metafields' );

if ( ! function_exists( 'sigmacore_team_details_callback' ) ) {
	/**
	 * Team meta fields display callback.
	 *
	 * @param WP_Post $post Current post object.
	 */
	function sigmacore_team_details_metafields_callback( $post ) {
		global $post;

		wp_nonce_field( basename( __FILE__ ), 'sigma-team-meta-nonce' );

		$team_details                = get_post_meta( $post->ID, 'sigma_team_details', true );
		$sigma_teammember_designation   = isset( $team_details['sigma_teammember_designation'] ) ? $team_details['sigma_teammember_designation'] : '';
		$sigma_teammember_email         = isset( $team_details['sigma_teammember_email'] ) ? $team_details['sigma_teammember_email'] : '';
		$sigma_teammember_phone_number  = isset( $team_details['sigma_teammember_phone_number'] ) ? $team_details['sigma_teammember_phone_number'] : '';
		$sigma_teammember_address_info  = isset( $team_details['sigma_teammember_address_info'] ) ? $team_details['sigma_teammember_address_info'] : '';
		$sigma_teammember_website       = isset( $team_details['sigma_teammember_website'] ) ? $team_details['sigma_teammember_website'] : '';
		$sigma_teammember_socials_total = isset( $team_details['sigma_teammember_socials_total'] ) ? (int) $team_details['sigma_teammember_socials_total'] : '';
		$sigma_teammember_socials_link  = isset( $team_details['sigma_teammember_socials_link'] ) ? $team_details['sigma_teammember_socials_link'] : '';
		$sigma_teammember_socials_icon  = isset( $team_details['sigma_teammember_socials_icon'] ) ? $team_details['sigma_teammember_socials_icon'] : '';

		sigmacore_custom_metafield([
			'type'	=>	'text',
			'name'	=>	'sigma_teammember_designation',
			'title'	=>	__('Designation', 'sigma-core'),
			'description'	=>	__('Assign the team member\'s designation', 'sigma-core'),
			'value'	=>	$sigma_teammember_designation
		]);
		sigmacore_custom_metafield([
			'type'	=>	'text',
			'name'	=>	'sigma_teammember_email',
			'title'	=>	__('Email', 'sigma-core'),
			'description'	=>	__('Assign the team member\'s email', 'sigma-core'),
			'value'	=>	$sigma_teammember_email
		]);
		sigmacore_custom_metafield([
			'type'	=>	'text',
			'name'	=>	'sigma_teammember_phone_number',
			'title'	=>	__('Phone Number', 'sigma-core'),
			'description'	=>	__('Assign the team member\'s Phone Number', 'sigma-core'),
			'value'	=>	$sigma_teammember_phone_number
		]);
		sigmacore_custom_metafield([
			'type'	=>	'textarea',
			'name'	=>	'sigma_teammember_address_info',
			'title'	=>	__('Address Info', 'sigma-core'),
			'description'	=>	__('Assign the team member\'s address info', 'sigma-core'),
			'value'	=>	$sigma_teammember_address_info
		]);
		sigmacore_custom_metafield([
			'type'	=>	'text',
			'name'	=>	'sigma_teammember_website',
			'title'	=>	__('Website', 'sigma-core'),
			'description'	=>	__('Assign the team member\'s website', 'sigma-core'),
			'value'	=>	$sigma_teammember_website
		]);

		?>

		<div class="sigma_repeater-section sigma-team-repeater-field">
			<label><?php esc_html_e( 'Social Profiles', 'sigma-core' ); ?></label>
			<table class="team-social-icon-table">
				<tr>
					<th><?php esc_html_e( 'No.', 'sigma-core' ); ?></th>
					<th><?php esc_html_e( 'Icon.', 'sigma-core' ); ?></th>
					<th><?php esc_html_e( 'Link.', 'sigma-core' ); ?></th>
					<th><?php esc_html_e( 'Remove.', 'sigma-core' ); ?></th>
				</tr>
			<?php for ( $i = 0; $sigma_teammember_socials_total > $i; $i++ ) { ?>
				<tr>
					<td class="row-index"><?php echo esc_html( $i + 1 ); ?></td>
					<td class="sigma_input-field">
						<input class="sigma_text team-social-icons" type="text" name="sigma_teammember_socials_icon[]" value="<?php echo esc_attr( $sigma_teammember_socials_icon[ $i ] ); ?>">
					</td>
					<td class="sigma_input-field">
						<input class="sigma_text" type="text" name="sigma_teammember_socials_link[]" value="<?php echo esc_attr( $sigma_teammember_socials_link[ $i ] ); ?>">
					</td>
					<td><a class="team-table-row-remove sigma_link-destructive" href="#"><?php echo esc_html__('Remove', 'sigma-core') ?></a></td>
				</tr>
				<?php } ?>
			</table>
			<input type="hidden" name="sigma_teammember_socials_total" value="<?php echo esc_attr( $sigma_teammember_socials_total ); ?>">
			<span class="button team-table-row-add"><?php echo esc_html__('Add Row', 'sigma-core') ?></span>
		</div>

		<?php
	}
}

/**
 * Save team fields content.
 *
 * @param int $post_id Post ID.
 */
if(!function_exists('sigmacore_team_details_save_meta_box')){
	function sigmacore_team_details_save_meta_box( $post_id ) {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
	    return;
	  }
	  if ( ! current_user_can( 'edit_posts' ) ) {
	    return;
	  }
	  if ( ! isset( $_POST['sigma-team-meta-nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sigma-team-meta-nonce'] ) ), basename( __FILE__ ) ) ) {
	    return;
	  }

		$team_details                                = array();
		$team_details['sigma_teammember_designation']   = isset( $_POST['sigma_teammember_designation'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_teammember_designation'] ) ) : '';
		$team_details['sigma_teammember_email']         = isset( $_POST['sigma_teammember_email'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_teammember_email'] ) ) : '';
		$team_details['sigma_teammember_phone_number']  = isset( $_POST['sigma_teammember_phone_number'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_teammember_phone_number'] ) ) : '';
		$team_details['sigma_teammember_address_info']  = isset( $_POST['sigma_teammember_address_info'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_teammember_address_info'] ) ) : '';
		$team_details['sigma_teammember_website']       = isset( $_POST['sigma_teammember_website'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_teammember_website'] ) ) : '';
		$team_details['sigma_teammember_socials_total'] = isset( $_POST['sigma_teammember_socials_total'] ) ? sanitize_text_field( wp_unslash( $_POST['sigma_teammember_socials_total'] ) ) : '';
		$team_details['sigma_teammember_socials_icon']  = isset( $_POST['sigma_teammember_socials_icon'] ) ? wp_unslash( $_POST['sigma_teammember_socials_icon'] ) : '';
		$team_details['sigma_teammember_socials_link']  = isset( $_POST['sigma_teammember_socials_link'] ) ? wp_unslash( $_POST['sigma_teammember_socials_link'] ) : '';

		update_post_meta( $post_id, 'sigma_team_details', $team_details );
	}
}
add_action( 'save_post', 'sigmacore_team_details_save_meta_box' );
