<?php
/**
 * Sigma basic slider shortcode
 *
 * @package Sigma Core
 */
/**
 * Blog shortcode.
 */
class Sigma_Vc_Basic_Slider_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Basic Slider', 'sigma-core' );
		$this->handle        = 'sigma_basic_slider';
		$this->description   = esc_html__( 'Use this shortcode to show simple slider.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrraper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}
function shortcode_fields() {
		$fields = array(
      array(
      "type" => "param_group",
      "heading" => esc_html__("Slide List", 'sigma-core'),
      "param_name" => "slide_list",
      "params" => array(
			array(
				'type'        => 'textarea',
				'heading'     => esc_html__( 'Description', 'sigma-core' ),
				'param_name'  => 'description',
			),
		),
  ),
			// Slider Settings
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Slider Speed', 'sigma-core' ),
				'param_name'  => 'post_slider_speed',
				'description' => esc_html__( 'Enter slider speed.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Enable navigation arrows?', 'sigma-core' ),
				'param_name'       => 'post_enable_arrow',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'description'      => esc_html__( 'Select this checkbox to enable navigation dots.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Enable Slider Loop?', 'sigma-core' ),
				'param_name'       => 'post_enable_slider_loop',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
				'description'      => esc_html__( 'Select this checkbox to enable slider loop.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Enable Slider Autoplay?', 'sigma-core' ),
				'param_name'       => 'post_enable_slider_autoplay',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
				'description'      => esc_html__( 'Select this checkbox to enable slider autoplay.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Slider Autoplay Speed', 'sigma-core' ),
				'param_name'  => 'post_slider_autoplayspeed',
				'description' => esc_html__( 'Enter autoplay speed.', 'sigma-core' ),
				'dependency' => array(
					'element' => 'post_enable_slider_autoplay',
					'value'   => 'true',
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'     => esc_html__( 'No of slide to scroll', 'sigma-core' ),
				'param_name'  => 'post_slider_scroll',
				'description' => esc_html__( 'Enter number of slide to scroll.', 'sigma-core' ),
				'value'            => array(
					'5' => '5',
					'4' => '4',
					'3' => '3',
					'2' => '2',
					'1' => '1',
				),
				'std'              => '1',
				'save_always'      => true,
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Number of slides for > 1400px', 'sigma-core' ),
				'param_name'       => 'post_slider_responsive_xl',
				'value'            => array(
					'5' => '5',
					'4' => '4',
					'3' => '3',
					'2' => '2',
					'1' => '1',
				),
				'std'              => '3',
				'description'      => esc_html__( 'Select number of slides per view for > 1400px screen.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'save_always'      => true,
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Number of slides for < 1400px', 'sigma-core' ),
				'param_name'       => 'post_slider_responsive_lg',
				'value'            => array(
					'5' => '5',
					'4' => '4',
					'3' => '3',
					'2' => '2',
					'1' => '1',
				),
				'std'              => '3',
				'description'      => esc_html__( 'Select number of slides per view for < 1400px screen.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'save_always'      => true,
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Number of slides for < 992px', 'sigma-core' ),
				'param_name'       => 'post_slider_responsive_md',
				'value'            => array(
					'3' => '3',
					'2' => '2',
					'1' => '1',
				),
				'std'              => '2',
				'description'      => esc_html__( 'Select number of slides per view for < 992px screen.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'save_always'      => true,
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Number of slides for < 768px', 'sigma-core' ),
				'param_name'       => 'post_slider_responsive_sm',
				'value'            => array(
					'2' => '2',
					'1' => '1',
				),
				'std'              => '1',
				'description'      => esc_html__( 'Select number of slides per view in small devices < 768px.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'save_always'      => true,
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Number of slides for < 576px', 'sigma-core' ),
				'param_name'       => 'post_slider_responsive_xs',
				'value'            => array(
					'2' => '2',
					'1' => '1',
				),
				'std'              => '1',
				'description'      => esc_html__( 'Select number of slides per view in small devices < 576px.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'save_always'      => true,
				'group'            => esc_html__( 'Slider Settings', 'sigma-core' ),
			),
			// Color options
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Content Color', 'sigma-core' ),
				'param_name'  => 'content_color',
				'description' => esc_html__( 'Select custom content color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Arrows Color', 'sigma-core' ),
				'param_name'  => 'arrows_color',
				'description' => esc_html__( 'Select custom arrows color.', 'sigma-core' ),
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
	 * Blog shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'slide_list'                       => '',
			'description'                      => '',
			'post_slider_speed'           => '',
			'post_enable_arrow'           => '',
			'post_enable_slider_loop'     => '',
			'post_enable_slider_autoplay' => '',
			'post_slider_autoplayspeed' => '',
			'post_slider_scroll'          => 1,
			'post_slider_responsive_xl'   => 3,
			'post_slider_responsive_lg'   => 2,
			'post_slider_responsive_md'   => 2,
			'post_slider_responsive_sm'   => 1,
			'post_slider_responsive_xs'   => 1,
			'content_color'               => '',
			'arrows_color'               	=> '',
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
		$sigma_shortcodes_class_unique            = 'sigma-basic-slider-' . mt_rand();
		$sigma_shortcodes_classes                 = $this->handle . '_wrapper';
		$sigma_shortcodes_classes                 .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes                 .= ' ' . $this->wrraper_class;
		if ( $atts['el_class'] ) {
			$sigma_shortcodes_classes .= ' ' . $atts['el_class'];
		}

		//Color
		if ( $atts[ 'content_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .basic-dot-slider p{ color: " . $atts[ 'content_color' ] . ";}";
		}
		if ( $atts[ 'arrows_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .slick-slider.basic-dot-slider.shortcode_slider .slick-next.slick-arrow:before { color: " . $atts[ 'arrows_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .basic-dot-slider.slick-slider.shortcode_slider .slick-next.slick-arrow:after { background-color: " . $atts[ 'arrows_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .basic-dot-slider.slick-slider.shortcode_slider .slick-prev.slick-arrow { color: " . $atts[ 'arrows_color' ] . ";}";
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
			<?php sigmacore_get_vc_shortcode_template( 'basic-slider/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Basic_Slider_Shortcode_Fields();
