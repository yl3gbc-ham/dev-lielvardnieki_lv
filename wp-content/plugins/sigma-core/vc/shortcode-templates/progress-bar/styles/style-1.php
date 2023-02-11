<?php
/**
 * Progress bar shortcode style 1 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_progress_bar' ][ 'atts' ];
$progress_bars = vc_param_group_parse_atts( $atts[ 'progress_bars' ] );
if ( $progress_bars ) {
	foreach( $progress_bars as $progress_bar ){
		?>
		<div class="sigma-progress-bar-wrapper">
			<div class="sigma-progress-bar-title-wrapper">
				<?php
				if ( isset( $progress_bar[ 'bar_label' ] )&& $progress_bar[ 'bar_label' ] ) {
					?>
					<h4 class="sigma-progress-bar-title"><?php echo esc_html( $progress_bar[ 'bar_label' ] ); ?></h4>
					<?php
				}
				if ( isset( $progress_bar[ 'bar_value' ] )&& $progress_bar[ 'bar_value' ] && is_int( ( int ) $progress_bar[ 'bar_value' ] ) ) {
					?>
					<span class="sigma-progress-bar-value"><?php echo esc_html( $progress_bar[ 'bar_value' ] ); ?><?php echo esc_html( $atts[ 'unit' ] ); ?></span>
					<?php
				}
				?>
			</div>
			<?php
			if ( is_int( ( int ) $progress_bar[ 'bar_value' ] ) && ( int ) $progress_bar[ 'bar_value' ] <= 100 ) {
				$width = ( int ) $progress_bar[ 'bar_value' ];
			} else {
				$width = 100;
			}
			?>
			<div class="sigma-progress-bar">
				<div class="sigma-progress-bar-inner" data-bar-value="<?php echo esc_attr( $width ); ?>"></div>
			</div>
		</div>
		<?php
	}
}
