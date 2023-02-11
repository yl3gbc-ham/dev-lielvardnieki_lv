<?php
/**
 * Sigma Social Links shortcode
 *
 * @package Sigma Core
 */
/**
 * Social Links shortcode.
 */
class Sigma_Vc_Social_Links_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Social Links', 'sigma-core' );
		$this->handle        = 'sigma_social_links';
		$this->description   = esc_html__( 'Use this shortcode to show your sociall links', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma Footer', 'sigma-core' );
		$this->wrapper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}
	/**
	 * Social Links Bar shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {
		$fields = array(
			array(
				'type'       => 'param_group',
				'param_name' => 'social_items',
				'params'     => array(
					array(
						'type'        => 'vc_link',
						'heading'     => esc_html__( 'Item Link', 'sigma-core' ),
						'param_name'  => 'social_link',
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
    					'value'   => 'yes',
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
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Alignment', 'sigma-core' ),
				'param_name' => 'alignment',
				'value'      => array(
					esc_html__( 'Left', 'sigma-core' ) => 'left',
					esc_html__( 'Center', 'sigma-core' ) => 'center',
					esc_html__( 'Right', 'sigma-core' ) => 'right',
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Size', 'sigma-core' ),
				'param_name' => 'sm_size',
				'value'      => array(
					esc_html__( 'Small', 'sigma-core' ) => 'small',
					esc_html__( 'Medium', 'sigma-core' ) => 'medium',
					esc_html__( 'Large', 'sigma-core' ) => 'large',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Border Radius', 'sigma-core' ),
				'param_name'  => 'border_radius',
				'description' => esc_html__( 'Add boder radius for social links. Ex: 25px', 'sigma-core' ),
			),
      array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Link Color', 'sigma-core' ),
				'param_name'  => 'link_color',
				'description' => esc_html__( 'Select custom link color.', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Link Color on hover', 'sigma-core' ),
				'param_name'  => 'link_color_hover',
				'description' => esc_html__( 'Select custom link color on hover.', 'sigma-core' ),
			),
      array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Link Background Color', 'sigma-core' ),
				'param_name'  => 'link_bg_color',
				'description' => esc_html__( 'Select custom link background color.', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Link Background Color on hover', 'sigma-core' ),
				'param_name'  => 'link_bg_color_hover',
				'description' => esc_html__( 'Select custom link background color on hover.', 'sigma-core' ),
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
	 * Social Links shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'social_items'          => '',
      'social_link'  =>  '',
			'icon_type'           => 'fontawesome',
			'icon_fontawesome'    => 'fas fa-adjust',
			'icon_openiconic'     => 'vc-oi vc-oi-dial',
			'icon_typicons'       => 'typcn typcn-adjust-brightness',
			'icon_linecons'       => 'vc_li vc_li-heart',
			'icon_monosocial'     => 'vc-mono vc-mono-fivehundredpx',
			'icon_material'       => 'vc-material vc-material-cake',
      'icon_flaticon'       => '',
      'link_color'          =>  '',
      'link_color_hover'    =>  '',
      'link_bg_color'       =>  '',
      'link_bg_color_hover' =>  '',
			'alignment'           => 'left',
			'sm_size'           	=> 'small',
			'border_radius'       => '',
			'css_animation'       => '',
			'el_id'               => '',
			'el_class'            => '',
			'css'                 => '',
			'handle'              => $handle,
		);
		$atts = shortcode_atts( $default_atts, $atts, $handle );

    global $sigma_shortcodes, $sigma_vc_inline_css;

    $inline_css = '';
		$sigma_shortcodes[ $handle ]['atts'] = $atts;
		$sigma_shortcodes_class_unique       = 'sigma-social-links-' . mt_rand();
		$sigma_shortcodes_classes            = $this->handle . '_wrapper';
		$sigma_shortcodes_classes            .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes            .= ' ' . $this->wrapper_class;
		$sigma_shortcodes_classes            .= ' social-links-align-' . $atts[ 'alignment' ];
		$sigma_shortcodes_classes            .= ' social-links-size-' . $atts[ 'sm_size' ];

		if ( $atts[ 'el_class' ] ) {
			$sigma_shortcodes_classes .= ' ' . $atts[ 'el_class' ];
		}

		if ( $atts['css_animation'] && 'none' !== $atts['css_animation'] ) {
			wp_enqueue_script( 'vc_waypoints' );
			wp_enqueue_style( 'vc_animate-css' );
			$sigma_shortcodes_classes .= ' wpb_animate_when_almost_visible wpb_' . $atts['css_animation'] . ' ' . $atts['css_animation'];
		}

		if (  isset( $atts[ 'css' ] ) && $atts[ 'css' ] ) {
			$sigma_shortcodes_classes .= ' ' . vc_shortcode_custom_css_class( $atts[ 'css' ], ' ' );
		}

    if ( $atts[ 'link_color' ] ) {
      $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-sm li a { color: " . $atts[ 'link_color' ] . ";}";
    }
    if ( $atts[ 'link_color_hover' ] ) {
      $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-sm li a:hover { color: " . $atts[ 'link_color_hover' ] . ";}";
    }
    if ( $atts[ 'link_bg_color' ] ) {
      $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-sm li a { background-color: " . $atts[ 'link_bg_color' ] . ";}";
    }
    if ( $atts[ 'link_bg_color_hover' ] ) {
      $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-sm li a:hover { background-color: " . $atts[ 'link_bg_color_hover' ] . ";}";
    }
		if(!empty($atts['border_radius'])) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-sm li a { border-radius: " . $atts[ 'border_radius' ] . ";}";
		}

    if ( $inline_css ) {
			$sigma_vc_inline_css[] = $inline_css;
			sigmacore_vc_add_inline_css(); // This is added in case the sigma_vc_inline failed to fetch the css
		}
		ob_start();

    if ( ! $atts['social_items'] ) {
    	return;
    }
    $list_items = vc_param_group_parse_atts( $atts['social_items'] );
		?>
		<div <?php echo ( $atts[ 'el_id' ] ) ? 'id=' . esc_attr( $atts[ "el_id" ] ) : ''; ?> class="<?php echo esc_attr( $sigma_shortcodes_classes ); ?>">
      <ul class="sigma-sm">
        <?php
        foreach ( $list_items as $list_item ) {

					$icon = '';
          $list_link = isset($list_item['social_link']) && !empty($list_item['social_link']) ? vc_build_link( $list_item['social_link'] ) : '';

					if(!empty($list_link)){
						$list_link_href = !empty( $list_link['url'] ) ? $list_link['url'] : '';
	          $list_link_title = !empty( $list_link['title'] ) ? $list_link['title'] : '';
	          $list_link_target = !empty( $list_link['target'] ) ? $list_link['target'] : '_self';
	          $list_link_rel = !empty( $list_link['rel'] ) ? $list_link['rel'] : 'nofollow';
					}

          if ( $list_item[ 'icon_type' ] ) {
            $icon_type = 'icon_' . $list_item[ 'icon_type' ];
            vc_icon_element_fonts_enqueue( $list_item[ 'icon_type' ] );
            if ( isset( $list_item[ $icon_type ] ) && $list_item[ $icon_type ] ) {
              $icon = $list_item[ $icon_type ];
            }
          }

          ?>
          <li class="sigma-sm-item">

            <?php if(!empty($list_link_href)){ ?>
            <a href="<?php echo esc_attr($list_link_href) ?>" title="<?php echo esc_attr($list_link_title) ?>" rel="<?php echo esc_attr($list_link_rel) ?>" target="<?php echo esc_attr($list_link_target) ?>">
            <?php } ?>

              <?php if($icon){ ?>
                <i class="<?php echo esc_attr($icon) ?>"></i>
              <?php } ?>

            <?php if(!empty($list_link_href)){ ?>
            </a>
            <?php } ?>

          </li>

        <?php } ?>

      </ul>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Social_Links_Shortcode_Fields();
