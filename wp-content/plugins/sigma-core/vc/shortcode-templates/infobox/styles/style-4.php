<?php
/**
 * Infobox shortcode styel 1 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes, $sigma_vc_inline_css;
$atts = $sigma_shortcodes[ 'sigma_infobox' ][ 'atts' ];
?>
<div class="cta-section">
	<div class="cta-inner">
		<div class="cta-features">
			<div class="single-feature">
				<?php if ( $atts[ 'add_icon' ] ) {
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
					} else if ( $atts[ 'icon_as' ] === 'number' ) {
						if ( is_int( ( int ) $atts[ 'infobox_number' ] ) ) {
							?>
							<div class="icon">
								<span class="icon-number" data-content="<?php echo esc_html( $atts[ 'infobox_number' ] ); ?>"><?php echo esc_html( $atts[ 'infobox_number' ] ); ?></span>
							</div>
							<?php
						}
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
				} ?>
				<div class="cta-desc">
					<?php
					if ( $atts[ 'infobox_title' ] ) {
					?>
					<h4><?php echo esc_html( $atts[ 'infobox_title' ] ); ?></h4>
				<?php } if ( $atts[ 'content' ] ) { ?>
					<p><?php echo $atts[ 'content' ]; ?></p>
				<?php } if ( $atts[ 'add_count' ] ) { ?>
					<span class="count"><?php echo esc_html( $atts[ 'infobox_count' ] ); ?></span>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
