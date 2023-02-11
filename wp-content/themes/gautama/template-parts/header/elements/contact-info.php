<?php
/**
 * Template part for header contact information.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
$contact_email   = gautama_get_option('contact_email');
$contact_phone   = gautama_get_option('contact_phone');
$contact_address = gautama_get_option('contact_address');

$display_email_address = gautama_get_option('display_email_address');
$display_phone_number = gautama_get_option('display_phone_number');
$display_work_address = gautama_get_option('display_work_address');

$contact_info_style = gautama_get_option('header_contact_info_style', 'style-1');

if ( $display_work_address || $display_email_address || $display_phone_number ) {
?>
<div class="contact-info <?php echo esc_attr($contact_info_style) ?>">
	<?php if ( !empty($contact_phone) && $display_phone_number ){ ?>
		<div class="contact-phone contact-item">
			<a href="<?php echo esc_attr( 'tel:' . str_replace( ' ', '', $contact_phone ) ); ?>" title="<?php echo esc_attr('Call us', 'gautama') ?>"><i class="fal fa-phone skincolor"></i></a>
			<div class="contact-list">
				<span class="contact-label"><?php esc_html_e( 'Call Now', 'gautama' ); ?></span>
				<span class="contact-value">
					<a href="<?php echo esc_attr( 'tel:' . str_replace( ' ', '', $contact_phone ) ); ?>"><?php echo esc_html( $contact_phone ); ?></a>
				</span>
			</div>
		</div>
	<?php } if ( !empty($contact_email) && $display_email_address ) { ?>
		<div class="contact-email contact-item">
			<a href="<?php echo esc_attr( 'mailto:' . $contact_email ); ?>" title="<?php echo esc_attr('Email us', 'gautama') ?>"><i class="fal fa-envelope skincolor"></i></a>
			<div class="contact-list">
				<span class="contact-label"><?php esc_html_e( 'Email', 'gautama' ); ?></span>
				<span class="contact-value">
					<a href="<?php echo esc_attr( 'mailto:' . $contact_email ); ?>"><?php echo esc_html( $contact_email ); ?></a>
				</span>
			</div>
		</div>
	<?php } if ( !empty($contact_address) && $display_work_address ) { ?>
		<div title="<?php echo esc_attr( $contact_address ); ?>" class="contact-address contact-item">
			<i class="fal fa-map skincolor"></i>
			<div class="contact-list">
				<span class="contact-label"><?php esc_html_e( 'Address', 'gautama' ); ?></span>
				<span class="contact-value"><?php echo esc_html( $contact_address ); ?></span>
			</div>
		</div>
	<?php } ?>
</div>
<?php } ?>
