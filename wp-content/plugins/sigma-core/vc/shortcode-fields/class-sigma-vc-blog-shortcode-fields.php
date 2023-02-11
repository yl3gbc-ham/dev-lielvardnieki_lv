<?php
/**
 * Sigma blog shortcode
 *
 * @package Sigma Core
 */
/**
 * Blog shortcode.
 */
class Sigma_Vc_Blog_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Blog', 'sigma-core' );
		$this->handle        = 'sigma_blog';
		$this->description   = esc_html__( 'Use this shortcode to show posts.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrapper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}

	/**
	 * Blog shortcode mapping.
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
				'heading'     => esc_html__( 'Blog Style', 'sigma-core' ),
				'param_name'  => 'style',
				'description' => esc_html__( 'Select style.', 'sigma-core' ),
				'value'       => array(
					esc_html__( 'Style 1', 'sigma-core' ) => 'style-1',
					esc_html__( 'Style 2', 'sigma-core' ) => 'style-2',
					esc_html__( 'Style 3', 'sigma-core' ) => 'style-3',
					esc_html__( 'Style 4', 'sigma-core' ) => 'style-4',
					esc_html__( 'Style 5', 'sigma-core' ) => 'style-5',
					esc_html__( 'Style 6', 'sigma-core' ) => 'style-6',
					esc_html__( 'Style 7', 'sigma-core' ) => 'style-7',
					esc_html__( 'Style 8', 'sigma-core' ) => 'style-8',
					esc_html__( 'Style 9', 'sigma-core' ) => 'style-9',
					esc_html__( 'Style 10', 'sigma-core' ) => 'style-10',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Post Height', 'sigma-core' ),
				'param_name'  => 'post_height',
				'description' => esc_html__( 'Enter height that you wish to set for the posts (Don\'t change if youre not sure what this is) - Example: 500px', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => 'style-4',
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
				'value'       => sigmacore_get_tax_terms('category'),
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
				'param_name'       => 'post_featured_image',
				'description'      => esc_html__( 'Select this checkbox to show post featured image.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'std' => 'yes'
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Show Date?', 'sigma-core' ),
				'param_name'       => 'post_date',
				'description'      => esc_html__( 'Select this checkbox to show post date.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'std' => 'yes',
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
					'value'   => array('style-2', 'style-1', 'style-5', 'style-7', 'style-10'),
				),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Show Post Tags?', 'sigma-core' ),
				'param_name'       => 'show_post_tag',
				'description'      => esc_html__( 'Select this checkbox to show post tags.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'std' => 'yes',
				'dependency' => array(
					'element' => 'style',
					'value'   => 'style-9',
				),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Show Comments?', 'sigma-core' ),
				'param_name'       => 'post_comments',
				'description'      => esc_html__( 'Select this checkbox to show post comments.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'std' => 'yes',
				'dependency' => array(
					'element' => 'style',
					'value'   => array('style-2', 'style-1', 'style-8', 'style-9'),
				),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Show Author?', 'sigma-core' ),
				'param_name'       => 'post_author',
				'description'      => esc_html__( 'Select this checkbox to show post author.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'std' => 'yes',
				'dependency' => array(
					'element' => 'style',
					'value'   => array('style-3', 'style-1', 'style-8', 'style-9'),
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
					'value'   => array('style-3', 'style-1', 'style-5', 'style-7', 'style-9'),
				),
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
				'heading'     => esc_html__( 'Meta Color', 'sigma-core' ),
				'param_name'  => 'meta_color',
				'description' => esc_html__( 'Select custom meta color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-1', 'style-2', 'style-5', 'style-6', 'style-7', 'style-9', 'style-10'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Meta Icon Color', 'sigma-core' ),
				'param_name'  => 'meta_icon_color',
				'description' => esc_html__( 'Select custom meta icon color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-1', 'style-2', 'style-5', 'style-9'],
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
					'value'   => ['style-1', 'style-2'],
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
					'value'   => ['style-1', 'style-2'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Description Color', 'sigma-core' ),
				'param_name'  => 'description_color',
				'description' => esc_html__( 'Select custom description color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-1', 'style-2', 'style-3', 'style-5', 'style-6', 'style-7', 'style-9', 'style-10'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Author Text Color', 'sigma-core' ),
				'param_name'  => 'author_text_color',
				'description' => esc_html__( 'Select custom author text color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-1', 'style-3', 'style-8', 'style-9', 'style-10'],
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
					'value'   => ['style-1', 'style-3', 'style-4', 'style-5', 'style-6', 'style-7', 'style-9'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Link Background Color', 'sigma-core' ),
				'param_name'  => 'link_bg_color',
				'description' => esc_html__( 'Select custom link background color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-9'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Date Text Color', 'sigma-core' ),
				'param_name'  => 'date_text_color',
				'description' => esc_html__( 'Select custom text color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-3', 'style-4', 'style-5', 'style-6', 'style-7', 'style-8', 'style-9'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Date Background Color', 'sigma-core' ),
				'param_name'  => 'date_text_bg_color',
				'description' => esc_html__( 'Select custom text color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-5', 'style-6', 'style-7', 'style-8', 'style-9'],
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
					'value'   => ['style-1', 'style-2', 'style-3', 'style-5', 'style-9'],
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
		$fields = sigmacore_get_layout_options( $fields, ['grid', 'slider', 'isotope'], 'category' );

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
	 * Blog shortcode callback functions.
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
			'post_featured_image'					=> 'yes',
			'post_date'										=> 'yes',
			'show_post_cat'								=> 'yes',
			'show_post_tag'								=> 'yes',
			'post_comments'								=> 'yes',
			'post_author'									=> 'yes',
			'read_more'										=> 'yes',
			'post_excerpt'								=> 'yes',
			'post_excerpt_length'					=> '',
			'post_order'                  => '',
			'post_orderby'                => '',
			'title_color'                	=> '',
			'meta_color'                	=> '',
			'meta_icon_color'             => '',
			'category_color'              => '',
			'category_bg_color'           => '',
			'description_color'           => '',
			'author_text_color'           => '',
			'link_color'                	=> '',
			'link_bg_color'               => '',
			'date_text_color'             => '',
			'date_text_bg_color'          => '',
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
			'post_type'           => 'post',
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
						'taxonomy' => 'category',
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
		$sigma_shortcodes_class_unique            = 'sigma-blog-' . mt_rand();
		$sigma_shortcodes_classes                 = $this->handle . '_wrapper';
		$sigma_shortcodes_classes                 .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes                 .= ' ' . $this->wrapper_class;

		if ( $atts['el_class'] ) {
			$sigma_shortcodes_classes .= ' ' . $atts['el_class'];
		}

		if ( $atts[ 'post_height' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-4.sigma-post .sigma-post-wrapper{ height: " . $atts[ 'post_height' ] . ";}";
		}
		//Color
		if ( $atts[ 'title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma-shortcode-wrapper .sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner .entry-title a { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-2 .sigma-post-wrapper .sigma-post-inner .entry-title a { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-3 .sigma-post-wrapper .sigma-post-inner .entry-title a { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-4.has-post-thumbnail .sigma-post-wrapper .entry-title a { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-5 .sigma-post-inner .entry-title a { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-6 .sigma-post-inner .sigma-post-meta .entry-title a { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-7 .sigma-post-inner .sigma-post-meta .entry-title a { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post.sigma-post-style-8 .sigma-post-body .sigma-post-body-inner h5 a { color: " . $atts[ 'title_color' ] . " !important;}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post.sigma-post-style-9 .sigma_post-body h5 a { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-10 .sigma-post-wrapper .sigma-post-inner .entry-title a { color: " . $atts[ 'title_color' ] . ";}";
		}
		if ( $atts[ 'meta_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li a { color: " . $atts[ 'meta_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li span { color: " . $atts[ 'meta_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-2 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li .entry-meta a { color: " . $atts[ 'meta_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-2 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li .meta-comment span { color: " . $atts[ 'meta_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-5 .sigma-post-wrapper .sigma_post_categories .categories-list a { color: " . $atts[ 'meta_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post.sigma-post-style-9 .sigma_post-body .sigma_post-meta .tag-list a { color: " . $atts[ 'meta_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-6 .sigma-post-wrapper .sigma_post_categories .categories-list a { color: " . $atts[ 'meta_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-7 .sigma-post-wrapper .sigma_post_categories .categories-list a { color: " . $atts[ 'meta_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-10 .sigma-post-wrapper .sigma-post-inner .post-categories .categories-list a { color: " . $atts[ 'meta_color' ] . ";}";
		}
		if ( $atts[ 'meta_icon_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li a i { color: " . $atts[ 'meta_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li span i{ color: " . $atts[ 'meta_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-2 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li .entry-meta a i { color: " . $atts[ 'meta_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-2 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li .meta-comment i { color: " . $atts[ 'meta_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-5 .sigma-post-wrapper .sigma_post_categories .categories-list a:before { color: " . $atts[ 'meta_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post.sigma-post-style-9 .sigma_post-body .sigma_post-meta .tag-list a:before { color: " . $atts[ 'meta_color' ] . ";}";
		}
		if ( $atts[ 'category_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-wrapper .sigma_post_categories .categories-list a { color: " . $atts[ 'category_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-wrapper .sigma_post_categories .categories-list a { color: " . $atts[ 'category_color' ] . ";}";
		}
		if ( $atts[ 'category_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-wrapper .sigma_post_categories .categories-list a { background-color: " . $atts[ 'category_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-wrapper .sigma_post_categories .categories-list a { background-color: " . $atts[ 'category_bg_color' ] . ";}";
		}
		if ( $atts[ 'description_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner .entry-content { color: " . $atts[ 'description_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-2 .sigma-post-wrapper .sigma-post-inner .entry-content { color: " . $atts[ 'description_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-3 .sigma-post-wrapper .sigma-post-inner .entry-content { color: " . $atts[ 'description_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-5 .sigma-post-wrapper .sigma-post-inner .entry-content { color: " . $atts[ 'description_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-6 .sigma-post-inner .sigma-post-meta .entry-content { color: " . $atts[ 'description_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-7 .sigma-post-inner .sigma-post-meta .entry-content { color: " . $atts[ 'description_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post.sigma-post-style-9 .sigma_post-body .sigma-post-content p { color: " . $atts[ 'description_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-10 .sigma-post-wrapper .sigma-post-inner .entry-content { color: " . $atts[ 'description_color' ] . ";}";
		}
		if ( $atts[ 'author_text_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner footer.entry-footer .sigma_post_author .author.vcard a { color: " . $atts[ 'author_text_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-3 .sigma-post-wrapper .entry-meta-footer a { color: " . $atts[ 'author_text_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post.sigma-post-style-8 .sigma-post-body .sigma-post-body-inner .sigma_post-meta .author a { color: " . $atts[ 'author_text_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post.sigma-post-style-8 .sigma-post-body .sigma-post-body-inner .sigma_post-meta li .meta-comment a { color: " . $atts[ 'author_text_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post.sigma-post-style-9 .sigma_post-body .sigma_post-meta .author a { color: " . $atts[ 'author_text_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post.sigma-post-style-9 .sigma_post-body .sigma_post-meta li .meta-comment a { color: " . $atts[ 'author_text_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-10 .sigma-post-wrapper .sigma-post-inner .sigma-post-meta-footer li { color: " . $atts[ 'author_text_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-10 .sigma-post-wrapper .sigma-post-inner .sigma-post-meta-footer li span { color: " . $atts[ 'author_text_color' ] . ";}";
		}
		if ( $atts[ 'link_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner footer.entry-footer .post-read-more-link a { color: " . $atts[ 'link_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-3 .sigma-post-wrapper .sigma-post-inner footer.entry-footer .post-read-more-link a{ color: " . $atts[ 'link_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-4.has-post-thumbnail .sigma-post-inner footer.entry-footer .post-read-more-link a{ color: " . $atts[ 'link_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-4.has-post-thumbnail .sigma-post-inner footer.entry-footer .post-read-more-link a:before{ background-color: " . $atts[ 'link_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-5 .sigma-post-inner .btn-link a{ color: " . $atts[ 'link_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-6 .sigma-post-inner .sigma-post-footer .btn-link{ color: " . $atts[ 'link_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-7 .sigma-post-inner .sigma-post-footer .btn-link{ color: " . $atts[ 'link_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-7 .sigma-post-inner .sigma-post-footer .btn-link:before{ background-color: " . $atts[ 'link_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post.sigma-post-style-9 .sigma_post-body .sigma-post-content .sigma_btn-custom{ color: " . $atts[ 'link_color' ] . ";}";
		}
		if ( $atts[ 'link_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post.sigma-post-style-9 .sigma_post-body .sigma-post-content .sigma_btn-custom { background-color: " . $atts[ 'link_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post.sigma-post-style-9 .sigma_post-body .sigma-post-content .sigma_btn-custom:before { background-color: #ffffff0e;}";
		}
		if ( $atts[ 'date_text_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-3 .sigma-post-wrapper header .posted-on a { color: " . $atts[ 'date_text_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-4.has-post-thumbnail .sigma-post-wrapper header .posted-on a { color: " . $atts[ 'date_text_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-5 .sigma_post-thumb .sigma_post-date span { color: " . $atts[ 'date_text_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-6 .sigma_post-thumb .sigma_post-date { color: " . $atts[ 'date_text_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-7 .sigma_post-thumb .sigma_post-date { color: " . $atts[ 'date_text_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post.sigma-post-style-8 .sigma-post-body .sigma-post-body-inner .sigma_post-date a { color: " . $atts[ 'date_text_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post.sigma-post-style-9 .sigma_post-thumb .sigma_post-date a { color: " . $atts[ 'date_text_color' ] . ";}";
		}
		if ( $atts[ 'date_text_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-5 .sigma_post-thumb .sigma_post-date { background-color: " . $atts[ 'date_text_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-6 .sigma_post-thumb .sigma_post-date { background-color: " . $atts[ 'date_text_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post-style-7 .sigma_post-thumb .sigma_post-date { background-color: " . $atts[ 'date_text_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-post.sigma-post-style-8 .sigma-post-body .sigma-post-body-inner .sigma_post-date { background-color: " . $atts[ 'date_text_bg_color' ] . ";}";
		}
		if ( $atts[ 'block_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .testimonial-box h3 { color: " . $atts[ 'block_bg_color' ] . ";}";
		}

		$sigma_shortcodes_classes .= ' blog-' . $atts['style'];

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
			<?php sigmacore_get_vc_shortcode_template( 'blog/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Blog_Shortcode_Fields();
