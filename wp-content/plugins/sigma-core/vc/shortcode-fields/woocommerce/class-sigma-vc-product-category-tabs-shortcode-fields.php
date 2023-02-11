<?php
/**
 * Sigma Product Category Tabs shortcode
 *
 * @package Sigma Core
 */
/**
 * Product Category Tabs shortcode.
 */
class Sigma_Vc_Product_Category_tabs_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Product Category Tabs', 'sigma-core' );
		$this->handle        = 'sigma_product_category_tabs';
		$this->description   = esc_html__( 'Use this shortcode to show Product Category Tabs.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrapper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}
	/**
	 * Product Category Tabs shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {

		$fields = array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Section Heading Title', 'sigma-core' ),
				'param_name'  => 'section_title',
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Section Heading Sub-title', 'sigma-core' ),
				'param_name'  => 'section_sub_title',
			),
      array(
				'type'       => 'param_group',
				'param_name' => 'product_category_tabs',
				'params'     => array(

					array(
            'type'        => 'dropdown',
						'heading'     => esc_html__( 'Select Product Categories', 'sigma-core' ),
            'param_name'  => 'select_category',
      			'value'       => sigmacore_get_tax_terms('product_cat'),
					),
          array(
    				'type'       => 'checkbox',
    				'heading'    => esc_html__( 'Add icon?', 'sigma-core' ),
    				'param_name' => 'add_icon',
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
    				'dependency' => array(
    					'element' => 'add_icon',
    					'value'   => 'true',
    				),
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
    				'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
    			),

				),
			),
			// Color options
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Tab Title Color', 'sigma-core' ),
				'param_name'  => 'tab_title_color',
				'description' => esc_html__( 'Select custom tab title color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Tab Border Color', 'sigma-core' ),
				'param_name'  => 'tab_border_color',
				'description' => esc_html__( 'Select custom tab border color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Tab Background Color', 'sigma-core' ),
				'param_name'  => 'tab_background_color',
				'description' => esc_html__( 'Select custom tab background color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Product Category Color', 'sigma-core' ),
				'param_name'  => 'product_cat_color',
				'description' => esc_html__( 'Select custom product category color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Product Title Color', 'sigma-core' ),
				'param_name'  => 'product_title_color',
				'description' => esc_html__( 'Select custom product title color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			vc_map_add_css_animation(),
			array(
				'type'        => 'el_id',
				'heading'     => esc_html__( 'Element ID', 'sigma-core' ),
				'param_name'  => 'el_id',
				/* translators: 1: anchor tag start, 2: anchor tag end */
				'description' => sprintf( esc_html__( 'Enter element ID (Note: make sure it is unique and valid according to %1$sw3c specification%2$s).', 'sigma-core' ), '<a href="https://www.w3schools.com/tags/att_global_id.asp" target="_self">', '</a>' ),
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
	 * Product Category Tabs shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
      'product_category_tabs' => '',
			'section_title'			  =>	'',
			'section_sub_title'		=>	'',
      'select_category'     => '',
      'add_icon'            => '',
      'icon_type'           => 'fontawesome',
      'icon_fontawesome'    => 'fas fa-adjust',
			'icon_openiconic'     => 'vc-oi vc-oi-dial',
			'icon_typicons'       => 'typcn typcn-adjust-brightness',
			'icon_linecons'       => 'vc_li vc_li-heart',
			'icon_monosocial'     => 'vc-mono vc-mono-fivehundredpx',
			'icon_material'       => 'vc-material vc-material-cake',
			'icon_flaticon'       => '',
			'tab_title_color'       => '',
			'tab_border_color'       => '',
			'tab_background_color'       => '',
			'product_cat_color'       => '',
			'product_title_color'       => '',
			'css_animation'       => '',
			'el_id'               => '',
			'el_class'            => '',
			'css'                 => '',
			'handle'              => $handle,
		);
		$atts = shortcode_atts( $default_atts, $atts, $handle );
		global $sigma_shortcodes, $sigma_vc_inline_css;

		$inline_css                               = '';
		$sigma_shortcodes[ $handle ]['atts']      = $atts;
		$sigma_shortcodes_class_unique            = 'sigma-product-category-tabs-' . mt_rand();
		$sigma_shortcodes_classes                 = $this->handle . '_wrapper';
    $sigma_shortcodes_classes                 .= ' sigma_tabs-custom-wrapper';
		$sigma_shortcodes_classes                 .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes                 .= ' ' . $this->wrapper_class;
		if ( $atts['el_class'] ) {
			$sigma_shortcodes_classes .= ' ' . $atts['el_class'];
		}

		//Color
		if ( $atts[ 'title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_tabs-custom-wrapper .nav-pills .nav-link { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_tabs-custom-wrapper .nav-pills .nav-link.active { color: " . $atts[ 'title_color' ] . ";}";
		}
		if ( $atts[ 'tab_border_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_tabs-custom-wrapper .nav-pills .nav-link { border-color: " . $atts[ 'tab_border_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_tabs-custom-wrapper .nav-pills .nav-link.active { border-color: " . $atts[ 'tab_border_color' ] . ";}";
		}
		if ( $atts[ 'tab_background_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_tabs-custom-wrapper .nav-pills .nav-link { background-color: " . $atts[ 'tab_background_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_tabs-custom-wrapper .nav-pills .nav-link.active { background-color: " . $atts[ 'tab_background_color' ] . ";}";
		}
		if ( $atts[ 'product_cat_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_tabs-custom-wrapper .sigma_tabs-count { color: " . $atts[ 'product_cat_color' ] . ";}";
		}
		if ( $atts[ 'product_title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_tabs-custom-wrapper h3 a { color: " . $atts[ 'product_title_color' ] . ";}";
		}

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
			<?php sigmacore_get_vc_shortcode_template( 'product-category-tabs/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Product_Category_tabs_Shortcode_Fields();
