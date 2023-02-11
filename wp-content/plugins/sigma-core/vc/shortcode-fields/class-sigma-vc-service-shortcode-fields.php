<?php
/**
 * Sigma Service shortcode
 *
 * @package Sigma Core
 */
/**
 * Service shortcode.
 */
class Sigma_Vc_Service_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Service', 'sigma-core' );
		$this->handle        = 'sigma_service';
		$this->description   = esc_html__( 'Use this shortcode to show service.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrapper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}
	/**
	 * Service shortcode mapping.
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
				'value'            => sigmacore_get_available_layouts()
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Service Style', 'sigma-core' ),
				'description' => esc_html__( 'Select Style.', 'sigma-core' ),
				'param_name'  => 'style',
				'value'       => array(
					esc_html__( 'Style 1', 'sigma-core' ) => 'style-1',
					esc_html__( 'Style 2', 'sigma-core' ) => 'style-2',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Service Count', 'sigma-core' ),
				'param_name'  => 'post_per_page',
				'description' => esc_html__( 'Enter number of service to display.', 'sigma-core' ),
				'admin_label' => true
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Categories', 'sigma-core' ),
				'param_name'  => 'post_categories',
				'description' => esc_html__( 'Select categories to display on front. it will show all the post if no categories selected.', 'sigma-core' ),
				'value'       => sigmacore_get_tax_terms('service-category'),
				'dependency' => array(
					'element' => 'layout',
					'value'   => array('slider', 'grid'),
				),
			),
			array(
				'type'             => 'dropdown',
				'param_name'       => 'post_order',
				'heading'          => esc_html__( 'Order', 'sigma-core' ),
				'description'      => esc_html__( 'Select display order.', 'sigma-core' ),
				'std'              => 'DESC',
				'value'            => array(
					esc_html__( 'Ascending', 'sigma-core' )  => 'ASC',
					esc_html__( 'Descending', 'sigma-core' ) => 'DESC',
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
				'param_name'       => 'show_featured_image',
				'description'      => esc_html__( 'Select this checkbox to show featured image.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'std' => 'yes',
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Select Content Box Background Image', 'sigma-core' ),
				'param_name'  => 'content_bg_image',
				'value'       => '',
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-2',
				),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Show Read More?', 'sigma-core' ),
				'param_name'       => 'read_more',
				'description'      => esc_html__( 'Select this checkbox to show post read more button.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'std' => 'yes',
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Show Icon?', 'sigma-core' ),
				'param_name'       => 'show_icon',
				'description'      => esc_html__( 'Select this checkbox to show service icon.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'std' => 'yes',
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Show Excerpt?', 'sigma-core' ),
				'param_name'       => 'post_excerpt',
				'description'      => esc_html__( 'Select this checkbox to show post excerpt.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'std' => 'yes'
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Post Excerpt Length', 'sigma-core' ),
				'param_name'  => 'post_excerpt_length',
				'description' => esc_html__( 'Enter number of words to show in excerpt.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'dependency' => array(
					'element' => 'post_excerpt',
					'value'   => 'yes',
				),
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
				'heading'     => esc_html__( 'Description Color', 'sigma-core' ),
				'param_name'  => 'desc_color',
				'description' => esc_html__( 'Select custom description color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Icon Color', 'sigma-core' ),
				'param_name'  => 'icon_color',
				'description' => esc_html__( 'Select custom icon color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Icon Background Color', 'sigma-core' ),
				'param_name'  => 'icon_bg_color',
				'description' => esc_html__( 'Select custom icon background color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Link Color', 'sigma-core' ),
				'param_name'  => 'link_color',
				'description' => esc_html__( 'Select custom link color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Block Background Color', 'sigma-core' ),
				'param_name'  => 'block_bg_color',
				'description' => esc_html__( 'Select custom block bg color.', 'sigma-core' ),
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

		// This function will add all of the layout options into the fields
		$fields = sigmacore_get_layout_options( $fields, ['grid', 'slider', 'isotope'], 'service-category' );

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
	 * Service shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'layout'                      => 'slider',
			'style'                       => 'style-1',
			'post_per_page'               => '',
			'post_categories'             => '',
			'read_more'										=> 'yes',
			'show_icon'										=> 'yes',
			'show_featured_image'					=> 'yes',
			'content_bg_image'            => '',
			'post_excerpt'								=> 'yes',
			'post_excerpt_length'					=> 10,
			'post_order'                  => '',
			'post_orderby'                => '',
			'title_color'                 => '',
			'desc_color'                	=> '',
			'icon_color'                	=> '',
			'icon_bg_color'               => '',
			'link_color'                	=> '',
			'block_bg_color'              => '',
			'css_animation'               => '',
			'el_id'                       => '',
			'el_class'                    => '',
			'css'                         => '',
			'handle'                      => $handle,
		);

		$default_atts = sigmacore_get_layout_attributes($default_atts, ['grid', 'slider', 'isotope'] );

		$atts = shortcode_atts( $default_atts, $atts, $handle );

		global $sigma_shortcodes, $sigma_vc_inline_css;

		$args = array(
			'post_type'           => 'service',
			'posts_per_page'      => $atts[ 'post_per_page' ],
			'post_status'         => array( 'publish' ),
			'ignore_sticky_posts' => true,
			'order'               => $atts[ 'post_order' ],
			'orderby'             => $atts[ 'post_orderby' ],
		);
		if ( $atts[ 'post_categories' ] ) {
			$categories_array = explode( ',', $atts[ 'post_categories' ] );
			if ( is_array( $categories_array ) && $categories_array ) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => 'service-category',
						'field'    => 'term_id',
						'terms'    => $categories_array,
					),
				);
			}
		}

		$the_query = new WP_Query( $args );
		if ( ! $the_query->have_posts() ) {
			return;
		}

		$sigma_shortcodes[ $handle ][ 'atts' ]      = $atts;
		$sigma_shortcodes[ $handle ][ 'the_query' ] = $the_query;
		$sigma_shortcodes_class_unique              = 'sigma-service-' . mt_rand();
		$sigma_shortcodes_classes                   = $this->handle . '_wrapper';
		$sigma_shortcodes_classes                   .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes                   .= ' ' . $this->wrapper_class;
		if ( $atts[ 'el_class' ] ) {
			$sigma_shortcodes_classes .= ' ' . $atts[ 'el_class' ];
		}
		$sigma_shortcodes_classes                   .= ' sigma-service-' . $atts[ 'style' ];

		//Color
		if ( $atts[ 'title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-service-style-1 .sigma_service.style-3 .sigma_service-body h5 { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-service-style-2 .sigma_service.style-1 .sigma_service-body h5 { color: " . $atts[ 'title_color' ] . ";}";
		}
		if ( $atts[ 'desc_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-service-style-1 .sigma_service.style-3 .sigma_service-body p { color: " . $atts[ 'desc_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-service-style-2 .sigma_service.style-1 .sigma_service-body p { color: " . $atts[ 'desc_color' ] . ";}";
		}
		if ( $atts[ 'icon_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-service-style-1 .sigma_service.style-3 .sigma_service-thumb i { color: " . $atts[ 'icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-service-style-2 .sigma_service.style-1 .sigma_service-thumb i { color: " . $atts[ 'icon_color' ] . ";}";
		}
		if ( $atts[ 'icon_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-service-style-1 .sigma_service.style-3 .sigma_service-thumb i { background-color: " . $atts[ 'icon_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-service-style-2 .sigma_service.style-1 .sigma_service-thumb i { background-color: " . $atts[ 'icon_bg_color' ] . ";}";
		}
		if ( $atts[ 'link_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-service-style-1 .sigma_service.style-3 .sigma_service-body a.btn-link { color: " . $atts[ 'link_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-service-style-2 .sigma_service.style-1 .sigma_service-body a.btn-link { color: " . $atts[ 'link_color' ] . ";}";
		}
		if ( $atts[ 'block_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-service-style-1 .sigma_service.style-3 .sigma_service-body { background-color: " . $atts[ 'block_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .service-style-2-content-wrapper { background-color: " . $atts[ 'block_bg_color' ] . ";}";
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
			<?php sigmacore_get_vc_shortcode_template( 'service/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Service_Shortcode_Fields();
