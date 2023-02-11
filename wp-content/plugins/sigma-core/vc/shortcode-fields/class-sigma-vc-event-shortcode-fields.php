<?php
/**
 * Sigma Event shortcode
 *
 * @package Sigma Core
 */
/**
 * Event shortcode.
 */
class Sigma_Vc_Event_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Event', 'sigma-core' );
		$this->handle        = 'sigma_event';
		$this->description   = esc_html__( 'Use this shortcode to show event.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrapper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}

	/**
	 * Event shortcode mapping.
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
				'heading'     => esc_html__( 'Event Style', 'sigma-core' ),
				'param_name'  => 'style',
				'description' => esc_html__( 'Select style.', 'sigma-core' ),
				'value'       => array(
					esc_html__( 'Style 1', 'sigma-core' ) => 'style-1',
					esc_html__( 'Style 2', 'sigma-core' ) => 'style-2',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Post Height', 'sigma-core' ),
				'param_name'  => 'post_height',
				'description' => esc_html__( 'Enter height that you wish to set for the posts (Don\'t change if youre not sure what this is) - Example: 500px', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => 'style-2',
				),
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
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Post Count', 'sigma-core' ),
				'param_name'  => 'post_per_page',
				'description' => esc_html__( 'Enter number of posts to display.', 'sigma-core' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Categories', 'sigma-core' ),
				'param_name'  => 'post_categories',
				'description' => esc_html__( 'Select categories to display on front. it will show all the post if no categories selected.', 'sigma-core' ),
				'value'       => sigmacore_get_tax_terms('event-category'),
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
				'heading'          => esc_html__( 'Show Excerpt?', 'sigma-core' ),
				'param_name'       => 'post_excerpt',
				'description'      => esc_html__( 'Select this checkbox to show post excerpt.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'std' => 'yes',
        'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-1',
				),
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
				'heading'     => esc_html__( 'Date Color', 'sigma-core' ),
				'param_name'  => 'date_color',
				'description' => esc_html__( 'Select custom date color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Description Color', 'sigma-core' ),
				'param_name'  => 'desc_color',
				'description' => esc_html__( 'Select custom description color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-1',
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Icon Background Color', 'sigma-core' ),
				'param_name'  => 'icon_bg_color',
				'description' => esc_html__( 'Select custom icon background color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-1',
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Icon Color', 'sigma-core' ),
				'param_name'  => 'icon_color',
				'description' => esc_html__( 'Select custom icon color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-1',
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Button Color', 'sigma-core' ),
				'param_name'  => 'button_color',
				'description' => esc_html__( 'Select custom button color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => 'style-2',
				),
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

		// This function will add all of the layout options into the fields
		$fields = sigmacore_get_layout_options( $fields, ['grid', 'slider', 'isotope'], 'event-category' );

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
	 * Event shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'style'                       => 'style-1',
			'layout'                      => 'slider',
			'post_height'									=> '',
			'post_per_page'               => '',
			'post_categories'             => '',
			'section_sub_title'           => '',
			'section_title'           		=> '',
			'post_excerpt'								=> 'yes',
			'post_excerpt_length'					=> '',
			'post_order'                  => '',
			'post_orderby'                => '',
			'title_color'                	=> '',
			'date_color'               	  => '',
			'desc_color'                	=> '',
			'icon_bg_color'               => '',
			'icon_color'               		=> '',
			'button_color'                => '',
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
			'post_type'           => 'event',
			'posts_per_page'      => $atts['post_per_page'],
			'post_status'         => array( 'publish' ),
			'ignore_sticky_posts' => true,
			'order'               => $atts['post_order'],
			'orderby'             => $atts['post_orderby'],
		);
		if ( $atts['post_categories'] ) {
			$categories_array = explode( ',', $atts['post_categories'] );
			if ( is_array( $categories_array ) && $categories_array ) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => 'event-category',
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
		$inline_css                               = '';
		$sigma_shortcodes[ $handle ]['atts']      = $atts;
		$sigma_shortcodes[ $handle ]['the_query'] = $the_query;
		$sigma_shortcodes_class_unique            = 'sigma-event-' . mt_rand();
		$sigma_shortcodes_classes                 = $this->handle . '_wrapper';
		$sigma_shortcodes_classes                 .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes                 .= ' ' . $this->wrapper_class;

		if ( $atts['el_class'] ) {
			$sigma_shortcodes_classes .= ' ' . $atts['el_class'];
		}

		if ( $atts[ 'post_height' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-event-style-2 .sigma_portfolio-item{ height: " . $atts[ 'post_height' ] . ";}";
		}
		if ( $atts[ 'title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-event-style-1 .sigma_portfolio-item .sigma_portfolio-item-content .sigma_portfolio-item-content-inner h5 a{ color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-event-style-2 .sigma_portfolio-item .sigma_portfolio-item-content .sigma_portfolio-item-content-inner h5 a{ color: " . $atts[ 'title_color' ] . ";}";
		}

		if ( $atts[ 'date_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-event-style-1 .sigma_portfolio-item .sigma_portfolio-item-content .sigma_portfolio-item-content-inner span{ color: " . $atts[ 'date_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-event-style-2 .sigma_portfolio-item .sigma_portfolio-item-content .sigma_portfolio-item-content-inner span{ color: " . $atts[ 'date_color' ] . ";}";
		}

		if ( $atts[ 'desc_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-event-style-1 .sigma_portfolio-item .sigma_portfolio-item-content .sigma_portfolio-item-content-inner p{ color: " . $atts[ 'desc_color' ] . ";}";
		}

		if ( $atts[ 'icon_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-event-style-1 .sigma_portfolio-item .read-more-link i{ background-color: " . $atts[ 'icon_bg_color' ] . ";}";
		}

		if ( $atts[ 'icon_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-event-style-1 .sigma_portfolio-item .read-more-link i{ color: " . $atts[ 'icon_color' ] . ";}";
		}

		if ( $atts[ 'button_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-event-style-2 .sigma_portfolio-item .sigma_portfolio-item-content .sigma_portfolio-item-content-inner .read-more-link{ color: " . $atts[ 'button_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-event-style-2 .sigma_portfolio-item .sigma_portfolio-item-content .sigma_portfolio-item-content-inner .read-more-link{ border-color: " . $atts[ 'button_color' ] . ";}";
		}


		if ( $inline_css ) {
			$sigma_vc_inline_css[] = $inline_css;
			sigmacore_vc_add_inline_css(); // This is added in case the sigma_vc_inline failed to fetch the css
		}

		$sigma_shortcodes_classes .= ' event-' . $atts['style'];

		if ( $atts['css_animation'] && 'none' !== $atts['css_animation'] ) {
			wp_enqueue_script( 'vc_waypoints' );
			wp_enqueue_style( 'vc_animate-css' );
			$sigma_shortcodes_classes .= ' wpb_animate_when_almost_visible wpb_' . $atts['css_animation'] . ' ' . $atts['css_animation'];
		}
		if ( isset( $atts['css'] ) && $atts['css'] ) {
			$sigma_shortcodes_classes .= ' ' . vc_shortcode_custom_css_class( $atts['css'], ' ' );
		}

		ob_start();

		?>
		<div <?php echo ( $atts['el_id'] ) ? 'id=' . esc_attr( $atts["el_id"] ) : ''; ?> class="<?php echo esc_attr( $sigma_shortcodes_classes ); ?>">
			<?php sigmacore_get_vc_shortcode_template( 'event/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Event_Shortcode_Fields();
