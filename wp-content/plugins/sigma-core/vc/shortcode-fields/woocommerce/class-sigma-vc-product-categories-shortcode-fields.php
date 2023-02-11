<?php
/**
 * Sigma product categories shortcode
 *
 * @package Sigma Core
 */
/**
 * product categories shortcode.
 */
class Sigma_Vc_Product_Categories_Shortcode_Fields {
	/**
	 * Shortcode title.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	protected $title;
	/**
	 * Shortcode handle.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	protected $handle;
	/**
	 * Shortcode description.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	protected $description;
	/**
	 * Shortcode category.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	protected $category;

	/**
	 * Shortcode wrraper class.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	protected $wrapper_class;

	/**
	 * Shortcode map and callback
	 */
	function __construct() {
		$this->title         = esc_html__( 'Product Categories', 'sigma-core' );
		$this->handle        = 'sigma_product_categories';
		$this->description   = esc_html__( 'Use this shortcode to show product categories.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrapper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}
	/**
	 * product categories shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {

		$fields = array(
			array(
        'type'        => 'dropdown',
        'heading'     => esc_html__( 'Select Style', 'sigma-core' ),
        'param_name'  => 'style',
        'value'       => array(
          'Style 1' => 'style-1',
          'Style 2' => 'style-2',
					'Style 3' => 'style-3',
					'Style 4' => 'style-4',
					'Style 5' => 'style-5',
					'Style 6' => 'style-6',
        ),
      ),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Remove Column Spacing?', 'sigma-core' ),
				'param_name'       => 'remove_gutters',
				'description'      => esc_html__( 'Select this checkbox to show remove all space between columns', 'sigma-core' ),
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'std' => 'yes',
				'dependency' => array(
					'element' => 'style',
					'value'   => 'style-2',
				),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Inverse Columns?', 'sigma-core' ),
				'param_name'       => 'inverse_columns',
				'description'      => esc_html__( 'Select this checkbox to show inverse columns', 'sigma-core' ),
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'std' => 'yes',
				'dependency' => array(
					'element' => 'style',
					'value'   => 'style-6',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Categories Height', 'sigma-core' ),
				'param_name'  => 'post_cat_height',
				'description' => esc_html__( 'Enter height that you wish to set for the categories (Don\'t change if youre not sure what this is) - Example: 500px', 'sigma-core' ),
			),
      array(
				'type'       => 'param_group',
				'param_name' => 'list_items',
				'params'     => array(
          array(
    				'type'        => 'dropdown',
    				'heading'     => esc_html__( 'Select Category', 'sigma-core' ),
    				'param_name'  => 'prod_cat_slug',
    				'description' => esc_html__( 'Select Type.', 'sigma-core' ),
    				'value'       => sigmacore_get_tax_terms('product_cat'),
    			),
					array(
						'type'        => 'attach_image',
						'heading'     => esc_html__( 'Select Background Image', 'sigma-core' ),
						'param_name'  => 'prod_cat_bg',
						'value'       => '',
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Icon library', 'sigma-core' ),
						'value' => array(
							esc_html__( 'Font Awesome 5', 'sigma-core' ) => 'fontawesome',
							esc_html__( 'Open Iconic', 'sigma-core' )    => 'openiconic',
							esc_html__( 'Typicons', 'sigma-core' )       => 'typicons',
							esc_html__( 'Entypo', 'sigma-core' )         => 'entypo',
							esc_html__( 'Linecons', 'sigma-core' )       => 'linecons',
							esc_html__( 'Mono Social', 'sigma-core' )    => 'monosocial',
							esc_html__( 'Material', 'sigma-core' )       => 'material',
							esc_html__( 'Flaticon', 'sigma-core' )       => 'flaticon',
						),
						'admin_label' => true,
						'param_name'  => 'icon_type',
						'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
						'description' => esc_html__( 'Select icon library.', 'sigma-core' ),
					),
					array(
						'type'             => 'iconpicker',
						'heading'          => esc_html__( 'Icon', 'sigma-core' ),
						'param_name'       => 'icon_flaticon',
						'settings'   => array(
							'iconsPerPage' => 500,
							'type' => 'flaticon',
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value'   => 'flaticon',
						),
						'description'      => esc_html__( 'Select icon from library.', 'sigma-core' ),
						'group'            => esc_html__( 'Icon Settings', 'sigma-core' ),
						'edit_field_class' => 'vc_col-sm-6 vc_column vc_column-with-padding',
					),
					array(
						'type'       => 'iconpicker',
						'heading'    => esc_html__( 'Icon', 'sigma-core' ),
						'param_name' => 'icon_fontawesome',
						'value'      => 'fas fa-adjust',
						'settings'   => array(
							'emptyIcon'    => false,
							'iconsPerPage' => 500,
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value'   => 'fontawesome',
						),
						'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
						'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
					),
					array(
						'type'       => 'iconpicker',
						'heading'    => esc_html__( 'Icon', 'sigma-core' ),
						'param_name' => 'icon_openiconic',
						'value'      => 'vc-oi vc-oi-dial',
						'settings'   => array(
							'emptyIcon'    => false,
							'type'         => 'openiconic',
							'iconsPerPage' => 4000,
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value'   => 'openiconic',
						),
						'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
						'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
					),
					array(
						'type'       => 'iconpicker',
						'heading'    => esc_html__( 'Icon', 'sigma-core' ),
						'param_name' => 'icon_typicons',
						'value'      => 'typcn typcn-adjust-brightness',
						'settings' => array(
							'emptyIcon'    => false,
							'type'         => 'typicons',
							'iconsPerPage' => 4000,
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value'   => 'typicons',
						),
						'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
						'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
					),
					array(
						'type'       => 'iconpicker',
						'heading'    => esc_html__( 'Icon', 'sigma-core' ),
						'param_name' => 'icon_entypo',
						'value'      => 'entypo-icon entypo-icon-note',
						'settings'   => array(
							'emptyIcon' => false,
							'type'         => 'entypo',
							'iconsPerPage' => 4000,
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value'   => 'entypo',
						),
						'group'      => esc_html__( 'Icon Settings', 'sigma-core' ),
					),
					array(
						'type'       => 'iconpicker',
						'heading'    => esc_html__( 'Icon', 'sigma-core' ),
						'param_name' => 'icon_linecons',
						'value'      => 'vc_li vc_li-heart',
						'settings' => array(
							'emptyIcon'    => false,
							'type'         => 'linecons',
							'iconsPerPage' => 4000,
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value'   => 'linecons',
						),
						'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
						'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
					),
					array(
						'type'       => 'iconpicker',
						'heading'    => esc_html__( 'Icon', 'sigma-core' ),
						'param_name' => 'icon_monosocial',
						'value'      => 'vc-mono vc-mono-fivehundredpx',
						'settings'   => array(
							'emptyIcon'    => false,
							'type'         => 'monosocial',
							'iconsPerPage' => 4000,
						),
						'dependency'  => array(
							'element' => 'icon_type',
							'value'   => 'monosocial',
						),
						'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
						'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
					),
					array(
						'type'       => 'iconpicker',
						'heading'    => esc_html__( 'Icon', 'sigma-core' ),
						'param_name' => 'icon_material',
						'value'      => 'vc-material vc-material-cake',
						'settings'   => array(
							'emptyIcon'    => false,
							'type'         => 'material',
							'iconsPerPage' => 4000,
						),
						'dependency'  => array(
							'element' => 'icon_type',
							'value'   => 'material',
						),
						'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
						'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
					),
				),
			),
			// Color options
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Title Color', 'sigma-core' ),
				'param_name'  => 'title_color',
				'description' => esc_html__( 'Select custom title color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Subtitlte Color', 'sigma-core' ),
				'param_name'  => 'subtitle_color',
				'description' => esc_html__( 'Select custom subtitle color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-1',
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Icon Color', 'sigma-core' ),
				'param_name'  => 'icon_color',
				'description' => esc_html__( 'Select custom icon color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Icon Background Color', 'sigma-core' ),
				'param_name'  => 'icon_bg_color',
				'description' => esc_html__( 'Select custom icon background color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => ['style-1'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Border Color', 'sigma-core' ),
				'param_name'  => 'border_color',
				'description' => esc_html__( 'Select custom border color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => ['style-1'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Hover Background Color', 'sigma-core' ),
				'param_name'  => 'hover_background_color',
				'description' => esc_html__( 'Select custom hover background color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => ['style-1', 'style-2', 'style-5'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Hover Icon Color', 'sigma-core' ),
				'param_name'  => 'hover_icon_color',
				'description' => esc_html__( 'Select custom hover icon color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => ['style-1', 'style-4'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Button Color', 'sigma-core' ),
				'param_name'  => 'button_color',
				'description' => esc_html__( 'Select custom button color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => ['style-2', 'style-6'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Button Border Color', 'sigma-core' ),
				'param_name'  => 'button_border_color',
				'description' => esc_html__( 'Select custom button border color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => ['style-2', 'style-6'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Button Hover Background Color', 'sigma-core' ),
				'param_name'  => 'button_hover_bg_color',
				'description' => esc_html__( 'Select custom button hover background color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => ['style-2', 'style-6'],
				),
			),
			vc_map_add_css_animation(),
			array(
				'type'        => 'el_id',
				'heading'     => esc_html__( 'Element ID', 'sigma-core' ),
				'param_name'  => 'el_id',
				/* translators: 1: anchor tag start, 2: anchor tag end */
				'description' => sprintf( esc_html__( 'Enter element ID (Note: make sure it is unique and valid according to %1$sw3c specification%2$s).', 'sigma-core' ), '<a href="https://www.w3schools.com/tags/att_global_id.asp" >', '</a>' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'sigma-core' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'sigma-core' ),
			),
			array(
				'type'       => 'css_editor',
				'heading'    => esc_html__( 'CSS box', 'sigma-core' ),
				'param_name' => 'css',
				'group'      => esc_html__( 'Design Options', 'sigma-core' ),
			),
		);

		// This function will add all of the layout options into the fields
		$fields = sigmacore_get_layout_options( $fields, ['grid'], '' );

		// Shortcode Params
		$params = array(
			'name'        => $this->title,
			'base'        => $this->handle,
			'category'    => $this->category,
			'description' => $this->description,
			'class'       => $this->wrapper_class,
			'params'      => $fields,
		);
		vc_map( $params );
	}
	/**
	 * product categories shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'style'                    => 'style-1',
			'remove_gutters'					 => 'yes',
			'inverse_columns'					 => 'yes',
			'post_cat_height'					 => '',
      'list_items'               => '',
      'prod_cat_slug'            => '',
			'prod_cat_bg'							 => '',
			'product_cat_subtitle'     => '',
			'product_cat_description'  => '',
			'hover_overlay'            => '',
			'show_button'              => '',
			'product_cat_image'        => '',
			'icon_type'                => 'fontawesome',
			'icon_image'               => '',
			'icon_fontawesome'         => 'fas fa-adjust',
			'icon_openiconic'          => 'vc-oi vc-oi-dial',
			'icon_typicons'            => 'typcn typcn-adjust-brightness',
			'icon_linecons'            => 'vc_li vc_li-heart',
			'icon_monosocial'          => 'vc-mono vc-mono-fivehundredpx',
			'icon_material'            => 'vc-material vc-material-cake',
			'icon_flaticon'            => '',
			'title_color'            	 => '',
			'subtitle_color'           => '',
			'icon_color'            	 => '',
			'icon_bg_color'            => '',
			'border_color'           	 => '',
			'hover_background_color'   => '',
			'hover_icon_color'         => '',
			'button_color'             => '',
			'button_border_color'      => '',
			'button_hover_bg_color'    => '',
			'css_animation'            => '',
			'el_id'                    => '',
			'el_class'                 => '',
			'css'                      => '',
			'handle'                   => $handle,
		);

		$default_atts = sigmacore_get_layout_attributes($default_atts, ['grid', 'slider', 'isotope'] );

		$atts = shortcode_atts( $default_atts, $atts, $handle );

		global $sigma_shortcodes, $sigma_vc_inline_css;

		$inline_css															  = '';
		$sigma_shortcodes[ $handle ]['atts']      = $atts;
		$sigma_shortcodes_class_unique            = 'sigma-product-categories-' . mt_rand();
		$sigma_shortcodes_classes                 = $this->handle . '_wrapper';
		$sigma_shortcodes_classes                 .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes                 .= ' ' . $this->wrapper_class;
		$sigma_shortcodes_classes            			.= ' product-cat-' . $atts[ 'style' ];

		if ( $atts['el_class'] ) {
			$sigma_shortcodes_classes .= ' ' . $atts['el_class'];
		}

		if ( $atts[ 'post_cat_height' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product-category a { height: " . $atts[ 'post_cat_height' ] . ";}";
		}

		//Color
		if ( $atts[ 'title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-1 .sigma_product-category a h5 { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-2 .sigma_product-category a h5 { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-3 .sigma_product-category a .sigma_product-category-body h5 { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-4 .sigma_product-category a h5 { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-5 .sigma_product-category a h5 { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-6 .sigma_product-category a h5 { color: " . $atts[ 'title_color' ] . ";}";
		}
		if ( $atts[ 'subtitle_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-1 .sigma_product-category a span { color: " . $atts[ 'subtitle_color' ] . ";}";
		}
		if ( $atts[ 'icon_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-1 .sigma_product-category a i.icon { color: " . $atts[ 'icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-2 .sigma_product-category a i { color: " . $atts[ 'icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-3 .sigma_product-category a .sigma_product-category-body i { color: " . $atts[ 'icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-4 .sigma_product-category a i { color: " . $atts[ 'icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-4 .sigma_product-category a i { border-color: " . $atts[ 'icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-5 .sigma_product-category a i { color: " . $atts[ 'icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-6 .sigma_product-category a i { color: " . $atts[ 'icon_color' ] . ";}";
		}
		if ( $atts[ 'icon_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-1 .sigma_product-category a i.icon{ background-color: " . $atts[ 'icon_bg_color' ] . ";}";
		}
		if ( $atts[ 'border_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-1 .sigma_product-category a { border-color: " . $atts[ 'border_color' ] . ";}";
		}
		if ( $atts[ 'hover_background_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-1 .sigma_product-category a:hover { background-color: " . $atts[ 'hover_background_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-2 .sigma_product-category a:hover::before { background-color: " . $atts[ 'hover_background_color' ] . ";}";
		}
		if ( $atts[ 'hover_icon_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-1 .sigma_product-category a:hover i.icon-hidden { color: " . $atts[ 'hover_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-4 .sigma_product-category a:hover i { color: " . $atts[ 'hover_icon_color' ] . ";}";
		}
		if ( $atts[ 'button_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-2 .sigma_product-category a button { color: " . $atts[ 'button_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-6 .sigma_product-category a button { color: " . $atts[ 'button_color' ] . ";}";
		}
		if ( $atts[ 'button_border_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-2 .sigma_product-category a button { border-color: " . $atts[ 'button_border_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-6 .sigma_product-category a button { border-color: " . $atts[ 'button_border_color' ] . ";}";
		}
		if ( $atts[ 'button_hover_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-2 .sigma_product-category a button:hover { background-color: " . $atts[ 'button_hover_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-2 .sigma_product-category a button:hover { border-color: " . $atts[ 'button_hover_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".product-cat-style-6 .sigma_product-category a button { background-color: " . $atts[ 'button_hover_bg_color' ] . ";}";
		}

		$sigma_shortcodes_classes .= ' sigma-product-categories';
		if ( $atts['css_animation'] && 'none' !== $atts['css_animation'] ) {
			wp_enqueue_script( 'vc_waypoints' );
			wp_enqueue_style( 'vc_animate-css' );
			$sigma_shortcodes_classes .= ' wpb_animate_when_almost_visible wpb_' . $atts['css_animation'] . ' ' . $atts['css_animation'];
		}
		if ( isset( $atts['css'] ) && $atts['css'] ) {
			$sigma_shortcodes_classes .= ' ' . vc_shortcode_custom_css_class( $atts['css'], ' ' );
		}

		if ( $inline_css ) {
			$sigma_vc_inline_css[] = $inline_css;
			sigmacore_vc_add_inline_css(); // This is added in case the sigma_vc_inline failed to fetch the css
		}

		ob_start();
		?>
		<div <?php echo ( $atts['el_id'] ) ? 'id=' . esc_attr( $atts["el_id"] ) : ''; ?> class="<?php echo esc_attr( $sigma_shortcodes_classes ); ?>">
			<?php sigmacore_get_vc_shortcode_template( 'product-categories/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Product_Categories_Shortcode_Fields();
