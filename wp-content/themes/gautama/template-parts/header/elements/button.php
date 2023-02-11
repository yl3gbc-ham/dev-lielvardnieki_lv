<?php
/**
 * Template part for header button.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */

$header_button_title = gautama_get_option('header_button_title');
$header_button_link = gautama_get_option('header_button_link');

if ( ! $header_button_title || ! $header_button_link ) {
	return;
}
?>
<a href="<?php echo esc_url( $header_button_link ); ?>" title="<?php echo esc_attr( $header_button_title ); ?>" class="header-cta-btn sigma_btn-custom"><?php echo esc_html( $header_button_title ); ?></a>
