<?php
/**
 * The template for displaying all single team post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Gautama
 */

get_header();
?>
<div class="section">

	<div class="container">

		<div id="primary" class="content-area">

			<main id="main" class="site-main">

			<?php

			while ( have_posts() ) :

				the_post();

				get_template_part( 'template-parts/team/single/style-1' );

				gautama_single_post_pagination();

			endwhile; // End of the loop.

			?>

			</main><!-- #main -->

		</div><!-- #primary -->

	</div>

</div>
<?php
get_footer();
