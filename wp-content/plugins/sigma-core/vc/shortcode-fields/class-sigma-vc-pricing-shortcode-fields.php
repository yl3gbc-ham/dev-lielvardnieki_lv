<?php
/**
 * Sigma Pricing shortcode
 *
 * @package Sigma Core
 */

/**
 * Pricing shortcode.
 */
class Sigma_Vc_Pricing_Shortcode_Fields {

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
	protected $wrraper_class;

	/**
	 * Shortcode map and callback
	 */
	function __construct() {

		$this->title         = esc_html__( 'Pricing', 'sigma-core' );
		$this->handle        = 'sigma_pricing';
		$this->description   = esc_html__( 'Use this shortcode to show pricing.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrraper_class = 'sigma-shortcode-wrapper';

		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}

	/**
	 * pricing shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {

		$fields = array(

			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Pricing Style', 'sigma-core' ),
				'description' => esc_html__( 'Select Style.', 'sigma-core' ),
				'param_name'  => 'style',
				'value'       => array(
					esc_html__( 'Style 1', 'sigma-core' ) => 'style-1',
					esc_html__( 'Style 2', 'sigma-core' ) => 'style-2',
				),
			),
      array(
        'type'        => 'textfield',
        'heading'     => esc_html__( 'Title', 'sigma-core' ),
        'param_name'  => 'title',
      ),
      array(
        'type'        => 'textfield',
        'heading'     => esc_html__( 'Subtitle', 'sigma-core' ),
        'param_name'  => 'subtitle',
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-1',
				),
      ),
			array(
				'type'       => 'param_group',
				'param_name' => 'features_list',
				'params'     => array(
          array(
            'type'        => 'textfield',
            'heading'     => esc_html__( 'Features', 'sigma-core' ),
            'param_name'  => 'pricing_features_title',
          ),
				),
			),
      array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Add Button?', 'sigma-core' ),
				'param_name'       => 'show_link',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'description'      => esc_html__( 'Select this checkbox to wrap the info box with a link', 'sigma-core' ),
			),
			array(
        'type'        => 'vc_link',
        'heading'     => esc_html__( 'Button Link', 'sigma-core' ),
        'param_name'  => 'link',
				'dependency'  => array(
					'element' => 'show_link',
					'value'   => 'yes',
				),
      ),
			array(
        'type'        => 'textfield',
        'heading'     => esc_html__( 'Currency', 'sigma-core' ),
        'param_name'  => 'currency',
      ),
      array(
        'type'        => 'textfield',
        'heading'     => esc_html__( 'Pricing', 'sigma-core' ),
        'param_name'  => 'price',
      ),
      array(
        'type'        => 'textfield',
        'heading'     => esc_html__( 'Price Per Value', 'sigma-core' ),
        'param_name'  => 'price_value',
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-1',
				),
      ),
      array(
        'type'             => 'checkbox',
        'heading'          => esc_html__( 'Highlight Package?', 'sigma-core' ),
        'param_name'       => 'package_highlight',
        'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
        'description'      => esc_html__( 'Select this checkbox to highlight this package', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-1',
				),
      ),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Add icon?', 'sigma-core' ),
				'param_name' => 'add_icon',
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-2',
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Icon Type', 'sigma-core' ),
				'param_name' => 'icon_as',
				'value'      => array(
					esc_html__( 'Font', 'sigma-core' )   => 'font',
					esc_html__( 'Image', 'sigma-core' )  => 'image',
				),
				'dependency'  => array(
					'element' => 'add_icon',
					'value'   => 'true',
				),
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image', 'sigma-core' ),
				'param_name'  => 'icon_image',
				'value'       => '',
				'dependency'  => array(
					'element' => 'icon_as',
					'value'   => 'image',
				),
				'description' => esc_html__( 'Select image for icon.', 'sigma-core' ),
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
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
					'element' => 'icon_as',
					'value'   => 'font',
				),
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
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Add Background Image?', 'sigma-core' ),
				'param_name' => 'add_bg_img',
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-2',
				),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image', 'sigma-core' ),
				'param_name'  => 'pricing_bg_image',
				'value'       => '',
				'dependency'  => array(
					'element' => 'add_bg_img',
					'value'   => 'true',
				),
				'description' => esc_html__( 'Select background image for pricing.', 'sigma-core' ),
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
				'heading'     => esc_html__( 'Subtitle Color', 'sigma-core' ),
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
				'heading'     => esc_html__( 'Features Color', 'sigma-core' ),
				'param_name'  => 'features_color',
				'description' => esc_html__( 'Select custom features color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Price Color', 'sigma-core' ),
				'param_name'  => 'price_color',
				'description' => esc_html__( 'Select custom price color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Price Background Color', 'sigma-core' ),
				'param_name'  => 'price_bg_color',
				'description' => esc_html__( 'Select custom price background color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-1',
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Button Color', 'sigma-core' ),
				'param_name'  => 'btn_color',
				'description' => esc_html__( 'Select custom button color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Background Color', 'sigma-core' ),
				'param_name'  => 'background_color',
				'description' => esc_html__( 'Select custom background color.', 'sigma-core' ),
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
			'class'       => $this->wrraper_class,
			'params'      => $fields,
		);

		vc_map( $params );
	}

	/**
	 * pricing shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {

		$default_atts = array(
			'style'                       => 'style-1',
      'package_image'           		=> '',
			'title'               				=> '',
			'currency'										=> '',
			'subtitle' 										=> '',
			'features_list' 								=> '',
			'pricing_features_title' 			=> '',
			'feature_tooltip' 						=> '',
			'tooltip_text' 							  => '',
			'pricing_features_desc' 			=> '',
      'package_highlight'         	=> '',
			'show_link'               		=> '',
      'link'               					=> '',
      'link_text'               		=> '',
      'price'               				=> '',
      'price_value'               	=> '',
			'add_icon'            				=> '',
			'icon_type'                   => 'fontawesome',
			'icon_as'             				=> 'font',
			'icon_image'          				=> '',
			'icon_fontawesome'    				=> 'fas fa-adjust',
			'icon_openiconic'     				=> 'vc-oi vc-oi-dial',
			'icon_typicons'       				=> 'typcn typcn-adjust-brightness',
			'icon_linecons'       				=> 'vc_li vc_li-heart',
			'icon_monosocial'     				=> 'vc-mono vc-mono-fivehundredpx',
			'icon_material'       				=> 'vc-material vc-material-cake',
			'icon_flaticon'       				=> '',
			'add_bg_img'       						=> '',
			'pricing_bg_image'       			=> '',
			'title_color'       					=> '',
			'icon_color'       						=> '',
			'subtitle_color'       				=> '',
			'features_color'       				=> '',
			'price_color'       					=> '',
			'price_bg_color'       				=> '',
			'btn_color'       						=> '',
			'background_color'       			=> '',
			'css_animation'               => '',
			'el_id'                       => '',
			'el_class'                    => '',
			'css'                         => '',
			'handle'                      => $handle,
		);

		$atts = shortcode_atts( $default_atts, $atts, $handle );

		global $sigma_shortcodes, $sigma_vc_inline_css;

		$inline_css                                 = '';
		$sigma_shortcodes[ $handle ][ 'atts' ]      = $atts;
		$sigma_shortcodes_class_unique              = 'sigma-pricing-' . mt_rand();
		$sigma_shortcodes_classes                   = $this->handle . '_wrapper';
		$sigma_shortcodes_classes                   .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes                   .= ' ' . $this->wrraper_class;

		if ( $atts[ 'el_class' ] ) {
			$sigma_shortcodes_classes .= ' ' . $atts[ 'el_class' ];
		}

		$sigma_shortcodes_classes                   .= ' pricing-' . $atts[ 'style' ];

		//Color
		if ( $atts[ 'title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".pricing-style-1 .sigma_pricing .sigma_pricing-info h5 { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_pricing_wrapper.pricing-style-2 .sigma_pricing-info h5 { color: " . $atts[ 'title_color' ] . ";}";
		}
		if ( $atts[ 'subtitle_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".pricing-style-1 .sigma_pricing .sigma_pricing-info h5 + span { color: " . $atts[ 'subtitle_color' ] . ";}";
		}
		if ( $atts[ 'features_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".pricing-style-1 .sigma_pricing .list-style-none li { color: " . $atts[ 'features_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_pricing_wrapper.pricing-style-2 .sigma_pricing ul li i { color: " . $atts[ 'features_color' ] . ";}";
		}
		if ( $atts[ 'icon_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_pricing_wrapper.pricing-style-2 .sigma_pricing-info .icon{ color: " . $atts[ 'icon_color' ] . ";}";
		}
		if ( $atts[ 'price_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".pricing-style-1 .sigma_pricing .sigma_pricing-price .sigma_pricing-currency{ color: " . $atts[ 'price_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".pricing-style-1 .sigma_pricing .sigma_pricing-price span{ color: " . $atts[ 'price_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_pricing_wrapper.pricing-style-2 .sigma_pricing-info .sigma_pricing-price .sigma_pricing-currency{ color: " . $atts[ 'price_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_pricing_wrapper.pricing-style-2 .sigma_pricing-info .sigma_pricing-price span{ color: " . $atts[ 'price_color' ] . ";}";
		}
		if ( $atts[ 'price_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".pricing-style-1 .sigma_pricing .sigma_pricing-price { background-color: " . $atts[ 'price_bg_color' ] . ";}";
		}
		if ( $atts[ 'btn_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".pricing-style-1 .sigma_pricing .list-style-none .sigma_btn-custom{ color: " . $atts[ 'btn_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_pricing_wrapper.pricing-style-2 .sigma_pricing ul li .sigma_btn-custom{ color: " . $atts[ 'btn_color' ] . ";}";
		}
		if ( $atts[ 'background_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".pricing-style-1 .sigma_pricing { background-color: " . $atts[ 'background_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_pricing_wrapper.pricing-style-2 .sigma_pricing { background-color: " . $atts[ 'background_color' ] . ";}";
		}

		if ( $atts['css_animation'] && 'none' !== $atts['css_animation'] ) {
			wp_enqueue_script( 'vc_waypoints' );
			wp_enqueue_style( 'vc_animate-css' );

			$sigma_shortcodes_classes .= ' wpb_animate_when_almost_visible wpb_' . $atts['css_animation'] . ' ' . $atts['css_animation'];
		}

		if (  isset( $atts[ 'css' ] ) && $atts[ 'css' ] ) {
			$sigma_shortcodes_classes .= ' ' . vc_shortcode_custom_css_class( $atts[ 'css' ], ' ' );
		}

		if ( $inline_css ) {
			$sigma_vc_inline_css[] = $inline_css;
			sigmacore_vc_add_inline_css(); // This is added in case the sigma_vc_inline failed to fetch the css
		}

		ob_start();
		?>
		<div <?php echo ( $atts[ 'el_id' ] ) ? 'id=' . esc_attr( $atts[ "el_id" ] ) : ''; ?> class="<?php echo esc_attr( $sigma_shortcodes_classes ); ?>">
			<?php sigmacore_get_vc_shortcode_template( 'pricing/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}

new Sigma_Vc_Pricing_Shortcode_Fields();
