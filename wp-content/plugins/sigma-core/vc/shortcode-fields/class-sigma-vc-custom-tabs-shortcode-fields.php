<?php
/**
 * Sigma Custom Tab shortcode
 *
 * @package Sigma Core
 */
/**
 * Custom Tab shortcode.
 */
class Sigma_Vc_Custom_Tabs_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Custom Tabs', 'sigma-core' );
		$this->handle        = 'sigma_custom_tabs';
		$this->description   = esc_html__( 'Use this shortcode to show custom tabs.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrapper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}
	/**
	 * Custom Tab shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {
		$fields = array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Tabs Position', 'sigma-core' ),
				'param_name'  => 'tabs_position',
				'description' => esc_html__( 'Select the tabs position', 'sigma-core' ),
				'value'       => array(
					esc_html__( 'Before Content', 'sigma-core' ) => 'before-content',
					esc_html__( 'After Content', 'sigma-core' ) => 'after-content',
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Tab Background Color', 'sigma-core' ),
				'param_name'  => 'tab_bg_color',
				'description' => esc_html__( 'Select background color for the tab.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Tab Background Color on hover', 'sigma-core' ),
				'param_name'  => 'tab_bg_color_hover',
				'description' => esc_html__( 'Select background color for the tab on hover.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Tab Icon Color', 'sigma-core' ),
				'param_name'  => 'tab_icon_color',
				'description' => esc_html__( 'Select color for the tab icon.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Tab Icon Color on hover', 'sigma-core' ),
				'param_name'  => 'tab_icon_color_hover',
				'description' => esc_html__( 'Select color for the tab icon on hover.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Tab title Color', 'sigma-core' ),
				'param_name'  => 'tab_title_color',
				'description' => esc_html__( 'Select color for the tab title.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Active tab title Color', 'sigma-core' ),
				'param_name'  => 'tab_active_title_color',
				'description' => esc_html__( 'Select color for the tab title in an active tab.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Tab Content Color', 'sigma-core' ),
				'param_name'  => 'tab_content_color',
				'description' => esc_html__( 'Select color for the tab content', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
        "type" => "param_group",
        "heading" => esc_html__("Tab List", 'sigma-core'),
        "param_name" => "custom_tab_list",
        "params" => array(
					array(
						'type'        => 'textfield',
						'param_name'  => 'custom_tab_title',
						'heading'     => esc_html__( 'Tab Title', 'sigma-core' ),
						'description' => esc_html__( 'Enter Tab title.', 'sigma-core' ),
					),
					array(
						'type'       => 'textarea',
						'holder'     => 'div',
						'heading'    => esc_html__( 'Text', 'sigma-core' ),
						'param_name' => 'custom_tab_content',
						'value'      => esc_html__( 'I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'sigma-core' ),
					),
					array(
						'type'       => 'checkbox',
						'heading'    => esc_html__( 'Add icon?', 'sigma-core' ),
						'param_name' => 'add_icon',
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
	 * Custom Tab shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'tabs_position'				=> 'before-content',
			'tab_bg_color' => '',
			'tab_bg_color_hover' => '',
			'tab_icon_color' => '',
			'tab_icon_color_hover' => '',
			'tab_title_color' => '',
			'tab_active_title_color' => '',
			'tab_content_color' => '',
			'custom_tab_list'     => '',
      'custom_tab_title'    => '',
      'custom_tab_content'  => '',
			'icon_type'           => 'fontawesome',
			'add_icon'            => '',
			'icon_as'             => 'font',
			'icon_image'          => '',
			'icon_fontawesome'    => 'fas fa-adjust',
			'icon_openiconic'     => 'vc-oi vc-oi-dial',
			'icon_typicons'       => 'typcn typcn-adjust-brightness',
			'icon_linecons'       => 'vc_li vc_li-heart',
			'icon_monosocial'     => 'vc-mono vc-mono-fivehundredpx',
			'icon_material'       => 'vc-material vc-material-cake',
			'icon_flaticon'       => '',
			'css_animation'       => '',
			'el_id'               => '',
			'el_class'            => '',
			'css'                 => '',
			'handle'              => $handle,
		);
		$atts = shortcode_atts( $default_atts, $atts, $handle );

		global $sigma_shortcodes, $sigma_vc_inline_css;

		$inline_css                               = '';
		$sigma_shortcodes[ $handle ]['atts'] = $atts;
		$sigma_shortcodes_class_unique       = 'sigma-custom-tab-' . mt_rand();
		$sigma_shortcodes_classes            = $this->handle . '_wrapper';
		$sigma_shortcodes_classes            .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes            .= ' ' . $this->wrapper_class;

		if ( $atts[ 'el_class' ] ) {
			$sigma_shortcodes_classes .= ' ' . $atts[ 'el_class' ];
		}

		if ( $atts[ 'add_icon' ] && $atts[ 'icon_as' ] ) {
			$sigma_shortcodes_classes .= ' icon-type-' . $atts[ 'icon_as' ];
		}

		if ( $atts['css_animation'] && 'none' !== $atts['css_animation'] ) {
			wp_enqueue_script( 'vc_waypoints' );
			wp_enqueue_style( 'vc_animate-css' );
			$sigma_shortcodes_classes .= ' wpb_animate_when_almost_visible wpb_' . $atts['css_animation'] . ' ' . $atts['css_animation'];
		}

		if (  isset( $atts[ 'css' ] ) && $atts[ 'css' ] ) {
			$sigma_shortcodes_classes .= ' ' . vc_shortcode_custom_css_class( $atts[ 'css' ], ' ' );
		}

		if ( $atts[ 'tab_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-custom-tabs ul.nav li a span.icon{ background-color: " . $atts[ 'tab_bg_color' ] . ";}";
		}
		if ( $atts[ 'tab_bg_color_hover' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-custom-tabs ul.nav li a:hover span.icon{ background-color: " . $atts[ 'tab_bg_color_hover' ] . ";}";
		}
		if ( $atts[ 'tab_icon_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-custom-tabs ul.nav li a span.icon{ color: " . $atts[ 'tab_icon_color' ] . ";}";
		}
		if ( $atts[ 'tab_icon_color_hover' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-custom-tabs ul.nav li a:hover span.icon{ color: " . $atts[ 'tab_icon_color_hover' ] . ";}";
		}
		if ( $atts[ 'tab_title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-custom-tabs ul.nav li a{ color: " . $atts[ 'tab_title_color' ] . ";}";
		}
		if ( $atts[ 'tab_active_title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-custom-tabs ul.nav li a:hover{ color: " . $atts[ 'tab_active_title_color' ] . ";}";
		}
		if ( $atts[ 'tab_content_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-custom-tabs .tab-pane p{ color: " . $atts[ 'tab_content_color' ] . ";}";
		}

		if ( $inline_css ) {
			$sigma_vc_inline_css[] = $inline_css;
			sigmacore_vc_add_inline_css(); // This is added in case the sigma_vc_inline failed to fetch the css
		}

		ob_start();
		?>
		<div <?php echo ( $atts[ 'el_id' ] ) ? 'id=' . esc_attr( $atts[ "el_id" ] ) : ''; ?> class="<?php echo esc_attr( $sigma_shortcodes_classes ); ?>">
			<?php sigmacore_get_vc_shortcode_template( 'custom-tab/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Custom_Tabs_Shortcode_Fields();
