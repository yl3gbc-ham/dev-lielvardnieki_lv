<?php
/**
 * Sigma History shortcode
 *
 * @package Sigma Core
 */
/**
 * Custom Tab shortcode.
 */
class Sigma_Vc_History_Shortcode_Fields {
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
		$this->title         = esc_html__( 'History', 'sigma-core' );
		$this->handle        = 'sigma_history';
		$this->description   = esc_html__( 'Use this shortcode to show history.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrraper_class = 'sigma-shortcode-wrapper';
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
        "type" => "param_group",
        "heading" => esc_html__("History List", 'sigma-core'),
        "param_name" => "history_list",
        "params" => array(
					array(
						'type'        => 'textfield',
						'param_name'  => 'history_title',
						'heading'     => esc_html__( 'Title', 'sigma-core' ),
						'description' => esc_html__( 'Enter title.', 'sigma-core' ),
					),
					array(
						'type'       => 'textarea_safe',
						'holder'     => 'div',
						'heading'    => esc_html__( 'Description', 'sigma-core' ),
						'param_name' => 'history_content',
					),
          array(
            'type'        => 'textarea_safe',
            'param_name'  => 'history_date',
            'heading'     => esc_html__( 'Date', 'sigma-core' ),
            'description' => esc_html__( 'Enter Date.', 'sigma-core' ),
          ),
				),
		),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Title Color', 'sigma-core' ),
				'param_name'  => 'content_title_color',
				'description' => esc_html__( 'Select custom content title color.', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Description Color', 'sigma-core' ),
				'param_name'  => 'content_desc_color',
				'description' => esc_html__( 'Select custom content description color.', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Date Color', 'sigma-core' ),
				'param_name'  => 'content_date_color',
				'description' => esc_html__( 'Select custom content date color.', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Content Background Color', 'sigma-core' ),
				'param_name'  => 'content_bg_color',
				'description' => esc_html__( 'Select custom content background color.', 'sigma-core' ),
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
	 * Custom Tab shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'history_list'        => '',
      'history_title'       => '',
      'history_content'     => '',
      'history_date'        => '',
      'content_title_color'   => '',
      'content_desc_color'   => '',
      'content_date_color'   => '',
      'content_bg_color'   => '',
			'icon_type'           => 'fontawesome',
			'add_icon'            => '',
			'icon_as'             => 'font',
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
		$sigma_shortcodes[ $handle ]['atts'] = $atts;
		$sigma_shortcodes_class_unique       = 'sigma-history-' . mt_rand();
		$sigma_shortcodes_classes            = $this->handle . '_wrapper';
		$sigma_shortcodes_classes            .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes            .= ' ' . $this->wrraper_class;
		if ( $atts[ 'el_class' ] ) {
			$sigma_shortcodes_classes .= ' ' . $atts[ 'el_class' ];
		}
		if ( $atts[ 'add_icon' ] && $atts[ 'icon_as' ] ) {
			$sigma_shortcodes_classes .= ' icon-type-' . $atts[ 'icon_as' ];
		}
		// Color Options
		if ( $atts[ 'content_title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_timeline-content h4{ color: " . $atts[ 'content_title_color' ] . ";}";
		}
		if ( $atts[ 'content_desc_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_timeline-content p { color: " . $atts[ 'content_desc_color' ] . ";}";
		}
		if ( $atts[ 'content_date_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_timeline-nodes .sigma_timeline-date { color: " . $atts[ 'content_date_color' ] . ";}";
		}
		if ( $atts[ 'content_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_timeline-nodes .sigma_timeline-content { background-color: " . $atts[ 'content_bg_color' ] . ";}";
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
			<?php sigmacore_get_vc_shortcode_template( 'history/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_History_Shortcode_Fields();
