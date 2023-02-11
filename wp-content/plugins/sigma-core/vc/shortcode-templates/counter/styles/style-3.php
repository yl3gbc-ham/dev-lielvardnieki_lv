<?php
/**
 * Counter shortcode styel 3 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_counter' ][ 'atts' ];
if ( $atts[ 'counter_number' ] ) {
?>
<div class="counter-box">
		<h4><span class="counter"><?php echo esc_html( $atts[ 'counter_number' ] ); ?></span><?php echo esc_html( $atts[ 'counter_value_text' ] ); ?></h4>
	    <div class="sigma_dots"></div>
		<?php if($atts['counter_title']) { ?>
			<h5 class="title"><?php echo esc_html( $atts[ 'counter_title' ] ); ?></h5>
		<?php } ?>
</div>
<?php }
