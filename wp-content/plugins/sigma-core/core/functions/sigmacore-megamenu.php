<?php
/**
 * File responsible for megamenu functionality.
 *
 * @package Sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Adds megamenu CPT
 */
add_action( 'init', 'sigmacore_register_cpt_megamenu' );

/**
 * Update the columns shown on the custom post type edit.php view - so we also have custom columns
 */
add_filter( 'manage_megamenu_posts_columns' , 'sigmacore_megamenu_columns_add' );

/**
 * This fills in the columns that were created with each individual post's value
 */
add_action( 'manage_megamenu_posts_custom_column' , 'sigmacore_megamenu_columns_update', 10, 2 );

/**
 * Add the megamenu shortcode
 */
add_shortcode( 'sigma_megamenu', 'sigmacore_megamenu_shortcode' );

/**
 * Adds the megamenu checkbox field and the megamenu shortcode fields in the menu item.
 *
 * NOTE: Requieres WordPress 5.4.x to work due to the addition of wp_nav_menu_item_custom_fields action.
 */
add_action( 'wp_nav_menu_item_custom_fields', 'sigmacore_megamenu_fields', 10, 4 );

/**
 * Save menu item field values
 */
add_action( 'wp_update_nav_menu_item', 'sigmacore_megamenu_save', 10, 3 );

/**
 * Adds the new megamenu fields in the screen option columns
 */
add_filter( 'manage_nav-menus_columns', 'sigmacore_megamenu_columns', 99 );

add_filter( 'nav_menu_css_class', 'sigmacore_megamenu_classes', 10, 4 );

add_filter( 'walker_nav_menu_start_el', 'sigmacore_megamenu_start_el', 10, 4 );

/**
 * Register "megamenu" custom post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type/
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @package Sigma Core
 */
function sigmacore_register_cpt_megamenu() {
	$labels = array(
		'name'                  => esc_html__( 'Mega Menus', 'sigma-core' ),
		'singular_name'         => esc_html__( 'Mega Menu', 'sigma-core' ),
		'menu_name'             => esc_html__( 'Mega Menus', 'sigma-core' ),
		'name_admin_bar'        => esc_html__( 'Mega Menu', 'sigma-core' ),
		'add_new'               => esc_html__( 'Add New', 'sigma-core' ),
		'add_new_item'          => esc_html__( 'Add New Mega Menu', 'sigma-core' ),
		'new_item'              => esc_html__( 'New Mega Menu', 'sigma-core' ),
		'edit_item'             => esc_html__( 'Edit Mega Menu', 'sigma-core' ),
		'view_item'             => esc_html__( 'View Mega Menu', 'sigma-core' ),
		'all_items'             => esc_html__( 'All Mega Menus', 'sigma-core' ),
		'search_items'          => esc_html__( 'Search Mega Menu', 'sigma-core' ),
		'parent_item_colon'     => esc_html__( 'Parent Mega Menu:', 'sigma-core' ),
		'not_found'             => esc_html__( 'No Mega Menu found.', 'sigma-core' ),
		'not_found_in_trash'    => esc_html__( 'No Mega Menu found in Trash.', 'sigma-core' ),
		'featured_image'        => esc_html__( 'Mega Menu Image', 'sigma-core' ),
		'set_featured_image'    => esc_html__( 'Set Mega Menu Image', 'sigma-core' ),
		'remove_featured_image' => esc_html__( 'Remove Mega Menu Image', 'sigma-core' ),
		'use_featured_image'    => esc_html__( 'Use Mega Menu Image', 'sigma-core' ),
	);

	$cpt_megamenu_args = array(
		'labels'             => $labels,
		'description'        => esc_html__( 'Description.', 'sigma-core' ),
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'show_in_rest'       => true,
		'rewrite'            => array( 'slug' => 'megamenu' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor' ),
		'menu_icon'          => 'dashicons-editor-ul',
	);

	$cpt_megamenu_args = apply_filters( 'sigmacore_register_cpt_megamenu', $cpt_megamenu_args );

	register_post_type( 'megamenu', $cpt_megamenu_args );
}

/**
 * Filters a menu item's starting output.
 *
 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
 * no filter for modifying the opening and closing `<li>` for a menu item.
 *
 * @since 1.0.0
 *
 * @param string   $item_output The menu item's starting HTML output.
 * @param object   $item        Menu item data object.
 * @param int      $depth       Depth of menu item. Used for padding.
 * @param stdClass $args        An object of wp_nav_menu() arguments.
 */
function sigmacore_megamenu_start_el($item_output, $item, $depth, $args){

	$is_mm_enabled = get_post_meta( $item->db_id, 'menu-item-mm_enable', true );
	$mm_shortcode = get_post_meta( $item->db_id, 'menu-item-mm_shortcode', true );

	if( $is_mm_enabled && !empty($mm_shortcode) ){
		$description_html = '<div class="sigma_mega-menu-wrapper"><div class="sigma_mega-menu-wrapper-inner"><div class="container">'.do_shortcode($mm_shortcode).'</div></div></div>';
		return $item_output.$description_html;
	}
	return $item_output;

}

/**
 * Adds the necessary classes for the megamenu.
 *
 * @since 1.0.0
 *
 * @param string $classes string of classes for the menu item
 * @param object $item The menu item object.
 * @param array  $args The argumens of the menu item.
 * @param int    $depth The depth of the current menu item.
 */
function sigmacore_megamenu_classes( $classes, $item, $args, $depth ){

	$is_mm_enabled = get_post_meta( $item->db_id, 'menu-item-mm_enable', true );
	$mm_shortcode = get_post_meta( $item->db_id, 'menu-item-mm_shortcode', true );

	if( $is_mm_enabled && !empty($mm_shortcode) ){
		$classes[] = esc_attr('sigma_mega-menu-item');
	}

	return $classes;

}

/**
 * Adds the new megamenu fields in the menu item.
 *
 * @since 1.0.0
 *
 * @param int    $id Menu item ID
 * @param object $item The menu item object.
 * @param int 	 $depth The depth of the current menu item.
 * @param array  $args The argumens of the menu item.
 */
function sigmacore_megamenu_fields( $id, $item, $depth, $args ){

	$fields = array(
		'mm_enable'	=>	esc_html__('Activate Mega Menu', 'sigma-core'),
	  'mm_shortcode'	=>	esc_html__('Mega Menu Shortcode', 'sigma-core'),
	);

	foreach( $fields as $_key => $label ){

		$key = sprintf( 'menu-item-%s', $_key );
		$id = sprintf( 'edit-%s-%s', $key, $item->ID );
		$name = sprintf( '%s[%s]', $key, $item->ID );
		$value = get_post_meta( $item->ID, $key, true );
		$class = sprintf( 'field-%s', $_key );

    $checked = $value == 1 ? 'checked="checked"' : '';

    if($key == 'menu-item-mm_enable'){
		?>

		<p class="description description-wide <?php echo esc_attr( $class ) ?>">
			<label for="<?php echo esc_attr( $id ) ?>">
				<input type="checkbox" id="<?php echo esc_attr( $id ) ?>" name="<?php echo esc_attr( $name ) ?>" value="1" <?php echo esc_attr($checked) ?>>
				<?php echo esc_html( $label ) ?>
			</label>
		</p>

  <?php }else{ ?>

    <p class="description description-wide <?php echo esc_attr( $class ) ?>">
			<label for="<?php echo esc_attr( $id ) ?>">
        <?php echo esc_html__('Mega Menu Shortcode', 'sigma-core') ?>
        <input id="<?php echo esc_attr( $id ) ?>" type="text" class="widefat" name="<?php echo esc_attr( $name ) ?>" value="<?php echo esc_attr($value) ?>">
			</label>
		</p>

  <?php
    }

	}

}

/**
 * Adds the new megamenu fields in the screen options.
 *
 * @since 1.0.0
 *
 * @param array $columns Array of items that display in the screen options.
 */
function sigmacore_megamenu_columns( $columns ){

	$fields = array(
		'mm_enable'	=>	esc_html__('Activate Mega Menu', 'sigma-core'),
	  'mm_shortcode'	=>	esc_html__('Mega Menu Shortcode', 'sigma-core'),
	);
	$columns = array_merge( $columns, $fields );

	return $columns;

}

/**
 * Save and Update the new megamenu fields
 *
 * @since 1.0.0
 *
 * @param int 	 $menu_id Id of the megamenu item.
 * @param int 	 $menu_item_db_id Id of the megamenu item in the Database (Different than the real ID)
 * @param object $menu_item_args Menu item arguements object
 */
function sigmacore_megamenu_save( $menu_id, $menu_item_db_id, $menu_item_args ){

  /* @TODO: Remove this line of code because it is causing issues when importing demo content */
	// if( defined( 'DOING_AJAX' ) && DOING_AJAX ){
	// 	return;
	// }
  //
	// check_admin_referer( 'update-nav_menu', 'update-nav-menu-nonce' );

	$fields = array(
		'mm_enable'	=>	esc_html__('Activate Mega Menu', 'sigma-core'),
	  'mm_shortcode'	=>	esc_html__('Mega Menu Shortcode', 'sigma-core'),
	);

	foreach( $fields as $_key => $label ){

		// menu-item prefix is required since this is the way WordPress stores data in the database.
		$key = sprintf( 'menu-item-%s', $_key );

		//Sanitize
		if( !empty( $_POST[$key][$menu_item_db_id] ) ){
			$value = $_POST[$key][$menu_item_db_id];
		}else{
			$value = null;
		}

		//Save
		if( !is_null( $value ) ){
			update_post_meta( $menu_item_db_id, $key, $value );
		}else{
			delete_post_meta( $menu_item_db_id, $key );
		}

	}

}

/**
 * Adds the new columns in the mega menu table
 *
 * @since 1.0.0
 *
 * @param array  $columns The columns that are already in each megamenu entry.
 * @return array $columns The columns that will be in each megamenu entry.
 */
function sigmacore_megamenu_columns_add($columns){

	return array(
	 'cb' => '<input type="checkbox" />',
	 'title' => esc_html__('Title', 'sigma-core'),
	 'sigma_mm_shortcode_value' => esc_html__('Shortcode Value', 'sigma-core'),
	 'sigma_mm_post_id' => esc_html__( 'Megamenu ID', 'sigma-core'),
	 'date' => esc_html__( 'Date', 'sigma-core')
	);

}

/**
* Update the values of the newly added columns.
	*
	* @since 1.0.0
	*
	* @param array $column The column that is currently being queried.
*/
function sigmacore_megamenu_columns_update( $column, $post_id ) {

  switch ( $column ) {
  	case 'sigma_mm_shortcode_value' :
  		echo '[sigma_megamenu id="'.$post_id.'"]';
  		break;
  	case 'sigma_mm_post_id' :
  		echo $post_id;
  		break;
	}

}

 /**
 * Adds the megamenu shortcode that will display the content.
	*
	* @since 1.0.0
	*
	* @param array 	 $atts The attributes that the shortcode accepts.
	* @return string $megamenu Returns $megamenu html content if not empty, text message otherwise.
 */
function sigmacore_megamenu_shortcode( $atts = array() ) {

  // set up default parameters
  extract(shortcode_atts(array(
   'id' => ''
  ), $atts));

  if(empty($id)){
    return;
  }

  $megamenu = '';
  $megamenu_query = new WP_Query( array( 'p' => $id, 'post_type' => 'megamenu' ) );

  if( $megamenu_query->have_posts() ){
    while($megamenu_query->have_posts()){
      $megamenu_query->the_post();

      $megamenu = do_shortcode( get_the_content() );

    }
  }
	wp_reset_postdata();

  return !empty($megamenu) ? $megamenu : esc_html__('No megamenu found with this ID', 'sigma-core');
}

/**
* Adds megamenu specific VC shortcodes
 *
 * @since 1.0.0
 *
 * @return string $shortcodes List of shortcodes
*/
function sigmacore_megamenu_vc_shortcode( $shortcodes ){

	$shortcodes[] = trailingslashit( SIGMACORE_PATH ) . 'core/vc/shortcode-fields/class-sigma-vc-megamenu-menu.php';

	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		$shortcodes[] = trailingslashit( SIGMACORE_PATH ) . 'core/vc/shortcode-fields/class-sigma-vc-megamenu-products.php';
	}

	return $shortcodes;

}
add_filter('sigmacore/shortcodes', 'sigmacore_megamenu_vc_shortcode');
