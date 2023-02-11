<?php
/**
 * Service shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $sigma_shortcodes;
$atts   = $sigma_shortcodes[ 'sigma_service' ][ 'atts' ];
$thumb_size = function_exists('gautama_get_thumb_size') ? gautama_get_thumb_size('gautama-blog') : 'full';
$service_details = get_post_meta( $post->ID, 'sigma_service_details', true );
$kb_service_icon = isset( $service_details['kb_service_icon'] ) ? $service_details['kb_service_icon'] : '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-service sigma-service-style-1 sigma-service-wrapper'); ?>>
	<div class="sigma_service style-3">
							<?php if(has_post_thumbnail() && $atts['show_featured_image'] == 'yes'){ ?>
							<div class="sigma-portfolio-image-container">
								<?php the_post_thumbnail($thumb_size) ?>
							</div>
						<?php }
	            if ( $atts[ 'show_icon' ] == 'yes' && isset($kb_service_icon) && !empty($kb_service_icon)) { ?>
	            <div class="sigma_service-thumb">
	              <i class="<?php echo esc_attr($kb_service_icon); ?>"></i>
	            </div>
						<?php } ?>
	            <div class="sigma_service-body">
	              <h5><?php the_title(); ?></h5>
								<?php
								if($atts['post_excerpt'] == 'yes' && function_exists('gautama_custom_excerpt')){
									$excerpt_length = isset($atts['post_excerpt_length']) && !empty($atts['post_excerpt_length']) ? $atts['post_excerpt_length'] : 10;
									?>
								<p><?php echo esc_html(gautama_custom_excerpt($excerpt_length)) ?></p>
							<?php } if($atts['read_more'] == 'yes') { ?>
	              <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn-link"> <?php esc_html_e('Read More', 'sigma-core'); ?> <i class="far fa-arrow-right"></i> </a>
							<?php } ?>
	            </div>
	          </div>
</article>
