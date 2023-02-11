<?php
/**
 * Counter shortcode styel 4 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_counter' ][ 'atts' ];
if ( $atts[ 'counter_number' ] ) {
	$border_class = isset($atts['hide_border']) && $atts['hide_border'] == true ? 'border-hidden' : '';
?>
<div class="counter-box <?php echo esc_attr($border_class); ?>">
		<h4><span class="counter"><?php echo esc_html( $atts[ 'counter_number' ] ); ?></span></h4>
      <div class="sigma_content">
  		<?php if($atts['counter_title']) { ?>
			     <h5 class="title"><?php echo html_entity_decode(vc_value_from_safe($atts['counter_title'], true)); ?></h5>
		  <?php } ?>
		</div>
	</div>
<?php }
