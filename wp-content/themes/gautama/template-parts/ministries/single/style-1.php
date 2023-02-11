<?php
/**
 * Template part for displaying ministries details.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
$ministries_details = get_post_meta( get_the_ID(), 'sigma_ministries_details', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'sigma-ministries-details' ); ?>>
		<div class="sigma-portfolio-thumbnail">
				<div class="sigma_post-thumbnail">
					<?php the_post_thumbnail('full'); ?>
				</div>
		</div>
	<div class="sigma-portfolio-content">
		<?php the_content(); ?>
	</div>
</article>
