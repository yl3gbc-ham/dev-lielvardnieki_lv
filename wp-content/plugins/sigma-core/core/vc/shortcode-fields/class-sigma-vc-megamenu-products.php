<?php
/**
 * Sigma blog shortcode
 *
 * @package Sigma Core
 */
/**
 * Blog shortcode.
 */
class Sigma_Vc_MegaMenu_Products_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Megamenu Products', 'sigma-core' );
		$this->handle        = 'sigma_megamenu_products';
		$this->description   = esc_html__( 'Use this shortcode to show products.', 'sigma-core' );
    $this->category      = esc_html__( 'Sigma Header', 'sigma-core' );
		$this->wrapper_class = 'sigma-shortcode-wrapper';
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
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Section Heading Title', 'sigma-core' ),
				'param_name'  => 'section_title',
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Section Heading Sub-title', 'sigma-core' ),
				'param_name'  => 'section_sub_title',
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
				'value'       => sigmacore_get_tax_terms('product_cat'),
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
				'heading'          => esc_html__( 'Enable Price?', 'sigma-core' ),
				'param_name'       => 'show_price',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
        'std'              => 'yes',
				'description'      => esc_html__( 'Select this checkbox to show the product price', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Enable Star Rating?', 'sigma-core' ),
				'param_name'       => 'show_rating',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
        'std'              => 'yes',
				'description'      => esc_html__( 'Select this checkbox to show the product rating (If available)', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Enable Featured badge?', 'sigma-core' ),
				'param_name'       => 'show_featured_badge',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
        'std'              => 'yes',
				'description'      => esc_html__( 'Select this checkbox to show featured badge (If available)', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Enable Sale Badge?', 'sigma-core' ),
				'param_name'       => 'show_sale_discount',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
        'std'              => 'yes',
				'description'      => esc_html__( 'Select this checkbox to show product sale badge (If available)', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Enable Read More?', 'sigma-core' ),
				'param_name'       => 'show_read_more',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
        'std'              => 'yes',
				'description'      => esc_html__( 'Select this checkbox to show the Read More button', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Enable Excerpt?', 'sigma-core' ),
				'param_name'       => 'show_excerpt',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
        'std'              => 'yes',
				'description'      => esc_html__( 'Select this checkbox to show the product excerpt', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Excerpt Length', 'sigma-core' ),
				'param_name'  => 'excerpt_length',
				'description' => esc_html__( 'Number of words to show in the excerpt', 'sigma-core' ),
				'dependency' => array(
					'element' => 'show_excerpt',
					'value'   => 'yes',
				),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Product on sale?', 'sigma-core' ),
				'param_name'       => 'on_sale_only',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'description'      => esc_html__( 'Select this checkbox to only show the products that are on sale', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Featured Products only?', 'sigma-core' ),
				'param_name'       => 'featured_only',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'description'      => esc_html__( 'Select this checkbox to only show the featured products', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
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
	 * Product shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'post_per_page'               => '',
			'post_categories'             => '',
			'section_sub_title'           => '',
			'section_title'           		=> '',
      'show_rating'									=> 'yes',
			'show_price'									=> 'yes',
			'show_sale_discount'					=> 'yes',
			'show_featured_badge'					=> 'yes',
			'show_read_more'							=> 'yes',
			'show_excerpt'								=> 'yes',
			'excerpt_length'							=> '',
			'on_sale_only'								=> '',
			'featured_only'								=> '',
			'post_order'                  => '',
			'post_orderby'                => '',
			'css_animation'               => '',
			'el_id'                       => '',
			'el_class'                    => '',
			'css'                         => '',
			'handle'                      => $handle,
		);

		$default_atts = sigmacore_get_layout_attributes($default_atts, ['grid', 'slider', 'isotope'] );

		$atts = shortcode_atts( $default_atts, $atts, $handle );
		
		global $sigma_shortcodes;

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
			array(
				'taxonomy'  => 'product_visibility',
				'terms'     => array('exclude-from-catalog'),
				'field'     => 'name',
				'operator'  => 'NOT IN',
			),
		);

		if ( $atts['post_categories'] ) {
			$categories_array = explode( ',', $atts['post_categories'] );
			if ( is_array( $categories_array ) && $categories_array ) {
				$tax_query[] = array(
					'taxonomy' => 'product_cat',
					'field'    => 'term_id',
					'terms'    => $categories_array,
				);
			}
		}

		if( $atts['featured_only'] == 'yes' ){
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
			) ;
		}

		if( $atts['on_sale_only'] == 'yes' ){
			$args['meta_query'] =  array(
				'relation' => 'OR',
				array( // Simple products type
					'key'           => '_sale_price',
					'value'         => 0,
					'compare'       => '>',
					'type'          => 'numeric'
				),
				array( // Variable products type
					'key'           => '_min_variation_sale_price',
					'value'         => 0,
					'compare'       => '>',
					'type'          => 'numeric'
				)
			);
		}

		$args['tax_query'] = $tax_query;

		$the_query = new WP_Query( $args );
		if ( ! $the_query->have_posts() ) {
			return esc_html__('No Products found', 'sigma-core');
		}

		$sigma_shortcodes[ $handle ]['atts']      = $atts;
		$sigma_shortcodes[ $handle ]['the_query'] = $the_query;
		$sigma_shortcodes_class_unique            = 'sigma-products-' . mt_rand();
		$sigma_shortcodes_classes                 = $this->handle . '_wrapper';
    $sigma_shortcodes_classes                 .= ' woocommerce';
    $sigma_shortcodes_classes                 .= ' sigma-megamenu-products';
		$sigma_shortcodes_classes                 .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes                 .= ' ' . $this->wrapper_class;
		if ( $atts['el_class'] ) {
			$sigma_shortcodes_classes .= ' ' . $atts['el_class'];
		}

		if ( $atts['css_animation'] && 'none' !== $atts['css_animation'] ) {
			wp_enqueue_script( 'vc_waypoints' );
			wp_enqueue_style( 'vc_animate-css' );
			$sigma_shortcodes_classes .= ' wpb_animate_when_almost_visible wpb_' . $atts['css_animation'] . ' ' . $atts['css_animation'];
		}
		if ( isset( $atts['css'] ) && $atts['css'] ) {
			$sigma_shortcodes_classes .= ' ' . vc_shortcode_custom_css_class( $atts['css'], ' ' );
		}

		ob_start();

		$classes 		 = sigmacore_get_grid_layout_classes($atts);

    $thumb_size = function_exists('gautama_get_thumb_size') ? gautama_get_thumb_size('medium') : 'medium';

		?>
		<div <?php echo ( $atts['el_id'] ) ? 'id=' . esc_attr( $atts["el_id"] ) : ''; ?> class="<?php echo esc_attr( $sigma_shortcodes_classes ); ?>">
      <div class="products">

        <div class="row">
        	<?php
        	while ( $the_query->have_posts() ) {
        		$the_query->the_post();

            $product = wc_get_product( get_the_id() );
            $id = $product->get_id();
        		?>
        		<div class="<?php echo esc_attr( $classes ); ?>">
              <div <?php wc_product_class( 'sigma_product ', $product ); ?>>

              	<div class="sigma_product-inner">

              		<?php
              		if($atts['show_sale_discount'] == 'yes'){
              			woocommerce_show_product_loop_sale_flash();
              		}
              		?>

              		<div class="sigma_product-thumb">

              			<a href="<?php echo esc_url(get_the_permalink($id)) ?>">
              				<?php echo $product->get_image($thumb_size) ?>
              			</a>

                    <?php
              			if($atts['show_rating'] == 'yes'){
              				woocommerce_template_loop_rating();
              			}
              			?>

              		</div>

              		<div class="sigma_product-body">

              			<h5 class="sigma_product-title"> <a href="<?php echo esc_url(get_the_permalink($id)) ?>"> <?php echo esc_html($product->get_name()); ?> </a> </h5>

              			<?php
              			if($atts['show_excerpt'] == 'yes' && function_exists('gautama_custom_excerpt')){
              				$excerpt_length = !empty($atts['excerpt_length']) ? $atts['excerpt_length'] : 10;
              				?>
              			<p><?php echo esc_html(gautama_custom_excerpt($excerpt_length, $product->get_short_description())) ?></p>
              			<?php } ?>

              				<?php if($atts['show_price'] == 'yes'){ ?>
                        <div class="sigma_product-body-meta">
              					<?php woocommerce_template_loop_price(); ?>
                        </div>
                      <?php } ?>

                    <?php if($atts['show_read_more'] == 'yes'){ ?>
                      <a href="<?php echo esc_url(get_the_permalink($id)) ?>"><?php echo esc_html__("View Product", "sigma-core") ?></a>
                    <?php } ?>

              		</div>

              	</div>

              </div>

        		</div>
        		<?php
        	}
        	/* Restore original Post Data */
        	wp_reset_postdata();
        	?>
        </div>

      </div>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_MegaMenu_Products_Shortcode_Fields();
