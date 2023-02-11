<?php
/**
 * Sigma Single Portfolio shortcode
 *
 * @package Sigma Core
 */

/**
 * Single Portfolio shortcode.
 */
class Sigma_Vc_Single_Portfolio_Shortcode_Fields {

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

		$this->title         = esc_html__( 'Single Portfolio', 'sigma-core' );
		$this->handle        = 'sigma_single_portfolio';
		$this->description   = esc_html__( 'Use this shortcode to show single portfolio.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrraper_class = 'sigma-shortcode-wrapper';

		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}

	/**
	 * Single Portfolio shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {

		$fields = array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Portfolio Style', 'sigma-core' ),
				'param_name'  => 'style',
				'description' => esc_html__( 'Select style.', 'sigma-core' ),
				'value'       => array(
					esc_html__( 'Style 1', 'sigma-core' ) => 'style-1',
					esc_html__( 'Style 2', 'sigma-core' ) => 'style-2',
					esc_html__( 'Style 3', 'sigma-core' ) => 'style-3',
					esc_html__( 'Style 4', 'sigma-core' ) => 'style-4',
					esc_html__( 'Style 5', 'sigma-core' ) => 'style-5',
				),
			),
				array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Select Portfolio', 'sigma-core' ),
			'param_name'  => 'select_post',
			'value'       => sigmacore_get_posts_select('portfolio'),
			),
      array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Portfolio Height', 'sigma-core' ),
				'param_name'  => 'portfolio_height',
				'description' => esc_html__( 'Enter height of portfolio. Eg:(500px)', 'sigma-core' ),
				'admin_label' => true,
        'dependency' => array(
					'element' => 'style',
					'value'   => array('style-5'),
				),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Show Post Category?', 'sigma-core' ),
				'param_name'       => 'show_post_cat',
				'description'      => esc_html__( 'Select this checkbox to show post category.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'std' => 'yes',
				'dependency' => array(
					'element' => 'style',
					'value'   => 'style-1',
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
				'dependency' => array(
					'element' => 'style',
					'value'   => array('style-2', 'style-5'),
				),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Show Excerpt?', 'sigma-core' ),
				'param_name'       => 'post_excerpt',
				'description'      => esc_html__( 'Select this checkbox to show post excerpt.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'std' => 'yes',
				'dependency' => array(
					'element' => 'style',
					'value'   => 'style-4',
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
				'heading'     => esc_html__( 'Description Color', 'sigma-core' ),
				'param_name'  => 'desc_color',
				'description' => esc_html__( 'Select custom description color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-4'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Category Color', 'sigma-core' ),
				'param_name'  => 'category_color',
				'description' => esc_html__( 'Select custom category color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-1', 'style-2', 'style-3', 'style-5'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Category Hover Color', 'sigma-core' ),
				'param_name'  => 'category_hover_color',
				'description' => esc_html__( 'Select custom category hover color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-3', 'style-5'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Category Background Color', 'sigma-core' ),
				'param_name'  => 'category_bg_color',
				'description' => esc_html__( 'Select custom category background color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-3'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Category Background Hover Color', 'sigma-core' ),
				'param_name'  => 'category_bg_hover_color',
				'description' => esc_html__( 'Select custom category background hover color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-3'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Background Color', 'sigma-core' ),
				'param_name'  => 'block_bg_color',
				'description' => esc_html__( 'Select custom background color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-1', 'style-2'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Icon Color', 'sigma-core' ),
				'param_name'  => 'icon_color',
				'description' => esc_html__( 'Select custom icon color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-2', 'style-4'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Icon Hover Color', 'sigma-core' ),
				'param_name'  => 'icon_hover_color',
				'description' => esc_html__( 'Select custom icon hover color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-2', 'style-4'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Icon Background Color', 'sigma-core' ),
				'param_name'  => 'icon_bg_color',
				'description' => esc_html__( 'Select custom icon background color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-2', 'style-4'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Icon Background Hover Color', 'sigma-core' ),
				'param_name'  => 'icon_bg_hover_color',
				'description' => esc_html__( 'Select custom icon background hover color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-2', 'style-4'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Link Color', 'sigma-core' ),
				'param_name'  => 'link_color',
				'description' => esc_html__( 'Select custom link color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-3', 'style-5'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Link Hover Color', 'sigma-core' ),
				'param_name'  => 'link_hover_color',
				'description' => esc_html__( 'Select custom link hover color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-3', 'style-5'],
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
	 * Single Portfolio shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {

		$default_atts = array(
			'style'                       => 'style-1',
			'select_post' 								=> '',
      'portfolio_height'            => '',
      'show_post_cat'            		=> '',
      'read_more'           			  => '',
      'post_excerpt'            		=> '',
      'post_excerpt_length'         => '',
			'title_color'                	=> '',
			'desc_color'               		=> '',
			'category_color'              => '',
			'category_hover_color'        => '',
			'category_bg_color'           => '',
			'category_bg_hover_color'     => '',
			'block_bg_color'              => '',
			'icon_color'                	=> '',
			'icon_hover_color'            => '',
			'icon_bg_color'               => '',
			'icon_bg_hover_color'         => '',
			'link_color'                	=> '',
			'link_hover_color'            => '',
			'css_animation'               => '',
			'el_id'                       => '',
			'el_class'                    => '',
			'css'                         => '',
			'handle'                      => $handle,
		);

		$atts = shortcode_atts( $default_atts, $atts, $handle );

		global $sigma_shortcodes, $sigma_vc_inline_css;

		$args = array(
			'post_type'           => 'portfolio',
			'post__in'  					=> array($atts['select_post'])
		);
		$the_query = new WP_Query( $args );
		if ( ! $the_query->have_posts() ) {
			return;
		}

		$inline_css                               = '';
		$sigma_shortcodes[ $handle ]['atts']      = $atts;
		$sigma_shortcodes[ $handle ]['the_query'] = $the_query;
		$sigma_shortcodes_class_unique            = 'sigma-single-portfolio-' . mt_rand();
		$sigma_shortcodes_classes                 = $this->handle . '_wrapper';
		$sigma_shortcodes_classes                 .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes                 .= ' ' . $this->wrraper_class;

		if ( $atts['el_class'] ) {
			$sigma_shortcodes_classes .= ' ' . $atts['el_class'];
		}

		$sigma_shortcodes_classes .= ' single-portfolio-' . $atts['style'];
		$sigma_shortcodes_classes .= ' portfolio-' . $atts['style'];
		if ( $atts['css_animation'] && 'none' !== $atts['css_animation'] ) {
			wp_enqueue_script( 'vc_waypoints' );
			wp_enqueue_style( 'vc_animate-css' );

			$sigma_shortcodes_classes .= ' wpb_animate_when_almost_visible wpb_' . $atts['css_animation'] . ' ' . $atts['css_animation'];
		}
    if ( $atts[ 'portfolio_height' ] ) {
      $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-5 .sigma_portfolio-item{ height: " . $atts[ 'portfolio_height' ] . ";}";
    }
		//Color
		if ( $atts[ 'title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-1 .portfolio-title a { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-2 .sigma-portfolio-thumbnail-wrapper .sigma-portfolio-content-cover .portfolio-title a { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-3 .sigma-portfolio-title .portfolio-title a { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-4 .sigma_portfolio-item .sigma_portfolio-item-content .sigma_portfolio-item-content-inner h5 a { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-5 .sigma_portfolio-item .sigma_portfolio-item-content .sigma_portfolio-item-content-inner h5 a { color: " . $atts[ 'title_color' ] . ";}";
		}
		if ( $atts[ 'desc_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-4 .sigma_portfolio-item .sigma_portfolio-item-content .sigma_portfolio-item-content-inner p { color: " . $atts[ 'desc_color' ] . ";}";
		}
		if ( $atts[ 'category_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-1 .sigma-portfolio-category { color: " . $atts[ 'category_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-1 .sigma-portfolio-category:before { background-color: " . $atts[ 'category_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-2 .sigma-portfolio-thumbnail-wrapper .sigma-portfolio-content-cover .sigma-portfolio-category { color: " . $atts[ 'category_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-2 .sigma-portfolio-thumbnail-wrapper .sigma-portfolio-content-cover .sigma-portfolio-category:before { background-color: " . $atts[ 'category_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-3 .sigma-portfolio-title .sigma-portfolio-category a { color: " . $atts[ 'category_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-5 .sigma_portfolio-item .sigma_portfolio-item-content .sigma_portfolio-item-content-inner a { color: " . $atts[ 'category_color' ] . ";}";
		}
		if ( $atts[ 'category_hover_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-3 .sigma-portfolio-title .sigma-portfolio-category a:hover { color: " . $atts[ 'category_hover_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-5 .sigma_portfolio-item .sigma_portfolio-item-content .sigma_portfolio-item-content-inner a:hover { color: " . $atts[ 'category_hover_color' ] . ";}";
		}
		if ( $atts[ 'category_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-3 .sigma-portfolio-title .sigma-portfolio-category a { background-color: " . $atts[ 'category_bg_color' ] . ";}";
		}
		if ( $atts[ 'category_bg_hover_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-3 .sigma-portfolio-title .sigma-portfolio-category a:hover { background-color: " . $atts[ 'category_bg_hover_color' ] . ";}";
		}
		if ( $atts[ 'block_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-1 .sigma-portfolio-thumbnail-wrapper:hover .portfolio-content-sec { background-color: " . $atts[ 'block_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-2 .sigma-portfolio-thumbnail-wrapper:hover .sigma-portfolio-content-cover { background-color: " . $atts[ 'block_bg_color' ] . ";}";
		}
		if ( $atts[ 'icon_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-2 .sigma-portfolio-thumbnail-wrapper .sigma-portfolio-content-cover .portfolio-link { color: " . $atts[ 'icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-4 .sigma_portfolio-item:hover .sigma_portfolio-item-content a i { color: " . $atts[ 'icon_color' ] . ";}";
		}
		if ( $atts[ 'icon_hover_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-2 .sigma-portfolio-thumbnail-wrapper .sigma-portfolio-content-cover .portfolio-link:hover { color: " . $atts[ 'icon_hover_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-4 .sigma_portfolio-item:hover .sigma_portfolio-item-content a i:hover { color: " . $atts[ 'icon_hover_color' ] . ";}";
		}
		if ( $atts[ 'icon_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-2 .sigma-portfolio-thumbnail-wrapper .sigma-portfolio-content-cover .portfolio-link { background-color: " . $atts[ 'icon_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-4 .sigma_portfolio-item:hover .sigma_portfolio-item-content a i { background-color: " . $atts[ 'icon_bg_color' ] . ";}";
		}
		if ( $atts[ 'icon_bg_hover_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-2 .sigma-portfolio-thumbnail-wrapper .sigma-portfolio-content-cover .portfolio-link:hover { background-color: " . $atts[ 'icon_bg_hover_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-4 .sigma_portfolio-item:hover .sigma_portfolio-item-content a i:hover { background-color: " . $atts[ 'icon_bg_hover_color' ] . ";}";
		}
		if ( $atts[ 'link_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-3 .sigma-portfolio-title .portfolio-link { color: " . $atts[ 'link_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-5 .sigma_portfolio-item .sigma_portfolio-item-content .sigma_portfolio-item-content-inner .sigma_btn-custom { color: " . $atts[ 'link_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-5 .sigma_portfolio-item .sigma_portfolio-item-content .sigma_portfolio-item-content-inner .sigma_btn-custom { border-color: " . $atts[ 'link_color' ] . ";}";
		}
		if ( $atts[ 'link_hover_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-3 .sigma-portfolio-title .portfolio-link:hover { color: " . $atts[ 'link_hover_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-5 .sigma_portfolio-item .sigma_portfolio-item-content .sigma_portfolio-item-content-inner .sigma_btn-custom:hover { color: " . $atts[ 'link_hover_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-portfolio-style-5 .sigma_portfolio-item .sigma_portfolio-item-content .sigma_portfolio-item-content-inner .sigma_btn-custom:hover { border-color: " . $atts[ 'link_hover_color' ] . ";}";
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
			<?php sigmacore_get_vc_shortcode_template( 'single-portfolio/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}

new Sigma_Vc_Single_Portfolio_Shortcode_Fields();
