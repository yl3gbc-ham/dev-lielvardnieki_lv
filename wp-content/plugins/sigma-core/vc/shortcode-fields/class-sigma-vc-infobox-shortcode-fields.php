<?php
/**
 * Sigma Infobox shortcode
 *
 * @package Sigma Core
 */
/**
 * Infobox shortcode.
 */
class Sigma_Vc_Infobox_Shortcode_Fields{
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
		$this->title         = esc_html__( 'Infobox', 'sigma-core' );
		$this->handle        = 'sigma_infobox';
		$this->description   = esc_html__( 'Use this shortcode to show infobox.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrapper_class = 'sigma-shortcode-wrapper';

		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}
	/**
	 * Infobox shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {
		$fields = array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Infobox Style', 'sigma-core' ),
				'param_name' => 'style',
				'value'      => array(
					esc_html__( 'Style 1', 'sigma-core' ) => 'style-1',
					esc_html__( 'Style 2', 'sigma-core' ) => 'style-2',
					esc_html__( 'Style 3', 'sigma-core' ) => 'style-3',
					esc_html__( 'Style 4', 'sigma-core' ) => 'style-4',
					esc_html__( 'Style 5', 'sigma-core' ) => 'style-5',
					esc_html__( 'Style 6', 'sigma-core' ) => 'style-6',
					esc_html__( 'Style 7', 'sigma-core' ) => 'style-7',
					esc_html__( 'Style 8', 'sigma-core' ) => 'style-8',
					esc_html__( 'Style 9', 'sigma-core' ) => 'style-9',
				),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'infobox_title',
				'heading'     => esc_html__( 'Infobox Title', 'sigma-core' ),
				'description' => esc_html__( 'Enter Infobox title.', 'sigma-core' ),
			),
			array(
				'type'       => 'textarea_html',
				'holder'     => 'div',
				'heading'    => esc_html__( 'Text', 'sigma-core' ),
				'param_name' => 'content',
				'value'      => '<p>' . esc_html__( 'I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'sigma-core' ) . '</p>',
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Animate 3D?', 'sigma-core' ),
				'param_name' => 'animate_3d',
				'dependency'  => array(
					'element' => 'style',
					'value'   => ['style-2', 'style-3'],
				),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Add icon?', 'sigma-core' ),
				'param_name' => 'add_icon',
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Add Count', 'sigma-core' ),
				'param_name' => 'add_count',
				'dependency'  => array(
					'element' => 'style',
					'value'   => ['style-1', 'style-2', 'style-3', 'style-4'],
				),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Add Hover Image?', 'sigma-core' ),
				'param_name' => 'add_hover_image',
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-2',
				),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Select Hover Image', 'sigma-core' ),
				'param_name'  => 'hover_image',
				'value'       => '',
				'dependency'  => array(
					'element' => 'add_hover_image',
					'value'   => 'true',
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Infobox Alignment', 'sigma-core' ),
				'param_name' => 'align',
				'value'      => array(
					esc_html__( 'Left', 'sigma-core' ) => 'left',
					esc_html__( 'Center', 'sigma-core' ) => 'center',
					esc_html__( 'Right', 'sigma-core' ) => 'right',
				),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array('style-2', 'style-3', 'style-8'),
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Icon Alignment', 'sigma-core' ),
				'param_name' => 'icon_align',
				'value'      => array(
					esc_html__( 'Top', 'sigma-core' ) => 'top',
					esc_html__( 'Left', 'sigma-core' ) => 'left',
					esc_html__( 'Right', 'sigma-core' ) => 'right',
				),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array('style-5'),
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Color Scheme', 'sigma-core' ),
				'param_name' => 'color_scheme',
				'value'      => array(
					esc_html__( 'Light', 'sigma-core' ) => 'light',
					esc_html__( 'Dark', 'sigma-core' ) => 'dark',
				),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array('style-2', 'style-3'),
				),
				'group'       => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'infobox_count',
				'heading'     => esc_html__( 'Infobox Count', 'sigma-core' ),
				'description' => esc_html__( 'Enter Infobox Count No.', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'add_count',
					'value'   => 'true',
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Icon Type', 'sigma-core' ),
				'param_name' => 'icon_as',
				'value'      => array(
					esc_html__( 'Font', 'sigma-core' )   => 'font',
					esc_html__( 'Image', 'sigma-core' )  => 'image',
					esc_html__( 'Number', 'sigma-core' ) => 'number',
				),
				'dependency'  => array(
					'element' => 'add_icon',
					'value'   => 'true',
				),
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'infobox_number',
				'heading'     => esc_html__( 'Infobox Number', 'sigma-core' ),
				'description' => esc_html__( 'Enter infobox number.', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'icon_as',
					'value'   => 'number',
				),
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
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
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
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
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
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
				'group'            => esc_html__( 'Icon Settings', 'sigma-core' ),
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
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
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
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
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
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
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
				'group'      => esc_html__( 'Icon Settings', 'sigma-core' ),
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
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
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
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
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
				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
				'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'info_count_no',
				'heading'     => esc_html__( 'Count No.', 'sigma-core' ),
				'description' => esc_html__( 'Add number for this Infobox.', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => 'style-3',
				),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Add Button?', 'sigma-core' ),
				'param_name'       => 'show_link',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'description'      => esc_html__( 'Select this checkbox to wrap the info box with a link', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => 'style-7',
				),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Button Link', 'sigma-core' ),
				'param_name'  => 'link',
				'dependency'  => array(
					'element' => 'show_link',
					'value'   => 'yes',
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Title Color', 'sigma-core' ),
				'param_name'  => 'infobox_title_color',
				'description' => esc_html__( 'Select custom title color.', 'sigma-core' ),
				'group'       => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Box Hover Title Color', 'sigma-core' ),
				'param_name'  => 'infobox_hover_title_color',
				'description' => esc_html__( 'Select custom title color on hover.', 'sigma-core' ),
				'group'       => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-6'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Subtitle Color', 'sigma-core' ),
				'param_name'  => 'infobox_subtitle_color',
				'description' => esc_html__( 'Select custom subtitle color.', 'sigma-core' ),
				'group'       => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Box Hover Subtitle Color', 'sigma-core' ),
				'param_name'  => 'infobox_hover_subtitle_color',
				'description' => esc_html__( 'Select custom subtitle color on hover.', 'sigma-core' ),
				'group'       => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-6'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Icon Color', 'sigma-core' ),
				'param_name'  => 'infobox_icon_color',
				'description' => esc_html__( 'Select custom icon color.', 'sigma-core' ),
				'group'       => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Box Hover Icon Color', 'sigma-core' ),
				'param_name'  => 'infobox_hover_icon_color',
				'description' => esc_html__( 'Select custom icon color on hover.', 'sigma-core' ),
				'group'       => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-6'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Icon Background Color', 'sigma-core' ),
				'param_name'  => 'infobox_icon_bg_color',
				'description' => esc_html__( 'Select custom icon background color.', 'sigma-core' ),
				'group'       => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-3', 'style-2', 'style-1', 'style-5', 'style-9'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Infobox Background Color', 'sigma-core' ),
				'param_name'  => 'infobox_bg_color',
				'description' => esc_html__( 'Select custom infobox background color.', 'sigma-core' ),
				'group'       => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-6', 'style-7', 'style-9'],
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Infobox Hover Background Color', 'sigma-core' ),
				'param_name'  => 'infobox_hover_bg_color',
				'description' => esc_html__( 'Select custom infobox background on hover.', 'sigma-core' ),
				'group'       => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => ['style-6'],
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
			'class'       => $this->wrapper_class,
			'params'      => $fields,
		);
		vc_map( $params );
	}
	/**
	 * Infobox shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'style'               => 'style-1',
			'infobox_title'       => '',
			'content'     => '',
			'align' 							=> 'left',
			'icon_align'          => 'top',
			'color_scheme'				=> 'light',
			'icon_type'           => 'fontawesome',
			'add_count' 					=> '',
			'add_hover_image'     => '',
			'hover_image'					=> '',
			'infobox_count' 			=> '',
			'add_icon'            => '',
			'animate_3d'					=> '',
			'icon_as'             => 'font',
			'infobox_number'      => '',
			'icon_image'          => '',
			'icon_fontawesome'    => 'fas fa-adjust',
			'icon_openiconic'     => 'vc-oi vc-oi-dial',
			'icon_typicons'       => 'typcn typcn-adjust-brightness',
			'icon_linecons'       => 'vc_li vc_li-heart',
			'icon_monosocial'     => 'vc-mono vc-mono-fivehundredpx',
			'icon_material'       => 'vc-material vc-material-cake',
			'icon_flaticon'       => '',
			'info_count_no'       => '',
			'infobox_title_color'	=>	'',
			'infobox_icon_bg_color'	=> '',
			'infobox_subtitle_color'	=>	'',
			'infobox_icon_color'	=>	'',
			'infobox_hover_title_color'	=>	'',
			'infobox_hover_subtitle_color'	=>	'',
			'infobox_hover_icon_color'	=>	'',
			'infobox_bg_color'	=>	'',
			'infobox_hover_bg_color'	=>	'',
			'show_link'       		=> '',
			'link'       					=> '',
			'css_animation'       => '',
			'el_id'               => '',
			'el_class'            => '',
			'css'                 => '',
			'handle'              => $handle,
		);
		$atts = shortcode_atts( $default_atts, $atts, $handle );
		$atts['content'] = $content;

		global $sigma_shortcodes, $sigma_vc_inline_css;

		$inline_css = '';
		$sigma_shortcodes[ $handle ]['atts'] = $atts;
		$sigma_shortcodes_class_unique       = 'sigma-infobox-' . mt_rand();
		$sigma_shortcodes_classes            = $this->handle . '_wrapper';
		$sigma_shortcodes_classes            .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes            .= ' ' . $this->wrapper_class;

		if ( $atts[ 'el_class' ] ) {
			$sigma_shortcodes_classes .= ' ' . $atts[ 'el_class' ];
		}

		if ( $atts[ 'infobox_title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-4 .cta-section .cta-inner .cta-features .single-feature .cta-desc h4 { color: " . $atts[ 'infobox_title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .cta-section .cta-inner .cta-features .single-feature .cta-desc h4 { color: " . $atts[ 'infobox_title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .features-loop .feature-box h4 { color: " . $atts[ 'infobox_title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-5 .sigma_icon-block.icon-block-3 .sigma_icon-block-content h5{ color: " . $atts[ 'infobox_title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-6 .sigma_icon-block.icon-block-7 .sigma_icon-block-content h5{ color: " . $atts[ 'infobox_title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-7 .sigma_icon-block .sigma_icon-block-content h5{ color: " . $atts[ 'infobox_title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-8 .icon-wrapper h5{ color: " . $atts[ 'infobox_title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-9 .sigma_icon-block.top .sigma_icon-block-content h5{ color: " . $atts[ 'infobox_title_color' ] . ";}";
		}
		if ( $atts[ 'infobox_hover_title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-6 .sigma_icon-block.icon-block-7:hover .sigma_icon-block-content h5{ color: " . $atts[ 'infobox_hover_title_color' ] . ";}";
		}
		if ( $atts[ 'infobox_subtitle_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-4 .cta-section .cta-inner .cta-features .single-feature .cta-desc p { color: " . $atts[ 'infobox_subtitle_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .cta-section .cta-inner .cta-features .single-feature .cta-desc p { color: " . $atts[ 'infobox_subtitle_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .features-loop .feature-box p { color: " . $atts[ 'infobox_subtitle_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-5 .sigma_icon-block.icon-block-3 .sigma_icon-block-content p{ color: " . $atts[ 'infobox_subtitle_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-6 .sigma_icon-block.icon-block-7 .sigma_icon-block-content p{ color: " . $atts[ 'infobox_subtitle_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-7 .sigma_icon-block .sigma_icon-block-content p{ color: " . $atts[ 'infobox_subtitle_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-8 .sigma_icon-block-content p{ color: " . $atts[ 'infobox_subtitle_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-9 .sigma_icon-block.top .sigma_icon-block-content p{ color: " . $atts[ 'infobox_subtitle_color' ] . ";}";
		}
		if ( $atts[ 'infobox_hover_subtitle_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-6 .sigma_icon-block.icon-block-7:hover .sigma_icon-block-content p{ color: " . $atts[ 'infobox_hover_subtitle_color' ] . ";}";
		}
		if ( $atts[ 'infobox_icon_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-4 .cta-section .cta-inner .cta-features .single-feature .icon{ color: " . $atts[ 'infobox_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .features-loop .feature-box .icon{ color: " . $atts[ 'infobox_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .cta-section .cta-inner .cta-features .single-feature .icon{ color: " . $atts[ 'infobox_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-5 .sigma_icon-block.icon-block-3 .icon i{ color: " . $atts[ 'infobox_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-5 .sigma_icon-block.icon-block-3 .icon .icon-number{ color: " . $atts[ 'infobox_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-6 .sigma_icon-block.icon-block-7 .icon .icon-number{ color: " . $atts[ 'infobox_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-6 .sigma_icon-block.icon-block-7 .icon i{ color: " . $atts[ 'infobox_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-7 .sigma_icon-block .icon{ color: " . $atts[ 'infobox_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-8 .icon-wrapper .icon{ background-color: " . $atts[ 'infobox_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-9 .sigma_icon-block.top .icon-wrapper{ color: " . $atts[ 'infobox_icon_color' ] . ";}";
		}
		if ( $atts[ 'infobox_hover_icon_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-6 .sigma_icon-block.icon-block-7:hover .icon i{ color: " . $atts[ 'infobox_hover_icon_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-6 .sigma_icon-block.icon-block-7:hover .icon .icon-number{ color: " . $atts[ 'infobox_hover_icon_color' ] . ";}";
		}
		if ( $atts[ 'infobox_icon_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .cta-section .cta-inner .cta-features .single-feature .icon{ background-color: " . $atts[ 'infobox_icon_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .features-loop .feature-box{ background-color: " . $atts[ 'infobox_icon_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-5 .sigma_icon-block.icon-block-3 .icon i{ background-color: " . $atts[ 'infobox_icon_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-9 .sigma_icon-block.top .icon-wrapper{ background-color: " . $atts[ 'infobox_icon_bg_color' ] . ";}";
		}
		if ( $atts[ 'infobox_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-6 .sigma_icon-block.icon-block-7{ background-color: " . $atts[ 'infobox_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-7 .sigma_icon-block{ background-color: " . $atts[ 'infobox_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-9 .sigma_icon-block.top .sigma_icon-block-content{ background-color: " . $atts[ 'infobox_bg_color' ] . ";}";
		}
		if ( $atts[ 'infobox_hover_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".infobox-style-6 .sigma_icon-block.icon-block-7:hover{ background-color: " . $atts[ 'infobox_hover_bg_color' ] . ";}";
		}

		if ( $atts[ 'add_icon' ] && $atts[ 'icon_as' ] ) {
			$sigma_shortcodes_classes .= ' icon-type-' . $atts[ 'icon_as' ];
		}

		$sigma_shortcodes_classes            .= ' infobox-' . $atts[ 'style' ];
		$sigma_shortcodes_classes            .= ' infobox-' . $atts[ 'align' ];
		$sigma_shortcodes_classes            .= ' infobox-' . $atts[ 'color_scheme' ];
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
			<?php sigmacore_get_vc_shortcode_template( 'infobox/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}

}
new Sigma_Vc_Infobox_Shortcode_Fields();
