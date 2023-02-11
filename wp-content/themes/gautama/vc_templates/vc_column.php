<?php // phpcs:ignore WordPress.Files.FileName.NotHyphenatedLowercase
/**
 * Ovveride vc_column template in theme. 
 *
 * @package Gautama
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts                 = vc_map_get_attributes( $this->getShortcode(), $atts );
$el_class             = isset( $atts['el_class'] ) ? $atts['el_class'] : '';
$el_id                = isset( $atts['el_id'] ) ? $atts['el_id'] : '';
$width                = isset( $atts['width'] ) ? $atts['width'] : '';
$parallax_speed_bg    = isset( $atts['parallax_speed_bg'] ) ? $atts['parallax_speed_bg'] : '';
$parallax_speed_video = isset( $atts['parallax_speed_video'] ) ? $atts['parallax_speed_video'] : '';
$parallax             = isset( $atts['parallax'] ) ? $atts['parallax'] : '';
$parallax_image       = isset( $atts['parallax_image'] ) ? $atts['parallax_image'] : '';
$video_bg             = isset( $atts['video_bg'] ) ? $atts['video_bg'] : '';
$video_bg_url         = isset( $atts['video_bg_url'] ) ? $atts['video_bg_url'] : '';
$video_bg_parallax    = isset( $atts['video_bg_parallax'] ) ? $atts['video_bg_parallax'] : '';
$offset               = isset( $atts['offset'] ) ? $atts['offset'] : '';
$column_css_md        = isset( $atts['column_css_md'] ) ? $atts['column_css_md'] : '';
$column_css_sm        = isset( $atts['column_css_sm'] ) ? $atts['column_css_sm'] : '';
$column_css_xs        = isset( $atts['column_css_xs'] ) ? $atts['column_css_xs'] : '';
$bg_color_scheme      = isset( $atts['bg_color_scheme'] ) ? $atts['bg_color_scheme'] : '';
$bg_position          = isset( $atts['bg_position'] ) ? $atts['bg_position'] : '';
$title_color_scheme   = isset( $atts['title_color_scheme'] ) ? $atts['title_color_scheme'] : '';
$css_animation        = isset( $atts['css_animation'] ) ? $atts['css_animation'] : '';
$css           	      = isset( $atts['css'] ) ? $atts['css'] : ''; // phpcs:ignore WordPress.WhiteSpace.DisallowInlineTabs.NonIndentTabsUsed
$output               = '';

wp_enqueue_script( 'wpb_composer_front_js' );

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$css_classes = array(
	$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
	'wpb_column',
	'vc_column_container',
	$width,
);

if ( vc_shortcode_custom_css_has_property( $css, array( 'border', 'background' ) ) || $video_bg || $parallax ) {
	$css_classes[] = 'vc_col-has-fill';
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

$css_class            = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

$output            .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$inner_column_class = 'vc_column-inner ' . esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) );

if ( isset( $column_css_md ) && ! empty( $column_css_md ) ) {
	$inner_column_class .= ' ' . esc_attr( trim( vc_shortcode_custom_css_class( $column_css_md ) ) );
}

if ( isset( $column_css_sm ) && ! empty( $column_css_sm ) ) {
	$inner_column_class .= ' ' . esc_attr( trim( vc_shortcode_custom_css_class( $column_css_sm ) ) );
}

if ( isset( $column_css_xs ) && ! empty( $column_css_xs ) ) {
	$inner_column_class .= ' ' . esc_attr( trim( vc_shortcode_custom_css_class( $column_css_xs ) ) );
}

$output .= '<div class="' . trim( $inner_column_class ) . '">';
$output .= '<div class="wpb_wrapper">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';

return $output;
