<?php
/**
 * Sigma testimonials shortcode
 *
 * @package Sigma Core
 */
/**
 * Testimonials shortcode.
 */
class Sigma_Vc_Testimonials_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Testimonials', 'sigma-core' );
		$this->handle        = 'sigma_testimonials';
		$this->description   = esc_html__( 'Use this shortcode to show testimonials.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrapper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}

	/**
	 * testimonials shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {
		$fields = array(
			array(
				'type'             => 'dropdown',
				'param_name'       => 'layout',
				'heading'          => esc_html__( 'Layout', 'sigma-core' ),
				'description'      => esc_html__( 'Select layout.', 'sigma-core' ),
				'std'              => 'slider',
				'value'            => sigmacore_get_available_layouts(['isotope'])
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Testimonials Style', 'sigma-core' ),
				'description' => esc_html__( 'Select Style.', 'sigma-core' ),
				'param_name'  => 'style',
				'value'       => array(
					esc_html__( 'Style 1', 'sigma-core' ) => 'style-1',
					esc_html__( 'Style 2', 'sigma-core' ) => 'style-2',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Testimonials Count', 'sigma-core' ),
				'param_name'  => 'post_per_page',
				'description' => esc_html__( 'Enter number of testimonials to display.', 'sigma-core' ),
				'admin_label' => true
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Section Heading Title', 'sigma-core' ),
				'param_name'  => 'section_title',
				'dependency'  => array(
					'element' => 'layout',
					'value'   => 'slider',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Section Heading Sub-title', 'sigma-core' ),
				'param_name'  => 'section_sub_title',
				'dependency'  => array(
					'element' => 'layout',
					'value'   => 'slider',
				),
			),
			array(
				'type'             => 'dropdown',
				'param_name'       => 'post_order',
				'heading'          => esc_html__( 'Order', 'sigma-core' ),
				'description'      => esc_html__( 'Select display order.', 'sigma-core' ),
				'std'              => 'DESC',
				'value'            => array(
					esc_html__( 'Ascending', 'sigma-core' )	 => 'ASC',
					esc_html__( 'Descending', 'sigma-core' ) =>	'DESC',
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'dropdown',
				'param_name'       => 'post_orderby',
				'heading'          => esc_html__( 'Orderby ', 'sigma-core' ),
				'description'      => esc_html__( 'Select order by parameter.', 'sigma-core' ),
				'std'              => 'date',
				'value'            => array(
					esc_html__( 'ID', 'sigma-core' )            => 'ID',
					esc_html__( 'Title', 'sigma-core' )         => 'title',
					esc_html__( 'Date', 'sigma-core' )          => 'date',
					esc_html__( 'Modified Date', 'sigma-core' ) => 'modified',
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Show Featured Image?', 'sigma-core' ),
				'param_name'       => 'post_featured_image',
				'description'      => esc_html__( 'Select this checkbox to show post featured image.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'std' => 'yes'
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Show Icon?', 'sigma-core' ),
				'param_name'       => 'show_icon',
				'description'      => esc_html__( 'Select this checkbox to show Icon', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'std' => 'yes',
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-1',
				),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Show Designation?', 'sigma-core' ),
				'param_name'       => 'show_designation',
				'description'      => esc_html__( 'Select this checkbox to show post designation.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'std' => 'yes',
			),
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
				'heading'     => esc_html__( 'Designation Color', 'sigma-core' ),
				'param_name'  => 'designation_color',
				'description' => esc_html__( 'Select custom designation color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Content Color', 'sigma-core' ),
				'param_name'  => 'content_color',
				'description' => esc_html__( 'Select custom content color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Rating Color', 'sigma-core' ),
				'param_name'  => 'rating_color',
				'description' => esc_html__( 'Select custom rating color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Background Color', 'sigma-core' ),
				'param_name'  => 'background_color',
				'description' => esc_html__( 'Select custom background color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Border Color', 'sigma-core' ),
				'param_name'  => 'border_color',
				'description' => esc_html__( 'Select custom border color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-2',
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

		// This function will add all of the layout options into the fields
		$fields = sigmacore_get_layout_options( $fields, ['grid', 'slider'], '' );

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
	 * testimonials shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'layout'               				=> 'slider',
			'style'                       => 'style-1',
			'post_per_page'               => '',
			'section_sub_title'           => '',
			'section_title'           		=> '',
			'post_categories'             => '',
			'post_featured_image'					=> 'yes',
			'show_icon'										=> 'yes',
			'show_designation'						=> 'yes',
			'post_order'                  => '',
			'post_orderby'                => '',
			'title_color'                	=> '',
			'designation_color'           => '',
			'content_color'               => '',
			'rating_color'                => '',
			'background_color'            => '',
			'border_color'                => '',
			'css_animation'               => '',
			'el_id'                       => '',
			'el_class'                    => '',
			'css'                         => '',
			'handle'                      => $handle,
		);

		$default_atts = sigmacore_get_layout_attributes($default_atts, ['grid', 'slider'] );

		$atts = shortcode_atts( $default_atts, $atts, $handle );

		global $sigma_shortcodes, $sigma_vc_inline_css;

		$args = array(
			'post_type'           => 'testimonial',
			'posts_per_page'      => $atts[ 'post_per_page' ],
			'post_status'         => array( 'publish' ),
			'ignore_sticky_posts' => true,
			'order'               => $atts[ 'post_order' ],
			'orderby'             => $atts[ 'post_orderby' ],
		);
		$the_query = new WP_Query( $args );
		if ( ! $the_query->have_posts() ) {
			return;
		}

		$sigma_shortcodes[ $handle ][ 'atts' ]      = $atts;
		$sigma_shortcodes[ $handle ][ 'the_query' ] = $the_query;
		$sigma_shortcodes_class_unique              = 'sigma-testimonials-' . mt_rand();
		$sigma_shortcodes_classes                   = $this->handle . '_wrapper';
		$sigma_shortcodes_classes                   .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes                   .= ' ' . $this->wrapper_class;
		if ( $atts[ 'el_class' ] ) {
			$sigma_shortcodes_classes .= ' ' . $atts[ 'el_class' ];
		}
		$sigma_shortcodes_classes                   .= ' testimonials-' . $atts[ 'style' ];
		$sigma_shortcodes_classes                   .= ' testimonials-' . $atts[ 'layout' ];

		//Color
		if ( $atts[ 'title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .testimonial-box h3 { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".testimonials-style-2 .testimonial-box .testimonial-footer .testimonial-footer-meta h5 { color: " . $atts[ 'title_color' ] . ";}";
		}
		if ( $atts[ 'designation_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .testimonial-box .clinet-post { color: " . $atts[ 'designation_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".testimonials-style-2 .testimonial-box .testimonial-footer .testimonial-footer-meta span { color: " . $atts[ 'designation_color' ] . ";}";
		}
		if ( $atts[ 'content_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .testimonial-box p { color: " . $atts[ 'content_color' ] . ";}";
		}
		if ( $atts[ 'rating_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .testimonial-box .sigma_testimonial-rating i { color: " . $atts[ 'rating_color' ] . ";}";
		}
		if ( $atts[ 'background_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .testimonial-box { background-color: " . $atts[ 'background_color' ] . ";}";
		}
		if ( $atts[ 'border_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".testimonials-style-2 .testimonial-box { border-color: " . $atts[ 'border_color' ] . ";}";
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
			<?php sigmacore_get_vc_shortcode_template( 'testimonials/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Testimonials_Shortcode_Fields();
