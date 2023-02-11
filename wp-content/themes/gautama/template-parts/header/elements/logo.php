<?php
/**
 * Template part for header logo.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */

?>

<div class="site-logo-wrapper">

	<?php

	// Logo
	gautama_get_site_logo('site-logo');

	if( gautama_get_option('sticky-logo') && gautama_get_option('sticky-header-enable') ){
		gautama_get_site_logo('sticky-logo', false);
	}

	// Info Card
	if( gautama_get_option('display_info_card') ){
		get_template_part( 'template-parts/header/elements/info-card' );
	}
	?>

</div>
