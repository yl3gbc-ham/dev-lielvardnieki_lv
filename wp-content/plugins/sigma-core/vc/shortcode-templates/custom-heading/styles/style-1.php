<?php
/**
 * Custom heading shortcode styel 1 template file.
 *
 * @package sigma Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_custom_heading' ][ 'atts' ];
?>
<div class="section-title sigma-custom-heading-wrapper">
	<?php if ( $atts[ 'add_icon' ] ) { ?>
		<div class="icon">
			<?php
			if ( $atts[ 'icon_as' ] === 'image' ) {

				if ( $atts[ 'icon_image' ] ) {
					$image_data = wp_get_attachment_image_src( $atts[ 'icon_image' ], 'thumbnail' );
					$image_url  = ( isset( $image_data[0] ) && $image_data[0] ) ? $image_data[0] : '';
					if ( $image_url ) {
						?>
						<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php esc_attr_e( 'Icon', 'sigma-core' ) ?>">
						<?php
					}
				}

			} else if ( $atts[ 'icon_as' ] === 'custom' ) {

				if ( $atts[ 'content' ] ) {
					$atts['content'] = rawurldecode( base64_decode( wp_strip_all_tags( $atts['content'] ) ) );
					$atts['content'] = wpb_js_remove_wpautop( apply_filters( 'vc_raw_html_module_content', $atts['content'] ) );

					echo $atts['content'];
				}

			} else {
				if ( $atts[ 'icon_type' ] ) {
					$icon_type = 'icon_' . $atts[ 'icon_type' ];
					vc_icon_element_fonts_enqueue( $atts[ 'icon_type' ] );
					if ( isset( $atts[ $icon_type ] ) && $atts[ $icon_type ] ) {
						?>
						<i class="<?php echo esc_attr( $atts[ $icon_type ] ); ?>"></i>
						<?php
					}
				}
			}
			?>
		</div>
	<?php } ?>
	<?php
	if ( $atts[ 'subtitle' ] ) {
		?>
		<div class="sigma-heading-subtitle-wrapper">
			<<?php echo esc_attr( $atts[ 'subtitle_element' ] ); ?> class="heading-subtitle <?php echo esc_attr($atts['subtitle_text_transform']) ?>">
				<?php
				echo wp_kses(
					$atts[ 'subtitle' ],
					wp_kses_allowed_html( 'post' )
				);
				?>
			</<?php echo esc_attr( $atts[ 'subtitle_element' ] ); ?>>
		</div>
		<?php
	}
	if ( $atts[ 'title' ] ) {
		?>
		<div class="sigma-heading-title-wrapper">
			<<?php echo esc_attr( $atts[ 'title_element' ] ); ?> class="heading-title <?php echo esc_attr($atts['title_text_transform']) ?>">
				<?php
				echo wp_kses(
					$atts[ 'title' ],
					wp_kses_allowed_html( 'post' )
				);
				?>
			</<?php echo esc_attr( $atts[ 'title_element' ] ); ?>>
		</div>
		<?php
	}
	?>
</div>
