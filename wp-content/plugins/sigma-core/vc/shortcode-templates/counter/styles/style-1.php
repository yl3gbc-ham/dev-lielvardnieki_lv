<?php
/**
 * Counter shortcode styel 1 template file.
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
		<?php
		if ( $atts[ 'add_icon' ] ) {
			if ( $atts[ 'icon_as' ] === 'image' ) {
				?>
				<div class="icon">
				<?php
				if ( $atts[ 'icon_image' ] ) {
					$image_data = wp_get_attachment_image_src( $atts[ 'icon_image' ], 'thumbnail' );
					$image_url  = ( isset( $image_data[0] ) && $image_data[0] ) ? $image_data[0] : '';
					if ( $image_url ) {
						?>
						<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php esc_attr_e( 'Icon', 'sigma-core' ) ?>">
						<?php
					}
				}
				?>
				</div>
				<?php
			} else {
				if ( $atts[ 'icon_type' ] ) {
					$icon_type = 'icon_' . $atts[ 'icon_type' ];
					vc_icon_element_fonts_enqueue( $atts[ 'icon_type' ] );
					if ( isset( $atts[ $icon_type ] ) && $atts[ $icon_type ] ) {
						?>
						<div class="icon"><i class="<?php echo esc_attr( $atts[ $icon_type ] ); ?>"></i></div>
						<?php
					}
				}
			}
		}
		?>
		<h4><span class="counter"><?php echo esc_html( $atts[ 'counter_number' ] ); ?></span><?php echo esc_html( $atts[ 'counter_value_text' ] ); ?><span class="plus-icon"><?php echo esc_html('+', 'sigma-core'); ?></span></h4>
		<?php if($atts['counter_title']) { ?>
			<span class="title"><?php echo esc_html( $atts[ 'counter_title' ] ); ?></span>
		<?php } ?>
</div>
<?php }
