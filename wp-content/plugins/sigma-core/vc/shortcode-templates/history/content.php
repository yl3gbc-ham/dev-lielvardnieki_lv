<?php
/**
 * CTA shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_history' ][ 'atts' ];
if ( ! $atts['history_list'] ) {
	return;
}
$history_lists = vc_param_group_parse_atts( $atts['history_list'] );
?>
<div class="sigma_timeline">
<?php foreach($history_lists as $history_list) {
  ?>
  <div class="row no-gutters justify-content-end justify-content-md-around align-items-start sigma_timeline-nodes">
    <div class="col-12 col-md-5 order-3 order-md-1 sigma_timeline-content">
      <?php if(isset($history_list['history_title']) && !empty($history_list['history_title'])) { ?>
      <h4><?php echo esc_html($history_list['history_title']); ?></h4>
    <?php } if(isset($history_list['history_content']) && !empty($history_list['history_content'])) { ?>
      <p><?php echo html_entity_decode(vc_value_from_safe($history_list['history_content'], true)); ?></p>
    <?php } ?>
    </div>
    <div class="col-2 col-sm-1 px-md-3 order-2 sigma_timeline-image text-md-center">
      <i class="far fa-circle"></i>
    </div>
    <div class="col-12 col-md-5 order-1 order-md-3 pb-3 sigma_timeline-date">
      <?php if(isset($history_list['history_date']) && !empty($history_list['history_date'])) { ?>
        <?php echo html_entity_decode(vc_value_from_safe($history_list['history_date'], true)); ?>
      <?php } ?>
    </div>
  </div>
<?php } ?>
</div>
