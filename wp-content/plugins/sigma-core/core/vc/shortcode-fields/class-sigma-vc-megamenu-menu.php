<?php
/**
 * Sigma MegaMenu Menu shortcode
 *
 * @package Sigma Core
 */
/**
 * Megamenu Menu shortcode.
 */
class Sigma_Vc_MegaMenu_Menu_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Megamenu Menu', 'sigma-core' );
		$this->handle        = 'sigma_megamenu_menu';
		$this->description   = esc_html__( 'Use this shortcode to show a Megamenu Menu.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma Header', 'sigma-core' );
		$this->wrapper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}
	/**
	 * Megamenu Menu Bar shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {
		$fields = array(
      array(
        'type'             => 'textfield',
        'heading'          => esc_html__( 'Menu Title', 'sigma-core' ),
        'param_name'       => 'menu_title',
        'edit_field_class' => 'vc_col-sm-12 vc_column',
      ),
			array(
				'type'       => 'param_group',
				'param_name' => 'megamenu_menu_items',
				'params'     => array(
					array(
						'type'             => 'textfield',
						'heading'          => esc_html__( 'Item Title', 'sigma-core' ),
						'param_name'       => 'megamenu_menu_title',
						'edit_field_class' => 'vc_col-sm-12 vc_column',
					),
					array(
						'type'        => 'vc_link',
						'heading'     => esc_html__( 'Item Link', 'sigma-core' ),
						'param_name'  => 'megamenu_menu_link',
					),
          array(
						'type'             => 'textfield',
						'heading'          => esc_html__( 'Item Badge', 'sigma-core' ),
						'param_name'       => 'megamenu_menu_badge',
						'edit_field_class' => 'vc_col-sm-12 vc_column',
					),
          array(
    				'type' => 'dropdown',
    				'heading' => esc_html__( 'Badge State', 'sigma-core' ),
    				'value' => array(
              esc_html__( 'Success', 'sigma-core' )       => 'success',
    					esc_html__( 'Primary', 'sigma-core' ) => 'primary',
    					esc_html__( 'Secondary', 'sigma-core' )    => 'secondary',
    					esc_html__( 'Warning', 'sigma-core' )       => 'warning',
    					esc_html__( 'Danger', 'sigma-core' )         => 'danger',
    				),
    				'param_name'  => 'megamenu_menu_badge_state',
    				'description' => esc_html__( 'Select badge state.', 'sigma-core' ),
    			),
          array(
    				'type'        => 'checkbox',
    				'heading'     => esc_html__( 'Add Icon?', 'sigma-core' ),
    				'param_name'  => 'add_icon',
    				'value'       => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
    				'description' => esc_html__( 'Mark this checkbox to add icon in item.', 'sigma-core' ),
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
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Title Color', 'sigma-core' ),
				'param_name'  => 'title_color',
				'description' => esc_html__( 'Select custom title color', 'sigma-core' ),
				'group'      => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Link Color', 'sigma-core' ),
				'param_name'  => 'link_color',
				'description' => esc_html__( 'Select custom link color.', 'sigma-core' ),
				'group'      => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Link Color on hover', 'sigma-core' ),
				'param_name'  => 'link_color_hover',
				'description' => esc_html__( 'Select custom link color on hover.', 'sigma-core' ),
				'group'      => esc_html__( 'Style Options', 'sigma-core' ),
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
	 * Megamenu Menu shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
      'menu_title'  =>  '',
			'megamenu_menu_items'          => '',
      'megamenu_menu_title' =>  '',
      'megamenu_menu_link'  =>  '',
      'megamenu_menu_badge' =>  '',
      'megamenu_menu_badge_state' =>  'success',
			'add_icon'            => '',
			'icon_type'           => 'fontawesome',
			'icon_fontawesome'    => 'fas fa-adjust',
			'icon_openiconic'     => 'vc-oi vc-oi-dial',
			'icon_typicons'       => 'typcn typcn-adjust-brightness',
			'icon_linecons'       => 'vc_li vc_li-heart',
			'icon_monosocial'     => 'vc-mono vc-mono-fivehundredpx',
			'icon_material'       => 'vc-material vc-material-cake',
      'icon_flaticon'       => '',
			'title_color'					=> '',
			'link_color'					=> '',
			'link_color_hover'		=> '',
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
		$sigma_shortcodes_class_unique       = 'sigma-megamenu-menu-' . mt_rand();
		$sigma_shortcodes_classes            = $this->handle . '_wrapper';
		$sigma_shortcodes_classes            .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes            .= ' ' . $this->wrapper_class;

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
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_megamenu_menu_wrapper ul.menu li a { color: " . $atts[ 'link_color' ] . ";}";
		}
		if ( $atts[ 'link_color_hover' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_megamenu_menu_wrapper ul.menu li a:hover { color: " . $atts[ 'link_color_hover' ] . ";}";
		}
		if ( $atts[ 'title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_megamenu_menu_wrapper .widgettitle { color: " . $atts[ 'title_color' ] . ";}";
		}

		if ( $inline_css ) {
			$sigma_vc_inline_css[] = $inline_css;
			sigmacore_vc_add_inline_css(); // This is added in case the sigma_vc_inline failed to fetch the css
		}
		ob_start();

    if ( ! $atts['megamenu_menu_items'] ) {
    	return;
    }
    $list_items = vc_param_group_parse_atts( $atts['megamenu_menu_items'] );
		?>
		<div <?php echo ( $atts[ 'el_id' ] ) ? 'id=' . esc_attr( $atts[ "el_id" ] ) : ''; ?> class="<?php echo esc_attr( $sigma_shortcodes_classes ); ?>">
      <?php if(isset($atts['menu_title']) && !empty($atts['menu_title'])){ ?>
      <h6 class="widgettitle"><?php echo esc_html($atts['menu_title']) ?></h6>
      <?php } ?>
      <ul class="menu">
        <?php
        foreach ( $list_items as $list_item ) {

					$icon = '';
          $title = isset( $list_item['megamenu_menu_title'] ) && ! empty( $list_item['megamenu_menu_title'] ) ? $list_item['megamenu_menu_title'] : '';
          $badge = isset( $list_item['megamenu_menu_badge'] ) && ! empty( $list_item['megamenu_menu_badge'] ) ? $list_item['megamenu_menu_badge'] : '';
          $badge_state = isset( $list_item['megamenu_menu_badge_state'] ) && ! empty( $list_item['megamenu_menu_badge_state'] ) ? $list_item['megamenu_menu_badge_state'] : 'primary';
          $list_link = isset($list_item['megamenu_menu_link']) && !empty($list_item['megamenu_menu_link']) ? vc_build_link( $list_item['megamenu_menu_link'] ) : '';

					if(!empty($list_link)){
						$list_link_href = !empty( $list_link['url'] ) ? $list_link['url'] : '';
	          $list_link_title = !empty( $list_link['title'] ) ? $list_link['title'] : '';
	          $list_link_target = !empty( $list_link['target'] ) ? $list_link['target'] : '_self';
	          $list_link_rel = !empty( $list_link['rel'] ) ? $list_link['rel'] : 'nofollow';
					}

          if ( isset($list_item[ 'add_icon' ]) && !empty($list_item[ 'add_icon' ]) ) {
            if ( $list_item[ 'icon_type' ] ) {
              $icon_type = 'icon_' . $list_item[ 'icon_type' ];
              vc_icon_element_fonts_enqueue( $list_item[ 'icon_type' ] );
              if ( isset( $list_item[ $icon_type ] ) && $list_item[ $icon_type ] ) {
                $icon = $list_item[ $icon_type ];
              }
            }
          }

          ?>
          <li class="menu-item">

            <?php if(!empty($list_link_href)){ ?>
            <a href="<?php echo esc_attr($list_link_href) ?>" title="<?php echo esc_attr($list_link_title) ?>" rel="<?php echo esc_attr($list_link_rel) ?>" target="<?php echo esc_attr($list_link_target) ?>">
            <?php } ?>

              <?php if($icon){ ?>
                <i class="<?php echo esc_attr($icon) ?>"></i>
              <?php } ?>

              <?php
              if($title){
                echo esc_html($title);
              }
              ?>

              <?php if($badge){ ?>
                <span class="badge badge-<?php echo esc_attr($badge_state) ?>"><?php echo esc_html($badge) ?></span>
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
new Sigma_Vc_MegaMenu_Menu_Shortcode_Fields();
