<?php
/**
 * Sigma Team shortcode
 *
 * @package Sigma Core
 */

/**
 * Team shortcode.
 */
class Sigma_Vc_Team_Shortcode_Fields {

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

		$this->title         = esc_html__( 'Team', 'sigma-core' );
		$this->handle        = 'sigma_team';
		$this->description   = esc_html__( 'Use this shortcode to show team.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrapper_class = 'sigma-shortcode-wrapper';

		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}

	/**
	 * Team shortcode mapping.
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
				'heading'     => esc_html__( 'Team Style', 'sigma-core' ),
				'description' => esc_html__( 'Select Style.', 'sigma-core' ),
				'param_name'  => 'style',
				'value'       => array(
					esc_html__( 'Style 1', 'sigma-core' ) => 'style-1',
					esc_html__( 'Style 2', 'sigma-core' ) => 'style-2',
					esc_html__( 'Style 3', 'sigma-core' ) => 'style-3',
					esc_html__( 'Style 4', 'sigma-core' ) => 'style-4',
					esc_html__( 'Style 5', 'sigma-core' ) => 'style-5',
					esc_html__( 'Style 6', 'sigma-core' ) => 'style-6',
					esc_html__( 'Style 7', 'sigma-core' ) => 'style-7',
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
				'heading'     => esc_html__( 'Team Count', 'sigma-core' ),
				'param_name'  => 'post_per_page',
				'description' => esc_html__( 'Enter number of team to display.', 'sigma-core' ),
				'admin_label' => true
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Categories', 'sigma-core' ),
				'param_name'  => 'post_categories',
				'description' => esc_html__( 'Select categories to display on front. it will show all the post if no categories selected.', 'sigma-core' ),
				'value'       => sigmacore_get_tax_terms('team-category'),
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
				'heading'     => esc_html__( 'Description Color', 'sigma-core' ),
				'param_name'  => 'description_color',
				'description' => esc_html__( 'Select custom description color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-2', 'style-3'],
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
					'value'   => ['style-4', 'style-6', 'style-7'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Block Hover Background Color', 'sigma-core' ),
				'param_name'  => 'block_hover_bg_color',
				'description' => esc_html__( 'Select custom block hover background color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-4'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Social Background Color', 'sigma-core' ),
				'param_name'  => 'social_bg_color',
				'description' => esc_html__( 'Select custom social background color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-1', 'style-2', 'style-3', 'style-7'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Social Hover Background Color', 'sigma-core' ),
				'param_name'  => 'social_hover_bg_color',
				'description' => esc_html__( 'Select custom social hover background color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-1', 'style-2', 'style-5', 'style-6', 'style-7'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Social Icon Color', 'sigma-core' ),
				'param_name'  => 'social_icon_color',
				'description' => esc_html__( 'Select custom social icon color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),

			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Social Hover Icon Color', 'sigma-core' ),
				'param_name'  => 'social_hover_icon_color',
				'description' => esc_html__( 'Select custom social hover icon color.', 'sigma-core' ),
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
		$fields = sigmacore_get_layout_options( $fields, ['grid', 'slider', 'isotope'], 'team-category' );

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
	 * Team shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {

		$default_atts = array(
			'layout'                      => 'slider',
			'style'                       => 'style-1',
			'section_sub_title'           => '',
			'section_title'           		=> '',
			'post_per_page'               => '',
			'post_categories'             => '',
			'post_order'                  => '',
			'post_orderby'                => '',
			'css_animation'               => '',
			'title_color'               	=> '',
			'designation_color'           => '',
			'description_color'           => '',
			'block_bg_color'              => '',
			'block_hover_bg_color'        => '',
			'social_bg_color'             => '',
			'social_hover_bg_color'       => '',
			'social_icon_color'           => '',
			'social_hover_icon_color'     => '',
			'el_id'                       => '',
			'el_class'                    => '',
			'css'                         => '',
			'handle'                      => $handle,
		);

		$default_atts = sigmacore_get_layout_attributes($default_atts, ['grid', 'slider', 'isotope'] );

		$atts = shortcode_atts( $default_atts, $atts, $handle );

		global $sigma_shortcodes, $sigma_vc_inline_css;

		$args = array(
			'post_type'           => 'team',
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
						'taxonomy' => 'team-category',
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
		$sigma_shortcodes_class_unique              = 'sigma-team-' . mt_rand();
		$sigma_shortcodes_classes                   = $this->handle . '_wrapper';
		$sigma_shortcodes_classes                   .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes                   .= ' ' . $this->wrapper_class;

		if ( $atts[ 'el_class' ] ) {
			$sigma_shortcodes_classes .= ' ' . $atts[ 'el_class' ];
		}

		$sigma_shortcodes_classes                 .= ' team-layout-' . $atts[ 'layout' ];

		//Color
		if ( $atts[ 'title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-1 .teammember-title a { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-2 .teammember-title a { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-3 .sigma_post-title a { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-4 .sigma_team-body h5 a { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-5 .sigma_team-body h5 a { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-6 .widget-about-author-body h5 { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-teammember.sigma-team-style-7 .sigma_team-body h5 { color: " . $atts[ 'title_color' ] . ";}";
		}
		if ( $atts[ 'designation_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-1 h5.sigma-teammember-designation { color: " . $atts[ 'designation_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-2 .sigma-teammember-designation { color: " . $atts[ 'designation_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-3 .sigma-teammember-designation { color: " . $atts[ 'designation_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-4 .sigma_team-body h5 { color: " . $atts[ 'designation_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-5 .sigma_team-body p { color: " . $atts[ 'designation_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-6 .widget-about-author-body p { color: " . $atts[ 'designation_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-teammember.sigma-team-style-7 .sigma_team-body p { color: " . $atts[ 'designation_color' ] . ";}";
		}
		if ( $atts[ 'description_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-2 .sigma-teammember-designation + p { color: " . $atts[ 'description_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-2 p { color: " . $atts[ 'description_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-3 .sigma-teammember-content-cover p { color: " . $atts[ 'description_color' ] . ";}";
		}
		if ( $atts[ 'block_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-4 .sigma_team-body { background-color: " . $atts[ 'block_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-6 .widget-about-author-body { background-color: " . $atts[ 'block_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-teammember.sigma-team-style-7 { background-color: " . $atts[ 'block_bg_color' ] . ";}";
		}
		if ( $atts[ 'block_hover_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-4:hover .sigma_team-body { background-color: " . $atts[ 'block_hover_bg_color' ] . ";}";
		}
		if ( $atts[ 'social_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-1 .sigma-teammember-social-profiles li.share-main a { background-color: " . $atts[ 'social_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-1 .sigma-teammember-social-profiles li a { background-color: " . $atts[ 'social_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-2 .sigma-teammember-social-profiles li a { background-color: " . $atts[ 'social_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-3 .sigma-teammember-social-profiles { background-color: " . $atts[ 'social_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-teammember.sigma-team-style-7 .sigma_team-thumb .trigger-team-socials { background-color: " . $atts[ 'social_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-teammember.sigma-team-style-7 .sigma_sm.visible li a { background-color: " . $atts[ 'social_bg_color' ] . ";}";
		}
		if ( $atts[ 'social_hover_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-1 .sigma-teammember-social-profiles li.share-main a:hover { background-color: " . $atts[ 'social_hover_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-1 .sigma-teammember-social-profiles li a:hover { background-color: " . $atts[ 'social_hover_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-2 .sigma-teammember-social-profiles li a:hover { background-color: " . $atts[ 'social_hover_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-5 .sigma_team-thumb .sigma_team-sm .sigma_sm li a:hover { background-color: " . $atts[ 'social_hover_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-5 .sigma_team-thumb .sigma_team-sm .sigma_sm li a:hover { border-color: " . $atts[ 'social_hover_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-6 .widget-about-author-body .sigma_sm li a:hover { background-color: " . $atts[ 'social_hover_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-6 .widget-about-author-body .sigma_sm li a:hover { border-color: " . $atts[ 'social_hover_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-teammember.sigma-team-style-7 .sigma_team-thumb .trigger-team-socials:hover { background-color: " . $atts[ 'social_hover_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-teammember.sigma-team-style-7 .sigma_sm.visible li a:hover { background-color: " . $atts[ 'social_hover_bg_color' ] . ";}";
		}
		if ( $atts[ 'social_icon_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-1 .sigma-teammember-social-profiles li.share-main a { color: " . $atts[ 'social_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-1 .sigma-teammember-social-profiles li a { color: " . $atts[ 'social_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-2 .sigma-teammember-social-profiles li a { color: " . $atts[ 'social_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-3 .sigma-teammember-social-profiles li a { color: " . $atts[ 'social_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-4 .sigma_team-body .sigma_team-sm .sigma_sm li a { color: " . $atts[ 'social_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-5 .sigma_team-thumb .sigma_team-sm .sigma_sm li a { color: " . $atts[ 'social_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-5 .sigma_team-thumb .sigma_team-sm .sigma_sm li a { border-color: " . $atts[ 'social_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-6 .widget-about-author-body .sigma_sm li a { color: " . $atts[ 'social_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-6 .widget-about-author-body .sigma_sm li a { border-color: " . $atts[ 'social_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-teammember.sigma-team-style-7 .sigma_team-thumb .trigger-team-socials { color: " . $atts[ 'social_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-teammember.sigma-team-style-7 .sigma_sm.visible li a { color: " . $atts[ 'social_icon_color' ] . ";}";
		}
		if ( $atts[ 'social_hover_icon_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-1 .sigma-teammember-social-profiles li.share-main a:hover { color: " . $atts[ 'social_hover_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-1 .sigma-teammember-social-profiles li a:hover { color: " . $atts[ 'social_hover_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-2 .sigma-teammember-social-profiles li a:hover { color: " . $atts[ 'social_hover_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-3 .sigma-teammember-social-profiles li a:hover { color: " . $atts[ 'social_hover_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-4 .sigma_team-body .sigma_team-sm .sigma_sm li a:hover { color: " . $atts[ 'social_hover_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-5 .sigma_team-thumb .sigma_team-sm .sigma_sm li a:hover { color: " . $atts[ 'social_hover_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-team-style-6 .widget-about-author-body .sigma_sm li a:hover { color: " . $atts[ 'social_hover_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-teammember.sigma-team-style-7 .sigma_team-thumb .trigger-team-socials:hover { color: " . $atts[ 'social_hover_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-teammember.sigma-team-style-7 .sigma_sm.visible li a:hover { color: " . $atts[ 'social_hover_icon_color' ] . ";}";
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
			<?php sigmacore_get_vc_shortcode_template( 'team/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}

new Sigma_Vc_Team_Shortcode_Fields();
