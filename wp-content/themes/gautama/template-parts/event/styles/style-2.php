<?php
/**
 * Template part for displaying portfolio items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
 $thumb_size = function_exists('gautama_get_thumb_size') ? gautama_get_thumb_size('gautama-blog') : 'gautama-portfolio';
 $event_details = get_post_meta( get_the_ID(), 'sigma_event_details', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-event sigma-event-style-2 sigma-event-wrapper'); ?>>
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
        <a href="<?php the_permalink(); ?>" class="read-more-link sigma_btn-custom"><?php esc_html_e('Event Details', 'gautama'); ?></a>
      </div>
    </div>
  </div>
</article>
