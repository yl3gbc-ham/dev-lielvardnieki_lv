<?php
/**
 * Sigma Page Template shortcode
 *
 * @package Sigma Core
 */
/**
 * Page Template shortcode.
 */
class Sigma_Vc_Page_Template_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Page Template', 'sigma' );
		$this->handle        = 'sigma_page_template';
		$this->description   = esc_html__( 'Use this shortcode to show a Page Template.', 'sigma' );
		$this->category      = esc_html__( 'Sigma', 'sigma' );
		$this->wrapper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}
	/**
	 * Page Template Bar shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {
		$fields = array(
      array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Page Template', 'sigma' ),
				'param_name'  => 'page_template',
				'description' => esc_html__( 'Select style.', 'sigma' ),
				'value'       => sigmacore_get_posts_select('sigma_templates')
			),
			vc_map_add_css_animation(),
			array(
				'type'        => 'el_id',
				'heading'     => esc_html__( 'Element ID', 'sigma' ),
				'param_name'  => 'el_id',
				/* translators: 1: anchor tag start, 2: anchor tag end */
				'description' => sprintf( esc_html__( 'Enter element ID (Note: make sure it is unique and valid according to %1$sw3c specification%2$s).', 'sigma' ), '<a href="https://www.w3schools.com/tags/att_global_id.asp" target="_self">', '</a>' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'sigma' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'sigma' ),
			),
			array(
				'type'       => 'css_editor',
				'heading'    => esc_html__( 'CSS box', 'sigma' ),
				'param_name' => 'css',
				'group'      => esc_html__( 'Design Options', 'sigma' ),
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
	 * Page Template shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
      'page_template'       =>  '',
			'css_animation'       => '',
			'el_id'               => '',
			'el_class'            => '',
			'css'                 => '',
			'handle'              => $handle,
		);
		$atts = shortcode_atts( $default_atts, $atts, $handle );

		global $sigma_shortcodes;

		$sigma_shortcodes[ $handle ]['atts'] = $atts;
		$sigma_shortcodes_class_unique       = 'sigma-page-template-' . mt_rand();
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

		ob_start();

    $page_template = isset( $atts['page_template'] ) ? get_post($atts['page_template']) : '';
		?>
		<div <?php echo ( $atts[ 'el_id' ] ) ? 'id=' . esc_attr( $atts[ "el_id" ] ) : ''; ?> class="<?php echo esc_attr( $sigma_shortcodes_classes ); ?>">
      <?php echo do_shortcode($page_template->post_content); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Page_Template_Shortcode_Fields();
