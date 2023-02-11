<?php
/**
 * Helper functions for sigma core plugin.
 *
 * @package Sigma Core
 */
/**
 * Get shortcode template.
 */
if ( ! function_exists( 'sigmacore_get_vc_shortcode_template' ) ) {
	/*
	 * Funtion to get the template for registered shortcode.
	 */
	function sigmacore_get_vc_shortcode_template( $location ) {
		if ( $location ) {
			$template    = '';
			$theme_path  = get_parent_theme_file_path( "vc/shortcode-templates/{$location}.php" );
			$plugin_path = trailingslashit( SIGMACORE_PATH ) . "vc/shortcode-templates/{$location}.php";
			if ( file_exists( $theme_path ) ) {
				$template = $theme_path;
			}
			if ( ! $template ) {
				$template = $plugin_path;
			}
			if ( $template && file_exists($template) ) {
				include( $template );
			}else{
				echo '<b>'.$template.'</b>' . esc_html__(' Does not exist. Please contact support and report this issue', 'sigma-core');
			}
		}
	}
}

/*
* get post type for options
*/
if(!function_exists('sigmacore_get_posts_select')){
	function sigmacore_get_posts_select($tax){

		$result = [
			__('Please Create some Posts', 'sigma-core')	=>	'-1'
		];

	  $args = array(
	    'numberposts' => -1,
	    'post_type' => $tax
	  );
	  $posts = get_posts($args);
	  if($posts){
			foreach($posts as $post){
		    $result[$post->post_title] = $post->ID ;
		  }
		}

	  return $result;

	}
}

/**
 * Return the tax term Ids and populate it in select list.
 *
 * @since 1.0.0
 */
if(!function_exists('sigmacore_get_tax_terms')){
  function sigmacore_get_tax_terms($tax){

    $result = [
			__('Please Assign some Categories', 'sigma-core')	=>	'-1'
		];

    $cat_args = array(
      'orderby'    => 'name',
      'order'      => 'asc',
      'hide_empty' => false,
    );

    $parent_term_cats = get_terms( $tax, $cat_args );
    // Iterating through each parent categories (WP_Term Objects)
    if($parent_term_cats){

			$result = [];

			foreach ( $parent_term_cats as $term_cat_obj ) {

	      $term_children = get_term_children($term_cat_obj->term_id, $tax);

	      if($term_children){
					foreach($term_children as $child){

		        $child = get_term_by( 'id', $child, $tax );

		        $result[$child->name . ' (' . $child->count . ')'] =  $child->slug;

		      }
				}

	      $result[$term_cat_obj->name . ' (' . $term_cat_obj->count . ')'] =  $term_cat_obj->slug;

	    }
		}

    return $result;

  }
}

if ( ! function_exists( 'sigma_vc_extended_custom_css' ) ) {
	/**
	 * Build extended fields css.
	 * This function is used to create css string from shortcodes attributes
	 *
	 * @return void
	 */
	function sigma_vc_extended_custom_css( $content, $post_id, $rec = false ) {
		// Get the post content
		if ( ! $rec ) {
			$post_data = get_post( $post_id );
			if ( $post_data ) {
				$content = $post_data->post_content;
			}
		}
		$css = '';
		if ( ! preg_match( '/\s*(\.[^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', $content ) ) {
			return $css;
		}
		WPBMap::addAllMappedShortcodes();
		preg_match_all( '/' . get_shortcode_regex() . '/', $content, $shortcodes );
		foreach ( $shortcodes[2] as $index => $tag ) {
			$shortcode  = WPBMap::getShortCode( $tag );
			$attr_array = shortcode_parse_atts( trim( $shortcodes[3][ $index ] ) );
			if ( isset( $shortcode['params'] ) && ! empty( $shortcode['params'] ) ) {
				foreach ( $shortcode['params'] as $param ) {
					if ( isset( $param['type'] ) && 'css_editor' === $param['type'] && isset( $attr_array[ $param['param_name'] ] ) ) {
						if ( 'row_css_md' === $param['param_name']
							|| 'row_css_sm' === $param['param_name']
							|| 'row_css_xs' === $param['param_name']
							|| 'inner_row_css_md' === $param['param_name']
							|| 'inner_row_css_sm' === $param['param_name']
							|| 'inner_row_css_xs' === $param['param_name']
							|| 'column_css_md' === $param['param_name']
							|| 'column_css_sm' === $param['param_name']
							|| 'column_css_xs' === $param['param_name']
							|| 'inner_column_css_md' === $param['param_name']
							|| 'inner_column_css_sm' === $param['param_name']
							|| 'inner_column_css_xs' === $param['param_name'] ) {
							continue;
						}
						$css .= $attr_array[ $param['param_name'] ];
					}
				}
			}
			if ( 'vc_row' === $tag ) {
				if ( isset( $attr_array['row_css_md'] ) && $attr_array['row_css_md'] ) {
					$css .= '@media (max-width: 1200px) {' . $attr_array['row_css_md'] . '}';
				}
				if ( isset( $attr_array['row_css_sm'] ) && $attr_array['row_css_sm'] ) {
					$css .= '@media (max-width: 992px) {' . $attr_array['row_css_sm'] . '}';
				}
				if ( isset( $attr_array['row_css_xs'] ) && $attr_array['row_css_xs'] ) {
					$css .= '@media (max-width: 767px) {' . $attr_array['row_css_xs'] . '}';
				}
			}
			if ( 'vc_row_inner' === $tag ) {
				if ( isset( $attr_array['inner_row_css_md'] ) && $attr_array['inner_row_css_md'] ) {
					$css .= '@media (max-width: 1200px) {' . $attr_array['inner_row_css_md'] . '}';
				}
				if ( isset( $attr_array['inner_row_css_sm'] ) && $attr_array['inner_row_css_sm'] ) {
					$css .= '@media (max-width: 992px) {' . $attr_array['inner_row_css_sm'] . '}';
				}
				if ( isset( $attr_array['inner_row_css_xs'] ) && $attr_array['inner_row_css_xs'] ) {
					$css .= '@media (max-width: 767px) {' . $attr_array['inner_row_css_xs'] . '}';
				}
			}
			if ( 'vc_column' === $tag ) {
				if ( isset( $attr_array['column_css_md'] ) && $attr_array['column_css_md'] ) {
					$css .= '@media (max-width: 1200px) {' . $attr_array['column_css_md'] . '}';
				}
				if ( isset( $attr_array['column_css_sm'] ) && $attr_array['column_css_sm'] ) {
					$css .= '@media (max-width: 992px) {' . $attr_array['column_css_sm'] . '}';
				}
				if ( isset( $attr_array['column_css_xs'] ) && $attr_array['column_css_xs'] ) {
					$css .= '@media (max-width: 767px) {' . $attr_array['column_css_xs'] . '}';
				}
			}
			if ( 'vc_column_inner' === $tag ) {
				if ( isset( $attr_array['inner_column_css_md'] ) && $attr_array['inner_column_css_md'] ) {
					$css .= '@media (max-width: 1200px) {' . $attr_array['inner_column_css_md'] . '}';
				}
				if ( isset( $attr_array['inner_column_css_sm'] ) && $attr_array['inner_column_css_sm'] ) {
					$css .= '@media (max-width: 992px) {' . $attr_array['inner_column_css_sm'] . '}';
				}
				if ( isset( $attr_array['inner_column_css_xs'] ) && $attr_array['inner_column_css_xs'] ) {
					$css .= '@media (max-width: 767px) {' . $attr_array['inner_column_css_xs'] . '}';
				}
			}
		}
		foreach ( $shortcodes[5] as $shortcode_content ) {
			$css .= sigma_vc_extended_custom_css( $shortcode_content, $post_id, true );
		}
		return $css;
	}
}
add_filter( 'vc_base_build_shortcodes_custom_css', 'sigma_vc_extended_custom_css', 99, 3 );

/**
 * Get the ammenities icons.
 */
if( !function_exists('sigmacore_get_ammenities_icons') ){
	function sigmacore_get_ammenities_icons(){

		$ammenities_icons = array(
			array( 'fal fa-bath' => esc_html__('Air Conditioner', 'sigma-core') ),
			array( 'fal fa-wifi' => esc_html__('High Speed Wifi', 'sigma-core') ),
			array( 'fal fa-key' => esc_html__('Strong Locker', 'sigma-core') ),
			array( 'fal fa-cut' => esc_html__('Barber', 'sigma-core') ),
			array( 'fal fa-guitar' => esc_html__('Music', 'sigma-core') ),
			array( 'fal fa-lock' => esc_html__('Smart Security', 'sigma-core') ),
			array( 'fal fa-broom' => esc_html__('Cleaning', 'sigma-core') ),
			array( 'fal fa-shower' => esc_html__('Shower', 'sigma-core') ),
			array( 'fal fa-headphones-alt' => esc_html__('Support', 'sigma-core') ),
			array( 'fal fa-shopping-basket' => esc_html__('Grocery', 'sigma-core') ),
			array( 'fal fa-bed' => esc_html__('Single Bed', 'sigma-core') ),
			array( 'fal fa-users' => esc_html__('Guests Allowed', 'sigma-core') ),
			array( 'fal fa-shopping-cart' => esc_html__('Convenience Store', 'sigma-core') ),
			array( 'fal fa-bus' => esc_html__('Transportation', 'sigma-core') ),
			array( 'fal fa-dumbbell' => esc_html__('Gym', 'sigma-core') ),
			array( 'fal fa-glass-champagne' => esc_html__('Bar', 'sigma-core') ),
			array( 'fal fa-spa' => esc_html__('Spa', 'sigma-core') ),
		);

		$ammenities_icons = apply_filters( 'sigmacore_get_ammenities_icons', $ammenities_icons );

		return $ammenities_icons;
	}
}

/**
 * Prints HTML with meta information for the post author
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'sigmacore_posts_share' ) ) {
	function sigmacore_posts_share() {
		global $post;
		$social_icons = function_exists('gautama_get_social_icons') ? gautama_get_social_icons() : '';
		if ( ! empty( $social_icons ) ) {
			?>
			<div class="social-icon-share">
				<h5><?php echo esc_html('Social Share', 'gautama'); ?></h5>
				<a href="javascript:void(0)" class="social-share-button">
					<i class="fas fa-share-alt mr-1"></i>
				</a>
				<ul class="social-share-icons">
					<?php foreach ( $social_icons as $icon ) { ?>
						<li class="social-share-icon">
							<a href="<?php echo esc_url( $icon['link'] ); ?>" class="icon-link" target="popup" onclick="window.open('<?php echo esc_url( $icon['link'] ); ?>','popup','width=600,height=600'); return false;">
								<i class="<?php echo esc_attr( $icon['icon_class'] ); ?>"></i>
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>
			<?php
		}
	}
}

/**
 * Get the social icons.
 */
if ( ! function_exists( 'sigmacore_get_social_icons' ) ) {
	function sigmacore_get_social_icons() {
		$social_icons = array(
			array( 'fab fa-creative-commons' => 'Creative Commons' ),
			array( 'fab fa-twitter-square' => 'Twitter Square (social network,tweet)' ),
			array( 'fab fa-facebook-square' => 'Facebook Square (social network)' ),
			array( 'fab fa-linkedin' => 'LinkedIn (linkedin-square)' ),
			array( 'fab fa-github-square' => 'GitHub Square (octocat)' ),
			array( 'fab fa-twitter' => 'Twitter (social network,tweet)' ),
			array( 'fab fa-facebook-f' => 'Facebook F (facebook)' ),
			array( 'fab fa-github' => 'GitHub (octocat)' ),
			array( 'fab fa-pinterest' => 'Pinterest' ),
			array( 'fab fa-pinterest-square' => 'Pinterest Square' ),
			array( 'fab fa-google-plus-square' => 'Google Plus Square (social network)' ),
			array( 'fab fa-google-plus-g' => 'Google Plus G (google-plus,social network)' ),
			array( 'fab fa-linkedin-in' => 'LinkedIn In (linkedin)' ),
			array( 'fab fa-github-alt' => 'Alternate GitHub (octocat)' ),
			array( 'fab fa-maxcdn' => 'MaxCDN' ),
			array( 'fab fa-html5' => 'HTML 5 Logo' ),
			array( 'fab fa-css3' => 'CSS 3 Logo (code)' ),
			array( 'fab fa-youtube-square' => 'YouTube Square' ),
			array( 'fab fa-xing' => 'Xing' ),
			array( 'fab fa-xing-square' => 'Xing Square' ),
			array( 'fab fa-dropbox' => 'Dropbox' ),
			array( 'fab fa-stack-overflow' => 'Stack Overflow' ),
			array( 'fab fa-instagram' => 'Instagram' ),
			array( 'fab fa-flickr' => 'Flickr' ),
			array( 'fab fa-adn' => 'App.net' ),
			array( 'fab fa-bitbucket' => 'Bitbucket (atlassian,bitbucket-square,git)' ),
			array( 'fab fa-tumblr' => 'Tumblr' ),
			array( 'fab fa-tumblr-square' => 'Tumblr Square' ),
			array( 'fab fa-apple' => 'Apple (fruit,ios,mac,operating system,os,osx)' ),
			array( 'fab fa-windows' => 'Windows (microsoft,operating system,os)' ),
			array( 'fab fa-android' => 'Android (robot)' ),
			array( 'fab fa-linux' => 'Linux (tux)' ),
			array( 'fab fa-dribbble' => 'Dribbble' ),
			array( 'fab fa-skype' => 'Skype' ),
			array( 'fab fa-foursquare' => 'Foursquare' ),
			array( 'fab fa-trello' => 'Trello (atlassian)' ),
			array( 'fab fa-gratipay' => 'Gratipay (Gittip) (favorite,heart,like,love)' ),
			array( 'fab fa-vk' => 'VK' ),
			array( 'fab fa-weibo' => 'Weibo' ),
			array( 'fab fa-renren' => 'Renren' ),
			array( 'fab fa-pagelines' => 'Pagelines (eco,flora,leaf,leaves,nature,plant,tree)' ),
			array( 'fab fa-stack-exchange' => 'Stack Exchange' ),
			array( 'fab fa-vimeo-square' => 'Vimeo Square' ),
			array( 'fab fa-slack' => 'Slack Logo (anchor,hash,hashtag)' ),
			array( 'fab fa-wordpress' => 'WordPress Logo' ),
			array( 'fab fa-openid' => 'OpenID' ),
			array( 'fab fa-yahoo' => 'Yahoo Logo' ),
			array( 'fab fa-google' => 'Google Logo' ),
			array( 'fab fa-reddit' => 'reddit Logo' ),
			array( 'fab fa-reddit-square' => 'reddit Square' ),
			array( 'fab fa-stumbleupon-circle' => 'StumbleUpon Circle' ),
			array( 'fab fa-stumbleupon' => 'StumbleUpon Logo' ),
			array( 'fab fa-delicious' => 'Delicious' ),
			array( 'fab fa-digg' => 'Digg Logo' ),
			array( 'fab fa-pied-piper-pp' => 'Pied Piper PP Logo (Old)' ),
			array( 'fab fa-pied-piper-alt' => 'Alternate Pied Piper Logo' ),
			array( 'fab fa-drupal' => 'Drupal Logo' ),
			array( 'fab fa-joomla' => 'Joomla Logo' ),
			array( 'fab fa-behance' => 'Behance' ),
			array( 'fab fa-behance-square' => 'Behance Square' ),
			array( 'fab fa-deviantart' => 'deviantART' ),
			array( 'fab fa-vine' => 'Vine' ),
			array( 'fab fa-codepen' => 'Codepen' ),
			array( 'fab fa-jsfiddle' => 'jsFiddle' ),
			array( 'fab fa-rebel' => 'Rebel Alliance' ),
			array( 'fab fa-empire' => 'Galactic Empire' ),
			array( 'fab fa-git-square' => 'Git Square' ),
			array( 'fab fa-git' => 'Git' ),
			array( 'fab fa-hacker-news' => 'Hacker News' ),
			array( 'fab fa-tencent-weibo' => 'Tencent Weibo' ),
			array( 'fab fa-qq' => 'QQ' ),
			array( 'fab fa-weixin' => 'Weixin (WeChat)' ),
			array( 'fab fa-slideshare' => 'Slideshare' ),
			array( 'fab fa-yelp' => 'Yelp' ),
			array( 'fab fa-lastfm' => 'last.fm' ),
			array( 'fab fa-lastfm-square' => 'last.fm Square' ),
			array( 'fab fa-ioxhost' => 'ioxhost' ),
			array( 'fab fa-angellist' => 'AngelList' ),
			array( 'fab fa-font-awesome' => 'Font Awesome (meanpath)' ),
			array( 'fab fa-buysellads' => 'BuySellAds' ),
			array( 'fab fa-connectdevelop' => 'Connect Develop' ),
			array( 'fab fa-dashcube' => 'DashCube' ),
			array( 'fab fa-forumbee' => 'Forumbee' ),
			array( 'fab fa-leanpub' => 'Leanpub' ),
			array( 'fab fa-sellsy' => 'Sellsy' ),
			array( 'fab fa-shirtsinbulk' => 'Shirts in Bulk' ),
			array( 'fab fa-simplybuilt' => 'SimplyBuilt' ),
			array( 'fab fa-skyatlas' => 'skyatlas' ),
			array( 'fab fa-facebook' => 'Facebook (facebook-official,social network)' ),
			array( 'fab fa-pinterest-p' => 'Pinterest P' ),
			array( 'fab fa-whatsapp' => 'What\'s App' ),
			array( 'fab fa-viacoin' => 'Viacoin' ),
			array( 'fab fa-medium' => 'Medium' ),
			array( 'fab fa-y-combinator' => 'Y Combinator' ),
			array( 'fab fa-optin-monster' => 'Optin Monster' ),
			array( 'fab fa-opencart' => 'OpenCart' ),
			array( 'fab fa-expeditedssl' => 'ExpeditedSSL' ),
			array( 'fab fa-tripadvisor' => 'TripAdvisor' ),
			array( 'fab fa-odnoklassniki' => 'Odnoklassniki' ),
			array( 'fab fa-odnoklassniki-square' => 'Odnoklassniki Square' ),
			array( 'fab fa-get-pocket' => 'Get Pocket' ),
			array( 'fab fa-wikipedia-w' => 'Wikipedia W' ),
			array( 'fab fa-safari' => 'Safari (browser)' ),
			array( 'fab fa-chrome' => 'Chrome (browser)' ),
			array( 'fab fa-firefox' => 'Firefox (browser)' ),
			array( 'fab fa-opera' => 'Opera' ),
			array( 'fab fa-internet-explorer' => 'Internet-explorer (browser,ie)' ),
			array( 'fab fa-contao' => 'Contao' ),
			array( 'fab fa-500px' => '500px' ),
			array( 'fab fa-amazon' => 'Amazon' ),
			array( 'fab fa-houzz' => 'Houzz' ),
			array( 'fab fa-vimeo-v' => 'Vimeo (vimeo)' ),
			array( 'fab fa-black-tie' => 'Font Awesome Black Tie' ),
			array( 'fab fa-fonticons' => 'Fonticons' ),
			array( 'fab fa-reddit-alien' => 'reddit Alien' ),
			array( 'fab fa-edge' => 'Edge Browser (browser,ie)' ),
			array( 'fab fa-codiepie' => 'Codie Pie' ),
			array( 'fab fa-modx' => 'MODX' ),
			array( 'fab fa-fort-awesome' => 'Fort Awesome (castle)' ),
			array( 'fab fa-usb' => 'USB' ),
			array( 'fab fa-product-hunt' => 'Product Hunt' ),
			array( 'fab fa-mixcloud' => 'Mixcloud' ),
			array( 'fab fa-scribd' => 'Scribd' ),
			array( 'fab fa-gitlab' => 'GitLab (Axosoft)' ),
			array( 'fab fa-wpbeginner' => 'WPBeginner' ),
			array( 'fab fa-wpforms' => 'WPForms' ),
			array( 'fab fa-envira' => 'Envira Gallery (leaf)' ),
			array( 'fab fa-glide' => 'Glide' ),
			array( 'fab fa-glide-g' => 'Glide G' ),
			array( 'fab fa-viadeo' => 'Video' ),
			array( 'fab fa-viadeo-square' => 'Video Square' ),
			array( 'fab fa-snapchat' => 'Snapchat' ),
			array( 'fab fa-snapchat-ghost' => 'Snapchat Ghost' ),
			array( 'fab fa-snapchat-square' => 'Snapchat Square' ),
			array( 'fab fa-pied-piper' => 'Pied Piper Logo' ),
			array( 'fab fa-first-order' => 'First Order' ),
			array( 'fab fa-yoast' => 'Yoast' ),
			array( 'fab fa-themeisle' => 'ThemeIsle' ),
			array( 'fab fa-google-plus' => 'Google Plus (google-plus-circle,google-plus-official)' ),
			array( 'fab fa-linode' => 'Linode' ),
			array( 'fab fa-quora' => 'Quora' ),
			array( 'fab fa-free-code-camp' => 'Free Code Camp' ),
			array( 'fab fa-telegram' => 'Telegram' ),
			array( 'fab fa-bandcamp' => 'Bandcamp' ),
			array( 'fab fa-grav' => 'Grav' ),
			array( 'fab fa-etsy' => 'Etsy' ),
			array( 'fab fa-imdb' => 'IMDB' ),
			array( 'fab fa-ravelry' => 'Ravelry' ),
			array( 'fab fa-sellcast' => 'Sellcast (eercast)' ),
			array( 'fab fa-superpowers' => 'Superpowers' ),
			array( 'fab fa-wpexplorer' => 'WPExplorer' ),
			array( 'fab fa-meetup' => 'Meetup' ),
		);
		$social_icons = apply_filters( 'sigmacore_get_social_icons', $social_icons );
		return $social_icons;
	}
}

/**
 * Flaticon icons from Flaticon
 *
 * @param $icons - taken from filter - vc_map param field settings['source']
 *     provided icons (default empty array). If array categorized it will
 *     auto-enable category dropdown
 *
 * @since 1.0.0
 * @return array - of icons for iconpicker, can be categorized, or not.
 */
function sigma_vc_iconpicker_type_flaticon( $icons ) {

	$new_icons = sigmacore_add_icons( get_template_directory_uri() . '/assets/css/plugins/flaticon.css', 'flaticon-' );

	return array_merge( $icons, $new_icons );

}
add_filter( 'vc_iconpicker-type-flaticon', 'sigma_vc_iconpicker_type_flaticon' );


/**
 * Removes the demo link for redux plugin
 */
function sigmacore_remove_redux_demo_link() {
	if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
		remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::instance(), 'plugin_metalinks' ), null, 2 );
		remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
	}
}
add_action( 'redux/loaded', 'sigmacore_remove_redux_demo_link' );

function sigmacore_ocdi_import_files() {

	global $opt_name;

	return array(
		array(
			'import_file_name'             => 'Default Demo',
			'categories'                   => array( 'Default' ),
			'local_import_file'            => trailingslashit( SIGMACORE_PATH ) . 'includes/sample-demos/default/content.xml',
			'local_import_widget_file'     => trailingslashit( SIGMACORE_PATH ) . 'includes/sample-demos/default/widget.wie',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( SIGMACORE_PATH ) . 'includes/sample-demos/default/redux.json',
					'option_name' => $opt_name,
				),
			),
			'import_preview_image_url'     => trailingslashit( SIGMACORE_URL ) . 'includes/sample-demos/default/image/300x300.png',
			'import_notice'                => esc_html__( 'Make sure you have installed all the required plugin.', 'sigma-core' ),
			'preview_url'                  => 'http://metropolitanhost.com/themes/templatemoster/wp/gautama',
		),
	);

}
add_filter( 'pt-ocdi/import_files', 'sigmacore_ocdi_import_files' );

function sigmacore_ocdi_after_import_setup( $selected_import ) {
	if ( 'Default Demo' === $selected_import['import_file_name'] ) {
		if ( class_exists( 'RevSlider' ) ) {
			$slider_array = array(
				trailingslashit( SIGMACORE_PATH ) . 'includes/sample-demos/default/sliders/slider-1.zip',
			);
			$slider = new RevSlider();
			foreach($slider_array as $filepath){
				$slider->importSliderFromPost(true,true,$filepath);
			}
			echo ' Slider processed';
		}
		$primary_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
		$mobile_menu = get_term_by( 'name', 'Mobile Menu', 'nav_menu' );
		$top_header_menu = get_term_by( 'name', 'Top Header Menu', 'nav_menu' );
		$left_menu = get_term_by( 'name', 'Left Menu (Header Layout 3)', 'nav_menu' );
		$right_menu = get_term_by( 'name', 'Right Menu (Header Layout 3)', 'nav_menu' );
		set_theme_mod( 'nav_menu_locations', array(
				'primary-menu' => $primary_menu->term_id,
				'mobile-menu' => $mobile_menu->term_id,
				'top-menu' => $top_header_menu->term_id,
				'menu-left' => $left_menu->term_id,
				'menu-right' => $right_menu->term_id
			)
		);
		$front_page_id = get_page_by_title( 'Home' );
		$blog_page_id  = get_page_by_title( 'Blog' );
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $blog_page_id->ID );
    }
}
add_action( 'pt-ocdi/after_import', 'sigmacore_ocdi_after_import_setup' );
