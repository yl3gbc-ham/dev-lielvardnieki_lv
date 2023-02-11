<?php
/**
 * Blog shortcode style 1 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_event' ][ 'atts' ];
$thumb_size = function_exists('gautama_get_thumb_size') ? gautama_get_thumb_size('gautama-event') : 'gautama-blog';
$event_details = get_post_meta( get_the_ID(), 'sigma_event_details', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-event sigma-event-style-1 sigma-event-wrapper'); ?>>
 <div class="sigma_portfolio-item">
	 <?php if(has_post_thumbnail()) {
		 the_post_thumbnail($thumb_size);
	 } ?>
	 <div class="sigma_portfolio-item-content">
		 <div class="sigma_portfolio-item-content-inner">
			 <?php if ( isset( $event_details[ 'sigma_event_date' ] ) && $event_details[ 'sigma_event_date' ] ) { ?>
				 <span class="fw-600 custom-primary"> <?php echo esc_html($event_details[ 'sigma_event_date' ]); ?> </span>
			 <?php } ?>
			 <h5> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h5>
			 <?php
			 if(function_exists('gautama_custom_excerpt') && $atts['post_excerpt'] == 'yes'){
				 $excerpt_length = !empty($atts['post_excerpt_length']) ? $atts['post_excerpt_length'] : 20;
				 ?>
			 		<p><?php echo gautama_custom_excerpt($excerpt_length); ?></p>
			 <?php } ?>
		 </div>
		 <a href="<?php the_permalink(); ?>" class="read-more-link"><i class="fal fa-plus"></i></a>
	 </div>
 </div>
</article>
