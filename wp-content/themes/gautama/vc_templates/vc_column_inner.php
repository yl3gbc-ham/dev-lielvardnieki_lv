<?php // phpcs:ignore WordPress.Files.FileName.NotHyphenatedLowercase
/**
 * Ovveride vc_column_inner template in theme.
 *
 * @package Gautama
 * @since $version
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts                = vc_map_get_attributes( $this->getShortcode(), $atts );
$el_class            = isset( $atts['el_class'] ) ? $atts['el_class'] : '';
$width               = isset( $atts['width'] ) ? $atts['width'] : '';
$el_id               = isset( $atts['el_id'] ) ? $atts['el_id'] : '';
$css                 = isset( $atts['css'] ) ? $atts['css'] : '';
$offset              = isset( $atts['offset'] ) ? $atts['offset'] : '';
$inner_column_css_md = isset( $atts['inner_column_css_md'] ) ? $atts['inner_column_css_md'] : '';
$inner_column_css_sm = isset( $atts['inner_column_css_sm'] ) ? $atts['inner_column_css_sm'] : '';
$inner_column_css_xs = isset( $atts['inner_column_css_xs'] ) ? $atts['inner_column_css_xs'] : '';
$bg_color_scheme     = isset( $atts['bg_color_scheme'] ) ? $atts['bg_color_scheme'] : '';
$bg_position         = isset( $atts['bg_position'] ) ? $atts['bg_position'] : '';
$title_color_scheme  = isset( $atts['title_color_scheme'] ) ? $atts['title_color_scheme'] : '';
$output              = '';
$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );
$css_classes = array(
	$this->getExtraClass( $el_class ),
	'wpb_column',
	'vc_column_container',
	$width,
);

if ( vc_shortcode_custom_css_has_property( $css, array( 'border', 'background' ) ) ) {
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
$css_class          = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
$output            .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$inner_column_class = 'vc_column-inner ' . esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) );
if ( isset( $inner_column_css_md ) && ! empty( $inner_column_css_md ) ) {
	$inner_column_class .= ' ' . esc_attr( trim( vc_shortcode_custom_css_class( $inner_column_css_md ) ) );
}
if ( isset( $inner_column_css_sm ) && ! empty( $inner_column_css_sm ) ) {
	$inner_column_class .= ' ' . esc_attr( trim( vc_shortcode_custom_css_class( $inner_column_css_sm ) ) );
}
if ( isset( $inner_column_css_xs ) && ! empty( $inner_column_css_xs ) ) {
	$inner_column_class .= ' ' . esc_attr( trim( vc_shortcode_custom_css_class( $inner_column_css_xs ) ) );
}
$output .= '<div class="' . trim( $inner_column_class ) . '">';
$output .= '<div class="wpb_wrapper">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
return $output;
