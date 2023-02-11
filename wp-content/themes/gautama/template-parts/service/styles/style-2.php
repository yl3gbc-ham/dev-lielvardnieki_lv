<?php
/**
 * Template part for displaying service items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
 $thumb_size = function_exists('gautama_get_thumb_size') ? gautama_get_thumb_size('gautama-blog') : 'full';
 $service_details = get_post_meta( $post->ID, 'sigma_service_details', true );
 $kb_service_icon = isset( $service_details['kb_service_icon'] ) ? $service_details['kb_service_icon'] : '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-service sigma-service-style-2 sigma-service-wrapper'); ?>>
	<div class="sigma_service style-1">
							<?php if(has_post_thumbnail()){ ?>
							<div class="sigma-portfolio-image-container">
								<?php the_post_thumbnail($thumb_size) ?>
							</div>
						<?php }
	            if (isset($kb_service_icon) && !empty($kb_service_icon)) { ?>
	            <div class="sigma_service-thumb">
	              <i class="<?php echo esc_attr($kb_service_icon); ?>"></i>
	            </div>
						<?php } ?>
	            <div class="sigma_service-body">
	              <h5><?php the_title(); ?></h5>
								<p><?php echo esc_html(gautama_custom_excerpt(15)) ?></p>
	              <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn-link"> <?php esc_html_e('Read More', 'gautama'); ?> <i class="far fa-arrow-right"></i> </a>
	            </div>
	          </div>
</article>
