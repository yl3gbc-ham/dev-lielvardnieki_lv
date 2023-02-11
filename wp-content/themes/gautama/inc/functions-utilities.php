<?php
/**
* Gautama Utility functions
*
* @package Gautama
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Checks if Give Donation plugin is active.
 *
 * @since 1.0.0
 */
function gautama_is_give_active(){
    return class_exists('Give');
}

/**
 * Gets the ID of the current page.
 *
 * @since 1.0.0
 */
function gautama_get_page_id(){

  global $post;
  return is_home() ? get_option( 'page_for_posts' ) : (isset( $post->ID ) ? $post->ID : '');

}

/**
 * Checks if a value is set and and not empty
 *
 * @since 1.0.0
 */
function gautama_is_not_empty( $val, $index = '' ){

	return !empty($index) ? isset( $val[$index] ) && $val[$index] : isset( $val ) && $val;

}

/**
 * Get's the currently assigned page layout
 *
 * @since 1.0.0
 */
function gautama_get_layout_id(){

  // Get's the page layout set in the page/post options
  $page_settings = get_post_meta( gautama_get_page_id(), 'sigma_page_settings', true );
  $layout_id = isset($page_settings['sigma_page_custom_layout']) ? $page_settings['sigma_page_custom_layout'] : '';

  if ( ! empty( $layout_id )  && get_post_type( $layout_id ) == 'layouts' ){
    return $layout_id;
  }
  return false;

}

/**
 * Returns an option value based on the layout set for that page
 *
 * @since 1.0.0
 */
function gautama_get_layout_option( $option ){

  $layout_id = gautama_get_layout_id();

  // Check if we have a custom layout for this page
  if( $layout_id ){
    $layout_settings = get_post_meta( $layout_id, 'sigma_layout_settings', true );
    $value = isset($layout_settings[$option]) ? $layout_settings[$option] : '';
    if( ! empty( $value ) ){
      return $value;
    }
  }

	return false;

}

/**
 * Get theme options configuration
 *
 * @param string $name - the name of the theme option.
 * @param string $default - value to return if the option is not set.
 *
 * @since 1.0.0
 */
function gautama_get_option( $name, $default = '' ){

  global $gautama_options;

	$layout_id = gautama_get_layout_id();
	$custom_option = gautama_get_layout_option( $name );

	if($custom_option && $layout_id){
		return $custom_option;
	}else{
		return isset( $gautama_options[ $name ] ) ? $gautama_options[ $name ] : $default;
	}

}

/**
 * Checks if theme options is active
 *
 * @since 1.0.0
 */
function gautama_isset_options(){

	global $gautama_options;

	return !empty($gautama_options);
}

/**
 * Return image size multiplier
 *
 * @since 1.0.0
 */
function gautama_get_retina_multiplier() {
	return max( 1, gautama_get_option( 'retina_ready', 1 ) );
}

/**
 * Return an image sizes, alogn with its multiplier
 *
 * @since 1.0.0
 */
function gautama_get_thumb_size( $size ) {
	$retina = gautama_get_retina_multiplier() > 1 ? '-@retina' : '';
	return $size . $retina;
}

/**
 * Returns the first term of a post.
 *
 * @since 1.0.0
 */
function gautama_get_first_term( $post_id, $tax ){

	$terms = get_the_terms( $post_id, $tax );
	return ( isset($terms[0]) && $terms[0] ) ? $terms[0] : '';

}

/**
 * Darken a color.
 *
 * @since 1.0.0
 */
function gautama_darken_color($rgb, $darker = 2) {
  $hash = (strpos($rgb, '#') !== false) ? '#' : '';
  $rgb = (strlen($rgb) == 7) ? str_replace('#', '', $rgb) : ((strlen($rgb) == 6) ? $rgb : false);
  if(strlen($rgb) != 6) return $hash.'000000';
  $darker = ($darker > 1) ? $darker : 1;

  list($R16,$G16,$B16) = str_split($rgb,2);

  $R = sprintf("%02X", floor(hexdec($R16)/$darker));
  $G = sprintf("%02X", floor(hexdec($G16)/$darker));
  $B = sprintf("%02X", floor(hexdec($B16)/$darker));

  return $hash.$R.$G.$B;
}

/**
 * Convert a color ot rgb.
 *
 * @since 1.0.0
 */
function gautama_hex_to_rgb($hex, $alpha = false) {
  $hex      = sanitize_hex_color($hex);
  $hex      = str_replace('#', '', $hex);
  $length   = strlen($hex);
  $rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
  $rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
  $rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
  if ( $alpha ) {
    $rgb['a'] = $alpha;
  }
  return $rgb;
}


/**
 * Check if WooCommerce plugin is active.
 *
 * @since 1.0.0
 */
function gautama_is_woo_active(){
  return class_exists('WooCommerce');
}

/**
 * Checks if YITH Quick view is active.
 *
 * @since 1.0.0
 */
function gautama_is_yith_wcqv_active(){
  return class_exists('YITH_WCQV');
}

/**
 * Checks if YITH Wish List is active.
 *
 * @since 1.0.0
 */
function gautama_is_yith_wcwl_active(){
  return class_exists('YITH_WCWL');
}

/**
 * Checks if YITH Compare is active.
 *
 * @since 1.0.0
 */
function gautama_is_yith_woocompare_active(){
  return class_exists('YITH_Woocompare');
}

/**
 * Checks if YITH Compare is active.
 *
 * @since 1.0.0
 */
function gautama_is_rev_slider_active(){
  return class_exists( 'RevSlider' );
}

/**
* Returns all the aliases of the slider revolution sliders.
*
* @since 1.0.0
*/
function gautama_get_rev_sliders(){

	if ( !gautama_is_rev_slider_active() ) {
		return false;
	}

	$rev_sliders = [];
	$slider = new RevSlider();
	$objSliders = $slider->get_sliders();

	foreach ($objSliders as $slider) {
		$rev_sliders[$slider->alias] = $slider->title;
	}

	return $rev_sliders;

}

/**
* Returns all fontawesome icons.
*
* @since 1.0.0
*/
function gautama_get_fa_icons() {

  return array (
    'fab fa-500px' => esc_html__( '500px', 'gautama' ),
    'fab fa-accessible-icon' => esc_html__( 'accessible-icon', 'gautama' ),
    'fab fa-accusoft' => esc_html__( 'accusoft', 'gautama' ),
    'fas fa-address-book' => esc_html__( 'address-book', 'gautama' ),
    'far fa-address-book' => esc_html__( 'address-book', 'gautama' ),
    'fas fa-address-card' => esc_html__( 'address-card', 'gautama' ),
    'far fa-address-card' => esc_html__( 'address-card', 'gautama' ),
    'fas fa-adjust' => esc_html__( 'adjust', 'gautama' ),
    'fab fa-adn' => esc_html__( 'adn', 'gautama' ),
    'fab fa-adversal' => esc_html__( 'adversal', 'gautama' ),
    'fab fa-affiliatetheme' => esc_html__( 'affiliatetheme', 'gautama' ),
    'fab fa-algolia' => esc_html__( 'algolia', 'gautama' ),
    'fas fa-align-center' => esc_html__( 'align-center', 'gautama' ),
    'fas fa-align-justify' => esc_html__( 'align-justify', 'gautama' ),
    'fas fa-align-left' => esc_html__( 'align-left', 'gautama' ),
    'fas fa-align-right' => esc_html__( 'align-right', 'gautama' ),
    'fas fa-allergies' => esc_html__( 'allergies', 'gautama' ),
    'fab fa-amazon' => esc_html__( 'amazon', 'gautama' ),
    'fab fa-amazon-pay' => esc_html__( 'amazon-pay', 'gautama' ),
    'fas fa-ambulance' => esc_html__( 'ambulance', 'gautama' ),
    'fas fa-american-sign-language-interpreting' => esc_html__( 'american-sign-language-interpreting', 'gautama' ),
    'fab fa-amilia' => esc_html__( 'amilia', 'gautama' ),
    'fas fa-anchor' => esc_html__( 'anchor', 'gautama' ),
    'fab fa-android' => esc_html__( 'android', 'gautama' ),
    'fab fa-angellist' => esc_html__( 'angellist', 'gautama' ),
    'fas fa-angle-double-down' => esc_html__( 'angle-double-down', 'gautama' ),
    'fas fa-angle-double-left' => esc_html__( 'angle-double-left', 'gautama' ),
    'fas fa-angle-double-right' => esc_html__( 'angle-double-right', 'gautama' ),
    'fas fa-angle-double-up' => esc_html__( 'angle-double-up', 'gautama' ),
    'fas fa-angle-down' => esc_html__( 'angle-down', 'gautama' ),
    'fas fa-angle-left' => esc_html__( 'angle-left', 'gautama' ),
    'fas fa-angle-right' => esc_html__( 'angle-right', 'gautama' ),
    'fas fa-angle-up' => esc_html__( 'angle-up', 'gautama' ),
    'fab fa-angrycreative' => esc_html__( 'angrycreative', 'gautama' ),
    'fab fa-angular' => esc_html__( 'angular', 'gautama' ),
    'fab fa-app-store' => esc_html__( 'app-store', 'gautama' ),
    'fab fa-app-store-ios' => esc_html__( 'app-store-ios', 'gautama' ),
    'fab fa-apper' => esc_html__( 'apper', 'gautama' ),
    'fab fa-apple' => esc_html__( 'apple', 'gautama' ),
    'fab fa-apple-pay' => esc_html__( 'apple-pay', 'gautama' ),
    'fas fa-archive' => esc_html__( 'archive', 'gautama' ),
    'fas fa-arrow-alt-circle-down' => esc_html__( 'arrow-alt-circle-down', 'gautama' ),
    'far fa-arrow-alt-circle-down' => esc_html__( 'arrow-alt-circle-down', 'gautama' ),
    'fas fa-arrow-alt-circle-left' => esc_html__( 'arrow-alt-circle-left', 'gautama' ),
    'far fa-arrow-alt-circle-left' => esc_html__( 'arrow-alt-circle-left', 'gautama' ),
    'fas fa-arrow-alt-circle-right' => esc_html__( 'arrow-alt-circle-right', 'gautama' ),
    'far fa-arrow-alt-circle-right' => esc_html__( 'arrow-alt-circle-right', 'gautama' ),
    'fas fa-arrow-alt-circle-up' => esc_html__( 'arrow-alt-circle-up', 'gautama' ),
    'far fa-arrow-alt-circle-up' => esc_html__( 'arrow-alt-circle-up', 'gautama' ),
    'fas fa-arrow-circle-down' => esc_html__( 'arrow-circle-down', 'gautama' ),
    'fas fa-arrow-circle-left' => esc_html__( 'arrow-circle-left', 'gautama' ),
    'fas fa-arrow-circle-right' => esc_html__( 'arrow-circle-right', 'gautama' ),
    'fas fa-arrow-circle-up' => esc_html__( 'arrow-circle-up', 'gautama' ),
    'fas fa-arrow-down' => esc_html__( 'arrow-down', 'gautama' ),
    'fas fa-arrow-left' => esc_html__( 'arrow-left', 'gautama' ),
    'fas fa-arrow-right' => esc_html__( 'arrow-right', 'gautama' ),
    'fas fa-arrow-up' => esc_html__( 'arrow-up', 'gautama' ),
    'fas fa-arrows-alt' => esc_html__( 'arrows-alt', 'gautama' ),
    'fas fa-arrows-alt-h' => esc_html__( 'arrows-alt-h', 'gautama' ),
    'fas fa-arrows-alt-v' => esc_html__( 'arrows-alt-v', 'gautama' ),
    'fas fa-assistive-listening-systems' => esc_html__( 'assistive-listening-systems', 'gautama' ),
    'fas fa-asterisk' => esc_html__( 'asterisk', 'gautama' ),
    'fab fa-asymmetrik' => esc_html__( 'asymmetrik', 'gautama' ),
    'fas fa-at' => esc_html__( 'at', 'gautama' ),
    'fab fa-audible' => esc_html__( 'audible', 'gautama' ),
    'fas fa-audio-description' => esc_html__( 'audio-description', 'gautama' ),
    'fab fa-autoprefixer' => esc_html__( 'autoprefixer', 'gautama' ),
    'fab fa-avianex' => esc_html__( 'avianex', 'gautama' ),
    'fab fa-aviato' => esc_html__( 'aviato', 'gautama' ),
    'fab fa-aws' => esc_html__( 'aws', 'gautama' ),
    'fas fa-backward' => esc_html__( 'backward', 'gautama' ),
    'fas fa-balance-scale' => esc_html__( 'balance-scale', 'gautama' ),
    'fas fa-ban' => esc_html__( 'ban', 'gautama' ),
    'fas fa-band-aid' => esc_html__( 'band-aid', 'gautama' ),
    'fab fa-bandcamp' => esc_html__( 'bandcamp', 'gautama' ),
    'fas fa-barcode' => esc_html__( 'barcode', 'gautama' ),
    'fas fa-bars' => esc_html__( 'bars', 'gautama' ),
    'fas fa-baseball-ball' => esc_html__( 'baseball-ball', 'gautama' ),
    'fas fa-basketball-ball' => esc_html__( 'basketball-ball', 'gautama' ),
    'fas fa-bath' => esc_html__( 'bath', 'gautama' ),
    'fas fa-battery-empty' => esc_html__( 'battery-empty', 'gautama' ),
    'fas fa-battery-full' => esc_html__( 'battery-full', 'gautama' ),
    'fas fa-battery-half' => esc_html__( 'battery-half', 'gautama' ),
    'fas fa-battery-quarter' => esc_html__( 'battery-quarter', 'gautama' ),
    'fas fa-battery-three-quarters' => esc_html__( 'battery-three-quarters', 'gautama' ),
    'fas fa-bed' => esc_html__( 'bed', 'gautama' ),
    'fas fa-beer' => esc_html__( 'beer', 'gautama' ),
    'fab fa-behance' => esc_html__( 'behance', 'gautama' ),
    'fab fa-behance-square' => esc_html__( 'behance-square', 'gautama' ),
    'fas fa-bell' => esc_html__( 'bell', 'gautama' ),
    'far fa-bell' => esc_html__( 'bell', 'gautama' ),
    'fas fa-bell-slash' => esc_html__( 'bell-slash', 'gautama' ),
    'far fa-bell-slash' => esc_html__( 'bell-slash', 'gautama' ),
    'fas fa-bicycle' => esc_html__( 'bicycle', 'gautama' ),
    'fab fa-bimobject' => esc_html__( 'bimobject', 'gautama' ),
    'fas fa-binoculars' => esc_html__( 'binoculars', 'gautama' ),
    'fas fa-birthday-cake' => esc_html__( 'birthday-cake', 'gautama' ),
    'fab fa-bitbucket' => esc_html__( 'bitbucket', 'gautama' ),
    'fab fa-bitcoin' => esc_html__( 'bitcoin', 'gautama' ),
    'fab fa-bity' => esc_html__( 'bity', 'gautama' ),
    'fab fa-black-tie' => esc_html__( 'black-tie', 'gautama' ),
    'fab fa-blackberry' => esc_html__( 'blackberry', 'gautama' ),
    'fas fa-blind' => esc_html__( 'blind', 'gautama' ),
    'fab fa-blogger' => esc_html__( 'blogger', 'gautama' ),
    'fab fa-blogger-b' => esc_html__( 'blogger-b', 'gautama' ),
    'fab fa-bluetooth' => esc_html__( 'bluetooth', 'gautama' ),
    'fab fa-bluetooth-b' => esc_html__( 'bluetooth-b', 'gautama' ),
    'fas fa-bold' => esc_html__( 'bold', 'gautama' ),
    'fas fa-bolt' => esc_html__( 'bolt', 'gautama' ),
    'fas fa-bomb' => esc_html__( 'bomb', 'gautama' ),
    'fas fa-book' => esc_html__( 'book', 'gautama' ),
    'fas fa-bookmark' => esc_html__( 'bookmark', 'gautama' ),
    'far fa-bookmark' => esc_html__( 'bookmark', 'gautama' ),
    'fas fa-bowling-ball' => esc_html__( 'bowling-ball', 'gautama' ),
    'fas fa-box' => esc_html__( 'box', 'gautama' ),
    'fas fa-box-open' => esc_html__( 'box-open', 'gautama' ),
    'fas fa-boxes' => esc_html__( 'boxes', 'gautama' ),
    'fas fa-braille' => esc_html__( 'braille', 'gautama' ),
    'fas fa-briefcase' => esc_html__( 'briefcase', 'gautama' ),
    'fas fa-briefcase-medical' => esc_html__( 'briefcase-medical', 'gautama' ),
    'fab fa-btc' => esc_html__( 'btc', 'gautama' ),
    'fas fa-bug' => esc_html__( 'bug', 'gautama' ),
    'fas fa-building' => esc_html__( 'building', 'gautama' ),
    'far fa-building' => esc_html__( 'building', 'gautama' ),
    'fas fa-bullhorn' => esc_html__( 'bullhorn', 'gautama' ),
    'fas fa-bullseye' => esc_html__( 'bullseye', 'gautama' ),
    'fas fa-burn' => esc_html__( 'burn', 'gautama' ),
    'fab fa-buromobelexperte' => esc_html__( 'buromobelexperte', 'gautama' ),
    'fas fa-bus' => esc_html__( 'bus', 'gautama' ),
    'fab fa-buysellads' => esc_html__( 'buysellads', 'gautama' ),
    'fas fa-calculator' => esc_html__( 'calculator', 'gautama' ),
    'fas fa-calendar' => esc_html__( 'calendar', 'gautama' ),
    'far fa-calendar' => esc_html__( 'calendar', 'gautama' ),
    'fas fa-calendar-alt' => esc_html__( 'calendar-alt', 'gautama' ),
    'far fa-calendar-alt' => esc_html__( 'calendar-alt', 'gautama' ),
    'fas fa-calendar-check' => esc_html__( 'calendar-check', 'gautama' ),
    'far fa-calendar-check' => esc_html__( 'calendar-check', 'gautama' ),
    'fas fa-calendar-minus' => esc_html__( 'calendar-minus', 'gautama' ),
    'far fa-calendar-minus' => esc_html__( 'calendar-minus', 'gautama' ),
    'fas fa-calendar-plus' => esc_html__( 'calendar-plus', 'gautama' ),
    'far fa-calendar-plus' => esc_html__( 'calendar-plus', 'gautama' ),
    'fas fa-calendar-times' => esc_html__( 'calendar-times', 'gautama' ),
    'far fa-calendar-times' => esc_html__( 'calendar-times', 'gautama' ),
    'fas fa-camera' => esc_html__( 'camera', 'gautama' ),
    'fas fa-camera-retro' => esc_html__( 'camera-retro', 'gautama' ),
    'fas fa-capsules' => esc_html__( 'capsules', 'gautama' ),
    'fas fa-car' => esc_html__( 'car', 'gautama' ),
    'fas fa-caret-down' => esc_html__( 'caret-down', 'gautama' ),
    'fas fa-caret-left' => esc_html__( 'caret-left', 'gautama' ),
    'fas fa-caret-right' => esc_html__( 'caret-right', 'gautama' ),
    'fas fa-caret-square-down' => esc_html__( 'caret-square-down', 'gautama' ),
    'far fa-caret-square-down' => esc_html__( 'caret-square-down', 'gautama' ),
    'fas fa-caret-square-left' => esc_html__( 'caret-square-left', 'gautama' ),
    'far fa-caret-square-left' => esc_html__( 'caret-square-left', 'gautama' ),
    'fas fa-caret-square-right' => esc_html__( 'caret-square-right', 'gautama' ),
    'far fa-caret-square-right' => esc_html__( 'caret-square-right', 'gautama' ),
    'fas fa-caret-square-up' => esc_html__( 'caret-square-up', 'gautama' ),
    'far fa-caret-square-up' => esc_html__( 'caret-square-up', 'gautama' ),
    'fas fa-caret-up' => esc_html__( 'caret-up', 'gautama' ),
    'fas fa-cart-arrow-down' => esc_html__( 'cart-arrow-down', 'gautama' ),
    'fas fa-cart-plus' => esc_html__( 'cart-plus', 'gautama' ),
    'fab fa-cc-amazon-pay' => esc_html__( 'cc-amazon-pay', 'gautama' ),
    'fab fa-cc-amex' => esc_html__( 'cc-amex', 'gautama' ),
    'fab fa-cc-apple-pay' => esc_html__( 'cc-apple-pay', 'gautama' ),
    'fab fa-cc-diners-club' => esc_html__( 'cc-diners-club', 'gautama' ),
    'fab fa-cc-discover' => esc_html__( 'cc-discover', 'gautama' ),
    'fab fa-cc-jcb' => esc_html__( 'cc-jcb', 'gautama' ),
    'fab fa-cc-mastercard' => esc_html__( 'cc-mastercard', 'gautama' ),
    'fab fa-cc-paypal' => esc_html__( 'cc-paypal', 'gautama' ),
    'fab fa-cc-stripe' => esc_html__( 'cc-stripe', 'gautama' ),
    'fab fa-cc-visa' => esc_html__( 'cc-visa', 'gautama' ),
    'fab fa-centercode' => esc_html__( 'centercode', 'gautama' ),
    'fas fa-certificate' => esc_html__( 'certificate', 'gautama' ),
    'fas fa-chart-area' => esc_html__( 'chart-area', 'gautama' ),
    'fas fa-chart-bar' => esc_html__( 'chart-bar', 'gautama' ),
    'far fa-chart-bar' => esc_html__( 'chart-bar', 'gautama' ),
    'fas fa-chart-line' => esc_html__( 'chart-line', 'gautama' ),
    'fas fa-chart-pie' => esc_html__( 'chart-pie', 'gautama' ),
    'fas fa-check' => esc_html__( 'check', 'gautama' ),
    'fas fa-check-circle' => esc_html__( 'check-circle', 'gautama' ),
    'far fa-check-circle' => esc_html__( 'check-circle', 'gautama' ),
    'fas fa-check-square' => esc_html__( 'check-square', 'gautama' ),
    'far fa-check-square' => esc_html__( 'check-square', 'gautama' ),
    'fas fa-chess' => esc_html__( 'chess', 'gautama' ),
    'fas fa-chess-bishop' => esc_html__( 'chess-bishop', 'gautama' ),
    'fas fa-chess-board' => esc_html__( 'chess-board', 'gautama' ),
    'fas fa-chess-king' => esc_html__( 'chess-king', 'gautama' ),
    'fas fa-chess-knight' => esc_html__( 'chess-knight', 'gautama' ),
    'fas fa-chess-pawn' => esc_html__( 'chess-pawn', 'gautama' ),
    'fas fa-chess-queen' => esc_html__( 'chess-queen', 'gautama' ),
    'fas fa-chess-rook' => esc_html__( 'chess-rook', 'gautama' ),
    'fas fa-chevron-circle-down' => esc_html__( 'chevron-circle-down', 'gautama' ),
    'fas fa-chevron-circle-left' => esc_html__( 'chevron-circle-left', 'gautama' ),
    'fas fa-chevron-circle-right' => esc_html__( 'chevron-circle-right', 'gautama' ),
    'fas fa-chevron-circle-up' => esc_html__( 'chevron-circle-up', 'gautama' ),
    'fas fa-chevron-down' => esc_html__( 'chevron-down', 'gautama' ),
    'fas fa-chevron-left' => esc_html__( 'chevron-left', 'gautama' ),
    'fas fa-chevron-right' => esc_html__( 'chevron-right', 'gautama' ),
    'fas fa-chevron-up' => esc_html__( 'chevron-up', 'gautama' ),
    'fas fa-child' => esc_html__( 'child', 'gautama' ),
    'fab fa-chrome' => esc_html__( 'chrome', 'gautama' ),
    'fas fa-circle' => esc_html__( 'circle', 'gautama' ),
    'far fa-circle' => esc_html__( 'circle', 'gautama' ),
    'fas fa-circle-notch' => esc_html__( 'circle-notch', 'gautama' ),
    'fas fa-clipboard' => esc_html__( 'clipboard', 'gautama' ),
    'far fa-clipboard' => esc_html__( 'clipboard', 'gautama' ),
    'fas fa-clipboard-check' => esc_html__( 'clipboard-check', 'gautama' ),
    'fas fa-clipboard-list' => esc_html__( 'clipboard-list', 'gautama' ),
    'fas fa-clock' => esc_html__( 'clock', 'gautama' ),
    'far fa-clock' => esc_html__( 'clock', 'gautama' ),
    'fas fa-clone' => esc_html__( 'clone', 'gautama' ),
    'far fa-clone' => esc_html__( 'clone', 'gautama' ),
    'fas fa-closed-captioning' => esc_html__( 'closed-captioning', 'gautama' ),
    'far fa-closed-captioning' => esc_html__( 'closed-captioning', 'gautama' ),
    'fas fa-cloud' => esc_html__( 'cloud', 'gautama' ),
    'fas fa-cloud-download-alt' => esc_html__( 'cloud-download-alt', 'gautama' ),
    'fas fa-cloud-upload-alt' => esc_html__( 'cloud-upload-alt', 'gautama' ),
    'fab fa-cloudscale' => esc_html__( 'cloudscale', 'gautama' ),
    'fab fa-cloudsmith' => esc_html__( 'cloudsmith', 'gautama' ),
    'fab fa-cloudversify' => esc_html__( 'cloudversify', 'gautama' ),
    'fas fa-code' => esc_html__( 'code', 'gautama' ),
    'fas fa-code-branch' => esc_html__( 'code-branch', 'gautama' ),
    'fab fa-codepen' => esc_html__( 'codepen', 'gautama' ),
    'fab fa-codiepie' => esc_html__( 'codiepie', 'gautama' ),
    'fas fa-coffee' => esc_html__( 'coffee', 'gautama' ),
    'fas fa-cog' => esc_html__( 'cog', 'gautama' ),
    'fas fa-cogs' => esc_html__( 'cogs', 'gautama' ),
    'fas fa-columns' => esc_html__( 'columns', 'gautama' ),
    'fas fa-comment' => esc_html__( 'comment', 'gautama' ),
    'far fa-comment' => esc_html__( 'comment', 'gautama' ),
    'fas fa-comment-alt' => esc_html__( 'comment-alt', 'gautama' ),
    'far fa-comment-alt' => esc_html__( 'comment-alt', 'gautama' ),
    'fas fa-comment-dots' => esc_html__( 'comment-dots', 'gautama' ),
    'fas fa-comment-slash' => esc_html__( 'comment-slash', 'gautama' ),
    'fas fa-comments' => esc_html__( 'comments', 'gautama' ),
    'far fa-comments' => esc_html__( 'comments', 'gautama' ),
    'fas fa-compass' => esc_html__( 'compass', 'gautama' ),
    'far fa-compass' => esc_html__( 'compass', 'gautama' ),
    'fas fa-compress' => esc_html__( 'compress', 'gautama' ),
    'fab fa-connectdevelop' => esc_html__( 'connectdevelop', 'gautama' ),
    'fab fa-contao' => esc_html__( 'contao', 'gautama' ),
    'fas fa-copy' => esc_html__( 'copy', 'gautama' ),
    'far fa-copy' => esc_html__( 'copy', 'gautama' ),
    'fas fa-copyright' => esc_html__( 'copyright', 'gautama' ),
    'far fa-copyright' => esc_html__( 'copyright', 'gautama' ),
    'fas fa-couch' => esc_html__( 'couch', 'gautama' ),
    'fab fa-cpanel' => esc_html__( 'cpanel', 'gautama' ),
    'fab fa-creative-commons' => esc_html__( 'creative-commons', 'gautama' ),
    'fas fa-credit-card' => esc_html__( 'credit-card', 'gautama' ),
    'far fa-credit-card' => esc_html__( 'credit-card', 'gautama' ),
    'fas fa-crop' => esc_html__( 'crop', 'gautama' ),
    'fas fa-crosshairs' => esc_html__( 'crosshairs', 'gautama' ),
    'fab fa-css3' => esc_html__( 'css3', 'gautama' ),
    'fab fa-css3-alt' => esc_html__( 'css3-alt', 'gautama' ),
    'fas fa-cube' => esc_html__( 'cube', 'gautama' ),
    'fas fa-cubes' => esc_html__( 'cubes', 'gautama' ),
    'fas fa-cut' => esc_html__( 'cut', 'gautama' ),
    'fab fa-cuttlefish' => esc_html__( 'cuttlefish', 'gautama' ),
    'fab fa-d-and-d' => esc_html__( 'd-and-d', 'gautama' ),
    'fab fa-dashcube' => esc_html__( 'dashcube', 'gautama' ),
    'fas fa-database' => esc_html__( 'database', 'gautama' ),
    'fas fa-deaf' => esc_html__( 'deaf', 'gautama' ),
    'fab fa-delicious' => esc_html__( 'delicious', 'gautama' ),
    'fab fa-deploydog' => esc_html__( 'deploydog', 'gautama' ),
    'fab fa-deskpro' => esc_html__( 'deskpro', 'gautama' ),
    'fas fa-desktop' => esc_html__( 'desktop', 'gautama' ),
    'fab fa-deviantart' => esc_html__( 'deviantart', 'gautama' ),
    'fas fa-diagnoses' => esc_html__( 'diagnoses', 'gautama' ),
    'fab fa-digg' => esc_html__( 'digg', 'gautama' ),
    'fab fa-digital-ocean' => esc_html__( 'digital-ocean', 'gautama' ),
    'fab fa-discord' => esc_html__( 'discord', 'gautama' ),
    'fab fa-discourse' => esc_html__( 'discourse', 'gautama' ),
    'fas fa-dna' => esc_html__( 'dna', 'gautama' ),
    'fab fa-dochub' => esc_html__( 'dochub', 'gautama' ),
    'fab fa-docker' => esc_html__( 'docker', 'gautama' ),
    'fas fa-dollar-sign' => esc_html__( 'dollar-sign', 'gautama' ),
    'fas fa-dolly' => esc_html__( 'dolly', 'gautama' ),
    'fas fa-dolly-flatbed' => esc_html__( 'dolly-flatbed', 'gautama' ),
    'fas fa-donate' => esc_html__( 'donate', 'gautama' ),
    'fas fa-dot-circle' => esc_html__( 'dot-circle', 'gautama' ),
    'far fa-dot-circle' => esc_html__( 'dot-circle', 'gautama' ),
    'fas fa-dove' => esc_html__( 'dove', 'gautama' ),
    'fas fa-download' => esc_html__( 'download', 'gautama' ),
    'fab fa-draft2digital' => esc_html__( 'draft2digital', 'gautama' ),
    'fab fa-dribbble' => esc_html__( 'dribbble', 'gautama' ),
    'fab fa-dribbble-square' => esc_html__( 'dribbble-square', 'gautama' ),
    'fab fa-dropbox' => esc_html__( 'dropbox', 'gautama' ),
    'fab fa-drupal' => esc_html__( 'drupal', 'gautama' ),
    'fab fa-dyalog' => esc_html__( 'dyalog', 'gautama' ),
    'fab fa-earlybirds' => esc_html__( 'earlybirds', 'gautama' ),
    'fab fa-edge' => esc_html__( 'edge', 'gautama' ),
    'fas fa-edit' => esc_html__( 'edit', 'gautama' ),
    'far fa-edit' => esc_html__( 'edit', 'gautama' ),
    'fas fa-eject' => esc_html__( 'eject', 'gautama' ),
    'fab fa-elementor' => esc_html__( 'elementor', 'gautama' ),
    'fas fa-ellipsis-h' => esc_html__( 'ellipsis-h', 'gautama' ),
    'fas fa-ellipsis-v' => esc_html__( 'ellipsis-v', 'gautama' ),
    'fab fa-ember' => esc_html__( 'ember', 'gautama' ),
    'fab fa-empire' => esc_html__( 'empire', 'gautama' ),
    'fas fa-envelope' => esc_html__( 'envelope', 'gautama' ),
    'far fa-envelope' => esc_html__( 'envelope', 'gautama' ),
    'fas fa-envelope-open' => esc_html__( 'envelope-open', 'gautama' ),
    'far fa-envelope-open' => esc_html__( 'envelope-open', 'gautama' ),
    'fas fa-envelope-square' => esc_html__( 'envelope-square', 'gautama' ),
    'fab fa-envira' => esc_html__( 'envira', 'gautama' ),
    'fas fa-eraser' => esc_html__( 'eraser', 'gautama' ),
    'fab fa-erlang' => esc_html__( 'erlang', 'gautama' ),
    'fab fa-ethereum' => esc_html__( 'ethereum', 'gautama' ),
    'fab fa-etsy' => esc_html__( 'etsy', 'gautama' ),
    'fas fa-euro-sign' => esc_html__( 'euro-sign', 'gautama' ),
    'fas fa-exchange-alt' => esc_html__( 'exchange-alt', 'gautama' ),
    'fas fa-exclamation' => esc_html__( 'exclamation', 'gautama' ),
    'fas fa-exclamation-circle' => esc_html__( 'exclamation-circle', 'gautama' ),
    'fas fa-exclamation-triangle' => esc_html__( 'exclamation-triangle', 'gautama' ),
    'fas fa-expand' => esc_html__( 'expand', 'gautama' ),
    'fas fa-expand-arrows-alt' => esc_html__( 'expand-arrows-alt', 'gautama' ),
    'fab fa-expeditedssl' => esc_html__( 'expeditedssl', 'gautama' ),
    'fas fa-external-link-alt' => esc_html__( 'external-link-alt', 'gautama' ),
    'fas fa-external-link-square-alt' => esc_html__( 'external-link-square-alt', 'gautama' ),
    'fas fa-eye' => esc_html__( 'eye', 'gautama' ),
    'fas fa-eye-dropper' => esc_html__( 'eye-dropper', 'gautama' ),
    'fas fa-eye-slash' => esc_html__( 'eye-slash', 'gautama' ),
    'far fa-eye-slash' => esc_html__( 'eye-slash', 'gautama' ),
    'fab fa-facebook' => esc_html__( 'facebook', 'gautama' ),
    'fab fa-facebook-f' => esc_html__( 'facebook-f', 'gautama' ),
    'fab fa-facebook-messenger' => esc_html__( 'facebook-messenger', 'gautama' ),
    'fab fa-facebook-square' => esc_html__( 'facebook-square', 'gautama' ),
    'fas fa-fast-backward' => esc_html__( 'fast-backward', 'gautama' ),
    'fas fa-fast-forward' => esc_html__( 'fast-forward', 'gautama' ),
    'fas fa-fax' => esc_html__( 'fax', 'gautama' ),
    'fas fa-female' => esc_html__( 'female', 'gautama' ),
    'fas fa-fighter-jet' => esc_html__( 'fighter-jet', 'gautama' ),
    'fas fa-file' => esc_html__( 'file', 'gautama' ),
    'far fa-file' => esc_html__( 'file', 'gautama' ),
    'fas fa-file-alt' => esc_html__( 'file-alt', 'gautama' ),
    'far fa-file-alt' => esc_html__( 'file-alt', 'gautama' ),
    'fas fa-file-archive' => esc_html__( 'file-archive', 'gautama' ),
    'far fa-file-archive' => esc_html__( 'file-archive', 'gautama' ),
    'fas fa-file-audio' => esc_html__( 'file-audio', 'gautama' ),
    'far fa-file-audio' => esc_html__( 'file-audio', 'gautama' ),
    'fas fa-file-code' => esc_html__( 'file-code', 'gautama' ),
    'far fa-file-code' => esc_html__( 'file-code', 'gautama' ),
    'fas fa-file-excel' => esc_html__( 'file-excel', 'gautama' ),
    'far fa-file-excel' => esc_html__( 'file-excel', 'gautama' ),
    'fas fa-file-image' => esc_html__( 'file-image', 'gautama' ),
    'far fa-file-image' => esc_html__( 'file-image', 'gautama' ),
    'fas fa-file-medical' => esc_html__( 'file-medical', 'gautama' ),
    'fas fa-file-medical-alt' => esc_html__( 'file-medical-alt', 'gautama' ),
    'fas fa-file-pdf' => esc_html__( 'file-pdf', 'gautama' ),
    'far fa-file-pdf' => esc_html__( 'file-pdf', 'gautama' ),
    'fas fa-file-powerpoint' => esc_html__( 'file-powerpoint', 'gautama' ),
    'far fa-file-powerpoint' => esc_html__( 'file-powerpoint', 'gautama' ),
    'fas fa-file-video' => esc_html__( 'file-video', 'gautama' ),
    'far fa-file-video' => esc_html__( 'file-video', 'gautama' ),
    'fas fa-file-word' => esc_html__( 'file-word', 'gautama' ),
    'far fa-file-word' => esc_html__( 'file-word', 'gautama' ),
    'fas fa-film' => esc_html__( 'film', 'gautama' ),
    'fas fa-filter' => esc_html__( 'filter', 'gautama' ),
    'fas fa-fire' => esc_html__( 'fire', 'gautama' ),
    'fas fa-fire-extinguisher' => esc_html__( 'fire-extinguisher', 'gautama' ),
    'fab fa-firefox' => esc_html__( 'firefox', 'gautama' ),
    'fas fa-first-aid' => esc_html__( 'first-aid', 'gautama' ),
    'fab fa-first-order' => esc_html__( 'first-order', 'gautama' ),
    'fab fa-firstdraft' => esc_html__( 'firstdraft', 'gautama' ),
    'fas fa-flag' => esc_html__( 'flag', 'gautama' ),
    'far fa-flag' => esc_html__( 'flag', 'gautama' ),
    'fas fa-flag-checkered' => esc_html__( 'flag-checkered', 'gautama' ),
    'fas fa-flask' => esc_html__( 'flask', 'gautama' ),
    'fab fa-flickr' => esc_html__( 'flickr', 'gautama' ),
    'fab fa-flipboard' => esc_html__( 'flipboard', 'gautama' ),
    'fab fa-fly' => esc_html__( 'fly', 'gautama' ),
    'fas fa-folder' => esc_html__( 'folder', 'gautama' ),
    'far fa-folder' => esc_html__( 'folder', 'gautama' ),
    'fas fa-folder-open' => esc_html__( 'folder-open', 'gautama' ),
    'far fa-folder-open' => esc_html__( 'folder-open', 'gautama' ),
    'fas fa-font' => esc_html__( 'font', 'gautama' ),
    'fab fa-font-awesome' => esc_html__( 'font-awesome', 'gautama' ),
    'fab fa-font-awesome-alt' => esc_html__( 'font-awesome-alt', 'gautama' ),
    'fab fa-font-awesome-flag' => esc_html__( 'font-awesome-flag', 'gautama' ),
    'fab fa-fonticons' => esc_html__( 'fonticons', 'gautama' ),
    'fab fa-fonticons-fi' => esc_html__( 'fonticons-fi', 'gautama' ),
    'fas fa-football-ball' => esc_html__( 'football-ball', 'gautama' ),
    'fab fa-fort-awesome' => esc_html__( 'fort-awesome', 'gautama' ),
    'fab fa-fort-awesome-alt' => esc_html__( 'fort-awesome-alt', 'gautama' ),
    'fab fa-forumbee' => esc_html__( 'forumbee', 'gautama' ),
    'fas fa-forward' => esc_html__( 'forward', 'gautama' ),
    'fab fa-foursquare' => esc_html__( 'foursquare', 'gautama' ),
    'fab fa-free-code-camp' => esc_html__( 'free-code-camp', 'gautama' ),
    'fab fa-freebsd' => esc_html__( 'freebsd', 'gautama' ),
    'fas fa-frown' => esc_html__( 'frown', 'gautama' ),
    'far fa-frown' => esc_html__( 'frown', 'gautama' ),
    'fas fa-futbol' => esc_html__( 'futbol', 'gautama' ),
    'far fa-futbol' => esc_html__( 'futbol', 'gautama' ),
    'fas fa-gamepad' => esc_html__( 'gamepad', 'gautama' ),
    'fas fa-gavel' => esc_html__( 'gavel', 'gautama' ),
    'fas fa-gem' => esc_html__( 'gem', 'gautama' ),
    'far fa-gem' => esc_html__( 'gem', 'gautama' ),
    'fas fa-genderless' => esc_html__( 'genderless', 'gautama' ),
    'fab fa-get-pocket' => esc_html__( 'get-pocket', 'gautama' ),
    'fab fa-gg' => esc_html__( 'gg', 'gautama' ),
    'fab fa-gg-circle' => esc_html__( 'gg-circle', 'gautama' ),
    'fas fa-gift' => esc_html__( 'gift', 'gautama' ),
    'fab fa-git' => esc_html__( 'git', 'gautama' ),
    'fab fa-git-square' => esc_html__( 'git-square', 'gautama' ),
    'fab fa-github' => esc_html__( 'github', 'gautama' ),
    'fab fa-github-alt' => esc_html__( 'github-alt', 'gautama' ),
    'fab fa-github-square' => esc_html__( 'github-square', 'gautama' ),
    'fab fa-gitkraken' => esc_html__( 'gitkraken', 'gautama' ),
    'fab fa-gitlab' => esc_html__( 'gitlab', 'gautama' ),
    'fab fa-gitter' => esc_html__( 'gitter', 'gautama' ),
    'fas fa-glass-martini' => esc_html__( 'glass-martini', 'gautama' ),
    'fab fa-glide' => esc_html__( 'glide', 'gautama' ),
    'fab fa-glide-g' => esc_html__( 'glide-g', 'gautama' ),
    'fas fa-globe' => esc_html__( 'globe', 'gautama' ),
    'fab fa-gofore' => esc_html__( 'gofore', 'gautama' ),
    'fas fa-golf-ball' => esc_html__( 'golf-ball', 'gautama' ),
    'fab fa-goodreads' => esc_html__( 'goodreads', 'gautama' ),
    'fab fa-goodreads-g' => esc_html__( 'goodreads-g', 'gautama' ),
    'fab fa-google' => esc_html__( 'google', 'gautama' ),
    'fab fa-google-drive' => esc_html__( 'google-drive', 'gautama' ),
    'fab fa-google-play' => esc_html__( 'google-play', 'gautama' ),
    'fab fa-google-plus' => esc_html__( 'google-plus', 'gautama' ),
    'fab fa-google-plus-g' => esc_html__( 'google-plus-g', 'gautama' ),
    'fab fa-google-plus-square' => esc_html__( 'google-plus-square', 'gautama' ),
    'fab fa-google-wallet' => esc_html__( 'google-wallet', 'gautama' ),
    'fas fa-graduation-cap' => esc_html__( 'graduation-cap', 'gautama' ),
    'fab fa-gratipay' => esc_html__( 'gratipay', 'gautama' ),
    'fab fa-grav' => esc_html__( 'grav', 'gautama' ),
    'fab fa-gripfire' => esc_html__( 'gripfire', 'gautama' ),
    'fab fa-grunt' => esc_html__( 'grunt', 'gautama' ),
    'fab fa-gulp' => esc_html__( 'gulp', 'gautama' ),
    'fas fa-h-square' => esc_html__( 'h-square', 'gautama' ),
    'fab fa-hacker-news' => esc_html__( 'hacker-news', 'gautama' ),
    'fab fa-hacker-news-square' => esc_html__( 'hacker-news-square', 'gautama' ),
    'fas fa-hand-holding' => esc_html__( 'hand-holding', 'gautama' ),
    'fas fa-hand-holding-heart' => esc_html__( 'hand-holding-heart', 'gautama' ),
    'fas fa-hand-holding-usd' => esc_html__( 'hand-holding-usd', 'gautama' ),
    'fas fa-hand-lizard' => esc_html__( 'hand-lizard', 'gautama' ),
    'far fa-hand-lizard' => esc_html__( 'hand-lizard', 'gautama' ),
    'fas fa-hand-paper' => esc_html__( 'hand-paper', 'gautama' ),
    'far fa-hand-paper' => esc_html__( 'hand-paper', 'gautama' ),
    'fas fa-hand-peace' => esc_html__( 'hand-peace', 'gautama' ),
    'far fa-hand-peace' => esc_html__( 'hand-peace', 'gautama' ),
    'fas fa-hand-point-down' => esc_html__( 'hand-point-down', 'gautama' ),
    'far fa-hand-point-down' => esc_html__( 'hand-point-down', 'gautama' ),
    'fas fa-hand-point-left' => esc_html__( 'hand-point-left', 'gautama' ),
    'far fa-hand-point-left' => esc_html__( 'hand-point-left', 'gautama' ),
    'fas fa-hand-point-right' => esc_html__( 'hand-point-right', 'gautama' ),
    'far fa-hand-point-right' => esc_html__( 'hand-point-right', 'gautama' ),
    'fas fa-hand-point-up' => esc_html__( 'hand-point-up', 'gautama' ),
    'far fa-hand-point-up' => esc_html__( 'hand-point-up', 'gautama' ),
    'fas fa-hand-pointer' => esc_html__( 'hand-pointer', 'gautama' ),
    'far fa-hand-pointer' => esc_html__( 'hand-pointer', 'gautama' ),
    'fas fa-hand-rock' => esc_html__( 'hand-rock', 'gautama' ),
    'far fa-hand-rock' => esc_html__( 'hand-rock', 'gautama' ),
    'fas fa-hand-scissors' => esc_html__( 'hand-scissors', 'gautama' ),
    'far fa-hand-scissors' => esc_html__( 'hand-scissors', 'gautama' ),
    'fas fa-hand-spock' => esc_html__( 'hand-spock', 'gautama' ),
    'far fa-hand-spock' => esc_html__( 'hand-spock', 'gautama' ),
    'fas fa-hands' => esc_html__( 'hands', 'gautama' ),
    'fas fa-hands-helping' => esc_html__( 'hands-helping', 'gautama' ),
    'fas fa-handshake' => esc_html__( 'handshake', 'gautama' ),
    'far fa-handshake' => esc_html__( 'handshake', 'gautama' ),
    'fas fa-hashtag' => esc_html__( 'hashtag', 'gautama' ),
    'fas fa-hdd' => esc_html__( 'hdd', 'gautama' ),
    'far fa-hdd' => esc_html__( 'hdd', 'gautama' ),
    'fas fa-heading' => esc_html__( 'heading', 'gautama' ),
    'fas fa-headphones' => esc_html__( 'headphones', 'gautama' ),
    'fas fa-heart' => esc_html__( 'heart', 'gautama' ),
    'far fa-heart' => esc_html__( 'heart', 'gautama' ),
    'fas fa-heartbeat' => esc_html__( 'heartbeat', 'gautama' ),
    'fab fa-hips' => esc_html__( 'hips', 'gautama' ),
    'fab fa-hire-a-helper' => esc_html__( 'hire-a-helper', 'gautama' ),
    'fas fa-history' => esc_html__( 'history', 'gautama' ),
    'fas fa-hockey-puck' => esc_html__( 'hockey-puck', 'gautama' ),
    'fas fa-home' => esc_html__( 'home', 'gautama' ),
    'fab fa-hooli' => esc_html__( 'hooli', 'gautama' ),
    'fas fa-hospital' => esc_html__( 'hospital', 'gautama' ),
    'far fa-hospital' => esc_html__( 'hospital', 'gautama' ),
    'fas fa-hospital-alt' => esc_html__( 'hospital-alt', 'gautama' ),
    'fas fa-hospital-symbol' => esc_html__( 'hospital-symbol', 'gautama' ),
    'fab fa-hotjar' => esc_html__( 'hotjar', 'gautama' ),
    'fas fa-hourglass' => esc_html__( 'hourglass', 'gautama' ),
    'far fa-hourglass' => esc_html__( 'hourglass', 'gautama' ),
    'fas fa-hourglass-end' => esc_html__( 'hourglass-end', 'gautama' ),
    'fas fa-hourglass-half' => esc_html__( 'hourglass-half', 'gautama' ),
    'fas fa-hourglass-start' => esc_html__( 'hourglass-start', 'gautama' ),
    'fab fa-houzz' => esc_html__( 'houzz', 'gautama' ),
    'fab fa-html5' => esc_html__( 'html5', 'gautama' ),
    'fab fa-hubspot' => esc_html__( 'hubspot', 'gautama' ),
    'fas fa-i-cursor' => esc_html__( 'i-cursor', 'gautama' ),
    'fas fa-id-badge' => esc_html__( 'id-badge', 'gautama' ),
    'far fa-id-badge' => esc_html__( 'id-badge', 'gautama' ),
    'fas fa-id-card' => esc_html__( 'id-card', 'gautama' ),
    'far fa-id-card' => esc_html__( 'id-card', 'gautama' ),
    'fas fa-id-card-alt' => esc_html__( 'id-card-alt', 'gautama' ),
    'fas fa-image' => esc_html__( 'image', 'gautama' ),
    'far fa-image' => esc_html__( 'image', 'gautama' ),
    'fas fa-images' => esc_html__( 'images', 'gautama' ),
    'far fa-images' => esc_html__( 'images', 'gautama' ),
    'fab fa-imdb' => esc_html__( 'imdb', 'gautama' ),
    'fas fa-inbox' => esc_html__( 'inbox', 'gautama' ),
    'fas fa-indent' => esc_html__( 'indent', 'gautama' ),
    'fas fa-industry' => esc_html__( 'industry', 'gautama' ),
    'fas fa-info' => esc_html__( 'info', 'gautama' ),
    'fas fa-info-circle' => esc_html__( 'info-circle', 'gautama' ),
    'fab fa-instagram' => esc_html__( 'instagram', 'gautama' ),
    'fab fa-internet-explorer' => esc_html__( 'internet-explorer', 'gautama' ),
    'fab fa-ioxhost' => esc_html__( 'ioxhost', 'gautama' ),
    'fas fa-italic' => esc_html__( 'italic', 'gautama' ),
    'fab fa-itunes' => esc_html__( 'itunes', 'gautama' ),
    'fab fa-itunes-note' => esc_html__( 'itunes-note', 'gautama' ),
    'fab fa-java' => esc_html__( 'java', 'gautama' ),
    'fab fa-jenkins' => esc_html__( 'jenkins', 'gautama' ),
    'fab fa-joget' => esc_html__( 'joget', 'gautama' ),
    'fab fa-joomla' => esc_html__( 'joomla', 'gautama' ),
    'fab fa-js' => esc_html__( 'js', 'gautama' ),
    'fab fa-js-square' => esc_html__( 'js-square', 'gautama' ),
    'fab fa-jsfiddle' => esc_html__( 'jsfiddle', 'gautama' ),
    'fas fa-key' => esc_html__( 'key', 'gautama' ),
    'fas fa-keyboard' => esc_html__( 'keyboard', 'gautama' ),
    'far fa-keyboard' => esc_html__( 'keyboard', 'gautama' ),
    'fab fa-keycdn' => esc_html__( 'keycdn', 'gautama' ),
    'fab fa-kickstarter' => esc_html__( 'kickstarter', 'gautama' ),
    'fab fa-kickstarter-k' => esc_html__( 'kickstarter-k', 'gautama' ),
    'fab fa-korvue' => esc_html__( 'korvue', 'gautama' ),
    'fas fa-language' => esc_html__( 'language', 'gautama' ),
    'fas fa-laptop' => esc_html__( 'laptop', 'gautama' ),
    'fab fa-laravel' => esc_html__( 'laravel', 'gautama' ),
    'fab fa-lastfm' => esc_html__( 'lastfm', 'gautama' ),
    'fab fa-lastfm-square' => esc_html__( 'lastfm-square', 'gautama' ),
    'fas fa-leaf' => esc_html__( 'leaf', 'gautama' ),
    'fab fa-leanpub' => esc_html__( 'leanpub', 'gautama' ),
    'fas fa-lemon' => esc_html__( 'lemon', 'gautama' ),
    'far fa-lemon' => esc_html__( 'lemon', 'gautama' ),
    'fab fa-less' => esc_html__( 'less', 'gautama' ),
    'fas fa-level-down-alt' => esc_html__( 'level-down-alt', 'gautama' ),
    'fas fa-level-up-alt' => esc_html__( 'level-up-alt', 'gautama' ),
    'fas fa-life-ring' => esc_html__( 'life-ring', 'gautama' ),
    'far fa-life-ring' => esc_html__( 'life-ring', 'gautama' ),
    'fas fa-lightbulb' => esc_html__( 'lightbulb', 'gautama' ),
    'far fa-lightbulb' => esc_html__( 'lightbulb', 'gautama' ),
    'fab fa-line' => esc_html__( 'line', 'gautama' ),
    'fas fa-link' => esc_html__( 'link', 'gautama' ),
    'fab fa-linkedin' => esc_html__( 'linkedin', 'gautama' ),
    'fab fa-linkedin-in' => esc_html__( 'linkedin-in', 'gautama' ),
    'fab fa-linode' => esc_html__( 'linode', 'gautama' ),
    'fab fa-linux' => esc_html__( 'linux', 'gautama' ),
    'fas fa-lira-sign' => esc_html__( 'lira-sign', 'gautama' ),
    'fas fa-list' => esc_html__( 'list', 'gautama' ),
    'fas fa-list-alt' => esc_html__( 'list-alt', 'gautama' ),
    'far fa-list-alt' => esc_html__( 'list-alt', 'gautama' ),
    'fas fa-list-ol' => esc_html__( 'list-ol', 'gautama' ),
    'fas fa-list-ul' => esc_html__( 'list-ul', 'gautama' ),
    'fas fa-location-arrow' => esc_html__( 'location-arrow', 'gautama' ),
    'fas fa-lock' => esc_html__( 'lock', 'gautama' ),
    'fas fa-lock-open' => esc_html__( 'lock-open', 'gautama' ),
    'fas fa-long-arrow-alt-down' => esc_html__( 'long-arrow-alt-down', 'gautama' ),
    'fas fa-long-arrow-alt-left' => esc_html__( 'long-arrow-alt-left', 'gautama' ),
    'fas fa-long-arrow-alt-right' => esc_html__( 'long-arrow-alt-right', 'gautama' ),
    'fas fa-long-arrow-alt-up' => esc_html__( 'long-arrow-alt-up', 'gautama' ),
    'fas fa-low-vision' => esc_html__( 'low-vision', 'gautama' ),
    'fab fa-lyft' => esc_html__( 'lyft', 'gautama' ),
    'fab fa-magento' => esc_html__( 'magento', 'gautama' ),
    'fas fa-magic' => esc_html__( 'magic', 'gautama' ),
    'fas fa-magnet' => esc_html__( 'magnet', 'gautama' ),
    'fas fa-male' => esc_html__( 'male', 'gautama' ),
    'fas fa-map' => esc_html__( 'map', 'gautama' ),
    'far fa-map' => esc_html__( 'map', 'gautama' ),
    'fas fa-map-marker' => esc_html__( 'map-marker', 'gautama' ),
    'fas fa-map-marker-alt' => esc_html__( 'map-marker-alt', 'gautama' ),
    'fas fa-map-pin' => esc_html__( 'map-pin', 'gautama' ),
    'fas fa-map-signs' => esc_html__( 'map-signs', 'gautama' ),
    'fas fa-mars' => esc_html__( 'mars', 'gautama' ),
    'fas fa-mars-double' => esc_html__( 'mars-double', 'gautama' ),
    'fas fa-mars-stroke' => esc_html__( 'mars-stroke', 'gautama' ),
    'fas fa-mars-stroke-h' => esc_html__( 'mars-stroke-h', 'gautama' ),
    'fas fa-mars-stroke-v' => esc_html__( 'mars-stroke-v', 'gautama' ),
    'fab fa-maxcdn' => esc_html__( 'maxcdn', 'gautama' ),
    'fab fa-medapps' => esc_html__( 'medapps', 'gautama' ),
    'fab fa-medium' => esc_html__( 'medium', 'gautama' ),
    'fab fa-medium-m' => esc_html__( 'medium-m', 'gautama' ),
    'fas fa-medkit' => esc_html__( 'medkit', 'gautama' ),
    'fab fa-medrt' => esc_html__( 'medrt', 'gautama' ),
    'fab fa-meetup' => esc_html__( 'meetup', 'gautama' ),
    'fas fa-meh' => esc_html__( 'meh', 'gautama' ),
    'far fa-meh' => esc_html__( 'meh', 'gautama' ),
    'fas fa-mercury' => esc_html__( 'mercury', 'gautama' ),
    'fas fa-microchip' => esc_html__( 'microchip', 'gautama' ),
    'fas fa-microphone' => esc_html__( 'microphone', 'gautama' ),
    'fas fa-microphone-slash' => esc_html__( 'microphone-slash', 'gautama' ),
    'fab fa-microsoft' => esc_html__( 'microsoft', 'gautama' ),
    'fas fa-minus' => esc_html__( 'minus', 'gautama' ),
    'fas fa-minus-circle' => esc_html__( 'minus-circle', 'gautama' ),
    'fas fa-minus-square' => esc_html__( 'minus-square', 'gautama' ),
    'far fa-minus-square' => esc_html__( 'minus-square', 'gautama' ),
    'fab fa-mix' => esc_html__( 'mix', 'gautama' ),
    'fab fa-mixcloud' => esc_html__( 'mixcloud', 'gautama' ),
    'fab fa-mizuni' => esc_html__( 'mizuni', 'gautama' ),
    'fas fa-mobile' => esc_html__( 'mobile', 'gautama' ),
    'fas fa-mobile-alt' => esc_html__( 'mobile-alt', 'gautama' ),
    'fab fa-modx' => esc_html__( 'modx', 'gautama' ),
    'fab fa-monero' => esc_html__( 'monero', 'gautama' ),
    'fas fa-money-bill-alt' => esc_html__( 'money-bill-alt', 'gautama' ),
    'far fa-money-bill-alt' => esc_html__( 'money-bill-alt', 'gautama' ),
    'fas fa-moon' => esc_html__( 'moon', 'gautama' ),
    'far fa-moon' => esc_html__( 'moon', 'gautama' ),
    'fas fa-motorcycle' => esc_html__( 'motorcycle', 'gautama' ),
    'fas fa-mouse-pointer' => esc_html__( 'mouse-pointer', 'gautama' ),
    'fas fa-music' => esc_html__( 'music', 'gautama' ),
    'fab fa-napster' => esc_html__( 'napster', 'gautama' ),
    'fas fa-neuter' => esc_html__( 'neuter', 'gautama' ),
    'fas fa-newspaper' => esc_html__( 'newspaper', 'gautama' ),
    'far fa-newspaper' => esc_html__( 'newspaper', 'gautama' ),
    'fab fa-nintendo-switch' => esc_html__( 'nintendo-switch', 'gautama' ),
    'fab fa-node' => esc_html__( 'node', 'gautama' ),
    'fab fa-node-js' => esc_html__( 'node-js', 'gautama' ),
    'fas fa-notes-medical' => esc_html__( 'notes-medical', 'gautama' ),
    'fab fa-npm' => esc_html__( 'npm', 'gautama' ),
    'fab fa-ns8' => esc_html__( 'ns8', 'gautama' ),
    'fab fa-nutritionix' => esc_html__( 'nutritionix', 'gautama' ),
    'fas fa-object-group' => esc_html__( 'object-group', 'gautama' ),
    'far fa-object-group' => esc_html__( 'object-group', 'gautama' ),
    'fas fa-object-ungroup' => esc_html__( 'object-ungroup', 'gautama' ),
    'far fa-object-ungroup' => esc_html__( 'object-ungroup', 'gautama' ),
    'fab fa-odnoklassniki' => esc_html__( 'odnoklassniki', 'gautama' ),
    'fab fa-odnoklassniki-square' => esc_html__( 'odnoklassniki-square', 'gautama' ),
    'fab fa-opencart' => esc_html__( 'opencart', 'gautama' ),
    'fab fa-openid' => esc_html__( 'openid', 'gautama' ),
    'fab fa-opera' => esc_html__( 'opera', 'gautama' ),
    'fab fa-optin-monster' => esc_html__( 'optin-monster', 'gautama' ),
    'fab fa-osi' => esc_html__( 'osi', 'gautama' ),
    'fas fa-outdent' => esc_html__( 'outdent', 'gautama' ),
    'fab fa-page4' => esc_html__( 'page4', 'gautama' ),
    'fab fa-pagelines' => esc_html__( 'pagelines', 'gautama' ),
    'fas fa-paint-brush' => esc_html__( 'paint-brush', 'gautama' ),
    'fab fa-palfed' => esc_html__( 'palfed', 'gautama' ),
    'fas fa-pallet' => esc_html__( 'pallet', 'gautama' ),
    'fas fa-paper-plane' => esc_html__( 'paper-plane', 'gautama' ),
    'far fa-paper-plane' => esc_html__( 'paper-plane', 'gautama' ),
    'fas fa-paperclip' => esc_html__( 'paperclip', 'gautama' ),
    'fas fa-parachute-box' => esc_html__( 'parachute-box', 'gautama' ),
    'fas fa-paragraph' => esc_html__( 'paragraph', 'gautama' ),
    'fas fa-paste' => esc_html__( 'paste', 'gautama' ),
    'fab fa-patreon' => esc_html__( 'patreon', 'gautama' ),
    'fas fa-pause' => esc_html__( 'pause', 'gautama' ),
    'fas fa-pause-circle' => esc_html__( 'pause-circle', 'gautama' ),
    'far fa-pause-circle' => esc_html__( 'pause-circle', 'gautama' ),
    'fas fa-paw' => esc_html__( 'paw', 'gautama' ),
    'fab fa-paypal' => esc_html__( 'paypal', 'gautama' ),
    'fas fa-pen-square' => esc_html__( 'pen-square', 'gautama' ),
    'fas fa-pencil-alt' => esc_html__( 'pencil-alt', 'gautama' ),
    'fas fa-people-carry' => esc_html__( 'people-carry', 'gautama' ),
    'fas fa-percent' => esc_html__( 'percent', 'gautama' ),
    'fab fa-periscope' => esc_html__( 'periscope', 'gautama' ),
    'fab fa-phabricator' => esc_html__( 'phabricator', 'gautama' ),
    'fab fa-phoenix-framework' => esc_html__( 'phoenix-framework', 'gautama' ),
    'fas fa-phone' => esc_html__( 'phone', 'gautama' ),
    'fas fa-phone-slash' => esc_html__( 'phone-slash', 'gautama' ),
    'fas fa-phone-square' => esc_html__( 'phone-square', 'gautama' ),
    'fas fa-phone-volume' => esc_html__( 'phone-volume', 'gautama' ),
    'fab fa-php' => esc_html__( 'php', 'gautama' ),
    'fab fa-pied-piper' => esc_html__( 'pied-piper', 'gautama' ),
    'fab fa-pied-piper-alt' => esc_html__( 'pied-piper-alt', 'gautama' ),
    'fab fa-pied-piper-hat' => esc_html__( 'pied-piper-hat', 'gautama' ),
    'fab fa-pied-piper-pp' => esc_html__( 'pied-piper-pp', 'gautama' ),
    'fas fa-piggy-bank' => esc_html__( 'piggy-bank', 'gautama' ),
    'fas fa-pills' => esc_html__( 'pills', 'gautama' ),
    'fab fa-pinterest' => esc_html__( 'pinterest', 'gautama' ),
    'fab fa-pinterest-p' => esc_html__( 'pinterest-p', 'gautama' ),
    'fab fa-pinterest-square' => esc_html__( 'pinterest-square', 'gautama' ),
    'fas fa-plane' => esc_html__( 'plane', 'gautama' ),
    'fas fa-play' => esc_html__( 'play', 'gautama' ),
    'fas fa-play-circle' => esc_html__( 'play-circle', 'gautama' ),
    'far fa-play-circle' => esc_html__( 'play-circle', 'gautama' ),
    'fab fa-playstation' => esc_html__( 'playstation', 'gautama' ),
    'fas fa-plug' => esc_html__( 'plug', 'gautama' ),
    'fas fa-plus' => esc_html__( 'plus', 'gautama' ),
    'fas fa-plus-circle' => esc_html__( 'plus-circle', 'gautama' ),
    'fas fa-plus-square' => esc_html__( 'plus-square', 'gautama' ),
    'far fa-plus-square' => esc_html__( 'plus-square', 'gautama' ),
    'fas fa-podcast' => esc_html__( 'podcast', 'gautama' ),
    'fas fa-poo' => esc_html__( 'poo', 'gautama' ),
    'fas fa-pound-sign' => esc_html__( 'pound-sign', 'gautama' ),
    'fas fa-power-off' => esc_html__( 'power-off', 'gautama' ),
    'fas fa-prescription-bottle' => esc_html__( 'prescription-bottle', 'gautama' ),
    'fas fa-prescription-bottle-alt' => esc_html__( 'prescription-bottle-alt', 'gautama' ),
    'fas fa-print' => esc_html__( 'print', 'gautama' ),
    'fas fa-procedures' => esc_html__( 'procedures', 'gautama' ),
    'fab fa-product-hunt' => esc_html__( 'product-hunt', 'gautama' ),
    'fab fa-pushed' => esc_html__( 'pushed', 'gautama' ),
    'fas fa-puzzle-piece' => esc_html__( 'puzzle-piece', 'gautama' ),
    'fab fa-python' => esc_html__( 'python', 'gautama' ),
    'fab fa-qq' => esc_html__( 'qq', 'gautama' ),
    'fas fa-qrcode' => esc_html__( 'qrcode', 'gautama' ),
    'fas fa-question' => esc_html__( 'question', 'gautama' ),
    'fas fa-question-circle' => esc_html__( 'question-circle', 'gautama' ),
    'far fa-question-circle' => esc_html__( 'question-circle', 'gautama' ),
    'fas fa-quidditch' => esc_html__( 'quidditch', 'gautama' ),
    'fab fa-quinscape' => esc_html__( 'quinscape', 'gautama' ),
    'fab fa-quora' => esc_html__( 'quora', 'gautama' ),
    'fas fa-quote-left' => esc_html__( 'quote-left', 'gautama' ),
    'fas fa-quote-right' => esc_html__( 'quote-right', 'gautama' ),
    'fas fa-random' => esc_html__( 'random', 'gautama' ),
    'fab fa-ravelry' => esc_html__( 'ravelry', 'gautama' ),
    'fab fa-react' => esc_html__( 'react', 'gautama' ),
    'fab fa-readme' => esc_html__( 'readme', 'gautama' ),
    'fab fa-rebel' => esc_html__( 'rebel', 'gautama' ),
    'fas fa-recycle' => esc_html__( 'recycle', 'gautama' ),
    'fab fa-red-river' => esc_html__( 'red-river', 'gautama' ),
    'fab fa-reddit' => esc_html__( 'reddit', 'gautama' ),
    'fab fa-reddit-alien' => esc_html__( 'reddit-alien', 'gautama' ),
    'fab fa-reddit-square' => esc_html__( 'reddit-square', 'gautama' ),
    'fas fa-redo' => esc_html__( 'redo', 'gautama' ),
    'fas fa-redo-alt' => esc_html__( 'redo-alt', 'gautama' ),
    'fas fa-registered' => esc_html__( 'registered', 'gautama' ),
    'far fa-registered' => esc_html__( 'registered', 'gautama' ),
    'fab fa-rendact' => esc_html__( 'rendact', 'gautama' ),
    'fab fa-renren' => esc_html__( 'renren', 'gautama' ),
    'fas fa-reply' => esc_html__( 'reply', 'gautama' ),
    'fas fa-reply-all' => esc_html__( 'reply-all', 'gautama' ),
    'fab fa-replyd' => esc_html__( 'replyd', 'gautama' ),
    'fab fa-resolving' => esc_html__( 'resolving', 'gautama' ),
    'fas fa-retweet' => esc_html__( 'retweet', 'gautama' ),
    'fas fa-ribbon' => esc_html__( 'ribbon', 'gautama' ),
    'fas fa-road' => esc_html__( 'road', 'gautama' ),
    'fas fa-rocket' => esc_html__( 'rocket', 'gautama' ),
    'fab fa-rocketchat' => esc_html__( 'rocketchat', 'gautama' ),
    'fab fa-rockrms' => esc_html__( 'rockrms', 'gautama' ),
    'fas fa-rss' => esc_html__( 'rss', 'gautama' ),
    'fas fa-rss-square' => esc_html__( 'rss-square', 'gautama' ),
    'fas fa-ruble-sign' => esc_html__( 'ruble-sign', 'gautama' ),
    'fas fa-rupee-sign' => esc_html__( 'rupee-sign', 'gautama' ),
    'fab fa-safari' => esc_html__( 'safari', 'gautama' ),
    'fab fa-sass' => esc_html__( 'sass', 'gautama' ),
    'fas fa-save' => esc_html__( 'save', 'gautama' ),
    'far fa-save' => esc_html__( 'save', 'gautama' ),
    'fab fa-schlix' => esc_html__( 'schlix', 'gautama' ),
    'fab fa-scribd' => esc_html__( 'scribd', 'gautama' ),
    'fas fa-search' => esc_html__( 'search', 'gautama' ),
    'fas fa-search-minus' => esc_html__( 'search-minus', 'gautama' ),
    'fas fa-search-plus' => esc_html__( 'search-plus', 'gautama' ),
    'fab fa-searchengin' => esc_html__( 'searchengin', 'gautama' ),
    'fas fa-seedling' => esc_html__( 'seedling', 'gautama' ),
    'fab fa-sellcast' => esc_html__( 'sellcast', 'gautama' ),
    'fab fa-sellsy' => esc_html__( 'sellsy', 'gautama' ),
    'fas fa-server' => esc_html__( 'server', 'gautama' ),
    'fab fa-servicestack' => esc_html__( 'servicestack', 'gautama' ),
    'fas fa-share' => esc_html__( 'share', 'gautama' ),
    'fas fa-share-alt' => esc_html__( 'share-alt', 'gautama' ),
    'fas fa-share-alt-square' => esc_html__( 'share-alt-square', 'gautama' ),
    'fas fa-share-square' => esc_html__( 'share-square', 'gautama' ),
    'far fa-share-square' => esc_html__( 'share-square', 'gautama' ),
    'fas fa-shekel-sign' => esc_html__( 'shekel-sign', 'gautama' ),
    'fas fa-shield-alt' => esc_html__( 'shield-alt', 'gautama' ),
    'fas fa-ship' => esc_html__( 'ship', 'gautama' ),
    'fas fa-shipping-fast' => esc_html__( 'shipping-fast', 'gautama' ),
    'fab fa-shirtsinbulk' => esc_html__( 'shirtsinbulk', 'gautama' ),
    'fas fa-shopping-bag' => esc_html__( 'shopping-bag', 'gautama' ),
    'fas fa-shopping-basket' => esc_html__( 'shopping-basket', 'gautama' ),
    'fas fa-shopping-cart' => esc_html__( 'shopping-cart', 'gautama' ),
    'fas fa-shower' => esc_html__( 'shower', 'gautama' ),
    'fas fa-sign' => esc_html__( 'sign', 'gautama' ),
    'fas fa-sign-in-alt' => esc_html__( 'sign-in-alt', 'gautama' ),
    'fas fa-sign-language' => esc_html__( 'sign-language', 'gautama' ),
    'fas fa-sign-out-alt' => esc_html__( 'sign-out-alt', 'gautama' ),
    'fas fa-signal' => esc_html__( 'signal', 'gautama' ),
    'fab fa-simplybuilt' => esc_html__( 'simplybuilt', 'gautama' ),
    'fab fa-sistrix' => esc_html__( 'sistrix', 'gautama' ),
    'fas fa-sitemap' => esc_html__( 'sitemap', 'gautama' ),
    'fab fa-skyatlas' => esc_html__( 'skyatlas', 'gautama' ),
    'fab fa-skype' => esc_html__( 'skype', 'gautama' ),
    'fab fa-slack' => esc_html__( 'slack', 'gautama' ),
    'fab fa-slack-hash' => esc_html__( 'slack-hash', 'gautama' ),
    'fas fa-sliders-h' => esc_html__( 'sliders-h', 'gautama' ),
    'fab fa-slideshare' => esc_html__( 'slideshare', 'gautama' ),
    'fas fa-smile' => esc_html__( 'smile', 'gautama' ),
    'far fa-smile' => esc_html__( 'smile', 'gautama' ),
    'fas fa-smoking' => esc_html__( 'smoking', 'gautama' ),
    'fab fa-snapchat' => esc_html__( 'snapchat', 'gautama' ),
    'fab fa-snapchat-ghost' => esc_html__( 'snapchat-ghost', 'gautama' ),
    'fab fa-snapchat-square' => esc_html__( 'snapchat-square', 'gautama' ),
    'fas fa-snowflake' => esc_html__( 'snowflake', 'gautama' ),
    'far fa-snowflake' => esc_html__( 'snowflake', 'gautama' ),
    'fas fa-sort' => esc_html__( 'sort', 'gautama' ),
    'fas fa-sort-alpha-down' => esc_html__( 'sort-alpha-down', 'gautama' ),
    'fas fa-sort-alpha-up' => esc_html__( 'sort-alpha-up', 'gautama' ),
    'fas fa-sort-amount-down' => esc_html__( 'sort-amount-down', 'gautama' ),
    'fas fa-sort-amount-up' => esc_html__( 'sort-amount-up', 'gautama' ),
    'fas fa-sort-down' => esc_html__( 'sort-down', 'gautama' ),
    'fas fa-sort-numeric-down' => esc_html__( 'sort-numeric-down', 'gautama' ),
    'fas fa-sort-numeric-up' => esc_html__( 'sort-numeric-up', 'gautama' ),
    'fas fa-sort-up' => esc_html__( 'sort-up', 'gautama' ),
    'fab fa-soundcloud' => esc_html__( 'soundcloud', 'gautama' ),
    'fas fa-space-shuttle' => esc_html__( 'space-shuttle', 'gautama' ),
    'fab fa-speakap' => esc_html__( 'speakap', 'gautama' ),
    'fas fa-spinner' => esc_html__( 'spinner', 'gautama' ),
    'fab fa-spotify' => esc_html__( 'spotify', 'gautama' ),
    'fas fa-square' => esc_html__( 'square', 'gautama' ),
    'far fa-square' => esc_html__( 'square', 'gautama' ),
    'fas fa-square-full' => esc_html__( 'square-full', 'gautama' ),
    'fab fa-stack-exchange' => esc_html__( 'stack-exchange', 'gautama' ),
    'fab fa-stack-overflow' => esc_html__( 'stack-overflow', 'gautama' ),
    'fas fa-star' => esc_html__( 'star', 'gautama' ),
    'far fa-star' => esc_html__( 'star', 'gautama' ),
    'fas fa-star-half' => esc_html__( 'star-half', 'gautama' ),
    'far fa-star-half' => esc_html__( 'star-half', 'gautama' ),
    'fab fa-staylinked' => esc_html__( 'staylinked', 'gautama' ),
    'fab fa-steam' => esc_html__( 'steam', 'gautama' ),
    'fab fa-steam-square' => esc_html__( 'steam-square', 'gautama' ),
    'fab fa-steam-symbol' => esc_html__( 'steam-symbol', 'gautama' ),
    'fas fa-step-backward' => esc_html__( 'step-backward', 'gautama' ),
    'fas fa-step-forward' => esc_html__( 'step-forward', 'gautama' ),
    'fas fa-stethoscope' => esc_html__( 'stethoscope', 'gautama' ),
    'fab fa-sticker-mule' => esc_html__( 'sticker-mule', 'gautama' ),
    'fas fa-sticky-note' => esc_html__( 'sticky-note', 'gautama' ),
    'far fa-sticky-note' => esc_html__( 'sticky-note', 'gautama' ),
    'fas fa-stop' => esc_html__( 'stop', 'gautama' ),
    'fas fa-stop-circle' => esc_html__( 'stop-circle', 'gautama' ),
    'far fa-stop-circle' => esc_html__( 'stop-circle', 'gautama' ),
    'fas fa-stopwatch' => esc_html__( 'stopwatch', 'gautama' ),
    'fab fa-strava' => esc_html__( 'strava', 'gautama' ),
    'fas fa-street-view' => esc_html__( 'street-view', 'gautama' ),
    'fas fa-strikethrough' => esc_html__( 'strikethrough', 'gautama' ),
    'fab fa-stripe' => esc_html__( 'stripe', 'gautama' ),
    'fab fa-stripe-s' => esc_html__( 'stripe-s', 'gautama' ),
    'fab fa-studiovinari' => esc_html__( 'studiovinari', 'gautama' ),
    'fab fa-stumbleupon' => esc_html__( 'stumbleupon', 'gautama' ),
    'fab fa-stumbleupon-circle' => esc_html__( 'stumbleupon-circle', 'gautama' ),
    'fas fa-subscript' => esc_html__( 'subscript', 'gautama' ),
    'fas fa-subway' => esc_html__( 'subway', 'gautama' ),
    'fas fa-suitcase' => esc_html__( 'suitcase', 'gautama' ),
    'fas fa-sun' => esc_html__( 'sun', 'gautama' ),
    'far fa-sun' => esc_html__( 'sun', 'gautama' ),
    'fab fa-superpowers' => esc_html__( 'superpowers', 'gautama' ),
    'fas fa-superscript' => esc_html__( 'superscript', 'gautama' ),
    'fab fa-supple' => esc_html__( 'supple', 'gautama' ),
    'fas fa-sync' => esc_html__( 'sync', 'gautama' ),
    'fas fa-sync-alt' => esc_html__( 'sync-alt', 'gautama' ),
    'fas fa-syringe' => esc_html__( 'syringe', 'gautama' ),
    'fas fa-table' => esc_html__( 'table', 'gautama' ),
    'fas fa-table-tennis' => esc_html__( 'table-tennis', 'gautama' ),
    'fas fa-tablet' => esc_html__( 'tablet', 'gautama' ),
    'fas fa-tablet-alt' => esc_html__( 'tablet-alt', 'gautama' ),
    'fas fa-tablets' => esc_html__( 'tablets', 'gautama' ),
    'fas fa-tachometer-alt' => esc_html__( 'tachometer-alt', 'gautama' ),
    'fas fa-tag' => esc_html__( 'tag', 'gautama' ),
    'fas fa-tags' => esc_html__( 'tags', 'gautama' ),
    'fas fa-tape' => esc_html__( 'tape', 'gautama' ),
    'fas fa-tasks' => esc_html__( 'tasks', 'gautama' ),
    'fas fa-taxi' => esc_html__( 'taxi', 'gautama' ),
    'fab fa-telegram' => esc_html__( 'telegram', 'gautama' ),
    'fab fa-telegram-plane' => esc_html__( 'telegram-plane', 'gautama' ),
    'fab fa-tencent-weibo' => esc_html__( 'tencent-weibo', 'gautama' ),
    'fas fa-terminal' => esc_html__( 'terminal', 'gautama' ),
    'fas fa-text-height' => esc_html__( 'text-height', 'gautama' ),
    'fas fa-text-width' => esc_html__( 'text-width', 'gautama' ),
    'fas fa-th' => esc_html__( 'th', 'gautama' ),
    'fas fa-th-large' => esc_html__( 'th-large', 'gautama' ),
    'fas fa-th-list' => esc_html__( 'th-list', 'gautama' ),
    'fab fa-themeisle' => esc_html__( 'themeisle', 'gautama' ),
    'fas fa-thermometer' => esc_html__( 'thermometer', 'gautama' ),
    'fas fa-thermometer-empty' => esc_html__( 'thermometer-empty', 'gautama' ),
    'fas fa-thermometer-full' => esc_html__( 'thermometer-full', 'gautama' ),
    'fas fa-thermometer-half' => esc_html__( 'thermometer-half', 'gautama' ),
    'fas fa-thermometer-quarter' => esc_html__( 'thermometer-quarter', 'gautama' ),
    'fas fa-thermometer-three-quarters' => esc_html__( 'thermometer-three-quarters', 'gautama' ),
    'fas fa-thumbs-down' => esc_html__( 'thumbs-down', 'gautama' ),
    'far fa-thumbs-down' => esc_html__( 'thumbs-down', 'gautama' ),
    'fas fa-thumbs-up' => esc_html__( 'thumbs-up', 'gautama' ),
    'far fa-thumbs-up' => esc_html__( 'thumbs-up', 'gautama' ),
    'fas fa-thumbtack' => esc_html__( 'thumbtack', 'gautama' ),
    'fas fa-ticket-alt' => esc_html__( 'ticket-alt', 'gautama' ),
    'fas fa-times' => esc_html__( 'times', 'gautama' ),
    'fas fa-times-circle' => esc_html__( 'times-circle', 'gautama' ),
    'far fa-times-circle' => esc_html__( 'times-circle', 'gautama' ),
    'fas fa-tint' => esc_html__( 'tint', 'gautama' ),
    'fas fa-toggle-off' => esc_html__( 'toggle-off', 'gautama' ),
    'fas fa-toggle-on' => esc_html__( 'toggle-on', 'gautama' ),
    'fas fa-trademark' => esc_html__( 'trademark', 'gautama' ),
    'fas fa-train' => esc_html__( 'train', 'gautama' ),
    'fas fa-transgender' => esc_html__( 'transgender', 'gautama' ),
    'fas fa-transgender-alt' => esc_html__( 'transgender-alt', 'gautama' ),
    'fas fa-trash' => esc_html__( 'trash', 'gautama' ),
    'fas fa-trash-alt' => esc_html__( 'trash-alt', 'gautama' ),
    'far fa-trash-alt' => esc_html__( 'trash-alt', 'gautama' ),
    'fas fa-tree' => esc_html__( 'tree', 'gautama' ),
    'fab fa-trello' => esc_html__( 'trello', 'gautama' ),
    'fab fa-tripadvisor' => esc_html__( 'tripadvisor', 'gautama' ),
    'fas fa-trophy' => esc_html__( 'trophy', 'gautama' ),
    'fas fa-truck' => esc_html__( 'truck', 'gautama' ),
    'fas fa-truck-loading' => esc_html__( 'truck-loading', 'gautama' ),
    'fas fa-truck-moving' => esc_html__( 'truck-moving', 'gautama' ),
    'fas fa-tty' => esc_html__( 'tty', 'gautama' ),
    'fab fa-tumblr' => esc_html__( 'tumblr', 'gautama' ),
    'fab fa-tumblr-square' => esc_html__( 'tumblr-square', 'gautama' ),
    'fas fa-tv' => esc_html__( 'tv', 'gautama' ),
    'fab fa-twitch' => esc_html__( 'twitch', 'gautama' ),
    'fab fa-twitter' => esc_html__( 'twitter', 'gautama' ),
    'fab fa-twitter-square' => esc_html__( 'twitter-square', 'gautama' ),
    'fab fa-typo3' => esc_html__( 'typo3', 'gautama' ),
    'fab fa-uber' => esc_html__( 'uber', 'gautama' ),
    'fab fa-uikit' => esc_html__( 'uikit', 'gautama' ),
    'fas fa-umbrella' => esc_html__( 'umbrella', 'gautama' ),
    'fas fa-underline' => esc_html__( 'underline', 'gautama' ),
    'fas fa-undo' => esc_html__( 'undo', 'gautama' ),
    'fas fa-undo-alt' => esc_html__( 'undo-alt', 'gautama' ),
    'fab fa-uniregistry' => esc_html__( 'uniregistry', 'gautama' ),
    'fas fa-universal-access' => esc_html__( 'universal-access', 'gautama' ),
    'fas fa-university' => esc_html__( 'university', 'gautama' ),
    'fas fa-unlink' => esc_html__( 'unlink', 'gautama' ),
    'fas fa-unlock' => esc_html__( 'unlock', 'gautama' ),
    'fas fa-unlock-alt' => esc_html__( 'unlock-alt', 'gautama' ),
    'fab fa-untappd' => esc_html__( 'untappd', 'gautama' ),
    'fas fa-upload' => esc_html__( 'upload', 'gautama' ),
    'fab fa-usb' => esc_html__( 'usb', 'gautama' ),
    'fas fa-user' => esc_html__( 'user', 'gautama' ),
    'far fa-user' => esc_html__( 'user', 'gautama' ),
    'fas fa-user-circle' => esc_html__( 'user-circle', 'gautama' ),
    'far fa-user-circle' => esc_html__( 'user-circle', 'gautama' ),
    'fas fa-user-md' => esc_html__( 'user-md', 'gautama' ),
    'fas fa-user-plus' => esc_html__( 'user-plus', 'gautama' ),
    'fas fa-user-secret' => esc_html__( 'user-secret', 'gautama' ),
    'fas fa-user-times' => esc_html__( 'user-times', 'gautama' ),
    'fas fa-users' => esc_html__( 'users', 'gautama' ),
    'fab fa-ussunnah' => esc_html__( 'ussunnah', 'gautama' ),
    'fas fa-utensil-spoon' => esc_html__( 'utensil-spoon', 'gautama' ),
    'fas fa-utensils' => esc_html__( 'utensils', 'gautama' ),
    'fab fa-vaadin' => esc_html__( 'vaadin', 'gautama' ),
    'fas fa-venus' => esc_html__( 'venus', 'gautama' ),
    'fas fa-venus-double' => esc_html__( 'venus-double', 'gautama' ),
    'fas fa-venus-mars' => esc_html__( 'venus-mars', 'gautama' ),
    'fab fa-viacoin' => esc_html__( 'viacoin', 'gautama' ),
    'fab fa-viadeo' => esc_html__( 'viadeo', 'gautama' ),
    'fab fa-viadeo-square' => esc_html__( 'viadeo-square', 'gautama' ),
    'fas fa-vial' => esc_html__( 'vial', 'gautama' ),
    'fas fa-vials' => esc_html__( 'vials', 'gautama' ),
    'fab fa-viber' => esc_html__( 'viber', 'gautama' ),
    'fas fa-video' => esc_html__( 'video', 'gautama' ),
    'fas fa-video-slash' => esc_html__( 'video-slash', 'gautama' ),
    'fab fa-vimeo' => esc_html__( 'vimeo', 'gautama' ),
    'fab fa-vimeo-square' => esc_html__( 'vimeo-square', 'gautama' ),
    'fab fa-vimeo-v' => esc_html__( 'vimeo-v', 'gautama' ),
    'fab fa-vine' => esc_html__( 'vine', 'gautama' ),
    'fab fa-vk' => esc_html__( 'vk', 'gautama' ),
    'fab fa-vnv' => esc_html__( 'vnv', 'gautama' ),
    'fas fa-volleyball-ball' => esc_html__( 'volleyball-ball', 'gautama' ),
    'fas fa-volume-down' => esc_html__( 'volume-down', 'gautama' ),
    'fas fa-volume-off' => esc_html__( 'volume-off', 'gautama' ),
    'fas fa-volume-up' => esc_html__( 'volume-up', 'gautama' ),
    'fab fa-vuejs' => esc_html__( 'vuejs', 'gautama' ),
    'fas fa-warehouse' => esc_html__( 'warehouse', 'gautama' ),
    'fab fa-weibo' => esc_html__( 'weibo', 'gautama' ),
    'fas fa-weight' => esc_html__( 'weight', 'gautama' ),
    'fab fa-weixin' => esc_html__( 'weixin', 'gautama' ),
    'fab fa-whatsapp' => esc_html__( 'whatsapp', 'gautama' ),
    'fab fa-whatsapp-square' => esc_html__( 'whatsapp-square', 'gautama' ),
    'fas fa-wheelchair' => esc_html__( 'wheelchair', 'gautama' ),
    'fab fa-whmcs' => esc_html__( 'whmcs', 'gautama' ),
    'fas fa-wifi' => esc_html__( 'wifi', 'gautama' ),
    'fab fa-wikipedia-w' => esc_html__( 'wikipedia-w', 'gautama' ),
    'fas fa-window-close' => esc_html__( 'window-close', 'gautama' ),
    'far fa-window-close' => esc_html__( 'window-close', 'gautama' ),
    'fas fa-window-maximize' => esc_html__( 'window-maximize', 'gautama' ),
    'far fa-window-maximize' => esc_html__( 'window-maximize', 'gautama' ),
    'fas fa-window-minimize' => esc_html__( 'window-minimize', 'gautama' ),
    'far fa-window-minimize' => esc_html__( 'window-minimize', 'gautama' ),
    'fas fa-window-restore' => esc_html__( 'window-restore', 'gautama' ),
    'far fa-window-restore' => esc_html__( 'window-restore', 'gautama' ),
    'fab fa-windows' => esc_html__( 'windows', 'gautama' ),
    'fas fa-wine-glass' => esc_html__( 'wine-glass', 'gautama' ),
    'fas fa-won-sign' => esc_html__( 'won-sign', 'gautama' ),
    'fab fa-wordpress' => esc_html__( 'wordpress', 'gautama' ),
    'fab fa-wordpress-simple' => esc_html__( 'wordpress-simple', 'gautama' ),
    'fab fa-wpbeginner' => esc_html__( 'wpbeginner', 'gautama' ),
    'fab fa-wpexplorer' => esc_html__( 'wpexplorer', 'gautama' ),
    'fab fa-wpforms' => esc_html__( 'wpforms', 'gautama' ),
    'fas fa-wrench' => esc_html__( 'wrench', 'gautama' ),
    'fas fa-x-ray' => esc_html__( 'x-ray', 'gautama' ),
    'fab fa-xbox' => esc_html__( 'xbox', 'gautama' ),
    'fab fa-xing' => esc_html__( 'xing', 'gautama' ),
    'fab fa-xing-square' => esc_html__( 'xing-square', 'gautama' ),
    'fab fa-y-combinator' => esc_html__( 'y-combinator', 'gautama' ),
    'fab fa-yahoo' => esc_html__( 'yahoo', 'gautama' ),
    'fab fa-yandex' => esc_html__( 'yandex', 'gautama' ),
    'fab fa-yandex-international' => esc_html__( 'yandex-international', 'gautama' ),
    'fab fa-yelp' => esc_html__( 'yelp', 'gautama' ),
    'fas fa-yen-sign' => esc_html__( 'yen-sign', 'gautama' ),
    'fab fa-yoast' => esc_html__( 'yoast', 'gautama' ),
    'fab fa-youtube' => esc_html__( 'youtube', 'gautama' ),
    'fab fa-youtube-square' => esc_html__( 'youtube-square', 'gautama' ),
  );
}

?>
