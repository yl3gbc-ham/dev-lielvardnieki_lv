<?php
/**
 * Template part for displaying event details.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
$event_details = get_post_meta( get_the_ID(), 'sigma_event_details', true );
$sigma_event_date = gautama_is_not_empty($event_details, 'sigma_event_date') ? $event_details['sigma_event_date'] : '';
$sigma_event_location = gautama_is_not_empty($event_details, 'sigma_event_location') ? $event_details['sigma_event_location'] : '';
$sigma_event_speaker = gautama_is_not_empty($event_details, 'sigma_event_speaker') ? $event_details['sigma_event_speaker'] : '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'sigma-event-details' ); ?>>
		<div class="sigma-portfolio-thumbnail">
			<?php if(has_post_thumbnail() && gautama_get_option('show-event-detail-image') == true){ ?>
				<div class="sigma_post-thumbnail">
					<?php the_post_thumbnail('full'); ?>
				</div>
			<?php } ?>
        <?php if($sigma_event_date || $sigma_event_location || $sigma_event_speaker) {
						if(gautama_get_option('show-event-meta-details') == true) {
					 ?>
          <div class="sigma_portfolio-details justify-content-center">
            <?php if($sigma_event_date) { ?>
            <div class="sigma_portfolio-details-item">
              <span><?php echo esc_html($sigma_event_date); ?></span>
              <h5><?php esc_html_e('Date', 'gautama'); ?></h5>
            </div>
          <?php } if($sigma_event_location) { ?>
            <div class="sigma_portfolio-details-item">
              <span><?php echo esc_html($sigma_event_location); ?></span>
              <h5><?php esc_html_e('Venu', 'gautama'); ?></h5>
            </div>
          <?php } if($sigma_event_speaker) { ?>
              <div class="sigma_portfolio-details-item">
                <span><?php echo esc_html($sigma_event_speaker); ?></span>
                <h5><?php esc_html_e('Speakers', 'gautama'); ?></h5>
              </div>
            <?php } ?>
            </div>
          <?php } } ?>
		</div>
	<div class="sigma-portfolio-content">
		<?php the_content(); ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
