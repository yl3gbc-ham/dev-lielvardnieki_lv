<?php
/**
 * Event shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_event_details' ][ 'atts' ];
$event_details = get_post_meta( get_the_ID(), 'sigma_event_details', true );
$sigma_event_date = gautama_is_not_empty($event_details, 'sigma_event_date') ? $event_details['sigma_event_date'] : '';
$sigma_event_location = gautama_is_not_empty($event_details, 'sigma_event_location') ? $event_details['sigma_event_location'] : '';
$sigma_event_speaker = gautama_is_not_empty($event_details, 'sigma_event_speaker') ? $event_details['sigma_event_speaker'] : '';
?>
<?php if($sigma_event_date || $sigma_event_location || $sigma_event_speaker && is_singular('event')) { ?>
  <div class="sigma-portfolio-thumbnail">
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
  </div>
<?php } else { ?>
    <h4 class="event-details-error"><?php esc_html_e('No Details Found. Please add meta details in this event', 'sigma-core'); ?></h4>
<?php } ?>
