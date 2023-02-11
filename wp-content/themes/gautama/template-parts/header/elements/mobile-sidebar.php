<?php

/**
 * Template part for header social info.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */

?>

<!-- Sidebar Navigation -->

<div class="aside-collapse mobile-aside">

	<button class="close-btn close-dark aside-m-trigger">
    <span></span>
		<span></span>
  </button>

	<div class="aside-inner">

		<?php

		gautama_nav_menu('mobile-menu');


		// Contact info
		get_template_part( 'template-parts/header/elements/contact-info' );

    ?>

	</div>

</div>
<div class="aside-overlay aside-m-trigger"></div>
