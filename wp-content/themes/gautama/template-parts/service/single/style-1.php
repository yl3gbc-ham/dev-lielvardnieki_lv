<?php
/**
 * Template part for displaying service details layout 1
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
 $service_details = get_post_meta( get_the_ID(), 'sigma_service_details', true );
 $service_icon = isset( $service_details['kb_service_icon'] ) ? $service_details['kb_service_icon'] : '';
?>
<div class="service-details">
  <article id="post-<?php the_ID(); ?>" <?php post_class('sigma-service-details'); ?>>
  	<div class="sigma-service-wrapper">
  		<?php if(has_post_thumbnail()){ ?>
  			<div class="post-thumbnail">
  				<?php the_post_thumbnail(); ?>
  			</div>
  		<?php } ?>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
  	</div>
  </article><!-- #post-<?php the_ID(); ?> -->
</div>
