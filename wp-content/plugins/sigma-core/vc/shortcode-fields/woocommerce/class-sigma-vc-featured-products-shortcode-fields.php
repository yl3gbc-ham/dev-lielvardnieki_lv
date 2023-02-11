<?php
/**
 * Sigma featured products shortcode
 *
 * @package Sigma Core
 */
/**
 * Featured Products shortcode.
 */
class Sigma_Vc_Featured_Products_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Featured Products', 'sigma-core' );
		$this->handle        = 'sigma_featured_products';
		$this->description   = esc_html__( 'Use this shortcode to show featured products.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrraper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}
	/**
	 * Products shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {
		$fields = array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Products Style', 'sigma-core' ),
				'param_name'  => 'style',
				'description' => esc_html__( 'Select style.', 'sigma-core' ),
				'value'       => array(
					esc_html__( 'Style 1', 'sigma-core' ) => 'style-1',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Product Count', 'sigma-core' ),
				'param_name'  => 'post_per_page',
				'description' => esc_html__( 'Enter number of products to display.', 'sigma-core' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Categories', 'sigma-core' ),
				'param_name'  => 'post_categories',
				'description' => esc_html__( 'Select categories to display on front. it will show all the post if no categories selected.', 'sigma-core' ),
				'value'       => sigmacore_get_tax_terms('product_cat'),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title', 'sigma-core' ),
				'param_name'  => 'title',
				'description' => esc_html__( 'Enter number of products to display.', 'sigma-core' ),
			),
      array(
        'type'             => 'checkbox',
        'heading'          => esc_html__( 'Show Featured Image?', 'sigma-core' ),
        'param_name'       => 'post_featured_image',
        'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
        'description'      => esc_html__( 'Select this checkbox to show post featured image.', 'sigma-core' ),
        'edit_field_class' => 'vc_col-sm-6 vc_column',
      ),
      array(
        'type'             => 'checkbox',
        'heading'          => esc_html__( 'Show Price?', 'sigma-core' ),
        'param_name'       => 'post_price',
        'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
        'description'      => esc_html__( 'Select this checkbox to show product price.', 'sigma-core' ),
        'edit_field_class' => 'vc_col-sm-6 vc_column',
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
			// Color options
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Section Title Color', 'sigma-core' ),
				'param_name'  => 'section_title_color',
				'description' => esc_html__( 'Select custom section title color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Product Title Color', 'sigma-core' ),
				'param_name'  => 'product_title_color',
				'description' => esc_html__( 'Select custom product title color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Description Color', 'sigma-core' ),
				'param_name'  => 'description_color',
				'description' => esc_html__( 'Select custom description color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Price Color', 'sigma-core' ),
				'param_name'  => 'price_color',
				'description' => esc_html__( 'Select custom price color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			vc_map_add_css_animation(),
			array(
				'type'        => 'el_id',
				'heading'     => esc_html__( 'Element ID', 'sigma-core' ),
				'param_name'  => 'el_id',
				/* translators: 1: anchor tag start, 2: anchor tag end */
				'description' => sprintf( esc_html__( 'Enter element ID (Note: make sure it is unique and valid according to %1$sw3c specification%2$s).', 'sigma-core' ), '<a href="https://www.w3schools.com/tags/att_global_id.asp">', '</a>' ),
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
	 * Featured Products shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'style'                       => 'style-1',
      'post_per_page'               => '',
			'post_categories'             => '',
			'title' 											=> '',
      'post_featured_image'         => '',
      'post_price'                  => '',
			'post_order'                  => '',
			'post_orderby'                => '',
			'section_title_color'         => '',
			'product_title_color'         => '',
			'description_color'           => '',
			'price_color'                 => '',
			'css_animation'               => '',
			'el_id'                       => '',
			'el_class'                    => '',
			'css'                         => '',
			'handle'                      => $handle,
		);
		$atts = shortcode_atts( $default_atts, $atts, $handle );
		global $sigma_shortcodes, $sigma_vc_inline_css;
		$args = array(
			'post_type' => 'product',
			'posts_per_page'      => $atts['post_per_page'],
			'post_status'         => array( 'publish' ),
			'ignore_sticky_posts' => true,
			'order'               => $atts['post_order'],
			'orderby'             => $atts['post_orderby'],
		);
		$tax_query = [];
		$tax_query[] = array(
			'taxonomy' => 'product_visibility',
			'field'    => 'name',
			'terms'    => 'featured',
			'operator' => 'IN',
		);
		$tax_query[] = array(
			'taxonomy'  => 'product_visibility',
			'terms'     => array('exclude-from-catalog'),
			'field'     => 'name',
			'operator'  => 'NOT IN',
		);
		if ( $atts['post_categories'] ) {
			$categories_array = explode( ',', $atts['post_categories'] );
			if ( is_array( $categories_array ) && $categories_array ) {
				$tax_query[] = array(
					'taxonomy' => 'product_cat',
					'field'    => 'name',
					'terms'    => $categories_array,
				);
			}
		}
		$args['tax_query'] = $tax_query;
		$the_query = new WP_Query( $args );
		if ( ! $the_query->have_posts() ) {
			return esc_html__('No Featured Products found', 'sigma-core');
		}
		$inline_css                               = '';
		$sigma_shortcodes[ $handle ]['atts']      = $atts;
		$sigma_shortcodes[ $handle ]['the_query'] = $the_query;
		$sigma_shortcodes_class_unique            = 'sigma-featured-products-' . mt_rand();
		$sigma_shortcodes[ $handle ]['unique-identifier'] = $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes                 = $this->handle . '_wrapper';
		$sigma_shortcodes_classes                 .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes                 .= ' ' . $this->wrraper_class;
		if ( $atts['el_class'] ) {
			$sigma_shortcodes_classes .= ' ' . $atts['el_class'];
		}
		$sigma_shortcodes_classes .= ' woocommerce featured-products-' . $atts['style'];

		//Color
		if ( $atts[ 'section_title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".featured-products-style-1 .featured-product-list h4{ color: " . $atts[ 'section_title_color' ] . ";}";
		}
		if ( $atts[ 'product_title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".featured-products-style-1 .product-block .product-descr h5 a { color: " . $atts[ 'product_title_color' ] . ";}";
		}
		if ( $atts[ 'description_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".featured-products-style-1 .product-block .product-descr p { color: " . $atts[ 'description_color' ] . ";}";
		}
		if ( $atts[ 'price_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".featured-products-style-1 .product-block .product-descr .price { color: " . $atts[ 'price_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".featured-products-style-1 .product-block .product-descr .price ins { color: " . $atts[ 'price_color' ] . ";}";
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
			<?php sigmacore_get_vc_shortcode_template( 'featured-products/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Featured_Products_Shortcode_Fields();
