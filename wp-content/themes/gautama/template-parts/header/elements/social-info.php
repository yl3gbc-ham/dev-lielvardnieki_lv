<?php
/**
 * Template part for header social info.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
$social_infos = gautama_get_option('social_infos');

if ( !$social_infos ) {
	return;
}
?>
<div class="social-info-wrapper">
	<ul class="social-info">
	<?php
	foreach ( $social_infos as $social_info ) {
		if ( !empty( gautama_get_option($social_info . '_link') ) ) {
			?>
			<li>
				<a class="social-icon" href="<?php echo esc_url(gautama_get_option($social_info . '_link')) ?>" rel="nofollow"><i class="fab fa-<?php echo esc_attr( $social_info ); ?>"></i></a>
			</li>
			<?php
		}
	}
	?>
	</ul>
</div>

