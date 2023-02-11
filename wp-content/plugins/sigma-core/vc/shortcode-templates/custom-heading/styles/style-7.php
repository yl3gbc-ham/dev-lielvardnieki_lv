<?php
/**
 * Custom heading shortcode style 6 template file.
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
	<?php
	if ( $atts[ 'subtitle' ] ) {
		?>
		<div class="sigma-heading-subtitle-wrapper">
			<<?php echo esc_attr( $atts[ 'subtitle_element' ] ); ?> class="heading-subtitle <?php echo esc_attr($atts['subtitle_text_transform']) ?>">
      <span></span>
				<?php
  				echo wp_kses(
  					$atts[ 'subtitle' ],
  					wp_kses_allowed_html( 'post' )
  				);
  				?>
          <span></span>
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
