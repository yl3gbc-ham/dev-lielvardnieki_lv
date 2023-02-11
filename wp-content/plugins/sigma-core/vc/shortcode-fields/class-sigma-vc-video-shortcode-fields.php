<?php
/**
 * Sigma video shortcode
 *
 * @package Sigma Core
 */
/**
 * video shortcode.
 */
class Sigma_Vc_Video_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Video', 'sigma-core' );
		$this->handle        = 'sigma_video';
		$this->description   = esc_html__( 'Use this shortcode to show video', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrapper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}
	/**
	 * video shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {
		$fields = array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Video Style', 'sigma-core' ),
				'description' => esc_html__( 'Select Style.', 'sigma-core' ),
				'param_name'  => 'style',
				'value'       => array(
					esc_html__( 'Style 1', 'sigma-core' ) => 'style-1',
					esc_html__( 'Style 2', 'sigma-core' ) => 'style-2',
					esc_html__( 'Style 3', 'sigma-core' ) => 'style-3',
					esc_html__( 'Style 4', 'sigma-core' ) => 'style-4',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Video Text', 'sigma-core' ),
				'param_name'  => 'video_text',
				'description' => esc_html__( 'Add text to the video popup', 'sigma-core' ),
				'dependency'  => array(
          'element' => 'style',
          'value'   => 'style-3',
        ),
			),
      array(
        'type'       => 'vc_link',
        'heading'    => esc_html__( 'Video  Link', 'sigma-core' ),
        'param_name' => 'video_link',
      ),
      array(
        'type'       => 'checkbox',
        'heading'    => esc_html__( 'Add Video Background Image?', 'sigma-core' ),
        'param_name' => 'add_video_image',
        'dependency'  => array(
          'element' => 'style',
          'value'   => 'style-1',
        ),
      ),
      array(
        'type'        => 'attach_image',
        'param_name'  => 'video_image',
        'admin_label' => true,
        'heading'     => esc_html__( 'Video Image', 'sigma-core' ),
        'description' => esc_html__( 'Upload/select video background image.', 'sigma-core' ),
        'dependency'  => array(
          'element' => 'add_video_image',
          'value'   => 'true',
        ),
      ),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Image Height', 'sigma-core' ),
				'param_name'  => 'image_height',
				'description' => esc_html__( 'Add text to the video height', 'sigma-core' ),
				'dependency'  => array(
          'element' => 'style',
          'value'   => 'style-1',
        ),
			),
			array(
        'type'       => 'checkbox',
        'heading'    => esc_html__( 'Add Image Overlay?', 'sigma-core' ),
        'param_name' => 'add_image_overlay',
				'dependency'  => array(
					'element' => 'add_video_image',
					'value'   => 'true',
				),
      ),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Image Overlay Color', 'sigma-core' ),
				'param_name'  => 'image_overlay_color',
				'description' => esc_html__( 'Select custom overlay color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'add_image_overlay',
					'value'   => 'true',
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
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Popup Background Color', 'sigma-core' ),
				'param_name'  => 'popup_bg',
				'description' => esc_html__( 'Select custom background color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Popup Background Color on hover', 'sigma-core' ),
				'param_name'  => 'popup_bg_hover',
				'description' => esc_html__( 'Select custom background color on hover.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Popup Color', 'sigma-core' ),
				'param_name'  => 'popup_color',
				'description' => esc_html__( 'Select custom color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Popup Color on hover', 'sigma-core' ),
				'param_name'  => 'popup_color_hover',
				'description' => esc_html__( 'Select custom color on hover.', 'sigma-core' ),
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
	 * video Bar shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'style'                  => 'style-1',
			'video_text'						 => '',
      'video_link'             => '',
      'add_video_image'        => '',
      'video_image'            => '',
      'icon_as'                => 'font',
      'icon_image'             => '',
      'icon_type'              => 'fontawesome',
      'icon_fontawesome'       => 'fas fa-adjust',
			'icon_openiconic'        => 'vc-oi vc-oi-dial',
			'icon_typicons'          => 'typcn typcn-adjust-brightness',
			'icon_linecons'          => 'vc_li vc_li-heart',
			'icon_monosocial'        => 'vc-mono vc-mono-fivehundredpx',
			'icon_material'          => 'vc-material vc-material-cake',
			'icon_flaticon'          => '',
			'add_image_overlay'      => '',
			'image_overlay_color'    => '',
			'image_height'           => '',
			'popup_bg'			 				 => '',
			'popup_bg'			 				 => '',
			'popup_bg_hover'			 	 => '',
			'popup_color'			 			 => '',
			'popup_color_hover'			 => '',
			'css_animation'          => '',
			'el_id'                  => '',
			'el_class'               => '',
			'css'                    => '',
			'handle'                 => $handle,
		);
		$atts = shortcode_atts( $default_atts, $atts, $handle );

		global $sigma_shortcodes, $sigma_vc_inline_css;

		$inline_css = '';
		$sigma_shortcodes[ $handle ]['atts'] = $atts;
		$sigma_shortcodes_class_unique       = 'sigma-video-' . mt_rand();
		$sigma_shortcodes_classes            = $this->handle . '_wrapper';
		$sigma_shortcodes_classes            .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes            .= ' ' . $this->wrapper_class;
		$sigma_shortcodes_classes            .= ' video-' . $atts[ 'style' ];

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

		if ( $atts[ 'popup_bg' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".video-style-1 .video-wrap a.popup-video{ background-color: " . $atts[ 'popup_bg' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".video-style-2 .video-wrap a.popup-video.font{ background-color: " . $atts[ 'popup_bg' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".video-style-2 .video-wrap a.popup-video.font::before{ background-color: " . $atts[ 'popup_bg' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".video-style-2 .video-wrap a.popup-video.font::after{ background-color: " . $atts[ 'popup_bg' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".video-style-3 .video-wrap a{ background-color: " . $atts[ 'popup_bg' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".video-style-4 .popup-video{ background-color: " . $atts[ 'popup_bg' ] . ";}";
		}
		if ( $atts[ 'popup_bg_hover' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".video-style-1 .video-wrap a.popup-video:hover{ background-color: " . $atts[ 'popup_bg_hover' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".video-style-2 .video-wrap a.popup-video.font:hover{ background-color: " . $atts[ 'popup_bg_hover' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".video-style-3 .video-wrap a:hover{ background-color: " . $atts[ 'popup_bg_hover' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".video-style-4 .popup-video:hover{ background-color: " . $atts[ 'popup_bg_hover' ] . ";}";
		}
		if ( $atts[ 'popup_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".video-style-1 .video-wrap a.popup-video{ color: " . $atts[ 'popup_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".video-style-2 .video-wrap a.popup-video.font{ color: " . $atts[ 'popup_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".video-style-3 .video-wrap a{ color: " . $atts[ 'popup_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".video-style-4 .popup-video{ color: " . $atts[ 'popup_color' ] . ";}";
		}
		if ( $atts[ 'popup_color_hover' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".video-style-1 .video-wrap a.popup-video:hover{ color: " . $atts[ 'popup_color_hover' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".video-style-2 .video-wrap a.popup-video.font:hover{ color: " . $atts[ 'popup_color_hover' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".video-style-3 .video-wrap a:hover{ color: " . $atts[ 'popup_color_hover' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".video-style-4 .popup-video:hover{ color: " . $atts[ 'popup_color_hover' ] . ";}";
		}
		if ( $atts[ 'image_height' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".video-style-1 .video-wrap{ height: " . $atts[ 'image_height' ] . ";}";
		}
		if ( $atts[ 'image_overlay_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".video-style-1 .video-wrap:before{ background: " . $atts[ 'image_overlay_color' ] . "px;}";
		}



		if ( $inline_css ) {
			$sigma_vc_inline_css[] = $inline_css;
			sigmacore_vc_add_inline_css(); // This is added in case the sigma_vc_inline failed to fetch the css
		}

		ob_start();
		?>
		<div <?php echo ( $atts[ 'el_id' ] ) ? 'id=' . esc_attr( $atts[ "el_id" ] ) : ''; ?> class="<?php echo esc_attr( $sigma_shortcodes_classes ); ?>">
			<?php sigmacore_get_vc_shortcode_template( 'video/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Video_Shortcode_Fields();
