<?php
/**
 * Sigma blog shortcode
 *
 * @package Sigma Core
 */
/**
 * Blog shortcode.
 */
class Sigma_Vc_Products_Shortcode_Fields
{
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
    function __construct()
    {
        $this->title = esc_html__('Products', 'sigma-core');
        $this->handle = 'sigma_products';
        $this->description = esc_html__('Use this shortcode to show products.', 'sigma-core');
        $this->category = esc_html__('Sigma', 'sigma-core');
        $this->wrapper_class = 'sigma-shortcode-wrapper';
        add_action('vc_before_init', array($this, 'shortcode_fields'));
        add_shortcode($this->handle, array($this, 'shortcode_callback'));
    }

    /**
     * Products shortcode mapping.
     *
     * @return void
     */
    function shortcode_fields()
    {

        $fields = array(
            array(
                'type' => 'dropdown',
                'param_name' => 'layout',
                'heading' => esc_html__('Layout', 'sigma-core'),
                'description' => esc_html__('Select layout.', 'sigma-core'),
                'std' => 'slider',
                'value' => sigmacore_get_available_layouts()
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Product Style', 'sigma-core'),
                'param_name' => 'style',
                'description' => esc_html__('Select style.', 'sigma-core'),
                'value' => array(
                    esc_html__('Style 1', 'sigma-core') => 'style-1',
                    esc_html__('Style 2', 'sigma-core') => 'style-2',
                    esc_html__('Style 3', 'sigma-core') => 'style-3',
                    esc_html__('Style 4', 'sigma-core') => 'style-4',
                    esc_html__('Style 5', 'sigma-core') => 'style-5',
                    esc_html__('Style 6', 'sigma-core') => 'style-6',
                    esc_html__('Style 7', 'sigma-core') => 'style-7',
                    esc_html__('Style 8', 'sigma-core') => 'style-8',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Section Heading Title', 'sigma-core'),
                'param_name' => 'section_title',
                'dependency' => array(
                    'element' => 'layout',
                    'value' => 'slider',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Section Heading Sub-title', 'sigma-core'),
                'param_name' => 'section_sub_title',
                'dependency' => array(
                    'element' => 'layout',
                    'value' => 'slider',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Post Count', 'sigma-core'),
                'param_name' => 'post_per_page',
                'description' => esc_html__('Enter number of posts to display.', 'sigma-core'),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Categories', 'sigma-core'),
                'param_name' => 'post_categories',
                'description' => esc_html__('Select categories to display on front. it will show all the post if no categories selected.', 'sigma-core'),
                'value' => sigmacore_get_tax_terms('product_cat'),
                'dependency' => array(
                    'element' => 'layout',
                    'value' => array('slider', 'grid'),
                ),
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'post_order',
                'heading' => esc_html__('Order', 'sigma-core'),
                'description' => esc_html__('Select display order.', 'sigma-core'),
                'std' => 'DESC',
                'value' => array(
                    esc_html__('Ascending', 'sigma-core') => 'ASC',
                    esc_html__('Descending', 'sigma-core') => 'DESC',
                ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'post_orderby',
                'heading' => esc_html__('Orderby ', 'sigma-core'),
                'description' => esc_html__('Select order by parameter.', 'sigma-core'),
                'std' => 'date',
                'value' => array(
                    esc_html__('ID', 'sigma-core') => 'ID',
                    esc_html__('Title', 'sigma-core') => 'title',
                    esc_html__('Date', 'sigma-core') => 'date',
                    esc_html__('Modified Date', 'sigma-core') => 'modified',
                ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Enable Price?', 'sigma-core'),
                'param_name' => 'show_price',
                'value' => array(esc_html__('Yes', 'sigma-core') => 'yes'),
                'std' => 'yes',
                'description' => esc_html__('Select this checkbox to show the product price', 'sigma-core'),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'dependency' => array(
                    'element' => 'style',
                    'value' => ['style-1', 'style-2', 'style-4', 'style-5', 'style-6', 'style-8'],
                ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Enable Star Rating?', 'sigma-core'),
                'param_name' => 'show_rating',
                'value' => array(esc_html__('Yes', 'sigma-core') => 'yes'),
                'std' => 'yes',
                'description' => esc_html__('Select this checkbox to show the product rating (If available)', 'sigma-core'),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'dependency' => array(
                    'element' => 'style',
                    'value' => ['style-1', 'style-2', 'style-4', 'style-5', 'style-7', 'style-8'],
                ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Enable Featured badge?', 'sigma-core'),
                'param_name' => 'show_featured_badge',
                'value' => array(esc_html__('Yes', 'sigma-core') => 'yes'),
                'std' => 'yes',
                'description' => esc_html__('Select this checkbox to show featured badge (If available)', 'sigma-core'),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'dependency' => array(
                    'element' => 'style',
                    'value' => ['style-1', 'style-2', 'style-5',  'style-6',  'style-7', 'style-8'],
                ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Enable Sale Badge?', 'sigma-core'),
                'param_name' => 'show_sale_discount',
                'value' => array(esc_html__('Yes', 'sigma-core') => 'yes'),
                'std' => 'yes',
                'description' => esc_html__('Select this checkbox to show product sale badge (If available)', 'sigma-core'),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'dependency' => array(
                    'element' => 'style',
                    'value' => ['style-1', 'style-2', 'style-4', 'style-5', 'style-6',  'style-7', 'style-8'],
                ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Enable Add to Cart?', 'sigma-core'),
                'param_name' => 'show_atc',
                'value' => array(esc_html__('Yes', 'sigma-core') => 'yes'),
                'std' => 'yes',
                'description' => esc_html__('Select this checkbox to show the Add to Cart button', 'sigma-core'),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'dependency' => array(
                    'element' => 'style',
                    'value' => ['style-1', 'style-4', 'style-5', 'style-7', 'style-8'],
                ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Enable Excerpt?', 'sigma-core'),
                'param_name' => 'show_excerpt',
                'value' => array(esc_html__('Yes', 'sigma-core') => 'yes'),
                'std' => 'yes',
                'description' => esc_html__('Select this checkbox to show the product excerpt', 'sigma-core'),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Excerpt Length', 'sigma-core'),
                'param_name' => 'excerpt_length',
                'description' => esc_html__('Number of words to show in the excerpt', 'sigma-core'),
                'dependency' => array(
                    'element' => 'show_excerpt',
                    'value' => 'yes',
                ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Product on sale?', 'sigma-core'),
                'param_name' => 'on_sale_only',
                'value' => array(esc_html__('Yes', 'sigma-core') => 'yes'),
                'description' => esc_html__('Select this checkbox to only show the products that are on sale', 'sigma-core'),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Featured Products only?', 'sigma-core'),
                'param_name' => 'featured_only',
                'value' => array(esc_html__('Yes', 'sigma-core') => 'yes'),
                'description' => esc_html__('Select this checkbox to only show the featured products', 'sigma-core'),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
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
              'dependency' => array(
                  'element' => 'style',
                  'value' => ['style-1', 'style-2', 'style-4', 'style-5', 'style-6', 'style-7', 'style-8'],
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
                  'value' => ['style-1', 'style-4',  'style-7', 'style-8'],
              ),
            ),
            array(
              'type'        => 'colorpicker',
              'heading'     => esc_html__( 'Button Background Color', 'sigma-core' ),
              'param_name'  => 'button_bg_color',
              'description' => esc_html__( 'Select custom button background color.', 'sigma-core' ),
              'group' => esc_html__( 'Style Options', 'sigma-core' ),
              'dependency' => array(
                  'element' => 'style',
                  'value' => ['style-1', 'style-4',  'style-7', 'style-8'],
              ),
            ),
            array(
              'type'        => 'colorpicker',
              'heading'     => esc_html__( 'Controls Background Color', 'sigma-core' ),
              'param_name'  => 'controls_bg_color',
              'description' => esc_html__( 'Select custom controls background color.', 'sigma-core' ),
              'group' => esc_html__( 'Style Options', 'sigma-core' ),
              'dependency' => array(
                  'element' => 'style',
                  'value' => ['style-1', 'style-2', 'style-4', 'style-6', 'style-7', 'style-8'],
              ),
            ),
            array(
              'type'        => 'colorpicker',
              'heading'     => esc_html__( 'Controls Color', 'sigma-core' ),
              'param_name'  => 'controls_color',
              'description' => esc_html__( 'Select custom controls color.', 'sigma-core' ),
              'group' => esc_html__( 'Style Options', 'sigma-core' ),
              'dependency' => array(
                  'element' => 'style',
                  'value' => ['style-1', 'style-2', 'style-4', 'style-5',  'style-6', 'style-7', 'style-8'],
              ),
            ),
            array(
              'type'        => 'colorpicker',
              'heading'     => esc_html__( 'Controls Hover Background Color', 'sigma-core' ),
              'param_name'  => 'controls_hover_bg_color',
              'description' => esc_html__( 'Select custom controls hover background color.', 'sigma-core' ),
              'group' => esc_html__( 'Style Options', 'sigma-core' ),
              'dependency' => array(
                  'element' => 'style',
                  'value' => ['style-1', 'style-2', 'style-4', 'style-6', 'style-7', 'style-8'],
              ),
            ),
            array(
              'type'        => 'colorpicker',
              'heading'     => esc_html__( 'Controls Hover Color', 'sigma-core' ),
              'param_name'  => 'controls_hover_color',
              'description' => esc_html__( 'Select custom controls hover color.', 'sigma-core' ),
              'group' => esc_html__( 'Style Options', 'sigma-core' ),
              'dependency' => array(
                  'element' => 'style',
                  'value' => ['style-1', 'style-2', 'style-4', 'style-5',  'style-6', 'style-7', 'style-8'],
              ),
            ),
            array(
              'type'        => 'colorpicker',
              'heading'     => esc_html__( 'Badge Color', 'sigma-core' ),
              'param_name'  => 'badge_color',
              'description' => esc_html__( 'Select custom badge color.', 'sigma-core' ),
              'group' => esc_html__( 'Style Options', 'sigma-core' ),
            ),
            array(
              'type'        => 'colorpicker',
              'heading'     => esc_html__( 'Badge Background Color', 'sigma-core' ),
              'param_name'  => 'badge_bg_color',
              'description' => esc_html__( 'Select custom badge background color.', 'sigma-core' ),
              'group' => esc_html__( 'Style Options', 'sigma-core' ),
            ),
            array(
              'type'        => 'colorpicker',
              'heading'     => esc_html__( 'Link Color', 'sigma-core' ),
              'param_name'  => 'link_color',
              'description' => esc_html__( 'Select custom link color.', 'sigma-core' ),
              'group' => esc_html__( 'Style Options', 'sigma-core' ),
              'dependency' => array(
                  'element' => 'style',
                  'value' => ['style-3', 'style-2', 'style-5'],
              ),
            ),
            array(
              'type'        => 'colorpicker',
              'heading'     => esc_html__( 'Block Background Color', 'sigma-core' ),
              'param_name'  => 'block_bg_color',
              'description' => esc_html__( 'Select custom block background color.', 'sigma-core' ),
              'group' => esc_html__( 'Style Options', 'sigma-core' ),
              'dependency' => array(
                  'element' => 'style',
                  'value' => ['style-1', 'style-2', 'style-4', 'style-6', 'style-8'],
              ),
            ),
            vc_map_add_css_animation(),
            array(
                'type' => 'el_id',
                'heading' => esc_html__('Element ID', 'sigma-core'),
                'param_name' => 'el_id',
                /* translators: 1: anchor tag start, 2: anchor tag end */
                'description' => sprintf(esc_html__('Enter element ID (Note: make sure it is unique and valid according to %1$sw3c specification%2$s).', 'sigma-core'), '<a href="https://www.w3schools.com/tags/att_global_id.asp" target="_self">', '</a>'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra class name', 'sigma-core'),
                'param_name' => 'el_class',
                'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'sigma-core'),
            ),
            array(
                'type' => 'css_editor',
                'heading' => esc_html__('CSS box', 'sigma-core'),
                'param_name' => 'css',
                'group' => esc_html__('Design Options', 'sigma-core'),
            ),
        );

        // This function will add all of the layout options into the fields
        $fields = sigmacore_get_layout_options($fields, ['grid', 'slider', 'isotope'], 'product_cat');

        // Shortcode Params
        $params = array(
            'name' => $this->title,
            'base' => $this->handle,
            'category' => $this->category,
            'description' => $this->description,
            'class' => $this->wrapper_class,
            'params' => $fields,
        );
        vc_map($params);
    }

    /**
     * Product shortcode callback functions.
     */
    function shortcode_callback($atts, $content = null, $handle = '')
    {
        $default_atts = array(
          'style' => 'style-1',
          'layout' => 'slider',
          'post_per_page' => '',
          'post_categories' => '',
          'section_sub_title' => '',
          'section_title' => '',
          'show_rating' => 'yes',
          'show_price' => 'yes',
          'show_sale_discount' => 'yes',
          'show_featured_badge' => 'yes',
          'show_atc' => 'yes',
          'show_excerpt' => 'yes',
          'excerpt_length' => '',
          'on_sale_only' => '',
          'featured_only' => '',
          'post_order' => '',
          'post_orderby' => '',
          'title_color' => '',
          'description_color' => '',
          'price_color' => '',
          'button_color' => '',
          'button_bg_color' => '',
          'controls_bg_color' => '',
          'controls_color' => '',
          'controls_hover_bg_color' => '',
          'controls_hover_color' => '',
          'badge_color' => '',
          'badge_bg_color' => '',
          'link_color' => '',
          'block_bg_color' => '',
          'css_animation' => '',
          'el_id' => '',
          'el_class' => '',
          'css' => '',
          'handle' => $handle,
        );

        $default_atts = sigmacore_get_layout_attributes($default_atts, ['grid', 'slider', 'isotope']);

        $atts = shortcode_atts($default_atts, $atts, $handle);

        global $sigma_shortcodes, $sigma_vc_inline_css;

        $args = array(
            'post_type' => 'product',
            'posts_per_page' => $atts['post_per_page'],
            'post_status' => array('publish'),
            'ignore_sticky_posts' => true,
            'order' => $atts['post_order'],
            'orderby' => $atts['post_orderby'],
        );

        $tax_query = [];

        $tax_query[] = array(
            array(
                'taxonomy' => 'product_visibility',
                'terms' => array('exclude-from-catalog'),
                'field' => 'name',
                'operator' => 'NOT IN',
            ),
        );

        if ($atts['post_categories']) {
            $categories_array = explode(',', $atts['post_categories']);
            if (is_array($categories_array) && $categories_array) {
                $tax_query[] = array(
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' => $categories_array,
                );
            }
        }

        if ($atts['featured_only'] == 'yes') {
            $tax_query[] = array(
                'taxonomy' => 'product_visibility',
                'field' => 'name',
                'terms' => 'featured',
                'operator' => 'IN',
            );
            $tax_query[] = array(
                'taxonomy' => 'product_visibility',
                'terms' => array('exclude-from-catalog'),
                'field' => 'name',
                'operator' => 'NOT IN',
            );
        }

        if ($atts['on_sale_only'] == 'yes') {
            $args['meta_query'] = array(
                'relation' => 'OR',
                array( // Simple products type
                    'key' => '_sale_price',
                    'value' => 0,
                    'compare' => '>',
                    'type' => 'numeric'
                ),
                array( // Variable products type
                    'key' => '_min_variation_sale_price',
                    'value' => 0,
                    'compare' => '>',
                    'type' => 'numeric'
                )
            );
        }

        $args['tax_query'] = $tax_query;

        $the_query = new WP_Query($args);
        if (!$the_query->have_posts()) {
            return esc_html__('No Products found', 'sigma-core');
        }

        $sigma_shortcodes[$handle]['atts'] = $atts;
        $sigma_shortcodes[$handle]['the_query'] = $the_query;
        $sigma_shortcodes_class_unique = 'sigma-products-' . mt_rand();
        $sigma_shortcodes_classes = $this->handle . '_wrapper';
        $sigma_shortcodes_classes .= ' woocommerce';
        $sigma_shortcodes_classes .= ' ' . $sigma_shortcodes_class_unique;
        $sigma_shortcodes_classes .= ' ' . $this->wrapper_class;

        if ($atts['el_class']) {
            $sigma_shortcodes_classes .= ' ' . $atts['el_class'];
        }

        $sigma_shortcodes_classes .= ' products-' . $atts['style'];


        //Color
        if ( $atts[ 'title_color' ] ) {
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-1 .sigma_product-body h5 a { color: " . $atts[ 'title_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-2 .sigma_product-body h5 a { color: " . $atts[ 'title_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-3 .sigma_product-inner .sigma_product-body h5 a { color: " . $atts[ 'title_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-4 .sigma_product-inner .sigma_product-body h5 a { color: " . $atts[ 'title_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-5 .sigma_product-body h5 a { color: " . $atts[ 'title_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-6 .sigma_product-body h5 a { color: " . $atts[ 'title_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-7 .sigma_product-body .sigma_product-rating-wrapper h5 a { color: " . $atts[ 'title_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-8 .sigma_product-body h5 a { color: " . $atts[ 'title_color' ] . ";}";
        }
        if ( $atts[ 'description_color' ] ) {
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-1 .sigma_product-body p { color: " . $atts[ 'description_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-2 .sigma_product-body p { color: " . $atts[ 'description_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-3 .sigma_product-inner .sigma_product-body p { color: " . $atts[ 'description_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-4 .sigma_product-inner .sigma_product-body p { color: " . $atts[ 'description_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-5 .sigma_product-inner .sigma_product-body p { color: " . $atts[ 'description_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-6 .sigma_product-inner .sigma_product-body p { color: " . $atts[ 'description_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-7 .sigma_product-body p { color: " . $atts[ 'description_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-8 .sigma_product-body p { color: " . $atts[ 'description_color' ] . ";}";
        }
        if ( $atts[ 'price_color' ] ) {
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce div.product.style-1 span.price { color: " . $atts[ 'price_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce div.product.style-1 span.price ins { color: " . $atts[ 'price_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce div.product.style-2 span.price { color: " . $atts[ 'price_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce div.product.style-2 span.price ins { color: " . $atts[ 'price_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce div.product.style-4 span.price { color: " . $atts[ 'price_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce div.product.style-4 span.price ins { color: " . $atts[ 'price_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce div.product.style-5 span.price { color: " . $atts[ 'price_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce div.product.style-5 span.price ins { color: " . $atts[ 'price_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce div.product.style-6 span.price { color: " . $atts[ 'price_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce div.product.style-6 span.price ins { color: " . $atts[ 'price_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-7 .sigma_product-body .sigma_product-body-meta .price { color: " . $atts[ 'price_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-7 .sigma_product-body .sigma_product-body-meta .price ins{ color: " . $atts[ 'price_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce div.product.style-8 span.price { color: " . $atts[ 'price_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce div.product.style-8 span.price ins { color: " . $atts[ 'price_color' ] . ";}";
        }
        if ( $atts[ 'button_color' ] ) {
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-1 .sigma_product-body .button { color: " . $atts[ 'button_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-4 .sigma_product-body .button { color: " . $atts[ 'button_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-7 .sigma_product-inner .cart-hover .button { color: " . $atts[ 'button_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-8 .sigma_product-thumb .cart-hover a { color: " . $atts[ 'button_color' ] . ";}";
        }
        if ( $atts[ 'button_bg_color' ] ) {
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-1 .sigma_product-body .button { background-color: " . $atts[ 'button_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-1 .sigma_product-body .button:before { background-color: #00000038;}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-4 .sigma_product-body .button { background-color: " . $atts[ 'button_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-4 .sigma_product-body .button:before { background-color: #00000038;}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-7 .sigma_product-inner .cart-hover .button { background-color: " . $atts[ 'button_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-7 .sigma_product-inner .cart-hover .button:hover:before { background-color: #00000038;}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-8 .sigma_product-thumb .cart-hover a { background-color: " . $atts[ 'button_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-8 .sigma_product-thumb .cart-hover a:before{ background-color: #00000038;}";
        }
        if ( $atts[ 'controls_bg_color' ] ) {
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-1 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a { background-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-1 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a { border-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-2 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a { background-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-2 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a { border-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-4 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a { background-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-4 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a { border-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-6 .sigma_product-thumb .sigma_product-controls a { background-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-6 .sigma_product-thumb .sigma_product-controls a { border-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-6 .sigma_product-inner .sigma_product-controls .compare { background-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-6 .sigma_product-thumb .sigma_product-controls .button { background-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-6 .sigma_product-inner .sigma_product-controls .compare{ border-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls a{ background-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls .yith-wcwl-add-to-wishlist a{ background-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls .compare{ background-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls a{ border-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls .yith-wcwl-add-to-wishlist a{ border-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls .compare{ border-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-8 .sigma_product-thumb .sigma_product-controls a{ background-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-8 .sigma_product-thumb .sigma_product-controls a{ border-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-8 .sigma_product-thumb .sigma_product-controls .yith-wcwl-add-to-wishlist a{ background-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-8 .sigma_product-thumb .sigma_product-controls .yith-wcwl-add-to-wishlist a{ border-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-8 .sigma_product-thumb .sigma_product-controls .compare{ background-color: " . $atts[ 'controls_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-8 .sigma_product-thumb .sigma_product-controls .compare{ border-color: " . $atts[ 'controls_bg_color' ] . ";}";
        }
        if ( $atts[ 'controls_color' ] ) {
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-1 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a i { color: " . $atts[ 'controls_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-1 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a:before { color: " . $atts[ 'controls_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-2 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a i { color: " . $atts[ 'controls_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-2 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a:before { color: " . $atts[ 'controls_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-4 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a i { color: " . $atts[ 'controls_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-4 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a:before { color: " . $atts[ 'controls_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-5 .sigma_product-controls a i { color: " . $atts[ 'controls_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-5 .sigma_product-inner .sigma_product-controls .compare::before { color: " . $atts[ 'controls_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-6 .sigma_product-thumb .sigma_product-controls a i{ color: " . $atts[ 'controls_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-6 .sigma_product-inner .sigma_product-controls .compare:before{ color: " . $atts[ 'controls_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-6 .sigma_product-thumb .sigma_product-controls .button:before{ color: " . $atts[ 'controls_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls a i{ color: " . $atts[ 'controls_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls .compare:before{ color: " . $atts[ 'controls_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-8 .sigma_product-thumb .sigma_product-controls a i{ color: " . $atts[ 'controls_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-8 .sigma_product-thumb .sigma_product-controls .compare:before{ color: " . $atts[ 'controls_color' ] . ";}";
        }
        if ( $atts[ 'controls_hover_bg_color' ] ) {
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-1 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a:hover { background-color: " . $atts[ 'controls_hover_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-1 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a:hover { border-color: " . $atts[ 'controls_hover_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-2 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a:hover { background-color: " . $atts[ 'controls_hover_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-2 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a:hover { border-color: " . $atts[ 'controls_hover_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-4 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a:hover { background-color: " . $atts[ 'controls_hover_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-4 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a:hover { border-color: " . $atts[ 'controls_hover_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-6 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a:hover { background-color: " . $atts[ 'controls_hover_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-6 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a:hover { border-color: " . $atts[ 'controls_hover_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls a:hover{ background-color: " . $atts[ 'controls_hover_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls .yith-wcwl-add-to-wishlist a:hover{ background-color: " . $atts[ 'controls_hover_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls .compare:hover{ background-color: " . $atts[ 'controls_hover_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls a:hover{ border-color: " . $atts[ 'controls_hover_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls .yith-wcwl-add-to-wishlist a:hover{ border-color: " . $atts[ 'controls_hover_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls .compare:hover{ border-color: " . $atts[ 'controls_hover_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-8 .sigma_product-thumb .sigma_product-controls a:hover{ background-color: " . $atts[ 'controls_hover_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-8 .sigma_product-thumb .sigma_product-controls a:hover{ border-color: " . $atts[ 'controls_hover_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-8 .sigma_product-thumb .sigma_product-controls .yith-wcwl-add-to-wishlist a:hover{ background-color: " . $atts[ 'controls_hover_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-8 .sigma_product-thumb .sigma_product-controls .yith-wcwl-add-to-wishlist a:hover{ border-color: " . $atts[ 'controls_hover_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-8 .sigma_product-thumb .sigma_product-controls .compare:hover{ background-color: " . $atts[ 'controls_hover_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-8 .sigma_product-thumb .sigma_product-controls .compare:hover{ border-color: " . $atts[ 'controls_hover_bg_color' ] . ";}";
        }
        if ( $atts[ 'controls_hover_color' ] ) {
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-1 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a:hover i { color: " . $atts[ 'controls_hover_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-1 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a:hover:before { color: " . $atts[ 'controls_hover_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-2 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a:hover i { color: " . $atts[ 'controls_hover_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-2 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a:hover:before { color: " . $atts[ 'controls_hover_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-4 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a:hover i { color: " . $atts[ 'controls_hover_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-4 .sigma_product-inner .sigma_product-thumb .sigma_product-controls a:hover:before { color: " . $atts[ 'controls_hover_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-5 .sigma_product-controls a:hover i { color: " . $atts[ 'controls_hover_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-5 .sigma_product-inner .sigma_product-controls .compare:hover::before { color: " . $atts[ 'controls_hover_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-6 .sigma_product-thumb .sigma_product-controls a:hover i{ color: " . $atts[ 'controls_hover_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-6 .sigma_product-inner .sigma_product-controls .compare:hover:before{ color: " . $atts[ 'controls_hover_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-6 .sigma_product-thumb .sigma_product-controls .button:hover:before{ color: " . $atts[ 'controls_hover_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls a:hover i{ color: " . $atts[ 'controls_hover_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls .compare:hover:before{ color: " . $atts[ 'controls_hover_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-8 .sigma_product-thumb .sigma_product-controls a:hover i{ color: " . $atts[ 'controls_hover_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".woocommerce .sigma_product.style-8 .sigma_product-thumb .sigma_product-controls .compare:hover:before{ color: " . $atts[ 'controls_hover_color' ] . ";}";
        }
        if ( $atts[ 'badge_color' ] ) {
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product-badge.featured { color: " . $atts[ 'badge_color' ] . ";}";
        }
        if ( $atts[ 'badge_bg_color' ] ) {
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product-badge.featured { background-color: " . $atts[ 'badge_bg_color' ] . ";}";
        }
        if ( $atts[ 'link_color' ] ) {
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-2 .sigma_product-body::before { color: " . $atts[ 'link_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-3 .sigma_product-inner .sigma_product-body .sigma_product-link { color: " . $atts[ 'link_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-5 .sigma_product-thumb > .button { color: " . $atts[ 'link_color' ] . ";}";
        }
        if ( $atts[ 'block_bg_color' ] ) {
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-1 .sigma_product-body { background-color: " . $atts[ 'block_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-2 .sigma_product-body { background-color: " . $atts[ 'block_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-4 .sigma_product-body { background-color: " . $atts[ 'block_bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma_product.style-6 .sigma_product-inner .sigma_product-body { background-color: " . $atts[ 'block_bg_color' ] . ";}";
        }

        if ($atts['css_animation'] && 'none' !== $atts['css_animation']) {
            wp_enqueue_script('vc_waypoints');
            wp_enqueue_style('vc_animate-css');
            $sigma_shortcodes_classes .= ' wpb_animate_when_almost_visible wpb_' . $atts['css_animation'] . ' ' . $atts['css_animation'];
        }
        if (isset($atts['css']) && $atts['css']) {
            $sigma_shortcodes_classes .= ' ' . vc_shortcode_custom_css_class($atts['css'], ' ');
        }
        if ( $inline_css ) {
          $sigma_vc_inline_css[] = $inline_css;
          sigmacore_vc_add_inline_css(); // This is added in case the sigma_vc_inline failed to fetch the css
        }

        ob_start();
        ?>
        <div <?php echo ($atts['el_id']) ? 'id=' . esc_attr($atts["el_id"]) : ''; ?>
                class="<?php echo esc_attr($sigma_shortcodes_classes); ?>">
            <?php sigmacore_get_vc_shortcode_template('products/content'); ?>
        </div>
        <?php
        return ob_get_clean();
    }
}

new Sigma_Vc_Products_Shortcode_Fields();
