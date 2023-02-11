<?php
/**
 * Template part for header search.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */

if ( ! gautama_get_option('display-search-icon'); ) {
	return;
}
?>
<div class="search-wrapper">
	<a href="#" class="search-icon search-popup-modal"><i class="fas fa-search"></i></a>
</div>

<div class="search-window">

	<?php get_search_form(); ?>

	<div class="close-btn search-trigger">
		<span></span>
		<span></span>
	</div>

</div>
