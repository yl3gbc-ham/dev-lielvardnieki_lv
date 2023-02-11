<?php
/**
 * Get the site logo assigned from theme options.
 *
 * @param string $logo The logo option (Can be header_logo, footer_logo or mobile_logo)
 * @param bool $slogan Whether to show the slogan if no logo is set or not
 *
 * @since 1.0.0
 */
function gautama_get_site_logo($logo = '', $slogan = true){
	$logo_obj = gautama_get_option($logo);
	if(!empty($logo_obj) && !is_array($logo_obj)){
    $logo_id = $logo_obj;
  }elseif(!empty($logo_obj) && is_array($logo_obj) ){
    $logo_id = isset($logo_obj['id']) ? $logo_obj['id'] : '';
		$logo_url = isset($logo_obj['url']) ? $logo_obj['url'] : '';
  }
	$logo_obj = !empty($logo_id) ? wp_get_attachment_image_src( $logo_id, 'full' )[0] : '';
	if(!empty($logo_url)){
		?>
		<div class="logo-wrap <?php echo esc_attr($logo) ?>">
			<a href="<?php echo esc_url( get_home_url() ); ?>" rel="home">
				<img class="img-fluid" src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"/>
			</a>
		</div>
		<?php
	}else{
		if($logo_obj){
			?>
		<div class="logo-wrap <?php echo esc_attr($logo) ?>">
			<a href="<?php echo esc_url( get_home_url() ); ?>" rel="home">
				<img class="img-fluid" src="<?php echo esc_url( $logo_obj ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"/>
			</a>
		</div>
	<?php }elseif(!$logo_obj && $slogan && gautama_get_option('display_logo_icon') == true){
		$logo_icon_url = gautama_get_option('logo-text-icon');
		?>
		<a href="<?php echo esc_url( get_home_url() ); ?>" class="site-slogan sigma_custom-text-logo">
			<?php if(!empty($logo_icon_url)) { ?>
				<div class="logo-text-icon">
						<img src="<?php echo esc_url($logo_icon_url['url']); ?>" alt="logo-icon"/>
				</div>
					<?php } ?>
				<div class="custom-logo-text">
					<h5><?php bloginfo( 'name' ); ?></h5>
					<span><?php bloginfo( 'description' ); ?></span>
				</div>
		</a>
	<?php }	elseif(!$logo_obj && $slogan) {
			?>
			<a href="<?php echo esc_url( get_home_url() ); ?>" class="site-slogan">
				<h5><?php bloginfo( 'name' ); ?></h5>
				<span><?php bloginfo( 'description' ); ?></span>
			</a>
		<?php
		}
	}
}
/**
* Returns a specific menu
*
* @since 1.0.0
*/
function gautama_nav_menu($location = 'primary-menu', $menu_class = 'navbar-nav') {
  $defaults = array(
    'menu_class' => $menu_class,
    'menu_id' => '',
    'container' => '',
    'fallback_cb' => '',
  );
  if( has_nav_menu( $location ) ){
    $defaults['theme_location'] = $location;
  }
  return wp_nav_menu( $defaults );
}
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function gautama_body_classes( $classes ) {
	$classes[] = !empty(gautama_get_option('header-position')) ? 'has-'.gautama_get_option('header-position') : 'has-header-relative';
	$classes[] = !empty(gautama_get_layout_id()) ? 'sigma-layouts-'.gautama_get_layout_id() : 'sigma-layouts-default';
	$classes[] = gautama_is_woo_active() ? 'sigma_woo-active' : '';
	return $classes;
}
add_filter( 'body_class', 'gautama_body_classes' );
/**
 * Get all header related classes from theme options.
 *
 * @since 1.0.0
 */
function gautama_header_classes( $classes = [] ){
	$classes[] = !empty(gautama_get_option('header-layout')) ? 'header-'.gautama_get_option('header-layout') : 'header-layout-6';
	$classes[] = gautama_get_option('header-scheme', 'header-scheme-light');
	$classes[] = gautama_get_option('header-position', 'header-relative');
  if(empty($classes)) return;
  return apply_filters( 'gautama/header/header_classes',  str_replace(',', '', implode(', ', $classes)));
}
/**
 * Get all sticky headers related classes from theme options.
 *
 * @since 1.0.0
 */
function gautama_header_sticky_classes( $classes = [] ){
	$classes[] = !empty(gautama_get_option('header-layout')) ? 'header-'.gautama_get_option('header-layout') : 'header-layout-1';
	$classes[] = gautama_get_option('header-sticky-scheme', 'header-scheme-light');
  if(empty($classes)) return;
  return apply_filters( 'gautama/header/header_sticky_classes',  str_replace(',', '', implode(', ', $classes)));
}
/**
 * Return Customs excerpt
 *
 * @param int $limit - The limit of characters to display
 * @param string $text - The text to cut down, can be excerpt, custom text, or anything else.
 *
 * @since 1.0.0
 */
function gautama_custom_excerpt( $limit, $text = '' ){
 $text = $text == '' ? get_the_excerpt() : $text;
 $excerpt = explode(' ', $text, $limit);
 if (count($excerpt)>=$limit) {
		 array_pop($excerpt);
		 $excerpt = implode(" ",$excerpt).'';
 } else {
		 $excerpt = implode(" ",$excerpt);
 }
 $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
 return $excerpt;
}
/**
 * Display Google analytics to page
 * @hooked to wp_head
 *
 * @since 1.0.0
 */
function gautama_add_google_analytics(){
	if ( gautama_get_option('google_analytics') ){
		echo stripslashes( gautama_get_option('google_analytics') );
	}
}
add_action( 'wp_head', 'gautama_add_google_analytics', 999 );
/**
 * Display Google web master tools to page
 * @hooked to wp_head
 *
 * @since 1.0.0
 */
function gautama_add_google_webmastertools(){
	if ( gautama_get_option('google_web_master') ){
		echo stripslashes( gautama_get_option('google_web_master') );
	}
}
add_action( 'wp_head', 'gautama_add_google_webmastertools' );
/**
 * Display Google tag manger to page (after opening body tag)
 * @hooked to wp_body_open action
 *
 * @since 1.0.0
 */
function gautama_add_google_tagmanager(){
  if ( gautama_get_option('google_tag_manager') ){
		echo gautama_get_option('google_tag_manager');
	}
}
add_action('wp_body_open', 'gautama_add_google_tagmanager', 1);
/**
 * Gautama Home page app view (This function will redirect all users on mobile to your assigned page from
 * theme options instead of the main home page).
 *
 * @since 1.0.0
 */
function gautama_mobile_homepage(){
  $mobile_view = gautama_get_option('mobile_view', 'responsive_view');
  if(is_front_page() && wp_is_mobile() && $mobile_view == 'app_view'){
    $mobile_home_id = !empty(gautama_get_option('app_view_home')) ? gautama_get_option('app_view_home') : '';
    if( !empty($mobile_home_id) && get_option( 'page_on_front' ) != $mobile_home_id ){
      $app_view_home = esc_url(get_the_permalink($mobile_home_id));
      if(empty($app_view_home)) return false;
      ob_start();
      wp_safe_redirect($app_view_home);
      ob_flush();
    }
  }
}
add_action('template_redirect', 'gautama_mobile_homepage');
/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function gautama_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'gautama_pingback_header' );
if ( ! function_exists( 'gautama_comment_form_field' ) ) {
	/**
	 * Function for comment field order.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $fields fields array.
	 * @return array
	 */
	function gautama_comment_form_field( $fields ) {
		$comment_field = isset( $fields['comment'] ) ? $fields['comment'] : '';
		$cookies_field = isset( $fields['cookies'] ) ? $fields['cookies'] : '';
		unset( $fields['comment'] );
		unset( $fields['cookies'] );
		$fields['comment'] = $comment_field;
		$fields['cookies'] = $cookies_field;
		return $fields;
	}
}
add_filter( 'comment_form_fields', 'gautama_comment_form_field' );
if ( ! function_exists( 'gautama_widget_categories_args' ) ) {
	/**
	 * Change the walker for the categories widget.
	 *
	 * @param  array $instance fields array.
	 * @param  array $cat_args fields array.
	 * @return array
	 */
	function gautama_widget_categories_args( $cat_args, $instance ) {
		$cat_args['walker'] = new Gautama_Walker_Category;
		return $cat_args;
	}
}
add_filter( 'widget_categories_args', 'gautama_widget_categories_args', 10, 2 );
if ( ! function_exists( 'gautama_archive_count' ) ) {
	/**
	 * Change the sturcture for the archives link.
	 *
	 * @param  string $links string.
	 * @return string
	 */
	function gautama_archive_count( $links ) {
		$links = str_replace( '&nbsp;(', '<span>', $links );
		$links = str_replace( ')', '</span>', $links );
		return $links;
	}
}
add_filter( 'get_archives_link', 'gautama_archive_count' );
/**
 * Get the current page layout (Boxed - Full Width)
 *
 * @since  1.0.0
 */
function gautama_get_page_layout(){
  // Current page ID
  $current_id = gautama_get_page_id();
  // Possible layout values
  $avaiable_layouts = array('container', 'container-fluid');
  // Page meta
  $page_settings = $current_id ? get_post_meta( $current_id, 'sigma_page_settings', true ) : '';
  $page_custom_layout = isset( $page_settings['sigma_page_layout'] ) ? $page_settings['sigma_page_layout'] : '';
  // Default page layout value
  $page_layout = 'container';
  if(in_array($page_custom_layout, $avaiable_layouts)){
    $page_layout = $page_custom_layout;
  }elseif( gautama_get_option('page_layout') ){
    $page_layout = gautama_get_option('page_layout');
  }
  return apply_filters( 'gautama/page/page_layout', $page_layout );
}
/*
* get post author social links
*/
function gautama_get_post_author_sm_links() {
	global $post;
  $twitter = get_the_author_meta( 'twitter', $post->post_author );
  $facebook = get_the_author_meta( 'facebook', $post->post_author );
  $pinterest = get_the_author_meta( 'pinterest', $post->post_author );
  $linkedin = get_the_author_meta( 'linkedin', $post->post_author );
  $youtube = get_the_author_meta( 'youtube', $post->post_author );
  if(!empty($twitter) || !empty($facebook) || !empty($behance) || !empty($linkedin) || !empty($youtube) ) {
  ?>
    <ul class="social-icon">
      <?php if(!empty($facebook)) { ?>
        <li><a href="<?php echo esc_url($facebook); ?>"><i class="fab fa-facebook-f"></i></a></li>
      <?php } if(!empty($twitter)) { ?>
        <li><a href="<?php echo esc_url($twitter); ?>"><i class="fab fa-twitter"></i></a></li>
      <?php } if(!empty($pinterest)) { ?>
        <li><a href="<?php echo esc_url($pinterest); ?>"><i class="fab fa-pinterest"></i></a></li>
      <?php } if(!empty($linkedin)) { ?>
        <li><a href="<?php echo esc_url($linkedin); ?>"><i class="fab fa-linkedin"></i></a></li>
      <?php } if(!empty($youtube)) { ?>
        <li><a href="<?php echo esc_url($youtube); ?>"><i class="fab fa-youtube"></i></a></li>
      <?php } ?>
    </ul>
  <?php
  }
}
/**
 * Adds donation options to redux sections.
 *
 * @since 1.0.0
 */
function gautama_donation_redux_options( $options_files ) {
    if(gautama_is_give_active()){
        $options_files[] = get_template_directory() . '/inc/redux-options/options/donation-settings.php';
    }
    return $options_files;
}
add_filter( 'gautama_redux_option_files', 'gautama_donation_redux_options', 10, 1 );

/*
* get post type for options
*/
if(!function_exists('gautama_get_posts_select')){
	function gautama_get_posts_select($tax){
		$result = [];
	  $args = array(
	    'post_type' => $tax
	  );
	  $posts = get_posts($args);
	  if($posts){
			foreach($posts as $post){
		    $result[$post->ID] = $post->post_title ;
		  }
		}
	  return $result;
	}
}

/*
* Get Custom Page Template
*/
	function get_the_page_template($template, $switch){
		$page_template = gautama_get_option($template);
		$page_template_location = gautama_get_option($switch);
		if($page_template && $page_template_location){
			$post = get_post($page_template);
			return do_shortcode($post->post_content);
		}
		// wp_reset_postdata();
	}
