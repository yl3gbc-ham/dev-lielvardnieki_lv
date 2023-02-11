<?php
/**
 * Sigma Portfolio Details shortcode
 *
 * @package Sigma Core
 */
/**
 * Portfolio shortcode.
 */
class Sigma_Vc_Portfolio_Details_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Portfolio Details', 'sigma-core' );
		$this->handle        = 'sigma_portfolio_details';
		$this->description   = esc_html__( 'Use this shortcode to show portfolio details.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrapper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}

	/**
	 * Portfolio shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {

		$fields = array(
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
			),
			array(
				'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Background Color', 'sigma-core' ),
				'param_name'  => 'bg_color',
				'description' => esc_html__( 'Select custom background color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Border Color', 'sigma-core' ),
				'param_name'  => 'border_color',
				'description' => esc_html__( 'Select custom border color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			vc_map_add_css_animation(),
			array(
				'type'        => 'el_id',
				'heading'     => esc_html__( 'Element ID', 'sigma-core' ),
				'param_name'  => 'el_id',
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
	 * Portfolio shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'title_color'               	=> '',
			'subtitle_color'              => '',
			'bg_color'               			=> '',
			'border_color'               	=> '',
			'css_animation'               => '',
			'el_id'                       => '',
			'el_class'                    => '',
			'css'                         => '',
			'handle'                      => $handle,
		);

		$atts = shortcode_atts( $default_atts, $atts, $handle );

		global $sigma_shortcodes, $sigma_vc_inline_css;
		$inline_css                               = '';

		$sigma_shortcodes[ $handle ]['atts']      = $atts;
		$sigma_shortcodes_class_unique            = 'sigma-portfolio-' . mt_rand();
		$sigma_shortcodes_classes                 = $this->handle . '_wrapper';
		$sigma_shortcodes_classes                 .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes                 .= ' ' . $this->wrapper_class;

		if ( $atts['el_class'] ) {
			$sigma_shortcodes_classes .= ' ' . $atts['el_class'];
		}

		//Color
		if ( $atts[ 'title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-meta-details .sigma_portfolio-details .sigma_portfolio-details-item h5 { color: " . $atts[ 'title_color' ] . ";}";
		}
		if ( $atts[ 'subtitle_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-meta-details .sigma_portfolio-details .sigma_portfolio-details-item span { color: " . $atts[ 'subtitle_color' ] . ";}";
		}
		if ( $atts[ 'bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-meta-details .sigma_portfolio-details { background-color: " . $atts[ 'bg_color' ] . ";}";
		}
		if ( $atts[ 'border_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-meta-details .sigma_portfolio-details .sigma_portfolio-details-item + .sigma_portfolio-details-item { border-color: " . $atts[ 'border_color' ] . ";}";
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
			<?php sigmacore_get_vc_shortcode_template( 'portfolio-details/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Portfolio_Details_Shortcode_Fields();
