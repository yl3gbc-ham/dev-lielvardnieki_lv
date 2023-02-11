<?php
/**
 * Sigma progress bar shortcode
 *
 * @package Sigma Core
 */
/**
 * Progress Bar shortcode.
 */
class Sigma_Vc_Progress_Bar_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Progress Bar', 'sigma-core' );
		$this->handle        = 'sigma_progress_bar';
		$this->description   = esc_html__( 'Use this shortcode to show progress.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrapper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}
	/**
	 * Progress Bar shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {
		$fields = array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Progress Style', 'sigma-core' ),
				'param_name' => 'style',
				'value'      => array(
					esc_html__( 'Style 1', 'sigma-core' ) => 'style-1',
					esc_html__( 'Style 2', 'sigma-core' ) => 'style-2',
					esc_html__( 'Style 3', 'sigma-core' ) => 'style-3',
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Progress Border', 'sigma-core' ),
				'param_name' => 'progress_border',
				'value'      => array(
					esc_html__( 'Square', 'sigma-core' ) => 'progress-square',
					esc_html__( 'Round', 'sigma-core' ) => 'progress-round',
					esc_html__( 'Skew', 'sigma-core' ) => 'progress-skew',
				),
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-1',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Rounded Progress Bar Size', 'sigma-core' ),
				'param_name'  => 'rounded_bar_size',
				'description' => esc_html__( 'Enter value for rounded progress bar size', 'sigma-core' ),
				'admin_label' => true,
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-2',
				),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Add Stripes?', 'sigma-core' ),
				'param_name' => 'add_stripes',
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-1',
				),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Animate Stripes?', 'sigma-core' ),
				'param_name' => 'animate_stripes',
				'dependency'  => array(
					'element' => 'add_stripes',
					'value'   => 'true',
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
				),
				'dependency'  => array(
					'element' => 'add_icon',
					'value'   => 'true',
				),
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
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Progress Bar Inner Height', 'sigma-core' ),
				'param_name'  => 'bar_height',
				'description' => esc_html__( 'Enter value for bar height. (Don\'t add a unit. E.g 20)', 'sigma-core' ),
				'admin_label' => true,
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Inner Bar color', 'sigma-core' ),
				'param_name'  => 'bar_color',
				'description' => esc_html__( 'Select the bar background color (Inner fill).', 'sigma-core' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Progress Bar Outter Height', 'sigma-core' ),
				'param_name'  => 'bar_outter_height',
				'description' => esc_html__( 'Enter value for outter bar height. (Don\'t add a unit. E.g 20)', 'sigma-core' ),
				'admin_label' => true,
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-1',
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Outter Bar Background Color', 'sigma-core' ),
				'param_name'  => 'bar_background_color',
				'description' => esc_html__( 'Select custom single bar text color.', 'sigma-core' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Unit', 'sigma-core' ),
				'param_name'  => 'unit',
				'description' => esc_html__( 'Enter measurement unit. (This field will go after the Content Value)', 'sigma-core' ),
				'group' => esc_html__( 'Content', 'sigma-core' ),
			),
			array(
				'type' => 'param_group',
				'heading' => esc_html__( 'Progress Bars', 'sigma-core' ),
				'param_name' => 'progress_bars',
				'params' => array(
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Label', 'sigma-core' ),
						'param_name'  => 'bar_label',
						'description' => esc_html__( 'Enter text used as title of bar.', 'sigma-core' ),
						'admin_label' => true,
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Value', 'sigma-core' ),
						'param_name'  => 'bar_value',
						'description' => esc_html__( 'Enter value of bar.', 'sigma-core' ),
						'admin_label' => true,
					),
				),
				'group' => esc_html__( 'Content', 'sigma-core' ),
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
	 * Progress Bar shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'style'                => 'style-1',
			'unit'                 => '',
			'icon_type'           => 'fontawesome',
			'add_icon'            => '',
			'add_stripes'					=>	'',
			'animate_stripes'			=>	'',
			'icon_as'             => 'font',
			'icon_fontawesome'    => 'fas fa-adjust',
			'icon_openiconic'     => 'vc-oi vc-oi-dial',
			'icon_typicons'       => 'typcn typcn-adjust-brightness',
			'icon_linecons'       => 'vc_li vc_li-heart',
			'icon_monosocial'     => 'vc-mono vc-mono-fivehundredpx',
			'icon_material'       => 'vc-material vc-material-cake',
			'icon_flaticon'       => '',
			'bar_color'            => '',
			'bar_background_color' => '',
			'bar_height'           => '',
			'progress_border'			=> '',
			'bar_outter_height'		 => '',
			'rounded_bar_size'     => '',
			'progress_bars'        => '',
			'css_animation'        => '',
			'el_id'                => '',
			'el_class'             => '',
			'css'                  => '',
			'handle'               => $handle,
		);
		$atts = shortcode_atts( $default_atts, $atts, $handle );

		global $sigma_shortcodes, $sigma_vc_inline_css;

		$inline_css                                 = '';
		$sigma_shortcodes[ $handle ]['atts'] = $atts;
		$sigma_shortcodes_class_unique       = 'sigma-progressbar-' . mt_rand();
		$sigma_shortcodes_classes            = $this->handle . '_wrapper';
		$sigma_shortcodes_classes            .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes            .= ' ' . $this->wrapper_class;
		$sigma_shortcodes_classes            .= ' progress-bar-' . $atts[ 'style' ];
		$sigma_shortcodes_classes            .= ' '.$atts[ 'progress_border' ];

		$sigma_shortcodes_classes            .= ' ' . $this->wrapper_class;

		if($atts['add_stripes'] == true){
			$sigma_shortcodes_classes .= ' progress-bar-stripes';
		}
		if($atts['animate_stripes'] == true){
			$sigma_shortcodes_classes .= ' progress-bar-animated';
		}

		if ( $atts[ 'el_class' ] ) {
			$sigma_shortcodes_classes .= ' ' . $atts[ 'el_class' ];
		}
		if ( $atts[ 'bar_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-progress-bar-inner { background-color:". $atts[ 'bar_color' ].";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".progress-bar-style-3 .sigma-progress-bar-inner span:first-child { background-color:". $atts[ 'bar_color' ].";}";
		}
		if ( $atts[ 'bar_background_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-progress-bar { background-color: " . $atts[ 'bar_background_color' ] . ";}";
		}

		if ( $atts[ 'bar_height' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-progress-bar-inner { height: " . $atts[ 'bar_height' ] . "px;}";
		}
		if ( $atts[ 'bar_outter_height' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-progress-bar { height: " . $atts[ 'bar_outter_height' ] . "px;}";
		}

		if ( $atts['css_animation'] && 'none' !== $atts['css_animation'] ) {
			wp_enqueue_script( 'vc_waypoints' );
			wp_enqueue_style( 'vc_animate-css' );
			$sigma_shortcodes_classes .= ' wpb_animate_when_almost_visible wpb_' . $atts['css_animation'] . ' ' . $atts['css_animation'];
		}
		if ( $atts[ 'add_icon' ] && $atts[ 'icon_as' ] ) {
			$sigma_shortcodes_classes .= ' icon-type-' . $atts[ 'icon_as' ];
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
			<?php sigmacore_get_vc_shortcode_template( 'progress-bar/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Progress_Bar_Shortcode_Fields();
