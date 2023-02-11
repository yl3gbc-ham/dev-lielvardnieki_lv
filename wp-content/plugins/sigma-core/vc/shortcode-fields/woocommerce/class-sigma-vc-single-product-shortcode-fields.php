<?php
/**
 * Sigma single product countdown shortcode
 *
 * @package Sigma Core
 */
/**
 * Products shortcode.
 */
class Sigma_Vc_Single_Product_Shortcode_Fields {
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
        $this->title         = esc_html__( 'Single Product', 'sigma-core' );
        $this->handle        = 'sigma_single_product';
        $this->description   = esc_html__( 'Use this shortcode to show single product.', 'sigma-core' );
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
                'heading'     => esc_html__( 'Style', 'sigma-core' ),
                'param_name'  => 'single-style',
                'description' => esc_html__( 'Select style.', 'sigma-core' ),
                'value'       => array(
                    esc_html__( 'Style 1', 'sigma-core' ) => 'style-1',
                ),
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Select Product', 'sigma-core' ),
                'param_name'  => 'prod_id',
                'description' => esc_html__( 'Select Product.', 'sigma-core' ),
                'value'       => sigmacore_get_posts_select('product'),
            ),
            array(
                'type'             => 'checkbox',
                'heading'          => esc_html__( 'Show Featured Image?', 'sigma-core' ),
                'param_name'       => 'post_featured_image',
                'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
                'description'      => esc_html__( 'Select this checkbox to show post featured image.', 'sigma-core' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
            ),
            array(
              'type' => 'attach_image',
              'heading' => esc_html__( 'Custom Image', 'sigma-core' ),
              'param_name' => 'custom_image',
            ),
            array(
                'type'             => 'checkbox',
                'heading'          => esc_html__( 'Show Price?', 'sigma-core' ),
                'param_name'       => 'post_price',
                'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
                'description'      => esc_html__( 'Select this checkbox to show product price.', 'sigma-core' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
            ),
            array(
                'type'             => 'checkbox',
                'heading'          => esc_html__( 'Show Excerpt?', 'sigma-core' ),
                'param_name'       => 'post_excerpt',
                'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'true' ),
                'description'      => esc_html__( 'Select this checkbox to show post excerpt.', 'sigma-core' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
            ),
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Post Excerpt Length', 'sigma-core' ),
                'param_name'  => 'post_excerpt_length',
                'description' => esc_html__( 'Enter number of words to show in excerpt.', 'sigma-core' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'dependency' => array(
                    'element' => 'post_excerpt',
                    'value'   => 'true',
                ),
            ),
            array(
                'type'             => 'checkbox',
                'heading'          => esc_html__( 'Show Cart Button?', 'sigma-core' ),
                'param_name'       => 'show_cart_btn',
                'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
                'description'      => esc_html__( 'Select this checkbox to show the link button', 'sigma-core' ),
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
      				'heading'     => esc_html__( 'Price Color', 'sigma-core' ),
      				'param_name'  => 'price_color',
      				'description' => esc_html__( 'Select custom price color.', 'sigma-core' ),
      				'group' => esc_html__( 'Style Options', 'sigma-core' ),
      			),
      			array(
      				'type'        => 'colorpicker',
      				'heading'     => esc_html__( 'Content Background Color', 'sigma-core' ),
      				'param_name'  => 'content_bg_color',
      				'description' => esc_html__( 'Select custom content background color.', 'sigma-core' ),
      				'group' => esc_html__( 'Style Options', 'sigma-core' ),
      			),
      			array(
      				'type'        => 'colorpicker',
      				'heading'     => esc_html__( 'Button Color', 'sigma-core' ),
      				'param_name'  => 'button_color',
      				'description' => esc_html__( 'Select custom button color.', 'sigma-core' ),
      				'group' => esc_html__( 'Style Options', 'sigma-core' ),
      			),
      			array(
      				'type'        => 'colorpicker',
      				'heading'     => esc_html__( 'Button Background Color', 'sigma-core' ),
      				'param_name'  => 'btn_bg_color',
      				'description' => esc_html__( 'Select custom button background color.', 'sigma-core' ),
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
     * Products shortcode callback functions.
     */
    function shortcode_callback( $atts, $content = null, $handle = '' ) {
        $default_atts = array(
            'single-style'                => 'style-1',
            'prod_id'                     => '',
            'post_featured_image'         => '',
            'post_price'                  => '',
            'post_excerpt'                => '',
            'post_excerpt_length'         => 10,
            'show_cart_btn'               => '',
            'custom_image'                => '',
            'title_color'                 => '',
            'desc_color'                  => '',
            'price_color'                 => '',
            'content_bg_color'             => '',
            'button_color'               => '',
            'btn_bg_color'               => '',
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
            'post__in'  => array($atts['prod_id']),
        );
        $the_query = new WP_Query( $args );
        $inline_css                               = '';
        $sigma_shortcodes[ $handle ]['atts']      = $atts;
        $sigma_shortcodes[ $handle ]['the_query'] = $the_query;
        $sigma_shortcodes_class_unique            = 'sigma-single-product-' . mt_rand();
        $sigma_shortcodes[ $handle ]['unique-identifier'] = $sigma_shortcodes_class_unique;
        $sigma_shortcodes_classes                 = $this->handle . '_wrapper';
        $sigma_shortcodes_classes                 .= ' ' . $sigma_shortcodes_class_unique;
        $sigma_shortcodes_classes                 .= ' ' . $this->wrraper_class;
        if ( $atts['el_class'] ) {
            $sigma_shortcodes_classes .= ' ' . $atts['el_class'];
        }

        //Color
    		if ( $atts[ 'title_color' ] ) {
    			$inline_css .= "." . $sigma_shortcodes_class_unique . " .product-of-month .product-descr h5 a{ color: " . $atts[ 'title_color' ] . ";}";
    		}
    		if ( $atts[ 'desc_color' ] ) {
    			$inline_css .= "." . $sigma_shortcodes_class_unique . " .product-of-month .product-descr p { color: " . $atts[ 'desc_color' ] . ";}";
    		}
    		if ( $atts[ 'price_color' ] ) {
    			$inline_css .= "." . $sigma_shortcodes_class_unique . " .product-of-month .product-descr .price { color: " . $atts[ 'price_color' ] . ";}";
    		}
    		if ( $atts[ 'content_bg_color' ] ) {
    			$inline_css .= "." . $sigma_shortcodes_class_unique . " .product-of-month{ background-color: " . $atts[ 'content_bg_color' ] . ";}";
    		}
    		if ( $atts[ 'button_color' ] ) {
    			$inline_css .= "." . $sigma_shortcodes_class_unique . " .product-of-month .product-descr .button { color: " . $atts[ 'button_color' ] . ";}";
    		}
    		if ( $atts[ 'btn_bg_color' ] ) {
    			$inline_css .= "." . $sigma_shortcodes_class_unique . " .product-of-month .product-descr .button { background-color: " . $atts[ 'btn_bg_color' ] . ";}";
    			$inline_css .= "." . $sigma_shortcodes_class_unique . " .product-of-month .product-descr .button:before { background-color: #0000003b;}";
    		}

        $sigma_shortcodes_classes .= ' woocommerce single-product-' . $atts['single-style'];
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
            <?php sigmacore_get_vc_shortcode_template( 'single-product/content' ); ?>
        </div>
        <?php
        return ob_get_clean();
    }
}
new Sigma_Vc_Single_Product_Shortcode_Fields();
