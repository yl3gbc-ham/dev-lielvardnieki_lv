<?php
/**
 * Sigma Custom heading shortcode
 *
 * @package Sigma Core
 */

/**
 * Custom Heading shortcode.
 */
class Sigma_Vc_Custom_Heading_Shortcode_Fields {

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

		$this->title         = esc_html__( 'Custom Heading', 'sigma-core' );
		$this->handle        = 'sigma_custom_heading';
		$this->description   = esc_html__( 'Use this shortcode for section header.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrapper_class = 'sigma-shortcode-wrapper';

		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}

	/**
	 * Counter shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {
		$fields = array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Style', 'sigma-core' ),
				'param_name' => 'style',
				'value'      => array(
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
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Add icon?', 'sigma-core' ),
				'param_name' => 'add_icon',
				'dependency'  => array(
					'element' => 'style',
					'value'   => ['style-1', 'style-2', 'style-3', 'style-4','style-5'],
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Icon Type', 'sigma-core' ),
				'param_name' => 'icon_as',
				'value'      => array(
					esc_html__( 'Font', 'sigma-core' )   => 'font',
					esc_html__( 'Image', 'sigma-core' )  => 'image',
					esc_html__( 'Custom', 'sigma-core' ) => 'custom',
				),
				'dependency'  => array(
					'element' => 'add_icon',
					'value'   => 'true',
				),
			),
			array(
				'type'        => 'textarea_raw_html',
				'param_name'  => 'content',
				'value' => base64_encode( '<p>I am raw html block.<br/>Click edit button to change this html</p>' ),
				'heading'     => esc_html__( 'Custom Icon', 'sigma-core' ),
				'description' => esc_html__( 'Enter custom Icon.', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'icon_as',
					'value'   => 'custom',
				),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image', 'sigma-core' ),
				'param_name'  => 'icon_image',
				'value'       => '',
				'dependency'  => array(
					'element' => 'icon_as',
					'value'   => 'image',
				),
				'description' => esc_html__( 'Select image for icon.', 'sigma-core' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon library', 'sigma-core' ),
				'value' => array(
					esc_html__( 'Font Awesome 5', 'sigma-core' ) => 'fontawesome',
					esc_html__( 'Open Iconic', 'sigma-core' )    => 'openiconic',
					esc_html__( 'Typicons', 'sigma-core' )       => 'typicons',
					esc_html__( 'Entypo', 'sigma-core' )         => 'entypo',
					esc_html__( 'Linecons', 'sigma-core' )       => 'linecons',
					esc_html__( 'Mono Social', 'sigma-core' )    => 'monosocial',
					esc_html__( 'Material', 'sigma-core' )       => 'material',
					esc_html__( 'Flaticon', 'sigma-core' )       => 'flaticon',
				),
				'admin_label' => true,
				'param_name'  => 'icon_type',
				'dependency' => array(
					'element' => 'icon_as',
					'value'   => 'font',
				),
				'description' => esc_html__( 'Select icon library.', 'sigma-core' ),
			),
			array(
				'type'             => 'iconpicker',
				'heading'          => esc_html__( 'Icon', 'sigma-core' ),
				'param_name'       => 'icon_flaticon',
				'settings'   => array(
					'iconsPerPage' => 500,
					'type' => 'flaticon',
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'flaticon',
				),
				'description'      => esc_html__( 'Select icon from library.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column vc_column-with-padding',
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'sigma-core' ),
				'param_name' => 'icon_fontawesome',
				'value'      => 'fas fa-adjust',
				'settings'   => array(
					'emptyIcon'    => false,
					'iconsPerPage' => 500,
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'sigma-core' ),
				'param_name' => 'icon_openiconic',
				'value'      => 'vc-oi vc-oi-dial',
				'settings'   => array(
					'emptyIcon'    => false,
					'type'         => 'openiconic',
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'openiconic',
				),
				'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'sigma-core' ),
				'param_name' => 'icon_typicons',
				'value'      => 'typcn typcn-adjust-brightness',
				'settings' => array(
					'emptyIcon'    => false,
					'type'         => 'typicons',
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'typicons',
				),
				'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'sigma-core' ),
				'param_name' => 'icon_entypo',
				'value'      => 'entypo-icon entypo-icon-note',
				'settings'   => array(
					'emptyIcon' => false,
					'type'         => 'entypo',
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'entypo',
				),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'sigma-core' ),
				'param_name' => 'icon_linecons',
				'value'      => 'vc_li vc_li-heart',
				'settings' => array(
					'emptyIcon'    => false,
					'type'         => 'linecons',
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'sigma-core' ),
				'param_name' => 'icon_monosocial',
				'value'      => 'vc-mono vc-mono-fivehundredpx',
				'settings'   => array(
					'emptyIcon'    => false,
					'type'         => 'monosocial',
					'iconsPerPage' => 4000,
				),
				'dependency'  => array(
					'element' => 'icon_type',
					'value'   => 'monosocial',
				),
				'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'sigma-core' ),
				'param_name' => 'icon_material',
				'value'      => 'vc-material vc-material-cake',
				'settings'   => array(
					'emptyIcon'    => false,
					'type'         => 'material',
					'iconsPerPage' => 4000,
				),
				'dependency'  => array(
					'element' => 'icon_type',
					'value'   => 'material',
				),
				'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
			),
			array(
				'type'        => 'textarea',
				'param_name'  => 'title',
				'heading'     => esc_html__( 'Title', 'sigma-core' ),
				'description' => esc_html__( 'Enter the title.', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'param_name'       => 'title_element',
				'heading'          => esc_html__( 'Title Element', 'sigma-core' ),
				'description'      => esc_html__( 'Select element tag.', 'sigma-core' ),
				'value'            => array(
					esc_html__( 'h1', 'sigma-core' )  => 'h1',
					esc_html__( 'h2', 'sigma-core' )  => 'h2',
					esc_html__( 'h3', 'sigma-core' )  => 'h3',
					esc_html__( 'h4', 'sigma-core' )  => 'h4',
					esc_html__( 'h5', 'sigma-core' )  => 'h5',
					esc_html__( 'h6', 'sigma-core' )  => 'h6',
					esc_html__( 'p', 'sigma-core' )   => 'p',
					esc_html__( 'div', 'sigma-core' ) => 'div'
				),
				'std'	=> 'h2',
			),

			array(
				'type'        => 'textarea',
				'param_name'  => 'subtitle',
				'heading'     => esc_html__( 'Subtitle', 'sigma-core' ),
				'description' => esc_html__( 'Enter the subtitle.', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'param_name'       => 'subtitle_element',
				'heading'          => esc_html__( 'Subtitle Element Tag', 'sigma-core' ),
				'description'      => esc_html__( 'Select element tag.', 'sigma-core' ),
				'value'            => array(
					esc_html__( 'h1', 'sigma-core' )  => 'h1',
					esc_html__( 'h2', 'sigma-core' )  => 'h2',
					esc_html__( 'h3', 'sigma-core' )  => 'h3',
					esc_html__( 'h4', 'sigma-core' )  => 'h4',
					esc_html__( 'h5', 'sigma-core' )  => 'h5',
					esc_html__( 'h6', 'sigma-core' )  => 'h6',
					esc_html__( 'p', 'sigma-core' )   => 'p',
					esc_html__( 'div', 'sigma-core' ) => 'div',
				),
				'std'	=> 'p',
			),
			array(
				'type'             => 'dropdown',
				'param_name'       => 'title_text_transform',
				'heading'          => esc_html__( 'Title text transform', 'sigma-core' ),
				'description'      => esc_html__( 'Select title text transform.', 'sigma-core' ),
				'std'              => '',
				'value'            => array(
					esc_html__( 'Default', 'sigma-core' )    => '',
					esc_html__( 'Lowercase', 'sigma-core' )  => 'text-lowercase',
					esc_html__( 'Uppercase', 'sigma-core' )  => 'text-uppercase',
					esc_html__( 'Capitalize', 'sigma-core' ) => 'text-capitalize',
				),
			),
			array(
				'type'             => 'dropdown',
				'param_name'       => 'subtitle_text_transform',
				'heading'          => esc_html__( 'Subtitle text transform', 'sigma-core' ),
				'description'      => esc_html__( 'Select subtitle text transform.', 'sigma-core' ),
				'std'              => '',
				'value'            => array(
					esc_html__( 'Default', 'sigma-core' )    => '',
					esc_html__( 'Lowercase', 'sigma-core' )  => 'text-lowercase',
					esc_html__( 'Uppercase', 'sigma-core' )  => 'text-uppercase',
					esc_html__( 'Capitalize', 'sigma-core' ) => 'text-capitalize',
				),
				'std'	=> 'uppercase',
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Title Color', 'sigma-core' ),
				'param_name'  => 'heading_title_color',
				'description' => esc_html__( 'Select custom title color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Subtitle Color', 'sigma-core' ),
				'param_name'  => 'heading_sub_title_color',
				'description' => esc_html__( 'Select custom subtitle color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'heading_subtitle_fs',
				'heading'     => esc_html__( 'Heading Subtitle Font size', 'sigma-core' ),
				'description' => esc_html__( 'Enter the font size for the subtitle.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'heading_title_fs',
				'heading'     => esc_html__( 'Heading Title Font size', 'sigma-core' ),
				'description' => esc_html__( 'Enter the font size for the title.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'param_name'       => 'title_fw',
				'heading'          => esc_html__( 'Heading Title Font Weight', 'sigma-core' ),
				'description'      => esc_html__( 'Select font weight for the title.', 'sigma-core' ),
				'value'            => array(
					esc_html__( '100', 'sigma-core' )  => '100',
					esc_html__( '200', 'sigma-core' )  => '200',
					esc_html__( '300', 'sigma-core' )  => '300',
					esc_html__( '400', 'sigma-core' )  => '400',
					esc_html__( '500', 'sigma-core' )  => '500',
					esc_html__( '600', 'sigma-core' )  => '600',
					esc_html__( '700', 'sigma-core' )   => '700',
					esc_html__( '800', 'sigma-core' ) => '800',
					esc_html__( '900', 'sigma-core' ) => '900'
				),
				'std'	=> '700',
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'heading_subtitle_lh',
				'heading'     => esc_html__( 'Heading Subtitle Line height', 'sigma-core' ),
				'description' => esc_html__( 'Enter the line height for the subtitle.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'heading_title_lh',
				'heading'     => esc_html__( 'Heading Title Line height', 'sigma-core' ),
				'description' => esc_html__( 'Enter the line height for the title.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Icon Color', 'sigma-core' ),
				'param_name'  => 'heading_icon_color',
				'description' => esc_html__( 'Select custom icon color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => ['style-1', 'style-2', 'style-3', 'style-4','style-5'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Accents Color', 'sigma-core' ),
				'param_name'  => 'heading_accents_color',
				'description' => esc_html__( 'Select custom Accents color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'heading_alighnment',
				'heading'     => esc_html__( 'Heading Alignment', 'sigma-core' ),
				'value'            => array(
					esc_html__( 'Left', 'sigma-core' )   => 'text-left',
					esc_html__( 'Right', 'sigma-core' )  => 'text-right',
					esc_html__( 'Center', 'sigma-core' ) => 'text-center',
				),
				'std'         => 'text-center',
				'description' => esc_html__( 'Select heading alignment.', 'sigma-core' ),
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
	 * Counter shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content, $handle = '' ) {

		$default_atts = array(
			'style'                   => 'style-1',
			'icon_type'           		=> 'fontawesome',
			'add_icon'            		=> '',
			'icon_as'             		=> 'font',
			'icon_image'          		=> '',
			'content'									=>	$content,
			'icon_fontawesome'    		=> 'fas fa-adjust',
			'icon_openiconic'     		=> 'vc-oi vc-oi-dial',
			'icon_typicons'       		=> 'typcn typcn-adjust-brightness',
			'icon_linecons'       		=> 'vc_li vc_li-heart',
			'icon_monosocial'     		=> 'vc-mono vc-mono-fivehundredpx',
			'icon_material'       		=> 'vc-material vc-material-cake',
			'icon_flaticon'       		=> '',
			'title'                   => '',
			'title_element'           => 'h2',
			'subtitle_text_transform' => 'text-uppercase',
			'subtitle'                => '',
			'subtitle_element'        => 'p',
			'heading_title_color'     => '',
			'heading_sub_title_color' => '',
			'heading_icon_color'			=> '',
			'heading_accents_color'		=> '',
			'heading_subtitle_fs'			=> '',
			'heading_title_fs'				=> '',
			'title_fw'								=> '700',
			'heading_subtitle_lh'			=> '',
			'heading_title_lh'				=> '',
			'title_text_transform'    => '',
			'heading_alighnment'      => 'text-center',
			'css_animation'           => '',
			'el_id'                   => '',
			'el_class'                => '',
			'css'                     => '',
			'handle'                  => $handle,
		);

		$atts = shortcode_atts( $default_atts, $atts, $handle );

		global $sigma_shortcodes, $sigma_vc_inline_css;

		$inline_css = '';
		$sigma_shortcodes[ $handle ]['atts'] = $atts;
		$sigma_shortcodes_class_unique       = 'sigma-custom-heading-' . mt_rand();
		$sigma_shortcodes_classes            = $this->handle . '_wrapper';
		$sigma_shortcodes_classes            .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes            .= ' ' . $this->wrapper_class;
		$sigma_shortcodes_classes            .= ' custom-heading-' . $atts[ 'style' ];
		$sigma_shortcodes_classes            .= ' ' . $atts[ 'heading_alighnment' ];

		if ( $atts[ 'el_class' ] ) {
			$sigma_shortcodes_classes .= ' ' . $atts[ 'el_class' ];
		}

		//Color
		if ( $atts[ 'heading_title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-custom-heading-wrapper .sigma-heading-title-wrapper .heading-title { color: " . $atts[ 'heading_title_color' ] . ";}";
		}
		if ( $atts[ 'heading_sub_title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-custom-heading-wrapper .sigma-heading-subtitle-wrapper .heading-subtitle { color: " . $atts[ 'heading_sub_title_color' ] . ";}";
		}
		if ( $atts[ 'heading_icon_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-custom-heading-wrapper .icon i { color: " . $atts[ 'heading_icon_color' ] . ";}";
		}
		if ( $atts[ 'heading_accents_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-custom-heading-wrapper .icon::before, .".$sigma_shortcodes_class_unique . " .sigma-custom-heading-wrapper .icon::after { background-color: " . $atts[ 'heading_accents_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_custom_heading_wrapper.custom-heading-style-5 .sigma-custom-heading-wrapper .icon::before, .".$sigma_shortcodes_class_unique . ".sigma_custom_heading_wrapper.custom-heading-style-5 .sigma-custom-heading-wrapper .icon::after { border-color: " . $atts[ 'heading_accents_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_custom_heading_wrapper.custom-heading-style-6 .section-title .heading-subtitle span:last-child:after, .".$sigma_shortcodes_class_unique . ".sigma_custom_heading_wrapper.custom-heading-style-6 .section-title .heading-subtitle span:first-child:after { background-color: " . $atts[ 'heading_accents_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_custom_heading_wrapper.custom-heading-style-6 .section-title .heading-subtitle span:first-child, .".$sigma_shortcodes_class_unique . ".sigma_custom_heading_wrapper.custom-heading-style-6 .section-title .heading-subtitle span:last-child { background-color: " . $atts[ 'heading_accents_color' ] . ";}";
		}
		// Font Size
		if ( $atts[ 'heading_title_fs' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-custom-heading-wrapper .sigma-heading-title-wrapper .heading-title { font-size: ". $atts['heading_title_fs'] . ";}";
		}
		if ( $atts[ 'heading_subtitle_fs' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-custom-heading-wrapper .sigma-heading-subtitle-wrapper .heading-subtitle { font-size: " . $atts[ 'heading_subtitle_fs' ] . ";}";
		}
		// Font Weight
		if ( $atts[ 'title_fw' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-custom-heading-wrapper .sigma-heading-title-wrapper .heading-title { font-weight: ". $atts['title_fw'] . ";}";
		}
		// Line Height
		if ( $atts[ 'heading_title_lh' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-custom-heading-wrapper .sigma-heading-title-wrapper .heading-title { line-height: " . $atts[ 'heading_title_lh' ] . ";}";
		}
		if ( $atts[ 'heading_subtitle_lh' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .sigma-custom-heading-wrapper .sigma-heading-subtitle-wrapper .heading-subtitle { line-height: " . $atts[ 'heading_subtitle_lh' ] . ";}";
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
			<?php sigmacore_get_vc_shortcode_template( 'custom-heading/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}

new Sigma_Vc_Custom_Heading_Shortcode_Fields();
