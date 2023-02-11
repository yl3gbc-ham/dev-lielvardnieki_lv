<?php
/**
 * Sigma Page Title shortcode
 *
 * @package Sigma Core
 */
/**
 * Page Title shortcode.
 */
class Sigma_Vc_Subheader_Title_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Subheader Title', 'sigma-core' );
		$this->handle        = 'sigma_subheader_title';
		$this->description   = esc_html__( 'Use this shortcode to show your page title', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma Subheader', 'sigma-core' );
		$this->wrapper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}

	/**
	 * Page Title Bar shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {
		$fields = array(
      array(
        'type'             => 'dropdown',
        'param_name'       => 'title_element',
        'heading'          => esc_html__( 'Title Element Tag', 'sigma-core' ),
        'description'      => esc_html__( 'Select element tag.', 'sigma-core' ),
        'value'            => array(
          esc_html__( 'h1', 'sigma-core' )  => 'h1',
          esc_html__( 'h2', 'sigma-core' )  => 'h2',
          esc_html__( 'h3', 'sigma-core' )  => 'h3',
          esc_html__( 'h4', 'sigma-core' )  => 'h4',
          esc_html__( 'h5', 'sigma-core' )  => 'h5',
          esc_html__( 'h6', 'sigma-core' )  => 'h6',
          esc_html__( 'p', 'sigma-core' )   => 'p',
          esc_html__( 'div', 'sigma-core' ) => 'div',
        ),
        'std'	=> 'h1',
      ),
      array(
				'type'             => 'dropdown',
				'param_name'       => 'title_text_transform',
				'heading'          => esc_html__( 'Title text transform', 'sigma-core' ),
				'description'      => esc_html__( 'Select Title text transform.', 'sigma-core' ),
				'std'              => '',
				'value'            => array(
					esc_html__( 'Default', 'sigma-core' )    => '',
					esc_html__( 'Lowercase', 'sigma-core' )  => 'text-lowercase',
					esc_html__( 'Uppercase', 'sigma-core' )  => 'text-uppercase',
					esc_html__( 'Capitalize', 'sigma-core' ) => 'text-capitalize',
				),
			),
      array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Title Color', 'sigma-core' ),
				'param_name'  => 'title_color',
				'description' => esc_html__( 'Select custom title color.', 'sigma-core' ),
			),
      array(
				'type'        => 'dropdown',
				'param_name'  => 'title_alignment',
				'heading'     => esc_html__( 'Title Alignment', 'sigma-core' ),
				'value'            => array(
					esc_html__( 'Left', 'sigma-core' )   => 'text-left',
					esc_html__( 'Right', 'sigma-core' )  => 'text-right',
					esc_html__( 'Center', 'sigma-core' ) => 'text-center',
				),
				'std'         => 'text-left',
				'description' => esc_html__( 'Select title alignment.', 'sigma-core' ),
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
	 * Page Title shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
      'title_element'         => 'h1',
      'title_text_transform'  => '',
      'title_color'           => '',
      'title_alignment'       => 'text-left',
			'css_animation'         => '',
			'el_id'                 => '',
			'el_class'              => '',
			'css'                   => '',
			'handle'                => $handle,
		);
		$atts = shortcode_atts( $default_atts, $atts, $handle );

    global $sigma_shortcodes, $sigma_vc_inline_css;

    $inline_css = '';
		$sigma_shortcodes[ $handle ]['atts'] = $atts;
		$sigma_shortcodes_class_unique       = 'sigma-subheader-title-' . mt_rand();
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

    if ( $atts[ 'title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .title{ color: " . $atts[ 'title_color' ] . ";}";
		}

    if ( $inline_css ) {
			$sigma_vc_inline_css[] = $inline_css;
			sigmacore_vc_add_inline_css(); // This is added in case the sigma_vc_inline failed to fetch the css
		}

		ob_start();

		?>
		<div <?php echo ( $atts[ 'el_id' ] ) ? 'id=' . esc_attr( $atts[ "el_id" ] ) : ''; ?> class="<?php echo esc_attr( $sigma_shortcodes_classes ); ?>">

      <<?php echo esc_attr( $atts[ 'title_element' ] ); ?> class="<?php echo esc_attr($atts['title_alignment']) ?> title <?php echo esc_attr($atts['title_text_transform']) ?>"> <?php echo wp_title(' ', false); ?> </<?php echo esc_attr( $atts[ 'title_element' ] ); ?>>

		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Subheader_Title_Shortcode_Fields();
