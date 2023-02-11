<?php // phpcs:ignore WordPress.Files.FileName.NotHyphenatedLowercase
/**
 * Ovveride vc_row template in theme.
 *
 * @package Gautama
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$atts                 = vc_map_get_attributes( $this->getShortcode(), $atts );
$el_class             = isset( $atts['el_class'] ) ? $atts['el_class'] : '';
$full_height          = isset( $atts['full_height'] ) ? $atts['full_height'] : '';
$parallax_speed_bg    = isset( $atts['parallax_speed_bg'] ) ? $atts['parallax_speed_bg'] : '';
$parallax_speed_video = isset( $atts['parallax_speed_video'] ) ? $atts['parallax_speed_video'] : '';
$full_width           = isset( $atts['full_width'] ) ? $atts['full_width'] : '';
$equal_height         = isset( $atts['equal_height'] ) ? $atts['equal_height'] : '';
$flex_row             = isset( $atts['flex_row'] ) ? $atts['flex_row'] : '';
$columns_placement    = isset( $atts['columns_placement'] ) ? $atts['columns_placement'] : '';
$content_placement    = isset( $atts['content_placement'] ) ? $atts['content_placement'] : '';
$parallax             = isset( $atts['parallax'] ) ? $atts['parallax'] : '';
$parallax_image       = isset( $atts['parallax_image'] ) ? $atts['parallax_image'] : '';
$css                  = isset( $atts['css'] ) ? $atts['css'] : '';
$el_id                = isset( $atts['el_id'] ) ? $atts['el_id'] : '';
$video_bg             = isset( $atts['video_bg'] ) ? $atts['video_bg'] : '';
$video_bg_url         = isset( $atts['video_bg_url'] ) ? $atts['video_bg_url'] : '';
$video_bg_parallax    = isset( $atts['video_bg_parallax'] ) ? $atts['video_bg_parallax'] : '';
$css_animation        = isset( $atts['css_animation'] ) ? $atts['css_animation'] : '';
$disable_element      = isset( $atts['disable_element'] ) ? $atts['disable_element'] : '';
$row_css_md           = isset( $atts['row_css_md'] ) ? $atts['row_css_md'] : '';
$row_css_sm           = isset( $atts['row_css_sm'] ) ? $atts['row_css_sm'] : '';
$row_css_xs           = isset( $atts['row_css_xs'] ) ? $atts['row_css_xs'] : '';
$bg_color_scheme      = isset( $atts['bg_color_scheme'] ) ? $atts['bg_color_scheme'] : '';
$bg_position          = isset( $atts['bg_position'] ) ? $atts['bg_position'] : '';
$title_color_scheme   = isset( $atts['title_color_scheme'] ) ? $atts['title_color_scheme'] : '';
$output               = '';
$after_output         = '';
wp_enqueue_script( 'wpb_composer_front_js' );
$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_classes = array(
	'vc_row',
	'wpb_row',
	// deprecated
	'vc_row-fluid',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
	vc_shortcode_custom_css_class( $row_css_md ),
	vc_shortcode_custom_css_class( $row_css_sm ),
	vc_shortcode_custom_css_class( $row_css_xs ),
);
if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}
if ( vc_shortcode_custom_css_has_property( $css, array( 'border', 'background' ) ) || $video_bg || $parallax ) {
	$css_classes[] = 'vc_row-has-fill';
}
if ( ! empty( $atts['gap'] ) ) {
	$css_classes[] = 'vc_column-gap-' . $atts['gap'];
}
if ( ! empty( $atts['rtl_reverse'] ) ) {
	$css_classes[] = 'vc_rtl-columns-reverse';
}
if ( isset( $bg_color_scheme ) && ! empty( $bg_color_scheme ) ) {
	$css_classes[] = 'sigma-bg-color-' . $bg_color_scheme;
}
if ( isset( $bg_position ) && ! empty( $bg_position ) ) {
	$css_classes[] = 'sigma-background-position-' . $bg_position;
}
if ( isset( $title_color_scheme ) && ! empty( $title_color_scheme ) ) {
	$css_classes[] = 'sigma-title-color-' . $title_color_scheme;
}
$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
if ( ! empty( $full_width ) ) {
	$wrapper_attributes[] = 'data-vc-full-width="true"';
	$wrapper_attributes[] = 'data-vc-full-width-init="false"';
	if ( 'stretch_row_content' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
	} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
		$css_classes[]        = 'vc_row-no-padding';
	}
	$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
}
if ( ! empty( $full_height ) ) {
	$css_classes[] = 'vc_row-o-full-height';
	if ( ! empty( $columns_placement ) ) {
		$flex_row      = true;
		$css_classes[] = 'vc_row-o-columns-' . $columns_placement;
		if ( 'stretch' === $columns_placement ) {
			$css_classes[] = 'vc_row-o-equal-height';
		}
	}
}
if ( ! empty( $equal_height ) ) {
	$flex_row      = true;
	$css_classes[] = 'vc_row-o-equal-height';
}
if ( ! empty( $content_placement ) ) {
	$flex_row      = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}
if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}
$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );
$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax       = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[]  = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}
if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[]        = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[]        = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}
if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id  = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= $after_output;
return $output;
