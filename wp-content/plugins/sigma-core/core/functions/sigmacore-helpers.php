<?php
/**
 * File responsible for the helper functions.
 *
 * @package Sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get the current active theme name.
 *
 * @since 1.0.0
 */
function sigmacore_get_theme_name(){
	return wp_get_theme()->name;
}

/**
 * Format the current active theme name in the following way ( theme_name )
 *
 * @since 1.0.0
 */
function sigmacore_format_theme_name(){
	return strtolower( str_replace( " ", "_", sigmacore_get_theme_name() ) );
}

/**
 * Pull the options from the theme options object
 *
 * @param string $opt_id - Option ID
 * @param bool $has_default - If the field will have the option to pull from theme options by default or not
 * @param array $extras - Extra values to add (Not included in theme options)
 *
 * @since 1.0.0
 */
function sigmacore_get_redux_select_options( $opt_id, $has_default = true, $extras = [] ){

  $option_object =  class_exists('Redux') ? Redux::get_field( sigmacore_format_theme_name().'_options', $opt_id ) : '';
  $option_type   =  is_array($option_object) ? $option_object['type'] : '';
  $options       = [];

	if($option_type == 'select'){

		// Add an extra option to pull value from theme options instead.
		if($has_default == true){
	    $options['theme-options'] = esc_html__('Theme Defaults (From theme options)', 'sigma-core');
	  }

		// Add any extra fields that are not coming from the theme options object.
	  if(count($extras)){
	    foreach($extras as $key => $val){
	      $options[$key] = $val;
	    }
	  }

	  if(isset($option_object['options'])){
	    foreach($option_object['options'] as $key => $val){
	      $options[$key] = $val;
	    }
	  }

	}

  return $options;

}

/**
 * Add the Megamenu and Page Templates CSS Classes into the vc_shortcodes-custom-css pipeline
 *
 * @since 1.0.0
 *
*/
function sigmacore_custom_templates_add_vc_css( $shortcodes_custom_css ){

	$template_ids = get_posts(array(
		'fields'          => 'ids', // Only get post IDs
		'posts_per_page'  => -1,
		'post_type'				=> ['megamenu', 'sigma_templates']
	));

	if($template_ids){
		foreach ($template_ids as $id) {

			$data = get_metadata( 'post', $id, '_wpb_shortcodes_custom_css', true );
			$shortcodes_custom_css .= $data;

		}
	}

	return $shortcodes_custom_css;
}
add_filter( sigmacore_format_theme_name().'/custom_css', 'sigmacore_custom_templates_add_vc_css', 2 );

/**
 * Add the Megamenu and Page Templates CSS Classes into the vc_shortcodes-custom-css pipeline
 *
 * @param string $source - The source of the icon file.
 * @param string $icon_key - The pattern in which you want to execute the search. Example fontawesome (fa-), flaticon (flaticon-).
 * @param bool $splice - Whether to splice the icons array.
 * @param array $keys - where to start splicing, and where to end. (This is especially useful in fontawesome files where icon_key instances are not just icons)
 *
 * @since 1.0.0
*/
function sigmacore_add_icons( $source = '', $icon_key = '', $splice = false, $keys = [0,0] ){

	if(!empty($source)){
		$source = esc_url($source);
		$icons = [];

		$path = str_replace( WP_PLUGIN_URL, untrailingslashit( WP_PLUGIN_DIR ), $source );
		$path = str_replace( site_url(), untrailingslashit( ABSPATH ), $path );

		// Check if the file exists
		if( is_file( $path ) ){
			
			// Store the file contents in a string
			$contents = file_get_contents($source.'?'.date("Ymdhis"));

			
			// The start of the string we are looking for
			$start = '.'.$icon_key;

			// The end of the string we are looking for
			$end = ':';

			$pattern = sprintf(
		    '/%s(.+?)%s/ims',
		    preg_quote($start, '/'), preg_quote($end, '/')
			);

			// Store the list of matches in an array
			if (preg_match_all($pattern, $contents, $matches)) {
		    list(, $match) = $matches;
				if($match){
					foreach($match as $icon){
						$icons[][$icon_key.$icon] = str_replace('-', ' ', $icon);
					}

					// Remove first
					if( $splice == true && $keys[1] != 0 ){
						array_splice( $icons, $keys[0], $keys[1] );
					}

					return $icons;
				}
			}

			return false;

		}
	}

	return false;

}

?>
